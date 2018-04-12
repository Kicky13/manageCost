<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
//    set table class
    protected $table = 'rate';

//    set timestamps
    public $timestamps = false;

//    set fillable form
    protected $fillable = [
        'car_id',
        'origin',
        'destination',
        'price',
    ];

//    class relation
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

}
