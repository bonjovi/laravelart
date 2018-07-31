@extends('layouts.inner')

@section('content')
<div class="container">
    <div class="login-wrapper" style="width: 500px; margin:0 auto;">
        <h1 class="title title_centered">Добро пожаловать!</h1>

                <div class="text" style="text-align: center;">
                    @if (session('status'))
                        <div class="text" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Вы успешно авторизовались

                    <a class="text" href="/logout">Выйти</a>
                </div>
            </div>
        </div>

@endsection
