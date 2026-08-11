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
		'_price'         => 'Price (e.g. $550,000)',
		'_bedrooms'      => 'Bedrooms',
		'_bathrooms'     => 'Bathrooms',
		'_area'          => 'Area (e.g. 2,500)',
		'_location'      => 'Location',
		'_property_type' => 'Type (e.g. Villa)',
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

	$keys = array( '_price', '_bedrooms', '_bathrooms', '_area', '_location', '_property_type' );
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
		'type'      => (string) get_post_meta( $post_id, '_property_type', true ),
	);
}

/**
 * Demo property payloads (shared by seed + top-up).
 *
 * @return array<int, array<string, string>>
 */
function growmodo_demo_properties() {
	return array(
		array(
			'title'    => 'Seaside Serenity Villa',
			'excerpt'  => 'A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood.',
			'price'    => '$550,000',
			'beds'     => '4-Bedroom',
			'baths'    => '3-Bathroom',
			'area'     => '2,500 Square Feet',
			'type'     => 'Villa',
			'location' => 'Coastal Estates',
			'year'     => '2020+',
			'image'    => 'properties/prop-1.png',
		),
		array(
			'title'    => 'Metropolitan Haven',
			'excerpt'  => 'A chic and fully-furnished 2-bedroom apartment with panoramic city views.',
			'price'    => '$550,000',
			'beds'     => '2-Bedroom',
			'baths'    => '2-Bathroom',
			'area'     => '2,000 Square Feet',
			'type'     => 'Apartment',
			'location' => 'Metropolitan City',
			'year'     => '2010-2019',
			'image'    => 'properties/prop-2.png',
		),
		array(
			'title'    => 'Rustic Retreat Cottage',
			'excerpt'  => 'An elegant 3-bedroom, 2.5-bathroom townhouse in a gated community.',
			'price'    => '$550,000',
			'beds'     => '3-Bedroom',
			'baths'    => '3-Bathroom',
			'area'     => '2,200 Square Feet',
			'type'     => 'Townhouse',
			'location' => 'Suburbia',
			'year'     => '2020+',
			'image'    => 'properties/prop-3.png',
		),
		array(
			'title'    => 'Harborview Penthouse',
			'excerpt'  => 'A refined waterfront penthouse with open living spaces and private terrace views.',
			'price'    => '$720,000',
			'beds'     => '3-Bedroom',
			'baths'    => '2-Bathroom',
			'area'     => '2,400 Square Feet',
			'type'     => 'Apartment',
			'location' => 'Coastal Estates',
			'year'     => '2020+',
			'image'    => 'properties/prop-1.png',
		),
		array(
			'title'    => 'Willow Grove Estate',
			'excerpt'  => 'A family-ready estate surrounded by greenery, ideal for calm suburban living.',
			'price'    => '$640,000',
			'beds'     => '4-Bedroom',
			'baths'    => '3-Bathroom',
			'area'     => '2,800 Square Feet',
			'type'     => 'Villa',
			'location' => 'Suburbia',
			'year'     => '2010-2019',
			'image'    => 'properties/prop-2.png',
		),
		array(
			'title'    => 'Skyline Loft Residence',
			'excerpt'  => 'A modern loft-style residence with floor-to-ceiling windows and city skyline views.',
			'price'    => '$480,000',
			'beds'     => '2-Bedroom',
			'baths'    => '2-Bathroom',
			'area'     => '1,850 Square Feet',
			'type'     => 'Townhouse',
			'location' => 'Metropolitan City',
			'year'     => '2020+',
			'image'    => 'properties/prop-3.png',
		),
	);
}

/**
 * Insert a single demo property.
 *
 * @param array<string, string> $demo Demo payload.
 * @return int Post ID or 0.
 */
function growmodo_insert_demo_property( $demo ) {
	$found = new WP_Query(
		array(
			'post_type'              => 'property',
			'title'                  => $demo['title'],
			'post_status'            => 'any',
			'posts_per_page'         => 1,
			'no_found_rows'          => true,
			'ignore_sticky_posts'    => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
		)
	);
	if ( $found->have_posts() ) {
		return (int) $found->posts[0]->ID;
	}
	wp_reset_postdata();

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
		return 0;
	}

	update_post_meta( $post_id, '_price', $demo['price'] );
	update_post_meta( $post_id, '_bedrooms', $demo['beds'] );
	update_post_meta( $post_id, '_bathrooms', $demo['baths'] );
	update_post_meta( $post_id, '_area', $demo['area'] );
	update_post_meta( $post_id, '_location', $demo['location'] ?? 'Coastal Estates' );
	update_post_meta( $post_id, '_property_type', $demo['type'] ?? 'Villa' );
	update_post_meta( $post_id, '_build_year', $demo['year'] ?? '2020+' );

	$path = GROWMODO_DIR . '/assets/images/' . $demo['image'];
	if ( file_exists( $path ) ) {
		$attach_id = growmodo_sideload_theme_image( $path, $post_id, $demo['title'] );
		if ( $attach_id ) {
			set_post_thumbnail( $post_id, $attach_id );
		}
	}

	return (int) $post_id;
}

/**
 * Seed demo properties on theme switch (once).
 */
function growmodo_seed_properties() {
	if ( get_option( 'growmodo_properties_seeded' ) ) {
		return;
	}

	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	foreach ( growmodo_demo_properties() as $demo ) {
		growmodo_insert_demo_property( $demo );
	}

	update_option( 'growmodo_properties_seeded', 1 );
	update_option( 'growmodo_properties_topup_v2', 1 );
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
 * Top up older installs so the featured carousel has multiple slides.
 */
function growmodo_topup_demo_properties() {
	if ( get_option( 'growmodo_properties_topup_v2' ) ) {
		return;
	}

	$count = wp_count_posts( 'property' );
	$published = $count ? (int) $count->publish : 0;
	if ( $published >= 6 ) {
		update_option( 'growmodo_properties_topup_v2', 1 );
		return;
	}

	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	foreach ( growmodo_demo_properties() as $demo ) {
		growmodo_insert_demo_property( $demo );
	}

	update_option( 'growmodo_properties_topup_v2', 1 );
}
add_action( 'init', 'growmodo_topup_demo_properties', 25 );

/**
 * Apply Properties archive search/filter GET params.
 *
 * @param WP_Query $query Query.
 */
function growmodo_filter_property_archive( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ! $query->is_post_type_archive( 'property' ) ) {
		return;
	}

	// phpcs:disable WordPress.Security.NonceVerification.Recommended
	$q_search   = isset( $_GET['q'] ) ? sanitize_text_field( wp_unslash( $_GET['q'] ) ) : '';
	$q_location = isset( $_GET['location'] ) ? sanitize_text_field( wp_unslash( $_GET['location'] ) ) : '';
	$q_type     = isset( $_GET['property_type'] ) ? sanitize_text_field( wp_unslash( $_GET['property_type'] ) ) : '';
	$q_price    = isset( $_GET['price'] ) ? sanitize_text_field( wp_unslash( $_GET['price'] ) ) : '';
	$q_size     = isset( $_GET['size'] ) ? sanitize_text_field( wp_unslash( $_GET['size'] ) ) : '';
	$q_year     = isset( $_GET['year'] ) ? sanitize_text_field( wp_unslash( $_GET['year'] ) ) : '';
	// phpcs:enable

	if ( '' !== $q_search ) {
		$query->set( 's', $q_search );
	}

	$query->set( 'posts_per_page', 3 );

	$meta_query = array( 'relation' => 'AND' );

	if ( '' !== $q_location ) {
		$meta_query[] = array(
			'key'     => '_location',
			'value'   => $q_location,
			'compare' => 'LIKE',
		);
	}

	if ( '' !== $q_type ) {
		$meta_query[] = array(
			'key'     => '_property_type',
			'value'   => $q_type,
			'compare' => '=',
		);
	}

	if ( '' !== $q_price ) {
		// Price is stored as display string; match seeded buckets loosely.
		$price_map = array(
			'under-500k' => array( 'Under', '250', '300', '400', '450' ),
			'500k-750k'  => array( '550', '600', '650', '700', '750' ),
			'750k-plus'  => array( '800', '900', '1,' ),
		);
		if ( isset( $price_map[ $q_price ] ) ) {
			$or = array( 'relation' => 'OR' );
			foreach ( $price_map[ $q_price ] as $needle ) {
				$or[] = array(
					'key'     => '_price',
					'value'   => $needle,
					'compare' => 'LIKE',
				);
			}
			$meta_query[] = $or;
		}
	}

	if ( '' !== $q_size ) {
		$size_map = array(
			'under-2000' => array( '1,', '1.5', '1800', '1900' ),
			'2000-2500'  => array( '2,000', '2,200', '2,500', '2000', '2200', '2500' ),
			'2500-plus'  => array( '2,600', '3,', '2600', '3000' ),
		);
		if ( isset( $size_map[ $q_size ] ) ) {
			$or = array( 'relation' => 'OR' );
			foreach ( $size_map[ $q_size ] as $needle ) {
				$or[] = array(
					'key'     => '_area',
					'value'   => $needle,
					'compare' => 'LIKE',
				);
			}
			$meta_query[] = $or;
		}
	}

	if ( '' !== $q_year ) {
		$meta_query[] = array(
			'key'     => '_build_year',
			'value'   => $q_year,
			'compare' => 'LIKE',
		);
	}

	if ( count( $meta_query ) > 1 ) {
		$query->set( 'meta_query', $meta_query );
	}
}
add_action( 'pre_get_posts', 'growmodo_filter_property_archive' );

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
