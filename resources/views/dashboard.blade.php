@extends('app')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tachometer"></i><b>Dashboard</b></h3>
        </div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('components.motherboards') }}">
                        <div class="panel panel-default">
{{--                            <img src="{{ asset('images/cpu-img.jpg') }}" alt="CPU Image" class="img-responsive">--}}
                            <div class="panel-body">
                                <i class="fa fa-newspaper-o"></i> Motherboards
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('components.processors') }}">
                        <div class="panel panel-default">
{{--                            <img src="{{ asset('images/cpu-img.jpg') }}" alt="CPU Image" class="img-responsive">--}}
                            <div class="panel-body">
                                <i class="fa fa-microchip"></i> Processors
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('components.memory-devices') }}">
                        <div class="panel panel-default">
{{--                            <img src="{{ asset('images/cpu-img.jpg') }}" alt="CPU Image" class="img-responsive">--}}
                            <div class="panel-body">
                                <i class="fa fa-microchip"></i> Memory Devices
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('components.storage-devices') }}">
                        <div class="panel panel-default">
{{--                            <img src="{{ asset('images/cpu-img.jpg') }}" alt="CPU Image" class="img-responsive">--}}
                            <div class="panel-body">
                                <i class="fa fa-database"></i> Storage Devices
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('components.gpus') }}">
                        <div class="panel panel-default">
{{--                            <img src="{{ asset('images/cpu-img.jpg') }}" alt="CPU Image" class="img-responsive">--}}
                            <div class="panel-body">
                                <i class="fa fa-hdd-o"></i> Graphics Cards
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-hdd-o"></i>Systems</b></h3>
        </div>
        <div class="panel-body">
            @guest
                <a href="{{ route('systems') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Sign-in to view your Systems</a>
            @else
                Pre-Configured Systems
            @endguest
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-cubes"></i>Inventories</b></h3>
        </div>
        <div class="panel-body">
            @guest
                <a href="{{ route('inventories') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Sign-in to view your Inventories</a>
            @else
                Inventory Collections
            @endguest
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-list"></i>Parts Lists</b></h3>
        </div>
        <div class="panel-body">
            @guest
                <a href="{{ route('lists') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Sign-in to view your Saved Lists</a>
            @else
                Item Favorites
            @endguest
        </div>
    </div>
</div>
@endsection
