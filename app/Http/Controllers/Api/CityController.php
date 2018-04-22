<?php

namespace App\Http\Controllers\Api;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    private function response($msg, $data)
    {
        $response = [
            'error' => 'false',
            'message' => $msg,
            'data' => $data
        ];
        return response()->json($response);
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
}
