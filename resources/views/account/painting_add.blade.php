@extends('account.account')

@section('accountcontent')

<form action="{{ route('account.painting.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Название: </label>
        <input type="text" value="" name="name" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Художник: </label>
        <input type="text" value="" name="painter" class="input">
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
    <input type="submit" value="Обновить" class="button account__savebutton">
</form>

@endsection