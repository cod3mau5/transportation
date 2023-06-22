<?php

/* Theme Setup */
if ( !function_exists( 'minimalist_blog_setup' ) ):

	function minimalist_blog_setup() {
		/**
		 * Adds theme support for featured image
		 */
		add_theme_support( 'post-thumbnails' );

		/* Image Ratio - 16:9 */
		add_image_size( 'minimalist_blog-1200-16x9', 1200, 675, true );
		

		/* Image Ratio - 665x525 */
		add_image_size( 'minimalist_blog-6x5', 665, 525, true );
		
		/* Image Ratio - 330x220 */
		add_image_size( 'minimalist_blog-3x2', 330, 220, true );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Adds theme support for automatically adding document title by WordPress
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'minimalist-blog' );
		/**
		 * Adds custom background support.
		 */
		add_theme_support( 'custom-background', array(
		    'default-color' => 'ffffff',
		  )
		);

		/**
		 * Register Navigation Menu
		 */
		register_nav_menus( array (
		    'header_menu' => esc_html__( 'Header Menu', 'minimalist-blog' ),
			'mobile_menu' => esc_html__( 'Mobile Menu', 'minimalist-blog' )
		 ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 220,
				'width'       => 55,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		*/
		add_editor_style( array( 'assets/css/editor-style.css', minimalist_blog_fonts_url() ) );
	}

endif;

add_action( 'after_setup_theme', 'minimalist_blog_setup' );
