<?php
	/**
	 * Pagination for blog.
	 */

	global $wp_query;
	$minimalist_blog_big = 999999999; // need an unlikely integer

	if ( $wp_query->max_num_pages <= 1 ) {
	    return;
	}
?>
	<div class="navigation pagination" role="navigation">

	    <div class="nav-links left">
	        <?php
				the_posts_pagination( array(
					'base' => str_replace( $minimalist_blog_big, '%#%', esc_url(get_pagenum_link( $minimalist_blog_big ) ) ),
					'format' => '?paged=%#%',
					'add_args' => false,
					'current' => max( 1, get_query_var( 'paged' ) ),
					'total' => $wp_query->max_num_pages,
					'mid_size' => 4,
					'prev_text' => esc_html__( 'Prev', 'minimalist-blog' ),
					'next_text' => esc_html__( 'Next', 'minimalist-blog' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'minimalist-blog' ) . ' </span>',
				) );
	        ?>
	    </div>
	</div>
