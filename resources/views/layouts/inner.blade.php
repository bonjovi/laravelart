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

