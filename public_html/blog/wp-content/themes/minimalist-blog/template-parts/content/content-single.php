<?php
/**
 * Template part for displaying posts
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

		<div class="post-date">
			<span class="day-month year"><?php echo esc_html( get_the_date() ); ?></span>
		</div><!-- /.post-date -->

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="post-content clearfix">
			<?php
				the_content(
					sprintf(
						/* translators: %s: Name of current post */
						__( '<span class="screen-reader-text"> "%s"</span>', 'minimalist-blog' ),
						get_the_title()
					)
				);
			?>
		</div><!-- /.post-content -->

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

		<div class="post-edit">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'minimalist-blog' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</div><!-- /.post-edit -->

		<div class="display-meta clearfix">
			<?php
				$minimalist_blog_categories_list = get_the_category_list( esc_html__( ' / ', 'minimalist-blog' ) );
				if ( $minimalist_blog_categories_list ) {
					printf(
						/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
						'<div class="display-category">%1$s</div><!-- /.display-category -->',
						$minimalist_blog_categories_list
					); // WPCS: XSS OK.
				}
			?>

			<div class="display-tag">
				<?php
					if( $minimalist_blog_tags = get_the_tags() ) {
						echo '<span class="meta-sep"></span>';
						foreach( $minimalist_blog_tags as $minimalist_blog_tag ) {
							$minimalist_blog_sep = ( $minimalist_blog_tag === end( $minimalist_blog_tags ) ) ? '' : ', ';
							echo '<a href="' . esc_url( get_term_link( $minimalist_blog_tag, $minimalist_blog_tag->taxonomy ) ) . '">#' . esc_html( $minimalist_blog_tag->name ) . '</a>' . esc_html( $minimalist_blog_sep );
						}
					}
				?>
			</div><!-- /.display-tag -->
		</div><!-- /.display-meta -->
		<div class="pagination-single">
			<div class="pagination-nav clearfix">
				<?php $minimalist_blog_prev_post = get_adjacent_post( false, '', false ); ?>
				<?php if ( is_a( $minimalist_blog_prev_post, 'WP_Post' ) ) { ?>
				<div class="previous-post-wrap">
					<div class="previous-post"><a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', false)->ID ) ); ?>"><?php esc_html_e( 'Previous Post', 'minimalist-blog' ); ?></a></div><!-- /.previous-post -->
					<a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', false)->ID ) ); ?>" class="prev"><?php echo esc_html( get_the_title( $minimalist_blog_prev_post->ID ) ); ?></a>
				</div><!-- /.previous-post-wrap -->
				<?php } ?>

				<?php $minimalist_blog_next_post = get_adjacent_post( false, '', true ); ?>
				<?php if ( is_a( $minimalist_blog_next_post, 'WP_Post' ) ) { ?>
				<div class="next-post-wrap">
					<div class="next-post"><a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', true)->ID ) ); ?>"><?php esc_html_e( 'Next Post', 'minimalist-blog' ); ?></a></div><!-- /.next-post -->
					<a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', true)->ID ) ); ?>" class="next"><?php echo esc_html( get_the_title( $minimalist_blog_next_post->ID ) ); ?></a>
				</div><!-- /.next-post-wrap -->
				<?php } ?>
			</div><!-- /.pagination-nav -->
		</div><!-- /.pagination-single-->
	</div><!-- /.single-post-content -->

	<?php
		$minimalist_blog_author_image_class = '';
		if ( get_the_author_meta( 'description' ) ) {
			$minimalist_blog_author_image_class = "ct-has-description";
		}
	?>

	<div class="entry-footer">
		<div class="author-info vertical-align">
			<div class="author-image <?php echo esc_attr( $minimalist_blog_author_image_class ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
			</div><!-- /.author-image -->
			<div class="author-details">
				<p class="entry-author-label"><?php echo esc_html__( 'About the author', 'minimalist-blog' ) ?></p>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="author-name"><?php the_author(); ?></span><!-- /.author-name --></a>
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<p><?php the_author_meta( 'description' ); ?></p>
				<?php endif; ?>
				<div class="author-link">
					<?php if ( get_the_author_meta( 'user_url' ) ): ?>
						<a href="<?php the_author_meta( 'user_url' ); ?>"><?php esc_html_e( 'Visit Website', 'minimalist-blog' );?></a>
					<?php endif ?>
				</div><!-- /.author-link -->
			</div><!-- /.author-details -->
		</div><!-- /.author-info -->
	</div><!-- /.entry-footer -->
</div>
