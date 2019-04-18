@extends('layouts.inner')

@section('content')

<div class="container">
    <div class="login-wrapper">
        <h1 class="title title_centered">Сброс пароля</h1>
        @if (session('status'))
            <div class="flash flash_success">
                {{ session('status') }}
            </div>
            <br><br>
        @endif

        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="text">E-mail адрес, на который будет отправлена ссылка для сброса пароля</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <br>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="button">
                        Отправить ссылку для сброса пароля
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>










@endsection
