<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Eternal
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function eternal_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'eternal_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function eternal_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'eternal_pingback_header' );

/*
 * Count our number of active panels
 * Primarily used to see if we have any panels active, duh.
 */
function eternal_panel_count() {
	$panels = array( '1', '2', '3', '4', '5' );
	$panel_count = 0;
	foreach ( $panels as $panel ) :
		if ( get_theme_mod( 'eternal_panel' . $panel ) ) :
			$panel_count++;
		endif;
	endforeach;
	return $panel_count;
}
