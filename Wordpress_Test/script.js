(function($) {
	
	"use strict";
	
	
	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(500).fadeOut(500);
		}
	}
	
	
	//Update Header Style + Scroll to Top
	function headerStyle() {
		if($('.main-header').length){
			var windowpos = $(window).scrollTop();
			var topHeight = $('.default-banner').innerHeight() + $('.main-header').innerHeight();
			if (windowpos >= topHeight) {
				$('.main-header').addClass('header-fixed');
				$('#side-navigation').addClass('scrolled');
				$('.scroll-to-top').fadeIn(300);
			} else {
				$('.main-header').removeClass('header-fixed');
				$('#side-navigation').removeClass('scrolled');
				$('.scroll-to-top').fadeOut(300);
			}
		}
	}
	
	
	//Update Sidebar Style / Visible on small Screens
	function sideBar() {
		if($('#side-navigation').length){
			var windowWidth = $(window).width();
			if (windowWidth <= 790) {
				$('#side-navigation').addClass('is-visible');
			} else {
				$('#side-navigation').removeClass('is-visible');
			}
		}
	}
	
	
	//Update Banner to Fullscreen
	function videoBg() {
		if($('.window-size').length){
			var defBannerHeight = $('.window-size .auto-container').innerHeight();
			var windowHeight = $(window).height();
			if (windowHeight >= defBannerHeight) {
				$('.window-size').css({'height':windowHeight,'min-height':windowHeight});
				$('.window-size .auto-container').css({'position':'absolute','height':windowHeight,'min-height':windowHeight});
			} else {
				$('.window-size').css({'height':'auto','min-height':windowHeight});
				$('.window-size .auto-container').css({'min-height':windowHeight,'height':windowHeight});
			}
		}
	}
	
	//Play Video when page is loaded
	function playBannerVideo() {
		if($('.banner-video').length){
			
			$('.banner-video').get(0).play();
		}
	}
	
	//Parallax Scroll
	if($('.parallax-background .window-size').length){
		$('.parallax-background .window-size').parallax("20%", 0.4);
	}
	
	
	//Sidebar Submenu Dropdown Toggle
	if($('#side-navigation li.dropdown .submenu').length){
		
		$('#side-navigation .toggle-nav').on('click', function() {
			$('#side-navigation').toggleClass('toggled-sidebar');
		});
			
		$('#side-navigation li.dropdown').append('<div class="dropdown-btn"></div>');
		
		//Dropdown Button
		$('#side-navigation li.dropdown .dropdown-btn').on('click', function() {
			$(this).prev('.submenu').slideToggle(500);
		});
	}
	
	//Add Scroll Bar To Sidebar
	if($('#side-navigation .sidebar-inner').length){
		$("#side-navigation .sidebar-inner").mCustomScrollbar({
			axis:"y",
			autoExpandScrollbar:false
		});
	}
	
	
	//Main Slider Style One
	if($('.main-slider.style-one').length){

		jQuery('.main-slider.style-one .tp-banner').show().revolution({
		  delay:7000,
		  startwidth:1200,
		  startheight:700,
		  hideThumbs:600,
	
		  thumbWidth:80,
		  thumbHeight:50,
		  thumbAmount:5,
	
		  navigationType:"bullet",
		  navigationArrows:"0",
		  navigationStyle:"preview4",
	
		  touchenabled:"on",
		  onHoverStop:"off",
	
		  swipe_velocity: 0.7,
		  swipe_min_touches: 1,
		  swipe_max_touches: 1,
		  drag_block_vertical: false,
	
		  parallax:"mouse",
		  parallaxBgFreeze:"on",
		  parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
	
		  keyboardNavigation:"on",
	
		  navigationHAlign:"center",
		  navigationVAlign:"bottom",
		  navigationHOffset:0,
		  navigationVOffset:20,
	
		  soloArrowLeftHalign:"left",
		  soloArrowLeftValign:"center",
		  soloArrowLeftHOffset:20,
		  soloArrowLeftVOffset:0,
	
		  soloArrowRightHalign:"right",
		  soloArrowRightValign:"center",
		  soloArrowRightHOffset:20,
		  soloArrowRightVOffset:0,
	
		  shadow:0,
		  fullWidth:"on",
		  fullScreen:"off",
	
		  spinner:"spinner4",
	
		  stopLoop:"off",
		  stopAfterLoops:-1,
		  stopAtSlide:-1,
	
		  shuffle:"off",
	
		  autoHeight:"off",
		  forceFullWidth:"on",
	
		  hideThumbsOnMobile:"on",
		  hideNavDelayOnMobile:1500,
		  hideBulletsOnMobile:"on",
		  hideArrowsOnMobile:"off",
		  hideThumbsUnderResolution:0,
	
		  hideSliderAtLimit:0,
		  hideCaptionAtLimit:0,
		  hideAllCaptionAtLilmit:0,
		  startWithSlide:0,
		  videoJsPath:"",
		  fullScreenOffsetContainer: ""
	  });

		
	}
	
	//Main Slider Style Two / Fullscreen
	if($('.main-slider.style-two').length){

		jQuery('.main-slider.style-two .tp-banner').show().revolution({
		 
		  delay:10000,
		  startwidth:1200,
		  startheight:620,
		  hideThumbs:600,
	
		  thumbWidth:80,
		  thumbHeight:50,
		  thumbAmount:5,
	
		  navigationType:"bullet",
		  navigationArrows:"0",
		  navigationStyle:"preview4",
	
		  touchenabled:"on",
		  onHoverStop:"off",
	
		  swipe_velocity: 0.7,
		  swipe_min_touches: 1,
		  swipe_max_touches: 1,
		  drag_block_vertical: false,
	
		  parallax:"scroll",
		  parallaxBgFreeze:"off",
		  parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
	
		  keyboardNavigation:"on",
	
		  navigationHAlign:"center",
		  navigationVAlign:"bottom",
		  navigationHOffset:0,
		  navigationVOffset:20,
	
		  soloArrowLeftHalign:"left",
		  soloArrowLeftValign:"center",
		  soloArrowLeftHOffset:20,
		  soloArrowLeftVOffset:0,
	
		  soloArrowRightHalign:"right",
		  soloArrowRightValign:"center",
		  soloArrowRightHOffset:20,
		  soloArrowRightVOffset:0,
	
		  shadow:0,
		  fullWidth:"on",
		  fullScreen:"on",
	
		  spinner:"spinner4",
	
		  stopLoop:"off",
		  stopAfterLoops:-1,
		  stopAtSlide:-1,
	
		  shuffle:"off",
	
		  autoHeight:"off",
		  forceFullWidth:"on",
	
		  hideThumbsOnMobile:"on",
		  hideNavDelayOnMobile:1500,
		  hideBulletsOnMobile:"on",
		  hideArrowsOnMobile:"off",
		  hideThumbsUnderResolution:0,
	
		  hideSliderAtLimit:0,
		  hideCaptionAtLimit:0,
		  hideAllCaptionAtLilmit:0,
		  startWithSlide:0,
		  videoJsPath:"",
		  fullScreenOffsetContainer: ""
	  });

		
	}
	
	
	//Accordions
	if($('.accordion-box').length){
		$('.accordion-box .acc-btn').on('click', function() {
			var target = $($(this).next('.acc-content'));
			$(this).toggleClass('active');
			$(target).slideToggle(300);
		});
	}
	
	
	//Portfolio Filter
	if($('.filter-list').length){
		$('.filter-list').mixitup({});
	}
	
	
	//LightBox / Fancybox
	if($('.lightbox-image').length) {
		$('.lightbox-image').fancybox();
	}
	
	
	//Testimonials Slider
	if($('#testimonials-one').length){
		
		var slider = new MasterSlider();
		slider.control('bullets');  
    	slider.control('bullets',{autohide:false});
		slider.setup('testimonials-one' , {
			autoplay:true,
			loop:true,
			width:120,
			height:120,
			speed:20,
			view:'wave',
			preload:0,
			space:100,
			autoHeight:true,
			wheel:true,
			filters: {
            grayscale: 1
        },
			viewOptions:{centerSpace:1.6}
		});
		slider.control('slideinfo',{insertTo:'#staff-info'});
		
	}
	
	
	//Client Logos Slider
	if ($('.client-logos .slider').length) {
		$('.client-logos .slider').owlCarousel({
			loop:true,
			margin:10,
			nav:false,
			autoplay: 3000,
			smartSpeed:500,
			responsive:{
				0:{
					items:2
				},
				600:{
					items:3
				},
				800:{
					items:4
				},
				1000:{
					items:5
				},
				1100:{
					items:6
				}
			}
		});    		
	}
	
	//Products Slider
	if ($('.product-carousel .prod-slider').length) {
		$('.product-carousel .prod-slider').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			autoplay: 3000,
			smartSpeed:500,
			autoplayHoverPause:true,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				800:{
					items:2
				},
				1000:{
					items:2
				},
				1100:{
					items:3
				}
			}
		});    		
	}
	
	//Image Carousel Slider
	if ($('.image-carousel .slider').length) {
		$('.image-carousel .slider').owlCarousel({
			  loop:true,
			  navigation : false,
			  autoplayHoverPause:true,
			  smartSpeed:500,
			  autoplay: 5000,
			  responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1024:{
					items:1
				},
				1200:{
					items:1
				},
				1400:{
					items:1
				}
			}
		});    		
	}
	
	//Tabs Box
	if($('.tabs-box .tab-btn').length){
		$('.tabs-box .tab-btn').on('click', function(e) {
			e.preventDefault();
			var target = $($(this).attr('href'));
			$('.tabs-box .tab-btn').removeClass('active-btn');
			$(this).addClass('active-btn');
			$('.tabs-box .tab').fadeOut(0);
			$('.tabs-box .tab').removeClass('active-tab');
			$(target).fadeIn(500);
			$(target).addClass('active-tab');
			var windowWidth = $(window).width();
			if (windowWidth <= 767) {
				$('html, body').animate({
				   scrollTop: $('.tabs-box .tabs-container').offset().top-80
				 }, 1000);
			}
		});
		
	}
	
	
	//Basic Carousel Slider
	if ($('.basic-carousel .slider').length) {
		$('.basic-carousel .slider').owlCarousel({
			items: 1,
			loop:true,
			margin:0,
			nav:true,
			autoplay: 3000,
			smartSpeed:750
		});    		
	}
	
	//Gallery Masonary
	function adjustPosts() {
		if($('.masonry-gallery').length){
	
			$('.items-container').isotope({
			  itemSelector: '.item',
			  // layout mode options
			  masonry: {
				columnWidth : 0
			  }
			});
		}
	}
	
	//Price Range Filter
	if($('.range-slider-price').length){

		var priceRange = document.getElementById('range-slider-price');

		noUiSlider.create(priceRange, {
			start: [ 10, 1000 ],
			limit: 1000,
			behaviour: 'drag',
			connect: true,
			range: {
				'min': 10,
				'max': 1000
			}
		});

		var limitFieldMin = document.getElementById('min-value-rangeslider');
		var limitFieldMax = document.getElementById('max-value-rangeslider');
		
		priceRange.noUiSlider.on('update', function( values, handle ){
			(handle ? limitFieldMax : limitFieldMin).innerHTML = values[handle];
		});
	}
	
	
	//Shop Page Grida and Lis Layout
	if($('.shop-page .layout-btn').length){
		
		$('.shop-page .list-layout').on('click', function(e) {
			e.preventDefault();
			$('.shop-page .layout-btn').removeClass('active');
			$(this).addClass('active');
			$('.shop-page .shop-items').removeClass('grid-layout');
			$('.shop-page .shop-items').addClass('list-view');
		});
		
		$('.shop-page .grid-layout').on('click', function(e) {
			e.preventDefault();
			$('.shop-page .layout-btn').removeClass('active');
			$(this).addClass('active');
			$('.shop-page .shop-items').removeClass('list-view');
			$('.shop-page .shop-items').addClass('grid-layout');
		});
		
	}
	
	
	// Magnific Popup Options
	if($('.magnific-popup').length){
		$('.magnific-popup').magnificPopup({ 
			disableOn: 0,
			closeOnBgClick : true,
			showCloseBtn : true,
			closeBtnInside:true,
			enableEscapeKey :true
		
		});
	}
	
	
	// Fact Counter
	function factCounter() {
		if($('.fact-counter').length){
			$('.counter-column.animated').each(function() {
		
				var $t = $(this),
					n = $t.find(".count-text").attr("data-stop"),
					r = parseInt($t.find(".count-text").attr("data-speed"), 10);
					
				if (!$t.hasClass("counted")) {
					$t.addClass("counted");
					$({
						countNum: $t.find(".count-text").text()
					}).animate({
						countNum: n
					}, {
						duration: r,
						easing: "linear",
						step: function() {
							$t.find(".count-text").text(Math.floor(this.countNum));
						},
						complete: function() {
							$t.find(".count-text").text(this.countNum);
						}
					});
				}
				
			});
		}
	}
	
	
	//Full Width Masonary with Filters
	function enableMasonry() {
		if($('.masonry-gallery.with-filters').length){
	
			var winDow = $(window);
			// Needed variables
			var $container=$('.items-container');
			var $filter=$('.masonry-filter');
	
			$container.isotope({
				filter:'*',
				layoutMode:'masonry',
				animationOptions:{
					duration:1000,
					easing:'linear'
				}
			});
			
	
			// Isotope Filter 
			$filter.find('a').on('click', function(){
				var selector = $(this).attr('data-filter');
	
				try {
					$container.isotope({ 
						filter	: selector,
						animationOptions: {
							duration: 1000,
							easing	: 'linear',
							queue	: false,
						}
					});
				} catch(err) {
	
				}
				return false;
			});
	
	
			winDow.bind('resize', function(){
				var selector = $filter.find('a.active').attr('data-filter');

				$container.isotope({ 
					filter	: selector,
					animationOptions: {
						duration: 1000,
						easing	: 'linear',
						queue	: false,
					}
				});
			});
	
	
			var filterItemA	= $('.masonry-filter li a');
	
			filterItemA.on('click', function(){
				var $this = $(this);
				if ( !$this.hasClass('active')) {
					filterItemA.removeClass('active');
					$this.addClass('active');
				}
			});
		}
	}
	
	
	//Contact Form Validation
	if($('#contact-form').length){
		$('#contact-form').validate({ // initialize the plugin
			rules: {
				firstname: {
					required: true
				},
				lastname: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				subject: {
					required: true
				},
				message: {
					required: true
				}
			}
		});
	}
	
	
	// Google Map Settings
	if($('#map-location').length){
		var map;
		 map = new GMaps({
			el: '#map-location',
			zoom: 17,
			scrollwheel:false,
			//Set Latitude and Longitude Here
			lat: -37.817085,
			lng: 144.955631
		  });
		  
		  //Add map Marker
		  map.addMarker({
			lat: -37.817085,
			lng: 144.955631,
			infoWindow: {
			  content: '<p><strong>Envato</strong><br>Melbourne VIC 3000, Australia</p>'
			}
		 
		});
	}
	
	
	// Scroll to top
	if($('.scroll-to-top').length){
		$(".scroll-to-top").on('click', function() {
		   // animate
		   $('html, body').animate({
			   scrollTop: $('html, body').offset().top
			 }, 1000);
	
		});
	}
	
	
	// Elements Animation
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}

/* ==========================================================================
   When document is ready, do
   ========================================================================== */
   
	$(document).on('ready', function() {
		headerStyle();
		sideBar();
		factCounter();
		videoBg();
	});

/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */
	
	$(window).on('scroll', function() {
		headerStyle();
		factCounter();
	});
	
/* ==========================================================================
   When document is loading, do
   ========================================================================== */
	
	$(window).on('load', function() {
		handlePreloader();
		adjustPosts();
		enableMasonry();
		videoBg();
		playBannerVideo();
	});
	
/* ==========================================================================
   When Window is Resizing, do
   ========================================================================== */
	
	$(window).on('resize', function() {
		sideBar();
		videoBg();
	});
	
})(window.jQuery);