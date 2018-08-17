@php
    $topmenuColor = 'white';
    $layoutName = 'main';
@endphp



@extends('layouts.app')

@section('header')
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
                    <span class="topcontacts__tomessengers text text_xsmall text_grey">
	    					Написать в мессенджеры
	    				</span>
                </div>
                @include('layouts.topmenu')
            </div>
            <div class="topcontacts">
                <div class="topcontacts__phone">
                    <span class="topcontacts__phone_small">+7 (495) </span>507-64-85
                </div>
                <span class="topcontacts__tomessengers text text_small text_grey">
    					Написать в мессенджеры
    				</span>
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
        <button data-ripple class="button button_grey selectedFilters__button">
            Сбросить фильтры
            <i class="material-icons">delete</i>
        </button>
        <button data-ripple class="button selectedFilters__button">
            Новинки
            <i class="material-icons">close</i>
        </button>
        <button data-ripple class="button selectedFilters__button">
            Со скидкой
            <i class="material-icons">close</i>
        </button>
    </section><!-- /.selectedFilters -->

    <section class="selectedFilters selectedFilters_sorting">
        <a href="#" class="text text_small text_grey filterToggler">ПОКАЗАТЬ ФИЛЬТРЫ</a>
    </section>

    <div class="cardswrapper">
        @include('layouts.filter')

        <section class="cards">
            <div class="text">{{ $notfound }}</div>
            @foreach ($products as $product)
            <div class="card">
                <div class="card__pic">
                    <a class="card__piclink" href="{{ route('shop.show', $product->slug) }}">
                        <img data-ripple class="card__img" src="{{ productImage($product->image) }}" alt="">
                    </a>
                    <div class="card__coloredbg" style="background-image: url({{ productImage($product->image) }}); opacity: 1;"></div>
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
                        <a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
                        <div class="card__bottominfo">
                            <div class="card__price title title_small">{{ $product->price }} руб.</div>
                            <div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>{{ $product->painter->country }}</div>
                        </div>
                    </div>
                </div>
            </div><!-- /.card -->
            @endforeach



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
            </div>->







            <div class="card">
                <div class="card__pic">
                    <a href="#">
                        <img data-ripple class="card__img" src="/img/card5.jpg" alt="">
                    </a>
                    <div class="card__coloredbg" style="background-image: url(img/card5.jpg); opacity: 1;"></div>
                </div>
                <div class="card__content">
                    <a class="title title_small card__title" href="#">Морской шторм</a>
                    <div class="text text_grey text_small card__text card__text_painter">Егоров Андрей Афанасьевич</div>
                    <div class="text text_grey text_small card__text">Картон, темпера , гуашь</div>
                    <div class="text text_grey text_small card__text">35 х 25,5 см</div>
                    <div class="text text_grey text_small card__text">1925г.</div>
                    <div class="card__bottom">
                        <a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
                        <div class="card__bottominfo">
                            <div class="card__price title title_small">65 000 руб.</div>
                            <div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Советский союз</div>
                        </div>
                    </div>
                </div>
            </div><!-- /.card -->


        </section><!-- /.cards -->
    </div>

    <!--<a class="promobanner" href="#">
        <img src="/img/promobanner.jpg" alt="">
    </a>-->

@endsection