<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use Notifiable;

    protected $fillable = [
        'address','phone','open_hour',
    ];    
}
