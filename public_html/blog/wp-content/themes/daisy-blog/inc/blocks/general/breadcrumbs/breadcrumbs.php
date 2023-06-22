<?php

add_action( 'customize_register', 'daisy_blog_breadcrumbs' );
function daisy_blog_breadcrumbs( $wp_customize ) {

	$wp_customize->add_setting('daisy_blog_breadcrumbs_option', array(
        'sanitize_callback'     =>  'daisy_blog_sanitize_checkbox',
        'default'               =>  daisy_blog_get_default_breadcrumbs(),
    ));

    $wp_customize->add_control(new Graphthemes_Toggle_Control($wp_customize, 'daisy_blog_breadcrumbs_option', array(
        'label' => esc_html__('Enable Breadcrumbs', 'daisy-blog'),
        'section' => 'daisy_blog_general_customization_section',
        'settings' => 'daisy_blog_breadcrumbs_option',
        'type' => 'toggle',
    )));

}