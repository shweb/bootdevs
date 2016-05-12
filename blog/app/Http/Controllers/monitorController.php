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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Binding APM Monitor binded to this accounts' apps.
     *
     * @return \Illuminate\Http\Response
     */
    public function monitor_manager(Request $request)
    {
        $appid = $request->input('appid');
        $application = \Auth::User()->applications()->find($appid);
        $data['appname'] = $application->domainname;
        $data['appid'] = $appid;

        //If the vendor already existing for this app, dont create new
        $monitor = App_Monitor::firstOrNew([
            'vendor' => $request->input('vendor'),
            'app_id' => $appid,
        ]);
        $monitor->app_id = $appid;
        $monitor->app_key = $request->input('apm_license_key');
        $monitor->vendor = $request->input('vendor');
        //$monitor->apm_app_secret = $request->input('apm_app_secret');
        $monitor->email = $request->input('apm_email');
        $monitor->username = $request->input('apm_user');

        $monitor->save();

        $data = array_merge($data, $monitor->toArray() );

        // Get current users' all apps
        // Get value by onetoMany way from ORM
        $data['app_monitors'] = \Auth::User()->applications()->get();

        $data['notice'] = 'Your monitor saved, if you want to view binding, please go';
        $data['notice_url'] = 'monitor-list';

        // Prepare deploy history
        $data['codedeploy_list'] = $application->history()->where('action_type', 'codedeploy')->get();

        // For history tab
        $data['history_list'] = \Auth::User()->history()->where('action_type', 'Create new app')->get();

        //return redirect('/app-settings?appid=' . $appid . '#apmbindingpage');
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
