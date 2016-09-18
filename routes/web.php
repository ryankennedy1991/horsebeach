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


use App\Notifications\GigOffer;



Route::get('logout', function() {
    Auth::logout();
    return view('auth.login');
});


Auth::routes();




Route::group(['middleware' => 'auth'], function(){



	//home routes
	Route::get('/', 'DashboardController@index');
	Route::get('/home', 'DashboardController@index');
	Route::get('dashboard', 'DashboardController@index');

	// events routes
	Route::post('events/{id}/attachment', ['as' => 'addAttachment', 'uses' => 'EventsController@addAttachment']);
	Route::post('events/{id}/attachment/{aid}', ['as' => 'deleteAttachment', 'uses' => 'EventsController@deleteAttachment']);
	Route::resource('events', 'EventsController');
	Route::post('/events/resend/{id}', 'EventsController@resend');

	//users routes
	Route::get('users/password', 'UsersController@getPasswordForm');
	Route::post('users/password', 'UsersController@changePassword');
	Route::get('users/{id}', ['as' => 'userShow', 'uses' => 'UsersController@show']);
	Route::post('users/{id}/edit', 'UsersController@update' );

});




