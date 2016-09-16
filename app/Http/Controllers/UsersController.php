<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Session;
use Redirect;

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
}
