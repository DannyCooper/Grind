<?php
/**
 * Template Name: Gutenberg Template
 * Template Post Type: post, page
 *
 * @package    grind
 * @copyright  Copyright (c) 2018, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>

	<div class="content-area">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content/content', 'blank' );

		endwhile;
		?>

	</div><!-- .content-area -->

<?php
get_footer();
