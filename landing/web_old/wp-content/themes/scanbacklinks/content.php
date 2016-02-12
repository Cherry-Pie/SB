<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 */
?>

<section class="content-section-one">
	<div class="container">
		<h1><?php the_field('page_h1_text'); ?></h1>
		<h2><?php the_field('page_h2_text'); ?></h2>
	</div>
</section>

<section class="content-section-two">
	<div class="container">
		<?php scanbacklinks_post_thumbnail(); ?>

		<?php the_excerpt(); ?>
	</div>
</section>