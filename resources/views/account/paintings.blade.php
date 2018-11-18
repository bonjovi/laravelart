@extends('account.account')

@section('accountcontent')

@foreach($user->products as $product)
<div class="account__paintings">
    <div class="account__painting">
        <div class="account__paintingpic">
            <img src="{{ productImage($product->image) }}" alt="{{ $product->name }}">
        </div>

        <div class="account__paintingdesc">
            <a href="#" class="title title_small">{{ $product->name }}</a>
            <a href="#" class="text text_grey">{{ $product->name }}</a>
            <div class="title title_small">{{ $product->price }} руб.</div>
        </div>

        <div class="account__paintingcontrols">
            <a href="{{ route('account.paintings') }}/{{ $product->id }}/edit">
                <i class="material-icons">edit</i>
            </a>
            <a href="#">
                <i class="material-icons">close</i>
            </a>
        </div>
    </div>
</div>
@endforeach


@endsection