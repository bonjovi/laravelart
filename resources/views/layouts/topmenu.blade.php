<ul class="topmenu">
    <li>
        <a href="/about" class="topmenu__link text text_{{ $topmenuColor  }} text_uppercase" >О проекте</a>
    </li>
    <li>
        <a href="{{ route('shop.index') }}" class="topmenu__link text text_{{ $topmenuColor  }} text_uppercase">Картины</a>
    </li>
    <li>
        <a href="{{ route('painters.index') }}" class="topmenu__link text text_{{ $topmenuColor  }} text_uppercase">Художники</a>
    </li>
    <li>
        <a href="/rules" class="topmenu__link text text_{{ $topmenuColor  }} text_uppercase">Правила</a>
    </li>
    <li>
        <a href="/faq" class="topmenu__link text text_{{ $topmenuColor  }} text_uppercase">FAQ</a>
    </li>
    <!--<li>
        <a href="/cart" class="topmenu__link text text_{{ $topmenuColor  }} text_uppercase">Корзина</a>
        @if (Cart::instance('default')->count() > 0)
            <span class="cart__count"><span>{{ Cart::instance('default')->count() }}</span></span>
        @endif
    </li>-->

        
</ul><!-- /.topmenu -->