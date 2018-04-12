@extends('layouts.app')

@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <legend>Adding Travel</legend>
                </div>
                <div class="content">
                    <form method="post" action="/travel/create" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Travel Name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="travel_name" class="form-control {{ ($errors->has('travel_name')) ? "error" : "" }}" placeholder="Write a Travel Name">
                                    <span class="help-block">{{ ($errors->has('travel_name')) ? $errors->first('travel_name') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Travel Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" id="phone" name="phone" class="form-control {{ ($errors->has('phone')) ? "error" : "" }}" placeholder="Write a valid Travel Phone. Use International format">
                                    <span class="help-block">{{ ($errors->has('phone')) ? $errors->first('phone') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Logo</label>
                                <div class="col-sm-10">
                                    <input type="file" id="logo" name="logo" class="form-control {{ ($errors->has('logo')) ? "error" : "" }}" placeholder="Insert Logo">
                                    <span class="help-block">{{ ($errors->has('logo')) ? $errors->first('logo') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </fieldset>
                    </form>

                </div>
            </div>  <!-- end card -->

        </div> <!-- end col-md-12 -->
    </div>
@endsection