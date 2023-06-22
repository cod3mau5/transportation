<?php

/**
 * Add Customizer Options
 */

/*************************************************************************************************************************
 * Accent Color
 ************************************************************************************************************************/

function minimalist_blog_accent_color_setup( $wp_customize ) {

  /******************************** Primary Color *****************************/
    $wp_customize->add_setting( 'minimalist_blog_primary_color_setting', array(
      'default'   => '#43c6ac',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'minimalist_blog_primary_color_control', array(
      'section' => 'colors',
      'label'   => esc_html__( 'Primary color', 'minimalist-blog' ),
      'settings'      =>  'minimalist_blog_primary_color_setting',
    ) ) );
}

add_action( 'customize_register', 'minimalist_blog_accent_color_setup');
