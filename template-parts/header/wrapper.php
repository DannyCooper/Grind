<?php get_template_part( 'template-parts/header/above' ); ?>

<header class="site-header">
	<div class="wrapper">

<?php

$branding_position = get_theme_mod( 'branding-position', 'left' );

if ( 'left' === $branding_position ) {
	get_template_part( 'template-parts/header/branding' );
	get_template_part( 'template-parts/header/right' );
} elseif ( 'center' === $branding_position ) {
	get_template_part( 'template-parts/header/branding' );
}
?>
	</div><!-- .wrapper -->
</header><!-- .site-header -->

<?php get_template_part( 'template-parts/header/below' ); ?>
