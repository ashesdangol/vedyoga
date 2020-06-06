
// Search function

class Search {
  // 1. descrine create and create/initiate our object// features of an object
  constructor() {
    this.resultsDiv = $('#search-overlay__results');
    this.openButton = $('.js-search-trigger');
    this.closeButton =$('.search-overlay__close');
    this.searchOverlay = $('.search-overlay');
    this.searchField = $('#searchbox__input');
    this.events();
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.previousValue;
    this.typingTimer;
  }
  // 2 Events
  events(){
    this.openButton.on('click',this.openOverlay.bind(this));
    this.closeButton.on('click',this.closeOverlay.bind(this));
    // $(document).on("keyup", this.keyPressDispatcher.bind(this));
    $(document).on("keydown", this.keyPressDispatcher.bind(this));
    this.searchField.on("keyup", this.typingLogic.bind(this));
  }
  // 3 Methods (functions , actions etc)

  typingLogic(){
    if (this.searchField.val() != this.previousValue) {
      clearTimeout(this.typingTimer);
      if (this.searchField.val()) {
        if (!this.isSpinnerVisible) {
          this.resultsDiv.addClass('add-min-height');
          this.resultsDiv.html('<div class="spinner-loader"></div>');
          this.isSpinnerVisible =true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
      }else{
        this.resultsDiv.html("");
        this.isSpinnerVisible =false;
        this.resultsDiv.removeClass('add-min-height');
      }

    }
    this.previousValue = this.searchField.val();
  }

  getResults(){
    this.resultsDiv.html('this is an imaginary result');
    this.isSpinnerVisible = false;
  }

  keyPressDispatcher(e){
    // console.log(e.keyCode);
    if (e.keyCode == 83 && !this.isOverlayOpen && !$("input, textarea").is(':focus')) {
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
