(function($) {
    "use strict";

    /*****************************
     * Commons Variables
     *****************************/
    var $window = $(window),
        $body = $('body');

    /****************************
     * Sticky Menu
     *****************************/
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $(".sticky-header").removeClass("sticky");
        } else {
            $(".sticky-header").addClass("sticky");
        }
    });

    /*****************************
     * Off Canvas Function
     *****************************/
    (function() {
        var $offCanvasToggle = $('.offcanvas-toggle'),
            $offCanvas = $('.offcanvas'),
            $offCanvasOverlay = $('.offcanvas-overlay'),
            $mobileMenuToggle = $('.mobile-menu-toggle');
        $offCanvasToggle.on('click', function(e) {
            e.preventDefault();
            var $this = $(this),
                $target = $this.attr('href');
            $body.addClass('offcanvas-open');
            $($target).addClass('offcanvas-open');
            $offCanvasOverlay.fadeIn();
            if ($this.parent().hasClass('mobile-menu-toggle')) {
                $this.addClass('close');
            }
        });
        $('.offcanvas-close, .offcanvas-overlay').on('click', function(e) {
            e.preventDefault();
            $body.removeClass('offcanvas-open');
            $offCanvas.removeClass('offcanvas-open');
            $offCanvasOverlay.fadeOut();
            $mobileMenuToggle.find('a').removeClass('close');
        });
    })();


    /**************************
     * Offcanvas: Menu Content
     **************************/
    function mobileOffCanvasMenu() {
        var $offCanvasNav = $('.offcanvas-menu'),
            $offCanvasNavSubMenu = $offCanvasNav.find('.mobile-sub-menu');

        /*Add Toggle Button With Off Canvas Sub Menu*/
        $offCanvasNavSubMenu.parent().prepend('<div class="offcanvas-menu-expand"></div>');

        /*Category Sub Menu Toggle*/
        $offCanvasNav.on('click', 'li a, .offcanvas-menu-expand', function(e) {
            var $this = $(this);
            if ($this.attr('href') === '#' || $this.hasClass('offcanvas-menu-expand')) {
                e.preventDefault();
                if ($this.siblings('ul:visible').length) {
                    $this.parent('li').removeClass('active');
                    $this.siblings('ul').slideUp();
                    $this.parent('li').find('li').removeClass('active');
                    $this.parent('li').find('ul:visible').slideUp();
                } else {
                    $this.parent('li').addClass('active');
                    $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
                    $this.closest('li').siblings('li').find('ul:visible').slideUp();
                    $this.siblings('ul').slideDown();
                }
            }
        });
    }
    mobileOffCanvasMenu();

    /************************************************
     * Nice Select
     ***********************************************/
    $('select').niceSelect();


    /*************************
     *   Hero Slider Active
     **************************/
    var heroSlider = new Swiper('.hero-slider-active.swiper-container', {
        slidesPerView: 1,
        speed: 1500,
        // watchSlidesProgress: true,
        // loop: true,
        // autoplay: true,
        // pagination: {
        //     el: '.swiper-pagination',
        //     clickable: true,
        // },
       
    });


    /****************************************
     *   Product Slider Active - 4 Grids 1 Row
     *****************************************/
    var default_slider = new Swiper('.default-slider .swiper-container', {
        slidesPerView: 4,
        spaceBetween: 45,
        speed: 1500,
        loop: true,
        autoplay: true,
        navigation: {
            nextEl: '.default-arrow .swiper-button-next',
            prevEl: '.default-arrow .swiper-button-prev',
        },

        breakpoints: {

            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
                
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
            },
            1800: {
                slidesPerView: 4,
            }
            
        }
    });

    
    /****************************************
     *   Client Logo - 6 Grids 1 Row
     *****************************************/
    var initClientLogoSlider = function() {
        if ($('.client-logo-slider .swiper-container').length) {
            var client_logo_slider = new Swiper('.client-logo-slider .swiper-container', {
                slidesPerView: 4,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: true,
                },
                speed: 1500,
                loop: true,
                breakpoints: {
                    0: {
                        slidesPerView: 2,
                    },
                    576: {
                        slidesPerView: 3,
                    },
                    768: {
                        slidesPerView: 4,
                    },
                }
            });
        }
    };

    /****************************************
     *   Blog Feed - 2 Grids 1 Row
     *****************************************/
    var initBlogFeedSlider = function() {
        if ($('.blog-feed-slider .swiper-container').length) {
            var blog_feed_slider = new Swiper('.blog-feed-slider .swiper-container', {
                slidesPerView: 2,
                spaceBetween: 45,
                speed: 1500,
                // loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    992: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    1200: {
                        slidesPerView: 1,
                    },
                    1400: {
                        slidesPerView: 2,
                    }
                }
            });
        }
    };

    // Initialize when document is ready
    $(document).ready(function() {
        initClientLogoSlider();
        initBlogFeedSlider();
    });

    // Re-initialize on window load to ensure all assets are loaded
    $(window).on('load', function() {
        initClientLogoSlider();
        initBlogFeedSlider();
    });

    /************************************************
     * Counter Up
     ***********************************************/
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    /************************************************
     * Video  Popup
     ***********************************************/
    $('.video-play-btn').venobox(); 

    /************************************************
     * Scroll Top
     ***********************************************/
    $('body').materialScrollTop();
    
    
    /************************************************
     * Project Filter
     ***********************************************/
      $('.projects-wrapper').imagesLoaded( function() {
        // filter items on button click
         $('.projects-gallery-filter-nav').on( 'click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });
             
            $(this).siblings('.active').removeClass('active');
            $(this).addClass('active');
         });

         // init Isotope
        var $grid = $('.projects-wrapper').isotope({
            itemSelector: '.filtr-item',
             percentPosition: true,
             masonry: {
                 columnWidth: '.filtr-item'
             }
         });
     });


     /************************************************
     * Hash Link Scroll To Top Prevent
     ***********************************************/
     $('a[href="#"]').on('click', (function(e) {
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
    }));


})(jQuery);

document.addEventListener('DOMContentLoaded', function() {
    const scrollOffset = 160; // Adjust this value based on your header height
    
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - scrollOffset;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});