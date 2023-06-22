<?php

add_action( 'customize_register', 'daisy_blog_sticky_menu' );
function daisy_blog_sticky_menu( $wp_customize ) {

	$wp_customize->add_setting('daisy_blog_sticky_menu_option', array(
        'sanitize_callback'     =>  'daisy_blog_sanitize_checkbox',
        'default'               =>  daisy_blog_get_default_sticky_menu(),
    ));

    $wp_customize->add_control(new Graphthemes_Toggle_Control($wp_customize, 'daisy_blog_sticky_menu_option', array(
        'label' => esc_html__('Enable Sticky Menu', 'daisy-blog'),
        'section' => 'daisy_blog_general_customization_section',
        'settings' => 'daisy_blog_sticky_menu_option',
        'type' => 'toggle',
    )));

}