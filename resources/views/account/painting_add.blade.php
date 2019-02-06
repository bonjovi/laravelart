@extends('account.account')

@section('accountcontent')

<?php
$paintersArray = [];

foreach($painters as $painter) {
    $paintersArray[] = $painter->full_name;
}
?>

<link rel="stylesheet" href="/css/chosen.min.css">
<script src="/js/chosen.jquery.min.js"></script>

<script>
jQuery( function() {
    var painters = <?=json_encode($paintersArray)?>;

    jQuery( "input[name=painter]" ).autocomplete({
        source: painters
    });

    jQuery('input[type=submit]').on('click', function(e) {
        //e.preventDefault();
        jQuery('input[name=painter]').val(jQuery('div[data-painter-id]').attr('data-painter-id'));
    });

    jQuery("select[name^=style], select[name^=material], select[name^=surface], select[name^=theme]").chosen();
} );
</script>

<form action="{{ route('account.painting.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Название: </label>
        <input type="text" value="" name="name" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Художник: </label>
        <input type="text" value="" name="painter" class="input">
        <div class="input-painters" style="display:none;">
            @foreach($products as $product)
                <div class="input-painter" style="display:none;" data-painter-id="{{ $product->painter->id }}"> {{ $product->painter->full_name }} </div>
            @endforeach
        </div>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Стиль: </label>
        <select name="style[]" multiple>
            @foreach($styles as $style)
                <option value="{{ $style->id }}">{{ $style->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Материал: </label>
        <select name="material[]" multiple>
            @foreach($materials as $material)
                <option value="{{ $material->id }}">{{ $material->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Поверхность: </label>
        <select name="surface[]" multiple>
            @foreach($surfaces as $surface)
                <option value="{{ $surface->id }}">{{ $surface->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Тема: </label>
        <select name="theme[]" multiple>
            @foreach($themes as $theme)
                <option value="{{ $theme->id }}">{{ $theme->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Ширина: </label>
        <input type="text" value="" name="dimension_width" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Высота: </label>
        <input type="text" value="" name="dimension_height" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Год: </label>
        <input type="text" value="" name="year" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Страна: </label>
        <input type="text" value="" name="country" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Цена: </label>
        <input type="text" value="" name="price" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Описание: </label>
        <textarea name="description" class="textarea" cols="30" rows="10"></textarea>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Фото:</label>
        <input type="file" value="" name="image" class="input">
    </div>

    
    <input type="submit" value="Обновить" class="button account__savebutton">
</form>

@endsection