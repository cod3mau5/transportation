<?php

add_action( 'customize_register', 'daisy_blog_post_detail_social_share' );
function daisy_blog_post_detail_social_share( $wp_customize ) {

	$wp_customize->add_setting( 'post_detail_hide_show_social_share', array(
        'sanitize_callback'     =>  'daisy_blog_sanitize_checkbox',
        'default'               =>  daisy_blog_get_default_post_detail_social_share()
    ) );

    $wp_customize->add_control( new Graphthemes_Toggle_Control( $wp_customize, 'post_detail_hide_show_social_share', array(
        'label' => esc_html__( 'Enable Social Share','daisy-blog' ),
        'section' => 'daisy_blog_post_detail_customization_section',
        'settings' => 'post_detail_hide_show_social_share',
        'type'=> 'toggle',
    ) ) );

}




add_action( 'customize_register', 'daisy_blog_post_detail_social_share_options' );
function daisy_blog_post_detail_social_share_options( $wp_customize ) {

    $wp_customize->add_setting( 'post_detail_social_share_options', array(
        'sanitize_callback' => 'daisy_blog_sanitize_array',
        'default'     => daisy_blog_get_default_post_detail_social_share_options()
    ) );

    $wp_customize->add_control( new Graphthemes_Multi_Check_Control( $wp_customize, 'post_detail_social_share_options', array(
        'label' => esc_html__( 'Social Shares', 'daisy-blog' ),
        'section' => 'daisy_blog_post_detail_customization_section',
        'settings' => 'post_detail_social_share_options',
        'type'=> 'multi-check',
        'choices'     => array(
            'facebook' => esc_html__( 'Facebook', 'daisy-blog' ),
            'twitter' => esc_html__( 'Twitter', 'daisy-blog' ),     
            'pinterest' => esc_html__( 'Pinterest', 'daisy-blog' ),
            'linkedin' => esc_html__( 'LinkedIn', 'daisy-blog' ),
            'email' => esc_html__( 'Email', 'daisy-blog' ),
        ),
        'active_callback' => function() {
            return get_theme_mod( 'post_detail_hide_show_social_share', daisy_blog_get_default_post_detail_social_share() );
        }
    ) ) );

    $wp_customize->add_setting( 'twitter_id', array(
        'sanitize_callback' =>  'wp_kses_post',
    ) );

    $wp_customize->add_control( 'twitter_id', array(
        'label' =>  esc_html__( 'Twitter ID:', 'daisy-blog' ),
        'section'   =>  'daisy_blog_post_detail_customization_section',
        'Settings'  =>  'twitter_id',
        'type'=> 'text',
        'active_callback' => function() {
            return get_theme_mod( 'post_detail_hide_show_social_share', daisy_blog_get_default_post_detail_social_share() );
        }
    ) );

}