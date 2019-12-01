@extends('app')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-plus"></i>Add New Processor</b></h3>
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
                            <label for="name">Processor Name</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Name" v-model="processor.name" autofocus>
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
                            <select id="manufacturer" name="manufacturer_id" class="form-control js-select2" v-model="processor.manufacturer_id">
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
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('cpu_socket_id') }">
                            <label for="cpu-socket">CPU Socket</label>
                            <select id="cpu-socket" name="cpu_socket_id" class="form-control" v-model="processor.cpu_socket_id">
                                <option value="1">LGA 1151</option>
                                <option value="2">Option 2</option>
                            </select>
                            <span class="help-block" v-if="hasError('cpu_socket_id')"> <!-- inline error -->
                                <ul v-for="error in errors.cpu_socket_id">
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
                    <div class="col-md-3">
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('base_clock') }">
                            <label for="base-clock">Base Clock <small class="text-muted">(MHz)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-tachometer"></i></span>
                                <input id="base-clock" type="number" min="0" step="1" class="form-control" name="base_clock" placeholder="Base Clock" v-model="processor.base_clock">
                            </div>
                            <span class="help-block" v-if="hasError('base_clock')"> <!-- inline error -->
                                <ul v-for="error in errors.base_clock">
                                    <li>@{{ error }}</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('boost_clock') }">
                            <label for="boost-clock">Boost Clock <small class="text-muted">(MHz)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-tachometer"></i></span>
                                <input id="boost-clock" type="number" min="0" step="1" class="form-control" name="boost_clock" placeholder="Boost Clock" v-model="processor.boost_clock">
                            </div>
                            <span class="help-block" v-if="hasError('boost_clock')"> <!-- inline error -->
                                <ul v-for="error in errors.boost_clock">
                                    <li>@{{ error }}</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('core_count') }">
                            <label for="core-count">Core Count</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-microchip"></i></span>
                                <input id="core-count" type="number" min="0" step="1" class="form-control" name="core_count" placeholder="Core Count" v-model="processor.core_count">
                            </div>
                            <span class="help-block" v-if="hasError('core_count')"> <!-- inline error -->
                                <ul v-for="error in errors.core_count">
                                    <li>@{{ error }}</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('thread_count') }">
                            <label for="thread-count">Thread Count</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
                                <input id="thread-count" type="number" min="0" step="1" class="form-control" name="thread_count" placeholder="Thread Count" v-model="processor.thread_count">
                            </div>
                            <span class="help-block" v-if="hasError('thread_count')"> <!-- inline error -->
                                <ul v-for="error in errors.thread_count">
                                    <li>@{{ error }}</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('l3_cache') }">
                            <label for="l3-cache">L3 Cache <small class="text-muted">(MBs)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-microchip"></i></span>
                                <input id="l3-cache" type="number" min="0" step="1" class="form-control" name="l3_cache" placeholder="L3 Cache" v-model="processor.l3_cache">
                            </div>
                            <span class="help-block" v-if="hasError('l3_cache')"> <!-- inline error -->
                                <ul v-for="error in errors.l3_cache">
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
                    <div class="col-md-6">
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('tdp') }">
                            <label for="tdp">Thermal Design Power <small class="text-muted">(Watts)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-thermometer-half"></i></span>
                                <input id="tdp" type="number" min="0" step="1" class="form-control" name="tdp" placeholder="TDP" v-model="processor.tdp">
                            </div>
                            <span class="help-block" v-if="hasError('tdp')"> <!-- inline error -->
                                <ul v-for="error in errors.tdp">
                                    <li>@{{ error }}</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('lithography') }">
                            <label for="lithography">Lithography <small class="text-muted">(nm)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-compress"></i></span>
                                <input id="lithography" type="number" min="0" step="1" class="form-control" name="lithography" placeholder="Lithography" v-model="processor.lithography">
                            </div>
                            <span class="help-block" v-if="hasError('lithography')"> <!-- inline error -->
                                <ul v-for="error in errors.lithography">
                                    <li>@{{ error }}</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-lg" v-bind:class="{ 'has-error': hasError('supported_memory_type_ids') }">
                            <label for="supported-memory-types">Supported Memory Types</label>
                            <select id="supported-memory-types" name="supported_memory_type_ids" class="form-control" v-model="processor.supported_memory_type_ids" multiple>
                                <option value="1">DDR4 3200 Mhz</option>
                                <option value="2">DDR4 2666 Mhz</option>
                                <option value="3">DDR4 1600 Mhz</option>
                                <option value="4">DDR4 1400 Mhz</option>
                                <option value="5">DDR4 1333 Mhz</option>
                            </select>
                            <span class="help-block" v-if="hasError('supported_memory_type_ids')"> <!-- inline error -->
                                <ul v-for="error in errors.supported_memory_type_ids">
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
                            <i class="fa fa-plus"></i> Add New Processor
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
    app.routes['components.processors.new.post'] = '{{ route('components.processors.new.post') }}';

    $(document).ready(function() {
        app.pageVariables.form = new Vue({
            el: '#new-form',
            mounted: function() {
                this.getData();
            },
            data: {
                processor: {
                    "name": null,
                    "manufacturer_id": null,
                    "cpu_socket_id": null,
                    "base_clock": null,
                    "boost_clock": null,
                    "core_count": null,
                    "thread_count": null,
                    "l3_cache": null,
                    "tdp": null,
                    "lithography": null,
                    "supported_memory_type_ids": [],
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
                    let data = vm.processor;

                    vm.errors = {};
                    vm.pageAlert.message = null;

                    $.post(app.routes['components.processors.new.post'], data, function(response, status) {
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
