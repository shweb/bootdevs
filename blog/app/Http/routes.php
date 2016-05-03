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
    return view('welcome');
});

Route::auth();

Route::get('/dashboard', 'HomeController@index');
Route::get('/appstat', 'HomeController@appstat');
Route::get('/home', 'HomeController@appstat');
Route::get('/app-settings', 'HomeController@appsettings');
Route::post('/app-settings-save', 'HomeController@appsettings_save');
Route::get('/app-settings-save', 'HomeController@appsettings');
Route::get('/app-wizard-begin', 'HomeController@appwizard');
