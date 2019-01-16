@extends('layouts.inner')

@section('content')

    <h1 class="title title_basegrey title_centered">{{ request()->input('query') }}</h1>

    <div class="text" style="margin-bottom: 60px;">
        Для запроса <strong>{{ request()->input('query') }}</strong> найдено результатов: {{ $products->count() }}
    </div>

    <div class="cardswrapper">
        
        <section class="cards">
            @foreach ($products as $product)
                <div class="card">
                    <div class="card__pic">
                        <a class="card__piclink" href="{{ route('shop.show', $product->slug) }}">
                            <img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
                        </a>
                        <div class="card__coloredbg" style="opacity: 1;">
                            <img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
                        </div>
                    </div>
                    <div class="card__content">
                        <a class="title title_small card__title" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                        <div class="text text_grey text_small card__text card__text_painter">{{ $product->painter->full_name }}</div>
                        <div class="text text_grey text_small card__text">
                            @foreach ($product->materials as $material)
                                {{ $material->name }}
                            @endforeach
                        </div>
                        <div class="text text_grey text_small card__text">{{ $product->dimensions }}</div>
                        <div class="text text_grey text_small card__text">{{ $product->year }}</div>
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



@endsection