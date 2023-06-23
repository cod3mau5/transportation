<?php

/**
 * All theme custom functions are delared here
 */

/*************************************************************************************************************************
 * Loads google fonts to the theme
 * Thanks to themeshaper.com
 ************************************************************************************************************************/

if ( ! function_exists( 'minimalist_blog_fonts_url' ) ) :

function minimalist_blog_fonts_url() {
  $minimalist_blog_fonts_url  = '';
  $minimalist_blog_lora   = _x( 'on', 'Lora font: on or off', 'minimalist-blog' );
  $minimalist_blog_rubik = _x( 'on', 'Rubik font: on or off', 'minimalist-blog' );

  if ( 'off' !== $minimalist_blog_lora || 'off' !== $minimalist_blog_rubik ) {
    $minimalist_blog_font_families = array();

    if ( 'off' !== $minimalist_blog_lora ) {
      $minimalist_blog_font_families[] = 'Lora:700i';
    }

    if ( 'off' !== $minimalist_blog_rubik ) {
      $minimalist_blog_font_families[] = 'Rubik:400,500,700';
    }
  }

  $minimalist_blog_query_args = array(
    'family' => urlencode( implode( '|', $minimalist_blog_font_families ) ),
    'subset' => urlencode( 'cyrillic-ext,cyrillic,vietnamese,latin-ext,latin' )
  );

  $minimalist_blog_fonts_url = add_query_arg( $minimalist_blog_query_args, 'https://fonts.googleapis.com/css' );

  return esc_url_raw( $minimalist_blog_fonts_url );
}

endif;

/*************************************************************************************************************************
 * Set the content width
 ************************************************************************************************************************/

if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

/*************************************************************************************************************************
 * Delay pro notice after_setup_theme
 ************************************************************************************************************************/

if ( ! function_exists( 'minimalist_blog_delay_pro_notice' ) ) :

function minimalist_blog_delay_pro_notice() {

  global $pagenow;

  if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
    if (!isset($_COOKIE['statepro'])) {
      setcookie('statepro', 'hidden',  time()+86400); // 1 day
    }
  }
}

endif;

add_action( 'after_setup_theme', 'minimalist_blog_delay_pro_notice' );

/*************************************************************************************************************************
 * Minimalist Blog Pro notice
 ************************************************************************************************************************/

function minimalist_blog_pro_notice() {
    global $pagenow;
    if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
        $pro_state = esc_html( 'hidden' );
    } else if( isset( $_COOKIE[ 'statepro' ] ) ) {
        $pro_state = sanitize_text_field( wp_unslash( $_COOKIE[ 'statepro' ] ) );
    } else {
        $pro_state = '';
    }

    ?>
    <div class="notice notice-warning is-dismissible pro-notice <?php echo $pro_state; ?>">
        <h2><?php esc_html_e( 'UPGRADE to Minimalist Blog Pro and unlock all the PREMIUM Features!', 'minimalist-blog' ); ?></h2>
        <p><?php esc_html_e( 'Get the best out of your blog with Minimalist Blog Pro! Minimalist blog pro offers Intro Header, Dark Mode Feature, Auto Loading Posts on Scroll, Customizable typography, Optimized SEO, Ads Integration and many more fearures. You will also get Premium support for your theme.', 'minimalist-blog' ); ?></p>
        <a href="https://www.crafthemes.com/theme/minimalist-blog-pro/" target="_blank"><button id="buy-pro-btn" type="button" class="button button-primary"><?php esc_html_e( 'Upgrade to Pro!', 'minimalist-blog' ); ?></button></a> <strong><a class="left-margin-compare" href="https://www.crafthemes.com/go/minimalist-pro-demo"><?php esc_html_e( 'Live Demo', 'minimalist-blog' ); ?></a></strong><strong><a class="pro-notice-dismiss" href="#"><?php esc_html_e( 'Dismiss this notice', 'minimalist-blog' ); ?></a></strong>
    </div>

    <script>
      ( function($) {

        function createCookie(name,value,days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime()+(days*24*60*60*1000));
                var expires = "; expires="+date.toGMTString();
            } else {
                var expires = "";
            }
            document.cookie = name+"="+value+expires+"; path=/";
        }

        $( '.pro-notice-dismiss' ).click(function() {
          createCookie("statepro", "hidden", 10000000);
          $( '.pro-notice' ).addClass( 'hidden' );
        });
      } )( jQuery );
    </script>
    <?php
}
add_action( 'admin_notices', 'minimalist_blog_pro_notice' );

/*************************************************************************************************************************
 *  Adds a span tag with dropdown icon after the unordered list
 *  that has a sub menu on the mobile menu.
 ************************************************************************************************************************/

class Minimalist_Blog_Dropdown_Toggle_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$minimalist_blog_output, $minimalist_blog_depth = 0, $minimalist_blog_args = array() ) {
        $minimalist_blog_indent = str_repeat( "\t", $minimalist_blog_depth );
        $minimalist_blog_output .='<a href="#" class="dropdown-toggle"><i class="fa fa-arrow-down"></i></a>';
        $minimalist_blog_output .= "\n$minimalist_blog_indent<ul class=\"sub-menu\">\n";
    }
}
