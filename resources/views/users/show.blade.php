
@extends('layout')

@section('title', 'Settings')
    
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
                                        <h3>Account Settings</h3>
                                        <span>{{$user->name}}</span>
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

<<<<<<< HEAD
                                <p>Name: {{$user->name}}</p>
                                <p>Email Address: {{$user->email}}</p>

=======
                                {{$user->email}}
>>>>>>> 076c5bcf7b0c241df195d9410eb8710493d972e7

                                                          



                                                    
                                             
                                   
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

