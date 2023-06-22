<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();
?>

<?php
	if(get_theme_mod("meet_minimalist_show_slider_settings",1 ) == 1){
		get_template_part( 'template-parts/content/slider' );
	}

	if(get_theme_mod("meet_minimalist_cat_container_settings", 1 )) {
		get_template_part( 'template-parts/content/panel' );
	}
?>

<div class="masonry-layout container" id="content">
	<div class="row grid">
		<?php
			if ( have_posts() ) {

				// Load posts loop.
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content/content' );
				}

			} else {

				// If no content, include the "No posts found" template.
				get_template_part( 'template-parts/content/content', 'none' );

			}
		?>
	</div><!-- /.row  -->
</div><!-- /.masonry-layout container -->
<?php
	// Pagination
	get_template_part( 'template-parts/pagination/pagination', get_post_format() );

get_footer();