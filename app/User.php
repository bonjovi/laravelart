<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    public function getFullUserNameAttribute()
    {
        return "{$this->name}";
    }

    public $additional_attributes = ['full_user_name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'certifying_document', 
        'i_am_painter_lastname', 'i_am_painter_name', 'i_am_painter_patronymic_name', 'i_am_painter_birthdate', 'i_am_painter_phone', 'i_am_painter_heir_or_painter', 'i_am_painter_sculptor_or_painter', 'i_am_painter_stylistics', 'i_am_painter_exhibitions',
        'i_am_dealer_lastname', 'i_am_dealer_name', 'i_am_dealer_patronymic_name', 'i_am_dealer_phone', 'i_am_dealer_modern_art', 'i_am_dealer_old_art', 'i_am_dealer_period', 'i_am_dealer_way',
        'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
