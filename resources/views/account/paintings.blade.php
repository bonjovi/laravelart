@extends('account.account')

@section('accountcontent')

<a href="/account/paintings/add" class="button">Добавить картину</a>
<br><br><br><br>

@if(Session::has('message'))
    <p class="text flash flash_success">{{ Session::get('message') }}</p>
@endif

<br><br>

@foreach($user->products as $product)
<div class="account__paintings">
    <div class="account__painting">
        <div class="account__paintingpic">
            <img src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
        </div>

        <div class="account__paintingdesc">
            <a href="{{ route('shop.show', $product->slug) }}" class="title title_small">{{ $product->name }}</a>
            
            @if(!isset($product->unknown_painter))
                <a href="{{ route('painters.show', $product->painter->id) }}" class="text text_grey">{{ $product->painter->full_name }}</a>
            @else
                <div class="text text_grey">{{ $product->unknown_painter }}</div>
            @endif
            
            
            <div class="title title_small">
                @if($product->price != null)
                    {{ $product->price }} 
                @else
                    {{ 0 }}
                @endif
                руб.
            </div>
        </div>

        <div class="account__paintingcontrols">
            <a href="{{ route('account.paintings') }}/{{ $product->id }}/edit">
                <i class="material-icons">edit</i>
            </a>
            <a href="{{ route('account.paintings') }}/{{ $product->id }}/delete">
                <i class="material-icons">close</i>
            </a>
        </div>
    </div>
</div>
@endforeach


@endsection