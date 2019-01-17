@extends('layouts.inner')

@if($user->is_dealer == 1)
    @section('content')
        <h1 class="title title_basegrey title_centered">{{ $title }}</h1>

        <section class="selectedFilters selectedFilters_sorting">
            <a href="#" class="text text_small text_grey filterToggler">ПОКАЗАТЬ ФИЛЬТРЫ</a>
        </section>

        <div class="cardswrapper">
            @include('layouts.filter')

            <section class="cards">
                @foreach ($products as $product)
                    <div class="card">
                        <div class="card__pic">
                            <a class="card__piclink" href="{{ route('dealer.show', $product->slug) }}">
                                <img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
                            </a>
                            <div class="card__coloredbg" style="opacity: 1;">
                                <img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
                            </div>
                        </div>
                        <div class="card__content">
                            <a class="title title_small card__title" href="{{ route('dealer.show', $product->slug) }}">{{ $product->name }}</a>
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