@extends('layouts.app')

@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <legend>Adding Service</legend>
                </div>
                <div class="content">
                    <form method="post" action="/service/create" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $id }}">

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Origin</label>
                                <div class="col-sm-10">
                                    <select name="origin" class="selectpicker {{ ($errors->has('origin')) ? "error" : "" }}" data-title="Origins" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                        @foreach($cities as $city)
                                        <option value="{{ $city->city_name }}">{{ $city->city_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">{{ ($errors->has('origin')) ? $errors->first('origin') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Destination</label>
                                <div class="col-sm-10">
                                    <select name="destination" class="selectpicker {{ ($errors->has('destination')) ? "error" : "" }}" data-title="Destination" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->city_name }}">{{ $city->city_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">{{ ($errors->has('destination')) ? $errors->first('destination') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" id="price" name="price" class="form-control {{ ($errors->has('price')) ? "error" : "" }}" placeholder="Write a Price">
                                    <span class="help-block">{{ ($errors->has('price')) ? $errors->first('price') : "" }}</span>
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