<?php
/**
 * Grind functions and definitions
 *
 * @link       https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package    grind
 * @copyright  Copyright (c) 2018, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( ! function_exists( 'grind_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function grind_setup() {

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
			'menu-1' => esc_html__( 'Header Menu', 'grind' ),
			'menu-2' => esc_html__( 'Above Header Menu', 'grind' ),
			'menu-3' => esc_html__( 'Below Header Menu', 'grind' ),
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
		add_theme_support( 'custom-background', apply_filters( 'grind_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add image size for blog posts, 600px wide (and unlimited height).
		add_image_size( 'grind-blog', 600 );

		// Add stylesheet for the WordPress editor.
		add_editor_style( '/assets/css/editor-style.css' );

		// Add support for custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		/**
		* Add support for Gutenberg.
		*
		* @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
		*/
		add_theme_support( 'gutenberg', array(

			// Theme supports wide images, galleries and videos.
			'wide-images' => true,

			// Make specific theme colors available in the editor.
			'colors'      => array(
				'#ffffff',
				'#000000',
				'#cccccc',
			),

		) );

	}
endif;
add_action( 'after_setup_theme', 'grind_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function grind_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'grind_content_width', 1040 );
}
add_action( 'after_setup_theme', 'grind_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function grind_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'grind' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'grind' ),
		'before_widget' => '<section class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header', 'grind' ),
		'id'            => 'header',
		'description'   => esc_html__( 'Add widgets here.', 'grind' ),
		'before_widget' => '<section class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'grind_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function grind_scripts() {
	wp_enqueue_style( 'grind-style', get_stylesheet_uri() );

	wp_enqueue_script( 'grind-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'grind-fonts', grind_fonts_url(), array(), null );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'grind_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Customizer Settings.
 */
require get_template_directory() . '/inc/customizer/settings.php';
