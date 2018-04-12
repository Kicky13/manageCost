@extends('layouts.app')

@section('css')
    <link href="/dist/css/bootstrap-colorpicker.css" rel="stylesheet">
@endsection

@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <legend>Adding Car</legend>
                </div>
                <div class="content">
                    <form method="post" action="/car/create" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Car Name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name"
                                           class="form-control {{ ($errors->has('name')) ? "error" : "" }}"
                                           placeholder="Write a Car Name">
                                    <span class="help-block">{{ ($errors->has('name')) ? $errors->first('name') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Color</label>
                                <div class="col-sm-10">
                                    <input type="text" id="colorpick" name="color"
                                           class="form-control {{ ($errors->has('color')) ? "error" : "" }}"
                                           placeholder="Pick Color from pallete">
                                    <span class="help-block">{{ ($errors->has('color')) ? $errors->first('name') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Type</label>
                                <div class="col-sm-10">
                                    <select name="type" class="selectpicker {{ ($errors->has('type')) ? "error" : "" }}"
                                            data-title="Choose Car Type" data-style="btn-default btn-block"
                                            data-menu-style="dropdown-blue">
                                        @foreach($types as $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">{{ ($errors->has('type')) ? $errors->first('type') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Cc</label>
                                <div class="col-sm-10">
                                    <input type="text" id="cc" name="cc"
                                           class="form-control {{ ($errors->has('cc')) ? "error" : "" }}"
                                           placeholder="Write a Car cc">
                                    <span class="help-block">{{ ($errors->has('cc')) ? $errors->first('cc') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Fuel</label>
                                <div class="col-sm-10">
                                    <select name="fuel" class="selectpicker {{ ($errors->has('fuel')) ? "error" : "" }}"
                                            data-title="Choose Fuel Type" data-style="btn-default btn-block"
                                            data-menu-style="dropdown-blue">
                                        @foreach($fuels as $fuel)
                                            <option value="{{ $fuel }}">{{ $fuel }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">{{ ($errors->has('fuel')) ? $errors->first('fuel') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Year</label>
                                <div class="col-sm-10">
                                    <input type="text" id="cc" name="year"
                                           class="form-control {{ ($errors->has('year')) ? "error" : "" }}"
                                           placeholder="Write a Car Year">
                                    <span class="help-block">{{ ($errors->has('year')) ? $errors->first('year') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Max Passenger</label>
                                <div class="col-sm-10">
                                    <input type="text" id="max" name="max"
                                           class="form-control {{ ($errors->has('max')) ? "error" : "" }}"
                                           placeholder="Write a Maximum Passenger">
                                    <span class="help-block">{{ ($errors->has('max')) ? $errors->first('max') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" id="image" name="image"
                                           class="form-control {{ ($errors->has('image')) ? "error" : "" }}"
                                           placeholder="Insert Logo">
                                    <span class="help-block">{{ ($errors->has('image')) ? $errors->first('image') : "" }}</span>
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

@section('script')
    <script src="/dist/js/bootstrap-colorpicker.js"></script>
    <script>
        $(function () {
            $('#colorpick').colorpicker().toString();
        });
    </script>
@endsection