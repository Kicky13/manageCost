<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
//  set timestamps
    public $timestamps = false;

//  set table class
    protected $table = 'travel';

//  set fillable form
    protected $fillable = [
        'travel_name',
        'logo',
        'travel_phone',
    ];

//  class relation
    public function car()
    {
        return $this->hasMany(Car::class);
    }
}
