<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('structure.head')
    </head>
    <body>
        <div id="app">
            @include('structure.navbar')

            @yield('content')
        </div>

        @include('structure.footer')

        @yield('page-modals')

        @yield('page-javascript')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
