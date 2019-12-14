@extends('app')

@section('content')
<div id="new-form">
    <loading-overlay v-bind:loading="isLoading"></loading-overlay>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-plus"></i>Add New Motherboard</b></h3>
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
                                label="Memory Device Name"
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
                        <button type="submit" class="btn btn-primary pull-right" v-on:click.prevent="postData()">
                            <i class="fa fa-plus"></i> Add New Motherboard
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
    app.routes['components.motherboards.new.post'] = '{{ route('components.motherboards.new.post') }}';

    app.routes['misc.manufacturers.select2'] = '{{ route('misc.manufacturers.select2') }}';
    app.routes['misc.cpu-sockets.select2'] = '{{ route('misc.cpu-sockets.select2') }}';
    app.routes['misc.mainboard-chipsets.select2'] = '{{ route('misc.mainboard-chipsets.select2') }}';
    app.routes['misc.motherboard-form-factors.select2'] = '{{ route('misc.motherboard-form-factors.select2') }}';

    $(document).ready(function() {
        app.pageVariables.form = new Vue({
            el: '#new-form',
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
                        vm.isLoading = false;
                    });
                },
                postData: function() {
                    let vm = this;
                    let data = vm.motherboard;

                    vm.errors = {};
                    vm.pageAlert.message = null;

                    vm.isLoading = true;
                    $.post(app.routes['components.motherboards.new.post'], data, function(response, status) {
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
