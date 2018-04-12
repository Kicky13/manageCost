<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'discount', 'subtotal', 'total', 'rate_id'
    ];
}
