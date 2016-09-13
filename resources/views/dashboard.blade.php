
@extends('layout')

@section('title', 'Dashboard')
    
@section('body')

@include('topnav')





@include('highlights')

<div class="contentainer_wrapper">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <div class="wrapper">


<!-- sidebar_navigation start -->
         @include('sidenav', ['current_page' => '1'])

<!-- sidebar_navigation end -->

                    <div class="content_wrapper">

                        <div class="contents">

                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="ico_16_dashboard content_header">
                                        <h3>Dashboard</h3>
                                        <span>General Information</span>
                                    </div>
                                </div>

                                

                            </div>

                            <div class="separator">
                                <span></span>
                            </div>
                            <div class="row-fluid">

                                <!--Chart Icons -->
                                <div class="span3">
                                    <div class="bolt-chart-legend">
                                        <div class="bolt-chart-icon">
                                            <img src="img/icons/colored/clock.png"/>
                                        </div>
                                        <div class="bolt-chart-heading">{{$events}}</div>
                                        <div class="bolt-chart-desc">UPCOMING GIGS</div>
                                    </div>
                                </div>

                                <div class="span3">
                                    <div class="bolt-chart-legend">
                                        <div class="bolt-chart-icon">
                                            <img src="img/icons/colored/coin.png"/>
                                        </div>
                                        <div class="bolt-chart-heading">0</div>
                                        <div class="bolt-chart-desc">SOME KIND OF STAT</div>
                                    </div>
                                </div>

                                <div class="span3">
                                    <div class="bolt-chart-legend">
                                        <div class="bolt-chart-icon">
                                            <img src="img/icons/colored/hand_point.png"/>
                                        </div>
                                        <div class="bolt-chart-heading">0</div>
                                        <div class="bolt-chart-desc">ANOTHER STAT</div>
                                    </div>
                                </div>

                                <div class="span3">
                                    <div class="bolt-chart-legend">
                                        <div class="bolt-chart-icon">
                                            <img src="img/icons/colored/messenger.png"/>
                                        </div>
                                        <div class="bolt-chart-heading">0</div>
                                        <div class="bolt-chart-desc">SO MANY STATS</div>
                                    </div>
                                </div>
                                <!--Chart Icons End -->
                            </div>
                            

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


@sectionend

