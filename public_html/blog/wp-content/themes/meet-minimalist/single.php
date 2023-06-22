<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header();
?>

<div class="container body-container" id="content">
	<div class="row">
        <?php if ( get_theme_mod( 'meet_minimalist_single_post_settings', 'right-sidebar' ) == 'no-sidebar' ) : ?>
			<div class="twelve columns">
		<?php else : ?>
			<div class="nine columns">
        <?php endif; ?>
			<?php
				if ( have_posts() ) :

					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content/content', 'single' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					endwhile; // End of the loop.
				else :

					get_template_part( 'template-parts/content/content', 'none' );

				endif;
			?>
		</div><!-- /.nine columns -->
        
        <?php if ( get_theme_mod( 'meet_minimalist_single_post_settings', 'right-sidebar' ) == 'right-sidebar' ) : ?>
		    <?php get_sidebar(); ?>
        <?php endif; ?>
	</div><!-- /.row -->
</div><!-- /.container -->

<?php
get_footer();
