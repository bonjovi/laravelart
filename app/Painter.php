<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;

class Painter extends Model
{
    use Viewable;

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
