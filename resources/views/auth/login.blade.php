@extends('layouts.inner')

@section('content')
<div class="container">
    <div class="login-wrapper" style="width: 500px; margin:0 auto;">
                <h1 class="title title_centered">Вход</h1>


                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf


                            <label for="email" class="text">{{ __('E-Mail Address') }}</label>


                                <input id="email" type="email" class="input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="text" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif




                            <label for="password" class="text" style="margin:20px 0 0 0; display: block">{{ __('Password') }}</label>


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
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="button" style="margin-top: 20px;">
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
