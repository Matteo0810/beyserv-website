$(document).ready(() => {

    $('.responsive_bottom').click(() => {
        $('.responsive_nav').animate({
            height: "toggle"
        }, 500);
    })

    $(window).scroll(() => {
        if ($(document).scrollTop() > 120) {
            $('.top-nav').css('position', 'fixed');
            $('.top-nav').css('top', '0px');
            $('.top-nav').css('width', '100%');
            $('.top-nav').css('z-index', '9999');
            $('.responsive_nav').css('position', 'fixed');
        } else {
            $('.top-nav').css('position', 'unset');
            $('.responsive_nav').css('position', 'absolute');
        }
    });


})