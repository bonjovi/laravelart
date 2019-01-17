@extends('layouts.inner')

@section('content')
@section('extra-js')
	<script>
        $(function() {
			jQuery.noConflict();

			// Popup for product main image
			jQuery('.fancybox').fancybox();

            jQuery('.productGallery__thumbnail').on('click', function() {
                jQuery('.productGallery__thumbnail').removeClass('productGallery__thumbnail_active');
                jQuery(this).addClass('productGallery__thumbnail_active');
				jQuery('.productGallery__mainpic a').attr('href', $(this).find('img').attr('src'));
				jQuery('.productGallery__mainpic img').attr('src', $(this).find('img').attr('src'));
			});
        });
	</script>
@endsection

@php
	$product->painter->addView();
@endphp

<main class="main">
		<div class="container">

			<div class="product">
				<div class="productGallery">
					<div class="productGallery__mainpic">
						<a data-fancybox="gallery" href="{{ productImage($product->image) }}">
							<img src="{{ productImage($product->image) }}" alt="{{ $product->name }}" title="{{ $product->name }}">
						</a>	
					</div>

					<div class="productGallery__thumbnails">
						<!--<div class="productGallery__navigation productGallery__leftarrow"></div>-->
						<div class="productGallery__thumbnail productGallery__thumbnail_active">
							<img src="{{ productImage($product->image) }}" alt="product">
						</div>
						@if ($product->images)
							@foreach (json_decode($product->images, true) as $image)
								<div class="productGallery__thumbnail">
									<img src="{{ productImage($image) }}" alt="product">
								</div>
							@endforeach
						@endif
						<!--<div class="productGallery__navigation productGallery__rightarrow"></div>-->
					</div>
				</div><!-- /.productGallery -->
				<div class="product__info">
					<h1 class="title title_basegrey">{{ $product->name }}</h1>
					<!--<a href="#" class="product__painter text text_small text_basegrey">{{ $product->painter }}</a>-->
					<div class="product__seller text text_small text_basegrey">
						<a href="{{ route('painters.show', $product->painter->id) }}" class="product__painter text text_small text_basegrey">{{ $product->painter->full_name }}</a>
					</div>
					<div class="product__info">
						<div class="product__seller text text_small text_basegrey">
							@foreach ($product->materials as $material)
								{{ $material->name }}
							@endforeach
						</div>
						<div class="product__seller text text_small text_basegrey">{{ $product->dimensions }}</div>
						<div class="product__seller text text_small text_basegrey">{{ $product->year }}</div>
						<br>
						<div class="text text_basegrey text_small card__text">{!! $product->description !!}</div>
						<br>
						<form method="POST" action="{{ route('shop.showcontacts', $product->id) }}">
							@csrf
							<button data-ripple class="button button_green product__makebetbutton" type="submit">
								Показать контакты продавца
							</button>
						</form>	
						
						@if(isset($productSeller))
							{!! $productSeller !!}
						@endif
						
					</div>

				</div>
			</div><!-- /.product -->
			
			<div class="painters">
				<h3 class="title title_middle title_basegred title_centered">Ещё работы художника:</h3>

				<div class="onepainter">
					<div class="onepainter__info">
						<div class="onepainter__avatar">
							<img src="{{ painterPic($product->painter->pic) }}" alt="">
						</div>

						<div class="onepainter__textsummary">
							<a class="title title_small card__title" href="{{ route('painters.show', $product->painter->id) }}">{{ $product->painter->full_name }}</a>
							<div class="onepainter__textsummaryinner">
								<div class="text text_grey text_small"><i class="material-icons">location_on</i>{{ $product->painter->country }}</div>
								<!--<div class="text text_grey text_small">({{ $product->painter->birth_year }} - {{ painterDeathYear($product->painter->death_year) }})</div>-->
								<div class="text text_grey text_small">Работ: {{ count($product->painter->paintings) }}</div>
							</div>
						</div>
					</div>


					
						
					
					<section class="cards">
						@foreach ($product->painter->paintings as $product)
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
								<div class="text text_grey text_small card__text">{{ $product->dimensions }}</div>
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
		</div><!-- /.container -->


	</main>

@endsection




