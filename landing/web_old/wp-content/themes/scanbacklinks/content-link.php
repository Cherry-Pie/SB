<?php
/**
 * The template for displaying link post formats
 *
 * Used for both single and index/archive/search.
 *
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

		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div>
</section>

