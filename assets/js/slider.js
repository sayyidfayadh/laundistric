(function ($) {
    "use strict";
    $(document).ready(function () {
        function sliderAnimations(elements) {
            var animationEndEvents = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
            elements.each(function () {
                var $this = $(this);
                var $animationDelay = $this.data("delay");
                var $animationDuration = $this.data("duration");
                var $animationType = "runok-animation " + $this.data("animation");
                $this.css({
                    "animation-delay": $animationDelay,
                    "-webkit-animation-delay": $animationDelay,
                    "animation-duration": $animationDuration,
                });
                $this.addClass($animationType).one(animationEndEvents, function () {
                    $this.removeClass($animationType);
                });
            });
        }
        var sliderOptions = {
            speed: 1500,
            autoplay: {
                delay: 7000,
            },
            disableOnInteraction: false,
            initialSlide: 0,
            parallax: false,
            mousewheel: false,
            loop: true,
            grabCursor: true,
            effect: "fade",
            navigation: {
                nextEl: ".slider-arrow .slider-next",
                prevEl: ".slider-arrow .slider-prev",
            },
            pagination: {
                el: ".runok-swiper-pagination",
                clickable: true,
            },
        };
        sliderOptions.on = {
            slideChangeTransitionStart: function () {
                var swiper = this;
                var animatingElements = $(swiper.slides[swiper.activeIndex]).find("[data-animation]");
                sliderAnimations(animatingElements);
            },

            resize: function () {
                this.update();
            },
        };

        var swiper = new Swiper(".runok-slider-2", sliderOptions);


        // Slider 1
        
        // Sliderthumb
        var sliderThumb = new Swiper(".slider-tab", {
            spaceBetween: 20,
            slidesPerView: 3,
        });
        var slider2Options = {
            speed: 1500,
            autoplay: {
                delay: 7000,
            },
            disableOnInteraction: false,
            initialSlide: 0,
            parallax: false,
            mousewheel: false,
            loop: true,
            grabCursor: true,
            effect: "fade",
            navigation: {
                nextEl: ".slider-arrow .slider-next",
                prevEl: ".slider-arrow .slider-prev",
            },
            thumbs: {
                swiper: sliderThumb,
            },
        };
        slider2Options.on = {
            slideChangeTransitionStart: function () {
                var swiper = this;
                var animatingElements = $(swiper.slides[swiper.activeIndex]).find("[data-animation]");
                sliderAnimations(animatingElements);
            },

            resize: function () {
                this.update();
            },
        };

        var swiper2 = new Swiper(".runok-slider", slider2Options);

        // Home slider
        var swiperHome = new Swiper(".home-carousel", {
            slidesPerView: 1,
            // spaceBetween: 24,
            slidesPerGroup: 1,
            // loop: true,
            autoplay: true,
            grabcursor: true,
            speed: 400,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // breakpoints: {
            //     320: {
            //         slidesPerView: 1,
            //         slidesPerGroup: 1,
            //         spaceBetween: 25,
            //     },
            //     767: {
            //         slidesPerView: 2,
            //         slidesPerGroup: 1,
            //         spaceBetween: 30,
            //     },
            //     1024: {
            //         slidesPerView: 1,
            //         slidesPerGroup: 1,
            //     },
            // },
        });

         // Testimonials slider
         var swiperTesti = new Swiper(".testi-carousel", {
            slidesPerView: 3,
            spaceBetween: 24,
            slidesPerGroup: 1,
            loop: true,
            autoplay: true,
            grabcursor: true,
            speed: 1000,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    slidesPerGroup: 1,
                    spaceBetween: 25,
                },
                767: {
                    slidesPerView: 2,
                    slidesPerGroup: 1,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    slidesPerGroup: 1,
                },
            },
        });

    });
})(jQuery);
