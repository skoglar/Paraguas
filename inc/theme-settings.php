<?php
/**
 * Check and setup theme's default settings
 *
 * @package paraguas
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'paraguas_setup_theme_default_settings' ) ) {
	function paraguas_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$paraguas_posts_index_style = get_theme_mod( 'paraguas_posts_index_style' );
		if ( '' == $paraguas_posts_index_style ) {
			set_theme_mod( 'paraguas_posts_index_style', 'default' );
		}

		// Sidebar position.
		$paraguas_sidebar_position = get_theme_mod( 'paraguas_sidebar_position' );
		if ( '' == $paraguas_sidebar_position ) {
			set_theme_mod( 'paraguas_sidebar_position', 'right' );
		}

		// Container width.
		$paraguas_container_type = get_theme_mod( 'paraguas_container_type' );
		if ( '' == $paraguas_container_type ) {
			set_theme_mod( 'paraguas_container_type', 'container' );
		}
	}
}
