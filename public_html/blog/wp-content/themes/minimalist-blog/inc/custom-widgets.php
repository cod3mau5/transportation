<?php
/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if ( ! function_exists( 'minimalist_blog_widgets_init' ) ) :

function minimalist_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'minimalist-blog' ),
		'id'            => 'minimalist_blog-main-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in your single post sidebar area.', 'minimalist-blog' ),
		'before_widget' => '<div id="%1$s" class="%2$s sidebar-widgetarea widgetarea">',
		'after_widget'  => '</div><!-- /.sidebar-widgetarea -->',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Left', 'minimalist-blog' ),
		'id'            => 'minimalist_blog-footer-left',
		'description'   => esc_html__( 'Add widgets here to appear on your left footer section.', 'minimalist-blog' ),
		'before_widget' => '<div id="%1$s" class="%2$s widgetarea">',
		'after_widget'  => '</div><!-- /.widgetarea -->',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Middle', 'minimalist-blog' ),
		'id'            => 'minimalist_blog-footer-middle',
		'description'   => esc_html__( 'Add widgets here to appear on your middle footer section.', 'minimalist-blog' ),
		'before_widget' => '<div id="%1$s" class="%2$s widgetarea">',
		'after_widget'  => '</div><!-- /.widgetarea -->',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Right', 'minimalist-blog' ),
		'id'            => 'minimalist_blog-footer-right',
		'description'   => esc_html__( 'Add widgets here to appear on your right footer section.', 'minimalist-blog' ),
		'before_widget' => '<div id="%1$s" class="%2$s widgetarea">',
		'after_widget'  => '</div><!-- /.widgetarea -->',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

endif;

add_action( 'widgets_init', 'minimalist_blog_widgets_init' );
