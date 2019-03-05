@php
    $topmenuColor = 'white';
    $layoutName = 'main';
@endphp



@extends('layouts.app')

@section('header')

<script>
$(function() {
    $('.search button').on('click', function(e) {
        if($('.search input[name=query]').val().length < 2) {
            e.preventDefault();
        }
	});
});
</script>

<header class="header">
    <div class="container">
        <div class="header__toggler">
            <i class="material-icons">menu</i>
        </div>
        @include('layouts.registrationline')
        <div class="topline">
            <a class="logo" href="/"><span class="logo_violet">Art</span>Market<span class="logo_violet">24</span></a>
            <div class="topmenu__wrapper topmenu__wrapper_hidden">
                <a class="logo" href="/"><span class="logo_violet">Art</span>Market<span class="logo_violet">24</span></a>
                <div class="topcontacts">
                    <div class="topcontacts__phone">
                        <span class="topcontacts__phone_small">+7 (905) </span>551-36-15
                    </div>
                    <!--<span class="topcontacts__tomessengers text text_xsmall text_grey">
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
                <div class="topcontacts__phone">
                    <span class="topcontacts__phone_small">+7 (905) </span>551-36-15
                </div>
                <!--<span class="topcontacts__tomessengers text text_small text_grey">
    					Написать в мессенджеры
    				</span>-->
            </div>
        </div><!-- /.topline -->
        <h1 class="slogan title title_xlarge title_white">Найди своего художника</h1>
        <h2 class="descriptor text text_white text_large">
            ArtMarket24 - это современная интернет-площадка, где продавцы и покупатели произведений искусства находят друг друга. На нашем портале размещено более 2000 работ и каждый день эта коллекция активно пополняется!
        </h2>


        <div class="search">
            <form action="{{ route('search') }}" method="GET">
                <div class="search__inputwrapper">
                    <input type="text" class="input" placeholder="Введите фамилию художника или название картины" name="query">
                </div>
                <button data-ripple class="button button_wide">
                    Искать
                </button>
            </form>
        </div>
    </div><!-- /.container -->
    <div class="banner" style="background-image: url(img/banner1.jpg);"></div>
</header>
@endsection

@section('content')

    <section class="selectedFilters">
        @if(Request::get('style') || Request::get('material') || Request::get('theme') || Request::get('surface') || Request::get('min_width') || Request::get('max_width'))
        <a href="/" data-ripple class="button button_grey selectedFilters__button">
            Сбросить фильтры
            <i class="material-icons">delete</i>
        </a>
        @endif
        

        

        @foreach($styles as $style)
            @if(in_array($style->slug, Request::get('style') ? Request::get('style') : [])) 
                <a href="{{ removeGetParams(Request::fullUrl(), 'style', $style->slug) }}" data-ripple class="button selectedFilters__button">
                    {{ $style->name }}
                    <i class="material-icons">close</i>
                </a>
            @endif
        @endforeach

        @foreach($materials as $material)
            @if(in_array($material->slug, Request::get('material') ? Request::get('material') : [])) 
                <a href="{{ removeGetParams(Request::fullUrl(), 'material', $material->slug) }}" data-ripple class="button selectedFilters__button">
                    {{ $material->name }}
                    <i class="material-icons">close</i>
                </a>
            @endif
        @endforeach

        @foreach($themes as $theme)
            @if(in_array($theme->slug, Request::get('theme') ? Request::get('theme') : [])) 
                <a href="{{ removeGetParams(Request::fullUrl(), 'theme', $theme->slug) }}" data-ripple class="button selectedFilters__button">
                    {{ $theme->name }}
                    <i class="material-icons">close</i>
                </a>
            @endif
        @endforeach

        @foreach($surfaces as $surface)
            @if(in_array($surface->slug, Request::get('surface') ? Request::get('surface') : [])) 
                <a href="{{ removeGetParams(Request::fullUrl(), 'surface', $surface->slug) }}" data-ripple class="button selectedFilters__button">
                    {{ $surface->name }}
                    <i class="material-icons">close</i>
                </a>
            @endif
        @endforeach
    </section><!-- /.selectedFilters -->

    <section class="selectedFilters selectedFilters_sorting">
        <a href="#" class="text text_small text_grey filterToggler">{{ Request::get('min_price') ? 'СКРЫТЬ ФИЛЬТРЫ' : 'ПОКАЗАТЬ ФИЛЬТРЫ' }}</a>
    </section>

    <div class="cardswrapper">
        @include('layouts.filter')

        <section class="cards">
            @if($notfound)
            <div class="text">
                {{ $notfound }}
            </div>
            @endif
            @foreach ($products as $product)
            <div class="card {{ Request::get('min_price') ? 'card_twoinrow' : '' }}">
                @if($product->user->role_id == 1)
                    <div class="card__pic">
                        <a class="card__piclink" href="{{ route('shop.show', $product->slug) }}">
                            <img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
                        </a>
                        <div class="card__coloredbg" style="opacity: 1;">
                            <img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
                        </div>
                    </div>
                @else
                    <div class="card__pic">
                        <a class="card__piclink" href="{{ route('shop.show', $product->slug) }}">
                            <img data-ripple class="card__img" data-src="{{ productImage($product->image) }}" alt="">
                        </a>
                        <div class="card__coloredbg" style="opacity: 1;">
                            <img data-ripple class="card__img" data-src="{{ productImage($product->image) }}" alt="">
                        </div>
                    </div>
                @endif
                <div class="card__content">
                    <a class="title title_small card__title" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                    @if(!isset($product->unknown_painter))
                        <a href="{{ route('painters.show', $product->painter->id) }}" class="text text_grey card__text_painter">{{ $product->painter->full_name }}</a>
                    @else
                        <div class="text text_grey card__text_painter">{{ $product->unknown_painter }}</div>
                    @endif
                    <div class="text text_grey text_small card__text">
                        @foreach ($product->materials as $material)
                            {{ $material->name }}
                        @endforeach
                    </div>
                    <div class="text text_grey text_small card__text">{{ $product->dimension_height }} x {{ $product->dimension_width }} см</div>
                    <div class="text text_grey text_small card__text">{{ $product->year }}</div>
                </div>
            </div><!-- /.card -->
            @endforeach
            @if(count($products)%3 == 2)
                <div class="card card_empty"></div>
            @endif
        </section><!-- /.cards -->
    </div>

    @if(!Request::query('style', false) || !Request::query('material', false) || !Request::query('surface', false) || !Request::query('theme', false))
        {{ $products->links() }}
    @endif  

@endsection