@extends('app')

@section('content')
<div id="processors-page">
    <div class="row">
        <div class="col-md-12">
            <h2><i class="fa fa-microchip"></i>&nbsp; Processors</h2>
        </div>
    </div>
    <div class="alert alert-dismissible" v-bind:class="'alert-' + pageAlert.type" role="alert" style="display: none;" v-show="pageAlert.message">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="alert-heading">@{{ pageAlert.message }}</h4>
    </div>
    <div class="row">
        {{-- filter panel --}}
        <div class="col-md-2">
            <div class="section row">
                <div class="col-md-12 filter-bar">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Filters</strong>
                        </div>
                        <div class="panel-body">
                            Manufacturer
                            <div>
                                <input type="checkbox"  id="man-opt-1"><label for="man-opt-1">&nbsp; Intel</label>
                            </div>
                            <div>
                                <input type="checkbox" id="man-opt-2"><label for="man-opt-2">&nbsp; AMD</label>
                            </div>
                            <hr/>
                            CPU Socket
                            <div>
                                <input type="checkbox" id="sock-opt-1"><label for="sock-opt-1">&nbsp; LGA 1151</label>
                            </div>
                            <div>
                                <input type="checkbox" id="sock-opt-2"><label for="sock-opt-2">&nbsp; AM 3</label>
                            </div>
                            <div>
                                <input type="checkbox" id="sock-opt-3"><label for="sock-opt-3">&nbsp; AM 4</label>
                            </div>
                            <hr/>
                            Core Count
                            <div>
                                <input type="checkbox" id="cc-opt-1"><label for="cc-opt-1">&nbsp; 1</label>
                            </div>
                            <div>
                                <input type="checkbox" id="cc-opt-2"><label for="cc-opt-2">&nbsp; 2</label>
                            </div>
                            <div>
                                <input type="checkbox" id="cc-opt-3"><label for="cc-opt-3">&nbsp; 4</label>
                            </div>
                            <div>
                                <input type="checkbox" id="cc-opt-4"><label for="cc-opt-4">&nbsp; 6</label>
                            </div>
                            <div>
                                <input type="checkbox" id="cc-opt-5"><label for="cc-opt-5">&nbsp; 8</label>
                            </div>
                            <div>
                                <input type="checkbox" id="cc-opt-6"><label for="cc-opt-6">&nbsp; 12</label>
                            </div>
                            <hr/>
                            TDP
                            <div>
                                <input type="checkbox" id="tdp-opt-1"><label for="tdp-opt-1">&nbsp; 65</label>
                            </div>
                            <div>
                                <input type="checkbox" id="tdp-opt-2"><label for="tdp-opt-2">&nbsp; 95</label>
                            </div>
                            <hr/>
                            Lithography
                            <div>
                                <input type="checkbox" id="lith-opt-1"><label for="lith-opt-1">&nbsp; 14</label>
                            </div>
                            <div>
                                <input type="checkbox" id="lith-opt-2"><label for="lith-opt-2">&nbsp; 16</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- table panel --}}
        <div class="col-md-10">
            <div class="section row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table id="processors-table" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Core Count</th>
                                        <th>Base Clock</th>
                                        <th>Boost Clock</th>
                                        <th>TDP</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('components.processors.new') }}" class="btn btn-primary pull-right">
                <i class="fa fa-plus"></i> Add New Processor
            </a>
        </div>
    </div>
</div>
@endsection

@section('page-javascript')
    <script>
        app.routes['components.processors.datatable'] = '{{ route('components.processors.datatable') }}';

        $(document).ready(function() {
            window.vue = new Vue({
                el: '#processors-page',
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
                        $('#processors-table').DataTable({
                            ajax: app.routes['components.processors.datatable'],
                            columns: [
                                { "data": "name" },
                                { "data": "coreCount" },
                                { "data": "baseClock" },
                                { "data": "boostClock" },
                                { "data": "tdp" },
                                { "data": "edit" }
                            ]
                        });
                    }
                }
            });
        })
    </script>
@endsection
