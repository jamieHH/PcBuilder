@extends('app')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><i class="fa fa-microchip"></i>Processors</b></h3>
        </div>
        <div class="panel-body" id="processors-page">
{{--            <div class="alert alert-danger" role="alert" style="display: none;" v-show="pageAlert">--}}
{{--                <h4 class="alert-heading">@{{ pageAlert }}</h4>--}}
{{--            </div>--}}
            @if (session('message'))
                <div class="alert alert-success">
                    <h4 class="alert-heading">{{ session('message') }}</h4>
                </div>
            @endif
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th v-for="header in datatable.headers">@{{ header }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="row in datatable.rows">
                        <td v-for="value in row"><div v-html="value"></div></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('components.processors.new') }}" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i> Add New Processor
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-javascript')
    <script>
        app.routes['components.processors.datatable'] = '{{ route('components.processors.datatable') }}';

        $(document).ready(function() {
            window.vue = new Vue({
                el: '#processors-page',
                mounted: function() {
                    this.getData();
                },
                data: {
                    datatable: {
                        headers: [],
                        rows: []
                    },
                    pageAlert: null
                },
                methods: {
                    getData: function() {
                        var vm = this;

                        $.get(app.routes['components.processors.datatable'], function(response, status) {
                            vm.datatable.headers = response.headers;
                            vm.datatable.rows = response.rows;

                        }).fail(function(response, status) {
                            vm.pageAlert = response.responseJSON.message;
                        });
                    }
                }
            });
        })
    </script>
@endsection
