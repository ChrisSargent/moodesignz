/*
 * Custom moo UI Javascript
 */

var moo_ui = (function($) {
  // Cache Dom
  // TODO: Could be replace with .find() - would it be quicker?
  var $window = $(window);
  var $page = $('html, body');
  var $navHeader = $('#moo-nav');
  var $navListHeader = $('#moo-nav__list');
  var $navListHeaderWidth = $navListHeader.width();
  var $intLink = $('a[href*="#"]');
  var $mobileNavCheck = $('#moo-nav__toggle');
  var $fpageTitle = $('#moo-page__hero-inner');
  var $fpageBG = $('#moo-page__hero-bg');
  var $menuToggle = $('#moo-nav__toggle');
  var $pinit = $('#moo-pinit');

  // Bind UI Events
  $window.scroll(_handleScrollEvents);
  $intLink.bind('click', _pageScroll);

  function _handleScrollEvents() {
    _shrinkMainNav();
    if ($fpageTitle.length > 0 || $fpageBG.length > 0) {
      // Only run this if the elements exist
      _parallax();
    }
  }

  function _shrinkMainNav() {
    if ($navHeader.offset().top > 50) {
      $navHeader.addClass('moo-nav--shrink');
    }
    else {
      $navHeader.removeClass('moo-nav--shrink');
    }
  };

  function _parallax() {
    var titleStyles,
      bgStyles,
      shift,
      scale,
      opacity,
      shiftFactor = -3,
      scaleFactor = 4,
      $winScroll = $window.scrollTop(),
      $winHeight = $window.outerHeight();

    if ($winScroll < $winHeight) {
      shift = ($winScroll / shiftFactor);
      scale = 1 - (($winScroll / $winHeight) / scaleFactor);
      opacity = 1 - ($winScroll / $winHeight);

      bgStyles = {
        transform: "translate3d(0," + shift + "px, 0)"
      }

      titleStyles = {
        transform: "scale3d(" + scale + "," + scale + ", 1)",
        opacity: opacity
      };

      $fpageBG.css(bgStyles);
      $fpageTitle.css(titleStyles);
    } else {
      // Do nothing
    }
  }

  function _pageScroll(event) {
    var $target = $(this).attr('href');
    var targetArray = $target.split("#");
    var targetURI = targetArray[0];
    var $targetAnchor = $("#" + targetArray[1]);
    var windowHref = (window.location.href);
    var windowURI = windowHref.substr(0,windowHref.indexOf('#')) || windowHref;

    if(targetURI === windowURI || targetURI === "") {
      event.preventDefault();

      $page.stop().animate({
        scrollTop: $targetAnchor.offset().top
      }, 750);
    };

    _hideMobileNav();
    
  };

  function _hideMobileNav(event) {
    $mobileNavCheck.prop('checked', false);
  };

})(jQuery);
