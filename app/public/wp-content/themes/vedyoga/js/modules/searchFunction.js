
// Search function

class Search {
  // 1. descrine create and create/initiate our object// features of an object
  constructor() {
    this.addSearchHTML();
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
          // this.resultsDiv.addClass('add-min-height');
          this.resultsDiv.html('<div class="spinner-loader"></div>');
          this.isSpinnerVisible =true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 750);
      }else{
        this.resultsDiv.html("");
        this.isSpinnerVisible =false;
        // this.resultsDiv.removeClass('add-min-height');
      }

    }
    this.previousValue = this.searchField.val();
  }
  getResults(){
    $.when(
      $.getJSON(yogaData.root_url+'/wp-json/wp/v2/posts?search='+this.searchField.val()),
      $.getJSON(yogaData.root_url+'/wp-json/wp/v2/pages?search='+this.searchField.val())
    ).then(
      (resultPosts,resultPages)=>{
      var combinedResults = resultPosts[0].concat(resultPages[0]);
      this.resultsDiv.html(`
          <h2 class="header__title--one">Search Results</h2>
          <hr>
          ${combinedResults.length ? '<ul>':'<p>No general information matches that search</p>'}
            ${combinedResults.map(item=>`<li><a href="${item.link}">${item.title.rendered}</a>${item.type == 'post' ?  ` by ${item.authorName}`: ''  }</li>`).join(' ')}
          ${combinedResults.length ? '</ul>':''}
        `);
      this.isSpinnerVisible = false;
    },
      ()=>{
        this.resultsDiv.html('<p>Unexpected error, Please try again.</p>');
      }
      );
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
    this.searchField.val('');
    setTimeout(() => this.searchField.focus(), 301);
    this.isOverlayOpen = true;
    // console.log("overlay opened");

  }
  closeOverlay(){
    this.searchOverlay.removeClass('search-overlay--active');
    $('body').removeClass('body-no-scroll');
    this.isOverlayOpen = false;
    // console.log("overlay closed");
  }

  addSearchHTML(){
    $("body").append(`
      <div class="search-overlay">
        <div class="search-overlay__top">
          <div class="search-container">
            <i class="fa fa-2x fa-search search-overlay__icon" aria-hidden="true"></i>
            <input type="text" autocomplete="off" name="search-box" class="searchbox__input" id="searchbox__input" placeholder="What are you looking for?">
            <i class="fa fa-2x fa-window-close search-overlay__close" aria-hidden="true"></i>
          </div>

        </div>
        <div class="search-overlay__bottom">
          <div class="side-paddings" id="search-overlay__results">

          </div>
        </div>

      </div>
      `);
  }
}
// end of search function

export default Search;
