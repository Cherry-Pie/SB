<?php
/*
Template Name: Main Light Version Page
*/
?>

<?php get_header(); ?>
<div class="vertical-center">
		<section class="main-section-one">
			<h1><?php the_field('h1_main_page', 'option'); ?></h1>
			<h2><?php the_field('h2_main_page', 'option'); ?></h2>
			<div class="main-section-one-input-group">
				<input type="text" name="" placeholder="Enter your web site here">
				<button type="button">Get Report Now!</button>
			</div>
		</section>
</div>











<?php get_footer(); ?>