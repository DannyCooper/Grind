<?php
/**
 * Template part for displaying the navigation menu below the header.
 *
 * @package    grind
 * @copyright  Copyright (c) 2018, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

$enabled = get_theme_mod( 'enable-nav-below', false );

if ( ! $enabled ) {
	return;
}

?>

<nav id="below-header-navigation" class="menu-3 h-menu" role="navigation">
	<div class="wrapper">
		<button class="menu-toggle" aria-controls="below-header-menu" aria-expanded="false">
			<i class="fa fa-bars" aria-hidden="true"></i>
			<?php esc_html_e( 'Below Header Navigation', 'grind' ); ?>
		</button>

		<?php
		wp_nav_menu( array(
			'theme_location' => 'menu-3',
			'menu_id'        => 'below-header-menu',
		) );
		?>
	</div><!-- .wrapper -->
</nav><!-- .menu-2 -->
