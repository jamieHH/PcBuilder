@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><b>Register</b></h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group form-group-lg{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Full Name" value="{{ old('name') }}" required autofocus>
                            </div>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group form-group-lg{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group form-group-lg{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group form-group-lg">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                            <button type="submit" class="btn btn-block btn-primary">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
