import $ from 'jquery';

class Search {
  // 1. Describe and create/initiate our object
  constructor() {
    // this.openButton = document.querySelector('.js-search-trigger');
    this.openButton = $('.js-search-trigger');
    this.closeButton = $('.search-overlay__close');
    this.searchOverlay = $('.search-overlay');
    this.events();
  }
  // 2. Add events

  events() {
    this.openButton.on('click', this.openOverlay.bind(this));
    this.closeButton.on('click', this.closeOverlay.bind(this));

    // Use keys to open and close overlay
    $(document).on('keyup', this.keyPressDispatcher.bind(this));
  }

  // 3. Methods

  openOverlay() {
    this.searchOverlay.addClass('search-overlay--active');
    $('body').addClass('body-no-scroll');
  }

  closeOverlay() {
    this.searchOverlay.removeClass('search-overlay--active');
    $('body').removeClass('body-no-scroll');
  } 

  keyPressDispatcher(e) {
    console.log('key pressed');
    console.log(e.keyCode);
    if (e.keyCode == 83 && !this.searchOverlay.hasClass('search-overlay--active')) {
      this.openOverlay();
    }

    if (e.keyCode == 27 && this.searchOverlay.hasClass('search-overlay--active')) {
      this.closeOverlay();
    }
  }
}

export default Search;