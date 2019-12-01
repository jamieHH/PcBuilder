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
                                <option value="1">Intel</option>
                                <option value="2">AMD</option>
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
                                <option value="1">opt 1</option>
                                <option value="2">opt 2</option>
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
                                <option value="1">opt 1</option>
                                <option value="2">opt 2</option>
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
                errors: {},
                pageAlert: {
                    'type': '{{ session('pageAlert')['type'] }}',
                    'message': '{{ session('pageAlert')['message'] }}'
                }
            },
            methods: {
                getData: function() {
                    // TODO: get selection data!
                },
                postData: function() {
                    let vm = this;
                    let data = vm.memoryDevice;

                    vm.errors = {};
                    vm.pageAlert.message = null;

                    $.post(app.routes['components.memory-devices.new.post'], data, function(response, status) {
                        window.location = response.redirect;
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
    })
</script>
@endsection
