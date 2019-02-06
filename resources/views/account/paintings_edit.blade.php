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

    jQuery("select[name=style]").chosen();
} );
</script>

<form action="{{ route('account.paintings.update', $product->id) }}" method="POST">
    {{ csrf_field() }}
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Название: </label>
        <input type="text" value="{{ $product->name }}" name="name" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Художник: </label>
        <input type="text" value="{{ $product->painter->full_name }}" name="painter" class="input">
        <div class="input-painters" style="display:none;">
            @foreach($products as $product)
                <div class="input-painter" style="display:none;" data-painter-id="{{ $product->painter->id }}"> {{ $product->painter->full_name }} </div>
            @endforeach
        </div>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Стиль: </label>
        <input type="hidden" value="" name="stylehidden" class="input">
        <select name="style" multiple>
            @foreach($styles as $style)
                <option value="{{ $style->id }}">{{ $style->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Материал: </label>
        <input type="text" value="{{ $product->material }}" name="material" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Габариты: </label>
        <input type="text" value="{{ $product->dimensions }}" name="dimensions" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Год: </label>
        <input type="text" value="{{ $product->year }}" name="year" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Цена: </label>
        <input type="text" value="{{ $product->price }}" name="price" class="input">
    </div>
    <input type="submit" value="Обновить" class="button account__savebutton">
</form>

@endsection