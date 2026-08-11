<?php
/**
 * Ensure core pages exist and use correct templates.
 *
 * @package Growmodo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Create About / Services / Contact pages once.
 */
function growmodo_ensure_pages() {
	if ( get_option( 'growmodo_pages_seeded' ) ) {
		return;
	}

	$pages = array(
		array(
			'title'    => 'About Us',
			'slug'     => 'about',
			'template' => 'page-templates/about.php',
		),
		array(
			'title'    => 'Services',
			'slug'     => 'services',
			'template' => 'page-templates/services.php',
		),
		array(
			'title'    => 'Contact',
			'slug'     => 'contact',
			'template' => 'page-templates/contact.php',
		),
	);

	foreach ( $pages as $page ) {
		$existing = get_page_by_path( $page['slug'] );
		if ( $existing ) {
			update_post_meta( $existing->ID, '_wp_page_template', $page['template'] );
			continue;
		}

		$id = wp_insert_post(
			array(
				'post_title'  => $page['title'],
				'post_name'   => $page['slug'],
				'post_status' => 'publish',
				'post_type'   => 'page',
			)
		);

		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, '_wp_page_template', $page['template'] );
		}
	}

	$front = get_option( 'page_on_front' );
	if ( ! $front ) {
		$home = get_page_by_path( 'home' );
		if ( ! $home ) {
			$home_id = wp_insert_post(
				array(
					'post_title'  => 'Home',
					'post_name'   => 'home',
					'post_status' => 'publish',
					'post_type'   => 'page',
				)
			);
		} else {
			$home_id = $home->ID;
		}
		if ( ! empty( $home_id ) && ! is_wp_error( $home_id ) ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $home_id );
		}
	}

	update_option( 'growmodo_pages_seeded', 1 );
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'growmodo_ensure_pages' );
add_action( 'init', 'growmodo_ensure_pages', 30 );
