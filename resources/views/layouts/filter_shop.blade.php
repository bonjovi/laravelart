@php
   /*if(isset($_GET['min_price']) && isset($_GET['max_price'])) {
        $min_price = $_GET['min_price'];
        $max_price = $_GET['max_price'];
   } else {
        $min_price = $min_price;
        $max_price = $max_price;
   }   
   */

   $filterVisibility = '';

   if(isset($_GET['min_width']) && isset($_GET['max_width'])) {
        $min_width = $_GET['min_width'];
        $max_width = $_GET['max_width'];
        $min_height = $_GET['min_height'];
        $max_height = $_GET['max_height'];
   } else {
        $min_width = $min_width;
        $max_width = $max_width;
        $min_height = $min_height;
        $max_height = $max_height;
   }
@endphp


{!! Form::open(['action' => 'ShopController@index', 'method' => 'GET', 'class' => 'filterform']) !!}
<div class="filter {{ $filterVisibility }}">
    <!--<div class="filter__section">
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
        </div>
    </div>-->

    <div class="filter__section">
        <div class="title title_small filter__title">
            Стили
            <i class="material-icons">remove</i>
        </div>

        <div class="filter__sectioncontent">
            @foreach($styles as $style)
            <div class="checkbox">
                <label>                   
                    <input {{ in_array($style->slug, Request::get('style') ? Request::get('style') : []) ? 
                    'checked="checked"' :
                    '' }}
                    type="checkbox" name="style[]" value="{{ $style->slug }}">    
                    <span class="checkbox-material"><span class="check"></span></span>
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
            @foreach($materials as $material)
            <div class="checkbox">
                <label>                   
                    <input {{ in_array($material->slug, Request::get('material') ? Request::get('material') : []) ? 
                    'checked="checked"' :
                    '' }}
                    type="checkbox" name="material[]" value="{{ $material->slug }}">    
                    <span class="checkbox-material"><span class="check"></span></span>
                    <span class="text">{{ $material->name }}</span>
                </label>
            </div>
            @endforeach
        </div>
    </div><!--/.filter__section-->

    <div class="filter__section">
        <div class="title title_small filter__title">
             Поверхность
            <i class="material-icons">remove</i>
        </div>

        <div class="filter__sectioncontent">
            @foreach($surfaces as $surface)
            <div class="checkbox">
                <label>                   
                    <input {{ in_array($surface->slug, Request::get('surface') ? Request::get('surface') : []) ? 
                    'checked="checked"' :
                    '' }}
                    type="checkbox" name="surface[]" value="{{ $surface->slug }}">    
                    <span class="checkbox-material"><span class="check"></span></span>
                    <span class="text">{{ $surface->name }}</span>
                </label>
            </div>
            @endforeach
        </div>
    </div><!--/.filter__section-->

    <div class="filter__section">
        <div class="title title_small filter__title">
            Темы
            <i class="material-icons">remove</i>
        </div>

        <div class="filter__sectioncontent">
            @foreach($themes as $theme)
            <div class="checkbox">
                <label>                   
                    <input {{ in_array($theme->slug, Request::get('theme') ? Request::get('theme') : []) ? 
                    'checked="checked"' :
                    '' }}
                    type="checkbox" name="theme[]" value="{{ $theme->slug }}">    
                    <span class="checkbox-material"><span class="check"></span></span>
                    <span class="text">{{ $theme->name }}</span>
                </label>
            </div>
            @endforeach
        </div>
    </div><!--/.filter__section-->

    <div class="filter__section">
        <div class="title title_small filter__title">
            Ширина
        </div>

        <div class="filter__sectioncontent">
            <div id="slider" class="slider slider-info noUi-target noUi-ltr noUi-horizontal"></div>
            <div class="slider__numbers">
                <div class="slider__price">
                    <input id="slider-margin-value-min-width" name="min_width" type="text" class="slider__input text text_small" value="{{ $min_width }}"/>
                    <span class="text text_small">см</span>
                </div>
                <div class="slider__price">
                    <input id="slider-margin-value-max-width" name="max_width" type="text" class="slider__input text text_small" value="{{ $max_width }}"/>
                    <span class="text text_small">см</span>
                </div>  
            </div>
        </div>
    </div><!--/.filter__section-->



    <div class="filter__section">
        <div class="title title_small filter__title">
            Высота
        </div>

        <div class="filter__sectioncontent">
            <div id="slider2" class="slider slider-info noUi-target noUi-ltr noUi-horizontal"></div>
            <div class="slider__numbers">
                <div class="slider__price">
                    <input id="slider-margin-value-min-height" name="min_height" type="text" class="slider__input text text_small" value="{{ $min_height }}"/>
                    <span class="text text_small">см</span>
                </div>
                <div class="slider__price">
                    <input id="slider-margin-value-max-height" name="max_height" type="text" class="slider__input text text_small" value="{{ $max_height }}"/>
                    <span class="text text_small">см</span>
                </div>  
            </div>
        </div>
    </div><!--/.filter__section-->

    <button data-ripple class="button selectedFilters__button filter__applyfilters">
        Применить фильтры
    </button>
</div>

{!! Form::close() !!}