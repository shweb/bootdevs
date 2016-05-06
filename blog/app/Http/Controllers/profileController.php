<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
    }

    /**
     * Listing git accounts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data['test'] = [
              'App/Server 1' => [
                'product' => 'server_tuning',
		'time' => '1273017',
                'amount' => 'RMB100',
		],
              'App/Server 2' => [
                'product' => 'server_tuning',
		'time' => '1273017',
                'amount' => 'RMB100',
		],
              'App/Server 3' => [
                'product' => 'server_tuning',
		'time' => '0127300612',
                'amount' => 'RMB100',
		],
              'App/Server 4' => [
                'product' => 'server_tuning',
		'time' => '12315654',
                'amount' => 'RMB100',
		],
        ];

        $data['payment'] = [
              'keithyau' => [
                'product' => 'monthly',
		'time' => '1273017',
                'amount' => 'RMB500',
                'confirmed' => 'paid',
		],
              'jacky' => [
                'product' => 'yearly',
		'time' => '1273017',
                'amount' => 'RMB900',
		],
              'becky' => [
                'product' => 'oneoff',
		'time' => '0127300612',
                'amount' => 'RMB100',
		],
              'kevin' => [
                'product' => 'oneoff',
		'time' => '12315654',
                'amount' => 'RMB100',
		],
        ];
        $data['current_user_emails'] = [
		  'binded' => 'keithyau@163.com',
		  'notverifed' => 'keithyau@123.com',
		  'binded' => 'keithyau@232.com',
        ];


        // Get current users' all apps
        $data['sales_records'] = $data['test'];

        return view('user-profile')->with($data);
    }
}
