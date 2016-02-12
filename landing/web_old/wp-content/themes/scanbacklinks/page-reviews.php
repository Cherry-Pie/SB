<?php
/*
Template Name: Reviews Page
*/
?>
<?php get_header(); ?>

<section class="content-section-one">
	<div class="container">
		<h1><?php the_field('reviews_special_page_h1_text', 'option'); ?></h1>
		<h2 class="white_h2"><?php the_field('reviews_special_page_h2_text', 'option'); ?></h2>
	</div>
</section>

<section class="main-section-six content-reviews">
	<div class="container">
		<?php if( have_rows('reviews_section', 'option') ): ?>
		<?php while( have_rows('reviews_section', 'option') ): the_row(); 
			$name = get_sub_field('review_name', 'option');
			$text = get_sub_field('review_text', 'option');
		?>
		<div class="main-reviews">
			<div class="main-reviews-name">
				<?php echo $name; ?> <span>says:</span>
			</div>
			<p>"<?php echo $text; ?>"</p>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>