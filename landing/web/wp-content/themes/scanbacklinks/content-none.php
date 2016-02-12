<?php
/**
* The template part for displaying a message that posts cannot be found
*
* Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
*
*/
?>

<section class="content-section-one">
	<div class="container">
		<h1><?php _e( 'Nothing Found', 'scanbacklinks' ); ?></h1>
		<h2><?php _e( 'Search Page', 'scanbacklinks' ); ?></h2>
	</div>
</section>

<section class="content-section-two">
	<div class="container">
		<?php the_excerpt(); ?>
	</div>
</section>