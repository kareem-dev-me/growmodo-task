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
		array(
			'label'   => 'Home',
			'url'     => home_url( '/' ),
			'current' => is_front_page(),
		),
		array(
			'label'   => 'About Us',
			'url'     => home_url( '/about/' ),
			'current' => is_page( 'about' ),
		),
		array(
			'label'   => 'Properties',
			'url'     => get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' ),
			'current' => is_post_type_archive( 'property' ) || is_singular( 'property' ),
		),
		array(
			'label'   => 'Services',
			'url'     => home_url( '/services/' ),
			'current' => is_page( 'services' ),
		),
	);

	echo '<ul class="flex flex-col gap-2 md:flex-row md:items-center md:gap-[30px]">';
	foreach ( $items as $item ) {
		$class = $item['current']
			? 'btn-nav-active no-underline'
			: 'text-lg font-medium leading-[1.5] text-absolute-white no-underline hover:text-purple-75';
		printf(
			'<li><a class="%s" href="%s">%s</a></li>',
			esc_attr( $class ),
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

/**
 * Collect gallery image URLs for a property (featured + attachments + theme fallbacks).
 *
 * @param int $post_id Post ID.
 * @param int $min     Minimum images to return (pads with theme fallbacks).
 * @return string[]
 */
function growmodo_get_property_gallery_urls( $post_id, $min = 9 ) {
	$urls = array();

	$thumb_id = get_post_thumbnail_id( $post_id );
	if ( $thumb_id ) {
		$src = wp_get_attachment_image_url( $thumb_id, 'large' );
		if ( $src ) {
			$urls[] = $src;
		}
	}

	$attachments = get_attached_media( 'image', $post_id );
	foreach ( $attachments as $attachment ) {
		if ( (int) $attachment->ID === (int) $thumb_id ) {
			continue;
		}
		$src = wp_get_attachment_image_url( $attachment->ID, 'large' );
		if ( $src ) {
			$urls[] = $src;
		}
	}

	$fallbacks = array(
		growmodo_img( 'properties/prop-1.png' ),
		growmodo_img( 'properties/prop-2.png' ),
		growmodo_img( 'properties/prop-3.png' ),
	);

	$urls = array_values( array_unique( $urls ) );

	$i = 0;
	while ( count( $urls ) < $min ) {
		$urls[] = $fallbacks[ $i % count( $fallbacks ) ];
		++$i;
	}

	return $urls;
}

/**
 * Key features for a property (newline meta or defaults).
 *
 * @param int $post_id Post ID.
 * @return string[]
 */
function growmodo_get_property_features( $post_id ) {
	$raw = (string) get_post_meta( $post_id, '_features', true );
	if ( $raw ) {
		$lines = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $raw ) ) );
		if ( $lines ) {
			return array_values( $lines );
		}
	}

	return array(
		'Expansive oceanfront terrace for outdoor entertaining',
		'Gourmet kitchen with top-of-the-line appliances',
		'Private beach access for morning strolls and sunset views',
		'Master suite with a spa-inspired bathroom and ocean-facing balcony',
		'Private garage and ample storage space',
	);
}
