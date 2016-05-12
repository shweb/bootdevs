<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//ORM
use App\Appplication;
use App\App_Monitor;

class monitorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');

        $appid = $request->input('appid');

        if ( isset($appid) ) {
            $application = \Auth::User()->applications()->find($appid);
            $this->data['appname'] = $application->domainname;
            $this->data['appid'] = $appid;
            // Prepare deploy history
            $this->data['codedeploy_list'] = $application->history()->where('action_type', 'codedeploy')->get();
        }

        // Get current users' all apps
        // Get value by onetoMany way from ORM
        $this->data['app_monitors'] = \Auth::User()->applications()->get();

        // For history tab
        $this->data['history_list'] = \Auth::User()->history()->where('action_type', 'Create new app')->get();
    }

    /**
     * Binding APM Monitor binded to this accounts' apps.
     *
     * @return \Illuminate\Http\Response
     */
    public function monitor_manager(Request $request)
    {
        $data = $this->data;

        //If the vendor already existing for this app, dont create new
        $monitor = App_Monitor::firstOrNew([
            'vendor' => $request->input('vendor'),
            'app_id' => $data['appid'],
        ]);
        $monitor->app_id = $data['appid'];
        $monitor->app_key = $request->input('apm_license_key');
        $monitor->vendor = $request->input('vendor');
        //$monitor->apm_app_secret = $request->input('apm_app_secret');
        $monitor->email = $request->input('apm_email');
        $monitor->username = $request->input('apm_user');
        $monitor->save();

        $data = array_merge($data, $monitor->toArray() );

        $data['notice'] = 'Your monitor saved, if you want to view binding, please go';
        $data['notice_url'] = 'monitor-list';
        
        return view('app-settings')->with($data);
    }

    /**
     * Listing APM Monitor binded to this accounts' apps
     *
     * @return \Illuminate\Http\Response
     */
    public function monitorlist(Request $request)
    {
        // Get current users' all apps
	    // Get value by onetoMany way from ORM
        $applications = \Auth::User()->applications()->get();

        $array = array();
        foreach ($applications as $application) {
            $array[$application->domainname] = App_Monitor::where('app_id', $application->id)->get()->toArray();
        }

        $data['monitored_applications'] = $array;

        return view('monitor-list')->with($data);
    }

}
