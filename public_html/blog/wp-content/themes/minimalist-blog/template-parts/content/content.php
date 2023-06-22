<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item four columns single-masonry' ); ?>>
	<div class="post-wrap">

		<?php
			// Retrieve featured image values from the database.
			$minimalist_blog_image_id       = get_post_thumbnail_id();
			$minimalist_blog_image_path     = wp_get_attachment_image_src( $minimalist_blog_image_id, 'full', true );
			$minimalist_blog_image_alt      = get_post_meta( $minimalist_blog_image_id, '_wp_attachment_image_alt', true );
			$minimalist_blog_alt            = !empty( $minimalist_blog_image_alt ) ? $minimalist_blog_image_alt : the_title_attribute( 'echo=0' ) ;
		?>

		<?php if ( has_post_thumbnail() ) : ?>
	        <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
	            <img src="<?php echo esc_url( $minimalist_blog_image_path[0] ); ?>" alt="<?php echo esc_attr( $minimalist_blog_alt ); ?>" title="<?php the_title_attribute(); ?>" />
	        </a>
		<?php endif; ?>

		<div class="post-excerpt">
			<div class="post-date">
				<span><?php echo esc_html( get_the_date() ); ?></span>
			</div><!-- /.post-date -->
			<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
			<?php the_excerpt(); ?>

			<div class="excerpt-footer clearfix">
				<div class="excerpt-author">
					<div class="author-name"><?php the_author(); ?></div><!-- /.author-name -->
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?></a>
				</div><!-- /.excerpt-author -->

					<?php
						$minimalist_blog_categories_list = get_the_category_list( esc_html__( ' / ', 'minimalist-blog' ) );
						if ( $minimalist_blog_categories_list ) {
							printf(
								/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
								'<div class="excerpt-category">%1$s</div><!-- /.excerpt-category -->',
								$minimalist_blog_categories_list
							); // WPCS: XSS OK.
						}
					?>

				<div class="excerpt-comments">
					<div class="comments-count">
						<?php comments_number( esc_html__( '0 Comment', 'minimalist-blog' ), esc_html__( '1 Comment', 'minimalist-blog' ), esc_html__( '% Comments', 'minimalist-blog' ) ); ?>
					</div><!-- /.comments-count -->
				</div><!-- /.excerpt-comments -->
			</div><!-- /.excerpt-footer -->
		</div><!-- /.post-excerpt -->
	</div><!-- /.post-wrap -->
</div><!-- /.grid-item single-masonry -->
