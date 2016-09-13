@extends('layout')

@section('body')
<div class="container">
    <div class="row">



        <div class="container-fluid">

    <div class="row-fluid">
    




        <div class="span12">
            <div class="login">
  
                <img src="img/user.png" alt="user" class="glossy"/>
                <form action="{{ url('/register') }}" method="post">
                {{ csrf_field() }}

                
                                <input id="name" type="text" class="span12 form-group{{ $errors->has('name') ? ' has-error' : '' }}" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif


                                <input id="email" type="email" class="span12 form-group{{ $errors->has('email') ? ' has-error' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                <input id="password" type="password" class="span12 form-group{{ $errors->has('password') ? ' has-error' : '' }}" name="password" placeholder="Password" value="{{ old('password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <input id="email" type="password" class="span12 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" name="password_confirmation" placeholder="Password Confirmation" value="{{ old('password_confirmation') }}" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        
                        

                    <input type="submit" name="Register" value="Register" class="btn btn-info span12"/>
                </form>
            </div>
        </div>

    </div>

</div>



@endsection