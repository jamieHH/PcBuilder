@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-12">
                    <h1>Edit Thing Example</h1>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <div class="input-group">
                                <div class="input-group-addon">@</div>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password <small id="passwordHelpBlock" class="form-text text-muted">(required maybe)</small></label>
                            {{--<div class="input-group">--}}
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                {{--<div class="input-group-addon">@</div>--}}
                            {{--</div>--}}
                            <small id="passwordHelp" class="form-text text-muted">You will never share your existence with anyone else.</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Label</label>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    Check me out
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    Me too
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            {{--<div class="input-group">--}}
                                {{--<div class="input-group-addon">@</div>--}}
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Example multiple select</label>
                            {{--<div class="input-group">--}}
                                {{--<div class="input-group-addon">@</div>--}}
                                <select multiple class="form-control" id="exampleFormControlSelect2">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            {{--</div>--}}
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                This is small, muted form text.
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                This is small, muted form text.
                            </small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Label</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    Option one
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    Option two
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
                                    Option three is disabled
                                </label>
                            </div>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                This is small, muted form text.
                            </small>
                        </div>
                    </div>
                </div>

                {{-- Add more bootstrap form examples here!! --}}

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-danger">Delete Thing</button>
                    <button class="btn btn-success pull-right">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
