jQuery(document).ready(function(){

	"use strict";

	$('.slider-overlay').ripples({
	  dropRadius: 40,
	  perturbance: 0.1
	});


	$(".typing").typed({
			strings: ["We Are <strong class='sparky'>SPARKY.</strong>", "We Are <strong class='dev'>Awesome Developers.</strong>"],
			typeSpeed: 0,
			loop:true
		});

	$(window).scroll(function(){

		var top = $(window).scrollTop();

		if(top>70)
		{
			$('header').addClass('transparent-bg');
		}

		else
		{
			if($('header').hasClass('transparent-bg'))
			{
				$('header').removeClass('transparent-bg');
			}
		}

	});

});