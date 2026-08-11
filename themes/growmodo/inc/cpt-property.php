<?php
/**
 * Property custom post type and meta.
 *
 * @package Growmodo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register property CPT.
 */
function growmodo_register_property_cpt() {
	register_post_type(
		'property',
		array(
			'labels'       => array(
				'name'          => 'Properties',
				'singular_name' => 'Property',
				'add_new_item'  => 'Add New Property',
				'edit_item'     => 'Edit Property',
				'view_item'     => 'View Property',
				'search_items'  => 'Search Properties',
			),
			'public'       => true,
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'properties' ),
			'menu_icon'    => 'dashicons-building',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'growmodo_register_property_cpt' );

/**
 * Register property meta.
 */
function growmodo_register_property_meta() {
	$keys = array(
		'_price'     => 'string',
		'_bedrooms'  => 'string',
		'_bathrooms' => 'string',
		'_area'      => 'string',
		'_location'  => 'string',
	);

	foreach ( $keys as $key => $type ) {
		register_post_meta(
			'property',
			$key,
			array(
				'type'              => $type,
				'single'            => true,
				'show_in_rest'      => true,
				'auth_callback'     => function () {
					return current_user_can( 'edit_posts' );
				},
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
	}
}
add_action( 'init', 'growmodo_register_property_meta' );

/**
 * Property details meta box.
 */
function growmodo_property_meta_box() {
	add_meta_box(
		'growmodo_property_details',
		'Property Details',
		'growmodo_render_property_meta_box',
		'property',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'growmodo_property_meta_box' );

/**
 * Render meta box fields.
 *
 * @param WP_Post $post Post.
 */
function growmodo_render_property_meta_box( $post ) {
	wp_nonce_field( 'growmodo_save_property_meta', 'growmodo_property_meta_nonce' );
	$fields = array(
		'_price'     => 'Price (e.g. $550,000)',
		'_bedrooms'  => 'Bedrooms',
		'_bathrooms' => 'Bathrooms',
		'_area'      => 'Area (e.g. 2,500)',
		'_location'  => 'Location',
	);
	echo '<table class="form-table">';
	foreach ( $fields as $key => $label ) {
		$value = get_post_meta( $post->ID, $key, true );
		printf(
			'<tr><th><label for="%1$s">%2$s</label></th><td><input class="widefat" type="text" id="%1$s" name="%1$s" value="%3$s" /></td></tr>',
			esc_attr( $key ),
			esc_html( $label ),
			esc_attr( $value )
		);
	}
	echo '</table>';
}

/**
 * Save property meta.
 *
 * @param int $post_id Post ID.
 */
function growmodo_save_property_meta( $post_id ) {
	if ( ! isset( $_POST['growmodo_property_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['growmodo_property_meta_nonce'] ) ), 'growmodo_save_property_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$keys = array( '_price', '_bedrooms', '_bathrooms', '_area', '_location' );
	foreach ( $keys as $key ) {
		if ( isset( $_POST[ $key ] ) ) {
			update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
		}
	}
}
add_action( 'save_post_property', 'growmodo_save_property_meta' );

/**
 * Get property meta with defaults.
 *
 * @param int $post_id Post ID.
 * @return array<string, string>
 */
function growmodo_get_property_meta( $post_id ) {
	return array(
		'price'     => (string) get_post_meta( $post_id, '_price', true ),
		'bedrooms'  => (string) get_post_meta( $post_id, '_bedrooms', true ),
		'bathrooms' => (string) get_post_meta( $post_id, '_bathrooms', true ),
		'area'      => (string) get_post_meta( $post_id, '_area', true ),
		'location'  => (string) get_post_meta( $post_id, '_location', true ),
	);
}

/**
 * Seed demo properties on theme switch (once).
 */
function growmodo_seed_properties() {
	if ( get_option( 'growmodo_properties_seeded' ) ) {
		return;
	}

	$demos = array(
		array(
			'title'   => 'Seaside Serenity Villa',
			'excerpt' => 'A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood.',
			'price'   => '$550,000',
			'beds'    => '4-Bedroom',
			'baths'   => '3-Bathroom',
			'area'    => '2,500 Square Feet',
			'image'   => 'properties/prop-1.png',
		),
		array(
			'title'   => 'Metropolitan Haven',
			'excerpt' => 'A chic and fully-furnished 2-bedroom apartment with panoramic city views.',
			'price'   => '$550,000',
			'beds'    => '2-Bedroom',
			'baths'   => '2-Bathroom',
			'area'    => '2,000 Square Feet',
			'image'   => 'properties/prop-2.png',
		),
		array(
			'title'   => 'Rustic Retreat Cottage',
			'excerpt' => 'An elegant 3-bedroom, 2.5-bathroom townhouse in a gated community.',
			'price'   => '$550,000',
			'beds'    => '3-Bedroom',
			'baths'   => '3-Bathroom',
			'area'    => '2,200 Square Feet',
			'image'   => 'properties/prop-3.png',
		),
	);

	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	foreach ( $demos as $demo ) {
		$post_id = wp_insert_post(
			array(
				'post_title'   => $demo['title'],
				'post_content' => $demo['excerpt'],
				'post_excerpt' => $demo['excerpt'],
				'post_status'  => 'publish',
				'post_type'    => 'property',
			)
		);

		if ( is_wp_error( $post_id ) || ! $post_id ) {
			continue;
		}

		update_post_meta( $post_id, '_price', $demo['price'] );
		update_post_meta( $post_id, '_bedrooms', $demo['beds'] );
		update_post_meta( $post_id, '_bathrooms', $demo['baths'] );
		update_post_meta( $post_id, '_area', $demo['area'] );
		update_post_meta( $post_id, '_location', 'Coastal Estates' );

		$path = GROWMODO_DIR . '/assets/images/' . $demo['image'];
		if ( file_exists( $path ) ) {
			$attach_id = growmodo_sideload_theme_image( $path, $post_id, $demo['title'] );
			if ( $attach_id ) {
				set_post_thumbnail( $post_id, $attach_id );
			}
		}
	}

	update_option( 'growmodo_properties_seeded', 1 );
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'growmodo_seed_properties' );

/**
 * Also seed on init if theme already active and empty.
 */
function growmodo_maybe_seed_properties() {
	if ( get_option( 'growmodo_properties_seeded' ) ) {
		return;
	}
	$count = wp_count_posts( 'property' );
	if ( $count && (int) $count->publish > 0 ) {
		update_option( 'growmodo_properties_seeded', 1 );
		return;
	}
	growmodo_seed_properties();
}
add_action( 'init', 'growmodo_maybe_seed_properties', 20 );

/**
 * Attach a local theme image to a post.
 *
 * @param string $path    Absolute file path.
 * @param int    $post_id Post ID.
 * @param string $desc    Description.
 * @return int Attachment ID or 0.
 */
function growmodo_sideload_theme_image( $path, $post_id, $desc ) {
	if ( ! file_exists( $path ) ) {
		return 0;
	}

	$filename = wp_unique_filename( wp_upload_dir()['path'], basename( $path ) );
	$upload   = wp_upload_bits( $filename, null, file_get_contents( $path ) ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	if ( ! empty( $upload['error'] ) ) {
		return 0;
	}

	$filetype = wp_check_filetype( $upload['file'], null );
	$attach_id = wp_insert_attachment(
		array(
			'post_mime_type' => $filetype['type'],
			'post_title'     => sanitize_file_name( $desc ),
			'post_content'   => '',
			'post_status'    => 'inherit',
		),
		$upload['file'],
		$post_id
	);

	if ( is_wp_error( $attach_id ) ) {
		return 0;
	}

	$meta = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
	wp_update_attachment_metadata( $attach_id, $meta );

	return (int) $attach_id;
}
