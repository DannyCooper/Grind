<?php

$enabled = get_theme_mod( 'enable-nav-below', false );
$content = get_theme_mod( 'nav-below-content-left', 'nav' );

if ( ! $enabled ) {
	return;
}

if ( 'nav' === $content ) {
	get_template_part( 'template-parts/menus/menu-3' );
} elseif ( 'social' === $content ) {
	get_template_part( 'template-parts/header/social' );
} elseif ( 'text' === $content ) {
	get_template_part( 'template-parts/header/text' );
}
