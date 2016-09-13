@extends('layout')


@section('title', 'Login')

@section('body')
<div class="container-fluid">

    <div class="row-fluid">
    


        <div class="span12">


            <div class="login">

                <div class="alert alert-error">
        <button data-dismiss="alert" class="close" type="button">×</button>
            <strong>Error!</strong> 
            @if (!empty($fail))
                {{ $fail }}    
            @endif
    </div>
                <img src="img/user.png" alt="user" class="glossy"/>
                <form action="{{ url('/login') }}" method="post">
                {{ csrf_field() }}
                    <input type="text" id='email' name="Email" placeholder="Email" class="span12 form-group{{ $errors->has('email') ? ' has-error' : '' }}"/>
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
                </form>
            </div>
        </div>

    </div>

</div>

@endsection

