window.onbeforeunload = function () {
  window.scrollTo(0, 0);
}
$(document).ready(function(){

  // mobile iconbar and openClose
  $('.mobile-nav-btn').on('click',function() {
    $(this).toggleClass('x');
    $('.nav-items-wrapper .nav-items').toggleClass('nav-close');
  });

  // slick slider
  function banner_slider(){
    $('.banner_slider--wrapper').slick({
      dots: true,
      arrows:false,
      infinite: true,
      slidesToShow: 1,
      autoplay: false,
      autoplaySpeed:5000,
      cssEase:'ease-in-out'
    });

  }
  banner_slider();

  // window on scroll menu background change with boxshadow
  window.onscroll = function() {scrollFunction()};
  function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      $('.nav-main-wrapper').removeClass('on-scroll-nav--change');
      $('.nav-all-wrap').addClass('box-shadow');
    } else {
      $('.nav-main-wrapper').addClass('on-scroll-nav--change');
      $('.nav-all-wrap').removeClass('box-shadow');
    }
  }

})
