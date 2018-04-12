<?php

namespace App\Http\Controllers;

use App\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TravelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $travels = Travel::all();
        return view('travel.index', compact('travels'));
    }

    public function add()
    {
        return view('travel.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'travel_name' => 'required|unique:travel|min:2',
            'logo' => 'required|image|dimensions:width=225,height=225',
            'phone' => 'required|min:6'
        ]);
        $filename = Storage::disk('travel')->put('logo', $request->file('logo'));
        Travel::create([
            'travel_name' => $request->travel_name,
            'logo' => $filename,
            'travel_phone' => $request->phone

        ]);
        return redirect('/travel');
    }

    public function delete($id)
    {
        Travel::find($id)->delete();
        return redirect('/travel');
    }
}
