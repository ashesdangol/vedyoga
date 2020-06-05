function headerMenu__style(){
  window.onbeforeunload = function () {
    window.scrollTo(0, 0);
  }
  window.onscroll=function(){
    scrollFunction();
  };

  function scrollFunction(){
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      $('#main__header').addClass('main__header--style');
    } else {
      $('#main__header').removeClass('main__header--style');

    }
  }

}

export default headerMenu__style;
