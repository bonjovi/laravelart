@extends('layouts.inner')

@section('content')
    <style>
        .form-group.row {
            margin-bottom: 20px;
        }
    </style>
<div class="container">
    <div class="login-wrapper" style="width: 500px; margin:0 auto;">
                <h1 class="title title_centered">Регистрация</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="text">Имя</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="input form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="text" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="text">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="text" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="text">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="text" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="text">Повтор пароля</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="input form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="button">
                                    Зарегистрироваться
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

</div>
@endsection
