<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{

    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.description' => 10,
            'painters.lastname' => 2,
        ],
        'joins' => [
            'painters' => ['products.painter_id','painters.id'],
        ]
    ];



    protected $fillable = [
        'token',
        'name',
        'material',
        'dimensions',
        'year',
        'price'
    ];


    public function styles()
    {

        return $this->belongsToMany('App\Style', 'style_product');
    }


    public function painter()
    {

        return $this->hasOne('App\Painter', 'id', 'painter_id');
    }

    public function user()
    {

        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
