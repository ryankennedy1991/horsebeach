<div class="highligts_content">

<!-- Mobile links -->

    <div class="container-fluid">
        <div class="iMenu">
            <div class="row-fluid">
                <div class="span12">
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <a class="btn tip-top" title="Dashboard" href="{{url('/dashboard')}}"><i class="icon-home"></i></a>
                            <a class="btn tip-top" title="Calendar" href="{{url('/events')}}"><i class="icon-cog"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- mobile links end -->


<!-- Highlight buttons -->

        <div class="stats">
            <div class="row-fluid">
                <div class="span12">
                    <div class="statistics">
                        <ul class="quickstats">
                           
                            <li class="green gradient">
                                <a href="{{ url('/events/create')}}">
                                    <img alt="" src="{{ URL::asset('img/icons/black/glyphicons_023_cogwheels.png') }}">
                                    <span>Create new event</span>
                                </a>
                            </li>
                        </ul>
                    </div><!-- statistics end -->
                </div>
            </div>
        </div>

    </div>
</div>

<!-- hightlights_content end -->