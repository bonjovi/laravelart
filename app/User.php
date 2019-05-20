<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Notifications\ResetPassword as ResetPasswordNotification;

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
        'name', 'email', 'password', 'confirmation_token', 'is_verified', 'certifying_document', 
        'i_am_painter_lastname', 'i_am_painter_name', 'i_am_painter_patronymic_name', 'i_am_painter_birthdate', 'i_am_painter_phone', 'i_am_painter_heir_or_painter', 'i_am_painter_sculptor_or_painter', 'i_am_painter_stylistics', 'i_am_painter_exhibitions', 'i_am_painter_biography',
        'i_am_dealer_lastname', 'i_am_dealer_name', 'i_am_dealer_patronymic_name', 'i_am_dealer_phone', 'i_am_dealer_modern_art', 'i_am_dealer_old_art', 'i_am_dealer_period', 'i_am_dealer_way',
        'token', 'vkontakte_id', 'facebook_id'
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







    const EMAIL_CONFIRMED = 1;
    const EMAIL_NOT_CONFIRMED = 0;
    const TOKEN_EXPIRED = null;

    public function emailConfirm()
    {
        $this->confirmation_token = self::TOKEN_EXPIRED;
        $this->is_verified = self::EMAIL_CONFIRMED;
        return $this->save();
    }

    public function isEmailConfirmed()
    {
        return (bool) $this->is_verified;
    }






    public function sendPasswordResetNotification($token)
    {
        // Добавляем свой класс.
        $this->notify(new ResetPasswordNotification($token));
    }





    public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();


        if(is_null($check)){
            return static::create($input);
        }


        return $check;
    }
}
