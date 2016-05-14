<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use PayPal\Core\PayPalHttpConfig;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use Illuminate\Support\Facades\URL;
use Session;
use Redirect;

//ORM
use App\recharge_record;

class paymentController extends Controller
{
    private $_api_context;

    /**
     * paymentController constructor.
     */
    public function __construct()
    {
        $paypal_settings = array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'live',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
        );

        PayPalHttpConfig::$defaultCurlOptions[CURLOPT_SSLVERSION] = CURL_SSLVERSION_TLSv1_2;

        // setup PayPal api context
        $this->_api_context = new ApiContext(new OAuthTokenCredential(config('services.paypal.client_id'), config('services.paypal.client_secret')));
        $this->_api_context->setConfig($paypal_settings);

        $this->data['payment_records'] = \Auth::User()->payment_records()->get()->toArray();
        $this->data['recharge_records'] = \Auth::User()->recharge_records()->get()->toArray();
        $this->data['sales_records'] = array_merge($this->data['payment_records'], 
            $this->data['recharge_records']);

    }

    public function postPayment(Request $request)
    {
        $data = $this->data;
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $payamount = $request->input('payamount');
        if ( !isset($payamount) || $payamount == NULL ) {
            $data['notice'] = 'The payment amount not set';
            return view('user-payment-list')->with($data);
        }
        $payamount = $payamount / 6.5; //Change to USD

        $item_1 = new Item();
        $item_1->setName('Item 1') // item name
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($payamount); // unit price

        // add item to list
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($payamount);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status'))
            ->setCancelUrl(URL::route('payment.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for inconvenient');
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // add payment ID to session
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {
            // redirect to paypal
            return Redirect::away($redirect_url);
        }

        return Redirect::route('original.route')
            ->with('error', 'Unknown error occurred');
    }

    public function getPaymentStatus(Request $request)
    {
        $data = $this->data;
        // Get the payment ID before session clear
        $payment_id = Session::get('paypal_payment_id');

        // clear the session payment ID
        Session::forget('paypal_payment_id');

        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            return Redirect::route('original.route')
                ->with('error', 'Payment failed');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        // PaymentExecution object includes information necessary
        // to execute a PayPal account payment.
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);

        $data['notice'] = 'Payment Fail';

        if ($result->getState() == 'approved') { // payment made

            //Insert recharge record here
            $record = new recharge_record;
            $record->user_id = \Auth::User()->id;
            $record->amount = $result->transactions[0]->related_resources[0]->sale->amount->total;
            $record->currency = $result->transactions[0]->related_resources[0]->sale->amount->currency;
            $record->payment_gateway = 'PayPal';
            $record->save();

            //Insert new money to user. Assume it is RMB
            \Auth::User()->credit_amount = \Auth::User()->credit_amount + $record->amount;
            \Auth::User()->save();

            $data['notice'] = 'Payment success';
            
            return view('user-payment-list')->with($data);

        }
        return view('user-payment-list')->with($data);
    }
}
