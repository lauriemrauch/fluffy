<?php
/**
 * Fluffy functions and definitions
 *
 * @package Fluffy
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 750; /* pixels */
}

if ( ! function_exists( 'fluffy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Hooks into the after_setup_theme hook, which runs before the init hook to 
 * ensure everything is in place at setup.
 *
 * Can be replaced in a child theme by creating a new fluffy_setup function.
 *
 */

function fluffy_setup() {
	// Make theme available for translation
	load_theme_textdomain( 'codediva', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Lets WordPress manage each page's title
	add_theme_support( 'title-tag' );

	// Enables Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Registers two menu areas
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'codediva' )
	) );

	// Changes default code to output valid HTML5
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Enables Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'video', 'quote', 'audio' ) );
	
}
endif; // fluffy_setup

add_action( 'after_setup_theme', 'fluffy_setup' );

// Enqueue scripts and styles.

function fluffy_scripts() {
	wp_enqueue_style( 'fluffy-style', get_stylesheet_uri() );

	wp_enqueue_script( 'fluffy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'fluffy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fluffy_scripts' );

// Call the file that includes the theme's template tags
require get_template_directory() . '/inc/template-tags.php';

// Call the file that includes the custom widgets
require get_template_directory() . '/inc/widgets.php';

// Call the file that includes any extra functionality in the theme.
require get_template_directory() . '/inc/extras.php';

// Call the file that allows the user to use the Theme Customizer
require get_template_directory() . '/inc/customizer.php';

// Call the file that makes the theme compatible with Jetpack
require get_template_directory() . '/inc/jetpack.php';