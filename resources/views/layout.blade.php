<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A complete admin panel theme">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="smronju">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-responsive.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/colorPicker.css') }}" type="text/css" />

    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.isotope.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.infinitescroll.min.js') }}"></script>

    @yield('extracss')

    <!--[if IE]>
    <script type="text/javascript" src="js/modernizr.custom.js') }}"></script>
    <script type="text/javascript" src="js/excanvas.js') }}"></script>
    <![endif]-->

    <!--[if IE 8]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js') }}"></script>
    <link href="css/ie8.css" rel="stylesheet">
    <![endif]-->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js') }}"></script>
    <![endif]-->

    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient ul li {
            filter: none;
        }
    </style>
    <![endif]-->
</head>

<body>

@yield('body')

<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.pie.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.resize.js') }}"></script>

<script type="text/javascript">
$(function(){
    /* Chart js start */

    var bolt = {
        showTooltip: function (x, y, contents) {
            $('<div class="bolt_tips">' + contents + '</div>').css( {
                position: 'absolute',
                display: 'none',
                top: y + 5,
                left: x + 5
            }).appendTo("body").fadeIn(200);
        }

    }

    if (!!$(".plots").offset() ) {
        var sin = [];
        var cos = [];

        for (var i = 0; i <= 20; i += 0.5){
            sin.push([i, Math.sin(i)]);
            cos.push([i, Math.cos(i)]);
        }

        // Display the Sin and Cos Functions
        $.plot($(".plots"), [ { label: "Cos", data: cos }, { label: "Sin", data: sin } ],
            {
                colors: ["#00AADD", "#FF6347"],

                series: {
                    lines: {
                        show: true,
                        lineWidth: 2
                    },
                    points: {show: true},
                    shadowSize: 2
                },

                grid: {
                    hoverable: true,
                    show: true,
                    borderWidth: 0,
                    labelMargin: 12
                },

                legend: {
                    show: true,
                    margin: [0,-24],
                    noColumns: 0,
                    labelBoxBorderColor: null
                },

                yaxis: { min: -1.2, max: 1.2},
                xaxis: {}
            });

        // Tooltip Show
        var previousPoint = null;
        $(".plots").bind("plothover", function (event, pos, item) {
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    $(".charts_tooltip").fadeOut("fast").promise().done(function(){
                        $(this).remove();
                    });
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    bolt.showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
                }
            }
            else {
                $(".bolt_tips").fadeOut("fast").promise().done(function(){
                    $(this).remove();
                });
                previousPoint = null;
            }
        });
    }

    /* Chart js end */
});
</script>
<div class="footer_wrapper">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="footer">
                    Horsebeach Ltd, All Rights Reserved 2016
                </div><!-- footer end -->
            </div>
        </div>
    </div>
</div><!-- footer_wrapper end -->



<script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.elastic.source.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-colorpicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.maskedinput-1.3.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.uniform.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/chosen.jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.ibutton.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.ui.spinner.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.mousewheel.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.validationEngine-en.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.validationEngine.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.smartWizard-2.0.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.filedrop.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/colResizable-1.3.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.tablesorter.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jshashtable-2.1_src.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.numberformatter-1.2.3.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/tmpl.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.dependClass-0.1.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/draggable-0.1.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.slider.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/fullcalendar.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.easytabs.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.cleditor.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.colorbox.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/blocksit.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.montage.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/raphael.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.embedly.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flowplayer-3.2.11.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flowplayer.controls-3.2.10.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flowplayer.playlist-3.2.10.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.colorPicker.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.fileupload.js') }}"></script>


@yield('extrascript')
</body>
</html>