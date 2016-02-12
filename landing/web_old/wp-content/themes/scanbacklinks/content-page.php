<?php
/**
 * The template used for displaying page content
 */
?>

<section class="content-section-one">
	<div class="container">
		<h1><?php the_field('page_h1_text'); ?></h1>
		<h2 class="white_h2"><?php the_field('page_h2_text'); ?></h2>
	</div>
</section>

<section class="content-section-two">
	<div class="container">
		<?php scanbacklinks_post_thumbnail(); ?>

		<?php the_content(); ?>
	</div>
</section>

