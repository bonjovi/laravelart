@extends('layouts.inner')

@section('content')
<div class="container">
    <div class="login-wrapper">
                <h1 class="title title_centered">Вход</h1>
                    <div class="login-wrapper__social-entrance">
                        <a href="{{ url('auth/facebook') }}" class="login-wrapper__social-entrance_fb">
                            <img src="/img/facebook.svg" alt="" width="20">
                            <strong>Войти через Facebook</strong>
                        </a>  

                        <a href="{{ url('auth/vkontakte') }}" class="login-wrapper__social-entrance_vk">
                            <img src="/img/vk.svg" alt="" width="25">
                            <strong>Войти через Вконтакте</strong>
                        </a> 
                    </div>
                     

                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf


                            <label for="email" class="text">{{ __('E-Mail') }}</label>


                                <input id="email" type="email" class="input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="text" role="alert">
                                        <!--<strong>{{ $errors->first('email') }}</strong>-->
                                        <strong>пароль не верен</strong>
                                    </span>
                                @endif




                            <label for="password" class="text" style="margin:20px 0 0 0; display: block">{{ __('Пароль') }}</label>


                                <input id="password" type="password" class="input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="text" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif



                        <div class="form-group row" style="margin-top: 20px;">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="text" for="remember">
                                        Запомнить меня
                                    </label>

                                    <br><br>
                                    <a href="/password/reset">Забыли пароль?</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="">
                                <button type="submit" class="button" style="margin-top: 20px; width: 100%;">
                                    Войти
                                </button>

                            <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>-->
                            </div>
                        </div>
                    </form>

    </div>
</div>
@endsection
