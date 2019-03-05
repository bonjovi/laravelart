@php
    $topmenuColor = 'basegrey';
    $layoutName = 'inner';
@endphp

@extends('layouts.app')

@section('header')
<header class="header header_inner">
    <div class="container">
        <div class="header__toggler">
            <i class="material-icons">menu</i>
        </div>
        @include('layouts.registrationline')
        <div class="topline topline_inner">
            <a class="logo logo_inner" href="/"><span class="logo_violet">Art</span>Market<span class="logo_violet">24</span></a>
            <div class="topmenu__wrapper topmenu__wrapper_hidden" style="background-image: none;">
                <a class="logo logo_inner" href="/"><span class="logo_violet">Art</span>Market<span class="logo_violet">24</span></a>
                <div class="topcontacts">
                    <div class="topcontacts__phone topcontacts__phone_basegrey">
                        <span class="topcontacts__phone_small topcontacts__phone_basegrey">+7 (905) </span>551-36-15
                    </div>
                    <!--<span class="topcontacts__tomessengers text text_small text_grey">
	    					Написать в мессенджеры
	    				</span>-->
                </div>
                @include('layouts.topmenu')

                <div class="mobile-entrance">
                    @if(Auth::user())
                        <a href="{{ route('account.profile') }}" class="registrationLine__link registrationLine__link_useremail text text_small text_{{ $topmenuColor  }}">
                            Личный кабинет
                        </a>
                        <a href="/logout" class="registrationLine__link text text_small text_{{ $topmenuColor  }}">Выйти</a>
                    @else
                        <a href="/login" class="registrationLine__link text text_small text_{{ $topmenuColor  }}">Вход</a>
                        <span class="text text_small text_grey">&nbsp;или&nbsp;</span>
                        <a href="/register" class="registrationLine__link text text_small text_{{ $topmenuColor  }}">регистрация</a>
                    @endif
                </div>

            </div>
            <div class="topcontacts">
                <div class="topcontacts__phone topcontacts__phone_basegrey">
                    <span class="topcontacts__phone_small topcontacts__phone_basegrey">+7 (905) </span>551-36-15
                </div>
                <!--<span class="topcontacts__tomessengers text text_xsmall text_grey">
    					Написать в мессенджеры
    				</span>-->
            </div>
        </div><!-- /.topline -->
    </div><!-- /.container -->
</header>

@endsection

