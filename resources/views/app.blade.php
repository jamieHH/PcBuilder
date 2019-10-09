<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('structure.head')
    </head>
    <body>
        <div id="app">
            @include('structure.navbar')

            <div class="container-fluid" style="height: 100%;">
                <div class="row" style="height: 100%;">
                    @guest
                        <div class="col-sm-12 main">
                            @yield('content')
                        </div>
                    @else
                        <div class="col-sm-3 col-md-2 d-none d-sm-block sidebar">
                            @include('structure.sidebar')
                        </div>

                        <div class="col-sm-9 ml-sm-auto col-md-10 pt-3 main">
                            @yield('content')
                        </div>
                    @endguest
                </div>
            </div>
        </div>

        @yield('page-modals')

        @include('structure.footer')

        @yield('page-javascript')
    </body>
</html>
