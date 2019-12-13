@extends('app')

@section('content')
<div id="new-form">
    <loading-overlay v-bind:loading="isLoading"></loading-overlay>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-plus"></i>Add New Storage Device</b></h3>
        </div>
        <div class="panel-body">
            <form>
                {{ csrf_field() }}
                <page-alert v-bind:alert-container="pageAlert"></page-alert>
                <div class="row">
                    <div class="col-md-6">
                        <text-input
                                name="name"
                                placeholder="Name"
                                label="Storage Device Name"
                                icon="fa fa-microchip"
                                v-bind:field-errors="errors.name"
                                v-model="storageDevice.name"
                        ></text-input>
                    </div>
                    <div class="col-md-6">
                        <select-input
                                name="manufacturer_id"
                                label="Manufacturer"
                                placeholder="Manufacturer"
                                v-bind:options="manufacturerOptions"
                                v-bind:field-errors="errors.manufacturer_id"
                                v-model="storageDevice.manufacturer_id"
                        ></select-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <select-input
                                name="interface_type_id"
                                label="Interface Type"
                                placeholder="Storage Speed"
                                v-bind:options="interfaceTypeOptions"
                                v-bind:field-errors="errors.interface_type_id"
                                v-model="storageDevice.interface_type_id"
                        ></select-input>
                    </div>
                    <div class="col-md-6">
                        <select-input
                                name="storage_device_type_id"
                                label="Storage Device Type"
                                placeholder="Storage Device Type"
                                v-bind:options="storageDeviceTypeOptions"
                                v-bind:field-errors="errors.storage_device_type_id"
                                v-model="storageDevice.storage_device_type_id"
                        ></select-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <select-input
                                name="storage_device_form_factor_id"
                                label="Storage Device Form Factor"
                                placeholder="Storage Device Form Factor"
                                v-bind:options="storageDeviceFormFactorOptions"
                                v-bind:field-errors="errors.storage_device_form_factor_id"
                                v-model="storageDevice.storage_device_form_factor_id"
                        ></select-input>
                    </div>
                </div>
                <div class="row section">
                    <div class="col-md-12">
                        <hr />
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
                                v-model="storageDevice.capacity"
                        ></number-input>
                    </div>
                    <div class="col-md-6">
                        <number-input
                                name="cache"
                                placeholder="Cache"
                                label="Cache (MBs)"
                                min="0"
                                icon="fa fa-microchip"
                                v-bind:field-errors="errors.cache"
                                v-model="storageDevice.cache"
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
                            <i class="fa fa-plus"></i> Add New Storage Device
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
    app.routes['components.storage-devices.new.post'] = '{{ route('components.storage-devices.new.post') }}';

    app.routes['misc.manufacturers.select2'] = '{{ route('misc.manufacturers.select2') }}';
    app.routes['misc.interface-types.select2'] = '{{ route('misc.interface-types.select2') }}';
    app.routes['misc.storage-device-types.select2'] = '{{ route('misc.storage-device-types.select2') }}';
    app.routes['misc.storage-device-form-factors.select2'] = '{{ route('misc.storage-device-form-factors.select2') }}';

    $(document).ready(function() {
        app.pageVariables.form = new Vue({
            el: '#new-form',
            mounted: function() {
                this.getData();
            },
            data: {
                storageDevice: {
                    'manufacturer_id': null,
                    'interface_type_id': null,
                    'storage_device_type_id': null,
                    'storage_device_form_factor_id': null,
                    'name': null,
                    'capacity': null,
                    'cache': null,
                },
                manufacturerOptions: [],
                interfaceTypeOptions: [],
                storageDeviceTypeOptions: [],
                storageDeviceFormFactorOptions: [],
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
                    vm.isLoading = true;
                    $.when(
                        vm.getSelectOptions(app.routes['misc.manufacturers.select2'], 'manufacturerOptions'),
                        vm.getSelectOptions(app.routes['misc.interface-types.select2'], 'interfaceTypeOptions'),
                        vm.getSelectOptions(app.routes['misc.storage-device-types.select2'], 'storageDeviceTypeOptions'),
                        vm.getSelectOptions(app.routes['misc.storage-device-form-factors.select2'], 'storageDeviceFormFactorOptions'),
                    ).done(function() {
                        vm.isLoading = false;
                    });
                },
                postData: function() {
                    let vm = this;
                    let data = vm.storageDevice;

                    vm.errors = {};
                    vm.pageAlert.message = null;

                    vm.isLoading = true;
                    $.post(app.routes['components.storage-devices.new.post'], data, function(response, status) {
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