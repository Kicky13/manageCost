<?php

namespace App\Http\Controllers\Api;

use App\Travel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TravelController extends Controller
{
    private function response($data)
    {
        return response()->json($data);
    }

    public function getData()
    {
        $travels = Travel::all();
        return $this->response(compact('travels'));
    }
}
