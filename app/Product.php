<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    public function styles()
    {

        return $this->belongsToMany('App\Style', 'style_product');
    }


    public function painter()
    {

        return $this->hasOne('App\Painter', 'id', 'painter_id');
    }
}
