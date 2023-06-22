<?php


add_action( 'customize_register', 'daisy_blog_register_font_customization_section' );
function daisy_blog_register_font_customization_section( $wp_customize ) {

	$wp_customize->add_section( 'daisy_blog_font_customization_section', array(
	    'title'	=> esc_html__( 'Font Options', 'daisy-blog' ),
	    'priority'	=> 20
	) );

}


/* Add Default Font Customization for Customizer Settings */
require dirname( __FILE__ ) . '/default-font-customization.php';

require dirname( __FILE__ ) . '/logo-size/logo-size.php';

require dirname( __FILE__ ) . '/site-identity-font-size/site-identity-font-size.php';

require dirname( __FILE__ ) . '/font-size/font-size.php';

require dirname( __FILE__ ) . '/font-weight/font-weight.php';

require dirname( __FILE__ ) . '/line-height/line-height.php';



