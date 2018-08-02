<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    public function styles()
    {

        return $this->belongsToMany('App\Style', 'style_product');
    }
}
