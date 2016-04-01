
var j = jQuery.noConflict();

(function($){

	j(document).on('ready',function(){


		//>>> PORTADA >>>>>>>>>

		///################### CAROUSEL HOME ######################///
		var carousel_home = j('#carousel-home-bxslider');

		carousel_home.bxSlider({
			captions: true,
			pager   : false,
		});

		///################### GALERIA FANCYBOX ######################///
		j("a.grouped_elements").fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	600, 
			'speedOut'		:	200, 
			'overlayShow'	:	false
		});





	});

})(jQuery)