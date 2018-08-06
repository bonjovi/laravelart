@extends('layouts.inner')

@section('content')
<h1 class="title title_basegrey title_centered">
@if(isset($title))
    {{ $title }}
@else
    Профиль
@endif
</h1>

<div class="account">
    
    <div class="account__left">
        
        @include('account.accountmenu')

        @yield('accountcontent')
           
    </div>
    <div class="account__right">
        <div class="account__pic">
            <img src="/public/img/account-not-found.png" alt="{{ $user->name }}">
        </div>
        <h3 class="account__username title title_middle">{{ $user->name }}</h3>
        @yield('rightmenu')
    </div>
</div>
@endsection
