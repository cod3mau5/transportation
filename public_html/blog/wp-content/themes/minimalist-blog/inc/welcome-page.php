<?php
// Add a Custom CSS file to Admin Area
if ( ! function_exists( 'minimalist_blog_admin_theme_stylesheet' ) ) :
function minimalist_blog_admin_theme_stylesheet() {
    wp_enqueue_style( 'custom-admin-style', get_template_directory_uri() .'/assets/css/admin-css.css' );
}
endif;

add_action( 'admin_enqueue_scripts', 'minimalist_blog_admin_theme_stylesheet' );



/*******************************************************************************
 *  Adds theme page of ( About Theme )
 *******************************************************************************/

function minimalist_blog_admin_menu() {
    $menus = $GLOBALS[ 'menu' ];
    $priority = array_filter( $menus, function( $item ) {
       return 'themes.php' === $item[2];
    } );
    $priority = ! empty( $priority ) && 1 === count( $priority ) ? key( $priority ) - 1 : null;
 
    add_menu_page(
       __( 'Theme Docs', 'minimalist-blog' ),
       __( 'Theme Docs', 'minimalist-blog' ),
       'edit_theme_options',
       'theme-info.php',
       'minimalist_blog_about',
       'dashicons-admin-customizer',
       $priority
    );
 }
 add_action( 'admin_menu', 'minimalist_blog_admin_menu' );

if ( ! function_exists( 'minimalist_blog_about' ) ) :
function minimalist_blog_about() {

    $theme = wp_get_theme();
    $theme_name = $theme->get( 'Name' );
    $theme_description = $theme->get( 'Description' );
    $theme_user = wp_get_current_user();
    $theme_slug = basename( get_stylesheet_directory() );
?>

<div class="container about-theme">
    <div class="row">
        <div class="twelve columns clearfix">
            <?php /* translators: %s: theme name. */ ?>
            <h1><?php printf( esc_html__( 'Getting started with %s', 'minimalist-blog' ), esc_html( $theme_name ) ); ?></h1>
        </div><!-- /.apex-desh-hl -->
    </div>

    <div class="row apex-screenshot">
        <?php /* translators: 1: Theme user name. 2: Theme name */ ?>
        <div class="six columns clearfix">
            <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'minimalist-blog' ); ?>" />
        </div><!-- /.six columns -->

        <div class="six columns">
            <h3><?php esc_html_e( 'Recommended Plugins', 'minimalist-blog' ); ?></h3>
            <div class="ct-plugin-section">
                <div class="row ct-re-plugin">
                    <div class="twelve columns">
                        <a class="jquery-btn-get-started button button-primary button-hero ct-button-padding" href="#" data-name="" data-slug=""><?php esc_html_e( 'Install Recommended Plugins', 'minimalist-blog' ); ?></a>
                    </div><!-- /.one columns -->
                </div><!-- /.row -->
            </div><!-- /.ct-plugin-section -->
            <div class="ct-content">
                <h3><a href="https://www.crafthemes.com/docs/<?php echo esc_attr( $theme_slug ); ?>-documentation/" target="_blank">    <?php esc_html_e( 'Theme Documentation', 'minimalist-blog' ); ?></a></h3>
                <p>
                    <?php esc_html_e( 'Read about all of the theme settings, and find out about its features.', 'minimalist-blog' ); ?>
                </p>
            </div><!-- /.apex-n-doc -->
            <div class="ct-content">
                <h3><a href="https://www.crafthemes-demo.com/<?php echo esc_attr( $theme_slug ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'minimalist-blog' ); ?></a></h3>
                <p>
                    <?php esc_html_e( 'Checkout the live demo of Minimalist Blog.', 'minimalist-blog' ); ?>
                </p>
            </div><!-- /.apex-n-doc -->
        </div><!-- /.six columns -->
    </div><!-- /.row -->
</div><!-- /.container about-writer -->

<?php
}
endif;
