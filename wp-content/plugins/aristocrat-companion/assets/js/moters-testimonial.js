(function($) {

	let owlCarousel = function ($scope, $) {
		var $carousel = $scope.find('.slider-active');
		var $sliderDynamicId = '#' + $carousel.attr('id');
		var $countSlide = $carousel.data('countslide');

		if( $countSlide > 1 ){
			$($sliderDynamicId).each( function() {
				$carousel.owlCarousel({
					dots : $carousel.data("dots"),
					nav : $carousel.data("nav"),
					loop : $carousel.data("loop"),
					items : $carousel.data("items"),
					autoplay : $carousel.data("autoplay"),
					autoplayTimeout : $carousel.data("autoplay-timeout"),
					autoplayHoverPause: true,
					navText : ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
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
			});
		}
	};

	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/testimonial.default', owlCarousel);
	});

})(jQuery);