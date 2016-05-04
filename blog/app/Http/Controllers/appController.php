<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class appController extends Controller
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
        $data['select2_objectcache_checked'] = 'checked';

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
        $select2_objectcache_checked = $request->input('select2_objectcache_checked');
        $input = $request->input('appid');
        $data['appname'] = $data['test'][$input - 1][$input];
        $data['appid'] = $input;
        $data['notice'] = 'Your settings being saved';

        return view('app-settings')->with($data);
    }

    /**
     * Save app settings and route it back to the settings page.
     *
     * @return \Illuminate\Http\Response
     */
    public function appbenchmarking(Request $request)
    {

	$data['testing'] = 'testing';

        return view('app-benchmarking')->with($data);
    }

    /**
     * Server benchmarking function before deploying apps.
     *
     * @return \Illuminate\Http\Response
     */
    public function appbenchmarking_start(Request $request)
    {

	$data['testing'] = 'testing';
	$data['select2_serverconf'] = $request->input('select2_serverconf');

        return view('app-benchmarking')->with($data);
    }

    /**
     * Server benchmarking function before deploying apps.
     *
     * @return \Illuminate\Http\Response
     */
    public function appbenchmarking_ci(Request $request)
    {

        $data['test'] = [
              'App/Server 1',
              'App/Server 2',
              'App/Server 3',
              'App/Server 4',
        ];


        // Get current users' all apps
        $data['appnames'] = $data['test'];
	// print_r($data['appnames']); exit;

        return view('app-benchmarking-ci')->with($data);
    }

    /**
     * Server benchmarking history list.
     *
     * @return \Illuminate\Http\Response
     */
    public function appbenchmarking_history(Request $request)
    {

        $data['test'] = [
              'App/Server 1',
              'App/Server 2',
              'App/Server 3',
              'App/Server 4',
        ];


        // Get current users' all apps
        $data['appnames'] = $data['test'];
	// print_r($data['appnames']); exit;

        return view('app-benchmarking-history')->with($data);
    }
}
