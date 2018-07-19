<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>ArtMarket - Главная</title>
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
	<header class="header">	
		<div class="container">
			<div class="header__toggler">
				<i class="material-icons">menu</i>
			</div>
			<div class="topline">			
				<a class="logo" href="#"><span class="logo_violet">Art</span>Market</a>
				<div class="topmenu__wrapper topmenu__wrapper_hidden">
					<a class="logo" href="#"><span class="logo_violet">Art</span>Market</a>
					<div class="topcontacts">
	        			<div class="topcontacts__phone">
	        				<span class="topcontacts__phone_small">+7 (495) </span>507-64-85
	        			</div>
	        			<span class="topcontacts__tomessengers text text_xsmall text_grey">
	    					Написать в мессенджеры
	    				</span>
	        		</div>
					<ul class="topmenu">
	    				<li>
	    					<a href="#" class="topmenu__link text text_white text_uppercase">О проекте</a>
	    				</li>
						<li>
							<a href="#" class="topmenu__link text text_white text_uppercase">Аукцион</a>
						</li>
						<li>
							<a href="#" class="topmenu__link text text_white text_uppercase">Художники</a>
						</li>					
						<li>
							<a href="#" class="topmenu__link text text_white text_uppercase">Галереи</a>
						</li>				
						<li>
							<a href="#" class="topmenu__link text text_white text_uppercase">FAQ</a>
						</li>
	        		</ul><!-- /.topmenu -->
        		</div>
        		<div class="topcontacts">
        			<div class="topcontacts__phone">
        				<span class="topcontacts__phone_small">+7 (495) </span>507-64-85
        			</div>
        			<span class="topcontacts__tomessengers text text_small text_grey">
    					Написать в мессенджеры
    				</span>
        		</div>
			</div><!-- /.topline -->
			<h1 class="slogan title title_xlarge title_white">Найди своего художника</h1>
			<h2 class="descriptor text text_white text_large">
				ArtMarket - это современная интернет-площадка, где продавцы и покупатели произведений искусства находят друг друга. На нашем портале размещено более 2000 работ и каждый день эта коллекция активно пополняется!
			</h2>

			
			<div class="search">
				<div class="search__inputwrapper">
					<input type="text" class="input" placeholder="Введите фамилию художника или название картины">
				</div>
                <button data-ripple class="button button_wide">
                    Искать
                </button>
			</div>
		</div><!-- /.container -->
		<div class="banner" style="background-image: url(img/banner1.jpg);"></div>
	</header>

    <main class="main">
    	<div class="container">
	        <section class="selectedFilters">
	             <button data-ripple class="button button_grey selectedFilters__button">
	                Сбросить фильтры
	                <i class="material-icons">delete</i>
	            </button>
	            <button data-ripple class="button selectedFilters__button">
	                Новинки
	                <i class="material-icons">close</i>
	            </button>
	            <button data-ripple class="button selectedFilters__button">
	                Со скидкой
	                <i class="material-icons">close</i>
	            </button>
	        </section><!-- /.selectedFilters -->

	        <section class="selectedFilters selectedFilters_sorting">
	        	<a href="#" class="text text_small text_grey filterToggler">ПОКАЗАТЬ ФИЛЬТРЫ</a>
	        </section>

	        <div class="cardswrapper">
		        <div class="filter">
	        		<div class="filter__section">
	        			<div class="title title_small filter__title">
		        			Типы
		        			<i class="material-icons">remove</i>
		        		</div>

		        		<div class="filter__sectioncontent">
		        			<div class="checkbox">
								<label>
									<input type="checkbox" checked=""><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Аукционы</span>
								</label>
							</div>
	
							<div class="checkbox">
								<label>
									<input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Новинки</span>
								</label>
							</div>
	
							<div class="checkbox">
								<label>
									<input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Со скидкой</span>
								</label>
							</div>
						</div><!--/.filter__sectioncontent-->
	        		</div><!--/.filter__section-->

	        		<div class="filter__section">
	        			<div class="title title_small filter__title">
		        			Стили
		        			<i class="material-icons">remove</i>
		        		</div>
						
						<div class="filter__sectioncontent">
			        		<div class="checkbox">
								<label>
									<input type="checkbox" checked=""><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Живопись</span>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Графика</span>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Импрессионизм</span>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Абстракционизм</span>
								</label>
							</div>
						</div>
	        		</div><!--/.filter__section-->

	        		<div class="filter__section">
	        			<div class="title title_small filter__title">
		        			Краска
		        			<i class="material-icons">remove</i>
		        		</div>
						
						<div class="filter__sectioncontent">
			        		<div class="checkbox">
								<label>
									<input type="checkbox" checked=""><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Акрил</span>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Гуашь</span>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Масло</span>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Карандаш</span>
								</label>
							</div>
						</div>
	        		</div><!--/.filter__section-->

	        		<div class="filter__section">
	        			<div class="title title_small filter__title">
		        			Темы
		        			<i class="material-icons">remove</i>
		        		</div>
						
						<div class="filter__sectioncontent">
			        		<div class="checkbox">
								<label>
									<input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Звери и птицы</span>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Цветы и растения</span>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" checked=""><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Абстрактные фигуры</span>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" checked=""><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Архитектура</span>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Природа, море, небо</span>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox"><span class="checkbox-material"><span class="check"></span></span>
									<span class="text">Люди и портреты</span>
								</label>
							</div>
						</div>
	        		</div><!--/.filter__section-->

	        		<div class="filter__section">
	        			<div class="title title_small filter__title">
		        			Цена
		        		</div>

						<div class="filter__sectioncontent">
			        		<div id="slider" class="slider slider-info noUi-target noUi-ltr noUi-horizontal"></div>
			        		<div class="sliderNumbers">
				        		<div id="slider-margin-value-min" class="text text_small"></div>
				        		<div id="slider-margin-value-max" class="text text_small"></div>
			        		</div>
		        		</div>
		        	</div><!--/.filter__section-->

		        	<button data-ripple class="button button_grey selectedFilters__button">
		                Сбросить фильтры
		                <i class="material-icons">delete</i>
		            </button>
	        	</div>

		        <section class="cards">
		        	<div class="card">
		        		<div class="card__pic">
		        			<a href="#">
		        				<img data-ripple class="card__img" src="/img/card1.jpg" alt="">
		        			</a>
		        			<div class="card__coloredbg" style="background-image: url(img/card1.jpg); opacity: 1;"></div>
		        		</div>
		        		<div class="card__content">
		        			<a class="title title_small card__title" href="#">Вечерний морской бриз</a>
		        			<div class="text text_grey text_small card__text card__text_painter">Сарычев Александр Васильевич</div>
		        			<div class="text text_grey text_small card__text">Картон, масло</div>
		        			<div class="text text_grey text_small card__text">35 х 25,5 см</div>
		        			<div class="text text_grey text_small card__text">1948г.</div>
		        			<div class="card__bottom">
		        				<a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
		        				<div class="card__bottominfo">
		        					<div class="card__price title title_small">90 000 руб.</div>
		        					<div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Советский союз</div>
		        				</div>
		        			</div>
		        		</div>
		        	</div><!-- /.card -->

		        	<div class="card">
		        		<div class="card__pic">
		        			<a href="#">
		        				<img data-ripple class="card__img" src="/img/card2.jpg" alt="">
		        			</a>
		        			<div class="card__coloredbg" style="background-image: url(img/card2.jpg); opacity: 1;"></div>
		        		</div>
		        		<div class="card__content">
		        			<a class="title title_small card__title" href="#">Летняя деревня</a>
		        			<div class="text text_grey text_small card__text card__text_painter">Егоров Андрей Афанасьевич</div>
		        			<div class="text text_grey text_small card__text">Картон, темпера , гуашь</div>
		        			<div class="text text_grey text_small card__text">35 х 25,5 см</div>
		        			<div class="text text_grey text_small card__text">1925г.</div>
		        			<div class="card__bottom">
		        				<a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
		        				<div class="card__bottominfo">
		        					<div class="card__price title title_small">65 000 руб.</div>
		        					<div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Советский союз</div>
		        				</div>
		        			</div>
		        		</div>
		        	</div><!-- /.card -->

		        	<div class="card card_auction">
		        		<div class="card__pic">
		        			<a href="#">
		        				<img data-ripple class="card__img" src="/img/card3.jpg" alt="">
		        			</a>
		        			<div class="card__coloredbg" style="background-image: url(img/card3.jpg); opacity: 1;"></div>
		        		</div>
		        		<div class="card__content">
		        			<div class="card__auctionTitle">
		        				<a class="title title_small card__title" href="#">У берега</a>
		        				<div class="card__auctionIndicators">
		        					<div class="card__auctionSticker">Аукцион</div>
		        					<div class="card__auctiontime">
		        						<i class="material-icons">access_time</i>
		        						<span class="title title_small card__timeNumbers">23:43:03</span>
		        					</div>
		        				</div>
		        			</div>
		        			<div class="text text_grey text_small card__text card__text_painter">Сысоев Николай Александрович</div>
		        			<div class="text text_grey text_small card__text">Холст, масло</div>
		        			<div class="text text_grey text_small card__text">35 х 25,5 см</div>
		        			<div class="text text_grey text_small card__text">1948г.</div>
		        			<div class="card__bottom">
		        				<a href="#" class="card__addtocart card__addtocart_mint title title_xsmall title_white">Сделать ставку</a>
		        				<div class="card__bottominfo">
		        					<div class="card__price title title_small">35 000 руб.</div>
		        					<div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Россия</div>
		        				</div>
		        			</div>
		        		</div>
		        	</div><!-- /.card -->





		        	<div class="card">
		        		<div class="card__pic">
		        			<a href="#">
		        				<img data-ripple class="card__img" src="/img/card4.jpg" alt="">
		        			</a>
		        			<div class="card__coloredbg" style="background-image: url(img/card4.jpg); opacity: 1;"></div>
		        		</div>
		        		<div class="card__content">
		        			<a class="title title_small card__title" href="#">Утренний рассвет</a>
		        			<div class="text text_grey text_small card__text card__text_painter">Сарычев Александр Васильевич</div>
		        			<div class="text text_grey text_small card__text">Картон, масло</div>
		        			<div class="text text_grey text_small card__text">35 х 25,5 см</div>
		        			<div class="text text_grey text_small card__text">1948г.</div>
		        			<div class="card__bottom">
		        				<a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
		        				<div class="card__bottominfo">
		        					<div class="card__price title title_small">90 000 руб.</div>
		        					<div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Советский союз</div>
		        				</div>
		        			</div>
		        		</div>
		        	</div><!-- /.card -->

		        	<div class="card">
		        		<div class="card__pic">
		        			<a href="#">
		        				<img data-ripple class="card__img" src="/img/card5.jpg" alt="">
		        			</a>
		        			<div class="card__coloredbg" style="background-image: url(img/card5.jpg); opacity: 1;"></div>
		        		</div>
		        		<div class="card__content">
		        			<a class="title title_small card__title" href="#">Морской шторм</a>
		        			<div class="text text_grey text_small card__text card__text_painter">Егоров Андрей Афанасьевич</div>
		        			<div class="text text_grey text_small card__text">Картон, темпера , гуашь</div>
		        			<div class="text text_grey text_small card__text">35 х 25,5 см</div>
		        			<div class="text text_grey text_small card__text">1925г.</div>
		        			<div class="card__bottom">
		        				<a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
		        				<div class="card__bottominfo">
		        					<div class="card__price title title_small">65 000 руб.</div>
		        					<div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Советский союз</div>
		        				</div>
		        			</div>
		        		</div>
		        	</div><!-- /.card -->

		        	<div class="card">
		        		<div class="card__pic">
		        			<a href="#">
		        				<img data-ripple class="card__img" src="/img/card6.jpg" alt="">
		        			</a>
		        			<div class="card__coloredbg" style="background-image: url(img/card6.jpg); opacity: 1;"></div>
		        		</div>
		        		<div class="card__content">
		        			<a class="title title_small card__title" href="#">Кувшинки в пруду</a>
		        			<div class="text text_grey text_small card__text card__text_painter">Сысоев Николай Александрович</div>
		        			<div class="text text_grey text_small card__text">Холст, масло</div>
		        			<div class="text text_grey text_small card__text">35 х 25,5 см</div>
		        			<div class="text text_grey text_small card__text">1948г.</div>
		        			<div class="card__bottom">
		        				<a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
		        				<div class="card__bottominfo">
		        					<div class="card__price title title_small">35 000 руб.</div>
		        					<div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Россия</div>
		        				</div>
		        			</div>
		        		</div>
		        	</div><!-- /.card -->
		        </section><!-- /.cards -->
	        </div>

	        <a class="promobanner" href="#">
        		<img src="/img/promobanner.jpg" alt="">
        	</a>

        	 <section class="cards">
	        	<div class="card">
	        		<div class="card__pic">
	        			<a href="#">
	        				<img data-ripple class="card__img" src="/img/card1.jpg" alt="">
	        			</a>
	        			<div class="card__coloredbg" style="background-image: url(img/card1.jpg); opacity: 1;"></div>
	        		</div>
	        		<div class="card__content">
	        			<a class="title title_small card__title" href="#">Вечерний морской бриз</a>
	        			<div class="text text_grey text_small card__text card__text_painter">Сарычев Александр Васильевич</div>
	        			<div class="text text_grey text_small card__text">Картон, масло</div>
	        			<div class="text text_grey text_small card__text">35 х 25,5 см</div>
	        			<div class="text text_grey text_small card__text">1948г.</div>
	        			<div class="card__bottom">
	        				<a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
	        				<div class="card__bottominfo">
	        					<div class="card__price title title_small">90 000 руб.</div>
	        					<div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Советский союз</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div><!-- /.card -->

	        	<div class="card">
	        		<div class="card__pic">
	        			<a href="#">
	        				<img data-ripple class="card__img" src="/img/card2.jpg" alt="">
	        			</a>
	        			<div class="card__coloredbg" style="background-image: url(img/card2.jpg); opacity: 1;"></div>
	        		</div>
	        		<div class="card__content">
	        			<a class="title title_small card__title" href="#">Летняя деревня</a>
	        			<div class="text text_grey text_small card__text card__text_painter">Егоров Андрей Афанасьевич</div>
	        			<div class="text text_grey text_small card__text">Картон, темпера , гуашь</div>
	        			<div class="text text_grey text_small card__text">35 х 25,5 см</div>
	        			<div class="text text_grey text_small card__text">1925г.</div>
	        			<div class="card__bottom">
	        				<a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
	        				<div class="card__bottominfo">
	        					<div class="card__price title title_small">65 000 руб.</div>
	        					<div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Советский союз</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div><!-- /.card -->

	        	<div class="card">
	        		<div class="card__pic">
	        			<a href="#">
	        				<img data-ripple class="card__img" src="/img/card3.jpg" alt="">
	        			</a>
	        			<div class="card__coloredbg" style="background-image: url(img/card3.jpg); opacity: 1;"></div>
	        		</div>
	        		<div class="card__content">
	        			<a class="title title_small card__title" href="#">У берега</a>
	        			<div class="text text_grey text_small card__text card__text_painter">Сысоев Николай Александрович</div>
	        			<div class="text text_grey text_small card__text">Холст, масло</div>
	        			<div class="text text_grey text_small card__text">35 х 25,5 см</div>
	        			<div class="text text_grey text_small card__text">1948г.</div>
	        			<div class="card__bottom">
	        				<a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
	        				<div class="card__bottominfo">
	        					<div class="card__price title title_small">35 000 руб.</div>
	        					<div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Россия</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div><!-- /.card -->





	        	<div class="card">
	        		<div class="card__pic">
	        			<a href="#">
	        				<img data-ripple class="card__img" src="/img/card4.jpg" alt="">
	        			</a>
	        			<div class="card__coloredbg" style="background-image: url(img/card4.jpg); opacity: 1;"></div>
	        		</div>
	        		<div class="card__content">
	        			<a class="title title_small card__title" href="#">Утренний рассвет</a>
	        			<div class="text text_grey text_small card__text card__text_painter">Сарычев Александр Васильевич</div>
	        			<div class="text text_grey text_small card__text">Картон, масло</div>
	        			<div class="text text_grey text_small card__text">35 х 25,5 см</div>
	        			<div class="text text_grey text_small card__text">1948г.</div>
	        			<div class="card__bottom">
	        				<a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
	        				<div class="card__bottominfo">
	        					<div class="card__price title title_small">90 000 руб.</div>
	        					<div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Советский союз</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div><!-- /.card -->

	        	<div class="card">
	        		<div class="card__pic">
	        			<a href="#">
	        				<img data-ripple class="card__img" src="/img/card5.jpg" alt="">
	        			</a>
	        			<div class="card__coloredbg" style="background-image: url(img/card5.jpg); opacity: 1;"></div>
	        		</div>
	        		<div class="card__content">
	        			<a class="title title_small card__title" href="#">Морской шторм</a>
	        			<div class="text text_grey text_small card__text card__text_painter">Егоров Андрей Афанасьевич</div>
	        			<div class="text text_grey text_small card__text">Картон, темпера , гуашь</div>
	        			<div class="text text_grey text_small card__text">35 х 25,5 см</div>
	        			<div class="text text_grey text_small card__text">1925г.</div>
	        			<div class="card__bottom">
	        				<a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
	        				<div class="card__bottominfo">
	        					<div class="card__price title title_small">65 000 руб.</div>
	        					<div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Советский союз</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div><!-- /.card -->

	        	<div class="card">
	        		<div class="card__pic">
	        			<a href="#">
	        				<img data-ripple class="card__img" src="/img/card6.jpg" alt="">
	        			</a>
	        			<div class="card__coloredbg" style="background-image: url(img/card6.jpg); opacity: 1;"></div>
	        		</div>
	        		<div class="card__content">
	        			<a class="title title_small card__title" href="#">Кувшинки в пруду</a>
	        			<div class="text text_grey text_small card__text card__text_painter">Сысоев Николай Александрович</div>
	        			<div class="text text_grey text_small card__text">Холст, масло</div>
	        			<div class="text text_grey text_small card__text">35 х 25,5 см</div>
	        			<div class="text text_grey text_small card__text">1948г.</div>
	        			<div class="card__bottom">
	        				<a href="#" class="card__addtocart title title_xsmall title_white">В корзину</a>
	        				<div class="card__bottominfo">
	        					<div class="card__price title title_small">35 000 руб.</div>
	        					<div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>Россия</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div><!-- /.card -->
	        </section><!-- /.cards -->
        </div><!-- /.container -->

        
    </main>

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