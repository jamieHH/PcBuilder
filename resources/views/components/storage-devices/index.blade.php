@extends('app')

@section('content')
<div id="processors-page">
    <div class="row">
        <div class="col-md-12">
            <h2>
                <strong><i class="fa fa-microchip"></i>&nbsp; Storage Devices</strong>
                <a href="{{ route('components.storage-devices.new') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Storage Device</a>
            </h2>
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
                            <strong>Filters</strong>
                        </div>
                        <div class="panel-body">
                            Manufacturer
                            <div>
                                <input type="checkbox" id="man-opt-1"><label for="man-opt-1">&nbsp; Western Digital</label>
                            </div>
                            <div>
                                <input type="checkbox" id="man-opt-2"><label for="man-opt-2">&nbsp; ADATA</label>
                            </div>
                            <div>
                                <input type="checkbox" id="man-opt-3"><label for="man-opt-3">&nbsp; Samsung</label>
                            </div>
                            <div>
                                <input type="checkbox" id="man-opt-4"><label for="man-opt-4">&nbsp; SanDisk</label>
                            </div>
                            <div>
                                <input type="checkbox" id="man-opt-5"><label for="man-opt-5">&nbsp; Crucial</label>
                            </div>
                            <hr/>
                            Form Factor
                            <div>
                                <input type="checkbox" id="form-opt-1"><label for="form-opt-1">&nbsp; 3.5"</label>
                            </div>
                            <div>
                                <input type="checkbox" id="form-opt-3"><label for="form-opt-3">&nbsp; 2.5"</label>
                            </div>
                            <div>
                                <input type="checkbox" id="form-opt-4"><label for="form-opt-4">&nbsp; PCI-E</label>
                            </div>
                            <div>
                                <input type="checkbox" id="form-opt-5"><label for="form-opt-5">&nbsp; M.2</label>
                            </div>
                            <hr/>
                            Interface Type
                            <div>
                                <input type="checkbox" id="inter-opt-1"><label for="inter-opt-1">&nbsp; SATA 6GBs</label>
                            </div>
                            <div>
                                <input type="checkbox" id="inter-opt-2"><label for="inter-opt-2">&nbsp; SATA 3GBs</label>
                            </div>
                            <div>
                                <input type="checkbox" id="inter-opt-3"><label for="inter-opt-3">&nbsp; SATA 1.5GBs</label>
                            </div>
                            <div>
                                <input type="checkbox" id="inter-opt-4"><label for="inter-opt-4">&nbsp; PCI-E x4</label>
                            </div>
                            <div>
                                <input type="checkbox" id="inter-opt-5"><label for="inter-opt-5">&nbsp; M.2</label>
                            </div>
                            <hr/>

                </div>
            </div>
        </div>
        {{-- table panel --}}
        <div class="col-md-10">
            <div class="section row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table id="processors-table" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Capacity</th>
                                    <th>Cache</th>
                                    <th>Manufacturer</th>
                                    <th>Type</th>
                                    <th>Interface Type</th>
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
        app.routes['components.storage-devices.datatable'] = '{{ route('components.storage-devices.datatable') }}';

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
                            ajax: app.routes['components.storage-devices.datatable'],
                            columns: [
                                { "data": "name" },
                                { "data": "capacity" },
                                { "data": "cache" },
                                { "data": "manufacturer" },
                                { "data": "interfaceType" },
                                { "data": "storageDeviceType" },
                                { "data": "storageDeviceFormFactor" },
                                { "data": "edit" }
                            ]
                        });
                    }
                }
            });
        })
    </script>
@endsection
