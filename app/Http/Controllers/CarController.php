<?php

namespace App\Http\Controllers;

use App\Car;
use App\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cars($id)
    {
        $travel = Travel::find($id);
        return view('travel.car.index', compact('travel'));
    }

    public function add($id)
    {
        $types = [
            'Toyota',
            'Suzuki',
            'Isuzu',
            'Mitsubishi',
            'Daihatsu',
            'Nissan',
        ];
        $fuels = [
            'Bio-Solar',
            'Premium',
            'Pertalite',
            'Pertamax'
        ];
        return view('travel.car.create', array('types' => $types, 'id' => $id, 'fuels' => $fuels));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'type' => 'required|min:2',
            'color' => 'required',
            'cc' => 'required|min:2',
            'fuel' => 'required',
            'year' => 'required|min:4|max:4',
            'plate' => 'required|min:4',
            'image' => 'required|image|dimensions:width=340,height=207',
            'max' => 'required',
            'luggage' => 'required'
        ]);
        Car::create([
            'car_name' => $request->name,
            'type' => $request->type,
            'color' => $request->color,
            'car_cc' => $request->cc,
            'fuel_type' => $request->fuel,
            'car_year' => $request->year,
            'reg_plate' => $request->plate,
            'car_image' => Storage::disk('travel')->put('car', $request->file('image')),
            'max_passenger' => $request->max,
            'luggage_capacity' => $request->luggage,
            'travel_id' => $request->id,
        ]);
        return redirect('/car/'.$request->id);
    }

    public function delete($id)
    {
        Car::find($id)->delete();
        return back();
    }
}
