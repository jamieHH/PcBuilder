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

        @yield('page-modals')

        @include('structure.footer')

        @yield('page-javascript')
    </body>
</html>
