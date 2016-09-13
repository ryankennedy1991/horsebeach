@extends('layout')


@section('title', 'Login')

@section('body')
<div class="container-fluid">

    <div class="row-fluid">
    




        <div class="span12">
            <div class="login">
                 @if (!empty($fail))
                <div class="alert alert-error">
                <button data-dismiss="alert" class="close" type="button">×</button>
                <strong>Error!</strong> 
                           
                            {{ $fail }}    
                           
                </div>
                 @endif
                <img src="img/user.png" alt="user" class="glossy"/>
                <form action="{{ url('/login') }}" method="post">
                {{ csrf_field() }}
                    <input type="text" id="email" name="email" placeholder="Email" class="span12 form-group{{ $errors->has('email') ? ' has-error' : '' }}"/>

                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                    <input type="password" name="password" placeholder="Password" class="span12 form-group{{ $errors->has('password') ? ' has-error' : '' }}"/>

                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif

                    <input type="submit" name="login" value="Login" class="btn btn-info span12"/>
                    <br/>
                    <div class="center"><span class="center"><a class="center" href="{{ url('/password/reset')}}">Forgot password?</a></span></div>
                </form>
            </div>
        </div>

    </div>

</div>

@endsection



