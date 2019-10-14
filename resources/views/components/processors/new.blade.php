@extends('app')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-plus"></i>Add New Processor</b></h3>
        </div>
        <div class="panel-body">
            <form id="add-new-processor">
                {{ csrf_field() }}

                <div class="row" v-if="pageAlert">
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">@{{ pageAlert }}</h4>
                        </div>
                    </div>
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
                        <div class="form-group form-group-lg">
                            <label for="manufacturer">Manufacturer</label>
                            <select id="manufacturer" name="manufacturer_id" class="form-control js-select2" v-model="processor.manufacturer_id">
                                <option value="1">Intel</option>
                                <option value="2">AMD</option>
                            </select>
                            <!-- inline error -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-lg">
                            <label for="cpu-socket">CPU Socket</label>
                            <select id="cpu-socket" name="cpu_socket_id" class="form-control" v-model="processor.cpu_socket_id">
                                <option value="1">LGA 1151</option>
                                <option value="2">Option 2</option>
                            </select>
                            <!-- inline error -->
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
                        <div class="form-group form-group-lg">
                            <label for="base-clock">Base Clock <small class="text-muted">(MHz)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-tachometer"></i></span>
                                <input id="base-clock" type="number" min="0" class="form-control" name="base_clock" placeholder="Base Clock" v-model="processor.base_clock">
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-lg">
                            <label for="boost-clock">Boost Clock <small class="text-muted">(MHz)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-tachometer"></i></span>
                                <input id="boost-clock" type="number" min="0" class="form-control" name="boost_clock" placeholder="Boost Clock" v-model="processor.boost_clock">
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-lg">
                            <label for="core-count">Core Count</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-microchip"></i></span>
                                <input id="core-count" type="number" min="0" class="form-control" name="core_count" placeholder="Core Count" v-model="processor.core_count">
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-lg">
                            <label for="thread-count">Thread Count</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
                                <input id="thread-count" type="number" min="0" class="form-control" name="thread_count" placeholder="Thread Count" v-model="processor.thread_count">
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-lg">
                            <label for="l3-cache">L3 Cache <small class="text-muted">(MBs)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-microchip"></i></span>
                                <input id="l3-cache" type="number" min="0" class="form-control" name="l3_cache" placeholder="L3 Cache" v-model="processor.l3_cache">
                            </div>
                            <!-- inline error -->
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
                        <div class="form-group form-group-lg">
                            <label for="tdp">Thermal Design Power <small class="text-muted">(Watts)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-thermometer-half"></i></span>
                                <input id="tdp" type="number" min="0" class="form-control" name="tdp" placeholder="TDP" v-model="processor.tdp">
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg">
                            <label for="lithography">Lithography <small class="text-muted">(nm)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-compress"></i></span>
                                <input id="lithography" type="number" min="0" class="form-control" name="lithography" placeholder="Lithography" v-model="processor.lithography">
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-lg">
                            <label for="supported-memory-types">Supported Memory Types</label>
                            <select id="supported-memory-types" name="supported_memory_type_ids" class="form-control" v-model="processor.supported_memory_type_ids" multiple>
                                <option value="1">DDR4 3200 Mhz</option>
                                <option value="2">DDR4 2666 Mhz</option>
                                <option value="3">DDR4 1600 Mhz</option>
                                <option value="4">DDR4 1400 Mhz</option>
                                <option value="5">DDR4 1333 Mhz</option>
                            </select>
                            <!-- inline error -->
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
    var routes = [];
    routes['components.processors.new.post'] = '{{ route('components.processors.new.post') }}';

    $(document).ready(function() {
        window.vue = new Vue({
            el: '#add-new-processor',
            mounted: function() {

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
                pageAlert: null
            },
            methods: {
                postData: function() {
                    var vm = this;
                    var data = vm.processor;

                    $.post(routes['components.processors.new.post'], data, function(response, status) {
                        alert("redirect to table page with pageAlert");
                    }).fail(function(response, status) {
                        vm.errors = response.responseJSON.errors;
                        vm.pageAlert = response.responseJSON.message;
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
