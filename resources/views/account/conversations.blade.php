@extends('account.account')

@section('accountcontent')

<script>
$(function() {
    var div = $(".account__conversations");
    div.scrollTop(div.prop('scrollHeight'));
});
</script>

<a href="{{ route('account.messages') }}" class="account__conversation-backlink">
    <i class="material-icons">keyboard_backspace</i>
    Назад ко всем диалогам
</a>
<br><br><br>
<div class="title title_middle">
    Диалог с пользователем: {{ $user->name }}
</div>

<ul class="account__conversations">
    <div class="account__conversations-box">
        @foreach($messages as $message)
            @if($message->sender->id == auth()->user()->id)
                <li class="account__conversation account__conversation_left" id="message-{{$message->id}}">
                    <div class="account__conversation-wrapper">
                        <div class="account__conversation-time">
                            {{$message->created_at}}
                        </div>
                        <div class="message other-message float-right">
                            {{$message->message}}
                        </div>
                    </div>
                </li>
            @else

                <li class="account__conversation account__conversation_right" id="message-{{$message->id}}">
                    <div class="account__conversation-wrapper">
                        <div class="account__conversation-time">
                            {{$message->created_at}}
                        </div>
                        <div class="message my-message">
                            {{$message->message}}
                        </div>
                    </div>
                </li>
            @endif
        @endforeach
    </div>
</ul>




<form action="{{ route('message.new') }}" method="post" class="account__conversation-form">
    {{ csrf_field() }}
    <textarea name="message-data" id="message-data" placeholder ="Введите сообщение" rows="3" class="textarea"></textarea>
    <input type="hidden" name="_id" value="{{@request()->route('id')}}">
    <button type="submit" class="button">Отправить</button>
</form>


@endsection