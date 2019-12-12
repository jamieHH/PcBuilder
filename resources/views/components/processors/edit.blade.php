@extends('app')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-plus"></i>Edit Processor</b></h3>
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
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletion-modal">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                        <button type="submit" class="btn btn-primary pull-right" v-on:click.prevent="postData()">
                            <i class="fa fa-plus"></i> Update Processor
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
                    <h4 class="modal-title" id="deleteItemModalLabel">Delete Processor</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this processor?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button id="delete-processor-btn" type="button" class="btn btn-danger" v-on:click.prevent="postDelete()">Delete Processor</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-javascript')
    <script>
        app.routes['components.processors.processor.details'] = '{{ route('components.processors.processor.details', ['id' => $id]) }}';
        app.routes['components.processors.processor.edit.post'] = '{{ route('components.processors.processor.edit.post', ['id' => $id]) }}';
        app.routes['components.processors.processor.delete.post'] = '{{ route('components.processors.processor.delete.post', ['id' => $id]) }}';

        app.routes['misc.manufacturers.select2'] = '{{ route('misc.manufacturers.select2') }}';
        app.routes['misc.cpu-sockets.select2'] = '{{ route('misc.cpu-sockets.select2') }}';
        app.routes['misc.memory-speeds.select2'] = '{{ route('misc.memory-speeds.select2') }}';
        app.routes['misc.memory-types.select2'] = '{{ route('misc.memory-types.select2') }}';

        $(document).ready(function() {
            app.pageVariables.editForm = new Vue({
                el: '#edit-form',
                mounted: function() {
                    this.getData();
                },
                data: {
                    processor: {
                        "id": null,
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
                    }
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
                            vm.getSelectOptions(app.routes['misc.cpu-sockets.select2'], 'cpuSocketOptions'),
                            vm.getSelectOptions(app.routes['misc.memory-speeds.select2'], 'memorySpeedOptions'),
                            vm.getSelectOptions(app.routes['misc.memory-types.select2'], 'memoryTypeOptions')
                        ).done(function() {
                            vm.isLoading = false;
                            $.get(app.routes['components.processors.processor.details'], function(response, status) {
                                vm.processor = response.data;
                            }).fail(function(response, status) {
                                vm.pageAlert = response.responseJSON.message;
                            });
                        });
                    },
                    postData: function() {
                        let vm = this;
                        let data = vm.processor;

                        vm.errors = {};
                        vm.pageAlert.message = null;

                        $.post(app.routes['components.processors.processor.edit.post'], data, function(response, status) {
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
                methods: {
                    postDelete: function() {
                        let vm = this;
                        let pageVm = app.pageVariables.editForm;
                        let data = pageVm.processor;

                        $.post(app.routes['components.processors.processor.delete.post'], data, function(response, status) {
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
