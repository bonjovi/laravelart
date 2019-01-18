@extends('account.account')

@section('accountcontent')

<script>
jQuery( function() {
    //var availableTags = $('.input-painter');
    
    //availableTags = jQuery.makeArray(availableTags)
    var fakedata = [
        'Гречишников Михаил Григорьевич',
        'Фатеев Владимир Афанасьевич',
        'Шестаков Адолф Иванович',
        'Ларин Юрий Николаевич',
        'Гераскевич Валерий Алексеевич',
        'Гроссе Олег Иванович',
        'Thorald Laessoe',
        'Изосимов Юрий',
        'Тихов Михаил Вячеславович',
        'Горбатюк Андрей Викторович',
        'Ледков Сергей Евгеньевич',
        'Наседкин Николай Николаевич',
        'Куманьков Евгений Иванович',
        'Миронова Марина Алексеевна',
        'Ройтер Михаил Григорьевич',
        'Бирштеин Анна Максовна',
        'Соколов К.С.',

    ];
    jQuery( "input[name=painter]" ).autocomplete({
        source: fakedata
    });
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
                <div class="input-painter" style="display:none;"> {{ $product->painter->full_name }} </div>
            @endforeach
        </div>
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Материал: </label>
        <input type="text" value="" name="material" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Габариты: </label>
        <input type="text" value="" name="dimensions" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Год: </label>
        <input type="text" value="" name="year" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Цена: </label>
        <input type="text" value="" name="price" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Фото:</label>
        <input type="file" value="" name="image" class="input">
    </div>

    
    <input type="submit" value="Обновить" class="button account__savebutton">
</form>

@endsection