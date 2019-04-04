@extends('account.account')

@section('accountcontent')

<?php
$paintersArray = [];

foreach($painters as $painter) {
    $paintersArray[] = $painter->full_name;
}
?>

<link rel="stylesheet" href="/css/chosen.css">
<script src="/js/chosen.jquery.min.js"></script>

<script>
jQuery( function() {
    var painters = <?=json_encode($paintersArray)?>;

    jQuery( "input[name=painter]" ).autocomplete({
        source: painters
    });

    jQuery('.input-painter').on('click', function(e) {
        //e.preventDefault();
        //console.log(jQuery(this));
        //jQuery('input[name=painter_id]').val(jQuery(this).attr('data-painter-id'));
    });

    jQuery("select[name^=style], select[name^=material], select[name^=surface], select[name^=theme]").chosen();

    jQuery('.tooltip').tooltipster();


    jQuery('input[name=dimension_width]').on('mouseout', function() {
        jQuery(this).val(jQuery(this).val().replace(",", "."));
    });

    jQuery('input[name=dimension_height]').on('mouseout', function() {
        jQuery(this).val(jQuery(this).val().replace(",", "."));
    });

    jQuery.validator.setDefaults({ ignore: ":hidden:not(select)" });

    

    jQuery('form').validate({
        rules: {
            name: {
                required: true
            },
            painter: {
                required: true
            },
            'style[]': {
                required: true
            },
            'material[]': {
                required: true
            },
            'surface[]': {
                required: true
            },
            'theme[]': {
                required: true
            },
            dimension_width: {
                required: true,
                number: true
            },
            dimension_height: {
                required: true,
                number: true
            },
            image: {
                required: true
            },
            price: {
                number: true
            },
            year: {
                number: true
            }
        },
        messages: {
            name: {
                required: "Поле 'Название' обязательно к заполнению",
                minlength: "Введите не менее 2-х символов в поле 'Название'"
            },
            painter: {
                required: "Поле 'Художник' обязательно к заполнению"
            },
            'style[]': {
                required: "Поле 'Стиль' обязательно к заполнению"
            },
            'material[]': {
                required: "Поле 'Техника' обязательно к заполнению"
            },
            'surface[]': {
                required: "Поле 'Основа' обязательно к заполнению"
            },
            'theme[]': {
                required: "Поле 'Сюжет' обязательно к заполнению"
            },
            dimension_width: {
                required: "Поле 'Ширина' обязательно к заполнению",
                number: "Поле 'Ширина' должно быть числом"
            },
            dimension_height: {
                required: "Поле 'Высота' обязательно к заполнению",
                number: "Поле 'Высота' должно быть числом"
            },
            image: {
                required: "Поле 'Фото' обязательно к заполнению"
            },
            price: {
                number: "Поле 'Цена' должно быть числом"
            },
            year: {
                number: "Поле 'Год' должно быть числом"
            }
        }
    });

    
} );
</script>

<style>
form label.error {
    position: absolute;
    margin-left: 120px;
    margin-top: 34px;
    font-family: 'Roboto';
    font-size: 11px;
    color: #9c27b0;
}

input[name=image] ~ label.error {
    margin-top: 28px;
}
</style>

<br>
@foreach($errors->all() as $error)
    <p class="text flash flash_success">{{ $error }}</p>
@endforeach
<br>
<form role="form" action="{{ route('account.painting.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Название*:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Введите название картины">
        </label>
        <input type="text" name="name" value="{{ old('name') }}" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Художник*:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Введите ФИО художника">
        </label>
        <input type="text" value="{{ old('painter') }}" name="painter" class="input">
        
        <div class="input-painters" style="display:none;">
            @foreach($painters as $painter)
                <div class="input-painter" style="display:none;" data-painter-id="{{ $painter->id }}"> {{ $painter->full_name }} </div>
            @endforeach
        </div>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Стиль*:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Укажите один или несколько стилей для картины из нашего списка">
        </label>
        <select name="style[]" multiple data-placeholder=" " style="width: 100%;" id="mySelect">
            @foreach($styles as $style)
                <option value="{{ $style->id }}" {{ (collect(old('style'))->contains($style->id)) ? 'selected':'' }}>{{ $style->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Техника*:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Укажите чем была написана картина, выбрав один или несколько пунктов из нашего списка">
        </label>
        <select name="material[]" multiple data-placeholder=" " style="width: 100%;">
            @foreach($materials as $material)
                <option value="{{ $material->id }}" {{ (collect(old('material'))->contains($material->id)) ? 'selected':'' }}>{{ $material->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Основа*:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Укажите на какой основе была написана картина, выбрав один или несколько пунктов из нашего списка">
        </label>
        <select name="surface[]" multiple data-placeholder=" " style="width: 100%;">
            @foreach($surfaces as $surface)
                <option value="{{ $surface->id }}" {{ (collect(old('surface'))->contains($surface->id)) ? 'selected':'' }}>{{ $surface->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Сюжет*:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Укажите один или несколько сюжетов для картины из нашего списка">
        </label>
        <select name="theme[]" multiple data-placeholder=" " style="width: 100%;">
            @foreach($themes as $theme)
                <option value="{{ $theme->id }}" {{ (collect(old('theme'))->contains($theme->id)) ? 'selected':'' }}>{{ $theme->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Высота*:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Укажите высоту картины в сантиметрах">
        </label>
        <input type="text" value="{{ old('dimension_height') }}" name="dimension_height" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Ширина*:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Укажите ширину картины в сантиметрах">
        </label>
        <input type="text" value="{{ old('dimension_width') }}" name="dimension_width" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Год:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Укажите год написания картины">
        </label>
        <input type="text" value="{{ old('year') }}" name="year" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Местонахождение/город:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Укажите страну, где была написана картина">
        </label>
        <input type="text" value="{{ old('country') }}" name="country" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Цена:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Укажите цену картины в рублях">
        </label>
        <input type="text" value="{{ old('price') }}" name="price" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Описание:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Укажите в свободной форме любую информацию о картине">
        </label>
        <textarea name="description" class="textarea" cols="30" rows="10">{{ old('description') }}</textarea>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Фото*:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Прикрепите одно основное фото картины">
        </label>
        <input type="file" value="" name="image" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">
            Дополнительные фото:
            <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Прикрепите (по желанию) несколько дополнительных фото картины">
        </label>
        <input type="file" value="" name="images[]" class="input" multiple>
    </div>
    <br><br>
    <div class="control-group account__control-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="is_for_dealers" class="checkbox" value="1">
                <span class="checkbox-material"><span class="check"></span></span>
                <span class="text">Только для дилеров <img class="control-group__tooltip tooltip" src="{{ asset('img/information.svg') }}" title="Если стоит галочка, это обозначает, что картина будет отображена в закрытом дилерском разделе"></span>
            </label>
        </div>
    </div>
    
    <input type="submit" value="Сохранить" class="button account__savebutton">
</form>
<br><br>
<div class="text text_xsmall">* Звёздочкой отмечены поля, обязательные для заполнения</div>

@endsection