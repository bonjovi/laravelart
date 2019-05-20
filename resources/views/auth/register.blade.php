@extends('layouts.inner')

@section('content')
    <style>
        .form-group.row {
            margin-bottom: 20px;
        }
    </style>

    
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2316287201916038',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.3'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div class="container">
    <div class="login-wrapper" style="width: 500px; margin:0 auto;">
                <h1 class="title title_centered">Регистрация</h1>

                <div class="login-wrapper__social-entrance">
                    <a href="{{ url('auth/facebook') }}" class="login-wrapper__social-entrance_fb">
                        <img src="/img/facebook.svg" alt="" width="20">
                        <strong>Регистрация через Facebook</strong>
                    </a>  

                    <a href="{{ url('auth/vkontakte') }}" class="login-wrapper__social-entrance_vk">
                        <img src="/img/vk.svg" alt="" width="25">
                        <strong>Регистрация через Вконтакте</strong>
                    </a> 
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
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
                            <label for="email" class="text">{{ __('E-Mail') }}</label>

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

                        <br><br>
                        <script>
                            $(function() {
                                $('[name=approved_account]').on('click', function() {
                                    $('.approved_account_container').slideToggle();
                                });
                                $('[name=i_am_painter]').on('click', function() {
                                    $('.i_am_painter_container').slideToggle();
                                });
                                $('[name=i_am_dealer]').on('click', function() {
                                    $('.i_am_dealer_container').slideToggle();
                                });
                            });
                        </script>
                        <div class="form-group row">
                            <div class="checkbox">
								<label>
                                    <input type="checkbox" name="approved_account" class="checkbox">
                                    <span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Сделать аккаунт подтверждённым</span>
								</label>
							</div>
                        </div>

                        <div class="approved_account_container">
                            <div class="form-group row">
                                <label class="text">Загрузите скан документа, подтверждающего Вашу личность</label>

                                <div class="col-md-6">
                                    <input type="file" class="input form-control" name="certifying_document" style="background-image: none; margin-top: 20px;">
                                </div>
                            </div>
                        </div><!--./approved_account_container-->

                        <div class="form-group row">
                            <div class="checkbox">
								<label>
                                    <input type="checkbox" name="i_am_painter" class="checkbox">
                                    <span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Я художник</span>
								</label>
							</div>
                        </div>

                        <div class="i_am_painter_container">
                            <div class="form-group row">
                                <label class="text">Фамилия</label>
                                <div class="col-md-6">
                                    <input id="i_am_painter_lastname" type="text" class="input form-control{{ $errors->has('i_am_painter_lastname') ? ' is-invalid' : '' }}" name="i_am_painter_lastname" value="{{ old('i_am_painter_lastname') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text">Имя</label>
                                <div class="col-md-6">
                                    <input id="i_am_painter_name" type="text" class="input form-control{{ $errors->has('i_am_painter_name') ? ' is-invalid' : '' }}" name="i_am_painter_name" value="{{ old('i_am_painter_name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text">Отчество</label>
                                <div class="col-md-6">
                                    <input id="i_am_painter_patronymic_name" type="text" class="input form-control{{ $errors->has('i_am_painter_patronymic_name') ? ' is-invalid' : '' }}" name="i_am_painter_patronymic_name" value="{{ old('i_am_painter_patronymic_name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text">Дата рождения</label>
                                <div class="col-md-6">
                                    <input id="i_am_painter_birthdate" type="text" class="input form-control{{ $errors->has('i_am_painter_birthdate') ? ' is-invalid' : '' }}" name="i_am_painter_birthdate" value="{{ old('i_am_painter_birthdate') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text">Телефон</label>
                                <div class="col-md-6">
                                    <input id="i_am_painter_phone" type="text" class="input form-control{{ $errors->has('i_am_painter_phone') ? ' is-invalid' : '' }}" name="i_am_painter_phone" value="{{ old('i_am_painter_phone') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="i_am_painter_heir_or_painter" class="checkbox" value="1">
                                        <span class="checkbox-material"><span class="check"></span></span>
                                        <span class="text">Художник/наследник художника</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="i_am_painter_sculptor_or_painter" class="checkbox" value="1">
                                        <span class="checkbox-material"><span class="check"></span></span>
                                        <span class="text">Художник/скульптор</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text">Стилистика</label>
                                <div class="col-md-6">
                                    <input id="i_am_painter_stylistics" type="text" class="input form-control{{ $errors->has('i_am_painter_stylistics') ? ' is-invalid' : '' }}" name="i_am_painter_stylistics" value="{{ old('i_am_painter_stylistics') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text">Выставки</label>
                                <div class="col-md-6">
                                    <input id="i_am_painter_exhibitions" type="text" class="input form-control{{ $errors->has('i_am_painter_exhibitions') ? ' is-invalid' : '' }}" name="i_am_painter_exhibitions" value="{{ old('i_am_painter_exhibitions') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text">Биография</label>
                                <div class="col-md-6">
                                    <textarea name="i_am_painter_biography" id="i_am_painter_biography" class="textarea" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div><!--./i_am_painter_container-->

                        <div class="form-group row">
                            <div class="checkbox">
								<label>
                                    <input type="checkbox" name="i_am_dealer" class="checkbox">
                                    <span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Я дилер</span>
								</label>
							</div>
                        </div>

                        <div class="i_am_dealer_container">
                            <div class="form-group row">
                                <label class="text">Фамилия</label>
                                <div class="col-md-6">
                                    <input id="i_am_dealer_lastname" type="text" class="input form-control{{ $errors->has('i_am_dealer_lastname') ? ' is-invalid' : '' }}" name="i_am_dealer_lastname" value="{{ old('i_am_dealer_lastname') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text">Имя</label>
                                <div class="col-md-6">
                                    <input id="i_am_dealer_name" type="text" class="input form-control{{ $errors->has('i_am_dealer_name') ? ' is-invalid' : '' }}" name="i_am_dealer_name" value="{{ old('i_am_dealer_name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text">Отчество</label>
                                <div class="col-md-6">
                                    <input id="i_am_dealer_patronymic_name" type="text" class="input form-control{{ $errors->has('i_am_dealer_patronymic_name') ? ' is-invalid' : '' }}" name="i_am_dealer_patronymic_name" value="{{ old('i_am_dealer_patronymic_name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text">Телефон</label>
                                <div class="col-md-6">
                                    <input id="i_am_dealer_phone" type="text" class="input form-control{{ $errors->has('i_am_dealer_phone') ? ' is-invalid' : '' }}" name="i_am_dealer_phone" value="{{ old('i_am_dealer_phone') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="i_am_dealer_modern_art" class="checkbox">
                                        <span class="checkbox-material"><span class="check"></span></span>
                                        <span class="text">Современное искусство</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="i_am_dealer_old_art" class="checkbox">
                                        <span class="checkbox-material"><span class="check"></span></span>
                                        <span class="text">Старое искусство</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text">Период</label>
                                <div class="col-md-6">
                                    <input id="i_am_dealer_period" type="text" class="input form-control{{ $errors->has('i_am_dealer_period') ? ' is-invalid' : '' }}" name="i_am_dealer_period" value="{{ old('i_am_dealer_period') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text">Направление</label>
                                <div class="col-md-6">
                                    <input id="i_am_dealer_way" type="text" class="input form-control{{ $errors->has('i_am_dealer_way') ? ' is-invalid' : '' }}" name="i_am_dealer_way" value="{{ old('i_am_dealer_way') }}">
                                </div>
                            </div>
                        </div><!--./i_am_dealer_container-->

                        
                        



                         


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
