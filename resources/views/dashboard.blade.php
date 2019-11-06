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
                <a href="#">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <i class="fa fa-microchip"></i> Memory
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <i class="fa fa-microchip"></i> Storage
                        </div>
                    </div>
                </a>
            </div>
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
@endsection
