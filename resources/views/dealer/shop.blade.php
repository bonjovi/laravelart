@extends('layouts.inner')

@if($user->is_dealer == 1)
    @section('content')

    <div class="search search__for-inner">
        <form action="{{ route('search') }}" method="GET">
            <div class="search__inputwrapper">
                <input type="text" class="input" placeholder="Введите фамилию художника или название картины" name="query">
            </div>
            <button data-ripple class="button button_wide">
                Искать
            </button>
        </form>
    </div>
    
    <h1 class="title title_basegrey title_centered">{{ $title }}</h1>

        <section class="selectedFilters selectedFilters_sorting">
            <a href="#" class="text text_small text_grey filterToggler">ПОКАЗАТЬ ФИЛЬТРЫ</a>
        </section>

        <div class="cardswrapper">
            @include('layouts.filter')

            <section class="cards">
                @foreach ($products as $product)
                    <div class="card">
                        @if($product->user->role_id == 1)
                            <div class="card__pic">
                                <a class="card__piclink" href="{{ route('dealer.show', $product->slug) }}">
                                    <img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
                                </a>
                                <div class="card__coloredbg" style="opacity: 1;">
                                    <img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
                                </div>
                            </div>
                        @else
                            <div class="card__pic">
                                <a class="card__piclink" href="{{ route('dealer.show', $product->slug) }}">
                                    <img data-ripple class="card__img" data-src="{{ productImage($product->image) }}" alt="">
                                </a>
                                <div class="card__coloredbg" style="opacity: 1;">
                                    <img data-ripple class="card__img" data-src="{{ productImage($product->image) }}" alt="">
                                </div>
                            </div>
                        @endif
                        <div class="card__content">
                            <a class="title title_small card__title" href="{{ route('dealer.show', $product->slug) }}">{{ $product->name }}</a>
                            @if(!isset($product->unknown_painter))
                                <a href="{{ route('painters.show', $product->painter->id) }}" class="text text_grey text_small card__text card__text_painter">{{ $product->painter->full_name }}</a>
                            @else
                                <div class="text text_grey text_small card__text card__text_painter">{{ $product->unknown_painter }}</div>
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

        {{ $products->links() }}

    @endsection
@else
    @section('content')
        <h1 class="title title_basegrey title_centered">Доступ только для пользователей со статусом "Дилер"</h1>
        <p class="text text_basegrey">Для получения статуса "Дилер" обратитесь по адресу <a class="text" href="mailto:admin@artmarket24.ru">admin@artmarket24.ru</a></p>
    @endsection
@endif