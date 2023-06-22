<?php

add_action( 'customize_register', 'daisy_blog_customizer_theme_info' );

function daisy_blog_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'daisy_blog_theme_info_section' , array(
		'title'       => esc_html__( '❂ Theme Info' , 'daisy-blog' ),
		'priority' => 2
	) );
    

	$wp_customize->add_setting( 'theme_info', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
    
    $theme_info = '';
	
	$theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'Theme Details', 'daisy-blog' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://graphthemes.com/daisy-blog/' ) . '" target="_blank">' . esc_html__( 'Click Here', 'daisy-blog' ) . '</a></span><hr>';

	$theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'How to use', 'daisy-blog' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://graphthemes.com/theme-docs/daisy-blog/' ) . '" target="_blank">' . esc_html__( 'Click Here', 'daisy-blog' ) . '</a></span><hr>';
	$theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'View Demo', 'daisy-blog' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://graphthemes.com/preview/?product_id=daisy-blog' ) . '" target="_blank">' . esc_html__( 'Click Here', 'daisy-blog' ) . '</a></span><hr>';
	$theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'Support Forum', 'daisy-blog' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://wordpress.org/support/theme/daisy-blog' ) . '" target="_blank">' . esc_html__( 'Click Here', 'daisy-blog' ) . '</a></span><hr>';

	$wp_customize->add_control( new Daisy_Blog_Custom_Text( $wp_customize ,'theme_info',array(
		'section' => 'daisy_blog_theme_info_section',
		'label' => $theme_info
	) ) );

}