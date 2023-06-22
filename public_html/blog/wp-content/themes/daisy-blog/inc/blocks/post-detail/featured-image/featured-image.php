<?php


add_action( 'customize_register', 'daisy_blog_post_detail_featured_image' );
function daisy_blog_post_detail_featured_image( $wp_customize ) {

	$wp_customize->add_setting( 'post_detail_hide_show_featured_image', array(
        'sanitize_callback'     =>  'daisy_blog_sanitize_checkbox',
        'default'               =>  daisy_blog_get_default_post_detail_featured_image()
    ) );

    $wp_customize->add_control( new Graphthemes_Toggle_Control( $wp_customize, 'post_detail_hide_show_featured_image', array(
        'label' => esc_html__( 'Show/Hide Featured Image','daisy-blog' ),
        'section' => 'daisy_blog_post_detail_customization_section',
        'settings' => 'post_detail_hide_show_featured_image',
        'type'=> 'toggle',
    ) ) );

}


add_action( 'customize_register', 'daisy_blog_post_detail_featured_image_size' );
function daisy_blog_post_detail_featured_image_size( $wp_customize ) {

    $wp_customize->add_setting( 'post_detail_featured_image_size', array(
        'default'     => daisy_blog_get_default_post_detail_featured_image_size(),
        'sanitize_callback' => 'daisy_blog_sanitize_select',
    ) );

    $wp_customize->add_control( 'post_detail_featured_image_size', array(
        'settings'    => 'post_detail_featured_image_size',
        'label'       =>  esc_html__( 'Post Thumbnail Options:', 'daisy-blog' ),
        'section'     => 'daisy_blog_post_detail_customization_section',
        'type'        => 'select',
        'active_callback' => function(){
            return get_theme_mod( 'post_detail_hide_show_featured_image', daisy_blog_get_default_post_detail_featured_image() );
        },
        'choices'     => array(
            'thumbnail' => esc_html__( 'Thumbnail', 'daisy-blog' ),
            'medium' => esc_html__( 'Medium', 'daisy-blog' ),
            'large' => esc_html__( 'Large', 'daisy-blog' ),
            'full' => esc_html__( 'Full / Original', 'daisy-blog' ),
        )
    ) );

}