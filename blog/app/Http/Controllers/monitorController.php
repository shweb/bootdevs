<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class monitorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Listing APM Monitor binded to this accounts' apps.
     *
     * @return \Illuminate\Http\Response
     */
    public function monitorlist(Request $request)
    {
	$data['test'] = array(
		'1' => array(
                    'appname' => 'appone',
                    'vendor' => 'newrelic',
                    'account_owner' => 'keithyau',
                    'valid' => 'yes'
                ),
		'2' => array(
                    'appname' => 'apptwo',
                    'vendor' => 'oneapm',
                    'account_owner' => 'keithyau',
                    'valid' => 'yes'
                ),
		'3' => array(
                    'appname' => 'appthree',
                    'vendor' => 'newrelic',
                    'account_owner' => 'keithyau',
                    'valid' => 'yes'
                ),
		'4' => array(
                    'appname' => 'appfour',
                    'vendor' => 'newrelic',
                    'account_owner' => 'keithyau',
                    'valid' => 'yes'
                ),
	);

        // Get current users' all apps
	// Get value by onetoMany way from ORM
        $data['app_monitors'] = \Auth::User()->applications()->get();

        return view('monitor-list')->with($data);
    }

}
