<?php

namespace App\Http\Controllers\Api;

use App\Car;
use App\Customer;
use App\Rate;
use App\City;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RencanaController extends Controller
{
    private function response($msg, $data)
    {
        $respond = [
            'error' => 'false',
            'message' => $msg,
            'data' => $data
        ];
        return response()->json($respond);
    }

    private function returningMsg($data)
    {
        if (count($data) != 0){
            return 'return';
        } else {
            return 'notfound';
        }
    }

    public function index()
    {
        $cities = City::all();
        $msg = $this->returningMsg($cities);
        return $this->response($msg, compact('cities'));
    }

    public function bepergian($origin, $destination, $passenger, $facility)
    {
        $services = Rate::with('car.travel')
            ->whereHas('car', function ($x) use ($passenger) {
                $x->has('travel')->where('max_passenger', '>=', $passenger);
            })->where('origin', ucfirst(strtolower($origin)))->where('destination', ucfirst(strtolower($destination)))->where('facility', $facility)->get();
        $msg = $this->returningMsg($services);
        return $this->response($msg, compact('services'));
    }

    public function detailService($id)
    {
        $detail = Rate::with('car')->find($id);
        $msg = 'return';
        return $this->response($msg, compact('detail'));
    }

    public function create(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|Email',
            'phone' => 'required'
        ]);
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        $service = Rate::find($id);
        $departure = 'Date : '.$request->date.', Time : '.$request->time.', Sub Destination : '.$request->sub_dest;
        Transaction::create([
            'user_id' => $customer->id,
            'departure_detail' => $departure,
            'discount' => 0,
            'subtotal' => $service->base_price.' + '.$service->additional_price,
            'total' => $service->price,
            'rate_id' => $id
        ]);
        if ($customer->id != 0 ){
            return $this->sendWhatsapp($id, $customer, $request->date, $request->time, $request->sub_dest);
        } else {
            return $this->error();
        }
    }

    private function sendWhatsapp($id, $customer, $date, $time, $sub)
    {
        $service = Rate::find($id);
        $travel = Car::find($service->car_id);
        $text = $travel->travel->travel_name.'%20Saya%20'.$customer->name.'%20ingin%20memesan%20travel%20'.$service->origin.'%20'.$service->destination.'%20tanggal%20'.$date.'%20jam%20'.$time.'%20dengan%20sub%20destinasi%20'.str_replace(',', '%2C', str_replace(' ', '%20', $sub)).'.%20Mobil%20yang%20saya%20pesan%20adalah%20'.$travel->type.'%20'.str_replace(' ', '%20', $travel->car_name).'%20dengan%20nomor%20plat%20'.$travel->reg_plate.'.';
        $url = 'https://api.whatsapp.com/send?phone='.$travel->travel->travel_phone.'&text='.$text;
        $msg = 'Insert Success';
        return $this->response($msg, compact('url'));
    }

    private function error()
    {
        $response = [
            'error' => 'true',
            'message' => 'Insert Unsuccesful',
            'data' => []
        ];
        return $response;
    }
}
