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

    // Callback functions
    public function get_test($test) {
      return 'testing' . $test;
    }
}
