<?php
/*
Template Name: FAQ Page
*/
?>

<?php get_header(); ?>

<section class="content-section-one">
	<div class="container">
		<h1><?php the_field('faq_special_page_h1_text', 'option'); ?></h1>
		<h2 class="white_h2"><?php the_field('faq_special_page_h2_text', 'option'); ?></h2>
	</div>
</section>

<section class="main-section-six content-reviews">
	<div class="container">
		<?php if( have_rows('faq_section', 'option') ): ?>
		<?php while( have_rows('faq_section', 'option') ): the_row(); 
			$question = get_sub_field('faq_question', 'option');
			$faq_answer = get_sub_field('faq_answer', 'option');
		?>
		<div class="main-faq">
			<div class="main-faq-question">Q. <?php echo $question; ?></div>
			<div class="main-faq-answer">
				<?php echo $faq_answer; ?>
			</div>				
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>