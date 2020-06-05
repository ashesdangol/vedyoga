function menu(){
  // mobile iconbar and openClose
  $('.mobile-nav-btn').on('click',function() {
    $(this).toggleClass('x');
    $('.nav-items-wrapper .nav-items').toggleClass('nav-close');
  });


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

//Adding hover effects on menu items
$('#top-nav').find('.nav-items-wrapper .nav-items .nav-item').addClass('hvr-overline-from-left hvr-sweep-to-right');
}

export default menu;
