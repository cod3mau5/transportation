<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header();

if ( have_posts() ) :
?>
<div class="container archive-title">
	<div class="row">
		<header class="page-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header><!-- .page-header -->
	</div>
</div>
<?php endif; ?>

<?php if ( have_posts() ) : ?>

    <div class="masonry-layout container">
        <div class="row grid">
            <?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content/content', 'excerpt' );

                endwhile; // End of the loop.
            ?>
        </div><!-- /.row -->
    </div><!-- /.container -->

    <?php else :

			get_template_part( 'template-parts/content/content', 'none' );

		endif;
	?>

<?php
// Pagination
get_template_part( 'template-parts/pagination/pagination', get_post_format() );

get_footer();
