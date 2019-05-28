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
	//$product->painter->addView();
	$real_unknown_painter = (isset($product->unknown_painter) && $product->unknown_painter != '') ? $product->unknown_painter : '';
@endphp

@if($user->is_dealer == 1)

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
						@if(is_array($product->images))
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
						@if(!isset($product->unknown_painter))
							<a href="{{ route('painters.show', $product->painter->id) }}" class="product__painter text text_small text_basegrey">{{ $product->painter->full_name }}</a>
                        @else
                            <div class="product__painter text text_small text_basegrey">{{ $product->unknown_painter }}</div>
                        @endif
					</div>
					<div class="product__info">
						@if($product->styles)
							<div class="product__seller text text_small text_basegrey">
								@foreach ($product->styles as $style)
									<?php $styles[] = $style->name; ?>
								@endforeach
								<?php $styles = array_unique($styles); ?>
								@foreach ($styles as $style)
									{{ $style }}
								@endforeach
							</div>
						@endif

						@if($product->materials)
							<div class="product__seller text text_small text_basegrey">
								@foreach ($product->materials as $material)
									<?php $materials[] = $material->name; ?>
								@endforeach
								<?php $materials = array_unique($materials); ?>
								@foreach ($materials as $material)
									{{ $material }}
								@endforeach
							</div>
						@endif

						@if($product->surfaces)
							<div class="product__seller text text_small text_basegrey">
								@foreach ($product->surfaces as $surface)
									<?php $surfaces[] = $surface->name; ?>
								@endforeach
								<?php $surfaces = array_unique($surfaces); ?>
								@foreach ($surfaces as $surface)
									{{ $surface }}
								@endforeach
							</div>
						@endif

						@if($product->themes)
							<div class="product__seller text text_small text_basegrey">
								@foreach ($product->themes as $theme)
									<?php $themes[] = $theme->name; ?>
								@endforeach
								<?php $themes = array_unique($themes); ?>
								@foreach ($themes as $theme)
									{{ $theme }}
								@endforeach
							</div>
						@endif
						<div class="product__seller text text_small text_basegrey">{{ $product->dimension_height }} x {{ $product->dimension_width }} см</div>
						<div class="product__seller text text_small text_basegrey">{{ $product->year }}</div>
						<br>
						<div class="text text_basegrey text_small card__text">{!! $product->description !!}</div>
						<br>
						<!--<form method="POST" action="{{ route('shop.showcontacts_for_dealer', $product->id) }}">
							@csrf
							<button data-ripple class="button button_green product__makebetbutton" type="submit">
								Отправить запрос на цену
							</button>
						</form>-->

						<br>

						<a href="{{route('message.read', ['id'=>$product->user_id])}}" class="button button_violet">Написать продавцу</a>

						@if(isset($productSeller))
							{!! $productSeller !!}
						@endif
						
					</div>

				</div>
			</div><!-- /.product -->
			
			<div class="painters">

				<br>

				<h3 class="title title_middle title_basegred title_centered">Ещё работы художника:</h3>

				<div class="onepainter">
					<!--<div class="onepainter__info">
						<div class="onepainter__avatar">
							<img src="{{ painterPic($product->painter->pic) }}" alt="">
						</div>

						<div class="onepainter__textsummary">
							<a class="title title_small card__title" href="{{ route('painters.show', $product->painter->id) }}">{{ $product->painter->full_name }}</a>
							<div class="onepainter__textsummaryinner">
								<div class="text text_grey text_small"><i class="material-icons">location_on</i>{{ $product->painter->country }}</div>
								
								<div class="text text_grey text_small">Работ: {{ count($product->painter->paintings) }}</div>
							</div>
						</div>
					</div>-->

					<br><br>


					
						
					
					<section class="cards">

						@if($real_unknown_painter != '')
							<?php $i = 0; ?>
							@foreach ($product->painter->paintings as $product)
								@if($product->unknown_painter == $real_unknown_painter)
									<?php $i++; ?>
									<div class="card">
										<div class="card__pic">
											<!--<a class="card__piclink" href="{{ route('shop.show', $product->slug) }}">
												<img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
											</a>
											<div class="card__coloredbg" style="opacity: 1;">
												<img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
											</div>-->
											<a class="card__piclink" href="{{ route('shop.show', $product->slug) }}">
												<img data-ripple class="card__img" src="{{ productImage($product->image) }}" alt="">
											</a>
											<div class="card__coloredbg" style="background-image: url({{ productImage($product->image) }}); opacity: 1;"></div>
										</div>
										<div class="card__content">
											<a class="title title_small card__title" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
											
											<div class="text text_grey text_small card__text card__text_painter">{{ $product->unknown_painter }}</div>
											
											<div class="text text_grey text_small card__text">
												@foreach ($product->materials as $material)
													{{ $material->name }}
												@endforeach
											</div>
											<div class="text text_grey text_small card__text">{{ $product->dimension_width }} x {{ $product->dimension_height }} см</div>
											<div class="text text_grey text_small card__text">{{ $product->year }}</div>
										</div>
									</div><!-- /.card -->
								@endif
							@endforeach
							@if($i % 3 == 2)
								<div class="card card_empty"></div>
							@endif
						@else
							@foreach ($product->painter->paintings as $product)
								<div class="card">
									<div class="card__pic">
										<!--<a class="card__piclink" href="{{ route('shop.show', $product->slug) }}">
											<img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
										</a>
										<div class="card__coloredbg" style="opacity: 1;">
											<img data-ripple class="card__img" data-src="{{Voyager::image($product->thumbnail('small'))}}" alt="">
										</div>-->
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
										<div class="text text_grey text_small card__text">{{ $product->dimension_width }} x {{ $product->dimension_height }} см</div>
										<div class="text text_grey text_small card__text">{{ $product->year }}</div>
									</div>
								</div><!-- /.card -->
							@endforeach
							@if(count($product->painter->paintings)%3 == 2)
								<div class="card card_empty"></div>
							@endif
						@endif

						
					</section><!-- /.cards -->
				</div><!--/.onepainter-->

			</div>
		</div><!-- /.container -->
	</main>
@else
    @section('content')
        <h1 class="title title_basegrey title_centered">Доступ только для пользователей со статусом "Дилер"</h1>
        <p class="text text_basegrey">Для получения статуса "Дилер" обратитесь по адресу <a class="text" href="mailto:admin@artmarket24.ru">admin@artmarket24.ru</a></p>
    @endsection
@endif

@endsection




