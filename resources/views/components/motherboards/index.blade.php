@extends('app')

@section('content')
<div id="motherboards-page">
    <div class="row">
        <div class="col-md-12">
            <h2>
                <strong><i class="fa fa-microchip"></i>&nbsp; Motherboards</strong>
                <span class=" hidden-xs">
                    <a href="{{ route('components.motherboards.new') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Motherboard</a>
                </span>
                <span class="visible-xs section">
                    <a href="{{ route('components.motherboards.new') }}" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Add New Motherboard</a>
                </span>
            </h2>
        </div>
    </div>
    <page-alert v-bind:alert-container="pageAlert"></page-alert>
    <div class="row">
        {{-- filter panel --}}
        <div class="col-md-2">
            <div class="section row">
                <div class="col-md-12 filter-bar">
                    <div>
                        <strong>Filters <button class="close pull-right" v-on:click="toggleShowFilters()"><span aria-hidden="true">&times;</span></button></strong>
                    </div>
                    <hr/>
                    <div v-show="showFilters">
                        Manufacturer
                        <div>
                            <input type="checkbox" id="man-opt-1"><label for="man-opt-1">&nbsp; Intel</label>
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
                            <table id="motherboards-table" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Manufacturer</th>
                                        <th>Cpu Socket</th>
                                        <th>Chipset</th>
                                        <th>Form Factor</th>
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
</div>
@endsection

@section('page-javascript')
    <script>
        app.routes['components.motherboards.datatable'] = '{{ route('components.motherboards.datatable') }}';

        $(document).ready(function() {
            window.vue = new Vue({
                el: '#motherboards-page',
                mounted: function() {
                    this.initialisePage();
                },
                data: {
                    showFilters: false,
                    pageAlert: {
                        'type': '{{ session('pageAlert')['type'] }}',
                        'message': '{{ session('pageAlert')['message'] }}'
                    }
                },
                methods: {
                    initialisePage: function() {
                        $('#motherboards-table').DataTable({
                            ajax: app.routes['components.motherboards.datatable'],
                            columns: [
                                { "data": "name" },
                                { "data": "manufacturer" },
                                { "data": "cpuSocket" },
                                { "data": "mainboardChipset" },
                                { "data": "motherboardFormFactor" },
                                { "data": "edit" }
                            ]
                        });
                    },
                    toggleShowFilters: function() {
                        this.showFilters = !this.showFilters;
                    }
                }
            });
        })
    </script>
@endsection
