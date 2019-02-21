<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model 
{

    protected $table = 'Provider';
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}