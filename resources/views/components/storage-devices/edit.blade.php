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
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('name') }">
                            <label for="name">Memory Device Name</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Name" v-model="memoryDevice.name" autofocus>
                            </div>
                            <span class="help-block" v-if="hasError('name')"> <!-- inline error -->
                                <ul v-for="error in errors.name">
                                    <li>@{{ error }}</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('manufacturer_id') }">
                            <label for="manufacturer">Manufacturer</label>
                            <select id="manufacturer" name="manufacturer_id" class="form-control js-select2" v-model="memoryDevice.manufacturer_id">
                                @foreach(\App\Models\ManufacturerQuery::create()->find() as $manufacturer)
                                    <option value="{{ $manufacturer->getId() }}">{{ $manufacturer->getName() }}</option>
                                @endforeach
                            </select>
                            <span class="help-block" v-if="hasError('manufacturer_id')"> <!-- inline error -->
                                <ul v-for="error in errors.manufacturer_id">
                                    <li>@{{ error }}</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('memory_speed_id') }">
                            <label for="memory-speed">Memory Speed</label>
                            <select id="memory-speed" name="memory_speed_id" class="form-control js-select2" v-model="memoryDevice.memory_speed_id">
                                @foreach(\App\Models\MemorySpeedQuery::create()->find() as $speed)
                                    <option value="{{ $speed->getId() }}">{{ $speed->getName() }}</option>
                                @endforeach
                            </select>
                            <span class="help-block" v-if="hasError('memory_speed_id')"> <!-- inline error -->
                                <ul v-for="error in errors.memory_speed_id">
                                    <li>@{{ error }}</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('memory_type_id') }">
                            <label for="memory-type">Memory Type</label>
                            <select id="memory-type" name="memory_type_id" class="form-control js-select2" v-model="memoryDevice.memory_type_id">
                                @foreach(\App\Models\MemoryTypeQuery::create()->find() as $type)
                                    <option value="{{ $type->getId() }}">{{ $type->getName() }}</option>
                                @endforeach
                            </select>
                            <span class="help-block" v-if="hasError('memory_type_id')"> <!-- inline error -->
                                <ul v-for="error in errors.memory_type_id">
                                    <li>@{{ error }}</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('capacity') }">
                            <label for="memory-capacity">Capacity <small class="text-muted">(MBs)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-microchip"></i></span>
                                <input id="memory-capacity" type="number" min="0" step="1" class="form-control" name="capacity" placeholder="Capacity" v-model="memoryDevice.capacity">
                            </div>
                            <span class="help-block" v-if="hasError('capacity')"> <!-- inline error -->
                                <ul v-for="error in errors.capacity">
                                    <li>@{{ error }}</li>
                                </ul>
                            </span>
                        </div>
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
                errors: {},
                pageAlert: {
                    'type': '{{ session('pageAlert')['type'] }}',
                    'message': '{{ session('pageAlert')['message'] }}'
                }
            },
            methods: {
                getData: function() {
                    let vm = this;

                    // TODO: get selection data!

                    $.get(app.routes['components.memory-devices.memory-device.details'], function(response, status) {
                        vm.memoryDevice = response.memoryDevice;
                    }).fail(function(response, status) {
                        vm.pageAlert = response.responseJSON.message;
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
                },
                hasError: function(fieldName) {
                    return this.errors.hasOwnProperty(fieldName);
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
