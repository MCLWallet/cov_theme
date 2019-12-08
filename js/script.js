jQuery(document).ready(function (e) {

  // Hamburger Click
  jQuery('.navbar-toggler').on('click', function () {
    if (jQuery(window).width() < 992) {
      jQuery('.animated-icon').toggleClass('open');
      jQuery('#mobile-menu-wrapper').toggleClass('open');
      jQuery('#body').toggleClass('mobile-menu-open');
      jQuery('#mobile-footer').toggleClass('mobile-menu-open');
    }  
  });

  // Header hover effect
  jQuery('#site-nav').on('hover', function() {
    if (jQuery(window).width() > 991) {
      jQuery('#header').toggleClass('collapsed');
    }
  });
  jQuery('#header .logo-wrapper').on('hover', function () {
    if (jQuery(window).width() > 991) {
      jQuery('#header').toggleClass('collapsed');
    }
  });

  // Search Button
  jQuery('#open-search-button').on('click', function() {
    jQuery('#open-search-button').toggleClass('open');
    jQuery('#search-form').toggleClass('open');
    jQuery('#site-nav').toggleClass('open');

    if (jQuery('#search-form').hasClass('open')) {
      jQuery('#search').focus();
    }
  });

  // Mobile Menu
  jQuery('#menu-mobile-menu li.menu-item-has-children')
    .prepend('<svg class="plus" xmlns="http://www.w3.org/2000/svg" width="26.78" height="26.22" viewBox="0 0 26.78 26.22"><g transform="translate(-120.5 345.72) rotate(-90)"><line x2="26.22" transform="translate(319.5 133.89)" fill="none" stroke="#00294c" stroke-width="1"/><line y1="26.78" transform="translate(332.61 120.5)" fill="none" stroke="#00294c" stroke-width="1"/></g></svg>');

  // TODO: Overlapping lists lead to non-intuitive Click events
  jQuery('#menu-mobile-menu li.menu-item-has-children').on('click', function() {
    jQuery(this).toggleClass('open');
    if (jQuery(this).hasClass('open')) {
      jQuery(this).find('.plus').replaceWith('<svg class="cross" xmlns="http://www.w3.org/2000/svg" width="19.644" height="19.644" viewBox="0 0 19.644 19.644"><g transform="translate(150.338 339.687) rotate(-135)"><line x2="26.22" transform="translate(319.5 133.89)" fill="none" stroke="#fff" stroke-width="1"/><line y1="26.78" transform="translate(332.61 120.5)" fill="none" stroke="#fff" stroke-width="1"/></g></svg>');
    }
    else {
      jQuery(this).find('.cross').replaceWith('<svg class="plus" xmlns="http://www.w3.org/2000/svg" width="26.78" height="26.22" viewBox="0 0 26.78 26.22"><g transform="translate(-120.5 345.72) rotate(-90)"><line x2="26.22" transform="translate(319.5 133.89)" fill="none" stroke="#00294c" stroke-width="1"/><line y1="26.78" transform="translate(332.61 120.5)" fill="none" stroke="#00294c" stroke-width="1"/></g></svg>');
    }
  });
});

