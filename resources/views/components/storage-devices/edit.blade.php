@extends('app')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-plus"></i>Edit Storage Device</b></h3>
        </div>
        <div class="panel-body">
            <form id="edit-form">
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
                            <i class="fa fa-plus"></i> Update Storage Device
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-modals')
    <!-- Modal -->
    <div class="modal fade" id="deletion-modal" tabindex="-1" role="dialog" aria-labelledby="deleteItemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="deleteItemModalLabel">Delete Storage Device</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this storage device?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button id="delete-processor-btn" type="button" class="btn btn-danger" v-on:click.prevent="postDelete()">Delete Storage Device</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-javascript')
<script>
    app.routes['components.storage-devices.storage-device.details'] = '{{ route('components.storage-devices.storage-device.details', ['id' => $id]) }}';
    app.routes['components.storage-devices.storage-device.edit.post'] = '{{ route('components.storage-devices.storage-device.edit.post', ['id' => $id]) }}';
    app.routes['components.storage-devices.storage-device.delete.post'] = '{{ route('components.storage-devices.storage-device.delete.post', ['id' => $id]) }}';

    app.routes['misc.manufacturers.select2'] = '{{ route('misc.manufacturers.select2') }}';
    app.routes['misc.interface-types.select2'] = '{{ route('misc.interface-types.select2') }}';
    app.routes['misc.storage-device-types.select2'] = '{{ route('misc.storage-device-types.select2') }}';
    app.routes['misc.storage-device-form-factors.select2'] = '{{ route('misc.storage-device-form-factors.select2') }}';

    $(document).ready(function() {
        app.pageVariables.editForm = new Vue({
            el: '#edit-form',
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
                getManufacturerOptions: function() {
                    let vm = this;
                    return $.get(app.routes['misc.manufacturers.select2'], function(response, status) {
                        vm.manufacturerOptions = response.data;
                    });
                },
                getInterfaceTypeOptions: function() {
                    let vm = this;
                    return $.get(app.routes['misc.interface-types.select2'], function(response, status) {
                        vm.interfaceTypeOptions = response.data;
                    });
                },
                getStorageDeviceTypeOptions: function() {
                    let vm = this;
                    return $.get(app.routes['misc.storage-device-types.select2'], function(response, status) {
                        vm.storageDeviceTypeOptions = response.data;
                    });
                },
                getStorageDeviceFormFactorOptions: function() {
                    let vm = this;
                    return $.get(app.routes['misc.storage-device-form-factors.select2'], function(response, status) {
                        vm.storageDeviceFormFactorOptions = response.data;
                    });
                },
                getData: function() {
                    let vm = this;
                    vm.isLoading = true;
                    $.when(
                        vm.getManufacturerOptions(),
                        vm.getInterfaceTypeOptions(),
                        vm.getStorageDeviceTypeOptions(),
                        vm.getStorageDeviceFormFactorOptions()
                    ).done(function() {
                        $.get(app.routes['components.storage-devices.storage-device.details'], function(response, status) {
                            vm.isLoading = false;
                            vm.storageDevice = response.storageDevice;
                        }).fail(function(response, status) {
                            vm.isLoading = false;
                            vm.pageAlert = response.responseJSON.message;
                        });
                    });
                },
                postData: function() {
                    let vm = this;
                    let data = vm.storageDevice;

                    vm.errors = {};
                    vm.pageAlert.message = null;

                    $.post(app.routes['components.storage-devices.storage-device.edit.post'], data, function(response, status) {
                        $(".main").animate({ scrollTop: 0 }, "slow");
                        vm.pageAlert = {
                            'type': 'success',
                            'message': response.message
                        }
                    }).fail(function(response, status) {
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

        app.pageVariables.deletionModal = new Vue({
            el: '#deletion-modal',
            mounted: function() {

            },
            data: {

            },
            methods: {
                postDelete: function() {
                    let vm = this;
                    let pageVm = app.pageVariables.editForm;
                    let data = pageVm.storageDevice;

                    $.post(app.routes['components.storage-devices.storage-device.delete.post'], data, function(response, status) {
                        window.location = response.redirect;
                    }).fail(function(response, status) {
                        $(vm.$el).modal('hide');

                        if (response.responseJSON.hasOwnProperty('errors')) {
                            pageVm.errors = response.responseJSON.errors;
                        }
                        pageVm.pageAlert = {
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
