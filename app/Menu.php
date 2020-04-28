<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'image','name','description','price','category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
