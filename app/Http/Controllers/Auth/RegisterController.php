<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(request()->file('certifying_document') !== null)  {
            $path = request()->file('certifying_document')->store('uploads', 'public');

            \Mail::send('emails.certifying_document', [
                'name' => $data['name'],
                'certifyingDocumentPath' => $path
            ], function($message)
            {
                $message->to(config('mail.username'), config('mail.from.name'))->subject('Новый пользователь загрузил подтверждающие документы');
            });

        } else {
            $path = '';
        }
        

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'certifying_document' => $path,
            'i_am_painter_lastname' => $data['i_am_painter_lastname'],
            'i_am_painter_name' => $data['i_am_painter_name'],
            'i_am_painter_patronymic_name' => $data['i_am_painter_patronymic_name'],
            'i_am_painter_birthdate' => $data['i_am_painter_birthdate'],
            'i_am_painter_phone' => $data['i_am_painter_phone'],
            'i_am_painter_heir_or_painter' => isset($data['i_am_painter_heir_or_painter']) ? 1 : 0,
            'i_am_painter_sculptor_or_painter' => isset($data['i_am_painter_sculptor_or_painter']) ? 1 : 0,
            'i_am_painter_stylistics' => $data['i_am_painter_stylistics'],
            'i_am_painter_exhibitions' => $data['i_am_painter_exhibitions'],
            'i_am_painter_biography' => $data['i_am_painter_biography'],

            'i_am_dealer_lastname' => $data['i_am_dealer_lastname'],
            'i_am_dealer_name' => $data['i_am_dealer_name'],
            'i_am_dealer_patronymic_name' => $data['i_am_dealer_patronymic_name'],
            'i_am_dealer_phone' => $data['i_am_dealer_phone'],
            'i_am_dealer_modern_art' => isset($data['i_am_dealer_modern_art']) ? 1 : 0,
            'i_am_dealer_old_art' => isset($data['i_am_dealer_old_art']) ? 1 : 0,
            'i_am_dealer_period' => $data['i_am_dealer_period'],
            'i_am_dealer_way' => $data['i_am_dealer_way']
        ]);
    }

    public function messages()
    {
    return [
        'title.required' => 'Необходимо указать заголовок',
        'body.required'  => 'Необходимо написать статью',
        'validation.min.string'  => 'Необходимо написать статью'
    ];
    }
}
