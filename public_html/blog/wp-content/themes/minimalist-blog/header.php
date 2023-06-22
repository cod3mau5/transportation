<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything upto navigation menu.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<!-- Mobile Specific Data -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class( 'sticky-header' ); ?>>
	<?php
	    if ( function_exists( 'wp_body_open' ) ) {
            wp_body_open();
        }
    ?>
        <a class="skip-link" href="#content">
        <?php esc_html_e( 'Skip to content', 'minimalist-blog' ); ?></a>
	  	<header class="site-header">
	        <div class="container">
	            <div class="row">
		                <div class="site-branding">
			                    <?php
									if ( has_custom_logo() ) {
										if ( function_exists( 'the_custom_logo' ) ) {
											the_custom_logo();
										}
									} else {
								?>
									<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
								<?php
									}
			                    ?>
		                </div><!-- /.site-branding -->

	                	<?php
	                		if ( has_nav_menu( 'header_menu' ) ) :

			                	wp_nav_menu( array(
									'theme_location' => 'header_menu',
									'container' => 'nav',
									'container_class' => 'menu-all-pages-container',
									'menu_class' => 'main-nav',
								) );

							endif;
						?>
						 <div class="mobile-navigation">
						 	<?php if ( !has_custom_logo() ) : ?>
				    			<a href="#" class="menubar-right"><i class="fa fa-bars"></i></a>
				    		<?php else : ?>
				    			<a href="#" class="menubar-right"><i class="fa fa-bars has-logo"></i></a>
				    		<?php endif; ?>

			        		<nav class="nav-parent">
								<?php
									if ( has_nav_menu( 'mobile_menu' ) ) :
										wp_nav_menu( array(
											'theme_location'	=> 'mobile_menu',
											'container'			=> false,
											'menu_class'		=> 'mobile-nav',
											'depth'				=> '4',
											'walker'			=> new Minimalist_Blog_Dropdown_Toggle_Walker_Nav_Menu()
										) );
									elseif ( has_nav_menu( 'header_menu' ) ) :
										wp_nav_menu( array(
											'theme_location' 	=> 'header_menu',
											'container' 		=> false,
											'menu_class' 		=> 'mobile-nav',
											'depth'				=> '4',
											'walker'			=> new Minimalist_Blog_Dropdown_Toggle_Walker_Nav_Menu()
										) );
									endif;
								?>
						        <a href="#" class="menubar-close"><i class="fa fa-close"></i></a>
			        		</nav>
						</div> <!-- /.mobile-navigation -->

	            </div><!-- /.row -->
	        </div><!-- /.container -->
	    </header>
