$('.carousel-inner').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    autoplay: true,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('a[href="#top"]').fadeIn();
        } else {
            $('a[href="#top"]').fadeOut();
        }
    });

    $('a[href="#top"]').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
});

$('a.page-scroll').bind('click', function (event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: ($($anchor.attr('href')).offset().top - 50)
    }, 1250, 'easeInOutExpo');
    event.preventDefault();
});

$(document).ready(function () {
    $(".navbar-fixed-top").css("background-color", "transparent");
    $(window).scroll(function () {
        if ($(document).scrollTop() > 300) {
            $(".navbar-fixed-top").css("background-color", "rgba(153, 51, 153,.8)");
        } else {
            $(".navbar-fixed-top").css("background-color", "transparent");
        }
    });
});
