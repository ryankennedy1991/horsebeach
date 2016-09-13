<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;

class DashboardController extends Controller
{
    //

    public function index(){
    	$events = Event::count();

    	return view('dashboard', compact('events'));
    }
}
