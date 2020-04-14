<?php
/**
 * Custom hooks.
 *
 * @package paraguas
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'paraguas_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function paraguas_site_info() {
		do_action( 'paraguas_site_info' );
	}
}

if ( ! function_exists( 'paraguas_add_site_info' ) ) {
	add_action( 'paraguas_site_info', 'paraguas_add_site_info' );

	/**
	 * Add site info content.
	 */
	function paraguas_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'http://wordpress.org/', 'paraguas' ) ),
			sprintf(
				/* translators:*/
				esc_html__( 'Proudly powered by %s', 'paraguas' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Theme: %1$s by %2$s.', 'paraguas' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'http://paraguas.com', 'paraguas' ) ) . '">paraguas.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Version: %1$s', 'paraguas' ),
				$the_theme->get( 'Version' )
			)
		);

		echo apply_filters( 'paraguas_site_info_content', $site_info ); // WPCS: XSS ok.
	}
}
