<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    

    protected $fillable = [
        'name','image','address','phone','open_hour','latitude','longtitude'
    ];    
}
