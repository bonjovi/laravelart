<?php


namespace App\Http\Controllers\Auth;


use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;


class VkontakteController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToVkontakte()
    {
        //return Socialite::driver('facebook')->redirect();
        return Socialite::with('vkontakte')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleVkontakteCallback()
    {

        $vkontakteUser = Socialite::driver('vkontakte')->user();
        //dd($vkontakteUser->accessTokenResponseBody['email']);

        $user = User::where('vkontakte_id', $vkontakteUser->id)->first();

        if(!$user) {
            $user = User::create([
                'name' => $vkontakteUser->name,
                'email' => $vkontakteUser->accessTokenResponseBody['email'],
                'confirmation_token' => str_random(30),
                'vkontakte_id' => $vkontakteUser->id,
            ]);
        }

        Auth::login($user, true);

        return redirect('/account/profile');












        
    }
}