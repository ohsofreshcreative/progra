import $ from 'jquery';

$(document).ready(function () {
  'use strict';

  let c, currentScrollTop = 0;
  const navbar = $('.masthead.fixed-top');
  const desktopViewport = window.matchMedia('(min-width: 769px)');

  $(window).on('scroll', function () {
    if (desktopViewport.matches) {
      navbar.removeClass('scrollUp scrollDown scrollTop');
      return;
    }

    const a = $(window).scrollTop();
    const b = navbar.height();

    currentScrollTop = a;

    if (c < currentScrollTop && a > b) {
      navbar.addClass('scrollUp').removeClass('scrollTop');
    } else if (c > currentScrollTop && !(a <= b)) {
      navbar.removeClass('scrollUp').addClass('scrollDown').removeClass('scrollTop');
    } else if ($(document).scrollTop() < 500) {
      navbar.addClass('scrollTop').removeClass('scrollUp scrollDown');
    }

    c = currentScrollTop;
  });
});