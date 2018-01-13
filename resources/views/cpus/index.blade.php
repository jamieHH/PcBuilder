@extends('layouts.app')

@section('content')
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Search Cpus</h1>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            {{--why does this overflow not work--}}
                            <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Core Count</th>
                                    <th>Base Clock</th>
                                    <th>Boost Clock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cpus as $cpu)
                                    <tr>
                                        <td>{{ $cpu->getName() }}</td>
                                        <td>{{ $cpu->getCoreCount() }}</td>
                                        <td>{{ $cpu->getBaseClock() }}</td>
                                        <td>{{ $cpu->getBoostClock() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-danger">Delete Thing</button>
                        <button class="btn btn-success pull-right">Add new Thing</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
