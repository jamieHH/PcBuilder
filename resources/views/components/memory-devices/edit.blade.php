@extends('app')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-plus"></i>Edit Memory Device</b></h3>
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
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletion-modal">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                        <button type="submit" class="btn btn-primary pull-right" v-on:click.prevent="postData()">
                            <i class="fa fa-plus"></i> Update Memory Device
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
                    <h4 class="modal-title" id="deleteItemModalLabel">Delete Memory Device</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this memory device?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button id="delete-processor-btn" type="button" class="btn btn-danger" v-on:click.prevent="postDelete()">Delete Memory Device</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-javascript')
<script>
    app.routes['components.memory-devices.memory-device.details'] = '{{ route('components.memory-devices.memory-device.details', ['id' => $id]) }}';
    app.routes['components.memory-devices.memory-device.edit.post'] = '{{ route('components.memory-devices.memory-device.edit.post', ['id' => $id]) }}';
    app.routes['components.memory-devices.memory-device.delete.post'] = '{{ route('components.memory-devices.memory-device.delete.post', ['id' => $id]) }}';

    app.routes['misc.manufacturers.select2'] = '{{ route('misc.manufacturers.select2') }}';
    app.routes['misc.memory-speeds.select2'] = '{{ route('misc.memory-speeds.select2') }}';
    app.routes['misc.memory-types.select2'] = '{{ route('misc.memory-types.select2') }}';

    $(document).ready(function() {
        app.pageVariables.editForm = new Vue({
            el: '#edit-form',
            mounted: function() {
                this.getData();
            },
            data: {
                memoryDevice: {
                    "id": null,
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
                }
            },
            methods: {
                getManufacturerOptions: function() {
                    let vm = this;
                    return $.get(app.routes['misc.manufacturers.select2'], function(response, status) {
                        vm.manufacturerOptions = response.data;
                    });
                },
                getMemorySpeedOptions: function() {
                    let vm = this;
                    return $.get(app.routes['misc.memory-speeds.select2'], function(response, status) {
                        vm.memorySpeedOptions = response.data;
                    });
                },
                getMemoryTypeOptions: function() {
                    let vm = this;
                    return $.get(app.routes['misc.memory-types.select2'], function(response, status) {
                        vm.memoryTypeOptions = response.data;
                    });
                },
                getData: function() {
                    let vm = this;
                    $.when(
                        vm.getManufacturerOptions(),
                        vm.getMemorySpeedOptions(),
                        vm.getMemoryTypeOptions(),
                    ).done(function() {
                        vm.isLoading = false;
                        $.get(app.routes['components.memory-devices.memory-device.details'], function(response, status) {
                            vm.memoryDevice = response.data;
                        }).fail(function(response, status) {
                            vm.pageAlert = response.responseJSON.message;
                        });
                    });
                },
                postData: function() {
                    let vm = this;
                    let data = vm.memoryDevice;

                    vm.errors = {};
                    vm.pageAlert.message = null;

                    $.post(app.routes['components.memory-devices.memory-device.edit.post'], data, function(response, status) {
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
                    let data = pageVm.memoryDevice;

                    $.post(app.routes['components.memory-devices.memory-device.delete.post'], data, function(response, status) {
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
