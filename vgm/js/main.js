"use strict";
jQuery(document).ready(function() {
	//menu
	if (jQuery().superfish) {
		jQuery('ul.sf-menu').superfish({
			delay:       700,
			animation:   {opacity:'show',height:'show'},
			//animation:   {opacity:'show'},
			animationOut: {opacity: 'hide'},
			speed:       'fast',
			disableHI:   false,
			cssArrows:   true,
			autoArrows:  true
		});
	}

	//toTop
	if (jQuery().UItoTop) {
        jQuery().UItoTop({ easingType: 'easeOutQuart' });
    }

	//parallax
	if (jQuery().parallax) {
		jQuery('#land').parallax("50%", 0.1);
		jQuery('#progress').parallax("50%", 0.1);
		jQuery('#belowcontent').parallax("50%", 0.1);
		jQuery('#clients').parallax("50%", 0.1);
		jQuery('#tweets').parallax("50%", 0.1);
	}
	
	//parallax
	if (jQuery().funnyText) {
		$('.funnyText').funnyText({
			speed: 700,
			borderColor: 'transparent',
			activeColor: '#abce6c',
			color: '#fff',
			fontSize: '1.4em',
			direction: 'both'
		});
	}

    //prettyPhoto
    if (jQuery().prettyPhoto) {
	   	jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({
	   		hook: 'data-gal',
			theme: 'facebook' /* light_rounded / dark_rounded / light_square / dark_square / facebook / pp_default*/
	  	});
	}

   	//carousel
   	if (jQuery().carousel) {
		jQuery('.carousel').carousel();
	}

	//single page localscroll and scrollspy
	var navHeight = jQuery('#header').outerHeight(true) + 80;
	jQuery('body').scrollspy({
		target: '.mainmenu_wrap',
		offset: navHeight
	});
	if (jQuery().localScroll) {
		jQuery('#mainmenu, #land').localScroll({
			duration:1900,
			easing:'easeOutQuart',
			offset: -40
		});
	}

	//bx slider
	if (jQuery().bxSlider) {
		jQuery('.bxslider').bxSlider({
			auto: true,
			controls: false,
			pager: false,
		  	mode: 'fade'
		});
	}

	//timeline
	if (jQuery().timelinr) {
		if(jQuery('#timeline').length) {
			jQuery('#timeline').timelinr({
				orientation: 	'vertical',
				issuesSpeed: 	300,
				datesSpeed: 	100,
				arrowKeys: 		'true',
				startAt:		5
			});
		}
	}

	//owl caousel
	if (jQuery().owlCarousel) {
	    jQuery(".owl-carousel").owlCarousel({
	    	navigation : true,
	    	navigationText : false,
	    	pagination : false
	    });

	    jQuery(".team").owlCarousel({
			navigation : true, // Show next and prev buttons
			slideSpeed : 300,
	    	navigationText : false,			
			paginationSpeed : 400,
			pagination: false,
			singleItem:true
		});
	}
    
	//portfolio and horizontal slider animation
	jQuery('.portfolio_item_image > div').css({opacity: 0});
	jQuery('.isotope-item, .horizontal_slider_introimg').hover(
	 	function() {
			jQuery( this ).find('.portfolio_item_image > div').stop().animate({ opacity: 1}, 500, 'easeOutExpo').find('.p-view').toggleClass('moveFromLeft').end().find('.p-link').toggleClass('moveFromRight').end().closest('li').find('.item_title').stop().animate({ opacity: 1}, 500, 'easeOutExpo').delay(200).toggleClass('moveFromBottom');
		}, function() {
			jQuery( this ).find('.portfolio_item_image > div').stop().animate({ opacity: 0}, 300, 'easeOutExpo').find('.p-view').toggleClass('moveFromLeft').end().find('.p-link').toggleClass('moveFromRight').end().closest('li').find('.item_title').stop().animate({ opacity: 0}, 300, 'easeOutExpo').toggleClass('moveFromBottom');;
		}
	);

	//teaser style5 animation
	jQuery('.single_teaser.icons.style5').hover(
	 	function() {
			jQuery( this ).find('i').addClass('moveFromLeft').end().find('h3').addClass('moveFromRight').end().find('p').addClass('moveFromBottom');
		}, function() {
			jQuery( this ).find('i').removeClass('moveFromLeft').end().find('h3').removeClass('moveFromRight').end().find('p').removeClass('moveFromBottom');
		}
	);

	//team thumbnail animation
	// jQuery('.thumbnail').hover(
	//  	function() {
	// 		jQuery( this ).find('.team-social').stop().animate({ opacity: 1}, 600, 'easeOutExpo');
	// 	}, function() {
	// 		jQuery( this ).find('.team-social').stop().animate({ opacity: 0}, 500, 'easeOutExpo');
	// 	}
	// );

   jQuery(".process-container .process-item").hover(function(){
        var numItem = jQuery(this).attr("data-show");
        jQuery(".process_description_wrap>div").hide();
        jQuery(".process_description_" + numItem).stop().show();
   });

	
	
	
	jQuery('#featuresContainer').isotope({
	  // options
	  itemSelector : '.block'
	  //layoutMode : 'fitColumns'
	});

		//animation to elements on scroll
	if (jQuery().appear) {
		// jQuery('.to_animate').appear().css({opacity: 0});
		jQuery('.to_animate').appear().css({'visibility': 'hidden'});
		jQuery('.to_animate').filter(':appeared').each(function(index){
			var self = jQuery(this);
			var animationClass = !self.data('animation') ? 'fadeInUp' : self.data('animation');
			var animationDelay = !self.data('delay') ? 270 : self.data('delay');
			setTimeout(function(){
				self.addClass("animated " + animationClass);
			}, index * animationDelay);
		});

		jQuery('body').on('appear', '.to_animate', function(e, $affected ) {
			jQuery($affected).each(function(index){
				var self = jQuery(this);
				var animationClass = !self.data('animation') ? 'fadeInUp' : self.data('animation');
				var animationDelay = !self.data('delay') ? 270 : self.data('delay');
				setTimeout(function(){
					self.addClass("animated " + animationClass);
				}, index * animationDelay);
			});
		});
	}




});

jQuery(window).load(function(){
	//stick header to top
	if (jQuery().sticky) {
	    jQuery("#header").sticky({ 
	    		topSpacing: 0,
	    		scrollBeforeStick: 20
	    	},
	    	function(){ 
	    		jQuery("#header").stop().animate({opacity:0}, 0).delay(200).stop().animate({opacity:1}, 500);
	    	},
	       	function(){ 
	    		jQuery("#header").stop().animate({opacity:0}, 0).delay(200).stop().animate({opacity:1}, 500);
	    	}
	    );
	}
	

	jQuery("#mainslider > div").flexslider({
		animation: "fade",
		//useCSS: false,
		controlNav: true,   
		//animationLoop: false,
		smoothHeight: true,
		slideshowSpeed:7000,
		animationSpeed:800
	});
	jQuery(".flexslider").flexslider({
		animation: "fade",
		useCSS: false,
		controlNav: false,   
		//animationLoop: false,
		smoothHeight: true,
		slideshowSpeed:5000,
		animationSpeed:800
	});

	

	jQuery('body').delay(1000).scrollspy('refresh');


	//preloader
	jQuery(".preloaderimg").fadeOut();
	jQuery(".preloader").delay(200).fadeOut("slow").delay(200, function(){
		jQuery(this).remove();
	});

});

jQuery(window).resize(function(){
	jQuery("#header").sticky('update');
	jQuery('body').scrollspy('refresh');

	

});

jQuery(window).scroll(function() {

	//circle progress bar
	if (jQuery().easyPieChart) {
		jQuery('.chart').each(function(){
				
			var imagePos = jQuery(this).offset().top;
			var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+600) {

				jQuery(this).easyPieChart({
			        barColor: '#d2316d',
					trackColor: '#aaaaaa',
					scaleColor: false,
					scaleLength: false,
					lineCap: 'butt',
					lineWidth: 7,
					size: 180,
					rotate: 0,
					animate: 2000,
					onStep: function(from, to, percent) {
							jQuery(this.el).find('.percent').text(Math.round(percent));
						}
			    });
			}
		});
	}

});



