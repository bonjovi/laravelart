<ul class="accountmenu">
    <li>
        <a class="text text_middle accountmenu__link {{ Request::is('account/profile') ? 'accountmenu__link_active' : '' }}" href="{{route('account.profile')}}">Профиль</a>
    </li>

    <!--<li>
        <a class="text text_middle accountmenu__link {{ Request::is('account/settings') ? 'accountmenu__link_active' : '' }}" href="{{route('account.settings')}}">Настройки аккаунта</a>
    </li>

    <li>
        <a class="text text_middle accountmenu__link {{ Request::is('account/orders') ? 'accountmenu__link_active' : '' }}" href="{{route('account.orders')}}">Заказы</a>
    </li>-->

    <li>
        <a class="text text_middle accountmenu__link {{ Request::is('account/paintings') ? 'accountmenu__link_active' : '' }}" href="{{route('account.paintings')}}">Картины</a>
    </li>

    <li>
        <a class="text text_middle accountmenu__link {{ Request::is('account/messages') ? 'accountmenu__link_active' : '' }}" href="{{route('account.messages')}}">Сообщения</a>
    </li>
</ul>