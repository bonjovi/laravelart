@extends('layouts.inner')

@section('content')

	<h1 class="title title_basegrey title_centered">Художники</h1>

	<div class="painters">
		<ul class="painters__navigation">
			<li>
				<a href="#" class="painters__navigationlink text text_basegrey painters__navigationlink_active">Новые</a>
			</li>
			<li>
				<a href="#" class="painters__navigationlink text text_basegrey">Популярные</a>
			</li>
			<li>
				<a href="#" class="painters__navigationlink text text_basegrey">Художник дня</a>
			</li>
			<li>
				<a href="#" class="painters__navigationlink text text_basegrey">Самые продаваемые</a>
			</li>
			<li>
				<a href="#" class="painters__navigationlink text text_basegrey">По алфавиту</a>
			</li>
		</ul>

		<div class="onepainter">
			<div class="onepainter__info">
				<div class="onepainter__avatar">
					<img src="img/avatar1.png" alt="">
				</div>

				<div class="onepainter__textsummary">
					<a class="title title_small card__title" href="#">Сарычев Александр Васильевич</a>
					<div class="onepainter__textsummaryinner">
						<div class="text text_grey text_small"><i class="material-icons">location_on</i>Советский союз</div>
						<div class="text text_grey text_small">(1917-1988)</div>
						<div class="text text_grey text_small">Работ: 6</div>
					</div>
				</div>
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
			</section><!-- /.cards -->
		</div><!--/.onepainter-->

		<div class="onepainter">
			<div class="onepainter__info">
				<div class="onepainter__avatar">
					<img src="img/avatar2.png" alt="">
				</div>

				<div class="onepainter__textsummary">
					<a class="title title_small card__title" href="#">Сарычев Александр Васильевич</a>
					<div class="onepainter__textsummaryinner">
						<div class="text text_grey text_small"><i class="material-icons">location_on</i>Советский союз</div>
						<div class="text text_grey text_small">(1917-1988)</div>
						<div class="text text_grey text_small">Работ: 6</div>
					</div>
				</div>
			</div>

			<section class="cards">
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
		</div><!--/.onepainter-->

		<ul class="pagination">
			<li class="pagination__item">
				<a href="#" class="pagination__link text text_grey">1</a>
			</li>
			<li class="pagination__item">
				<a href="#" class="pagination__link text text_grey">...</a>
			</li>
			<li class="pagination__item">
				<a href="#" class="pagination__link text text_grey">5</a>
			</li>
			<li class="pagination__item">
				<a href="#" class="pagination__link text text_grey">6</a>
			</li>
			<li class="pagination__item pagination__item_active">
				<a href="#" class="pagination__link text text_grey">7</a>
			</li>
			<li class="pagination__item">
				<a href="#" class="pagination__link text text_grey">8</a>
			</li>
			<li class="pagination__item">
				<a href="#" class="pagination__link text text_grey">9</a>
			</li>
			<li class="pagination__item">
				<a href="#" class="pagination__link text text_grey">...</a>
			</li>
			<li class="pagination__item">
				<a href="#" class="pagination__link text text_grey">11</a>
			</li>
		</ul>
	</div>

@endsection