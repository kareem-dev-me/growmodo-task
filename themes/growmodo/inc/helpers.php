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
 * Theme image URI helper.
 *
 * @param string $relative Path under assets/images/.
 * @return string
 */
function growmodo_img( $relative ) {
	return GROWMODO_URI . '/assets/images/' . ltrim( $relative, '/' );
}

/**
 * Fallback primary menu when none is assigned.
 */
function growmodo_fallback_menu() {
	$items = array(
		array( 'label' => 'Home', 'url' => home_url( '/' ) ),
		array( 'label' => 'About Us', 'url' => home_url( '/about/' ) ),
		array( 'label' => 'Properties', 'url' => get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' ) ),
		array( 'label' => 'Services', 'url' => home_url( '/services/' ) ),
	);

	echo '<ul class="flex flex-col gap-2 md:flex-row md:items-center md:gap-[30px]">';
	foreach ( $items as $item ) {
		printf(
			'<li><a class="text-lg font-medium text-absolute-white no-underline hover:text-purple-75" href="%s">%s</a></li>',
			esc_url( $item['url'] ),
			esc_html( $item['label'] )
		);
	}
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
