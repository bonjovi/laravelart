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

    jQuery( "input.painter-input" ).autocomplete({
        source: painters
    });

    jQuery('input[type=submit]').on('click', function(e) {
        //e.preventDefault();
        //jQuery('input.painter-input').val(jQuery('div[data-painter-id]').attr('data-painter-id'));
    });

    jQuery("select[name^=style], select[name^=material], select[name^=surface], select[name^=theme]").chosen();

    jQuery('input[name=dimension_width]').on('mouseout', function() {
        jQuery(this).val(jQuery(this).val().replace(",", "."));
    });

    jQuery('input[name=dimension_height]').on('mouseout', function() {
        jQuery(this).val(jQuery(this).val().replace(",", "."));
    });
} );
</script>

<form action="{{ route('account.paintings.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Название: </label>
        <input type="text" value="{{ $product->name }}" name="name" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Художник: </label>

        <?php
        if($product->painter_id == 21) {
            $painterName = $product->unknown_painter;
        } else {
            $painterName = $product->painter->full_name;
        }
        ?>

        <input type="text" value="{{ $painterName }}" name="painter" class="input painter-input">
        <div class="input-painters" style="display:none;">
            @foreach($products as $oneproduct)
                <div class="input-painter" style="display:none;" data-painter-id="{{ $oneproduct->painter->id }}"> {{ $oneproduct->painter->full_name }} </div>
            @endforeach
        </div>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Стиль: </label>
        <select name="style[]" multiple style="width: 100%;">
            @foreach($styles as $style)
                <option 
                    @foreach($product->styles as $oneStyle)
                        @if($oneStyle->name == $style->name)
                            selected
                        @endif
                    @endforeach
                    value="{{ $style->id }}">{{ $style->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Техника: </label>
        <select name="material[]" multiple style="width: 100%;">
            @foreach($materials as $material)
                <option 
                    @foreach($product->materials as $oneMaterial)
                        @if($oneMaterial->name == $material->name)
                            selected
                        @endif
                    @endforeach
                    value="{{ $material->id }}">{{ $material->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Основа: </label>
        <select name="surface[]" multiple style="width: 100%;">
            @foreach($surfaces as $surface)
                <option 
                    @foreach($product->surfaces as $oneSurface)
                        @if($oneSurface->name == $surface->name)
                            selected
                        @endif
                    @endforeach
                    value="{{ $surface->id }}">{{ $surface->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Сюжет: </label>
        <select name="theme[]" multiple style="width: 100%;">
            @foreach($themes as $theme)
                <option 
                    @foreach($product->themes as $oneTheme)
                        @if($oneTheme->name == $theme->name)
                            selected
                        @endif
                    @endforeach
                    value="{{ $theme->id }}">{{ $theme->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Высота: </label>
        <input type="text" value="{{ $product->dimension_height }}" name="dimension_height" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Ширина: </label>
        <input type="text" value="{{ $product->dimension_width }}" name="dimension_width" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Год: </label>
        <input type="text" value="{{ $product->year }}" name="year" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Местонахождение/город: </label>
        <input type="text" value="{{ $product->country }}" name="country" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Цена: </label>
        <input type="text" value="{{ $product->price }}" name="price" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Описание: </label>
        <textarea name="description" class="textarea" cols="30" rows="10">{{ $product->description }}</textarea>
    </div>
    <div class="control-group account__control-group">
        <div class="control-group__attached-image">
            <img src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
        </div>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Поменять основное фото:</label>
        <input type="file" value="{{ productImage($product->image) }}" name="image" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width120">Дополнительные фото:</label>
        
    </div>
    <div class="control-group account__control-group">
        <?php
            $productImages = json_decode($product->images);
        ?>
        <div class="control-group__attached-images">
            @if(is_array($productImages))
                @foreach($productImages as $productImage)
                    <div class="control-group__attached-image">
                        <i class="material-icons" data-image="{{ productImage($productImage) }}">close</i>
                        <img src="{{ productImage($productImage) }}" alt="">
                    </div>
                @endforeach
            @endif

            

            <div class="control-group__upload">
                <label>
                    <img class="control-group__visible-pic" src="#" alt="" />	
                    <input type="file" value="" name="images[]" class="input input__additional-pic">
                    <span>
                        <i class="material-icons">add</i><br>
                        Загрузить ещё
                    </span>
                </label>
            </div>
        </div>
    </div>
    <br><br>
    <div class="control-group account__control-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="is_for_dealers" class="checkbox" value="1" <?php if($product->is_for_dealers == 1) echo 'checked' ?>>
                <span class="checkbox-material"><span class="check"></span></span>
                <span class="text">Только для дилеров</span>
            </label>
        </div>
    </div>
    <input type="submit" value="Сохранить изменения" class="button account__savebutton">
</form>

<script>
$(function() {
    $('.control-group__attached-image i').on('click', function() {
        $('<input type="hidden" name="deleted_images[]" value="' + $(this).attr('data-image') + '">').appendTo('form');
        $(this).parent().remove();
    });

    $('.control-group__upload i').on('click', function() {
        $(this).parent().remove();
    });


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(input).prev().attr('src', e.target.result);
                $('<i class="material-icons">close</i>').insertBefore($(input).parent());
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".control-group__attached-images").on('change', '.input__additional-pic', function() {
        if($(this).prev().attr('src') == '#') {
            $('<div class="control-group__upload"><label><img class="control-group__visible-pic" src="#" alt="" /><input type="file" value="" name="images[]" class="input input__additional-pic"><span><i class="material-icons">add</i><br>Загрузить ещё</span></label></div>').appendTo(".control-group__attached-images");
            readURL(this);
        } else {
            readURL(this);
        }
    });
    
});
</script>

@endsection