<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>ArtMarket - Художники</title>
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
	<link rel="icon" type="image/png" href="img/favicon.png">

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
	
	<link rel="stylesheet" href="css/main.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	
	<script src="js/ripple.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/wNumb.js"></script>

    <script src="js/custom.js"></script>
</head>
<body>


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
	    					<a class="text text_small text_grey footer__link" href="#">О проекте</a>
	    				</li>
	    				<li class="footer__listitem">
	    					<a class="text text_small text_grey footer__link" href="#">Художники</a>
	    				</li>
	    				<li class="footer__listitem">
	    					<a class="text text_small text_grey footer__link" href="#">Аукцион</a>
	    				</li>
	    				<li class="footer__listitem">
	    					<a class="text text_small text_grey footer__link" href="#">Галерея</a>
	    				</li>
	    				<li class="footer__listitem">
	    					<a class="text text_small text_grey footer__link" href="#">FAQ</a>
	    				</li>
	    				<li class="footer__listitem">
	    					<a class="text text_small text_grey footer__link" href="#">Персональные данные</a>
	    				</li>
	    				<li class="footer__listitem">
	    					<a class="text text_small text_grey footer__link" href="#">Карта сайта</a>
	    				</li>
	    			</ul>
	    		</div><!-- /.footer__section -->

	    		<div class="footer__section">
	    			<div class="title title_white footer__title">Покупателям</div>
	    			<ul class="footer__list">
	    				<li class="footer__listitem">
	    					<a class="text text_small text_grey footer__link" href="#">Доставка</a>
	    				</li>
	    				<li class="footer__listitem">
	    					<a class="text text_small text_grey footer__link" href="#">Способы оплаты</a>
	    				</li>
	    				<li class="footer__listitem">
	    					<a class="text text_small text_grey footer__link" href="#">Гарантии</a>
	    				</li>
	    				<li class="footer__listitem">
	    					<a class="text text_small text_grey footer__link" href="#">Поддержка</a>
	    				</li>
	    			</ul>
	    		</div><!-- /.footer__section -->

	    		<div class="footer__section">
	    			<div class="title title_white footer__title">Художникам</div>
	    			<ul class="footer__list">
	    				<li class="footer__listitem">
	    					<a class="text text_small text_grey footer__link" href="#">Почему именно АртМаркет?</a>
	    				</li>
	    				<li class="footer__listitem">
	    					<a class="text text_small text_grey footer__link" href="#">Правила и условия</a>
	    				</li>
	    				<li class="footer__listitem">
	    					<a class="text text_small text_grey footer__link" href="#">Поддержка</a>
	    				</li>
	    			</ul>
	    		</div><!-- /.footer__section -->
	    	</div><!-- /.footer__left -->
	    	<div class="footer__right">
	    		<div class="title title_white footer__title">Подписка на рассылку</div>
	    		<div class="text text_small text_grey footer__text">Хотите первыми узнавать о скидках<br>и уникальных предложениях?</div>
	    		<div class="subscribe">
					<input type="text" class="input" placeholder="Ваш email">
	                <button data-ripple class="button">
	                    Подписаться
	                </button>
				</div>
	    	</div>
    	</div><!-- /.footer__right -->

    	<div class="copyright">
    		<div class="text text_small text_grey">© 2018 ArtMarket. Все права защищены</div>
    	</div>

    </footer>

<script>
    Array.prototype.forEach.call(document.querySelectorAll('[data-ripple]'), function(element){
        new RippleEffect(element); 
    });
</script>
	
</body>
</html>