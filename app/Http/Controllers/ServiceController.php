<?php

namespace App\Http\Controllers;

use App\Car;
use App\City;
use App\Rate;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function services($id)
    {
        $car = Car::find($id);
        return view('travel.service.index', compact('car'));
    }

    public function add($id)
    {
        $cities = City::all();
        return view('travel.service.create', array('cities' => $cities, 'id' => $id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'origin' => 'required',
            'destination' => 'required',
            'price' => 'required|numeric|min:1000'
        ]);
        Rate::create($request->all());
        return redirect('/service/'.$request->car_id);
    }

    public function delete($id)
    {
        Rate::find($id)->delete();
        return back();
    }
}
