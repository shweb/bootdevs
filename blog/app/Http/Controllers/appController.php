<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//Adding ORM
use App\Application;
use App\Action_History;
use App\optimzation_record;

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
        $application = \Auth::User()->applications()->find($appid);

        //Load and prepare current settings
        $array = unserialize($application->app_autoconf);

        //Control if default value display checkbox on or off
        $data = $array;

        /*
        $data['email'] = $array['email'];
        $data['SSHuser'] = $array['SSHuser'];
        //$data['serverpassword'] = $array['serverpassword'];
        $data['select2_appconf_checked'] = $array['select2_appconf_checked'];
        $data['select2_appconf'] = $array['select2_appconf'];
        $data['select2_db_checked'] = $array['select2_db_checked'];
        $data['select2_db'] = $array['select2_db'];
        $data['select2_objectcache_checked'] = $array['select2_objectcache_checked'];
        $data['select2_objectcache'] = $array['select2_objectcache'];
        $data['select2_pagecache_checked'] = $array['select2_pagecache_checked'];
        $data['select2_pagecache'] = $array['select2_pagecache'];
        $data['select2_cacheheader_checked'] = $array['select2_cacheheader_checked'];
        $data['select2_cacheheader'] = $array['select2_cacheheader'];
        */

        $data['appname'] = $application->domainname;
        $data['appid'] = $appid;
        $data['history_list'] = \Auth::User()->history()->where('action_type', 'Create new app')->get();

        return view('app-settings')->with($data);
    }

    /**
     * Update app settings and redirect to the settings page.
     *
     * @return \Illuminate\Http\Response
     */
    public function appsettings_codesave(Request $request)
    {
        $appid = $request->input('appid');
        $application = \Auth::User()->applications()->find($appid);

        if ( isset($application->app_autoconf) ) {
            $temp = unserialize($application->app_autoconf);
            $data = array_merge($temp, $request->all() );
        } else {
             //Load and prepare current settings
            $array = unserialize($application->app_autoconf);

            //Control if default value display checkbox on or off
            $data = array_merge($data, $array);
        }
        //Store all autmation conf as meta data in the current application object
        $application->app_autoconf = serialize($data);
        $application->save();   

        $data['notice'] = 'Your settings being saved';
        $data['appname'] = $application->domainname;
        $data['appid'] = $appid;

        $history = new Action_History;
        $history->user_id = \Auth::User()->id;
        $history->app_id = $appid;
        $history->type = 'user';
        $history->action_type = 'update_new_app';
        $history->action_desc = $application->app_autoconf;
        $history->save();

        // For history tab
        $data['history_list'] = \Auth::User()->history()->where('action_type', 'Create new app')->get();
        //Check server status after deploy new conf and store to history
       //$history->action_status = 'server return';

        return view('app-settings')->with($data);
    }

    /**
     * Update app settings and redirect to the settings page.
     *
     * @return \Illuminate\Http\Response
     */
    public function appsettings_save(Request $request)
    {
        $appid = $request->input('appid');
        $application = \Auth::User()->applications()->find($appid);
        $data['appname'] = $application->domainname;
        $data['appid'] = $appid;

        //Store all autmation conf as meta data in the current application object
        $application->app_autoconf = serialize($request->all());
        $application->save();   

        $data['notice'] = 'Your settings being saved';

	    $history = new Action_History;
        $history->user_id = \Auth::User()->id;
        $history->app_id = $appid;
        $history->type = 'user';
        $history->action_type = 'update_new_app';
        $history->action_desc = $application->app_autoconf;
        $history->save();

        //Load and prepare current settings
        $array = unserialize($application->app_autoconf);

        //Control if default value display checkbox on or off
        $data = array_merge($data, $array);

        // For history tab
        $data['history_list'] = \Auth::User()->history()->where('action_type', 'Create new app')->get();
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

        // Get each app's status and optimization history app --> action_id(s) -> app_optimization_log
        // % of improvement measure by ( current improved measurement / BootDev's optimial result on same conf ) * 100%
        // So if BootDev improved, the measurement increased
        $measurement = optimzation_record::find(2);

        foreach ( $data['applications'] as $key => $application ) {
            foreach ($application->history()->get() as $action) {
                $result = $action->optimization_result()->orderBy('created_at', 'desc')->get();
                $data['applications'][$key]['optimization_result'] = $result->toArray();
            }
        
            if ( isset($result) ) {
                //Calculate response_time %, lower better
                $data['applications'][$key]['response_time_measure'] = round( ( $measurement->response_time / $result[0]->response_time ) * 100 ); 

                //Calculate request per sec %, higher better
                $data['applications'][$key]['request_per_sec_measure'] =  round( ( $result[0]->request_per_sec / $measurement->request_per_sec ) * 100 ); 

                //Calculate bandwidth_per_request %, lower better
                $data['applications'][$key]['bandwidth_per_request_measure'] =  round( ( $measurement->bandwidth_per_request / $result[0]->bandwidth_per_request ) * 100 ); 
            }

            unset($result);
        }

  //      print_r($data['applications']); exit;

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
