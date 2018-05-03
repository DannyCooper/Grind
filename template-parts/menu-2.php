<?php
/**
 * Template part for displaying the primary navigation menu.
 *
 * @package    grind
 * @copyright  Copyright (c) 2018, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

<nav id="inline-header-navigation" class="menu-2 h-menu" role="navigation">
	<div class="wrapper">
		<button class="menu-toggle" aria-controls="inline-header-menu" aria-expanded="false">
			<i class="fa fa-bars" aria-hidden="true"></i>
			<?php esc_html_e( 'Secondary Navigation', 'grind' ); ?>
		</button>

		<?php
		wp_nav_menu( array(
			'theme_location' => 'menu-2',
			'menu_id'        => 'inline-header-menu',
		) );
		?>
	</div><!-- .wrapper -->
</nav><!-- .menu-2 -->
