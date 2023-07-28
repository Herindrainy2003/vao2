(function ($) {
    "use strict";

    jQuery(document).ready(function ($) {

		jQuery(".header-slider").owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            nav: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            autoplay: false,
            autoplayTimeout: 3000,
            smartSpeed: 250
        });
		
		jQuery(".org-content").owlCarousel({
            loop: true,
            dots: true,
			margin: 20,
            nav: false,
            autoplay: false,
            autoplayTimeout: 3000,
            smartSpeed: 250,
			responsive: {
				300: {
					items: 1
					},
				768: {
					items: 2
					},
				992: {
					items: 3
					}
				}
        });        
	});


}(jQuery));