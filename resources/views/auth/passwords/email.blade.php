

@extends('layout')

@section('body')
<div class="container">
    <div class="row">



        <div class="container-fluid">

    <div class="row-fluid">
    




        <div class="span12">
            <div class="login">
  
                
                <form action="{{ url('/password/email') }}" method="POST">
                {{ csrf_field() }}

                
                                <input id="email" type="text" class="span12 form-group{{ $errors->has('email') ? ' has-error' : '' }}" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        
                        

                    <input type="submit" name="reset" value="Send Password Reset" class="btn btn-info span12"/>
                </form>
            </div>
        </div>

    </div>

</div>


@endsection



