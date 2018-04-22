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
                                <label class="col-sm-2 control-label">Facility</label>
                                <div class="col-sm-10">
                                    <select name="facility" class="selectpicker {{ ($errors->has('facility')) ? "error" : "" }}"
                                            data-title="Choose Facility" data-style="btn-default btn-block"
                                            data-menu-style="dropdown-blue">
                                        <option value="Mobil + Supir">Mobil + Supir</option>
                                        <option value="Mobil + Supir + BBM">Mobil + Supir + BBM</option>
                                    </select>
                                    <span class="help-block">{{ ($errors->has('facility')) ? $errors->first('facility') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Base Price</label>
                                <div class="col-sm-10">
                                    <input type="text" id="base_price" name="base_price" class="form-control {{ ($errors->has('base_price')) ? "error" : "" }}" placeholder="Write a Price">
                                    <span class="help-block">{{ ($errors->has('base_price')) ? $errors->first('base_price') : "" }}</span>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Additional Price</label>
                                <div class="col-sm-10">
                                    <input type="text" id="additional_price" name="additional_price" class="form-control {{ ($errors->has('additional_price')) ? "error" : "" }}" placeholder="Write a Price">
                                    <span class="help-block">{{ ($errors->has('additional_price')) ? $errors->first('additional_price') : "" }}</span>
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