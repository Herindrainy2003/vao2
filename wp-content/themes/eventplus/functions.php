<?php	

/**
 * Define Theme Version
 */
define( 'EVENTPLUS_THEME_VERSION', '2.8' );

function eventplus_css() {
	$parent_style = 'eventpress-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'eventplus-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('eventplus-default',get_stylesheet_directory_uri() .'/css/color/default.css');
	wp_dequeue_style('eventpress-default');
	
	wp_enqueue_script('eventplus-custom',get_stylesheet_directory_uri() . '/js/custom.js');
}
add_action( 'wp_enqueue_scripts', 'eventplus_css',999);

/**
 * Called all the Customize file.
 */
require_once( get_stylesheet_directory() . '/inc/customize/eventplus-premium.php');

function eventplus_remove_parent_setting( $wp_customize ) {
	   $wp_customize->remove_control('organizer_head');
	   $wp_customize->remove_control('wedding_section_title');
	   $wp_customize->remove_control('wedding_section_description');
}
add_action( 'customize_register', 'eventplus_remove_parent_setting',99 );	

/**
 * Import Options From Parent Theme
 *
 */
function eventplus_parent_theme_options() {
	$eventpress_mods = get_option( 'theme_mods_eventpress' );
	if ( ! empty( $eventpress_mods ) ) {
		foreach ( $eventpress_mods as $eventpress_mod_k => $eventpress_mod_v ) {
			set_theme_mod( $eventpress_mod_k, $eventpress_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'eventplus_parent_theme_options' );
