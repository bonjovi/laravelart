@extends('layouts.inner')

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
        <div class="filter">
            <div class="filter__section">
                <div class="title title_small filter__title">
                    Типы
                    <i class="material-icons">remove</i>
                </div>

                <div class="filter__sectioncontent">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked=""><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">Аукционы</span>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">Новинки</span>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">Со скидкой</span>
                        </label>
                    </div>
                </div><!--/.filter__sectioncontent-->
            </div><!--/.filter__section-->

            <div class="filter__section">
                <div class="title title_small filter__title">
                    Стили
                    <i class="material-icons">remove</i>
                </div>

                <div class="filter__sectioncontent">
                    @foreach ($styles as $style)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked=""><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">{{ $style->name }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div><!--/.filter__section-->

            <div class="filter__section">
                <div class="title title_small filter__title">
                    Краска
                    <i class="material-icons">remove</i>
                </div>

                <div class="filter__sectioncontent">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked=""><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">Акрил</span>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">Гуашь</span>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">Масло</span>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">Карандаш</span>
                        </label>
                    </div>
                </div>
            </div><!--/.filter__section-->

            <div class="filter__section">
                <div class="title title_small filter__title">
                    Темы
                    <i class="material-icons">remove</i>
                </div>

                <div class="filter__sectioncontent">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">Звери и птицы</span>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">Цветы и растения</span>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked=""><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">Абстрактные фигуры</span>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked=""><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">Архитектура</span>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">Природа, море, небо</span>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
                            <span class="text">Люди и портреты</span>
                        </label>
                    </div>
                </div>
            </div><!--/.filter__section-->

            <div class="filter__section">
                <div class="title title_small filter__title">
                    Цена
                </div>

                <div class="filter__sectioncontent">
                    <div id="slider" class="slider slider-info noUi-target noUi-ltr noUi-horizontal"></div>
                    <div class="sliderNumbers">
                        <div id="slider-margin-value-min" class="text text_small"></div>
                        <div id="slider-margin-value-max" class="text text_small"></div>
                    </div>
                </div>
            </div><!--/.filter__section-->

            <button data-ripple class="button button_grey selectedFilters__button">
                Сбросить фильтры
                <i class="material-icons">delete</i>
            </button>
        </div>

        <section class="cards">
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
                        <div class="text text_grey text_small card__text card__text_painter">{{ $product->painter }}</div>
                        <div class="text text_grey text_small card__text">{{ $product->material }}</div>
                        <div class="text text_grey text_small card__text">{{ $product->dimensions }}</div>
                        <div class="text text_grey text_small card__text">{{ $product->year }}</div>
                        <div class="card__bottom">
                            <a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
                            <div class="card__bottominfo">
                                <div class="card__price title title_small">{{ $product->price }} руб.</div>
                                <div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>{{ $product->country }}</div>
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
            </div>-->

        </section><!-- /.cards -->
    </div>



@endsection