<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    grind
 * @copyright  Copyright (c) 2018, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

		</div><!-- .wrapper -->
	</div><!-- .site-content -->

	<footer class="site-footer">
		<div class="wrapper">
			<aside class="widget-area">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</aside><!-- .widget-area -->
			<aside class="widget-area">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</aside><!-- .widget-area -->
			<aside class="widget-area">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</aside><!-- .widget-area -->
			<aside class="widget-area">
				<?php dynamic_sidebar( 'footer-4' ); ?>
			</aside><!-- .widget-area -->
		</div><!-- .wrapper -->
	</footer><!-- .site-footer -->

	<footer class="sub-footer">
		<div class="wrapper">
			<div class="site-info">

				<?php
				// translators: %1$s: theme name.
				// translators: %2$s: theme author.
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'grind' ), '<a href="https://olympusthemes.com/themes/grind/">Grind</a>', 'Danny Cooper' );
				?>

			</div><!-- .site-info -->
		</div><!-- .wrapper -->
	</footer><!-- .site-footer -->

<?php wp_footer(); ?>

</div><!-- .site-wrapper -->

</body>
</html>
