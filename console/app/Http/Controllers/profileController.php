<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Hash;

//ORM
use App\Action_History;
use App\payment_record;
use App\payment_package;

//For upload files
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;

class profileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->data['current_user_emails'] = [
                  'binded' => 'keithyau@163.com',
                  'notverifed' => 'keithyau@123.com',
                  'binded' => 'keithyau@232.com',
        ];

        // Init variables in the page
        $this->data['deploy_count'] = \Auth::User()->history()->where('action_type', 'codedeploy')->count();
        $this->data['optimization_count'] = Action_History::has('optimization_result')->count();
        $this->data['payment_records'] = \Auth::User()->payment_records()->get()->toArray();
        $this->data['recharge_records'] = \Auth::User()->recharge_records()->get()->toArray();

        $array = unserialize(\Auth::User()->notifications_conf);
        if ( is_array($array) )
            $this->data = array_merge($this->data, $array);
    }

    /**
     * Listing user payment methods.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment_list(Request $request)
    {
        $data = $this->data;

        $data['sales_records'] = array_merge($data['payment_records'], $data['recharge_records']);

        return view('user-payment-list')->with($data);
    }

    /**
     * Chnage user password at profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_password(Request $request)
    {
        $data = $this->data;
        $current_password = $request->input('current_password');
        $password = $request->input('password');

        $data['notice'] = 'Your password is updated';

        if ( isset($current_password) && isset($password) )
            if ( Hash::check($current_password, \Auth::User()->password) == FALSE )
                $data['notice'] = 'Your old password is not correct';
            if ( Hash::check($password, \Auth::User()->password) == TRUE )
                $data['notice'] = 'Your old password cannot be same as the new one';
            if ( strcmp($password, $request->input('rpassword') ) != 0 ) {
                $data['notice'] = 'Your new password not matching';
            } else {
                \Auth::User()->password = Hash::make($password);
                \Auth::User()->save();
            }

        return view('user-profile')->with($data);
    }

    /**
     * Chnage user pictures at profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload_image(Request $request)
    {
        $data = $this->data;

        // getting all of the post data
        $file = $request->all();
        // setting up rules
        $rules = array('avatar_upload' => 'required'); //mimes:jpeg,bmp,png and for max size max:10000

        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            $data['notice'] = 'uploaded file failed validation';
            //return Redirect::to('user-profile')->withInput()->withErrors($validator);
            return view('user-profile')->with($data)->withErrors($validator);
        }
        else {
            // checking file is valid.
            if ($request->file('avatar_upload')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = $request->file('avatar_upload')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                $request->file('avatar_upload')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                //Session::flash('success', 'Upload successfully');
                $data['notice'] = 'Your profile picture updated.';

                \Auth::User()->avatar_path = '/'. $destinationPath . '/'. $fileName;
                \Auth::User()->save();

                return view('user-profile')->with($data);
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                $data['notice'] = 'uploaded file is not valid';
                return view('user-profile')->with($data);
            }
        }

        return view('user-profile')->with($data);
    }

    /**
     * Chnage user notifications at profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_notifications(Request $request)
    {
        $data = $this->data;

        \Auth::User()->notifications_conf = serialize( $request->all() );
        \Auth::User()->save();

        $array = $request->all();
        $data = array_merge($data, $array);

        $data['notice'] = 'Your notification changes being saved';

        return view('user-profile')->with($data);
    }

    /**
     * Listing user accounts.
     *
     * @return \Illuminate\Http\Response
     */
    public function package_save(Request $request)
    {
	  //Check if the account amount enough, if enough, directly return change accepted
        //notice: will email notify when insufficient fund 
        $data = $this->data;

        //If the user already in professional package
        if ( \Auth::User()->current_package()->first()->name == "professional 1" )
          $data['notice'] = 'You are already in professional package';
        elseif ( \Auth::User()->credit_amount > payment_package::where('name', 'professional 1')->first()->charge_amount ) {// Update its package if fund is enough
          
          \Auth::User()->current_packageId = payment_package::where('name', 'professional 1')->first()->id;

          //Charge the money
          \Auth::User()->credit_amount = \Auth::User()->credit_amount - payment_package::where('name', 'professional 1')->first()->charge_amount;
          \Auth::User()->save();

          $data['notice'] = 'Package upgraded';

          // Write to payment_record
          $payment = new payment_record;
          $payment->product_paid = 'professional 1'; //professional 1,2,3 / onDemand 
          $payment->payment_amount = payment_package::where('name', $payment->product_paid)->first()->charge_amount;
          $payment->currency = 'RMB';
          $payment->payment_status = 'success';
          $payment->user_id = \Auth::User()->id;
          $payment->save();
        }
        else 
          $data['notice'] = 'You dont have enough fund';

        return view('user-profile')->with($data);
    }

   /**
     * Save user account.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile_save(Request $request)
    {
        $data = $this->data;

        //Save values
        \Auth::User()->phone = $request->input('phone');
        \Auth::User()->about = $request->input('about');
        \Auth::User()->nickname = $request->input('nickname');
        \Auth::User()->website = $request->input('website');
        \Auth::User()->save();

        return view('user-profile')->with($data);
    }

    /**
     * Listing user accounts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get current users' all apps
        $data = $this->data;

        return view('user-profile')->with($data);
    }
}
