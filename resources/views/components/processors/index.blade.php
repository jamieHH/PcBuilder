@extends('app')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-microchip"></i>Processors</b></h3>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Core Count</th>
                    <th>Base Clock</th>
                    <th>Boost Clock</th>
                    <th>Thermal Design Power</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Intel Core i7 6700K</td>
                    <td>4</td>
                    <td>4.00</td>
                    <td>4.20</td>
                    <td>91</td>
                    <td>
                        <i class="fa fa-check-square-o"></i>
                    </td>
                </tr>
                <tr>
                    <td>Intel Core i7 7700k</td>
                    <td>4</td>
                    <td>4.20</td>
                    <td>4.50</td>
                    <td>91</td>
                    <td>
                        <i class="fa fa-square-o"></i>
                    </td>
                </tr>
                <tr>
                    <td>Ryzen 5 1500X</td>
                    <td>4</td>
                    <td>3.50</td>
                    <td>3.70</td>
                    <td>65</td>
                    <td>
                        <input type="checkbox">
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('components.processors.new') }}" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i> Add New Processor
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
