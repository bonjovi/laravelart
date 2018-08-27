<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    public function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }
}
