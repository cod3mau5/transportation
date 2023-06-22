<?php
/**
 * Template part for displaying single pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ): ?>
		<div class="featured-single-image">
			<?php the_post_thumbnail( 'minimalist-blog-1200-16x9' ) ?>
		</div><!-- /.image-container -->
	<?php endif; ?>

	<div class="single-post-content post-single white clearfix">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php
			the_content(
				sprintf(
					/* translators: %s: Name of current post */
					__( '<span class="screen-reader-text"> "%s"</span>', 'minimalist-blog' ),
					get_the_title()
				)
			);
		?>

		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="link-pages-wrap clearfix"><div class="link-pages">' . esc_html__( 'Continue Reading:', 'minimalist-blog' ),
					'after'       => '</div></div>',
					'link_before' => '<span class="page-numbers button">',
					'link_after'  => '</span>',
				)
			);
		?>
	</div><!-- /.single-post-content -->
</div>
