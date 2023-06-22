<?php

/*************************************************************************************************************************
 * Enqueue all CSS and JS
 ************************************************************************************************************************/

if ( ! function_exists( 'minimalist_blog_enqueue_cs_js' ) ) :

function minimalist_blog_enqueue_cs_js() {
    $theme          = wp_get_theme();
    $theme_version  = $theme->get( 'Version' );

    $minimalist_blog_primary_color  = esc_attr( get_theme_mod( 'minimalist_blog_primary_color_setting' ) ); //E.g. #FF0000
    $minimalist_blog_custom_css     = "
        .single-masonry .post-date,
        .menubar-close,
        .button,
        .ct-slider-main .ct-cat,
        .item-block .post-excerpt .post-date {
            background-color: {$minimalist_blog_primary_color};
        }
        .grid-item a,
        .footer a:hover,
        a:hover,
        .button:hover,
        .link-pages > .page-numbers,
        h4,
        .next-post-wrap::before,
        .previous-post-wrap::before,
        .main-nav li a:hover,
        ul .highlight::after,
        .ct-slider-main .ct-caption .fpc-underline,
        .item-block .fpc-underline {
            color: {$minimalist_blog_primary_color};
        }
        .button:hover,
        .link-pages > .page-numbers,
        .button {
            border: 1px solid {$minimalist_blog_primary_color};
        }
        .footer {
            border-top: 2px solid {$minimalist_blog_primary_color};
        }
        .footer .footer-site-info {
            border-top: 1px solid {$minimalist_blog_primary_color};
        }
        .grid-item .post-wrap:hover,
        .main-nav > .menu-item-has-children:hover > ul,
        .sticky .post-wrap {
            border-bottom: 1px solid {$minimalist_blog_primary_color};
        }
        .main-nav .menu-item-has-children .menu-item-has-children > ul {
            border-left: 1px solid {$minimalist_blog_primary_color};
        }
        .form-submit #submit,
        .search-submit,
        input[type=\"search\"].search-field,
        input:hover,
        input[type=\"text\"]:hover,
        input[type=\"email\"]:hover,
        input[type=\"url\"]:hover,
        textarea:hover,
        input[type=\"search\"].wp-block-search__input,
        .wp-block-search__button,
        .item-block .fpc-underline,
        .input-newsletter > input,
        .input-newsletter .input-newsletter-button > input  {
            border-bottom-color: {$minimalist_blog_primary_color};
        }
        .single-post-content .post-date,
        .single-page-content .post-date {
            background-color: {$minimalist_blog_primary_color};
            border: 1rem solid {$minimalist_blog_primary_color};
        }
        .entry-footer,
        .comment {
            border-top: 2px solid {$minimalist_blog_primary_color};
        }
        .bypostauthor article {
            border: 2px solid {$minimalist_blog_primary_color};
        }/* Mozilla based browser */
        ::-moz-selection {
            background-color: {$minimalist_blog_primary_color};
            color: #fff;
        }

        /* Opera browser */
        ::-o-selection {
            background-color: {$minimalist_blog_primary_color};
            color: #fff;
        }

        /* Internet Explorer browser*/
        ::-ms-selection {
            background-color: {$minimalist_blog_primary_color};
            color: #fff;
        }

        /* Chrome and safari browser */
        ::-webkit-selection {
            background-color: {$minimalist_blog_primary_color};
            color: #fff;
        }

        /* Default */
        ::selection {
            background-color: {$minimalist_blog_primary_color};
            color: #fff;
        }";

    wp_enqueue_style( 'minimalist-blog-gfonts', minimalist_blog_fonts_url(), array(), '1.0.0' );
    wp_enqueue_style( 'minimalist-blog-fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'minimalist-blog-normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'minimalist-blog-skeleton', get_template_directory_uri() . '/assets/css/skeleton.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'minimalist-blog-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), $theme_version, 'all' );
    wp_enqueue_style( 'minimalist-blog-style-css', get_template_directory_uri() . '/style.css', array(), $theme_version, 'all' );

    $minimalist_blog_check_color = get_theme_mod( 'minimalist_blog_primary_color_setting' );
    if ( !empty( $minimalist_blog_check_color ) ) {
        wp_add_inline_style( 'minimalist-blog-style-css', $minimalist_blog_custom_css );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    wp_enqueue_script( 'masonry' );
    wp_enqueue_script( 'minimalist-blog-jquery-custom', get_template_directory_uri() . '/assets/js/jquery-custom.js', array( 'jquery' ), $theme_version, true );
}

endif;

add_action( 'wp_enqueue_scripts', 'minimalist_blog_enqueue_cs_js' );
