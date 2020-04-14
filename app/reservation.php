<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $fillable = [
        'name','phone','no_of_people','date','branch_id',
    ];  
    
}
