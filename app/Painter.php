<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Painter extends Model
{
    public function getFullNameAttribute()
    {
        return "{$this->lastname} {$this->firstname} {$this->patronymic}";
    }

    public $additional_attributes = ['full_name'];

    public function paintings()
    {
        return $this->hasMany(Product::class);
    }
}
