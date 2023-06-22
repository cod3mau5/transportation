<?php

/*******************************************************************************
 *  Get Started Notice
 *******************************************************************************/

add_action( 'wp_ajax_minimalist_blog_dismissed_notice_handler', 'minimalist_blog_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function minimalist_blog_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function minimalist_blog_deprecated_hook_admin_notice() {
        $theme = wp_get_theme();
        $theme_name = esc_html( $theme->get( 'Name' ) );

        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
            // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
            // and added "data-notice" attribute in order to track multiple / different notices
            // multiple dismissible notice states ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="crafthemes-getting-started-notice clearfix">
                    <div class="ct-theme-screenshot">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'minimalist-blog' ); ?>" />
                    </div><!-- /.ct-theme-screenshot -->
                    <div class="ct-theme-notice-content">
                        <h2 class="ct-notice-h2">
                            <?php
                                /* translators: %1$s: Theme Name %2$s: Anchor link end %3$s: Anchor link end */
                                printf( esc_html__( 'Thank you for choosing %1$s. Please proceed towards the %2$sWelcome page%3$s and give us the privilege to serve you.', 'minimalist-blog' ),
                                    $theme_name,
                                    '<a href="'. esc_url( admin_url( 'themes.php?page=minimalist_blog_about' ) ) . '">',
                                    '</a>' );
                            ?>
                        </h2>

                        <p class="plugin-install-notice"><?php esc_html_e( 'Clicking the button below will install and activate the Crafthemes demo import plugin.', 'minimalist-blog' ) ?></p>

                        <?php  /* translators: 1: Theme Name */ ?>
                        <a class="jquery-btn-get-started button button-primary button-hero ct-button-padding" href="#" data-name="" data-slug=""><?php printf( esc_html__( 'Get started with %1$s', 'minimalist-blog' ), $theme_name ); ?></a><span class="ct-push-down">
                        <?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                'or %1$sCustomize theme%2$s</a></span>',
                                '<a href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                                '</a>'
                            );
                        ?>
                    </div><!-- /.ct-theme-notice-content -->
                </div>
            </div>
        <?php }
}

add_action( 'admin_notices', 'minimalist_blog_deprecated_hook_admin_notice' );

/*******************************************************************************
 *  Plugin Installer
 *******************************************************************************/

add_action( 'wp_ajax_install_act_plugin', 'minimalist_blog_install_plugin' );

function minimalist_blog_install_plugin() {
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/crafthemes-demo-import' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'crafthemes-demo-import' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }
    
    if ( ! file_exists( WP_PLUGIN_DIR . '/contact-form-7' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'contact-form-7' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }
    
    if ( ! file_exists( WP_PLUGIN_DIR . '/mailchimp-for-wp' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'mailchimp-for-wp' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }
    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'crafthemes-demo-import/crafthemes-demo-import.php' );
        $result = activate_plugin( 'contact-form-7/wp-contact-form-7.php' );
        $result = activate_plugin( 'mailchimp-for-wp/mailchimp-for-wp.php' );
    }
}

/*******************************************************************************
 *  Enqueue script
 *******************************************************************************/

if ( ! function_exists( 'minimalist_blog_getting_started_admin_scripts' ) ) :
function minimalist_blog_getting_started_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script( 'minimalist-blog-jquery-getting-started-script', get_template_directory_uri() . '/inc/get-started-notice/jquery-admin-ajax-call.js', array( 'jquery' ), '', true );
    wp_localize_script( 'minimalist-blog-jquery-getting-started-script', 'ct_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
endif;
add_action( 'admin_enqueue_scripts', 'minimalist_blog_getting_started_admin_scripts' );
add_action( 'customize_controls_enqueue_scripts', 'minimalist_blog_getting_started_admin_scripts' );
