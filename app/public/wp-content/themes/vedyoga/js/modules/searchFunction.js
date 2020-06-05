
// Search function

class Search {
  // 1. descrine create and create/initiate our object// features of an object
  constructor() {
    this.openButton = $('.js-search-trigger');
    this.closeButton =$('.search-overlay__close');
    this.searchOverlay = $('.search-overlay');
    this.searchField = $('#searchbox__input');
    this.events();
    this.isOverlayOpen = false;
    this.typingTimer;
  }
  // 2 Events
  events(){
    this.openButton.on('click',this.openOverlay.bind(this));
    this.closeButton.on('click',this.closeOverlay.bind(this));
    // $(document).on("keyup", this.keyPressDispatcher.bind(this));
    $(document).on("keydown", this.keyPressDispatcher.bind(this));
    this.searchField.on("keydown", this.typingLogic.bind(this));
  }
  // 3 Methods (functions , actions etc)

  typingLogic(){
    clearTimeout(this.typingTimer);
    this.typingTimer = setTimeout(function(){console.log('this is a time out test')}, 2000);
  }

  keyPressDispatcher(e){
    // console.log(e.keyCode);
    if (e.keyCode == 83 && !this.isOverlayOpen) {
      this.openOverlay();
    }
    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }

  }


  openOverlay(){
    this.searchOverlay.addClass("search-overlay--active");
    $('body').addClass('body-no-scroll');
    this.isOverlayOpen = true;
    // console.log("overlay opened");

  }
  closeOverlay(){
    this.searchOverlay.removeClass('search-overlay--active');
    $('body').removeClass('body-no-scroll');
    this.isOverlayOpen = false;
    // console.log("overlay closed");
  }
}
// end of search function

export default Search;
