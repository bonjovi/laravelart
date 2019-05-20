<?php

namespace App\Http\Controllers;
use Input;
use Illuminate\Http\Request;
use Validator;
use Mail;
use Redirect;
use Illuminate\Support\Facades\Input as ContactInput;
use App\Pages;
use App\Contact;

class ContactController extends Controller
{
    public function sendMessage(Request $request) {

        $messages = [
            'fio.required' => 'Поле "ФИО" должно быть заполнено',
            'email.required' => 'Поле "Email" должно быть заполнено',
            'email.email' => 'Поле "Email" должно быть корректным email адресом',
            'message.required' => 'Поле "Сообщение" должно быть заполнено',
            'message.min' => 'Поле "Сообщение" должно быть длиной не менее 5 символов',
        ];

        $v = \Validator::make($request->all(), [
            'fio' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ], $messages);
    
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        } else {
            \Mail::send('emails.contactform', [
                'fio' => $request->fio,
                'email' => $request->email,
                'msg' => $request->message
            ], function($message)
            {
                $message->to(config('mail.username'), config('mail.from.name'))->subject('Обращение через форму обратной связи');
            });

            \Session::flash('message', 'Сообщение было успешно отправлено');

            $contact = Contact::create([
                'fio' => $request->fio,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            return redirect()->route('contacts');
        }

        
    }
}