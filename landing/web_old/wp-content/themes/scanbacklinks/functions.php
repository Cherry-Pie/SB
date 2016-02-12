<?php
/**
 * ScanBackLinks functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 */

if ( ! isset( $content_width ) ) {
	$content_width = 660;
}



if ( ! function_exists( 'scanbacklinks_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 */
function scanbacklinks_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on scanbacklinks, use a find and replace
	 * to change 'scanbacklinks' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'scanbacklinks', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'scanbacklinks' ),
		'social'  => __( 'Social Links Menu', 'scanbacklinks' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );


	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', scanbacklinks_fonts_url() ) );
}
endif; // scanbacklinks_setup
add_action( 'after_setup_theme', 'scanbacklinks_setup' );

if ( ! function_exists( 'scanbacklinks_fonts_url' ) ) :
/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function scanbacklinks_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'scanbacklinks' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'scanbacklinks' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'scanbacklinks' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'scanbacklinks' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 */
function scanbacklinks_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'scanbacklinks_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 */
function scanbacklinks_scripts() {
	wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome-style', get_template_directory_uri() . '/fonts/font-awesome.min.css');
	wp_enqueue_style('material-style', get_template_directory_uri() . '/css/material.min.css');
	wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');
	wp_enqueue_style('responsive-style', get_template_directory_uri() . '/css/responsive.css');
	wp_enqueue_style('animate.min-style', get_template_directory_uri() . '/css/animate.min.css');

	wp_enqueue_script('jquery-script', get_template_directory_uri() . '/js/jquery-2.1.4.min.js');
	wp_enqueue_script('jquery.mobile-script', get_template_directory_uri() . '/js/jquery.mobile-1.4.5.min.js');
	wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js');
	wp_enqueue_script('material-script', get_template_directory_uri() . '/js/material.min.js');
	wp_enqueue_script('wow-script', get_template_directory_uri() . '/js/wow.js');
	wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js');
	wp_enqueue_script('classie-script', get_template_directory_uri() . '/js/classie.js');
	wp_enqueue_script('smooth-on-scroll-script', get_template_directory_uri() . '/js/smooth-on-scroll.js');
	wp_enqueue_script('smooth-scroll-script', get_template_directory_uri() . '/js/smooth-scroll.js');
}
add_action( 'wp_enqueue_scripts', 'scanbacklinks_scripts' );

/**
 * Custom template tags for this theme.
 *
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Disable Update Any Plagins.
 *
 */
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );


/**
 * ACF
 */
if( function_exists('acf_add_options_page') ) {
	
	// ACF - Main Page Link
	acf_add_options_page(array(
		'page_title' 	=> 'Edit Main Page',
		'menu_title'	=> 'Main Page',
		'menu_slug' 	=> 'main-page',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	// ACF - Reviews Page Link
	acf_add_options_page(array(
		'page_title' 	=> 'Edit Reviews Page',
		'menu_title'	=> 'Reviews',
		'menu_slug' 	=> 'reviews-page',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	// ACF - FAQ Page Link
	acf_add_options_page(array(
		'page_title' 	=> 'Edit FAQ',
		'menu_title'	=> 'FAQ',
		'menu_slug' 	=> 'faq-page',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	// ACF - FAQ Page Link
	acf_add_options_page(array(
		'page_title' 	=> 'Edit Price',
		'menu_title'	=> 'Price',
		'menu_slug' 	=> 'price-page',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}



