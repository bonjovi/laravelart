<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Auth;
use CyrildeWit\EloquentViewable\Viewable;
use TCG\Voyager\Traits\Resizable;

class Product extends Model
{
    use Resizable;
    use SearchableTrait;
    use Viewable;

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

    public function materials()
    {

        return $this->belongsToMany('App\Material', 'material_product');
    }

    public function surfaces()
    {

        return $this->belongsToMany('App\Surface', 'surface_product');
    }

    public function themes()
    {

        return $this->belongsToMany('App\Theme', 'theme_product');
    }




    


    public function painter()
    {

        return $this->hasOne('App\Painter', 'id', 'painter_id');
    }

    public function user()
    {

        return $this->hasOne('App\User', 'id', 'user_id');
    }






    public function save(array $options = [])
    {
        
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->user_id && Auth::user()) {
            $this->user_id = Auth::user()->id;
        }
        parent::save();
    }

}
