<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/home');
});
Route::auth();

Route::get('/dashboard', 'HomeController@index');
Route::get('/appstat', 'HomeController@appstat');
Route::get('/home', 'HomeController@appstat');

Route::get('/app-settings', 'appController@appsettings');
Route::post('/app-settings-save', 'appController@appsettings_save');
Route::get('/app-settings-save', 'appController@appsettings');

//Wizard
Route::get('/app-wizard-begin', 'HomeController@appwizard');
Route::post('/app-wizard-save', 'HomeController@appwizard_save');

//Benmarking route
Route::get('/app-benchmarking-start', 'appController@appbenchmarking_start');
Route::get('/app-benchmarking', 'appController@appbenchmarking');
Route::get('/app-benchmarking-history', 'appController@appbenchmarking_history');
Route::get('/app-benchmarking-ci', 'appController@appbenchmarking_ci');
Route::get('/app-benchmarking-now', 'appController@appbenchmarking_ci');
Route::get('/app-benchmarking-all-now', 'appController@appbenchmarking_ci');

//Git related
Route::get('/git-manager', 'gitController@gitlist');

//Monitor related
Route::get('/monitor-list', 'monitorController@monitorlist');

//User profile page
Route::get('/user-profile', 'profileController@index');
Route::get('/user-package-save', 'profileController@package_save');
Route::get('/user-creditcode-save', 'profileController@package_save');
Route::get('/user-payment-list', 'profileController@payment_list');

//Optimize running app
Route::get('/app-optimize-begin', 'appOptimizeController@index');
Route::post('/app-optimize-save', 'appOptimizeController@appoptimize_save');
