<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
//use Request;

use App\Application;
use App\Action_History;
use App\optimzation_record;

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
	// Get all applications of current user
        //$data['applications'] = Application::where('user_id', \Auth::User()->id);
	// Get value by onetoMany way from ORM
        $data['applications'] = \Auth::User()->applications()->get();

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
    public function appwizard_save(Request $request)
    {
    
    /* validation sample
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    */

        $application = new Application;
        $application->user_id = \Auth::user()->id; 
        $application->type = 'new_app'; 
        $application->domainname = $request->input('domainname'); 
        $application->username = $request->input('username'); 
        $application->password = $request->input('password'); //Not encrypted as it require to use in login other servers
        //$application->password = Hash::make($request->input('password')); //Not encrypted as it require to use in login other servers
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

	    $application->save();

        $data['application'] = $application;
        $data['notice'] = 'Your application being saved and after creation, you will receive an email';        

	    //Save a history
        $history = new Action_History;
        $history->type = 'user'; //User or system create
        $history->user_id = \Auth::user()->id;
        $history->app_id = $application->id;
        $history->action_type = 'Create new app';
        $history->action_appname = $application->domainname;
        $history->action_desc = serialize($application->get()->toArray()) ;
        
        $history->save();

	//Store below history after server return, may put it in a restful function
        //$history->status = '';
        //$history->error = '';
        //$history->log = '';

    //Store app optimization log to db after server return, for performance measurement
    //    $optimization_record = new optimzation_record;
    //    $optimization_record->action_id = ''; //system return action id
    //    $optimization_record->type = 'create_init';

        return view('app-wizard-begin')->with($data);
    }

    // Callback functions
    public function get_test($test) {
      return 'testing' . $test;
    }
}
