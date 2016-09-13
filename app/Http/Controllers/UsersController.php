<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UsersController extends Controller
{
    public function show($id){
    	$user = User::find($id);
    	return view('users.show', compact('user'));
    }
}
