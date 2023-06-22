<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
		<footer class="footer">
			<?php
				if( is_active_sidebar( 'minimalist_blog-footer-left' )
						|| is_active_sidebar( 'minimalist_blog-footer-middle' )
						|| is_active_sidebar( 'minimalist_blog-footer-right' ) ) :
			?>
			<div class="u-full-width">
				<div class="container">
					<div class="row">
						<div class="six columns">
							<?php
								if( is_active_sidebar( 'minimalist_blog-footer-left' ) ) {
									dynamic_sidebar( 'minimalist_blog-footer-left' );
								}
							?>
						</div><!-- /.six columns -->
						<div class="three columns">
							<?php
								if( is_active_sidebar( 'minimalist_blog-footer-middle' ) ) {
									dynamic_sidebar( 'minimalist_blog-footer-middle' );
								}
							?>
						</div><!-- /.three columns -->
						<div class="three columns">
							<?php
								if( is_active_sidebar( 'minimalist_blog-footer-right' ) ) {
									dynamic_sidebar( 'minimalist_blog-footer-right' );
								}
							?>
						</div><!-- /.three columns -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.u-full-width -->
			<?php endif; ?>
			<div class="footer-site-info">
				<?php esc_html_e( 'Copyright', 'minimalist-blog' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><?php esc_html_e( '. All rights reserved.', 'minimalist-blog' ); ?>
				<span class="footer-info-right">
				<?php echo esc_html__(' | Designed by', 'minimalist-blog') ?> <a href="<?php echo esc_url('https://www.crafthemes.com/', 'minimalist-blog'); ?>"><?php echo esc_html__(' Crafthemes.com', 'minimalist-blog') ?></a>
				</span>
			</div><!-- /.footer-site-info -->
		</footer>
		<?php wp_footer(); ?>
  </body>
</html>
