<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package    grind
 * @copyright  Copyright (c) 2018, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function grind_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! is_post_type_archive() && ! comments_open() ) {
		$classes[] = 'comments-closed';
	}

	$header_position = get_theme_mod( 'header-position', 'left' );
	$classes[]       = 'header-position-' . $header_position;

	$tagline_position = get_theme_mod( 'tagline-position', 'below' );
	$classes[]        = 'tagline-position-' . $tagline_position;

	$post_layout = get_theme_mod( 'post-layout', '1' );
	$classes[]   = 'post-layout-' . $post_layout;

	$page_layout = get_theme_mod( 'page-layout', '1' );
	$classes[]   = 'page-layout-' . $page_layout;

	$footer_layout = get_theme_mod( 'footer-layout', '1' );
	$classes[]     = 'footer-layout-' . $footer_layout;

	$sub_footer_layout = get_theme_mod( 'sub-footer-layout', 'normal' );
	$classes[]         = 'sub-footer-layout-' . $sub_footer_layout;

	return $classes;
}
add_filter( 'body_class', 'grind_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function grind_pingback_header() {

	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}

}
add_action( 'wp_head', 'grind_pingback_header' );

/**
 * Replaces the excerpt "Read More" text by a link.
 */
function new_excerpt_more() {
	global $post;
	return '&hellip; <p><a class="moretag" href="' . get_permalink( $post->ID ) . '">' . esc_html__( 'Read the full article', 'grind' ) . '</a></p>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Register custom fonts.
 */
function grind_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'grind' ) ) {
		$fonts[] = 'Source+Sans+Pro:400,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => implode( '|', $fonts ),
			'subset' => $subsets,
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
