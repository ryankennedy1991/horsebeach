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

Route::get('dashboard', function () {
	if (Auth::check(Auth::user())) {
		return view('dashboard');
	} else {
		return view('login', ['fail' => 'You must be logged in to view this page']);
	}

    
});

Route::get('logout', function() {
    Auth::logout();
    return view('login');
});


Auth::routes();


Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'auth'], function(){
	// Route::get('/events/new', 'EventsController@create');
	// Route::post('/events/new', 'EventsController@newEvent');
	// Route::get('/events/{id}/edit', ['as' => 'event_edit', 'uses' => 'EventsController@edit']);
	// Route::post('/events/{id}/edit', 'EventsController@update');
	// Route::get('/events', 'EventsController@show');
	// Route::get('events/{id}', ['as' => 'event_single', 'uses' => 'EventsController@singleEvent']);
	 Route::post('events/{id}/attachment', ['as' => 'addAttachment', 'uses' => 'EventsController@addAttachment']);
	 Route::post('events/{id}/attachment/{aid}', ['as' => 'deleteAttachment', 'uses' => 'EventsController@deleteAttachment']);
	// Route::get('events/{id}/delete', "EventsController@delete");

	Route::resource('events', 'EventsController');

	Route::get('users/{id}', 'UsersController@show');
});

Route::get('/testmail', function(){
	Mail::to('horsebeachband@gmail.com')->send(new EventAdded);
});


