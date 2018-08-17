


@php
   if(isset($_GET['min_price']) && isset($_GET['max_price'])) {
        $min_price = $_GET['min_price'];
        $max_price = $_GET['max_price'];
   } else {
        $min_price = $min_price;
        $max_price = $max_price;
   }
@endphp



<form action="{{ route('layouts.main') }}" method="GET" class="filterform">
<div class="filter {{ $filterVisibility }}">
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
            <div class="checkbox">
                <label>
                    <input type="checkbox" checked="" name="style[]" value="painting"><span class="checkbox-material"><span class="check"></span></span>
                    <span class="text">Живопись</span>
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="style[]" value="graphics"><span class="checkbox-material"><span class="check"></span></span>
                    <span class="text">Графика</span>
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="style[]" value="impressionism"><span class="checkbox-material"><span class="check"></span></span>
                    <span class="text">Импрессионизм</span>
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="style[]" value="abstractionism"><span class="checkbox-material"><span class="check"></span></span>
                    <span class="text">Абстракционизм</span>
                </label>
            </div>
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
            <div class="slider__numbers">
                <!-- <div id="slider-margin-value-min" class="text text_small"></div>
                <div id="slider-margin-value-max" class="text text_small"></div> -->
                <div class="slider__price">
                    <input id="slider-margin-value-min" type="text" name="min_price" class="slider__input text text_small" value="{{ $min_price }}">
                    <span class="text text_small">руб.</span>
                </div>
                <div class="slider__price">
                    <input id="slider-margin-value-max" type="text" name="max_price" class="slider__input text text_small" value="{{ $max_price }}">
                    <span class="text text_small">руб.</span>
                </div>  
            </div>
        </div>
    </div><!--/.filter__section-->

    <button data-ripple class="button selectedFilters__button">
        Применить фильтры
    </button>
</div>
</form>