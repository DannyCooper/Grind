<?php
/**
 * The widget area within the header
 *
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    grind
 * @copyright  Copyright (c) 2018, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( ! is_active_sidebar( 'header' ) ) {
	echo '<div class="notice">Add content here</div>';
	return;
}
?>

<aside class="widget-area">
	<?php dynamic_sidebar( 'header' ); ?>
</aside><!-- .widget-area -->
