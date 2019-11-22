@extends('app')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b>Dashboard</b></h3>
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
                            <div class="panel-body">
                                <i class="fa fa-microchip"></i> Motherboards
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('components.processors') }}">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <i class="fa fa-microchip"></i> Processors
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('components.memory-devices') }}">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <i class="fa fa-microchip"></i> Memory
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('components.storage-devices') }}">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <i class="fa fa-microchip"></i> Storage
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('components.gpus') }}">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <i class="fa fa-microchip"></i> GPUs
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b>Systems</b></h3>
        </div>
        <div class="panel-body">
            Pre-Configured Systems
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b>Inventories</b></h3>
        </div>
        <div class="panel-body">
            Inventory Collections
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b>Parts Lists</b></h3>
        </div>
        <div class="panel-body">
            Item Favorites
        </div>
    </div>
</div>
@endsection
