/**
 * Table of Contents:
 *
 * 1.0 - Mobile Menu
 * 2.0 - Sticky Header
 * 3.0 - Masonry Layout
 */

(function ($) {

	/**
	 * 1.0 - Mobile menu
	 */

	$('.dropdown-toggle').on('click', function () {
		$(this).toggleClass('toggled');
		$(this).next().slideToggle();
	});

	// Function to show the menu
	function show_menu() {
		$('.nav-parent').addClass('mobile-menu-open');
	}

	// Function to hide the menu
	function hide_menu() {
		$('.nav-parent').removeClass('mobile-menu-open');
	}

	$('.menubar-right').on('click', show_menu);
	$('.mobile-menu-overlay').on('click', hide_menu);
	$('.menubar-close').on('click', hide_menu);

	/**
	 * 2.0 - Sticky Header
	 */

	$(window).on('scroll', function () {
		if ($(window).scrollTop()) {
			$('.site-header').addClass('stuck');
		} else {
			$('.site-header').removeClass('stuck');
		}
	});

	/**
	 * 3.0 - Masonry Layout
	 */

	var $grid = $('.grid').masonry({
		// options
		itemSelector: '.grid-item'
	});

	// layout Masonry after each image loads
	$grid.imagesLoaded().progress(function () {
		$grid.masonry('layout');
	});

	/**
	* Keyboard Navigation
	*/

	// If Tab key pressed
	$('.menu-item-has-children').on({
		keyup: function (e) {
			var keyCode = e.keyCode || e.which;
			if (keyCode == 9) {
				$(this).children('ul').addClass('is-focused');
			}
		}
	});

	// If Tab + Shift key pressed
	$('.menu-item-has-children').keydown(function (e) {
		if (e.which == 9) {
			$(this).children('.sub-menu').removeClass('is-focused');
		}
	});

	// If focuse out
	$('.menu-item-has-children .sub-menu').focusout(function (e) {
		if ($(this).children('.menu-item-has-children').length === 0) {
			$(this).removeClass('is-focused');
			$(this).parents('.is-focused').removeClass('is-focused');
		}
	});

	// Nav menu shift+tab on close icon
	$('.menubar-close').keydown(function (e) {
		if (e.which == 9) {
			if (e.shiftKey) {
				$(this).parent().removeClass('mobile-menu-open');
			}
		}
	});

	// Hide mobile menu on shitf+tab keypress on first menu item
	$('.mobile-nav .menu-item:first-child').keydown(function (e) {
		if (e.which == 9) {
			if (e.shiftKey) {
				$(this).parents('.nav-parent').removeClass('mobile-menu-open');
			}
		}
	});

	// Mobile menu trap on close button tab
	$('.menubar-close').focusout(function (e) {
		$('.mobile-nav li:first-child a:first-child').focus();
	});

	// Search Icon Focus
	$('.js-search-icon').on({
		keyup: function (e) {
			$('.search-dropdown').addClass('search-shown');
			$('.prr-icon-close').addClass('js-shown').show();
			$('.header-search-form').addClass('prr-tab-focus');
		}
	});

	// Trap
	$('.prr-icon-close').focusout(function (e) {
		e.preventDefault();
		$('.search-field').focus();
	});

	// Enter press ( 13 ) on close icon: Search
	$('.prr-icon-close').keydown(function (e) {
		if (e.which == 13) {
			e.preventDefault();
			$('.search-dropdown').addClass('search-hidden').removeClass('search-shown');
			$(this).hide();
		}
	});

	// If Tab + Shift key pressed
	$('.js-search-icon').keydown(function (e) {
		if (e.which == 9) {
			if (e.shiftKey) {
				$('.search-dropdown').addClass('search-hidden').removeClass('search-shown');
			}
		}
	});

	// Hide menu and search icon on escape key press
	$(document).keydown(function (e) {
		if (e.key === "Escape") {
			$('.nav-parent').removeClass('mobile-menu-open');
		}
	});

})(jQuery);
