<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'cart','name', 'address', 'phone', 'discount'
    ];

    // public function user(){
    //     return $this->belongTo('App\User'); 
    // }
}
