<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//ORM
use App\Application;
use App\Action_History;

class appOptimizeController extends Controller
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
     * Listing optimizations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data['test'] = [
              'App/Server 1',
              'App/Server 2',
              'App/Server 3',
              'App/Server 4',
        ];


        // Get current users' all apps
        $data['appnames'] = $data['test'];
        $data['github_user'] = 'keithyau';
        // print_r($data['appnames']); exit;

        return view('app-optimize-begin')->with($data);
    }

   /**
     * Listing git accounts.
     *
     * @return \Illuminate\Http\Response
     */
    public function appoptimize_save(Request $request)
    {
        //print_r($request->all()); exit;
        $application = new Application;
        $application->type = 'existing_app';
        $application->user_id = \Auth::user()->id;
        $application->domainname = $request->input('domainname');
        $application->username = $request->input('username');
        $application->password = $request->input('password'); //Not encrypted as it require to use in login other servers
        //$application->password = Hash::make($request::input('password')); //Not encrypted as it require to use in login other servers
        $application->email = $request->input('email');
        $application->select2_applang_checked = $request->input('select2_applang_checked');
        $application->select2_applang = $request->input('select2_applang');
        $application->codepath = $request->input('codepath');
        $application->select2_gitrepo_checked = $request->input('select2_gitrepo_checked');
        $application->select2_gitrepo = $request->input('select2_gitrepo');
        $application->gitusername = $request->input('gitusername');
        $application->select2_appmonitor_checked = $request->input('select2_appmonitor_checked');
        $application->select2_appmonitor = $request->input('select2_appmonitor');
        $application->key = $request->input('key');
        $application->remarks = $request->input('remarks');
        $application->dockerhub = $request->input('dockerhub');
        $application->dockerhub_password = $request->input('dockerhub_password');

        $application->save();

        $data['application'] = $application;
        $data['notice'] = 'Your application being saved and after creation, you will receive an email';

        //Save a history
        $history = new Action_History;
        $history->user_id = \Auth::user()->id;
        $history->app_id = $application->id;
        $history->action_status = 'user';
        $history->action_type = 'Optimize existng app';
        $history->action_appname = $application->domainname;
        $history->action_desc = serialize( $application->get()->toArray() ) ;

        $history->save();

        //Store below history after server return, may put it in a restful function
        //$history->status = '';
        //$history->error = '';
        //$history->log = '';

        //Store app optimization log to db after server return, for performance measurement
        //    $optimization_record = new optimzation_record;
        //    $optimization_record->action_id = ''; //system return action id
        //    $optimization_record->type = 'create_init';
        return view('app-optimize-begin')->with($data);
    }

}
