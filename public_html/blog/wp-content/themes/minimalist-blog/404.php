<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 */

get_header();
?>

<div class="container">
    <div class="row">
        <div class="twelve columns">
            <div class="error-not-found">
                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'minimalist-blog' ); ?></h1>

                <div class="error-content">
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'minimalist-blog' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .error-content -->
            </div><!-- /.error-not-found-->
        </div><!-- /.twelve columns -->
    </div><!-- /.row -->
</div><!-- /.container -->

<?php
get_footer();
