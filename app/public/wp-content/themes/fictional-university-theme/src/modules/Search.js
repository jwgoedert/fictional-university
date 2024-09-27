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
    this.previousValue;
  }
  // 2. Add events

  events() {
    this.openButton.on('click', this.openOverlay.bind(this));
    this.closeButton.on('click', this.closeOverlay.bind(this));
    // Use keys to open and close overlay
    $(document).on('keydown', this.keyPressDispatcher.bind(this));
    // this direct selection is slower than JS refactor
    this.searchField.on('keyup', this.typingLogic.bind(this));
  }

  // 3. Methods

  typingLogic() {
    if (this.searchField.val() != this.previousValue) {

      clearTimeout(this.typingTimer);
      if (this.searchField.val()) {
        // if there is a value in the search field
        if (!this.isSpinnerVisible) {
          this.resultsDiv.html('<div class="spinner-loader"></div>');
          this.isSpinnerVisible = true;
        }
        this.typingTimer = setTimeout(
          this.getResults.bind(this)
          , 2000);

      } else {
        // if there is no value in the search field
        this.resultsDiv.html('');
        this.isSpinnerVisible = false
      }
    }
    this.previousValue = this.searchField.val();
  }

  getResults() {
    $.getJSON('http://fictional-university.local/wp-json/wp/v2/posts?search=' + this.searchField.val(), function (posts) {
      alert(posts[0].title.rendered);
  }
    )
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
    if (e.keyCode == 83 && !this.isOverlayOpen && !$('input, textarea').is(':focus')) {
      this.openOverlay();
    }
    // esc key
    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }

}

export default Search;