<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use SSH;


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

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

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
        $data = $this->data;

        $commands = 'hostname';

        //Running single command and get return
        SSH::into('production')->run($commands, function($line)
        {
            //Using local variable cannot get the data out from this function
            $this->data['notice'] = (string) $line.PHP_EOL;
        });
        $data['notice'] = $this->data['notice'];


        SSH::into('production')->define('testingtask', [
            'cd /root',
            'touch testingfromkeith'
        ]);

        SSH::task('testingtask', function($line)
        {
            $this->data['notice'] = (string) $line.PHP_EOL;
            exit;
        });

        $data['notice'] = $this->data['notice'];

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
