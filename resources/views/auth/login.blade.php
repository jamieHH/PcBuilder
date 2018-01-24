@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><b>Login</b></h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group form-group-lg{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input id="email" type="email" class="form-control" name="email" placeholder="Username" value="{{ old('email') }}" required autofocus>
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
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group form-group-lg">
                            <div class="col-md-6">
                                <div class="row">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <a class="btn btn-block" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
