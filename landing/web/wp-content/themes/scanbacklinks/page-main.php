<?php
/*
Template Name: Main Page
*/
?>

<?php get_header(); ?>

<section class="main-section-one">
	<div class="container">
		<h1 class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms"><?php the_field('h1_main_page', 'option'); ?></h1>
		<h2 class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms"><?php the_field('h2_main_page', 'option'); ?></h2>
		<div class="main-section-one-input-group">
			<input type="text" name="" placeholder="Enter your web site here">
			<button type="button">Get Report Now!</button>
		</div>

		<div class="main-tab hidden-sm hidden-xs">
			<p class="p-manage">Manage your backlinks</p>
			<p class="p-backlink">Backlink Analysis <br>Report & Statistics</p>
			<p class="p-spy">Spy your Competitor's <span>Links</span></p>
		</div>
	</div>
</section>
<div class="main-tab-bottom hidden-sm hidden-xs"></div>

<section class="main-section-two">
	<h3><?php the_field('title_section_two_main_page', 'option'); ?></h3>
	<div class="container">
		<div class="main-section-two-blue-line hidden-xs"></div>
		<div class="row">
			<div class="col-sm-4 col-xs-12 main-how-box">
				<strong>1</strong>
				<p><?php the_field('block_one_section_two_main_page', 'option'); ?></p>
			</div>
			<div class="col-sm-4 col-xs-12 main-how-box">
				<strong>2</strong>
				<p><?php the_field('block_two_section_two_main_page', 'option'); ?></p>
			</div>
			<div class="col-sm-4 col-xs-12 main-how-box">
				<strong>3</strong>
				<p><?php the_field('block_three_section_two_main_page', 'option'); ?></p>
			</div>
		</div>
		<div class="row">
			<a href="<?php the_field('section_two_button_link_url', 'option'); ?>" role="button" class="red-button"><?php the_field('section_two_button_link_text', 'option'); ?></a>
		</div>
	</div>		
</section>

<section class="main-section-three">
	<h3><?php the_field('title_section_three_main_page', 'option'); ?></h3>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12 main-help-box">
				<h4><?php the_field('block_one_title_section_three_main_page', 'option'); ?></h4>
				<p><?php the_field('block_one_text_section_three_main_page', 'option'); ?></p>
			</div>
			<div class="col-sm-4 col-xs-12 main-help-box">
				<h4><?php the_field('block_two_title_section_three_main_page', 'option'); ?></h4>
				<p><?php the_field('block_two_text_section_three_main_page', 'option'); ?></p>
			</div>
			<div class="col-sm-4 col-xs-12 main-help-box">
				<h4><?php the_field('block_three_title_section_three_main_page', 'option'); ?></h4>
				<p><?php the_field('block_three_text_section_three_main_page', 'option'); ?></p>
			</div>
		</div>
	</div>		
</section>

<section class="main-section-four">
	<h3><?php the_field('title_section_four_main_page', 'option'); ?></h3>
	<div class="container">
		<div class="row main-whom-box">
			<h4><?php the_field('block_one_title_section_four_main_page', 'option'); ?></h4>
			<p><?php the_field('block_one_text_section_four_main_page', 'option'); ?></p>
		</div>
		<div class="row main-whom-box">
			<h4><?php the_field('block_two_title_section_four_main_page', 'option'); ?></h4>
			<p><?php the_field('block_two_text_section_four_main_page', 'option'); ?></p>
		</div>
		<div class="row main-whom-box">
			<h4><?php the_field('block_three_title_section_four_main_page', 'option'); ?></h4>
			<p><?php the_field('block_three_text_section_four_main_page', 'option'); ?></p>
		</div>
		<div class="row">
			<a href="<?php the_field('section_four_button_link_url', 'option'); ?>" role="button" class="red-button"><?php the_field('section_four_button_link_text', 'option'); ?></a>
		</div>
	</div>		
</section>

<section class="main-section-five">
	<h3><?php the_field('title_section_five_main_page', 'option'); ?></h3>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-xs-12 main-beginners-box">
				<h4><?php the_field('title_beginers_section_five_main_page', 'option'); ?></h4>
				<ul>
					<li><?php the_field('one_beginers_section_five_main_page', 'option'); ?></li>
					<li><?php the_field('two_beginers_section_five_main_page', 'option'); ?></li>
					<li><?php the_field('three_beginers_section_five_main_page', 'option'); ?></li>
					<li><?php the_field('four_beginers_section_five_main_page', 'option'); ?></li>
					<li><?php the_field('five_beginers_section_five_main_page', 'option'); ?></li>
				</ul>
			</div>
			<div class="col-sm-6 col-xs-12  main-professionals-box">
				<h4><?php the_field('title_professionals_section_five_main_page', 'option'); ?></h4>
				<div class="main-professionals-benefit">
					<div class="main-professionals-benefit-title"><?php the_field('title_box_one_professionals_section_five_main_page', 'option'); ?></div>
					<div class="main-professionals-benefit-reports"><i></i><strong><?php the_field('text_box_one_professionals_section_five_main_page', 'option'); ?></strong></div>
				</div>
				<div class="main-professionals-benefit">
					<div class="main-professionals-benefit-title"><?php the_field('title_box_two_professionals_section_five_main_page', 'option'); ?></div>
					<div class="main-professionals-benefit-reports"><i></i><strong><?php the_field('text_box_two_professionals_section_five_main_page', 'option'); ?></strong></div>
				</div>
				<div class="main-professionals-benefit">
					<div class="main-professionals-benefit-title"><?php the_field('title_box_three_professionals_section_five_main_page', 'option'); ?></div>
					<div class="main-professionals-benefit-reports"><i></i><strong><?php the_field('text_box_three_professionals_section_five_main_page', 'option'); ?></strong></div>
				</div>
			</div>
		</div>
		<div class="row">
			<a href="/faq/" role="button" class="red-button"><?php the_field('section_five_button_link_text', 'option'); ?></a>
		</div>
	</div>
</section>

<section class="main-section-six">
	<h3><?php the_field('title_section_six_main_page', 'option'); ?></h3>
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
		<div class="row">
			<a href="/reviews/" role="button" class="red-button"><?php the_field('section_six_button_link_text', 'option'); ?></a>
		</div>
	</div>
</section>

<section class="main-section-seven">
	<h3><?php the_field('title_section_seven_main_page', 'option'); ?></h3>
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
		<div class="row">
			<a href="/faq/" role="button" class="red-button"><?php the_field('section_seven_button_link_text', 'option'); ?></a>
		</div>
	</div>
</section>

<?php get_footer(); ?>