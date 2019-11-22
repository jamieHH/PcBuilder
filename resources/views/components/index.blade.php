@extends('app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('components.motherboards') }}">
            <div class="panel panel-default">
                <div class="panel-body">
                    <i class="fa fa-microchip"></i> Motherboards
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('components.processors') }}">
            <div class="panel panel-default">
                <div class="panel-body">
                    <i class="fa fa-microchip"></i> Processors
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('components.memory-devices') }}">
            <div class="panel panel-default">
                <div class="panel-body">
                    <i class="fa fa-microchip"></i> Memory
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('components.storage-devices') }}">
            <div class="panel panel-default">
                <div class="panel-body">
                    <i class="fa fa-microchip"></i> Storage
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('components.gpus') }}">
            <div class="panel panel-default">
                <div class="panel-body">
                    <i class="fa fa-microchip"></i> GPUs
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
