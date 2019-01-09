$(function () {
    $('a.page-scroll').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 90
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
$('.slider').owlCarousel({
  loop: true,
  margin: 0,
  nav: false,
  dots:true,
  autoplay: true,
  items:1
});
$('.owl-areas').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText: [
        "<i class='fa fa-caret-left'></i>",
        "<i class='fa fa-caret-right'></i>"
    ],
    autoplay: true,
    autoplayHoverPause: true,
    items: 1,
});
