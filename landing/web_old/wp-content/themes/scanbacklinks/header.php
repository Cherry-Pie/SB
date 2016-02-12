<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="navbar-holder">
	<div class="navbar-fixed-top main-navbar" role="navigation" data-spy="affix" data-offset-top="73">
		<div class="container">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<a href="/" class="logo"><span>Scan</span>Backlinks</a>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<ul class="main-navigation">
					<li><a href="/price/">Price</a></li>
					<li><a href="#" data-toggle="modal" data-target="#sing-in-modal">Sing In</a> or <a href="#" data-toggle="modal" data-target="#sing-up-modal"><span>Sing Up</span></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>