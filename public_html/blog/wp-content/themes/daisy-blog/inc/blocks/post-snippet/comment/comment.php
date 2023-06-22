<?php

add_action( 'customize_register', 'daisy_blog_post_snippet_comment' );
function daisy_blog_post_snippet_comment( $wp_customize ) {

	$wp_customize->add_setting( 'post_snippet_hide_show_comment', array(
        'sanitize_callback'     =>  'daisy_blog_sanitize_checkbox',
        'default'               =>  daisy_blog_get_default_post_snippet_comment()
    ) );

    $wp_customize->add_control( new Graphthemes_Toggle_Control( $wp_customize, 'post_snippet_hide_show_comment', array(
        'label' => esc_html__( 'Show/Hide Number of Comments','daisy-blog' ),
        'section' => 'daisy_blog_post_snippet_customization_section',
        'settings' => 'post_snippet_hide_show_comment',
        'type'=> 'toggle',
    ) ) );

}