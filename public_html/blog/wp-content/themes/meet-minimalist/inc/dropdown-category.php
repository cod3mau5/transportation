<?php

/****************************************************************************
 *  Multi Select  Categories
 ****************************************************************************/

/**
 * Multiselect option for WP Customizer
 *
 * @param $wp_customize
 */
add_action( 'customize_register', __NAMESPACE__ . '\\meet_minimalist_multiselect_customize_register' );
function meet_minimalist_multiselect_customize_register( $wp_customize ) {
	/**
	 * Multiple select customize control class.
	 */
	class Meet_Minimalist_Customize_Control_Multiple_Select extends \WP_Customize_Control {

		/**
		 * The type of customize control being rendered.
		 */
		public $type = 'multiple-select';

		/**
		 * Displays the multiple select on the customize screen.
		 */
		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}
			?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
					<?php
					foreach ( $this->choices as $value => $label ) {
						$selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
						echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
					}
					?>
                </select>
            </label>
		<?php }
	}
}

/**
 * Get all categories
 * 
 * @return array
 */
function meet_minimalist_project_types() {
	$cats    = array();
	$cats[0] = __( 'Filter by Latest Posts', 'meet-minimalist' );
	foreach ( get_categories() as $categories => $category ) {
		$cats[ $category->term_id ] = $category->name;
	}

	return $cats;
}

/**
 * Validate the options against the existing categories
 *
 * @param  string[] $input
 *
 * @return string
 */
function meet_minimalist_project_types_sanitize( $input ) {
	$valid = meet_minimalist_project_types();

	foreach ( $input as $value ) {
		if ( ! array_key_exists( $value, $valid ) ) {
			return [];
		}
	}

	return $input;
}
