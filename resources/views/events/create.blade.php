
@extends('layout')

@section('title', 'Create New Events')
    
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
                                            <h3 class="icos_pen">Create Event</h3>
                                        </div>

                                        <div class="widget_content no-padding">

                                        {!! Form::open(['enctype' => 'multipart/form-data', 'route' =>'events.store']) !!}
                                    

                                            <div class="form_inputs clearfix">
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        {!! Form::label('event-title', 'Event Title:') !!}
                                                    </div>

                                                    <div class="span10">
                                                        {!! Form::text('event-title', null , ['class' => 'span11', 'placeholder' => 'Event Title']) !!}
                                                       
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
                                                        {!! Form::label('begin-date', 'Begin Date:') !!}
                                                    </div>

                                                    <div class="span2">
                                                        {!! Form::text('begin-date', null, ['placeholder' => 'e.g 27-02-2016', 'class' => 'span11 dpicker']) !!}
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
                                                        {!! Form::label('end-date', 'End Date:') !!}
                                                    </div>

                                                    <div class="span2">
                                                        {!! Form::text('end-date', null, ['placeholder' => 'e.g 27-02-2016', 'class' => 'span11 dpicker']) !!}
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
                                                        {!! Form::label('location', 'Gig Location:') !!}
                                                    </div>

                                                    <div class="span10">
                                                        {!! Form::text('location', null,['class' => 'span11', 'placeholder' => 'e.g Dave\'s House']) !!}
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
                                                        {!! Form::label('fee', 'Gig Fee:') !!}
                                                    </div>

                                                    <div class="span10">
                                                        <div class="input-prepend">
                                                            <span class="add-on">£ </span> 
                                                            {!! Form::text('fee', 0, ['style' => 'width:87%', 'placeholder' => '2000']) !!}
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
                                                        {!! Form::label('colour', 'Colour:') !!}
                                                    </div>

                                                    <div class="span10">
                                                        <div class="input-prepend">
                                                            {!! Form::text('colour', null, ['id' => 'color1', 'class' => 'color1']) !!}
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
                                                        {!! Form::label('description', 'Description:') !!}
                                                    </div>

                                                    <div class="span10">
                                                        {!! Form::textarea('description', null, ['placeholder' => 'What\'s Going down?', 'class' => 'textEditor span11 elastic']) !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form_inputs clearfix">
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        {!! Form::label('confirmed', 'Confirmed?') !!}
                                                    </div>

                                                    <div class="span10">

                                                        <input type="checkbox" name="confirmed" class="radio1">
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form_inputs clearfix">
                                                <div class="row-fluid">
                                                    <div class="span2">
                                                        {!! Form::label('attachment', 'Attachment:') !!}
                                                    </div>

                                                    <div class="span10">
                                                        {!! Form::file('attachment') !!}
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="form_inputs">
                                                <input type="submit" name="create-event" value="Create Event" class="btn btn-info"/>
                                            </div>
                                            {!! Form::close() !!}

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


<<<<<<< HEAD
@endsection
=======
@sectionend
>>>>>>> 076c5bcf7b0c241df195d9410eb8710493d972e7

@section('extrascript')
    <script language="javascript">
      jQuery(document).ready(function($){
        $('#color1').colorPicker();
    })
    </script>
@endsection

