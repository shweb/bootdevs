<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class benchmarkingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');

        // For history tab
        $this->data['history_list'] = \Auth::User()->history()->get();
    }

    /**
     * Save app settings and route it back to the settings page.
     *
     * @return \Illuminate\Http\Response
     */
    public function benchmarking(Request $request)
    {

        $data = $this->data;

        return view('app-benchmarking')->with($data);
    }

    /**
     * Server benchmarking function before deploying apps.
     *
     * @return \Illuminate\Http\Response
     */
    public function benchmarking_start(Request $request)
    {

        $data['testing'] = 'testing';
        $data['select2_serverconf'] = $request->input('select2_serverconf');

        return view('app-benchmarking')->with($data);
    }

    /**
     * Server benchmarking history list.
     *
     * @return \Illuminate\Http\Response
     */
    public function benchmarking_history(Request $request)
    {
        $data = $this->data;

        return view('app-benchmarking-history')->with($data);
    }
}
