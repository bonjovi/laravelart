@extends('layouts.inner')

@section('content')

	<div class="search search__for-inner">
		<form action="{{ route('search') }}" method="GET">
			<div class="search__inputwrapper">
				<input type="text" class="input" placeholder="Введите фамилию художника или название картины" name="query">
			</div>
			<button data-ripple class="button button_wide">
				Искать
			</button>
		</form>
	</div>

	<h1 class="title title_basegrey title_centered">Художники</h1>

	<div class="painters">
		<ul class="painters__navigation">
			<li>
				<a href="{{ route('painters.new') }}" class="painters__navigationlink text text_basegrey painters__navigationlink_active">Новые</a>
			</li>
			<li>
				<a href="{{ route('painters.popular') }}" class="painters__navigationlink text text_basegrey">Популярные</a>
			</li>
			<!--<li>
				<a href="#" class="painters__navigationlink text text_basegrey">Художник дня</a>
			</li>
			<li>
				<a href="#" class="painters__navigationlink text text_basegrey">Самые продаваемые</a>
			</li>-->
			<li>
				<a href="{{ route('painters.asc') }}" class="painters__navigationlink text text_basegrey">По алфавиту</a>
			</li>
		</ul>

		@foreach ($painters as $painter)
			@if($painter->id != 21)
			<div class="onepainter">
				<div class="onepainter__info">
					<div class="onepainter__avatar">
						<img src="{{ painterPic($painter->pic) }}" alt="">
					</div>

					<div class="onepainter__textsummary">
						<a class="title title_small card__title" href="{{ route('painters.show', $painter->id) }}">{{ $painter->full_name }}</a>
						<div class="onepainter__textsummaryinner">
							<div class="text text_grey text_small"><i class="material-icons">location_on</i>{{ $painter->country }}</div>
							<!--<div class="text text_grey text_small">({{ $painter->birth_year }} - {{ painterDeathYear($painter->death_year) }})</div>-->
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
							<div class="text text_grey text_small card__text">{{ $product->dimension_height }} x {{ $product->dimension_width }} см</div>
							<div class="text text_grey text_small card__text">{{ $product->year }}</div>
						</div>
					</div><!-- /.card -->
					@endforeach

					@if(count($painter->paintings)%3 == 2)
						<div class="card card_empty"></div>
					@endif

				</section><!-- /.cards -->
			</div><!--/.onepainter-->
			@endif
		@endforeach

	</div>

@endsection