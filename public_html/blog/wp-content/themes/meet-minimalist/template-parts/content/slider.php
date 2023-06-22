<?php
    $meet_minimalist_category_filter      = get_theme_mod( "meet_minimalist_categories_setting", "" );

    if ( !empty( $meet_minimalist_category_filter ) ) {
        if( $meet_minimalist_category_filter[ 0 ] == '0' ) {
            $meet_minimalist_category_filter = "";
        }
    }

    $meet_minimalist_list_args = array(
        'post_type'         =>  'post',
		'posts_per_page'	=> 	 3,
        'order'             =>  'DESC',
        'orderby'           =>  'date',
        'category__in'      =>  $meet_minimalist_category_filter,
        'post__not_in'      => get_option("sticky_posts"),
    );

    $meet_minimalist_list_item  = new WP_Query( $meet_minimalist_list_args );

?>

<!-- Start: Slider Section -->
<div class="container home-section">
    <div class="row">
        <div class="ct-slider-container">
            <div class="ct-slider-main js-slider-main"
                data-slick='{"dots": true, "fade": true, "arrows": true, "autoplay": false, "autoplaySpeed": 2000}'>
                
                <?php
                    if ( $meet_minimalist_list_item->have_posts() ) :
                        while ( $meet_minimalist_list_item->have_posts() ) : $meet_minimalist_list_item->the_post();
                ?>

                <div class="ct-slide-item">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="seven columns">
                            <?php 
                                $minimalist_blog_image_path = wp_get_attachment_image_src( get_post_thumbnail_id(), 'minimalist_blog-6x5', true );
                            ?>
                            <div class="ct-slider-height img-cover" style="background-image: url(<?php echo esc_url( $minimalist_blog_image_path[0] ); ?>)">
                                <span class="posted-on ct-cat"><a href="#" rel="bookmark" tabindex="0"><time
                                            class="entry-date published"><?php echo esc_html( get_the_date() ); ?></time></a></span>
                            </div>
                    </div><!-- /.seven columns -->
                    <?php endif; ?>
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="five columns">
                    <?php else: ?>
                        <div class="twelve columns no-featured-image">
                    <?php endif; ?>
                        <div class="ct-caption">
                            <a class="fpc-underline" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                            <div class="entry-meta">
                                <?php
                                    $meet_minimalist_categories_list = get_the_category_list( esc_html__( ' / ', 'meet-minimalist' ) );
                                    if ( $meet_minimalist_categories_list ) {
                                        printf(
                                            /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
                                            '<div class="">%1$s</div><!-- /.ct-cat -->',
                                            $meet_minimalist_categories_list
                                        ); // WPCS: XSS OK.
                                    }
                                ?>
                            </div>
                            <div class="post-excerpt entry-content">
                                <p><?php echo esc_html( meet_minimalist_excerpt( 35 ) ); ?></p>
                                <a class="more-btn" href="<?php the_permalink(); ?>" tabindex="0"><?php esc_html_e("Read More","meet-minimalist" )?></a>
                            </div>
                        </div>
                    </div><!-- /.five columns -->
                </div><!-- /.ct-slide-item -->

                <?php
                    endwhile;
                    else :
                        get_template_part( 'template-parts/post/content', 'none' );
                    endif;

                    wp_reset_postdata();
                ?>
            </div>

            <div class="ct-slider-arrows">
                <div class="ct-prev">
                    <i class="fa fa-arrow-left"></i>
                </div> <!-- /.ct-prev -->
                <div class="ct-next">
                    <i class="fa fa-arrow-right"></i>
                </div> <!-- /.ct-next -->
            </div><!-- /.fpc-slider-arrows -->
        </div><!-- /.slider-container -->
    </div><!-- /.row -->
</div><!-- /.container -->
<!-- End: Slider Section -->