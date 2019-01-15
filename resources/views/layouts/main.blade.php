@php
    $topmenuColor = 'white';
    $layoutName = 'main';
@endphp



@extends('layouts.app')

@section('header')

<script src="/js/jquery.lazyloadxt.js"></script>

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
                        <span class="topcontacts__phone_small">+7 (495) </span>507-64-85
                    </div>
                    <!--<span class="topcontacts__tomessengers text text_xsmall text_grey">
	    					Написать в мессенджеры
	    				</span>-->
                </div>
                @include('layouts.topmenu')
            </div>
            <div class="topcontacts">
                <div class="topcontacts__phone">
                    <span class="topcontacts__phone_small">+7 (495) </span>507-64-85
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
        @if(Request::get('style') || Request::get('material') || Request::get('theme') || Request::get('surface'))
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
                <div class="card__pic">
                    <a class="card__piclink" href="{{ route('shop.show', $product->slug) }}">
                        <img data-ripple class="card__img" data-src="{{ productImage($product->image) }}" alt="">
                    </a>
                    <div class="card__coloredbg" style="opacity: 1;">
                        <img data-ripple class="card__img" data-src="{{ productImage($product->image) }}" alt="">
                    </div>
                </div>
                <div class="card__content">
                    <a class="title title_small card__title" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                    <a href="{{ route('painters.show', $product->painter->id) }}" class="text text_grey text_small card__text card__text_painter">{{ $product->painter->full_name }}</a>
                    <div class="text text_grey text_small card__text">
                        @foreach ($product->materials as $material)
                            {{ $material->name }}
                        @endforeach
                    </div>
                    <div class="text text_grey text_small card__text">{{ $product->dimensions }}</div>
                    <div class="text text_grey text_small card__text">{{ $product->year }}</div>
                    <div class="card__bottom">
                        
                        <form action="{{ route('cart.store') }}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <!--<button type="submit" class="card__addtocart title title_xsmall title_white">В корзину</button>-->
                            <a href="{{ route('shop.show', $product->slug) }}" class="card__addtocart title title_xsmall title_white">Подробнее</a>
                        </form>
                        <div class="card__bottominfo">
                            <div class="card__price title title_small">{{ $product->price }} руб.</div>
                            <div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>{{ $product->painter->country }}</div>
                        </div>
                    </div>
                </div>
            </div><!-- /.card -->
            @endforeach
            @if(count($products)%3 == 2)
                <div class="card card_empty"></div>
            @endif


            <!--<div class="card card_auction">
                <div class="card__pic">
                    <a href="#">
                        <img data-ripple class="card__img" src="/img/card3.jpg" alt="">
                    </a>
                    <div class="card__coloredbg" style="background-image: url(img/card3.jpg); opacity: 1;"></div>
                </div>
                <div class="card__content">
                    <div class="card__auctionTitle">
                        <a class="title title_small card__title" href="#">У берега</a>
                        <div class="card__auctionIndicators">
                            <div class="card__auctionSticker">Аукцион</div>
                            <div class="card__auctiontime">
                                <i class="material-icons">access_time</i>
                                <span class="title title_small card__timeNumbers">23:43:03</span>
                            </div>
                        </div>
                    </div>
                    <div class="text text_grey text_small card__text card__text_painter">Сысоев Николай Александрович</div>
                    <div class="text text_grey text_small card__text">Холст, масло</div>
                    <div class="text text_grey text_small card__text">35 х 25,5 см</div>
                    <div class="text text_grey text_small card__text">1948г.</div>
                    <div class="card__bottom">
                        <a href="#" class="card__addtocart card__addtocart_mint title title_xsmall title_white">Сделать ставку</a>
                        <div class="card__bottominfo">
                            <div class="card__price title title_small">35 000 руб.</div>
                            <div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Россия</div>
                        </div>
                    </div>
                </div>
            </div>-->

        </section><!-- /.cards -->
    </div>

    <!--<a class="promobanner" href="#">
        <img src="/img/promobanner.jpg" alt="">
    </a>-->

@endsection