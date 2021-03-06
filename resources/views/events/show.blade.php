
@extends('layout')

@section('title', $event->event_title)
    
@section('body')



                
@include('topnav')





@include('highlights')


<div class="contentainer_wrapper">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <div class="wrapper">


<!-- sidebar_navigation start -->
        @include('sidenav', ['current_page' => '2'])

<!-- sidebar_navigation end -->

                    <div class="content_wrapper">

                        <div class="contents">

                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="ico_16_dashboard content_header">
                                        <h3>{{$event->event_title}}</h3>
                                        <span>{{$event->location}}</span>
                                    </div>
                                </div>


                               


                            </div>

                            <div class="separator">
                                <span></span>
                            </div>

                            
<div class="row-fluid">
                                <div class="span12">



                                @if (isset(Session::all()['message']))
                                     <div class="alert alert-success">
                                    <button data-dismiss="alert" class="close" type="button">×</button>
                                            <strong>{{ Session::all()['message'] }}</strong> 
                                    </div>
                                     
                                @endif

                                    <div class="widget_wrapper">
                                        <div class="widget_header">
                                            <h3 class="icos_list">Event Details</h3>
                                        </div>
                                        <div class="widget_content">
                                            <div class="row-fluid">
                                                <div class="span12" style="float:left;">
                                                        <iframe
                                                              width="100%"
                                                              height="250"
                                                              frameborder="0" style="border:0"
                                                              src="https://www.google.com/maps/embed/v1/search?key=AIzaSyBwr4TMo_HMtkngDJ2h51QyCCOTDrzZeH4&q={{$event->location}}" allowfullscreen>
                                                        </iframe>

                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="separator">
                                                             <span></span>
                                                </div>
                                                <div class="row-fluid">

                                                    <div class="span12">
                                                          <h2>{{$event->event_title}}</h2>
                                                          <h3>where: {{$event->location}}</h3>
                                                          <h3>when: {{ $date->format('d M Y')}}</h3>
                                                          <h3>fee: @if (empty($event->fee)) TBC @else £{{$event->fee}} @endif</h3>
                                                          @if ($event->confirmed) <h3 class="confirmed">Confirmed</h3> @else <h3 class="notconfirmed">Not Confirmed</h3> @endif
                                                          <b></b>
                                                            <div class="separator">
                                                                <span></span>
                                                            </div>
                                                            <h3>Advance Details:</h3>
                                                            <h4>Load in: {{ ($event->loadin) ? $event->loadin : "TBC"}}</h4>
                                                            <h4>Sound Check / Line Check: {{ ($event->soundcheck) ? $event->soundcheck : "TBC"}} </h4>
                                                            <h4>Stage Time: {{ ($event->stagetime) ? $event->stagetime : "TBC"}}</h4>



                                                              <div class="separator">
                                                                <span></span>
                                                            </div>
                                                          
                                                          
                                                          <h4>Description:</h4>
                                                          <p> {!! $event->description !!} </p>

                                                            <div class="separator">
                                                                <span></span>
                                                            </div>

                                                            <h4>Attachments:</h4>
                                                            <div class="row-fluid">
                                                            <div class="span12">
                                                            
                                                               @foreach ($event->attachments()->get() as $attachment)
                                                                   <div><a href="{{ Storage::disk('s3')->url($attachment->location) }}">{{ $attachment->name }}</a>
                                                                    {!! Form::open(['route' => ['deleteAttachment', $event->id, $attachment->id], 'style' => 'display:inline;']) !!} 
                                                                    <span> - </span>
                                                                   <input style="display:inline-block;" class="" type="submit" value="Delete"></form>
                                                                   </div>


                                                                   


                                                               @endforeach    
                                                            
                                                            </div>
                                                            </div>
                                                            <br/>
                                                            <h4>Add Attachment:</h4>
                                                            {!! Form::open(['enctype' => 'multipart/form-data', 'route' => ['addAttachment', $event->id]]) !!}
                                                                {!! Form::file('attachment') !!}

                                                                {!! Form::submit('Upload') !!}
                                                            {!! Form::close() !!}
                                                            <div class="separator">
                                                                <span></span>
                                                            </div>
                             <div class="row-fluid">                               
                                <div class="span12">

                                    <div class="widget_wrapper">

                                        <div class="widget_header " >
                                            <h3 class="icos_mail">Resend availability SMS's</h3>
                                        </div>

                                        <div class="widget_content" >
                                            <p>Who should we ask for availability?</p>
                                            <form action="{{ url('/events/resend')}}/{{$event->id}}" method="POST">
                                            {{ csrf_field() }}
                                            Ryan <input type="checkbox" name="ryan-check"><br>
                                            Matt <input type="checkbox" name="matt-check"><br>
                                            Tom <input type="checkbox" name="tom-check"><br>
                                            Dave <input type="checkbox" name="dave-check"><br>
                                            <br>

                                            <input type="submit" name="send-texts" value="Resend">
                                            </form>
                                        </div>

                                    </div><!-- widget_wrapper end -->
                                </div>
                                </div>

                                        <div class="separator">
                                                                <span></span>
                                                            </div>

                                                            <a class="btn btn-success" href="/events/{{$event->id}}/edit">Edit Event</a>


                                                            @if ($event->confirmed) 
                                                            <div class="modal hide fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: hidden;">
                                                                <div class="modal-header">
                                                                   
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h3 id="myModalLabel">Cancel Event</h3>
                                                                </div>

                                                                {!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id ], 'style' => 'display:inline;']) !!}
                                                                <div class="modal-body">
                                                                    <div class="widget_wrapper">

                                                                        <div class="widget_header " >
                                                                        <h3 class="icos_mail">Cancellation SMS's</h3>
                                                                        </div>

                                                                        <div class="widget_content" >
                                                                            <p>Who should we send cancellation SMS's to?</p>
                                                                            
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" name="sms" value="sms">
                                                                            Ryan <input type="checkbox" name="ryan-check"><br>
                                                                            Matt <input type="checkbox" name="matt-check"><br>
                                                                            Tom <input type="checkbox" name="tom-check"><br>
                                                                            Dave <input type="checkbox" name="dave-check"><br>
                                                                            <br>

                                                                            Why was it cancelled? <br/><input type="text" name="reason">

                                                                
                                                                            
                                                                        </div>

                                                                    </div><!-- widget_wrapper end -->

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                                    
                                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                            {!! Form::close() !!}
                                                                </div>
                                                                </form>
                                                                
                                                                </div>

                                                            <a class="btn-danger btn" href="#deleteModal" role="button" data-toggle="modal">Cancel Event</a>

                                                            @else
                                                            <div class="modal hide fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: hidden;">
                                                                <div class="modal-header">
                                                                   
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h3 id="myModalLabel">Delete Event</h3>
                                                                </div>
                                                                <div class="modal-body">
                                                                   <p>Are you sure you wnat to delete this event?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id ], 'style' => 'display:inline;']) !!}
                                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                            {!! Form::close() !!}
                                                                </div>
                                                                </form>
                                                                
                                                                </div>

                                                            <a class="btn-danger btn" href="#deleteModal" role="button" data-toggle="modal">Delete</a>
                                                            @endif
                                                            
                                                            


                                                          



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div><!-- content end -->

                    </div><!-- content_wrapper end -->
                </div><!-- wrapper end -->
            </div>
        </div>
    </div>
</div><!-- container_wrapper end -->

    


@endsection

@section("extrascript")
 <script type="text/javascript">
     $('#collapsible').collapse("hide");

 </script>

@endsection

