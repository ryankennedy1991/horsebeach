<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Event;
use App\Attachment;
use DateTime;
use Redirect;
use Illuminate\Http\UploadedFile;
use Storage;
use Carbon\Carbon;
use Session;


use App\Mail\EventAdded;
use Illuminate\Support\Facades\Mail;
use App\Notifications\GigOffer;
use Nexmo\Laravel\Facade\Nexmo;

class EventsController extends Controller
{

	// create form
    public function create(){
    		return view('events.create');
    }

    // edit form
    public function edit($id){
    		$event = Event::find($id);
    		$begindate = DateTime::createFromFormat('Y-m-d', $event->event_begin);
    		$enddate = DateTime::createFromFormat('Y-m-d', $event->event_end);
    		return view('events.edit', compact('event', 'begindate', 'enddate'));
    }

    // show calendar
    public function index(){
    	$events = Event::all();
    	return view('events.index', compact('events'));
    }

    // show single event
    public function show($id){
    	$event = Event::find($id);
    	$date = DateTime::createFromFormat('Y-m-d', $event->event_begin);
    	return view('events.show', compact('event', 'date'));
    }



    // update specific event
    public function update(Request $request, $id){


    	// create rules for validation
    	$rules = array(
    		'event-title' => 'required',
    		'begin-date' => 'required',
    		'end-date' => 'required',
    		'location' => 'required',
    		'fee' => 'integer'
    	);

    	$messages = array(
    		'event-title.required' => 'Please enter an event title',
    		'event-begin.required' => 'Please enter a start date (DD-MM-YYYY)',
    		'event-end-date' => 'Please enter an end date (DD-MM-YYYY)',
    		'fee.integer' => 'Fee must be a number.'
    	);

    	//attempt validation
    	$validation = Validator::make($request->all(), $rules, $messages);

    	if ($validation->fails()){

    		return Redirect::route('events.edit', $id)->withErrors($validation)->withInput();

    	} else {

    		// process dates for database
    		$begindate = DateTime::createFromFormat('d-m-Y', $request->input('begin-date'));
    		$enddate = DateTime::createFromFormat('d-m-Y', $request->input('end-date'));

    		$confirmed = $request->input('confirmed');

    		// create new event record
    		$event = Event::find($id);

    		// set attributed for database
    		$event->event_title = $request->input('event-title');
    		$event->event_begin = $begindate;
    		$event->event_end = $enddate;
            $event->loadin = $request->input('loadin');
            $event->soundcheck = $request->input('soundcheck');
            $event->stagetime = $request->input('stagetime');
    		$event->location = $request->input('location');
    		$event->fee = (empty($request->input('fee'))) ? 0 : $request->input('fee');
    		$event->colour = $request->input('colour');
    		$event->description = $request->input('description');
    		$event->confirmed = (isset($confirmed)) ? True : False;


                $date = $request->input('begin-date');


            

    		$event->save();

    		$request->session()->flash('message', 'Successfully Updated Event!');
    		return Redirect::route('events.show', $event->id);




    	}

    }	

    // Create new event 
    public function store(Request $request){


    	//print_r(Carbon::now()->toDateString());

    	// create rules for validation
    	$rules = array(
    		'event-title' => 'required',
    		'begin-date' => 'required',
    		'end-date' => 'required',
    		'location' => 'required',
    		'fee' => 'integer'
    	);


    	// custom error messages for validation
    	$messages = array(
    		'event-title.required' => 'Please enter an event title',
    		'event-begin.required' => 'Please enter a start date (DD-MM-YYYY)',
    		'event-end-date' => 'Please enter an end date (DD-MM-YYYY)',
    		'fee.integer' => 'Fee must be a number.'

    	);

    	//attempt validation
    	$validation = Validator::make($request->all(), $rules);

    	if ($validation->fails()){

    		return redirect('events/create')->withErrors($validation)->withInput();

    	} else {

    		// process dates for database
    		$begindate = DateTime::createFromFormat('d-m-Y', $request->input('begin-date'));
    		$enddate = DateTime::createFromFormat('d-m-Y', $request->input('end-date'));
    		$confirmed = $request->input('confirmed');
    		$file = $request->file('attachment');
    		$timestamp = Carbon::now()->toDateString();
            if (!empty($file)){
         		$filename = $timestamp.$file->hashName();
    		      $readname = $file->getClientOriginalName();
              }



    		// create new event record
    		$event = new Event;
    		$event->event_title = $request->input('event-title');
    		$event->event_begin = $begindate;
    		$event->event_end = $enddate;
            $event->loadin = $request->input('loadin');
            $event->soundcheck = $request->input('soundcheck');
            $event->stagetime = $request->input('stagetime');
    		$event->location = $request->input('location');
    		$event->fee = (empty($request->input('fee'))) ? 0 : $request->input('fee');
    		$event->colour = $request->input('colour');
    		$event->description = $request->input('description');
    		$event->confirmed = (isset($confirmed)) ? True : False;
    		$event->save();

    		// now that event is saved we can check for a file and if it's there we will create a new attachment
    		if (!empty($file) && $file->isValid()){
				$s3 = Storage::disk('s3');
				$s3->put($filename, file_get_contents($file));

				$attachment = new Attachment(['location' => $filename, 'name' => $readname]);

				$event->attachments()->save($attachment);
			} 


            //mail users about new event
            Mail::to('horsebeachband@gmail.com')->send(new EventAdded($event));
            Mail::to('jason.boardman@hotmail.co.uk')->send(new EventAdded($event));
            Mail::to('mattbooth91@gmail.com')->send(new EventAdded($event));
            Mail::to('ryan-tn-fc@hotmail.co.uk')->send(new EventAdded($event));
            Mail::to('thomas.g.featherstone@hotmail.com')->send(new EventAdded($event));


            //check if we want to text the band
            if ($request->input('band-check')) {
                    $date = DateTime::createFromFormat('d-m-Y', $request->input('begin-date'));
                    $fdate = $date->format('l, jS F Y');
                    $smsfee = ($event->fee == 0) ? 'TBC' : '£'.$event->fee;

                    

                    // text me
                    Nexmo::message()->send([
                        'to' => '447885451828',
                        'from' => '447885451828',
                        'text' => 'New gig on '.$fdate.' at '.$event->location.', fee: '.$smsfee.'. Please let me know if you can make it.'
                    ]);

                    // text matt
                    Nexmo::message()->send([
                        'to' => '447427507067',
                        'from' => '447885451828',
                        'text' => 'New gig on '.$fdate.' at '.$event->location.', fee: '.$smsfee.'. Please let me know if you can make it.'
                    ]);

                    //text tom
                    Nexmo::message()->send([
                        'to' => '447545635237',
                        'from' => '447885451828',
                        'text' => 'New gig on '.$fdate.' at '.$event->location.', fee: '.$smsfee.'. Please let me know if you can make it.'
                    ]);

                    //text dave
                    Nexmo::message()->send([
                        'to' => '447964539357',
                        'from' => '447885451828',
                        'text' => 'New gig on '.$fdate.' at '.$event->location.', fee: '.$smsfee.'. Please let me know if you can make it.'
                    ]);
            }

    		$request->session()->flash('message', 'Successfully Created Event!');
    		return Redirect::route('events.show', $event->id);


    	}
    }


    public function addAttachment(Request $request, $id){
    	$event = Event::find($id);

    	$file = $request->file('attachment');
    	$timestamp = Carbon::now()->toDateString();
    	$filename = $timestamp.$file->hashName();
    	$readname = $file->getClientOriginalName();


    	if (!empty($file) && $file->isValid()){
				$s3 = Storage::disk('s3');
				$s3->put($filename, file_get_contents($file));

    			$attachment = new Attachment(['location' => $filename, 'name' => $readname]);
    			$event->attachments()->save($attachment);
		} 



    	$request->session()->flash('message', 'Successfully Added Attachment!');
    	return Redirect::route('events.show', $event->id);
    }

    public function deleteAttachment($id, $aid){
    	$event = Event::find($id);
    	$attachment = $event->attachments()->find($aid);
		Storage::disk('s3')->delete($attachment->location);
		$attachment->delete();

    	Session::flash('message', 'Successfully Deleted Attachment');
    	return Redirect::route('events.show', $event->id);

    }

    public function destroy(Request $request, $id){
    	$event = Event::find($id);
    	$attachments = $event->attachments()->get();
        $reason = $request->input('reason');

        if ($request->input('sms') == 'sms') {
            $this->resend($request, $id, [
                    'message' => 'cancel',
                    'reason' => $reason
                ]
            );
        }

    	foreach ($attachments as $attachment) {
    		Storage::disk('s3')->delete($attachment->location);
			$attachment->delete();
    	}
    	$event->delete();

    	Session::flash('message', 'Successfully Deleted Event');
    	return Redirect::route('events.index');

    }

    public function resend(Request $request, $id, $args ){

        $event = Event::find($id);
        $date = DateTime::createFromFormat('Y-m-d', $event->event_begin);
        $fdate = $date->format('l, jS F Y');
        $smsfee = ($event->fee == 0) ? 'TBC' : '£'.$event->fee;

        if ($args['message'] == 'new'){
            $message = 'New gig on '.$fdate.' at '.$event->location.', fee: '.$smsfee.'. Please let me know if you can make it.';
        } 
        if ($args['message'] == 'cancel'){
            $message = 'CANCELLED: '.$event->event_title.' on '.$fdate.' at '.$event->location.'. Reason: '.$args['reason'];
        }



                if ($request->input('ryan-check')) {
                    // text me
                    Nexmo::message()->send([
                        'to' => '447885451828',
                        'from' => '447885451828',
                        'text' => $message
                    ]);
                }

                if ($request->input('matt-check')) {

                    // text matt
                    Nexmo::message()->send([
                        'to' => '447427507067',
                        'from' => '447885451828',
                        'text' => 'New gig on '.$fdate.' at '.$event->location.', fee: '.$smsfee.'. Please let me know if you can make it.'
                    ]);
                }

                if ($request->input('tom-check')) {

                    //text tom
                   Nexmo::message()->send([
                        'to' => '447545635237',
                        'from' => '447885451828',
                        'text' => 'New gig on '.$fdate.' at '.$event->location.', fee: '.$smsfee.'. Please let me know if you can make it.'
                    ]);

                }

                if ($request->input('dave-check')) {

                    //text dave
                    Nexmo::message()->send([
                        'to' => '447964539357',
                        'from' => '447885451828',
                        'text' => 'New gig on '.$fdate.' at '.$event->location.', fee: '.$smsfee.'. Please let me know if you can make it.'
                    ]);
                }

        Session::flash('message', 'Availabilty Texts Re-sent');
        return Redirect::route('events.show', $event->id);
    }
}
