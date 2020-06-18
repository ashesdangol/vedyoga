
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

    $.getJSON(yogaData.root_url+'/wp-json/yoga/v1/search?term='+this.searchField.val(),(results)=>{
      this.resultsDiv.html(`
        <div class="search-overlay__results-contents">
          <div class="one-third">

              <h2 class="header__title--one">General Information</h2>

              ${results.generalInfo.length ? '<ul>':'<p>No general information matches that search</p>'}
                ${results.generalInfo.map(item=>`<li>

                  ${item.postType == 'post'? `
                  <div class="blog-card">
                    <div class="blog-card__post-item">
                      <div class="blog-card__date-thumbnail">
                        <div class="blog-card__date">
                        ${item.postDate}
                        </div>
                        <picture class="blog-card__thumbnail">
                          <source class="blog-card__image" media="(min-width:1020px)" srcset="${item.postFeaturedImage__Lg}" alt="Meditation Group Posts">
                          <source class="blog-card__image" media="(min-width:500px)" srcset="${item.postFeaturedImage__Med}" alt="Meditation Group Posts">
                          <img class="blog-card__image" src="${item.postFeaturedImage__Sm}" alt="Meditation Group Posts" />
                        </picture>
                      </div>
                      <div class="blog-card__details">
                        <div class="blog-card__title-auth-contents">
                          <div class="blog-card__title">
                             <a class="blog-card__title--fontstyle" href="${item.permalink}">${item.title}</a>
                          </div>
                          <div class="blog-card__auth">
                          ${item.postType == 'post'? item.authorLink : ''}
                          </div>
                          <div class="blog-card__contents">
                          ${item.trimWords}
                            <p> <a class="conti-read--color" href="${item.permalink}">Read <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </p>
                          </div>
                        </div>

                      </div>

                    </div>
                  </div>

                      ` : `
                      <div class="blog-card">
                        <div class="blog-card__post-item">
                          <div class="blog-card__details">
                            <div class="blog-card__title-auth-contents">
                              <div class="blog-card__title">
                                 <a class="blog-card__title--fontstyle" href="${item.permalink}">${item.title}</a>
                              </div>
                              <div class="blog-card__contents">
                              ${item.pageWords}
                              <p> <a class="conti-read--color" href="${item.permalink}">Read <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      `}




                  </li>`).join(' ')}
              ${results.generalInfo.length ? '</ul>':''}
          </div>
          <div class="one-third">

            <h2 class="header__title--one">Programs</h2>
            ${results.programs.length ? `<div>
                ${results.programs.map(item =>
                  `
                  <div class="blog-card">
                    <div class="blog-card__post-item">
                      <div class="blog-card__date-thumbnail">
                        <picture class="blog-card__thumbnail">
                          <source class="blog-card__image" media="(min-width:1020px)" srcset="${item.postFeaturedImage__Lg}" alt="Meditation Group Posts">
                          <source class="blog-card__image" media="(min-width:500px)" srcset="${item.postFeaturedImage__Med}" alt="Meditation Group Posts">
                          <img class="blog-card__image" src="${item.postFeaturedImage__Sm}" alt="Meditation Group Posts" />
                        </picture>

                      </div>
                      <div class="blog-card__details">
                        <div class="blog-card__title-auth-contents">
                          <div class="blog-card__title">
                             <a class="blog-card__title--fontstyle" href="${item.permalink}">${item.title}</a>
                          </div>
                          <div class="blog-card__contents">
                            ${item.trimWords}
                            <p> <a class="conti-read--color" href="${item.permalink}">Read <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </p>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                  `
                )}

                </div>
                `
                :
                `<p>No programs matches that search</p>
                <a href="${yogaData.root_url+'/programs'}">View All Programs</a>
                `

            }

            <h2 class="header__title--one">Events</h2>
            ${results.events.length ?
              `
              ${results.events.map(item => `
                  ${item.postType == 'event' ? `
                    <div class="blog-card">
                      <div class="blog-card__post-item">
                        <div class="blog-card__date-thumbnail">
                          <div class="blog-card__date">
                            ${item.eventDate}
                          </div>
                          <picture class="blog-card__thumbnail">
                            <source class="blog-card__image" media="(min-width:1020px)" srcset="${item.postFeaturedImage__Lg}" alt="Meditation Group Posts">
                            <source class="blog-card__image" media="(min-width:500px)" srcset="${item.postFeaturedImage__Med}" alt="Meditation Group Posts">
                            <img class="blog-card__image" src="${item.postFeaturedImage__Sm}" alt="Meditation Group Posts" />
                          </picture>
                        </div>
                        <div class="blog-card__details">
                          <div class="blog-card__title-auth-contents">
                            <div class="blog-card__title">
                               <a class="blog-card__title--fontstyle" href="${item.permalink}">${item.title}</a>
                            </div>
                            <div class="blog-card__auth">
                            ${item.authorLink}
                            </div>
                            <div class="blog-card__contents">
                            ${item.trimWords}
                              <p> <a class="conti-read--color" href="${item.permalink}">Read <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </p>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                  ` : `
                  `}
                `)}

               `:
               `
               <p>No Event matches that search</p>
               <a href="${yogaData.root_url+'/events'}">View All Events</a>
               `
             }







          </div>
          <div class="one-third">
            <h2 class="header__title--one">Instructor(s)</h2>
            ${results.instructors.length ? `<div>
              ${results.instructors.map(item =>
                `
                  <div class="blog-card">
                    <div class="blog-card__post-item">
                      <div class="blog-card__date-thumbnail">
                        <picture class="blog-card__thumbnail">
                          <source class="blog-card__image" media="(min-width:1020px)" srcset="${item.postFeaturedImage__Lg}" alt="Meditation Group Posts">
                          <source class="blog-card__image" media="(min-width:500px)" srcset="${item.postFeaturedImage__Med}" alt="Meditation Group Posts">
                          <img class="blog-card__image" src="${item.postFeaturedImage__Sm}" alt="Meditation Group Posts" />
                        </picture>
                      </div>
                      <div class="blog-card__details">
                        <div class="blog-card__title-auth-contents">
                          <div class="blog-card__title">
                             <a class="blog-card__title--fontstyle" href="${item.permalink}">${item.title}</a>
                          </div>

                        </div>
                      </div>

                    </div>
                  </div>
                `
              )}
              </div>
            `
            :
            `
              <p>No Instructor matches that search</p>
            `
            }
            <h2 class="header__title--one">Shops</h2>
            ${results.programs.length ? `<div>
                helloo

                </div>
                `
                :
                `<p>No Shop matches that search</p>
                  <a href="${yogaData.root_url+'/shop'}">View Shop</a>
                `
            }
            <h2 class="header__title--one">Contact</h2>
            ${results.programs.length ? `<div>
                helloo

                </div>
                `
                :
                `<p>No contact matches that search</p>
                  <a href="${yogaData.root_url+'/contact'}">View Contact</a>
                `
            }
          </div>
        </div>
        `);
    });

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
    return false;
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
          <div class="yesPadding--small" id="search-overlay__results">

          </div>
        </div>

      </div>
      `);
  }
}
// end of search function

export default Search;
