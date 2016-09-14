<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


use App\Mail\EventAdded;




Route::get('logout', function() {
    Auth::logout();
    return view('auth.login');
});


Auth::routes();





Route::group(['middleware' => 'auth'], function(){
	Route::get('/', 'DashboardController@index');
Route::get('/home', 'DashboardController@index');
	Route::get('dashboard', 'DashboardController@index');
	 Route::post('events/{id}/attachment', ['as' => 'addAttachment', 'uses' => 'EventsController@addAttachment']);
	 Route::post('events/{id}/attachment/{aid}', ['as' => 'deleteAttachment', 'uses' => 'EventsController@deleteAttachment']);
	Route::resource('events', 'EventsController');
	Route::get('users/{id}', 'UsersController@show');
});


Route::get('/testmail', function(){
	Mail::to('horsebeachband@gmail.com')->send(new EventAdded);
});


