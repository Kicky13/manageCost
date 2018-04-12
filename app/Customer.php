<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'user';
    public $timestamps = false;
    protected $fillable = [
        'name', 'email', 'phone',
    ];
}
