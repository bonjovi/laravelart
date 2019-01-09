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

		@foreach ($painters as $painter)
		<div class="onepainter">
			<div class="onepainter__info">
				<div class="onepainter__avatar">
					<img src="{{ painterPic($painter->pic) }}" alt="">
				</div>

				<div class="onepainter__textsummary">
					<a class="title title_small card__title" href="{{ route('painters.show', $painter->id) }}">{{ $painter->full_name }}</a>
					<div class="onepainter__textsummaryinner">
						<div class="text text_grey text_small"><i class="material-icons">location_on</i>{{ $painter->country }}</div>
						<div class="text text_grey text_small">({{ $painter->birth_year }} - {{ painterDeathYear($painter->death_year) }})</div>
						<div class="text text_grey text_small">Работ: {{ count($painter->paintings) }}</div>
					</div>
				</div>
			</div>

			<section class="cards">
				@foreach ($painter->paintings as $product)
				<div class="card">
					<div class="card__pic">
						<a class="card__piclink" href="{{ route('shop.show', $product->slug) }}">
							<img data-ripple class="card__img" src="{{ productImage($product->image) }}" alt="">
						</a>
						<div class="card__coloredbg" style="background-image: url({{ productImage($product->image) }}); opacity: 1;"></div>
					</div>
					<div class="card__content">
						<a class="title title_small card__title" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
						<a href="{{ route('painters.show', $product->painter->id) }}" class="text text_grey text_small card__text card__text_painter">{{ $product->painter->full_name }}</a>
						<div class="text text_grey text_small card__text">
							@foreach ($product->materials as $material)
								{{ $material->name }}
							@endforeach
						</div>
						<div class="text text_grey text_small card__text">{{ $product->dimensions }}</div>
						<div class="text text_grey text_small card__text">{{ $product->year }}</div>
						<div class="card__bottom">
							<a href="{{ route('shop.show', $product->slug) }}" class="card__addtocart title title_xsmall title_white">Подробнее</a>
							<div class="card__bottominfo">
								<div class="card__price title title_small">{{ $product->price }} руб.</div>
								<div class="card__location text text_xsmall text_grey"><i class="material-icons">location_on</i>{{ $product->painter->country }}</div>
							</div>
						</div>
					</div>
				</div><!-- /.card -->
				@endforeach

				@if(count($painter->paintings)%3 == 2)
					<div class="card card_empty"></div>
				@endif

				

				<!--<div class="card card_auction">
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
				</div>--><!-- /.card -->

			</section><!-- /.cards -->
		</div><!--/.onepainter-->
		@endforeach

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