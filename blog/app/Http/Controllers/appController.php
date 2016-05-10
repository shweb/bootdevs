<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//Adding ORM
use App\Application;
use App\Action_History;

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
        $appid = $request->input('appid');

        $applications = Application::where('id', $appid)->get()->toArray();
        $data['appname'] = $applications[0]['domainname'];

        //Control if default value display checkbox on or off
        $data['select2_appconf_checked'] = 'checked';
        $data['select2_objectcache_checked'] = 'checked';

        return view('app-settings')->with($data);
    }

    /**
     * Save app settings and redirect to the settings page.
     *
     * @return \Illuminate\Http\Response
     */
    public function appsettings_save(Request $request)
    {

        $appsetttings = new Application;
        $appsettings->email = $request->input('email');
        $appsettings->appid = $request->input('appid');

        $select2_appconf = $request->input('select2_appconf');
        $select2_appconf_checked = $request->input('select2_appconf_checked');
        $select2_objectcache_checked = $request->input('select2_objectcache_checked');
        $data['appid'] = $input;
        $data['notice'] = 'Your settings being saved';

	$history = new Action_History;
        $history->user_id = \Auth::User()->id;
        $history->action_type = 'update_new_app';
        $history->action_desc = $appsettings->appid;
 
        //Check server status after deploy new conf and store to history
	//$history->action_status = 'server return';

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
        // Get current users' all apps
        $data['applications'] = \Auth::User()->applications()->get();

        // Get each app's status and optimization history

        return view('app-benchmarking-ci')->with($data);
    }

    /**
     * Server benchmarking history list.
     *
     * @return \Illuminate\Http\Response
     */
    public function appbenchmarking_history(Request $request)
    {
        // Get current users' all apps history
        $data['history_list'] = \Auth::User()->history()->get();

        return view('app-benchmarking-history')->with($data);
    }
}
