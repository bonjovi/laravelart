<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Nahid\Talk\Facades\Talk;
use Auth;
use View;
class MessageController extends Controller
{
    protected $authUser;
    public function __construct()
    {
        $this->middleware('auth');
        Talk::setAuthUserId(Auth::id());
        //var_dump(Auth::user()->id); die;
        // View::composer('account.messages', function($view) {
        //     $threads = Talk::threads();
        //     $view->with(compact('threads'));
        // });
    }

    public function index()
    {
        Talk::setAuthUserId(Auth::id());
        $inboxes = Talk::getInbox();
        //var_dump($inboxes); die;
        //var_dump(Auth::id()); die;
        $user = $user = User::find(Auth::id());
        View::composer('account.messages', function($view) {
            //$threads = Talk::threads();
            $view->with(compact('inboxes', 'user'));
        });
        return view('account.messages', compact('inboxes', 'user'));
    }

    public function chatHistory($id)
    {
        Talk::setAuthUserId(Auth::id());
        $conversations = Talk::getMessagesByUserId($id, 0, 1115);
        $user = '';
        $messages = [];
        if(!$conversations) {
            $user = User::find($id);
        } else {
            $user = $conversations->withUser;
            $messages = $conversations->messages;
        }
        //var_dump($conversations->messages); die;
        if (count($messages) > 0) {
            $messages = $messages->sortBy('id');
        }
        
        return view('account.conversations', compact('messages', 'user'));
    }
    public function ajaxSendMessage(Request $request)
    {
        Talk::setAuthUserId(Auth::id());
        //var_dump(Auth::id()); die;
        //if ($request->ajax()) {
            $rules = [
                'message-data'=>'required',
                '_id'=>'required'
            ];
            $this->validate($request, $rules);
            $body = $request->input('message-data');
            $userId = $request->input('_id');
            //$user = User::find($userId);




            $conversations = Talk::getMessagesByUserId($userId, 0, 1115);
            $user = '';
            $messages = [];
            if(!$conversations) {
                $user = User::find($userId);
            } else {
                $user = $conversations->withUser;
                $messages = $conversations->messages;
            }
            if (count($messages) > 0) {
                $messages = $messages->sortBy('id');
            }
            

            

            if ($message = Talk::sendMessageByUserId($userId, $body)) {
                //$html = view('account.conversations', compact('messages', 'user'))->render();
                //print_r($message); die;
                //return response()->json(['status'=>'success', 'html'=>$html], 200);
                //return view('account.conversations', compact('messages', 'user'));
                return redirect()->back()->with( ['messages' => $messages, 'user' => $user] );
            }
        //}
    }
    public function ajaxDeleteMessage(Request $request, $id)
    {
        if ($request->ajax()) {
            if(Talk::deleteMessage($id)) {
                return response()->json(['status'=>'success'], 200);
            }
            return response()->json(['status'=>'errors', 'msg'=>'something went wrong'], 401);
        }
    }
    public function tests()
    {
        dd(Talk::channel());
    }
}