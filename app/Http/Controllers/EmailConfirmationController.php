<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class EmailConfirmationController extends Controller
{
    public function confirm($token) {
        $user = User::where('confirmation_token', $token)->first();
        if($user === null) {
            abort(404);
        }

        $user->emailConfirm();
        Auth::login($user);

        \Session::flash('message', 'Email успешно подтверждён!');

        return redirect('/account/profile');

        //return redirect()->back()->with( ['messages' => $messages, 'user' => $user] );
    }

    public function getLink() {
        $user = Auth::user();
        
        \Mail::send('emails.confirm-email', [
            'confirmation_token' => $user->confirmation_token
        ], function($message)
        {
            $user = Auth::user();
            //dd($user->email);
            $message->to($user->email, config('mail.from.name'))->subject('Подтверждение email');
        });

        \Session::flash('message', 'Ссылка для подтверждения отправлена на Ваш email');

        return redirect('/account/profile');
    }


    
}
