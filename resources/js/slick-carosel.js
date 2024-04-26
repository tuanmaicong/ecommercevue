export default function initializeSlick(){
    $('.hero-slider').slick({
        arrows: true,
        autoplay: false,
        autoplaySpeed: 5000,
        dots: false, fade: true, pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        slidesToShow: 1,
        prevArrow: '<button type="button" class="slick-prev"> <i class="icon-arrow-left"></i> </button>',
        nextArrow: '<button type="button" class="slick-next"><i class="icon-arrow-right"></i></button>',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    dots: false,
                }
            }
        ]
    });
    $('.product-slider').slick({
        dots: false,
        infinite: true, slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        prevArrow: false,
        nextArrow: false,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 479,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    var testimonialSlider = $('.testimonial-slider');
    testimonialSlider.slick({
        arrows: false,
        autoplay: true,
        autoplaySpeed: 7000,
        dots: false, pauseOnFocus: false,
        pauseOnHover: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScoll: 1,
    });

    var instagramSlider = $('.instagram-slider');
    instagramSlider.slick({
        dots: false,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: false,
        prevArrow: false,
        nextArrow: false,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 479,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    var ourBrandActive = $('.our-brand-active');
    ourBrandActive.slick({
        arrows: false,
        autoplay: false,
        dots: false,
        pauseOnFocus: true,
        pauseOnHover: true, infinite: true,
        slidesToShow: 5,
        slidesToScoll: 2,
        responsive: [
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 479,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });
}
