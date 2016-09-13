

@extends('layout')

@section('body')
<div class="container">
    <div class="row">



        <div class="container-fluid">

    <div class="row-fluid">
    




        <div class="span12">
            <div class="login">
  
                
                <form action="{{ url('/password/reset') }}" method="POST">
                {{ csrf_field() }}

                
                                <input id="email" type="text" class="span12 form-group{{ $errors->has('email') ? ' has-error' : '' }}" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        
                                 <input id="password" type="password" class="span12 form-group{{ $errors->has('password') ? ' has-error' : '' }}" name="password" placeholder="Password" value="{{ old('password') }}" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                 <input id="password_confirmation" type="password" class="span12 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" name="password_confirmation" placeholder="Password Confirmation" value="{{ old('password_confirmation') }}" required autofocus>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif

                                <br>
                        

                    <input type="submit" name="reset" value="Send Password Reset" class="btn btn-info span12"/>
                </form>
            </div>
        </div>

    </div>

</div>


@endsection



