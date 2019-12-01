<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Pc Builder | Development</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            @include('structure.navbar')

            <div class="container-fluid" style="height: 100%;">
                <div class="row" style="height: 100%;">
                    <div class="col-sm-3 col-md-2 d-none d-sm-block sidebar">
                        @include('structure.sidebar')
                    </div>
                    <div class="main">
                        @isset($breadcrumbs)
                            <div class="breadcrumb-bar">
                                <ul class="breadcrumb">
                                    @foreach($breadcrumbs as $key => $value)
                                        <li style="">
                                            @if($value != '#')<a href="{{ $value }}">{{ $key }}</a>@else<b>{{ $key }}</b>@endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endisset
                        <div class="col-sm-12 main-content">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('page-modals')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        @yield('page-javascript')
    </body>
</html>
