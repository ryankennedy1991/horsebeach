
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

                                <p>Name: {{$user->name}} - <a href="#nameModal" role="button" data-toggle="modal">edit</a></p>
                                <p>Email Address: {{$user->email}} - <a href="#emailModal" role="button" data-toggle="modal">edit</a></p>
                                <p>Phone Number: {{($user->phone_number) ? $user->phone_number : "No number, please add one."}} - <a href="#phoneModal"  role="button" data-toggle="modal">edit</a></p>


                                        <div class="widget_content">
                                            

                                            <div class="modal hide fade" id="nameModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: hidden;">
                                                <div class="modal-header">
                                                <form action="{{ url('/users') }}/{{$user->id}}/edit" method="POST">
                                                {{ csrf_field() }}
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h3 id="myModalLabel">Edit name</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" name="name" value="{{$user->name}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="widget_content">
                                            


                                            <div class="modal hide fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: hidden;">
                                                <div class="modal-header">
                                                <form action="{{ url('/users') }}/{{$user->id}}/edit" method="POST">
                                                {{ csrf_field() }}
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h3 id="myModalLabel">Edit email</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" name="email" value="{{$user->email}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="widget_content">
                                            


                                            <div class="modal hide fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: hidden;">
                                                <div class="modal-header">
                                                <form action="{{ url('/users') }}/{{$user->id}}/edit" method="POST">
                                                {{ csrf_field() }}
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h3 id="myModalLabel">Edit phone number</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Include code e.g 07885451828 should be 447885451828</p>
                                                    <input type="text" name="phone" value="{{$user->phone_number}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>


                                        <a href="{{url('password/reset')}}">Reset Password</a>



                                                          



                                                    
                                             
                                   
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

