@extends('account.account')

@section('accountcontent')

@if(Session::has('message'))
<p class="text flash flash_success">{{ Session::get('message') }}</p>
@endif

<form action="{{route('user.update')}}" method="POST">
    {{ csrf_field() }}
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Имя: </label>
        <input type="text" value="{{ $user->name }}" name="name" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Email: </label>
        <input type="text" value="{{ $user->email }}" name="email" disabled class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Пароль: </label>
        <input type="password" value="{{ $user->password }}" name="password" disabled class="input">
    </div>
    <input type="submit" value="Обновить" class="button account__savebutton">
</form> 

@endsection