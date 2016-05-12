<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class gitController extends Controller
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
    public function gitlist(Request $request)
    {

        $data['test'] = [
              'App/Server 1',
              'App/Server 2',
              'App/Server 3',
              'App/Server 4',
        ];


        // Get current users' all apps
        $data['appnames'] = $data['test'];
        //$data['github_user'] = 'keithyau';
        // print_r($data['appnames']); exit;

        return view('git-manager')->with($data);
    }

}
