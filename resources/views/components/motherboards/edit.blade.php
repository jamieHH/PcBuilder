@extends('app')

@section('content')
<div id="edit-form">
    <loading-overlay v-bind:loading="isLoading"></loading-overlay>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-plus"></i>Edit Motherboard</b></h3>
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
                                label="Motherboard Name"
                                icon="fa fa-microchip"
                                v-bind:field-errors="errors.name"
                                v-model="motherboard.name"
                        ></text-input>
                    </div>
                    <div class="col-md-6">
                        <select-input
                                name="manufacturer_id"
                                label="Manufacturer"
                                placeholder="Manufacturer"
                                v-bind:options="manufacturerOptions"
                                v-bind:field-errors="errors.manufacturer_id"
                                v-model="motherboard.manufacturer_id"
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
                                v-model="motherboard.cpu_socket_id"
                        ></select-input>
                    </div>
                    <div class="col-md-6">
                        <select-input
                                name="mainboard_chipset_id"
                                label="Mainboard Chipset"
                                placeholder="Mainboard Chipset"
                                v-bind:options="mainboardChipsetOptions"
                                v-bind:field-errors="errors.mainboard_chipset_id"
                                v-model="motherboard.mainboard_chipset_id"
                        ></select-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <select-input
                                name="motherboard_form_factor_id"
                                label="Form Factor"
                                placeholder="Form Factor"
                                v-bind:options="motherboardFormFactorsOptions"
                                v-bind:field-errors="errors.motherboard_form_factor_id"
                                v-model="motherboard.motherboard_form_factor_id"
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
                            <i class="fa fa-plus"></i> Update Motherboard
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
                    <h4 class="modal-title" id="deleteItemModalLabel">Delete Motherboard</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this motherboard?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button id="delete-motherboard-btn" type="button" class="btn btn-danger" v-on:click.prevent="postDelete()">Delete Motherboard</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-javascript')
    <script>
        app.routes['components.motherboards.motherboard.details'] = '{{ route('components.motherboards.motherboard.details', ['id' => $id]) }}';
        app.routes['components.motherboards.motherboard.edit.post'] = '{{ route('components.motherboards.motherboard.edit.post', ['id' => $id]) }}';
        app.routes['components.motherboards.motherboard.delete.post'] = '{{ route('components.motherboards.motherboard.delete.post', ['id' => $id]) }}';

        app.routes['misc.manufacturers.select2'] = '{{ route('misc.manufacturers.select2') }}';
        app.routes['misc.cpu-sockets.select2'] = '{{ route('misc.cpu-sockets.select2') }}';
        app.routes['misc.mainboard-chipsets.select2'] = '{{ route('misc.mainboard-chipsets.select2') }}';
        app.routes['misc.motherboard-form-factors.select2'] = '{{ route('misc.motherboard-form-factors.select2') }}';

        $(document).ready(function() {
            app.pageVariables.editForm = new Vue({
                el: '#edit-form',
                mounted: function() {
                    this.getData();
                },
                data: {
                    motherboard: {
                        "name": null,
                        "manufacturer_id": null,
                        "cpu_socket_id": null,
                        "mainboard_chipset_id": null,
                        "motherbaord_form_factor_id": null
                    },
                    manufacturerOptions: [],
                    cpuSocketOptions: [],
                    mainboardChipsetOptions: [],
                    motherboardFormFactorsOptions: [],
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
                            vm.getSelectOptions(app.routes['misc.cpu-sockets.select2'], 'cpuSocketOptions'),
                            vm.getSelectOptions(app.routes['misc.mainboard-chipsets.select2'], 'mainboardChipsetOptions'),
                            vm.getSelectOptions(app.routes['misc.motherboard-form-factors.select2'], 'motherboardFormFactorsOptions')
                        ).done(function() {
                            $.get(app.routes['components.motherboards.motherboard.details'], function(response, status) {
                                vm.isLoading = false;
                                vm.motherboard = response.data;
                            }).fail(function(response, status) {
                                vm.pageAlert = response.responseJSON.message;
                            });
                        });
                    },
                    postData: function() {
                        let vm = this;
                        let data = vm.motherboard;

                        vm.errors = {};
                        vm.pageAlert.message = null;
                        vm.isLoading = true;
                        $.post(app.routes['components.motherboards.motherboard.edit.post'], data, function(response, status) {
                            vm.isLoading = false;
                            $(".main").animate({ scrollTop: 0 }, "slow");
                            vm.pageAlert = {
                                'type': 'success',
                                'message': response.message
                            }
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

            app.pageVariables.deletionModal = new Vue({
                el: '#deletion-modal',
                methods: {
                    postDelete: function() {
                        let vm = this;
                        let pageVm = app.pageVariables.editForm;
                        let data = pageVm.motherboard;

                        $.post(app.routes['components.motherboards.motherboard.delete.post'], data, function(response, status) {
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
