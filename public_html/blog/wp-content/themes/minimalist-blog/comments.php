<?php
/**
 * The template for displaying comments
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="block">
	<div class="sub-block">
		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) : ?>
			<h3 class="comments-title">
				<?php comments_number(
					esc_html__( 'No Responses', 'minimalist-blog' ),
					esc_html__( 'One Response', 'minimalist-blog' ),
					esc_html__( '% Responses', 'minimalist-blog' )
					);
				?>
			</h3>

			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'avatar_size' => 42,
						'style'       => 'ol',
						'short_ping'  => true,
					) );
				?>
			</ol> <!-- /.comment-list .container -->

			<?php the_comments_pagination( array(
				'prev_text' => esc_html__( 'Previous', 'minimalist-blog' ),
				'next_text' => esc_html__( 'Next', 'minimalist-blog' ),
			) );

		endif; // Check for have_comments().

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'minimalist-blog' ); ?></p>
		<?php
		endif;
		comment_form();
		?>
	</div><!-- /.sub-block -->
</div><!-- #comments -->
