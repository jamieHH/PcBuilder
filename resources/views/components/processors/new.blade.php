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
                        <text-input
                                name="name"
                                placeholder="Name"
                                label="Memory Device Name"
                                icon="fa fa-microchip"
                                v-bind:field-errors="errors.name"
                                v-model="processor.name"
                        ></text-input>
                    </div>
                    <div class="col-md-6">
                        <select-input
                                name="manufacturer_id"
                                label="Manufacturer"
                                placeholder="Manufacturer"
                                v-bind:options="manufacturerOptions"
                                v-bind:field-errors="errors.manufacturer_id"
                                v-model="processor.manufacturer_id"
                        ></select-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <select-input
                                name="cpu_socket_id"
                                label="Cpu Socket"
                                placeholder="Cpu Socket"
                                v-bind:options="cpuSocketOptions"
                                v-bind:field-errors="errors.cpu_socket_id"
                                v-model="processor.cpu_socket_id"
                        ></select-input>
                    </div>
                </div>
                <div class="row section">
                    <div class="col-md-12">
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <number-input
                                name="base_clock"
                                placeholder="Base Clock"
                                label="Base Clock (MHs)"
                                min="0"
                                icon="fa fa-tachometer"
                                v-bind:field-errors="errors.base_clock"
                                v-model="processor.base_clock"
                        ></number-input>
                    </div>
                    <div class="col-md-3">
                        <number-input
                                name="Boost_clock"
                                placeholder="Boost Clock"
                                label="Boost Clock (MHs)"
                                min="0"
                                icon="fa fa-tachometer"
                                v-bind:field-errors="errors.boost_clock"
                                v-model="processor.boost_clock"
                        ></number-input>
                    </div>
                    <div class="col-md-3">
                        <number-input
                                name="core_count"
                                placeholder="Core Count"
                                label="Core Count"
                                min="0"
                                icon="fa fa-microchip"
                                v-bind:field-errors="errors.core_count"
                                v-model="processor.core_count"
                        ></number-input>
                    </div>
                    <div class="col-md-3">
                        <number-input
                                name="thread_count"
                                placeholder="Thread Count"
                                label="Thread Count"
                                min="0"
                                icon="fa fa-sitemap"
                                v-bind:field-errors="errors.thread_count"
                                v-model="processor.thread_count"
                        ></number-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <number-input
                                name="thread_count"
                                placeholder="L3 Cache"
                                label="L3 Cache (MBs)"
                                min="0"
                                icon="fa fa-microchip"
                                v-bind:field-errors="errors.l3_cache"
                                v-model="processor.l3_cache"
                        ></number-input>
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
                                name="tdp"
                                placeholder="TDP"
                                label="TDP (Watts)"
                                min="0"
                                icon="fa fa-thermometer-half"
                                v-bind:field-errors="errors.tdp"
                                v-model="processor.tdp"
                        ></number-input>
                    </div>
                    <div class="col-md-6">
                        <number-input
                                name="lithography"
                                placeholder="Lithography"
                                label="Lithography (nm)"
                                min="0"
                                icon="fa fa-compress"
                                v-bind:field-errors="errors.lithography"
                                v-model="processor.lithography"
                        ></number-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <select-input
                                name="supported_memory_type_ids"
                                label="Supported Memory Types"
                                placeholder="Supported Memory Types"
                                v-bind:options="memoryTypeOptions"
                                v-bind:field-errors="errors.supported_memory_type_ids"
                                v-model="processor.supported_memory_type_ids"
                        ></select-input>
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

    app.routes['misc.manufacturers.select2'] = '{{ route('misc.manufacturers.select2') }}';
    app.routes['misc.cpu-sockets.select2'] = '{{ route('misc.cpu-sockets.select2') }}';
    app.routes['misc.memory-speeds.select2'] = '{{ route('misc.memory-speeds.select2') }}';
    app.routes['misc.memory-types.select2'] = '{{ route('misc.memory-types.select2') }}';

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
                manufacturerOptions: [],
                cpuSocketOptions: [],
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
                getManufacturerOptions: function() {
                    let vm = this;
                    return $.get(app.routes['misc.manufacturers.select2'], function(response, status) {
                        vm.manufacturerOptions = response.data;
                    });
                },
                getCpuSocketOptions: function() {
                    let vm = this;
                    return $.get(app.routes['misc.cpu-sockets.select2'], function(response, status) {
                        vm.cpuSocketOptions = response.data;
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
                        vm.getCpuSocketOptions(),
                        vm.getMemoryTypeOptions(),
                        vm.getMemorySpeedOptions(),
                    ).done(function() {
                        vm.isLoading = false;
                    });
                },
                postData: function() {
                    let vm = this;
                    let data = vm.processor;

                    vm.errors = {};
                    vm.pageAlert.message = null;

                    vm.isLoading = true;
                    $.post(app.routes['components.processors.new.post'], data, function(response, status) {
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
                },
            }
        });
    })
</script>
@endsection
