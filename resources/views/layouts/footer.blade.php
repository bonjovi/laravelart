<footer class="footer">
    <div class="container">
        <div class="footer__toggler">
            <i class="material-icons">menu</i>
        </div>
        <div class="footer__left">
            <div class="footer__section">
                <div class="title title_white footer__title">АртМаркет</div>
                <ul class="footer__list">
                    <li class="footer__listitem">
                        <a class="text text_small text_grey footer__link" href="/about">О проекте</a>
                    </li>
                    <li class="footer__listitem">
                        <a class="text text_small text_grey footer__link" href="/shop">Картины</a>
                    </li>
                    <li class="footer__listitem">
                        <a class="text text_small text_grey footer__link" href="/painters">Художники</a>
                    </li>
                    <li class="footer__listitem">
                        <a class="text text_small text_grey footer__link" href="/dealer">Дилерский раздел</a>
                    </li>
                    <li class="footer__listitem">
                        <a class="text text_small text_grey footer__link" href="/faq">FAQ</a>
                    </li>
                    <li class="footer__listitem">
                        <a class="text text_small text_grey footer__link" href="/contacts">Контакты</a>
                    </li>
                </ul>
            </div><!-- /.footer__section -->

            <div class="footer__section">
                <div class="title title_white footer__title">Художникам</div>
                <ul class="footer__list">
                    <li class="footer__listitem">
                        <a class="text text_small text_grey footer__link" href="/why">Почему именно АртМаркет?</a>
                    </li>
                    <li class="footer__listitem">
                        <a class="text text_small text_grey footer__link" href="/rules">Правила и условия</a>
                    </li>
                    <li class="footer__listitem">
                        <a class="text text_small text_grey footer__link" href="/support">Поддержка</a>
                    </li>
                </ul>
            </div><!-- /.footer__section -->
        </div><!-- /.footer__left -->
        <div class="footer__right">
            <div class="title title_white footer__title">Подписка на рассылку</div>
            <div class="text text_small text_grey footer__text">Хотите первыми узнавать о скидках<br>и уникальных предложениях?</div>
            <div class="subscribe">
                <script>
                    $(function() {
                        $('.subscribe button').on('click', function(e) {
                            if($('.subscribe input[name=email]').val().length < 2) {
                                e.preventDefault();
                            }
                        });
                    });
                </script>
                <form action="{{ route('subscription') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" class="input" placeholder="Ваш email" name="email">
                    <button data-ripple class="button">
                        Подписаться
                    </button>
                </form>
            </div>
        </div>
    </div><!-- /.footer__right -->

    <div class="copyright">
        <div class="text text_small text_grey">© 2018 ArtMarket24. Все права защищены</div>
    </div>

</footer>