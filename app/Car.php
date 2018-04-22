<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
//  set table class
    protected $table = 'car';

//  set timestamps
    public $timestamps = false;

//  set fillable form
    protected $fillable = [
        'car_name',
        'type',
        'color',
        'car_cc',
        'fuel_type',
        'car_year',
        'reg_plate',
        'car_image',
        'max_passenger',
        'luggage_capacity',
        'travel_id'
    ];

//  class relation
    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }
    public function rate()
    {
        return $this->hasMany(Rate::class);
    }
}
