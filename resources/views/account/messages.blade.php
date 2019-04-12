@extends('account.account')

@section('accountcontent')

@if(count($inboxes) == 0)
    <div class="text">
        У вас нет активных переписок
    </div>
@else
    <ul class="account__messages">
        @foreach($inboxes as $inbox)
            @if(!is_null($inbox->thread))
        <li class="account__message">
            <a href="{{route('message.read', ['id'=>$inbox->withUser->id])}}" class="account__message-link">
            
            <div class="account__message-info">
                <div class="account__message-name">{{$inbox->withUser->name}}</div>
                <div class="account__message-status">
                    <span>
                        @if(auth()->user()->id == $inbox->thread->sender->id)
                        <i class="material-icons">reply</i>
                        @endif
                        {{substr($inbox->thread->message, 0, 20)}}
                    </span>
                    <span class="account__message-time">{{$inbox->thread->created_at}}</span>
                </div>
            </div>
            </a>
        </li>
            @endif
        @endforeach
    </ul>
@endif


@endsection