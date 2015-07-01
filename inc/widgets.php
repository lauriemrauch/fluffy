<?php
/**
 * Custom widgets for this theme.
 *
 * @package Fluffy
 */

/**
 * Register widgetized areas
 */

function cd_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer', 'codediva' ),
		'id'            => 'footer',
		'description'	=> __( 'Widget area in the footer', 'codediva' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'cd_widgets_init' );