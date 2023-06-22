<?php 
    $meet_minimalist_category_filter      = get_theme_mod( "meet_minimalist_cont_categories_setting", "" );

    if ( !empty( $meet_minimalist_category_filter ) ) {
        if( $meet_minimalist_category_filter[ 0 ] == '0' ) {
            $meet_minimalist_category_filter = "";
        }
    }

    $meet_minimalist_list_args = array(
        'post_type'         =>  'post',
        'posts_per_page'	=> 	 2,
        'order'             =>  'DESC',
        'orderby'           =>  'date',
        'category__in'      =>  $meet_minimalist_category_filter,
        'post__not_in'      => get_option("sticky_posts"),
    );

    $meet_minimalist_list_item  = new WP_Query( $meet_minimalist_list_args );
?>

<div class="container home-section">
    <div class="row item-block">
        <?php
            if ( $meet_minimalist_list_item->have_posts() ) :
                while ( $meet_minimalist_list_item->have_posts() ) : $meet_minimalist_list_item->the_post();
        ?>
        <div class="six columns">
            <div class="item-container">
                <div class="post-excerpt">
                    <div class="post-date">
                        <span class="posted-on ct-cat"><a href="#" rel="bookmark" tabindex="0"><time
                            class="entry-date published"><?php echo esc_html( get_the_date() ); ?></time></a></span>
                    </div><!-- /.post-date -->
                    <a class="fpc-underline" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                    
                    <div class="excerpt-meta">
                        <div class="excerpt-author">
                            <div class="author-name"><?php the_author(); ?></div><!-- /.author-name -->
                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?></a>
                        </div><!-- /.excerpt-author -->
                        <div class="excerpt-category">
                            <?php
                                $meet_minimalist_categories_list = get_the_category_list( esc_html__( ' / ', 'meet-minimalist' ) );
                                if ( $meet_minimalist_categories_list ) {
                                    printf(
                                        /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
                                        '<div class="ct-cats">%1$s</div><!-- /.ct-cat -->',
                                        $meet_minimalist_categories_list
                                    ); // WPCS: XSS OK.
                                }
                            ?>
                        </div><!-- /.excerpt-category -->
                    </div><!-- /.excerpt-meta -->
                </div><!-- /.post-excerpt -->
                <?php 
                    if ( has_post_thumbnail() ) : 
                        $meet_minimalist_image_path = wp_get_attachment_image_src( get_post_thumbnail_id(), 'minimalist_blog-6x5', true );
                        $meet_minimalist_image_id       = get_post_thumbnail_id();
                        $meet_minimalist_image_alt      = get_post_meta( $meet_minimalist_image_id, '_wp_attachment_image_alt', true );
                        $meet_minimalist_alt            = !empty( $meet_minimalist_image_alt ) ? $meet_minimalist_image_alt : the_title_attribute( 'echo=0' ) ;
                ?>
                <div class="post-featured">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $meet_minimalist_image_path[0] ); ?>" alt="<?php echo esc_attr( $meet_minimalist_alt ); ?>" /></a>
                </div><!-- /.post-featured -->
                <?php endif; ?>
            </div><!-- /.item-container -->
        </div><!-- /.six columns -->
        <?php
            endwhile;
            else :
                get_template_part( 'template-parts/post/content', 'none' );
            endif;

            wp_reset_postdata();
        ?>
    </div><!-- /.row -->
</div><!-- /.container -->