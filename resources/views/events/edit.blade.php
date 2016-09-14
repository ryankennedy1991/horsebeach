
@extends('layout')

@section('title', 'Edit Event')
    
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
                                        <h3>Calendar</h3>
                                        <span>Gigs 'n' Events</span>
                                    </div>
                                </div>

                                

                            </div>

                            <div class="separator">
                                <span></span>
                            </div>

                            

                             <div class="row-fluid">

                                <div class="span12">

                                    <div class="widget_wrapper">

                                        <div class="widget_header">
                                            <h3 class="icos_pen">Edit Event</h3>
                                        </div>

                                        <div class="widget_content no-padding">
                                        {!! Form::open(['method' => 'PATCH', 'action' => ['EventsController@update', $event->id]]) !!}

                                            <div class="form_inputs clearfix">
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        <label class="control-label">Event Title:</label>
                                                    </div>

                                                    <div class="span10">
                                                        <input value="{{$event->event_title}}" type="text" name="event-title" placeholder="Event Title" class="span11"/>
                                                    </div>
                                                </div>
                                            </div>
                                             @if ($errors->has('event-title'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('event-title') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form_inputs clearfix">
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        <label class="control-label">Begin Date:</label>
                                                    </div>

                                                    <div class="span2">
                                                        <input value="{{$begindate->format('d-m-Y')}}" type="text" name="begin-date" placeholder="e.g 27-02-2016" class="span11 dpicker">
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($errors->has('begin-date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('begin-date') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form_inputs clearfix">
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        <label class="control-label">End Date:</label>
                                                    </div>

                                                    <div class="span2">
                                                        <input value="{{$enddate->format('d-m-Y')}}" type="text" name="end-date" placeholder="e.g 27-02-2016" class="span11 dpicker">
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($errors->has('end-date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('end-date') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form_inputs clearfix">
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        <label class="control-label">Location:</label>
                                                    </div>

                                                    <div class="span10">
                                                        <input value="{{$event->location}}" type="text" name="location" placeholder="e.g Dave's house" class="span11"/>
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($errors->has('location'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('location') }}</strong>
                                                </span>
                                            @endif

                                              <div class="form_inputs clearfix">
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        <label class="control-label">Fee:</label>
                                                    </div>

                                                    <div class="span10">
                                                        <div class="input-prepend">
                                                            <span class="add-on">£ </span> <input value="{{$event->fee}}" type="text" name="fee" placeholder="2000" style="width: 87%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                              @if ($errors->has('fee'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('fee') }}</strong>
                                                </span>
                                            @endif

                                            <div class="form_inputs clearfix">
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        <label class="control-label">Colour:</label>
                                                    </div>

                                                    <div class="span10">
                                                        <div class="input-prepend">
                                                            <input value="{{$event->colour}}" type="text" name="colour" placeholder="" id="color1" class="color1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                              @if ($errors->has('colour'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('colour') }}</strong>
                                                </span>
                                            @endif

                                             <div class="form_inputs clearfix">
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        <label class="control-label">Description:</label>
                                                    </div>

                                                    <div class="span10">
                                                        <textarea rows="3" name="description" placeholder="What's going down?" class="span11 elastic textEditor">{{$event->description}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form_inputs clearfix">
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        <label class="control-label">Confirmed?</label>
                                                    </div>

                                                    <div class="span10">
                                                        <input value="{{$event->confirmed}}" type="checkbox" name="confirmed" class="radio1" {{($event->confirmed == 1) ? 'checked' : "" }}>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form_inputs clearfix">

                                                <input type="submit" name="Edit Event" value="Save Event" class="btn btn-info "/>
                                            
                                                
                                                </form>
                                                <input type="submit" name="Delete Event" value="Delete Event" class="btn btn-danger "/>
                                            </div>
                                        </div>
                                    </div><!-- widget_wrapper end -->

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

@section('extrascript')
    <script language="javascript">
      jQuery(document).ready(function($){
        $('#color1').colorPicker();
    })
    </script>
@endsection

