@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><b>Reset Password</b></h3>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-group form-group-lg{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username" required>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group form-group-lg">
                            <div class="col-md-6">
                                <div class="row">
                                    <a class="btn" href="{{ route('login') }}">
                                        Back to Login
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <button type="submit" class="btn btn-primary pull-right">
                                        Send Password Reset Link
                                    </button>
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
