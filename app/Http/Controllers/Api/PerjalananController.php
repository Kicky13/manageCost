<?php

namespace App\Http\Controllers\Api;

use App\Car;
use App\City;
use App\Customer;
use App\Rate;
use App\Transaction;
use App\Travel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class PerjalananController extends Controller
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

    public function search($origin, $destination)
    {
        $services = Rate::with('car.travel')
            ->whereHas('car', function ($x){
                $x->has('travel');
            })->where('origin', ucfirst(strtolower($origin)))->where('destination', ucfirst(strtolower($destination)))->get();
        return $this->response(compact('services'));
    }

    public function detailService($id)
    {
        $detail = Rate::with('car.travel')->find($id);
        return $this->response(compact('detail'));
    }

    public function create(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|Email',
            'phone' => 'required'
        ]);
        $customer = Customer::create($request->all());
        $service = Rate::find($id);
        Transaction::create([
            'user_id' => $customer->id,
            'discount' => 0,
            'subtotal' => $service->price,
            'total' => $service->price,
            'rate_id' => $id
        ]);
        echo 'Success';
    }

    private function sendWhatsapp($id, $customer)
    {
        $service = Rate::find($id);
        $travel = Car::find($service->car_id);
        $urlMsg = urlencode($travel->travel->travel_name.', Saya '.$customer->name.' Ingin memesan travel '.$service->origin.' '.$service->destination.' Tanggal '.$customer->date);
    }

}
