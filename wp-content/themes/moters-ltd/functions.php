<?php

define( 'MOTERS_THEME_DIR', get_template_directory() );
define( 'MOTERS_THEME_URI', get_template_directory_uri() );
define( 'MOTERS_THEME_CSS_URI', MOTERS_THEME_URI . '/assets/css/' );
define( 'MOTERS_THEME_JS_URI', MOTERS_THEME_URI . '/assets/js/' );
define( 'MOTERS_THEME_INC', MOTERS_THEME_DIR . '/inc/' );

/**
 * Include moters function files
 */

require_once MOTERS_THEME_INC . 'template-helper.php';
require_once MOTERS_THEME_INC . 'moters-options.php';
// require_once MOTERS_THEME_INC . 'moters-metabox.php';
require_once MOTERS_THEME_INC . 'class-tgm-plugin-activation.php';
require_once MOTERS_THEME_INC . 'add_plugin.php';

/**
 * moters functions and definitions
 */
if ( ! function_exists( 'moters_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function moters_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on moters, use a find and replace
		 * to change 'moters' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'moters', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu'   => esc_html__( 'Main Menu', 'moters' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'moters' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'moters_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Enable custom header
		 */
		add_theme_support( 'custom-header' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Enable suporrt for Post Formats
		 *
		 * see: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'image',
			'audio',
			'video',
			'gallery',
			'quote',
		) );

		// Add theme support for selective refresh for widgets.
		//add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );


		add_image_size( 'moters-gallery-thumb', 720, 800, array( 'center', 'center' ) );
		add_image_size( 'moters-case-studies-carousel', 840, 600, array( 'center', 'center' ) );
		add_image_size( 'moters-case-studies-grid', 740, 780, array( 'center', 'center' ) );
		add_image_size( 'moters-case-studies-gallery', 740, 580, array( 'center', 'center' ) );
		add_image_size( 'moters-case-studies-gallery-thumb', 740, 830, array( 'center', 'center' ) );
		add_image_size( 'moters-member-thumb', 540, 580, array( 'center', 'center' ) );
		add_image_size( 'moters-service-thumb', 726, 554, array( 'center', 'center' ) );
	}
endif;
add_action( 'after_setup_theme', 'moters_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function moters_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'moters_content_width', 640 );
}

add_action( 'after_setup_theme', 'moters_content_width', 0 );

/**
 * Include moters function files
 */
function moters_add_script() {
	// add styles
	wp_enqueue_style( 'moters-fonts', moters_fonts_url(), array(), false );
	wp_enqueue_style( 'animate', MOTERS_THEME_CSS_URI . 'animate.css', array() );
	wp_enqueue_style( 'fontawesome', MOTERS_THEME_CSS_URI . 'fontawesome.min.css', array() );
	wp_enqueue_style( 'bootstrap', MOTERS_THEME_CSS_URI . 'bootstrap.min.css', array() );
	wp_enqueue_style( 'moters-spacing', MOTERS_THEME_CSS_URI . 'spacing.css', array() );
	wp_enqueue_style( 'carousel', MOTERS_THEME_CSS_URI . 'owl.carousel.min.css', array() );
	wp_enqueue_style( 'magnific-popup', MOTERS_THEME_CSS_URI . 'magnific-popup.css', array() );
	wp_enqueue_style( 'moters-main', MOTERS_THEME_CSS_URI . 'main.css', array() );
	wp_enqueue_style( 'moters', get_stylesheet_uri() );

	// add script
	wp_enqueue_script( 'popper', MOTERS_THEME_JS_URI . 'popper.min.js', [ 'jquery' ], false, true );
	wp_enqueue_script( 'bootstrap', MOTERS_THEME_JS_URI . 'bootstrap.min.js', [ 'jquery' ], false, true );
	wp_enqueue_script( 'carousel', MOTERS_THEME_JS_URI . 'owl.carousel.min.js', [ 'jquery' ], false, true );
	wp_enqueue_script( 'magnific-popup', MOTERS_THEME_JS_URI . 'jquery.magnific-popup.min.js', [ 'jquery' ], false, true );
	wp_enqueue_script( 'moters-script', MOTERS_THEME_JS_URI . 'script.js', [ 'jquery' ], false, true );
}

add_action( 'wp_enqueue_scripts', 'moters_add_script' );

/*
Register Fonts
*/
function moters_fonts_url() {
	$font_url = '';

	if ( 'off' !== _x( 'on', 'Google font: on or off', 'hexi' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Open+Sans:300,400,600,700|Signika:400,600,700&display=swap' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;

}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function moters_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'moters-ltd' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'moters-ltd' ),
			'before_widget' => '<div id="%1$s" class="widget-wrap mb-40 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Sidebar 1', 'moters-ltd' ),
			'id'            => 'footer-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'moters-ltd' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Sidebar 2', 'moters-ltd' ),
			'id'            => 'footer-2',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'moters-ltd' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Sidebar 3', 'moters-ltd' ),
			'id'            => 'footer-3',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'moters-ltd' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'moters_widgets_init' );