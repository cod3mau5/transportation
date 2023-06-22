<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header();
?>

<div class="container body-container">
	<div class="row">

		<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				endwhile; // End of the loop.
			else :

				get_template_part( 'template-parts/content/content', 'none' );

			endif;
		?>

	</div><!-- /.row -->
</div><!-- /.container -->

<?php
get_footer();
