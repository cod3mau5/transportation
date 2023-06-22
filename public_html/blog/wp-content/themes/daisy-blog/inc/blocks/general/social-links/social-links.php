<?php

function graphthemes_get_social_links() {
    $social_links = array(
        esc_html__( 'Facebook', 'daisy-blog' ),
        esc_html__( 'Instagram', 'daisy-blog' ),
        esc_html__( 'Youtube', 'daisy-blog' ),
        esc_html__( 'LinkedIn', 'daisy-blog' ),
        esc_html__( 'Twitter', 'daisy-blog' ),
        esc_html__( 'Pinterest', 'daisy-blog' ),
        esc_html__( 'TikTok', 'daisy-blog' )
    );

    return $social_links;
}

add_action( 'customize_register', 'daisy_blog_social_links' );
function daisy_blog_social_links( $wp_customize ) {

    $social_links = graphthemes_get_social_links();

    $social_links_title = "<hr/><h2>".esc_html__( "Social Links:", 'daisy-blog' )."</h2>";

    $wp_customize->add_setting( 'social_links_title', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( new Daisy_Blog_Custom_Text( $wp_customize ,'social_links_title',array(
        'section' => 'daisy_blog_general_customization_section',
        'label' => $social_links_title
    ) ) );


    if( $social_links ) {
        foreach( $social_links as $social_link ) {

            $wp_customize->add_setting( 'social_links_' . strtolower( $social_link ), array(
                'sanitize_callback' => 'esc_url_raw',
            ) );

            $wp_customize->add_control( 'social_links_' . strtolower( $social_link ), array(
                'label'       => $social_link,
                'section'     => 'daisy_blog_general_customization_section',
                'type'        => 'text'
            ) );

        }
    }

}