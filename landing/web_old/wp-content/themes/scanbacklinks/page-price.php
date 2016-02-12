<?php
/*
Template Name: Price Page
*/
?>

<?php get_header(); ?>

	<section class="price-section-one">
		<div class="container">
			<h1><?php the_field('price_special_page_h1_text', 'option'); ?></h1>
			<h2 class="white_h2"><?php the_field('price_special_page_h2_text', 'option'); ?></h2>
		</div>
	</section>

	<section class="price-section-two">
		<div class="container">
			<div class="monthly-plans">				
				<?php the_field('price_page_text', 'option'); ?>

				<table class="table table-striped table-hover monthly-plans-table">
					<thead>
						<tr>
							<th></th>
							<th><?php the_field('first_monthly_plan_title', 'option'); ?> <span>$<?php the_field('first_monthly_plan_price', 'option'); ?><i> / month</i><u> per month</u></span></th>
							<th><?php the_field('second_monthly_plan_title', 'option'); ?> <span>$<?php the_field('second_monthly_plan_price', 'option'); ?><i> / month</i><u> per month</u></span></th>
							<th><?php the_field('third_monthly_plan_title', 'option'); ?> <span>$<?php the_field('third_monthly_plan_price', 'option'); ?><i> / month</i><u> per month</u></span></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Total Data Rows Limit</td>
							<td><?php the_field('first_feature_total_data_rows_limit', 'option'); ?></td>
							<td><?php the_field('second_feature_total_data_rows_limit', 'option'); ?></td>
							<td><?php the_field('third_feature_total_data_rows_limit', 'option'); ?></td>
						</tr>
						<tr class="even">
							<td>Backlinks Reports</td>
							<td><?php the_field('first_feature_backlinks_reports', 'option'); ?></td>
							<td><?php the_field('second_feature_backlinks_reports_max_size', 'option'); ?></td>
							<td><?php the_field('third_feature_backlinks_reports_max_size', 'option'); ?></td>
						</tr>
						<tr>
							<td>Backlinks Reports Max Size</td>
							<td><?php the_field('first_feature_backlinks_reports_max_size', 'option'); ?></td>
							<td><?php the_field('second_feature_backlinks_reports_max_size', 'option'); ?></td>
							<td><?php the_field('third_feature_backlinks_reports_max_size', 'option'); ?></td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td></td>
							<td><a href="http://cp.scanbacklinks.com/user/profile"><?php the_field('first_plan_button_link_text', 'option'); ?></a></td>
							<?php if (is_user_logged_in()): ?>
								<td><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=<?php the_field('second_plan_paypall_id', 'option'); ?>"><?php the_field('second_plan_button_link_text', 'option'); ?></a></td>
								<td><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=<?php the_field('third_plan_paypall_id', 'option'); ?>"><?php the_field('third_plan_button_link_text', 'option'); ?></a></td>
							<?php else: ?>
								<td><a href="http://cp.scanbacklinks.com/user/profile"><?php the_field('first_plan_button_link_text', 'option'); ?></a></td>
								<td><a href="http://cp.scanbacklinks.com/user/profile"><?php the_field('first_plan_button_link_text', 'option'); ?></a></td>
							<?php endif ?>
						</tr>
					</tfoot>
				</table>
			</div>

			<div class="quote-holder">
				<div class="carousel slide" data-ride="carousel" id="quote-carousel">
					<ol class="carousel-indicators">
						<li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#quote-carousel" data-slide-to="1"></li>
						<li data-target="#quote-carousel" data-slide-to="2"></li>
						<li data-target="#quote-carousel" data-slide-to="3"></li>
					</ol>

					<div class="carousel-inner">
						<div class="item active">
							<div class="main-reviews-name">
								John Doe <span>says:</span>
							</div>
							<p>"Excepteur sint occaecat cupidatat non proident, sunt in qui mollit anim id est laborum. Lorem dolor sit amet, adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
						</div>
						<div class="item">
							<div class="main-reviews-name">
								John Doe <span>says:</span>
							</div>
							<p>"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui mollit anim id est laborum. Lorem dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
						</div>
						<div class="item">
							<div class="main-reviews-name">
								John Doe <span>says:</span>
							</div>
							<p>"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui mollit anim id est laborum. Lorem dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
						</div>
						<div class="item">
							<div class="main-reviews-name">
								John Doe <span>says:</span>
							</div>
							<p>"Excepteur sint occaecat cupidatat non, sunt in culpa qui mollit anim id est. Lorem dolor sit amet."</p>
						</div>
					</div>

					<a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-angle-left"></i></a>
					<a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-angle-right"></i></a>
				</div>
			</div>
		</div>
	</section>

	<section class="main-section-seven">
		<h3>FAQ</h3>
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