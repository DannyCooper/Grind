<div class="header__right">
<?php

$header_right = get_theme_mod( 'header-right', 'empty' );

if ( 'nav' === $header_right ) {
	get_template_part( 'template-parts/menus/menu-1' );
} elseif ( 'social' === $header_right ) {
	get_template_part( 'template-parts/header/social' );
} elseif ( 'widget' === $header_right ) {
	get_template_part( 'template-parts/header/widget' );
}
?>
</div>
