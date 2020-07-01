(function ($) {

    'use strict';

	/*------------------------------------
		Mobile Menu
	--------------------------------------*/
	$('#mobile-menu-active').metisMenu();

	$(".hamburger-menu > a").on("click", function (e) {
		e.preventDefault();
		$(".slide-bar").toggleClass("show");
		$("body").addClass("on-side");
		$('.body-overlay').addClass('active');
		$(this).addClass('active');
	});

	$(".close-mobile-menu > a").on("click", function (e) {
		e.preventDefault();
		$(".slide-bar").removeClass("show");
		$("body").removeClass("on-side");
		$('.body-overlay').removeClass('active');
	});

	$('.body-overlay').on('click', function () {
		$(this).removeClass('active');
		$(".slide-bar").removeClass("show");
		$("body").removeClass("on-side");
	});

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

	$('#vidBox').VideoPopUp({
		opener: "video-popup",
		idvideo: "demo"
	});

	/*------------------------------------
		Slider
	--------------------------------------*/
	if (jQuery(".home-slider").length > 0) {

		let carousel_slider = $(".home-slider");
		carousel_slider.owlCarousel({
			items: 1,
			loop: true,
			nav: true,
			navText: ['<i class="fal fa-chevron-left"></i>','<i class="fal fa-chevron-right"></i>'],
			dots: true,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			autoplay: true,
			autoplayTimeout: 10000,
		});

		carousel_slider.on('translate.owl.carousel', function () {
			let slideLayer = $("[data-animation]");
			slideLayer.each(function () {
				let anim_name = $(this).data('animation');
				$(this).removeClass('animated ' + anim_name).css('opacity', '0');
			});
		});

		carousel_slider.on('translated.owl.carousel', function () {
			let slideLayer = carousel_slider.find('.single-slide').find("[data-animation]");
			slideLayer.each(function () {
				let anim_name = $(this).data('animation');
				$(this).addClass('animated ' + anim_name).css('opacity', '1');
			});
		});

		$("[data-delay]").each(function () {
			let anim_del = $(this).data('delay');
			$(this).css('animation-delay', anim_del);
		});

		$("[data-duration]").each(function () {
			let anim_dur = $(this).data('duration');
			$(this).css('animation-duration', anim_dur);
		});
	}

	if (jQuery(".clint-slider").length > 0){
		$(".clint-slider").owlCarousel({
			items: 5,
			loop: true,
			nav: false,
			dots: false,
			autoplay: true,
			autoplayTimeout: 10000,
			center: true,

			responsive: {
				320: {
					items: 2,
				},
				768: {
					items: 3,
				},
				1024: {
					items: 4,
				},
				1200: {
					items: 5,
				},
			},

		});
	}


})(jQuery);
