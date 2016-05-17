<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use SSH;

use chef;


class benchmarkingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');

        // For history tab
        if ( \Auth::User() )
          $this->data['history_list'] = \Auth::User()->history()->get();

        //ini_set('display_errors', 1);
        //ini_set('display_startup_errors', 1);
        //error_reporting(E_ALL);

        // create chef object
        $chefAuthPlugin = new chef("keithyau", "/etc/chef/keithyau.pem");

        // Create a new guzzle client
        $client = new \Guzzle\Http\Client('https://api.chef.io');
        $client->addSubscriber($chefAuthPlugin);

        // Now you can make calls to the chef server
        try {
            $response = $client->get('/license')->send();
        } catch (Guzzle\Http\Exception\BadResponseException $e) {
            echo 'ERROR Uh oh! ' . $e->getMessage();
            echo 'ERROR HTTP request URL: ' . $e->getRequest()->getUrl() . "\n";
            echo 'ERROR HTTP request: ' . $e->getRequest() . "\n";
            echo 'ERROR HTTP response status: ' . $e->getResponse()->getStatusCode() . "\n";
            echo 'ERROR HTTP response: ' . $e->getResponse() . "\n";
        }

        print_r($response->json()); exit;

    }

    /**
     * Save app settings and route it back to the settings page.
     *
     * @return \Illuminate\Http\Response
     */
    public function benchmarking(Request $request)
    {

        $data = $this->data;

        return view('app-benchmarking')->with($data);
    }

    /**
     * Server benchmarking function before deploying apps.
     *
     * @return \Illuminate\Http\Response
     */
    public function benchmarking_start(Request $request)
    {
        $data = $this->data;

        $commands = 'hostname';

        //Running single command and get return
        SSH::into('production')->run($commands, function($line)
        {
            //Using local variable cannot get the data out from this function
            $this->data['notice'] = (string) $line.PHP_EOL;
        });
        $data['notice'] = $this->data['notice'];

        $data['notice_details'] = $request->input('domainname');

        return view('app-benchmarking')->with($data);
    }

    /**
     * Server benchmarking history list.
     *
     * @return \Illuminate\Http\Response
     */
    public function benchmarking_history(Request $request)
    {
        $data = $this->data;

        return view('app-benchmarking-history')->with($data);
    }
}
