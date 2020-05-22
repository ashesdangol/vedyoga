$(document).ready(function(){
  $('.mobile-nav-btn').on('click',function() {
    $(this).toggleClass('x');
    $('.nav-items-wrapper .nav-items').toggleClass('nav-close');
  });
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
})
