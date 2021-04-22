jQuery(document).ready(function ($) {
    "use strict";
    var $grid;

	$('.timepickerMinute').timepicker();

    /* Isotope */
    if (typeof $.fn.isotope == 'function') {
        var $parent = $('.rt-isotope-wrapper'),
            $isotope;
        var blogGallerIso = $(".rt-isotope-content", $parent).imagesLoaded(function () {
            $isotope = $(".rt-isotope-content", $parent).isotope({
                filter: "*",
                transitionDuration: "1s",
                hiddenStyle: {
                    opacity: 0,
                    transform: "scale(0.001)"
                },
                visibleStyle: {
                    transform: "scale(1)",
                    opacity: 1
                }
            });
			$('.rt-isotope-tab a').on('click', function () {
				console.log('click');
				var $parent = $(this).closest('.rt-isotope-wrapper'),
					selector = $(this).attr('data-filter');

				$parent.find('.rt-isotope-tab .current').removeClass('current');
				$(this).addClass('current');
				$isotope.isotope({
					filter: selector
				});
				
				return false;
			});

			$(".hide-all .rt-portfolio-tab a").first().trigger('click');
        }); 
    }

    /*-------------------------------------
    Theia Side Bar
    -------------------------------------*/
    if (typeof ($.fn.theiaStickySidebar) !== "undefined") {
        $('.fixed-side-bar .fixed-bar-coloum').theiaStickySidebar({	'additionalMarginTop': 120	});
		$('.shop-page .fixed-bar-coloum').theiaStickySidebar({ 'additionalMarginTop': 120 });
	}

    //Header Search
    $('a[href="#header-search"]').on("click", function (event) {
        event.preventDefault();
        $("#header-search").addClass("open");
        $('#header-search > form > input[type="search"]').focus();
    });

    $("#header-search, #header-search button.close").on("click keyup", function (
        event
    ) {
        if (
            event.target === this ||
            event.target.className === "close" ||
            event.keyCode === 27
        ) {
            $(this).removeClass("open");
        }
    });
	
	// masonary
    if ($('#primary').find('div.rt-masonry-grid').length !== 0) {
        var grid = $('.rt-masonry-grid').imagesLoaded(function () {
            $grid = grid.isotope({
                // set itemSelector so .grid-sizer is not used in layout
                itemSelector: '.rt-grid-item',
				percentPosition: true,
                isAnimated: true,
                masonry: {
                    columnWidth: '.rt-grid-item',
                    horizontalOrder: true
                },
				animationOptions: {
                    duration: 700,
                    easing: 'linear',
                    queue: false
                }
            });
        });
    }

    /* Scroll to top */
    $('.scrollToTop').on('click', function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

    /* Fixing for hover effect at IOS */
    $('*').on('touchstart', function () {
        $(this).trigger('hover');
    }).on('touchend', function () {
        $(this).trigger('hover');
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
            $("body").addClass("not-top");
            $("body").removeClass("top");
        } else {
            $('.scrollToTop').fadeOut();
            $("body").addClass("top");
            $("body").removeClass("not-top");
        }
    });

    /* Nav smooth scroll */
    $('#site-navigation .menu').onePageNav({
        extraOffset: clenixObj.extraOffset,
    });

    /* Search Box */
    $(".search-box-area").on('click', '.search-button, .search-close', function (event) {
        event.preventDefault();
        if ($('.search-text').hasClass('active')) {
            $('.search-text, .search-close').removeClass('active');
        } else {
            $('.search-text, .search-close').addClass('active');
        }
        return false;
    });
	
	/* Header Right Menu */
	var menuArea = $('.additional-menu-area');
    menuArea.on('click', '.side-menu-trigger', function (e) {
    	e.preventDefault();
		var self = $(this);
		if(self.hasClass('side-menu-open')){
			$('.sidenav').css('transform', 'translateX(0%)');
			if(!menuArea.find('> .rt-cover').length){
				menuArea.append("<div class='rt-cover'></div>");
			}
			self.removeClass('side-menu-open').addClass('side-menu-close');
		}
    });
	
	function closeMenuArea(){
		var trigger = $('.side-menu-trigger', menuArea);
		trigger.removeClass('side-menu-close').addClass('side-menu-open');
		if(menuArea.find('> .rt-cover').length){
			menuArea.find('> .rt-cover').remove();
		}
		$('.sidenav').css('transform', 'translateX(100%)');
	}
    menuArea.on('click', '.closebtn', function (e) {
        e.preventDefault();
		closeMenuArea();
    });
	
	$(document).on('click', '.rt-cover', function(){
		closeMenuArea();
	});
	
	$('#site-navigation nav , .fixed-bar-coloum-menu > div > div').meanmenu({
        meanMenuContainer: '#meanmenu',
        meanScreenWidth: clenixObj.meanWidth,
        removeElements: "#masthead",
        siteLogo: clenixObj.siteLogo
    });

    /* Sticky Menu */
    if (clenixObj.stickyMenu == 1 || clenixObj.stickyMenu == 'on') {

        $(window).on('scroll', function () {

            var s = $('#sticker'),
                w = $('body'),
                h = s.outerHeight(),
                windowpos = $(window).scrollTop(),
                windowWidth = $(window).width(),
                h1 = s.parent('#header-1'),
                h2 = s.parent('#header-2'),
                h3 = s.parent('#header-3'),
                h4 = s.parent('#header-4'),
                h5 = s.parent('#header-5'),
                h6 = s.parent('#header-6'),
				h7 = s.parent('#header-7'),
				h8 = s.parent('#header-8'),
                h1he = parseInt(s.parent('#header-1').outerHeight()) + 300,
                h2he = parseInt(s.parent('#header-2').outerHeight()) + 200,
                h3he = parseInt(s.parent('#header-3').outerHeight()) + 200,
                h4he = parseInt(s.parent('#header-4').outerHeight()) + 200,
                h5he = parseInt(s.parent('#header-5').outerHeight()) + 200,
                h6he = parseInt(s.parent('#header-6').outerHeight()) + 200,
				h7he = parseInt(s.parent('#header-7').outerHeight()) + 200,
				h8he = parseInt(s.parent('#header-8').outerHeight()) + 200,
                h1H = h1.find('.header-top-bar').outerHeight(),
                topBar = s.prev('.header-top-bar'),
                topBarP = w.hasClass('has-topbar'),
                topAdP = $('body .ad-header-top'),
                tempMenu;
            if (windowWidth > 991) {

                w.css('padding-top', '');
                var topBarH, topAdH, totalheight, mBottom, headerFixed = 0;
                topAdH = topAdP.outerHeight();
                /*header 1 */
                if (h1.length || h2.length || h3.length || h4.length || h5.length || h6.length || h7.length || h8.length) {

                    // only top bar
                    if ((topBarP == true) && (topAdH == null)) {
                        topBarH = topBar.outerHeight() + 210;
                        headerFixed = $('.masthead-container').outerHeight() + 210;
                        if (windowpos >= headerFixed) {
                            if (h1.length || h2.length || h3.length || h4.length || h5.length || h6.length || h7.length || h8.length) {
                                s.addClass('stickp');
                                w.removeClass("stickh");
                                w.addClass("non-stickh");
                            }
                        } else {
                            s.removeClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        }

                    } else {
                        // no topbar now
                        if (windowpos < parseInt(h1he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h2he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h3he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h4he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h5he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h6he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h7he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h8he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else {
                            s.removeClass('stickp');
                            w.removeClass("stickh");
                            w.addClass("non-stickh");
                        }

                        var masthead = $('#masthead');
                        if (masthead.hasClass('header-fixed')) {
                            h1.css('top', '-' + topBarH + 'px');
                            h2.css('top', '-' + topBarH + 'px');
                            h3.css('top', '-' + topBarH + 'px');
                            h4.css('top', '-' + topBarH + 'px');
                            h5.css('top', '-' + topBarH + 'px');
                            h6.css('top', '-' + topBarH + 'px');
							h7.css('top', '-' + topBarH + 'px');
							h8.css('top', '-' + topBarH + 'px');
                        }
                    }

                    // ad and top bar
                    if ((topBarP == true) && (topAdH != null)) {
                        headerFixed = topBar.outerHeight();

                        totalheight = headerFixed + topAdH;

                        if (windowpos <= topAdH || windowpos <= headerFixed) {
                            if (h1.hasClass('header-fixed') || h2.hasClass('header-fixed') || h3.hasClass('header-fixed') || h4.hasClass('header-fixed') || h5.hasClass('header-fixed') || h6.hasClass('header-fixed') || h7.hasClass('header-fixed') || h8.hasClass('header-fixed')) {
                                h1.css('top', '-' + windowpos + 'px');
                                h2.css('top', '-' + windowpos + 'px');
                                h3.css('top', '-' + windowpos + 'px');
                                h4.css('top', '-' + windowpos + 'px');
                                h5.css('top', '-' + windowpos + 'px');
                                h6.css('top', '-' + windowpos + 'px');
								h7.css('top', '-' + windowpos + 'px');
								h8.css('top', '-' + windowpos + 'px');
                            }
                        }

                        if (windowpos >= topAdH || windowpos >= headerFixed) {
                            if (h1.length || h2.length || h3.length || h4.length || h5.length || h6.length || h7.length || h8.length) {
                                s.addClass('stickp');
                                w.removeClass("stickh");
                                w.addClass("non-stickh");
                            }
                            if (h1.length || h2.length || h3.length || h4.length || h5.length || h6.length || h7.length || h8.length) {
                                if (h1.hasClass('header-fixed') || h2.hasClass('header-fixed') || h3.hasClass('header-fixed') || h4.hasClass('header-fixed') || h5.hasClass('header-fixed') || h6.hasClass('header-fixed') || h7.hasClass('header-fixed') || h8.hasClass('header-fixed')) {
                                    h1.css('top', '-' + parseInt(totalheight) + 'px');
                                    h2.css('top', '-' + parseInt(totalheight) + 'px');
                                    h3.css('top', '-' + parseInt(totalheight) + 'px');
                                    h4.css('top', '-' + parseInt(totalheight) + 'px');
                                    h5.css('top', '-' + parseInt(totalheight) + 'px');
                                    h6.css('top', '-' + parseInt(totalheight) + 'px');
									h7.css('top', '-' + parseInt(totalheight) + 'px');
									h8.css('top', '-' + parseInt(totalheight) + 'px');
                                }
                            }
                        } else {
                            s.removeClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        }
                    }
                }
            }

        });
    }

    /* Woocommerce Shop change view */
    $('#shop-view-mode li a').on('click', function () {
        $('body').removeClass('product-grid-view').removeClass('product-list-view');

        if ($(this).closest('li').hasClass('list-view-nav')) {
            $('body').addClass('product-list-view');
            Cookies.set('shopview', 'list');
        } else {
            $('body').addClass('product-grid-view');
            Cookies.remove('shopview');
        }
        return false;
    });

    // Popup - Used in video
    if (typeof $.fn.magnificPopup == 'function') {
        $('.rt-video-popup').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    }
	if (typeof $.fn.magnificPopup == 'function') {
        if ($('.zoom-gallery').length) {
            $('.zoom-gallery').each(function () { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a.clenix-popup-zoom', // the selector for gallery item
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            });
        }
    }
	
	$('.js-tilt').tilt({
		scale: 1.1
	})
		
    /* when product quantity changes, update quantity attribute on add-to-cart button */
    $("form.cart").on("change", "input.qty", function() {
        if (this.value === "0")
            this.value = "1";

        $(this.form).find("button[data-quantity]").data("quantity", this.value);
    });

    /* remove old "view cart" text, only need latest one thanks! */
    $(document.body).on("adding_to_cart", function() {
        $("a.added_to_cart").remove();
	});
	
	/*variable ajax cart end*/
	$('.quantity').on('click', '.plus', function(e) {
		var self = $(this),
			$input = self.prev('input.qty'),
			target = self.parents('form').find('.product_type_simple'),
			val = parseInt($input.val(), 10) + 1;
		target.attr("data-quantity", val);
		$input.val( val );
		
		return false;
	});

	$('.quantity').on('click', '.minus', function(e) {
		var self = $(this),
			$input = self.next('input.qty'),
			target = self.parents('form').find('.product_type_simple'),
			val = parseInt($input.val(), 10);
			val = (val > 1) ? val - 1 : val;
			target.attr("data-quantity", val);
			$input.val( val );
		return false;
	});
	
	
});


function clenix_load_content_area_scripts($) {

    /* progress circle */
    $('.rt-progress-circle').each(function () {
        var startcolor = $(this).data('rtstartcolor'),
            endcolor = $(this).data('rtendcolor'),
            num = $(this).data('rtnum'),
            speed = $(this).data('rtspeed'),
            suffix = $(this).data('rtsuffix');
        $(this).circleProgress({
            value: 1,
            fill: endcolor,
            emptyFill: startcolor,
            thickness: 5,
            size: 140,
            animation: {duration: speed, easing: "circleProgressEasing"},
        }).on('circle-animation-progress', function (event, progress) {
            $(this).find('.rtin-num').html(Math.round(num * progress) + suffix);
        });
    });

}

//function Load
function clenix_content_load_scripts() {
    var $ = jQuery;
    // Preloader
    $('#preloader').fadeOut('slow', function () {
        $(this).remove();
    });

    var windowWidth = $(window).width();

    /* Owl Custom Nav */
    if (typeof $.fn.owlCarousel == 'function') {
        $(".owl-custom-nav .owl-next").on('click', function () {
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('next.owl.carousel');
        });
        $(".owl-custom-nav .owl-prev").on('click', function () {
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('prev.owl.carousel');
        });

        $(".rt-owl-carousel").each(function () {
            var options = $(this).data('carousel-options');
            if (clenixObj.rtl == 'yes') {
                options['rtl'] = true; //@rtl
            }
            $(this).owlCarousel(options);
        });
    }
	
    /* Slick Tab Slider */
	var slickOptions1 = {
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,   
		autoplay: false,
		asNavFor: '.carousel-nav',
		prevArrow: '<span class="slick-prev slick-navigation"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
		nextArrow: '<span class="slick-next slick-navigation"><i class="fa fa-angle-right" aria-hidden="true"></i></span>'
	}
	var slickOptions2 = {
		slidesToScroll: 1,
		asNavFor: '.carousel-content',
		dots: false,
		arrows: true,
		prevArrow: true,
		nextArrow: true,
		centerMode: true,
		centerPadding: '0px',
		focusOnSelect: true,
		responsive: [{
			breakpoint: 991,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		}, {
			breakpoint: 767,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		}, {
			breakpoint: 479,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}]
	}

	if ( clenixObj.rtl == 'yes' ) {
		// options 1
		slickOptions1.rtl = true;
		slickOptions1.prevArrow = '<span class="slick-prev slick-navigation"><i class="fa fa-angle-right" aria-hidden="true"></i></span>';
		slickOptions1.nextArrow = '<span class="slick-next slick-navigation"><i class="fa fa-angle-left" aria-hidden="true"></i></span>';

		// options 2
		slickOptions2.rtl = true;

	}
	var SlickCarousel = $('.slick-carousel-wrap');
	if (SlickCarousel.length) {
		slickOptions2.slidesToShow = SlickCarousel.data('slide-count') || 5;
		SlickCarousel.find('.carousel-content').slick(slickOptions1);
		SlickCarousel.find('.carousel-nav').slick(slickOptions2);
	}

	/* Slick Slider */
	if ($.fn.slick) {
		$('.slick-carousel').each(function () {
			let $carousel = $(this);
			$carousel.imagesLoaded(function () {
				var data = $carousel.data('slick'),
					slidesToShowTab = data.slidesToShowTab,
					slidesToShowMobile = data.slidesToShowMobile;
				$carousel.slick({
					centerPadding: '0px',
					responsive: [{
							breakpoint: 992,
							settings: {
								slidesToShow: slidesToShowTab,
								slidesToScroll: slidesToShowTab
							}
						},
						{
							breakpoint: 767,
							settings: {
								slidesToShow: slidesToShowMobile,
								slidesToScroll: slidesToShowMobile
							}
						}
					]
				});
			});
		});
	}
	
	/* Counter */	
	var counterContainer = $('.counter');
    if (counterContainer.length) {
		console.log(counterContainer);
        counterContainer.counterUp({
            delay: counterContainer.data('rtsteps'),
            time: counterContainer.data('rtspeed')
        });
    }
	var counterContainer = $('.counter2');
    if (counterContainer.length) {
        counterContainer.counterUp({
            delay: 50,
            time: 2000
        });
    }

    /* Circle Bars - Knob */
    if (typeof ($.fn.knob) !== undefined) {
        $('.knob.knob-percent.dial').each(function () {
            var $this = $(this),
                knobVal = $this.attr('data-rel');
            $this.knob({
                'draw': function () {
                },
                'format': function (value) {
                    return value + '%';
                }
            });
            $this.appear(function () {
                $({
                    value: 0
                }).animate({
                    value: knobVal
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.val(Math.ceil(this.value)).trigger('change');
                    }
                });
            }, {
                accX: 0,
                accY: -150
            });
        });
    }
		
    // Onepage Nav on meanmenu
    $('#meanmenu .menu').onePageNav({
        extraOffset: clenixObj.extraOffsetMobile,
        end: function () {
            $('.meanclose').trigger('click');
        }
    });
    /* Slider */
    if (typeof $.fn.nivoSlider == 'function') {
		
		$('.rt-nivoslider').each(function(){
			var slider = $(this),
				settings = slider.data('settings');
			
			slider.nivoSlider({
				effect: settings.effect,
				slices: 15,
				boxCols: 8,
				boxRows: 4,
				animSpeed: settings.animSpeed,
				pauseTime: settings.pauseTime,
				startSlide: 0,
				directionNav: settings.directionNav ? true : false,
				controlNav: settings.controlNav ? true : false,
				controlNavThumbs: false,
				pauseOnHover: true,
				manualAdvance: settings.manualAdvance ? true : false,
				prevText: '',
				nextText: '',
				randomStart: false,
				beforeChange: function(){},
				afterChange: function(){},
				slideshowEnd: function(){},
				lastSlide: function(){},
				afterLoad: function(){}
			});
			
		});
        rdtheme_slider_fullscreen();
    }

}

//function ready

function rdtheme_slider_fullscreen() {
    $ = jQuery;
    $('.rt-el-slider').each(function () {
        var width = $(window).width(),
            left = $(this).offset().left,
            $container = $(this).find('.rt-nivoslider');
        if (width < 1921) {
            $container.css('margin-left', -left).width(width);
        } else {
            leftAlt = left - (width - 1920) / 2;
            $container.css('margin-left', -leftAlt).width(1920);
        }
        $container.css('opacity', 1);
    });
}

(function ($) {
    "use strict";

    // Window Load+Resize
    $(window).on('load resize', function () {

        // Define the maximum height for mobile menu
        var wHeight = $(window).height();
        wHeight = wHeight - 50;
        $('.mean-nav > ul').css('max-height', wHeight + 'px');

        // Elementor Frontend Load
        $(window).on('elementor/frontend/init', function () {
            if (elementorFrontend.isEditMode()) {
                elementorFrontend.hooks.addAction('frontend/element_ready/widget', function () {
                    clenix_content_load_scripts();
                });
            }
        });

        //initialize swiper when document ready
        $('.rt-swiper-container , .rt-port-swiper-container').each(function () {
            var swiper = $(this),
                autoplay = swiper.data('autoplay'),
                autoplayTimeout = swiper.data('autoplay-timeout') || '',
                speed = swiper.data('speed') || '',
                loop = swiper.data('loop') || true,
                slidesPerView = swiper.data('slides-per-view') || 3,
                spaceBetween = swiper.data('space-between'),
                centeredSlides = swiper.data('centered-slides'),
                rXsmall = swiper.data("r-x-small"),
                rSmall = swiper.data("r-small"),
                rMedium = swiper.data("r-medium"),
                rLarge = swiper.data("r-large"),
                rXlarge = swiper.data("r-x-large");

            var $swiper = new Swiper(swiper, {
                // Optional parameters
                autoplay: autoplay ? true : false,
                autoplayTimeout: autoplayTimeout ? autoplayTimeout : 10000,
                speed: speed ? speed : 2000,
                loop: loop ? true : false,
                slidesPerView: slidesPerView ? slidesPerView : 2,
                spaceBetween: spaceBetween ? spaceBetween : 10,
                centeredSlides: centeredSlides ? true : false,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    0: {
                        slidesPerView: rXsmall ? rXsmall : 1,
                    },
                    576: {
                        slidesPerView: rSmall ? rSmall : 2,
                    },
                    768: {
                        slidesPerView: rMedium ? rMedium : 3,
                    },
                    992: {
                        slidesPerView: rLarge ? rLarge : 4,
                    },
                    1200: {
                        slidesPerView: rXlarge ? rXlarge : 5,
                    }
                }
            });
        });


    });

    // Window Load
    $(window).on('load', function () {
        clenix_content_load_scripts();
    });
	


})(jQuery);