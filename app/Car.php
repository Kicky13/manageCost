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
        'car_image',
        'max_passenger',
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
