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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-lg">
                            <label for="name">Processor Name</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Name" v-model="processor.name" autofocus>
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg">
                            <label for="manufacturer">Manufacturer</label>
                            <select id="manufacturer" name="manufacturer" class="form-control" v-model="processor.manufacturerId">
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
                            <select id="cpu-socket" name="cpu_socket" class="form-control" v-model="processor.cpuSocketId">
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
                                <input id="base-clock" type="number" min="0" class="form-control" name="base_clock" placeholder="Base Clock" v-model="processor.baseClock">
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-lg">
                            <label for="boost-clock">Boost Clock <small class="text-muted">(MHz)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-tachometer"></i></span>
                                <input id="boost-clock" type="number" min="0" class="form-control" name="boost_clock" placeholder="Boost Clock" v-model="processor.boostClock">
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-lg">
                            <label for="core-count">Core Count</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-microchip"></i></span>
                                <input id="core-count" type="number" min="0" class="form-control" name="core_count" placeholder="Core Count" v-model="processor.coreCount">
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-lg">
                            <label for="thread-count">Thread Count</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
                                <input id="thread-count" type="number" min="0" class="form-control" name="thread_count" placeholder="Thread Count" v-model="processor.threadCount">
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-lg">
                            <label for="l1-cache">L1 Cache <small class="text-muted">(MBs)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-microchip"></i></span>
                                <input id="l1-cache" type="number" min="0" class="form-control" name="l1_cache" placeholder="L1 Cache" v-model="processor.l1Cache">
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-lg">
                            <label for="l2-cache">L2 Cache <small class="text-muted">(MBs)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-microchip"></i></span>
                                <input id="l2-cache" type="number" min="0" class="form-control" name="l2_cache" placeholder="L2 Cache" v-model="processor.l2Cache">
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-lg">
                            <label for="l3-cache">L3 Cache <small class="text-muted">(MBs)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-microchip"></i></span>
                                <input id="l3-cache" type="number" min="0" class="form-control" name="l3_cache" placeholder="L3 Cache" v-model="processor.l3Cache">
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
                            <label for="max-pci-express-lanes">Max PCI Express Lanes</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-microchip"></i></span>
                                <input id="max-pci-express-lanes" type="number" min="0" class="form-control" name="max_pci_express_lanes" placeholder="Max PCI Express Lanes" v-model="processor.maxPciExpressLanes">
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-lg">
                            <label for="supported-memory-types">Supported Memory Types</label>
                            <select id="supported-memory-types" name="supported_memory_types" class="form-control" v-model="processor.supportedMemoryTypeIds" multiple>
                                <option value="1">DDR4 3200 Mhz</option>
                                <option value="2">DDR4 2666 Mhz</option>
                                <option value="3">DDR4 1600 Mhz</option>
                                <option value="4">DDR4 1400 Mhz</option>
                                <option value="5">DDR4 1333 Mhz</option>
                            </select>
                            <!-- inline error -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg">
                            <label for="max-memory-support">Max Memory Supported <small class="text-muted">(MBs)</small></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-microchip"></i></span>
                                <input id="max-memory-support" type="number" min="0" class="form-control" name="max_memory_support" placeholder="Max Memory Support" v-model="processor.maxMemorySupported">
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
        window.thing = new Vue({
            el: '#add-new-processor',
            mounted: function() {
                this.getData();
            },
            data: {
                processor: {
                    name: null,
                    manufacturerId: null,
                    cpuSocketId: null,
                    baseClock: null,
                    boostClock: null,
                    coreCount: null,
                    threadCount: null,
                    l1Cache: null,
                    l2Cache: null,
                    l3Cache: null,
                    tdp: null,
                    lithography: null,
                    maxPciExpressLanes: null,
                    supportedMemoryTypeIds: [],
                    maxMemorySupported: null,
                }
            },
            methods: {
                getData: function() {
                    // TODO: get select boxes data
                },
                postData: function() {
                    var vm = this;

                    var data = vm.processor;

                    $.post(routes['components.processors.new.post'], data, function(response, status) {
                        alert("success");
                        console.log(response);
                    }).fail(function(response, status) {
                        alert("fail");
                        console.log(response.responseJSON);
                    });
                }
            }
        });
    })
</script>
@endsection
