<?php
/**
 * Control core classes for avoid errors
 */
if ( class_exists( 'CSF' ) ) {

	/**
	 * Set a unique slug-like ID
	 */
	$prefix = 'moters';

	/**
	 * Create options
	 */
	CSF::createOptions( $prefix, array(

		// framework title
		'framework_title'    => 'Moters Options',

		// menu settings
		'menu_title'         => 'Moters Options',
		'menu_slug'          => 'moters-options',
		'menu_type'          => 'menu',
		'menu_capability'    => 'manage_options',
		'menu_icon'          => null,
		'menu_position'      => null,
		'menu_hidden'        => false,
		'menu_parent'        => '',

		// menu extras
		'show_bar_menu'      => true,
		'show_sub_menu'      => true,
		'show_in_network'    => true,
		'show_in_customizer' => false,

		'show_search'             => true,
		'show_reset_all'          => true,
		'show_reset_section'      => true,
		'show_footer'             => true,
		'show_all_options'        => true,
		'show_form_warning'       => true,
		'sticky_header'           => true,
		'save_defaults'           => true,
		'ajax_save'               => true,

		// admin bar menu settings
		'admin_bar_menu_icon'     => '',
		'admin_bar_menu_priority' => 80,

		// footer
		'footer_text'             => '',
		'footer_after'            => '',
		'footer_credit'           => '',

		// database model
		'database'                => '', // options, transient, theme_mod, network
		'transient_time'          => 0,

		// contextual help
		'contextual_help'         => array(),
		'contextual_help_sidebar' => '',

		// typography options
		'enqueue_webfont'         => true,
		'async_webfont'           => false,

		// others
		'output_css'              => true,

		// theme and wrapper classname
		'theme'                   => 'dark',
		'class'                   => '',

		// external default values
		'defaults'                => array(),

	) );

	/**
	 * Create a section
	 */
	CSF::createSection( $prefix, array(
		'title'  => 'Header Top Settings',
		'fields' => array(
			// social links
			array(
				'type'    => 'heading',
				'content' => 'Social Links',
			),
			array(
				'id'      => 'facebook',
				'type'    => 'text',
				'title'   => __( 'Facebook', 'moters-ltd' ),
				'default' => '#'
			),
			array(
				'id'    => 'twitter',
				'type'  => 'text',
				'title' => __( 'Twitter', 'moters-ltd' ),
			),
			array(
				'id'    => 'pinterest',
				'type'  => 'text',
				'title' => __( 'Pinterest', 'moters-ltd' ),
			),
			array(
				'id'    => 'instagram',
				'type'  => 'text',
				'title' => __( 'Instagram', 'moters-ltd' ),
			),
			// delivery
			array(
				'type'    => 'heading',
				'content' => 'Extra Info',
			),
			array(
				'id'    => 'appointment',
				'type'  => 'text',
				'title' => __( 'Appointment', 'moters-ltd' ),
			),
			array(
				'id'    => 'opening-hours',
				'type'  => 'text',
				'title' => __( 'Opening Hours', 'moters-ltd' ),
			),
			array(
				'id'    => 'helpline',
				'type'  => 'text',
				'title' => __( 'Helpline', 'moters-ltd' ),
			),
			array(
              'id'          => 'logo-gallery',
              'type'        => 'gallery',
              'title'       => __( 'Logo Gallery', 'moters-ltd' ),
              'add_title'   => 'Add Images',
              'edit_title'  => 'Edit Images',
              'clear_title' => 'Remove Images',
            ),
			
		)
	) );

	/**
	 * Create a section
	 */
	CSF::createSection( $prefix, array(
		'title'  => 'Footer',
		'fields' => array(
			array(
				'id'    => 'copyright',
				'type'  => 'textarea',
				'title' => 'Copyright Text',
			),
		)
	) );

}

/**
 * A Custom function for get an option
 */
if ( ! function_exists( 'theme_option' ) ) {
	function theme_option( $option = '', $default = null ) {
		$options = get_option( 'moters' ); // Attention: Set your unique id of the framework

		return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
	}
}

/**
 * use theme option
 * echo theme_option( 'opt-text' );
 */