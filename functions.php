<?php
function lost_found_remove_scripts() {
    wp_dequeue_style( 'lost-found-styles' );
    wp_deregister_style( 'lost-found-styles' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
// add_action( 'wp_enqueue_scripts', 'lost_found_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

    $parent_style = 'twentyseventeen-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'lost-found-styles', get_stylesheet_directory_uri() . '/style.css', array($parent_style), $the_theme->get( 'Version' ) );
}
