<?php
/**
 * Custom template tags for this theme
 *
 * @package    grind
 * @copyright  Copyright (c) 2018, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( ! function_exists( 'grind_the_custom_logo' ) ) :
	/**
	 * Output the custom logo if it exists.
	 */
	function grind_the_custom_logo() {

		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			the_custom_logo();
		}

	}
endif;

/**
 * Output the site title.
 */
function grind_site_title() {
	if ( is_front_page() && is_home() ) : ?>

		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a>
		</h1>

	<?php else : ?>

		<p class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a>
		</p>

	<?php
	endif;
}

/**
 * Output the site description.
 */
function grind_site_description() {
	$description = get_bloginfo( 'description', 'display' );
	$enabled     = get_theme_mod( 'enable-site-description', true );
	if ( $description && $enabled ) {
		echo '<p class="site-description">' . $description . '</p>'; /* WPCS: xss ok. */
	}
}

if ( ! function_exists( 'grind_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function grind_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

			$posted_on = sprintf(
				/* translators: %s: link to date archives */
				esc_html_x( 'Posted on %s', 'post date', 'grind' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);

			$byline = sprintf(
				/* translators: %s: link to author archives */
				esc_html_x( 'by %s', 'post author', 'grind' ),
				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);

			echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
			edit_post_link( esc_html__( '(Edit)', 'grind' ), '<span class="edit-link">', '</span>' );

	}
endif;

if ( ! function_exists( 'grind_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function grind_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'grind' ) );

			if ( $categories_list ) {
				/* translators: %s: list of categories */
				printf( '<span class="cat-links">' . esc_html__( 'Categories: %1$s', 'grind' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'grind' ) );
			if ( $tags_list ) {

				/* translators: %s: tags list */
				printf( '<span class="tags-links">' . esc_html__( 'Tags: %1$s', 'grind' ) . '</span>', $tags_list ); // WPCS: XSS OK.

			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">' . esc_html__( 'Discussion: ', 'grind' );
			comments_popup_link( esc_html__( 'Leave a comment', 'grind' ), esc_html__( '1 Comment', 'grind' ), esc_html_x( '% Comments', 'number of comments', 'grind' ), 'comments-link' );
			echo '</span>';
		}

	}
endif;

if ( ! function_exists( 'grind_the_post_navigation' ) ) :
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function grind_the_post_navigation() {
		$args = array(
			'prev_text' => __( 'Previous Post: <span>%title</span>', 'grind' ),
			'next_text' => __( 'Next Post: <span>%title</span>', 'grind' ),
		);

		the_post_navigation( $args );
	}
endif;


if ( ! function_exists( 'grind_the_posts_navigation' ) ) :
	/**
	 * Displays the navigation to next/previous set of posts, when applicable.
	 */
	function grind_the_posts_navigation() {
		$args = array(
			'prev_text'          => esc_html__( '&larr; Older Posts', 'grind' ),
			'next_text'          => esc_html__( 'Newer Posts &rarr;', 'grind' ),
			'screen_reader_text' => esc_html__( 'Posts Navigation', 'grind' ),
		);

		the_posts_navigation( $args );
	}
endif;

if ( ! function_exists( 'grind_full_width_thumbnail' ) ) :
	/**
	 * Output the thumbnail if it exists.
	 */
	function grind_full_width_thumbnail() {

		$_post = get_queried_object();
		$size  = get_theme_mod( 'featured-image-style-posts', 'content-width' );

		if ( 'wide' !== $size || 'full-width' !== $size || ! is_single() ) {
			return;
		}

		echo '<div class="' . esc_attr( $size ) . '-thumbnail">' . get_the_post_thumbnail( $_post->ID ) . '</div>';

	}
endif;

if ( ! function_exists( 'grind_thumbnail' ) ) :
	/**
	 * Output the thumbnail if it exists.
	 *
	 * @param string $size Thunbnail size to output.
	 */
	function grind_thumbnail( $size = '' ) {

		$style = get_theme_mod( 'featured-image-style-posts', 'content-width' );

		if ( 'content-width' !== $style ) {
			return;
		}

		if ( has_post_thumbnail() ) {
			?>
			<div class="post-thumbnail">

				<?php if ( ! is_single() ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( null, $size ); ?>
					</a>
				<?php else : ?>
					<?php the_post_thumbnail( null, $size ); ?>
				<?php endif; ?>

			</div><!-- .post-thumbnail -->
		<?php
		}

	}
endif;
