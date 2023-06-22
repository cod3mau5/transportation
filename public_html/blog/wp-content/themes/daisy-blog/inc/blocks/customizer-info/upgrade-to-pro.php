<?php

function daisy_blog_customizer_upgrade_to_pro( $wp_customize ) {

	$wp_customize->add_section( new Daisy_Blog_Button_Control( $wp_customize, 'upgrade-to-pro',	array(
		'title'    => esc_html__( '★ Daisy Blog Pro ', 'daisy-blog' ),
		'type'	=> 'button',
		'pro_text' => esc_html__( 'Upgrade to Pro', 'daisy-blog' ),
		'pro_url'  => esc_url( 'https://graphthemes.com/daisy-blog/' ),
		'priority' => 1
	) )	);

	
}
add_action( 'customize_register', 'daisy_blog_customizer_upgrade_to_pro' );


function daisy_blog_enqueue_custom_admin_style() {
        wp_register_style( 'daisy-blog-button', get_template_directory_uri() . '/inc/blocks/includes/button/button.css', false );
        wp_enqueue_style( 'daisy-blog-button' );

        wp_enqueue_script( 'daisy-blog-button', get_template_directory_uri() . '/inc/blocks/includes/button/button.js', array( 'jquery' ), false, true );
}
add_action( 'admin_enqueue_scripts', 'daisy_blog_enqueue_custom_admin_style' );