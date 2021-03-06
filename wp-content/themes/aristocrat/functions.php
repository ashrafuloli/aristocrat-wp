<?php

define( 'ARISTOCRAT_THEME_DIR', get_template_directory() );
define( 'ARISTOCRAT_THEME_URI', get_template_directory_uri() );
define( 'ARISTOCRAT_THEME_CSS_URI', ARISTOCRAT_THEME_URI . '/assets/css/' );
define( 'ARISTOCRAT_THEME_JS_URI', ARISTOCRAT_THEME_URI . '/assets/js/' );
define( 'ARISTOCRAT_THEME_INC', ARISTOCRAT_THEME_DIR . '/inc/' );

/**
 * Include aristocrat function files
 */

require_once ARISTOCRAT_THEME_INC . 'template-helper.php';
require_once ARISTOCRAT_THEME_INC . 'aristocrat-options.php';
// require_once ARISTOCRAT_THEME_INC . 'aristocrat-metabox.php';
require_once ARISTOCRAT_THEME_INC . 'class-tgm-plugin-activation.php';
require_once ARISTOCRAT_THEME_INC . 'add_plugin.php';

/**
 * aristocrat functions and definitions
 */
if ( ! function_exists( 'aristocrat_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aristocrat_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on aristocrat, use a find and replace
		 * to change 'aristocrat' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aristocrat', get_template_directory() . '/languages' );

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
			'main-menu'   => esc_html__( 'Main Menu', 'aristocrat' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'aristocrat' )
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
		add_theme_support( 'custom-background', apply_filters( 'aristocrat_custom_background_args', array(
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


		add_image_size( 'aristocrat-gallery-thumb', 720, 800, array( 'center', 'center' ) );
		add_image_size( 'aristocrat-case-studies-carousel', 840, 600, array( 'center', 'center' ) );
		add_image_size( 'aristocrat-case-studies-grid', 740, 780, array( 'center', 'center' ) );
		add_image_size( 'aristocrat-case-studies-gallery', 740, 580, array( 'center', 'center' ) );
		add_image_size( 'aristocrat-case-studies-gallery-thumb', 740, 830, array( 'center', 'center' ) );
		add_image_size( 'aristocrat-member-thumb', 540, 580, array( 'center', 'center' ) );
		add_image_size( 'aristocrat-service-thumb', 726, 554, array( 'center', 'center' ) );
	}
endif;
add_action( 'after_setup_theme', 'aristocrat_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function aristocrat_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'aristocrat_content_width', 640 );
}

add_action( 'after_setup_theme', 'aristocrat_content_width', 0 );

/**
 * Include aristocrat function files
 */
function aristocrat_add_script() {
	// add styles
	wp_enqueue_style( 'aristocrat-fonts', aristocrat_fonts_url(), array(), false );
	wp_enqueue_style( 'animate', ARISTOCRAT_THEME_CSS_URI . 'animate.css', array() );
	wp_enqueue_style( 'fontawesome', ARISTOCRAT_THEME_CSS_URI . 'fontawesome.min.css', array() );
	wp_enqueue_style( 'bootstrap', ARISTOCRAT_THEME_CSS_URI . 'bootstrap.min.css', array() );
	wp_enqueue_style( 'aristocrat-spacing', ARISTOCRAT_THEME_CSS_URI . 'spacing.css', array() );
	wp_enqueue_style( 'carousel', ARISTOCRAT_THEME_CSS_URI . 'owl.carousel.min.css', array() );
	wp_enqueue_style( 'videopopup', ARISTOCRAT_THEME_CSS_URI . 'videopopup.css', array() );
	wp_enqueue_style( 'metisMenu', ARISTOCRAT_THEME_CSS_URI . 'metisMenu.css', array() );
	wp_enqueue_style( 'lity-css', ARISTOCRAT_THEME_CSS_URI . 'lity.min.css', array() );
	wp_enqueue_style( 'aristocrat-main', ARISTOCRAT_THEME_CSS_URI . 'main.css', array() );
	wp_enqueue_style( 'aristocrat', get_stylesheet_uri() );

	// add script
	wp_enqueue_script( 'popper', ARISTOCRAT_THEME_JS_URI . 'popper.min.js', [ 'jquery' ], false, true );
	wp_enqueue_script( 'bootstrap', ARISTOCRAT_THEME_JS_URI . 'bootstrap.min.js', [ 'jquery' ], false, true );
	wp_enqueue_script( 'carousel', ARISTOCRAT_THEME_JS_URI . 'owl.carousel.min.js', [ 'jquery' ], false, true );
	wp_enqueue_script( 'videopopup', ARISTOCRAT_THEME_JS_URI . 'videopopup.js', [ 'jquery' ], false, true );
	wp_enqueue_script( 'metisMenu', ARISTOCRAT_THEME_JS_URI . 'metisMenu.min.js', [ 'jquery' ], false, true );
	wp_enqueue_script( 'lity-js', ARISTOCRAT_THEME_JS_URI . 'lity.min.js', [ 'jquery' ], false, true );
	wp_enqueue_script( 'tilt', ARISTOCRAT_THEME_JS_URI . 'tilt.jquery.min.js', [ 'jquery' ], false, true );
	wp_enqueue_script( 'aristocrat-script', ARISTOCRAT_THEME_JS_URI . 'script.js', [ 'jquery' ], false, true );
}

add_action( 'wp_enqueue_scripts', 'aristocrat_add_script' );

/*
Register Fonts
*/
function aristocrat_fonts_url() {
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
function aristocrat_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'aristocrat' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'aristocrat' ),
			'before_widget' => '<div id="%1$s" class="widget-wrap mb-40 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Sidebar 1', 'aristocrat' ),
			'id'            => 'footer-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'aristocrat' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Sidebar 2', 'aristocrat' ),
			'id'            => 'footer-2',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'aristocrat' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'aristocrat_widgets_init' );