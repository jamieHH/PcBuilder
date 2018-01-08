<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="height: 100%;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

</head>
<body style="
    height: 100%;
    position: relative; /* 1. Position relative because of absolute child elements */
    padding: 50px 0 0px 0; /* 2. Using padding to define strech-able space */
    box-sizing: border-box; /* 3. Box sizing to subtract padding and border from the 100% height of this element when child elements define 100% height */
">
    <div id="app" style="height: 100%;">

        <nav class="navbar navbar-default navbar-static-top" style="
            margin-bottom: 0px;
            position: absolute;
            width: 100%;
            top: 0;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid" style="height: 100%;">
            <div class="row" style="height: 100%;">
                <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar" style="background-color: dimgrey; height: 100%; overflow: scroll;">
                    <a href="{{ route('cpus') }}">
                        <div class="row">
                            <span>Cpus</span>
                        </div>
                    </a>
                    <a href="{{ route('gpus') }}">
                        <div class="row">
                            <span>Gpus</span>
                        </div>
                    </a>
                </nav>



                <div class="col-sm-9 ml-sm-auto col-md-10 pt-3" style="height: 100%;">
                    <div class="row" style="height: 100%;">
                        <main role="main" style="
                                height: 100%;
                                position: relative;
                                padding: 38px 0 38px 0;
                                box-sizing: border-box;">

                            {{--<script>   //causes page style to be uneditable in dev tools--}}
                                {{--$(function(){--}}
                                    {{--var x = 0;--}}
                                    {{--var y = 0;--}}
                                    {{--setInterval(function(){--}}
                                        {{--x-=1;--}}
                                        {{--y+=1;--}}
                                        {{--$('#backdrop').css('background-position', x + 'px ' + y + 'px');--}}
                                    {{--}, 50);--}}
                                {{--})--}}
                            {{--</script>--}}

                            {{--
                                background-image:url('/util/images/background');
                                background-size: 120px 120px;
                            --}}

                            <div id="backdrop" style="
                                height: 100%;
                                padding: 10px;
                                background-color: #012353;
                                overflow: scroll;">

                                    @yield('content')

                            </div>
                        </main>
                        <div class="col-md-12" style="
                            background-color: lightgrey;
                            height: 38px;
                            position: absolute;
                            width: 100%;
                            top: 0px;">
                            <h5>
                                <strong>
                                    Bread Crumbs / To / This Page
                                </strong>
                            </h5>
                        </div>

                        <div class="col-md-12" style="
                            background-color: lightgrey;
                            height: 38px;
                            position: absolute;
                            width: 100%;
                            bottom: 0px;
                        ">
                            <h5>
                                <strong>
                                    <a href="#">Privacy Policy</a>
                                    <a href="#" class="pull-right">Terms of use</a>
                                </strong>
                            </h5>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
