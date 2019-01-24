@extends('layouts.inner')

@section('content')
    <h1 class="title title_basegrey title_centered">{{ $title }}</h1>
    
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
        @include('layouts.filter_shop')

        <section class="cards">
            @if($notfound)
                <div class="text">
                    {{ $notfound }}
                </div>
            @endif
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
                        <div class="text text_grey text_small card__text">{{ $product->dimension_width }} x {{ $product->dimension_height }} см</div>
                        <div class="text text_grey text_small card__text">{{ $product->year }}</div>
                    </div>
                </div><!-- /.card -->
            @endforeach

        </section><!-- /.cards -->
    </div>

    {{ $products->links() }}

@endsection