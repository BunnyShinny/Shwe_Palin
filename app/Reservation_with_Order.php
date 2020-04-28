<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation_with_Order extends Model
{
    protected $fillable = [
        'cart','name','phone','no_of_people','date','branch_id',
    ];
}
