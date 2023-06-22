<?php

add_action( 'customize_register', 'daisy_blog_show_hide_site_tagline' );
function daisy_blog_show_hide_site_tagline( $wp_customize ) {

    $wp_customize->add_setting( 'show_hide_site_tagline', array(
        'sanitize_callback'     =>  'daisy_blog_sanitize_checkbox',
        'default'               =>  daisy_blog_get_default_site_tagline_show_hide()
    ) );

    $wp_customize->add_control( new Graphthemes_Toggle_Control( $wp_customize, 'show_hide_site_tagline', array(
        'label' => esc_html__( 'Show/Hide Site Tagline','daisy-blog' ),
        'section' => 'title_tagline',
        'settings' => 'show_hide_site_tagline',
        'type'=> 'toggle',
    ) ) );

}