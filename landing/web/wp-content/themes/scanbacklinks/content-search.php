<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 */
?>
	
<section class="content-section-one">
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<h2 class="white_h2"><?php _e( 'Search Page', 'scanbacklinks' ); ?></h2>
	</div>
</section>

<section class="content-section-two">
	<div class="container">
		<?php the_excerpt(); ?>
	</div>
</section>