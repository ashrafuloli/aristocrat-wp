<?php
/**
 * Control core classes for avoid errors
 */
if ( class_exists( 'CSF' ) ) {

	/**
	 * Set a unique slug-like ID
	 */
	$prefix = 'aristocrat';

	/**
	 * Create options
	 */
	CSF::createOptions( $prefix, array(

		// framework title
		'framework_title'    => 'Aristocrat Options',

		// menu settings
		'menu_title'         => 'Aristocrat Options',
		'menu_slug'          => 'aristocrat-options',
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
		'title'  => 'Header Top',
		'fields' => array(
			array(
				'type'    => 'heading',
				'content' => 'Top Bar',
			),
			array(
				'id'         => 'top-bar',
				'type'       => 'switcher',
				'title'      => 'Top Bar',
				'text_on'    => 'Enabled',
				'text_off'   => 'Disabled',
				'text_width' => 100,
				'default'    => true
			),
			array(
				'id'      => 'top_email',
				'type'    => 'text',
				'title'   => __( 'Top Info Email', 'aristocrat' ),
				'default' => 'info@thearistocratgroup.com'
			),
			array(
				'id'      => 'top_phone',
				'type'    => 'text',
				'title'   => __( 'Top Info Phone', 'aristocrat' ),
				'default' => '+8801915444666'
			)
		)
	) );

	/**
	 * Create a section
	 */
	CSF::createSection( $prefix, array(
		'title'  => 'Footer',
		'fields' => array(
			array(
				'type'    => 'heading',
				'content' => 'Footer',
			),
			array(
				'id'         => 'footer-widget',
				'type'       => 'switcher',
				'title'      => 'Footer Widget',
				'text_on'    => 'Enabled',
				'text_off'   => 'Disabled',
				'text_width' => 100,
				'default'    => true
			),
			array(
				'id'    => 'about-widget-logo',
				'type'  => 'media',
				'title' => 'About Widget Logo',
			),
			array(
				'id'    => 'about-widget-content',
				'type'  => 'textarea',
				'title' => 'About Widget Content',
			),
			array(
				'id'      => 'copyright',
				'type'    => 'textarea',
				'title'   => 'Copyright Text',
				'default' => 'Copyright © 2020 <a href="#">thearistocratgroup</a>. All Rights Reserved',
			),
		)
	) );

}

/**
 * A Custom function for get an option
 */
if ( ! function_exists( 'theme_option' ) ) {
	function theme_option( $option = '', $default = null ) {
		$options = get_option( 'aristocrat' ); // Attention: Set your unique id of the framework

		return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
	}
}

/**
 * use theme option
 * echo theme_option( 'opt-text' );
 */