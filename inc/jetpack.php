<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Fluffy
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function fluffy_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'fluffy_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function fluffy_jetpack_setup
add_action( 'after_setup_theme', 'fluffy_jetpack_setup' );

function fluffy_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function fluffy_infinite_scroll_render