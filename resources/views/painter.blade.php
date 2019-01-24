@extends('layouts.inner')

@section('content')

	<!--<h1 class="title title_basegrey title_centered">{{ $painter->full_name }}</h1>-->

	<div class="painters">

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
							<img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
						</a>
						<div class="card__coloredbg" style="opacity: 1;">
							<img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
						</div>
					</div>
					<div class="card__content">
						<a class="title title_small card__title" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
						<a href="{{ route('painters.show', $product->painter->id) }}" class="text text_grey text_small card__text card__text_painter">{{ $product->painter->full_name }}</a>
						<div class="text text_grey text_small card__text">
							@foreach ($product->materials as $material)
								{{ $material->name }}
							@endforeach
						</div>
						<div class="text text_grey text_small card__text">{{ $product->dimension_width }} x {{ $product->dimension_height }} см</div>
						<div class="text text_grey text_small card__text">{{ $product->year }}</div>
					</div>
				</div><!-- /.card -->
				@endforeach
				@if(count($product->painter->paintings)%3 == 2)
					<div class="card card_empty"></div>
				@endif

			</section><!-- /.cards -->
		</div><!--/.onepainter-->
	</div>

@endsection