@extends('app')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b>Add New Processor</b></h3>
        </div>
        <div class="panel-body">
            <form>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-lg">
                            <label for="name">Processor Name</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Name" autofocus>
                            </div>
                            <!-- inline error -->
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
