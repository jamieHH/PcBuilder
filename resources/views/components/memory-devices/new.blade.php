@extends('app')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-plus"></i>Add New Memory Device</b></h3>
        </div>
        <div class="panel-body">
            <form id="new-form">
                {{ csrf_field() }}
                <div class="alert alert-dismissible" v-bind:class="'alert-' + pageAlert.type" role="alert" style="display: none;" v-show="pageAlert.message">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="alert-heading">@{{ pageAlert.message }}</h4>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <text-input
                                name="name"
                                placeholder="Name"
                                label="Memory Device Name"
                                icon="fa fa-microchip"
                                v-bind:field-errors="errors.name"
                                v-model="memoryDevice.name"
                        ></text-input>
                    </div>
                    <div class="col-md-6">
                        <select-input
                                name="manufacturer_id"
                                label="Manufacturer"
                                placeholder="Manufacturer"
                                v-bind:options="manufacturerOptions"
                                v-bind:field-errors="errors.manufacturer_id"
                                v-model="memoryDevice.manufacturer_id"
                        ></select-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <select-input
                                name="memory_speed_id"
                                label="Memory Speed"
                                placeholder="Memory Speed"
                                v-bind:options="memorySpeedOptions"
                                v-bind:field-errors="errors.memory_speed_id"
                                v-model="memoryDevice.memory_speed_id"
                        ></select-input>
                    </div>
                    <div class="col-md-6">
                        <select-input
                                name="memory_type_id"
                                label="Memory Type"
                                placeholder="Memory Type"
                                v-bind:options="memoryTypeOptions"
                                v-bind:field-errors="errors.memory_type_id"
                                v-model="memoryDevice.memory_type_id"
                        ></select-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <number-input
                                name="capacity"
                                placeholder="Capacity"
                                label="Capacity (MBs)"
                                min="0"
                                icon="fa fa-microchip"
                                v-bind:field-errors="errors.capacity"
                                v-model="memoryDevice.capacity"
                        ></number-input>
                    </div>
                </div>
                <div class="row section">
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" v-on:click.prevent="postData()">
                            <i class="fa fa-plus"></i> Add New Memory Device
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-javascript')
<script>
    app.routes['components.memory-devices.new.post'] = '{{ route('components.memory-devices.new.post') }}';

    app.routes['misc.manufacturers.select2'] = '{{ route('misc.manufacturers.select2') }}';
    app.routes['misc.memory-speeds.select2'] = '{{ route('misc.memory-speeds.select2') }}';
    app.routes['misc.memory-types.select2'] = '{{ route('misc.memory-types.select2') }}';

    $(document).ready(function() {
        app.pageVariables.form = new Vue({
            el: '#new-form',
            mounted: function() {
                this.getData();
            },
            data: {
                memoryDevice: {
                    "manufacturer_id": null,
                    "memory_speed_id": null,
                    "memory_type_id": null,
                    "name": null,
                    "capacity": null,
                },
                manufacturerOptions: [],
                memorySpeedOptions: [],
                memoryTypeOptions: [],
                errors: {},
                pageAlert: {
                    'type': '{{ session('pageAlert')['type'] }}',
                    'message': '{{ session('pageAlert')['message'] }}'
                },
                isLoading: true
            },
            methods: {
                getSelectOptions: function(route, optionList) {
                    let vm = this;
                    return $.get(route, function(response, status) {
                        vm[optionList] = response.data;
                    });
                },
                getData: function() {
                    let vm = this;
                    $.when(
                        vm.getSelectOptions(app.routes['misc.manufacturers.select2'], 'manufacturerOptions'),
                        vm.getSelectOptions(app.routes['misc.memory-speeds.select2'], 'memorySpeedOptions'),
                        vm.getSelectOptions(app.routes['misc.memory-types.select2'], 'memoryTypeOptions')
                    ).done(function() {
                        vm.isLoading = false;
                    });
                },
                postData: function() {
                    let vm = this;
                    let data = vm.memoryDevice;

                    vm.errors = {};
                    vm.pageAlert.message = null;

                    vm.isLoading = true;
                    $.post(app.routes['components.memory-devices.new.post'], data, function(response, status) {
                        window.location = response.redirect;
                    }).fail(function(response, status) {
                        vm.isLoading = false;
                        $(".main").animate({ scrollTop: 0 }, "slow");
                        if (response.responseJSON.hasOwnProperty('errors')) {
                            vm.errors = response.responseJSON.errors;
                        }
                        vm.pageAlert = {
                            'type': 'danger',
                            'message': response.responseJSON.message
                        }
                    });
                }
            }
        });
    });
</script>
@endsection