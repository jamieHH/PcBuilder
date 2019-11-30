@extends('app')

@section('content')
    <div id="memory-devices-page">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>
                                    <strong><i class="fa fa-microchip"></i>&nbsp; Memory Devices</strong>
                                    <a href="{{ route('components.memory-devices.new') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Memory Device</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-dismissible" v-bind:class="'alert-' + pageAlert.type" role="alert" style="display: none;" v-show="pageAlert.message">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="alert-heading">@{{ pageAlert.message }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- filter panel --}}
                            <div class="col-md-2 filter-bar">
                                <div>
                                    <strong>Filters</strong>
                                </div>
                                <hr/>
                                Manufacturer
                                <div>
                                    <input type="checkbox" id="man-opt-1"><label for="man-opt-1">&nbsp; Corsair</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="man-opt-2"><label for="man-opt-2">&nbsp; Crucial</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="man-opt-2"><label for="man-opt-2">&nbsp; G.Skill</label>
                                </div>
                                <hr/>
                                Capacity (GBs)
                                <div>
                                    <input type="checkbox" id="cap-opt-1"><label for="cap-opt-1">&nbsp; 1</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="cap-opt-2"><label for="cap-opt-2">&nbsp; 2</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="cap-opt-2"><label for="cap-opt-2">&nbsp; 4</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="cap-opt-2"><label for="cap-opt-2">&nbsp; 8</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="cap-opt-2"><label for="cap-opt-2">&nbsp; 16</label>
                                </div>
                                <hr/>
                                Clock Speed (MHz)
                                <div>
                                    <input type="checkbox" id="clock-opt-1"><label for="clock-opt-1">&nbsp; 2133</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="clock-opt-2"><label for="clock-opt-2">&nbsp; 2400</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="clock-opt-3"><label for="clock-opt-3">&nbsp; 2666</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="clock-opt-4"><label for="clock-opt-4">&nbsp; 2800</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="clock-opt-5"><label for="clock-opt-5">&nbsp; 2933</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="clock-opt-6"><label for="clock-opt-6">&nbsp; 3000</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="clock-opt-7"><label for="clock-opt-7">&nbsp; 3200</label>
                                </div>
                                <hr/>
                            </div>
                            {{-- table panel --}}
                            <div class="col-md-10">
                                <table id="memory-devices-table" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Capacity</th>
                                            <th>Clock Speed</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
{{--                            <div class="col-md-12">--}}
{{--                                <a href="{{ route('components.memory-devices.new') }}" class="btn btn-primary pull-right">--}}
{{--                                    <i class="fa fa-plus"></i> Add New Memory Device--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-javascript')
    <script>
        app.routes['components.memory-devices.datatable'] = '{{ route('components.memory-devices.datatable') }}';

        $(document).ready(function() {
            window.vue = new Vue({
                el: '#memory-devices-page',
                mounted: function() {
                    this.initialisePage();
                },
                data: {
                    pageAlert: {
                        'type': '{{ session('pageAlert')['type'] }}',
                        'message': '{{ session('pageAlert')['message'] }}'
                    }
                },
                methods: {
                    initialisePage: function() {
                        $('#memory-devices-table').DataTable({
                            ajax: app.routes['components.memory-devices.datatable'],
                            columns: [
                                { "data": "name" },
                                { "data": "capacity" },
                                { "data": "clockSpeed" },
                                { "data": "edit" }
                            ]
                        });
                    }
                }
            });
        })
    </script>
@endsection
