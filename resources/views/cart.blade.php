@extends('layouts.inner')

@section('content')
<h1 class="title title_basegrey title_centered">
    Корзина
</h1>

<div class="account cart">

    <div class="account__left">

        @if (session()->has('success_message'))
            <p class="text flash flash_success">
                {{ session()->get('success_message') }}
            </p>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="text flash flash_success">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="cart__products">
            @if(Cart::count() > 0)
                @foreach (Cart::content() as $item)
                <div class="account__painting">
                    <div class="account__paintingpic">
                        <img src="{{ productImage($item->model->image) }}" alt="{{ $item->model->name }}">
                    </div>

                    <div class="account__paintingdesc">
                        <a href="/shop/{{ $item->model->slug}}" class="title title_small">{{ $item->model->name }}</a>
                        <a href="/painters/{{ $item->model->painter->id}}" class="text text_grey">{{ $item->model->painter->full_name }}</a>
                        <div class="title title_small">{{ $item->model->price }} руб.</div>
                    </div>

                    <div class="account__paintingcontrols">
                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="cart__delete">
                                <i class="material-icons">close</i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            @else
                <div class="text">Корзина пуста</div>
            @endif 
        </div>   
        
        
           
    </div>
    <div class="account__right cart__right">
        <div class="cart__amount">
            <h3 class="title title_middle">Итого:</h3>
            <div class="cart__amountrow">
                <div class="cart__amounttitle">
                    <div class="text text_basegrey">
                        Стоимость товаров:
                    </div>
                </div>
                <div class="cart__amountvalue">
                    <div class="title title_small title_grey">
                        {{ Cart::total() }} руб.
                    </div>
                </div>
            </div><!-- /.cart__amountrow -->

            <div class="cart__amountrow">
                <div class="cart__amounttitle">
                    <div class="text text_basegrey">
                        Доставка:
                    </div>
                </div>
                <div class="cart__amountvalue">
                    <div class="title title_small title_grey">
                        {{ Cart::count() > 0 ? '3000 руб.' : '0 руб.' }}
                    </div>
                </div>
            </div><!-- /.cart__amountrow -->

            <div class="cart__amountrow">
                <div class="cart__amounttitle">
                    <div class="text text_basegrey">
                        Итого:
                    </div>
                </div>
                <div class="cart__amountvalue">
                    <div class="title title_small">
                        {{ Cart::count() > 0 ? intval(Cart::total()) - 3000 : '0' }} руб.
                    </div>
                </div>
            </div><!-- /.cart__amountrow -->

            <div class="cart__coupon">
                <form action="#" method="POST">
                    <input type="text" class="input" placeholder="Номер купона">
                    <button type="submit" class="button button_grey">Применить</button>
                </form>
            </div>

            <a href="#" class="button cart__tocheckout">К оформлению</a>
        </div><!-- /.cart__amount -->
    </div><!-- /.account__right.cart__right -->
</div>
@endsection
