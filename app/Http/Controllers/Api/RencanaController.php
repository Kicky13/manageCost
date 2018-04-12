<?php

namespace App\Http\Controllers\Api;

use App\Rate;
use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RencanaController extends Controller
{
    private function response($data)
    {
        return response()->json($data);
    }

    public function index()
    {
        $cities = City::all();
        return $this->response(compact('cities'));
    }

    public function bepergian($origin, $destination, $passenger)
    {
        $services = Rate::with('car.travel')
            ->whereHas('car', function ($x) use ($passenger) {
                $x->has('travel')->where('max_passenger', '>=', $passenger);
            })->where('origin', $origin)->where('destination', $destination)->get();
        return $this->response(compact('services'));
    }

    public function detailService($id)
    {
        $detail = Rate::find($id)->with('car')->first();
        return $this->response(compact('detail'));
    }

    public function create(Request $request, $id)
    {

    }

    private function sendWhatsapp($id, $customer)
    {
        $service = Rate::find($id)->first();
        $travel = Car::find($service->car_id)->first();
        $urlMsg = urlencode($travel->travel->travel_name.', Saya '.$customer->name.' Ingin memesan travel '.$service->origin.' '.$service->destination.' Tanggal '.$customer->date);
    }
}
