(function ($) {
	'use strict';

	let SliderWidgetHandler = function ($scope, $) {
		let $carousel = $scope.find('.slider-active');
		let $sliderDynamicId = '#' + $carousel.attr('id');
		let $countSlide = $carousel.data('countslide');

		if ($countSlide > 1) {
			$($sliderDynamicId).each(function () {
				$carousel.owlCarousel({
					dots: $carousel.data("dots"),
					nav: $carousel.data("nav"),
					loop: $carousel.data("loop"),
					autoplay: $carousel.data("autoplay"),
					autoplayTimeout: $carousel.data("autoplay-timeout"),
					items: 1,
					autoplayHoverPause: true,
					navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
				});
			});
			$carousel.on('translate.owl.carousel', function () {
				let slideLayer = $("[data-animation]");
				slideLayer.each(function () {
					let anim_name = $(this).data('animation');
					$(this).removeClass('animated ' + anim_name).css('opacity', '0');
				});
			});

			$carousel.on('translated.owl.carousel', function () {
				let slideLayer = $carousel.find('.single-slide').find("[data-animation]");
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
	};

	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/slider.default', SliderWidgetHandler);
	});

})(jQuery);