$(function() {

	$(".wrapper").tooltip();


	/* Прокрутка к поисковой выдаче */

	function get_var(var_name){
			var query = window.location.search.substring(1);
			var vars = query.split("&");
			for (var i=0;i<vars.length;i++) {
					var pair = vars[i].split("=");
					if(pair[0] == var_name){return pair[1];}
			}
			return(false);
	}

	var get_variable = get_var("min_price");
	console.log(get_variable);

	if (get_variable !== false) {		
		var scrollToBlock = $('.cardswrapper');
		var heightpage = $(window).height();
		var topel = scrollToBlock.offset().top;
		var heightorder = scrollToBlock.height();
		var positionscroll = topel - heightpage/2 + heightorder/2 - 350;
		$('body,html').animate({scrollTop: positionscroll}, 1000);
	}
	
	/* end of Прокрутка к поисковой выдаче */











	/* Ширина поля с ценой в фильтре */
	var sliderInputs = $('.slider__input');
    
    $.each(sliderInputs, function(index, element){
        $(this).width((($(this).val().length + 1) * 7) + 'px');
        console.log($('[name=min_price]').val());
	});
	/* end of Ширина поля с ценой в фильтре */
	




	$('.footer__toggler i').on('click', function() {
		$('.footer__left .footer__section').slideToggle();
	});

	

	$('.header__toggler i').on('click', function() {
		if($('.topmenu__wrapper').hasClass('topmenu__wrapper_hidden')) {
			$('.main, .footer').hide();
		} else {
			$('.main, .footer').show();
		}
		$('.topmenu__wrapper').toggleClass('topmenu__wrapper_hidden');
		$('.header__toggler i').toggleClass('active');
		$('.header__toggler i').text('menu');
		$('.header__toggler i.active').text('close');
	});











	// СЛАЙДЕР ЦЕН В ФИЛЬТРЕ
	var slider = document.getElementById('slider');
	var slider2 = document.getElementById('slider2');
	var slider3 = document.getElementById('slider3');
	var minimumWidth = document.getElementById('slider-margin-value-min-width').value;
	var maximumWidth = document.getElementById('slider-margin-value-max-width').value;
	var minimumHeight = document.getElementById('slider-margin-value-min-height').value;
	var maximumHeight = document.getElementById('slider-margin-value-max-height').value;
	var minimumYear = document.getElementById('slider-margin-value-min-year').value;
	var maximumYear = document.getElementById('slider-margin-value-max-year').value;

	noUiSlider.create(slider, {
		start: [minimumWidth, maximumWidth],
		connect: true,
		range: {
			'min': parseInt(minimumWidth),
			'max': parseInt(maximumWidth)
		},
		format: wNumb({
			decimals: 0,
			thousand: '',
			postfix: '',
		})
	});

	noUiSlider.create(slider2, {
		start: [minimumHeight, maximumHeight],
		connect: true,
		range: {
			'min': parseInt(minimumHeight),
			'max': parseInt(maximumHeight)
		},
		format: wNumb({
			decimals: 0,
			thousand: '',
			postfix: '',
		})
	});

	noUiSlider.create(slider3, {
		start: [minimumYear, maximumYear],
		connect: true,
		range: {
			'min': parseInt(minimumYear),
			'max': parseInt(maximumYear)
		},
		format: wNumb({
			decimals: 0,
			thousand: '',
			postfix: '',
		})
	});

	var widthMin = document.getElementById('slider-margin-value-min-width'),
		widthMax = document.getElementById('slider-margin-value-max-width');
	slider.noUiSlider.on('update', function ( values, handle ) {
		if ( handle ) {
			widthMax.value = values[handle];
		} else {
			widthMin.value = values[handle];
		}
	});

	var heightMin = document.getElementById('slider-margin-value-min-height'),
		heightMax = document.getElementById('slider-margin-value-max-height');
	slider2.noUiSlider.on('update', function ( values, handle ) {
		if ( handle ) {
			heightMax.value = values[handle];
		} else {
			heightMin.value = values[handle];
		}
	});

	var yearMin = document.getElementById('slider-margin-value-min-year'),
		yearMax = document.getElementById('slider-margin-value-max-year');
	slider3.noUiSlider.on('update', function ( values, handle ) {
		if ( handle ) {
			yearMax.value = values[handle];
		} else {
			yearMin.value = values[handle];
		}
	});
	// end of СЛАЙДЕР ЦЕН В ФИЛЬТРЕ






	$('.filter__title').on('click', function() {
		$(this).next('.filter__sectioncontent').slideToggle();
		var toggler = $(this).find('i');

		if(toggler.text() == 'remove') {
			toggler.text('add');
		} else {
			toggler.text('remove');
		}
	});

	$('.filterToggler').on('click', function(e) {
		e.preventDefault();

		if (window.matchMedia('(min-width: 992px)').matches) {
			$('.card').toggleClass('card_twoinrow')
		}

		if($(this).text() == 'ПОКАЗАТЬ ФИЛЬТРЫ') {
			$(this).text('СКРЫТЬ ФИЛЬТРЫ')
		} else {
			$(this).text('ПОКАЗАТЬ ФИЛЬТРЫ')
		}

		if($('.filter').hasClass('filter_uncollapsed')) {
			$('.filter > *').hide();
			$('.filter').css('padding', '0').css('margin-right', '0');
		} else {
			$('.filter > *').show();
			$('.filter').css('padding', '40px').css('margin-right', '20px');
		}

		$('.filter').toggleClass('filter_uncollapsed');

		changeCardMargin();

	});

	$(window).resize(function(){
	  	changeCardMargin();
	});
	
	function changeCardMargin() {
		setTimeout(function() {
			console.log($('.cards').width());
			if($('.cards').width() < 1160 && $('.cards').width() > 640) {
				$('.cards:first-child .card:nth-child(3n)').css('margin-right','15px');
			} else {
				$('.cards:first-child .card:nth-child(3n)').css('margin-right','0');
			}
		}, 500);
	}

	$('.productGallery__thumbnail img').on('click', function() {
		alert(123);
		console.log($(this).attr('src'));
		$('.productGallery__mainpic img').attr('src', $(this + ' img').attr('src'));
	});

});