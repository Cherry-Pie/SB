<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 */

get_header(); ?>

<section class="content-section-one">
	<div class="container">
		<h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'scanbacklinks' ); ?></h1>
		<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'scanbacklinks' ); ?></p>
	</div>
</section>

<section class="content-section-two">
	<div class="container">
		<p class="content-404-p"><?php _e( 'It looks like nothing was found at this location.', 'scanbacklinks' ); ?></p>
	</div>
</section>

<?php get_footer(); ?>
