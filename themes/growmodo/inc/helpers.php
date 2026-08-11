<?php
/**
 * Theme helpers.
 *
 * @package Growmodo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fallback primary menu when none is assigned.
 */
function growmodo_fallback_menu() {
	echo '<ul class="mt-3 flex flex-col gap-2 md:mt-0 md:flex-row md:items-center md:gap-6">';
	echo '<li><a class="text-white/90 no-underline hover:text-white" href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
	echo '<li><a class="text-white/90 no-underline hover:text-white" href="#features">Features</a></li>';
	echo '</ul>';
}

/**
 * Responsive image attributes helper.
 *
 * @param int    $attachment_id Attachment ID.
 * @param string $size          Registered size.
 * @param bool   $is_lcp        Whether this is the LCP image.
 * @return array<string, string>
 */
function growmodo_image_attrs( $attachment_id, $size = 'large', $is_lcp = false ) {
	$meta = wp_get_attachment_image_src( $attachment_id, $size );
	$attrs = array(
		'loading'  => $is_lcp ? 'eager' : 'lazy',
		'decoding' => 'async',
	);

	if ( $is_lcp ) {
		$attrs['fetchpriority'] = 'high';
	}

	if ( $meta ) {
		$attrs['width']  = (string) $meta[1];
		$attrs['height'] = (string) $meta[2];
	}

	return $attrs;
}
