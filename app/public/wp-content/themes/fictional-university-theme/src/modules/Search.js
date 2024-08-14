import $ from 'jquery';

class Search {
  // 1. Describe and create/initiate our object
  constructor() {
    // this.openButton = document.querySelector('.js-search-trigger');
    this.resultsDiv = $('#search-overlay__results');
    this.openButton = $('.js-search-trigger');
    this.closeButton = $('.search-overlay__close');
    this.searchOverlay = $('.search-overlay');
    this.searchField = $('#search-term');
    this.events();
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.typingTimer;
  }
  // 2. Add events

  events() {
    this.openButton.on('click', this.openOverlay.bind(this));
    this.closeButton.on('click', this.closeOverlay.bind(this));
    // Use keys to open and close overlay
    $(document).on('keydown', this.keyPressDispatcher.bind(this));
    // this direct selection is slower than JS refactor
    this.searchField.on('keydown', this.typingLogic.bind(this));
  }

  // 3. Methods

  typingLogic() {
    clearTimeout(this.typingTimer);
    if (!this.isSpinnerVisible) {
      this.resultsDiv.html('<div class="spinner-loader"></div>');
      this.isSpinnerVisible = true;
    }
    this.typingTimer = setTimeout(
      this.getResults.bind(this)
      , 2000);
  }

  getResults() {
    this.resultsDiv.html('Hello there, i will get some results for you');
    this.isSpinnerVisible = false;
  }

  openOverlay() {
    this.searchOverlay.addClass('search-overlay--active');
    $('body').addClass('body-no-scroll');
    this.isOverlayOpen = true;
  }

  closeOverlay() {
    this.searchOverlay.removeClass('search-overlay--active');
    $('body').removeClass('body-no-scroll');
    this.isOverlayOpen = false;
  }

  keyPressDispatcher(e) {
    // s key
    if (e.keyCode == 83 && !this.isOverlayOpen) {
      this.openOverlay();
    }
    // esc key
    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }

}

export default Search;