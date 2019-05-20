<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('thanks_for_subscription')->with([
            'message' => 'Внизу в подвале сайта есть форма подписки. Подпишись, дружок ;)'
        ]);
    }

    public function store(Request $request)
    {
        Subscription::create([
            'email' => $request->email,
        ]);


        return view('thanks_for_subscription')->with([
            'message' => 'Спасибо за подписку'
        ]);
    }
}
