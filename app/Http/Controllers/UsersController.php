<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Session;
use Redirect;
use Auth;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function show($id){
    	$user = User::find($id);
    	return view('users.show', compact('user'));
    }

    public function update(Request $request, $id){
    	$user = User::find($id);

    	if ($request->input('name')) {
    		$user->name = $request->input('name');
    	}

    	if ($request->input('email')) {
    		$user->email = $request->input('email');
    	}

    	if ($request->input('phone')) {
    		$user->phone_number = $request->input('phone');
    	}

    	$user->save();

    	Session::flash('message', 'Successfully updated account');
    	return Redirect::route('userShow', $user->id);

    }

    public function getPasswordForm(){
    	return view('auth.passwords.passChange');
    }

    public function changePassword(Request $request){
    	$user = Auth::user();

    	$this->validate($request, [
        	'password' => 'required|confirmed',
    	]);

    	$credentials = $request->only(
        	'password', 'password_confirmation'
    	);

    	$user->forceFill([
            'password' => bcrypt($request->input('password')),
            'remember_token' => Str::random(60),
        ])->save();

    	Session::flash('message', 'Successfully changed password');
    	return Redirect::route('userShow', $user->id);


    }
}
