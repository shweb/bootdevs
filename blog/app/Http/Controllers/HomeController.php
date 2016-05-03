<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['test'] = [
            [
                'test1' => 'Custom Data from source code array/ DB',
            ],
        ];

        return view('welcome')->with($data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function appstat()
    {
        $data['test'] = [
            [
                '1' => 'App/Server 1',
            ],
            [
                '2' => 'App/Server 2',
            ],
            [
                '3' => 'App/Server 3',
            ],
            [
                '4' => 'App/Server 4',
            ],
        ];

        return view('app-dashboard')->with($data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function appwizard()
    {
        $data['test'] = [
            [
                '1' => 'App/Server 1',
            ],
            [
                '2' => 'App/Server 2',
            ],
            [
                '3' => 'App/Server 3',
            ],
            [
                '4' => 'App/Server 4',
            ],
        ];

        return view('app-wizard-begin')->with($data);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function appsettings(Request $request)
    {
        $data['test'] = [
            [
                '1' => 'App/Server 1',
            ],
            [
                '2' => 'App/Server 2',
            ],
            [
                '3' => 'App/Server 3',
            ],
            [
                '4' => 'App/Server 4',
            ],
        ];
        $input = $request->input('appid');
        $data['appname'] = $data['test'][$input - 1][$input];
        $data['appid'] = $input;

        //Control if the displayed checkbox on or off
        $data['select2_appconf_checked'] = 'checked';

        return view('app-settings')->with($data);
    }

    /**
     * Save app settings and route it back to the settings page.
     *
     * @return \Illuminate\Http\Response
     */
    public function appsettings_save(Request $request)
    {
        $data['test'] = [
            [
                '1' => 'App/Server 1',
            ],
            [
                '2' => 'App/Server 2',
            ],
            [
                '3' => 'App/Server 3',
            ],
            [
                '4' => 'App/Server 4',
            ],
        ];
        $email = $request->input('email');
        $select2_appconf = $request->input('select2_appconf');
        $select2_appconf_checked = $request->input('select2_appconf_checked');
        $input = $request->input('appid');
        $data['appname'] = $data['test'][0][$input];
	$data['appid'] = $input;
	$data['notice'] = 'Your settings being saved'; 

        return view('app-settings')->with($data);
    }
    // Callback functions
    public function get_test($test) {
      return 'testing' . $test;
    }
}
