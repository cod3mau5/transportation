<?php 
// Get customizer options
require_once get_template_directory() . '/vendor/autoload.php';
use SuperbThemesCustomizer\CustomizerControls;

// New color variables
if(method_exists(CustomizerControls::class, "OverwriteDefault")) {
	CustomizerControls::OverwriteDefault(CustomizerControls::COLOR_SCHEME_PRIMARY, "#AFF1FF");
	CustomizerControls::OverwriteDefault(CustomizerControls::COLOR_SCHEME_PRIMARY_DARK, "#9bd7e4");
	CustomizerControls::OverwriteDefault(CustomizerControls::COLOR_SCHEME_SECONDARY, "#E9FBFF");
	CustomizerControls::OverwriteDefault(CustomizerControls::COLOR_SCHEME_SECONDARY_DARK, "#d8ecf1");
	CustomizerControls::OverwriteDefault(CustomizerControls::COLOR_SCHEME_TERTIARY, "#E9FBFF");
	CustomizerControls::OverwriteDefault(CustomizerControls::COLOR_SCHEME_TERTIARY_DARK, "#d8ecf1");
	CustomizerControls::OverwriteDefault(CustomizerControls::COLOR_SCHEME_BACKGROUND, "#ffffff");
	CustomizerControls::OverwriteDefault(CustomizerControls::COLOR_SCHEME_LIGHT_1, "#fafafa");
	CustomizerControls::OverwriteDefault(CustomizerControls::COLOR_SCHEME_LIGHT_3, "#a0816a");
	CustomizerControls::OverwriteDefault(CustomizerControls::COLOR_SCHEME_FOREGROUND, "#101010");
	CustomizerControls::OverwriteDefault(CustomizerControls::COLOR_SCHEME_DARK_2, "#646464");
	CustomizerControls::OverwriteDefault(CustomizerControls::BLOGFEED_SHOW_READMORE_BUTTON, "1");
	CustomizerControls::OverwriteDefault(CustomizerControls::BLOGFEED_COLUMNS_STYLE, CustomizerControls::BLOGFEED_THREE_COLUMNS_MASONRY);
}

// Get stylesheet
add_action( 'wp_enqueue_scripts', 'scandinavian_sky_enqueue_styles' );
function scandinavian_sky_enqueue_styles() {
	wp_enqueue_style( 'scandinavian-sky-parent-style', get_template_directory_uri() . '/style.css' ); 
} 



//Dequeue old font
function scandinavian_sky_dequeue_fonts() {
    wp_dequeue_style( 'petite-stories-fonts' );
        wp_deregister_style( 'petite-stories-fonts' );
}
add_action( 'wp_print_styles', 'scandinavian_sky_dequeue_fonts' );




// New fonts
function scandinavian_sky_enqueue_assets() {
    // Include the file.
    require_once get_theme_file_path('webfont-loader/wptt-webfont-loader.php');
    // Load the webfont.
    wp_enqueue_style(
        'scandinavian-sky-fonts',
        wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Archivo:wght@400;600&family=Epilogue:wght@900&family=Inter:wght@400;600&display=auto'),
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'scandinavian_sky_enqueue_assets');



function scandinavian_sky_custom_header_setup()
{
	add_theme_support('custom-header', apply_filters('scandinavian_sky_custom_header_args', array(
		'default-text-color'     => '000000',
		'wp-head-callback'       => 'scandinavian_sky_header_style',
	)));
}
add_action('after_setup_theme', 'scandinavian_sky_custom_header_setup');

if (!function_exists('scandinavian_sky_header_style')) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see scandinavian_sky_custom_header_setup().
	 */
	function scandinavian_sky_header_style()
	{
		$header_text_color = get_header_textcolor();
		$header_image = get_header_image();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if (empty($header_image) && $header_text_color == get_theme_support('custom-header', 'default-text-color')) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
?>
		<style type="text/css">
			.site-title a,
			.site-description,
			.logofont,
			.site-title,
			.logodescription {
				color: #<?php echo esc_attr($header_text_color); ?>;
			}

			<?php if (!display_header_text()) : ?>.logofont,
			.logodescription {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
				display: none;
			}

			<?php
			endif;

			if (!display_header_text()) : ?>.logofont,
			.site-title,
			p.logodescription {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
				display: none;
			}

			<?php
			else :
			?>.site-title a,
			.site-title,
			.site-description,
			.logodescription {
				color: #<?php echo esc_attr($header_text_color); ?>;
			}

			<?php endif; ?>
		</style>
<?php
	}
endif;