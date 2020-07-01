(function ($) {

	'use strict';

	/*------------------------------------
		Mobile Menu
	--------------------------------------*/

	/*-------------------------------------------
	    Sticky Header
	--------------------------------------------- */

	let win = $(window);
	let sticky_id = $(".header-area");
	win.on('scroll', function () {
		let scroll = win.scrollTop();
		if (scroll < 245) {
			sticky_id.removeClass("sticky-header");
		} else {
			sticky_id.addClass("sticky-header");
		}
	});


	/*------------------------------------
        Overlay Close
	--------------------------------------*/
	$(window).scroll(function () {
		if ($(this).scrollTop() !== 0) {
			$('#scrollUp').fadeIn();
		} else {
			$('#scrollUp').fadeOut();
		}
	});

	$('#scrollUp').on('click', function () {
		$("html, body").animate({scrollTop: 0}, 600);
		return false;
	});

	/*------------------------------------
        data-background
	--------------------------------------*/
	$("[data-background]").each(function () {
		$(this).css("background-image", "url(" + $(this).attr("data-background") + ")");
	});

	/*------------------------------------
        img popup
	--------------------------------------*/
	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		}
	});

	/*------------------------------------
        video popup
	--------------------------------------*/
	$('.popup-video').magnificPopup({
		type: 'iframe'
	});

	/*------------------------------------
		Slider
	--------------------------------------*/
	// if (jQuery(".home-slider").length > 0) {
	//
	// 	let carousel_slider = $(".home-slider");
	// 	carousel_slider.owlCarousel({
	// 		items: 1,
	// 		loop: true,
	// 		nav: false,
	// 		navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
	// 		dots: true,
	// 		animateOut: 'fadeOut',
	// 		animateIn: 'fadeIn',
	// 		autoplay: true,
	// 		autoplayTimeout: 10000,
	// 	});
	//
	// 	carousel_slider.on('translate.owl.carousel', function () {
	// 		let slideLayer = $("[data-animation]");
	// 		slideLayer.each(function () {
	// 			let anim_name = $(this).data('animation');
	// 			$(this).removeClass('animated ' + anim_name).css('opacity', '0');
	// 		});
	// 	});
	//
	// 	carousel_slider.on('translated.owl.carousel', function () {
	// 		let slideLayer = carousel_slider.find('.single-slide').find("[data-animation]");
	// 		slideLayer.each(function () {
	// 			let anim_name = $(this).data('animation');
	// 			$(this).addClass('animated ' + anim_name).css('opacity', '1');
	// 		});
	// 	});
	//
	// 	$("[data-delay]").each(function () {
	// 		let anim_del = $(this).data('delay');
	// 		$(this).css('animation-delay', anim_del);
	// 	});
	//
	// 	$("[data-duration]").each(function () {
	// 		let anim_dur = $(this).data('duration');
	// 		$(this).css('animation-duration', anim_dur);
	// 	});
	// }

	// if (jQuery(".brand-slider").length > 0) {
	// 	$(".brand-slider").owlCarousel({
	// 		items: 6,
	// 		loop: true,
	// 		nav: false,
	// 		dots: false,
	// 		autoplay: true,
	// 		autoplayTimeout: 10000,
	// 		margin:30,
	//
	// 		responsive: {
	// 			320: {
	// 				items: 2,
	// 			},
	// 			768: {
	// 				items: 3,
	// 			},
	// 			1024: {
	// 				items: 4,
	// 			},
	// 			1200: {
	// 				items: 6,
	// 			},
	// 		},
	//
	// 	});
	// }
	//
	// if (jQuery(".gallery-slider").length > 0) {
	// 	$(".gallery-slider").owlCarousel({
	// 		items: 3,
	// 		loop: true,
	// 		nav: false,
	// 		dots: true,
	// 		autoplay: true,
	// 		autoplayTimeout: 10000,
	// 		margin:30,
	//
	// 		responsive: {
	// 			320: {
	// 				items: 1,
	// 			},
	// 			768: {
	// 				items: 2,
	// 			},
	// 			1024: {
	// 				items: 3,
	// 			},
	// 			1200: {
	// 				items: 3,
	// 			},
	// 		},
	//
	// 	});
	// }

	/*------------------------------------
        Testimonial Slider
	--------------------------------------*/
	if (jQuery(".testimonial-slider").length > 0) {
		$(".testimonial-slider").owlCarousel({
			items: 2,
			margin: 15,
			loop: true,
			nav: false,
			dots: true,
			autoplay: false,
			autoplayTimeout: 10000,
			responsive: {
				320: {
					items: 1,
				},
				768: {
					items: 1,
				},
				992: {
					items: 2,
				}
			}
		});
	}



})(jQuery);
