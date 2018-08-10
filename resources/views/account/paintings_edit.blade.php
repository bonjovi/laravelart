@extends('account.account')

@section('accountcontent')

<form action="{{ route('account.paintings.update', $product->id) }}" method="POST">
    {{ csrf_field() }}
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Название: </label>
        <input type="text" value="{{ $product->name }}" name="name" class="input">
    </div>
    <div class="control-group account__control-group">
        <label for="name" class="text text_grey text_width100">Художник: </label>
        <input type="text" value="{{ $product->painter->full_name }}" name="painter" class="input">
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