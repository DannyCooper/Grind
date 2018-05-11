<?php
/**
 * Example implementation of the 'Customizer Helper'.
 *
 * @link       https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package    customizer-helper
 * @copyright  Copyright (c) 2018, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @version    1.0.0
 */

/**
 * Load the helper class.
 */
if ( file_exists( dirname( __FILE__ ) . '/class-customizer-helper.php' ) ) {
	require_once dirname( __FILE__ ) . '/class-customizer-helper.php';
}

/**
 * Load the custom controls class.
 */
require_once dirname( __FILE__ ) . '/custom-controls/radio-image.php';

/**
 * Defines customizer settings
 */
function customizer_helper_settings() {

	// Stores all the panels to be added.
	$panels = array();

	// Stores all the sections to be added.
	$sections = array();

	// Stores all the settings that will be added.
	$settings = array();

	$settings['sections'] = $sections;

	// Panel Example.
	$panel = 'theme-settings';

	$panels[] = array(
		'id'          => $panel,
		'title'       => __( 'Theme Settings', 'grind' ),
		'priority'    => '1',
		'description' => 'A cool panel',
	);

	$section = 'layout';

	$sections[] = array(
		'id'       => $section,
		'title'    => __( 'Layout', 'grind' ),
		'priority' => '10',
		'panel'    => $panel,
	);

	$settings['layout-style'] = array(
		'id'      => 'layout-style',
		'label'   => __( 'Layout Style', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'boxed'      => 'Boxed',
			'full-width' => 'Full Width',
		),
		'default' => 'boxed',
	);

	$section = 'header';

	$sections[] = array(
		'id'       => $section,
		'title'    => __( 'Header', 'grind' ),
		'priority' => '10',
		'panel'    => $panel,
	);

	$settings['branding-position'] = array(
		'id'      => 'branding-position',
		'label'   => __( 'Branding Position', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'left'   => 'Left',
			'center' => 'Center',
		),
		'default' => 'left',
	);

	$settings['branding-position'] = array(
		'id'      => 'branding-position',
		'label'   => __( 'Branding Position', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'left'   => 'Left',
			'center' => 'Center',
		),
		'default' => 'left',
	);

	$settings['tagline-position'] = array(
		'id'      => 'tagline-position',
		'label'   => __( 'Tagline Position', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'hidden'  => 'Hidden',
			'below'  => 'Below',
			'inline' => 'Inline',
		),
		'default' => 'below',
	);

	$settings['header-right'] = array(
		'id'      => 'header-right',
		'label'   => __( 'Header Right Content', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'empty'  => 'Empty',
			'nav'    => 'Navigation Menu',
			'social' => 'Social Icons',
			'widget' => 'Widget Area',
		),
		'default' => 'empty',
	);

	$section = 'navigation';

	$sections[] = array(
		'id'       => $section,
		'title'    => __( 'Navigation', 'grind' ),
		'priority' => '10',
		'panel'    => $panel,
	);

	$settings['enable-nav-above'] = array(
		'id'      => 'enable-nav-above',
		'label'   => __( 'Enable Above Header Menu', 'grind' ),
		'section' => $section,
		'type'    => 'checkbox',
	);

	$settings['nav-above-content-left'] = array(
		'id'      => 'nav-above-content-left',
		'label'   => __( 'Nav Above Content (Left)', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'empty'  => 'Empty',
			'nav'    => 'Navigation Menu',
			'social' => 'Social Icons',
			'widget' => 'Widget Area',
		),
		'default' => 'empty',
	);

	$settings['nav-above-content-right'] = array(
		'id'      => 'nav-above-content-right',
		'label'   => __( 'Nav Above Content (Right)', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'empty'  => 'Empty',
			'nav'    => 'Navigation Menu',
			'social' => 'Social Icons',
			'widget' => 'Widget Area',
		),
		'default' => 'empty',
	);

	$settings['enable-nav-below'] = array(
		'id'      => 'enable-nav-below',
		'label'   => __( 'Enable Below Header Menu', 'grind' ),
		'section' => $section,
		'type'    => 'checkbox',
	);

	$settings['nav-below-content-left'] = array(
		'id'      => 'nav-below-content-left',
		'label'   => __( 'Nav Above Content (Left)', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'empty'  => 'Empty',
			'nav'    => 'Navigation Menu',
			'social' => 'Social Icons',
			'widget' => 'Widget Area',
		),
		'default' => 'empty',
	);

	$settings['nav-below-content-right'] = array(
		'id'      => 'nav-below-content-right',
		'label'   => __( 'Nav Above Content (Right)', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'empty'  => 'Empty',
			'nav'    => 'Navigation Menu',
			'social' => 'Social Icons',
			'widget' => 'Widget Area',
		),
		'default' => 'empty',
	);

	$section = 'featured-images';

	$sections[] = array(
		'id'       => $section,
		'title'    => __( 'Featured Images', 'grind' ),
		'priority' => '10',
		'panel'    => $panel,
	);

	$settings['featured-images-width'] = array(
		'id'      => 'featured-images-width',
		'label'   => __( 'Featured Image Width', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'content'  => 'Content Width',
			'full'    => 'Full Width',
			'stretch' => 'Stretch',
		),
		'default' => 'content',
	);

	$section = 'posts';

	$sections[] = array(
		'id'       => $section,
		'title'    => __( 'Posts', 'grind' ),
		'priority' => '10',
		'panel'    => $panel,
	);

	$settings['enable-posts-sidebar'] = array(
		'id'      => 'enable-posts-sidebar',
		'label'   => __( 'Enable Sidebar on Posts', 'grind' ),
		'description' => __( 'Applied to the header on small screens and the sidebar on wide screens.', 'grind' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$settings['post-content-position'] = array(
		'id'      => 'post-content-position',
		'label'   => __( 'Post Content Position', 'grind' ),
		'description' => __( 'Applied to the header on small screens and the sidebar on wide screens.', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'left'  => 'Left',
			'center'    => 'Center',
		),
		'default' => 'left',
	);

	$settings['post-meta-position'] = array(
		'id'      => 'post-meta-position',
		'label'   => __( 'Post Meta Position', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'top'  => 'Top',
			'bottom'    => 'Bottom',
			'left'    => 'Left',
		),
		'default' => 'left',
	);

	$settings['show-post-author'] = array(
		'id'      => 'show-post-author',
		'label'   => __( 'Show Post Author', 'grind' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$settings['show-post-date'] = array(
		'id'      => 'show-post-date',
		'label'   => __( 'Show Post Date', 'grind' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$settings['show-post-cats'] = array(
		'id'      => 'show-post-cats',
		'label'   => __( 'Show Post Categories', 'grind' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$settings['show-post-tags'] = array(
		'id'      => 'show-post-tags',
		'label'   => __( 'Show Post Tags', 'grind' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$section = 'pages';

	$sections[] = array(
		'id'       => $section,
		'title'    => __( 'Pages', 'grind' ),
		'priority' => '10',
		'panel'    => $panel,
	);

	$settings['enable-pages-sidebar'] = array(
		'id'      => 'enable-pages-sidebar',
		'label'   => __( 'Enable Sidebar on Pages', 'grind' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$settings['page-content-position'] = array(
		'id'      => 'page-content-position',
		'label'   => __( 'Page Content Position', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'left'  => 'Left',
			'center'    => 'Center',
		),
		'default' => 'left',
	);

	$section = 'archives';

	$sections[] = array(
		'id'       => $section,
		'title'    => __( 'Archives', 'grind' ),
		'priority' => '10',
		'panel'    => $panel,
	);

	$settings['archive-setting'] = array(
		'id'      => 'archive-setting',
		'label'   => __( 'Example Text Input', 'grind' ),
		'section' => $section,
		'type'    => 'text',
	);

	$section = 'sidebar';

	$sections[] = array(
		'id'       => $section,
		'title'    => __( 'Sidebar', 'grind' ),
		'priority' => '10',
		'panel'    => $panel,
	);

	$settings['sidebar-position'] = array(
		'id'      => 'sidebar-position',
		'label'   => __( 'Sidebar Position', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'none'  => 'None',
			'left'  => 'Left',
			'right' => 'Right',
		),
		'default' => 'left',
	);

	$section = 'footer';

	$sections[] = array(
		'id'       => $section,
		'title'    => __( 'Footer', 'grind' ),
		'priority' => '10',
		'panel'    => $panel,
	);

	$settings['enable-footer'] = array(
		'id'      => 'enable-footer',
		'label'   => __( 'Enable Footer', 'grind' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$settings['footer-layout'] = array(
		'id'      => 'footer-layout',
		'label'   => __( 'Footer Layout', 'grind' ),
		'section' => $section,
		'type'    => 'radio-image',
		'choices' => array(
			'1' => 'http://via.placeholder.com/350x150',
			'2' => 'http://via.placeholder.com/350x150',
			'3' => 'http://via.placeholder.com/350x150',
			'4' => 'http://via.placeholder.com/350x150',
			'5' => 'http://via.placeholder.com/350x150',
			'6' => 'http://via.placeholder.com/350x150',
			'7' => 'http://via.placeholder.com/350x150',
		),
		'default' => '1',
	);

	$section = 'subfooter';

	$sections[] = array(
		'id'       => $section,
		'title'    => __( 'Sub Footer', 'grind' ),
		'priority' => '10',
		'panel'    => $panel,
	);

	$settings['enable-sub-footer'] = array(
		'id'      => 'enable-sub-footer',
		'label'   => __( 'Enable Sub Footer', 'grind' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$settings['sub-footer-layout'] = array(
		'id'      => 'sub-footer-layout',
		'label'   => __( 'Sub Footer Layout', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'normal'   => 'Normal',
			'centered' => 'Centered',
		),
		'default' => 'normal',
	);

	$settings['sub-footer-content'] = array(
		'id'      => 'sub-footer-content',
		'label'   => __( 'Sub Footer Content', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'empty'     => 'Empty',
			'text'      => 'Text',
			'copyright' => 'Copyright',
			'widget'    => 'Widget Area',
			'social'    => 'Social Icons',
			'nav'       => 'Navigation Menu',
		),
		'default' => 'text',
	);

	$settings['sub-footer-content-left'] = array(
		'id'      => 'sub-footer-content-left',
		'label'   => __( 'Sub Footer Content (Left)', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'empty'     => 'Empty',
			'text'      => 'Text',
			'copyright' => 'Copyright',
			'widget'    => 'Widget Area',
			'social'    => 'Social Icons',
			'nav'       => 'Navigation Menu',
		),
		'default' => 'text',
	);

	$settings['sub-footer-content-right'] = array(
		'id'      => 'sub-footer-content-right',
		'label'   => __( 'Sub Footer Content (Right)', 'grind' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'empty'     => 'Empty',
			'text'      => 'Text',
			'copyright' => 'Copyright',
			'widget'    => 'Widget Area',
			'social'    => 'Social Icons',
			'nav'       => 'Navigation Menu',
		),
		'default' => 'text',
	);

	$section = 'header_image';

	$settings['header-background-height'] = array(
		'id'       => 'header-background-height',
		'label'    => esc_html__( 'Header Height (px)', 'grind' ),
		'section'  => $section,
		'type'     => 'number',
		'priority' => 1,
		'default'  => 173,
	);

	$settings['header-background-repeat'] = array(
		'id'       => 'header-background-repeat',
		'label'    => esc_html__( 'Header Background Repeat', 'grind' ),
		'section'  => $section,
		'type'     => 'radio',
		'priority' => 12,
		'choices'  => array(
			'no-repeat' => esc_html__( 'No Repeat', 'grind' ),
			'repeat'    => esc_html__( 'Tile', 'grind' ),
			'repeat-x'  => esc_html__( 'Tile Horizontally', 'grind' ),
			'repeat-y'  => esc_html__( 'Tile Vertically', 'grind' ),
		),
		'default'  => 'no-repeat',
	);

	$settings['header-background-size'] = array(
		'id'       => 'header-background-size',
		'label'    => esc_html__( 'Header Background Size', 'grind' ),
		'section'  => $section,
		'type'     => 'radio',
		'priority' => 12,
		'choices'  => array(
			'initial' => esc_html__( 'Normal', 'grind' ),
			'cover'   => esc_html__( 'Cover', 'grind' ),
			'contain' => esc_html__( 'Contain', 'grind' ),
		),
		'default'  => 'initial',
	);

	$settings['header-background-position'] = array(
		'id'       => 'header-background-position',
		'label'    => esc_html__( 'Header Background Position', 'grind' ),
		'section'  => $section,
		'type'     => 'select',
		'priority' => 13,
		'choices'  => array(
			'left'   => esc_html__( 'Left', 'grind' ),
			'center' => esc_html__( 'Center', 'grind' ),
			'right'  => esc_html__( 'Right', 'grind' ),
		),
		'default'  => 'center',
	);

	$settings['header-background-attachment'] = array(
		'id'       => 'header-background-attachment',
		'label'    => esc_html__( 'Scroll with Page', 'grind' ),
		'section'  => $section,
		'type'     => 'checkbox',
		'priority' => 14,
	);

	$settings['navigation-bg-color'] = array(
		'section'  => 'colors',
		'id'       => 'navigation-bg-color',
		'label'    => esc_html__( 'Navigation Color', 'grind' ),
		'type'     => 'color',
		'priority' => 41,
		'default'  => '#253e80',
	);

	// Adds the panels to the $settings array.
	$settings['panels'] = $panels;

	// Adds the sections to the $settings array.
	$settings['sections'] = $sections;

	$customizer_helper = Customizer_Helper::Instance();
	$customizer_helper->add_settings( $settings );

}
add_action( 'init', 'customizer_helper_settings' );
