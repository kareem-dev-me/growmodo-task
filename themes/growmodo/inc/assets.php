<?php
/**
 * Asset enqueue and critical CSS.
 *
 * @package Growmodo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filemtime-based cache busting version.
 *
 * @param string $relative_path Path relative to theme root.
 * @return string
 */
function growmodo_asset_version( $relative_path ) {
	$path = GROWMODO_DIR . '/' . ltrim( $relative_path, '/' );
	return file_exists( $path ) ? (string) filemtime( $path ) : GROWMODO_VERSION;
}

/**
 * Enqueue front-end theme assets from dist/.
 */
function growmodo_enqueue_assets() {
	if ( is_admin() ) {
		return;
	}

	$css = 'dist/theme.css';
	$js  = 'dist/theme.js';

	if ( file_exists( GROWMODO_DIR . '/' . $css ) ) {
		wp_enqueue_style(
			'growmodo-theme',
			GROWMODO_URI . '/' . $css,
			array(),
			growmodo_asset_version( $css )
		);
	}

	if ( file_exists( GROWMODO_DIR . '/' . $js ) ) {
		wp_enqueue_script(
			'growmodo-theme',
			GROWMODO_URI . '/' . $js,
			array(),
			growmodo_asset_version( $js ),
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);
	}

	// Google Fonts for brand type (placeholder stack).
	wp_enqueue_style(
		'growmodo-fonts',
		'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,700;1,9..40,400&family=Fraunces:opsz,wght@9..144,500;9..144,700&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'growmodo_enqueue_assets' );

/**
 * Inline critical CSS early in head.
 */
function growmodo_inline_critical_css() {
	$path = GROWMODO_DIR . '/dist/critical.css';
	if ( ! file_exists( $path ) ) {
		return;
	}

	$css = file_get_contents( $path );
	if ( false === $css || '' === trim( $css ) ) {
		return;
	}

	echo '<style id="growmodo-critical">' . $css . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
add_action( 'wp_head', 'growmodo_inline_critical_css', 1 );

/**
 * Dequeue unused block library CSS on the front end.
 */
function growmodo_dequeue_block_library() {
	if ( is_admin() ) {
		return;
	}

	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-blocks-style' );
	wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'growmodo_dequeue_block_library', 100 );

/**
 * Enqueue admin bundle only in wp-admin.
 *
 * @param string $hook Current admin page hook.
 */
function growmodo_enqueue_admin_assets( $hook ) {
	$js = 'dist/admin.js';
	if ( ! file_exists( GROWMODO_DIR . '/' . $js ) ) {
		return;
	}

	wp_enqueue_script(
		'growmodo-admin',
		GROWMODO_URI . '/' . $js,
		array(),
		growmodo_asset_version( $js ),
		true
	);
}
add_action( 'admin_enqueue_scripts', 'growmodo_enqueue_admin_assets' );
