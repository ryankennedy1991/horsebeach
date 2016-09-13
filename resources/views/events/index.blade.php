
@extends('layout')

@section('title', 'calendar')
    
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

                                    <div class="widget_wrapper">

                                        <div class="widget_header">
                                            <h3 class="icos_calendar">Horsecalendar</h3>
                                        </div>

                                        <div class="widget_content">
                                            <div id="utopia-fullcalendar-2" class="utopia-calendar-day">

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



@section('extrascript')
<script type="text/javascript">
   
   
     var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    try{
        $('#utopia-fullcalendar-2').fullCalendar({
            header:{
                left:'prev,next today',
                center:'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable:true,
            height:540,
            events:[
            @foreach ($events as $event)
                {
                    title: '{{ $event->event_title }} @ {{$event->location}}',
                    start: '{{ strtotime($event->event_begin) }}',
                    end: '{{strtotime($event->event_end)}}',
                    backgroundColor: '{{$event->colour}} !important',
                    textColor: 'white',
                    url: "{{ url('/events') }}/{{ $event->id }}"
                },
            @endforeach    
            ]
        });
    } catch (e){
        errorMessage(e);
    }

</script>

@endsection


@endsection

