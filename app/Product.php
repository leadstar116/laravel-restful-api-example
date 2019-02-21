<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'Product';
    public $timestamps = false;


    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }

    public function price()
    {
        return $this->hasOne('App\Price');
    }

    public function children()
    {
        return $this->hasMany('App\Product', 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Product', 'parent_id', 'id');
    }

}