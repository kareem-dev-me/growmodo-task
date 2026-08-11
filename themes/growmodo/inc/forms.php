<?php
/**
 * Forms: newsletter + contact via admin-post.
 *
 * @package Growmodo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handle newsletter signup.
 */
function growmodo_handle_newsletter() {
	if ( ! isset( $_POST['growmodo_newsletter_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['growmodo_newsletter_nonce'] ) ), 'growmodo_newsletter' ) ) {
		wp_die( 'Invalid request.' );
	}

	// Honeypot.
	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( wp_get_referer() ? wp_get_referer() : home_url( '/' ) );
		exit;
	}

	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	if ( ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'newsletter', 'invalid', wp_get_referer() ?: home_url( '/' ) ) );
		exit;
	}

	$admin = get_option( 'admin_email' );
	$subject = 'Estatein newsletter signup';
	$body    = "New newsletter signup:\n\nEmail: {$email}\n";
	wp_mail( $admin, $subject, $body );

	wp_safe_redirect( add_query_arg( 'newsletter', 'success', wp_get_referer() ?: home_url( '/' ) ) );
	exit;
}
add_action( 'admin_post_nopriv_growmodo_newsletter', 'growmodo_handle_newsletter' );
add_action( 'admin_post_growmodo_newsletter', 'growmodo_handle_newsletter' );

/**
 * Handle contact form.
 */
function growmodo_handle_contact() {
	if ( ! isset( $_POST['growmodo_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['growmodo_contact_nonce'] ) ), 'growmodo_contact' ) ) {
		wp_die( 'Invalid request.' );
	}

	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( wp_get_referer() ? wp_get_referer() : home_url( '/' ) );
		exit;
	}

	$first_name   = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
	$last_name    = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
	$legacy_name  = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$name         = trim( $first_name . ' ' . $last_name );
	if ( '' === $name ) {
		$name = $legacy_name;
	}

	$email         = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone         = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$inquiry_type  = isset( $_POST['inquiry_type'] ) ? sanitize_text_field( wp_unslash( $_POST['inquiry_type'] ) ) : '';
	$hear_about    = isset( $_POST['hear_about'] ) ? sanitize_text_field( wp_unslash( $_POST['hear_about'] ) ) : '';
	$message       = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$terms_ok      = ! empty( $_POST['terms'] );

	if ( '' === $name || ! is_email( $email ) || '' === $message || ! $terms_ok ) {
		wp_safe_redirect( add_query_arg( 'contact', 'invalid', wp_get_referer() ?: home_url( '/contact/' ) ) );
		exit;
	}

	$admin   = get_option( 'admin_email' );
	$subject = 'Estatein contact form: ' . $name;
	$body    = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nInquiry Type: {$inquiry_type}\nHow Did You Hear About Us: {$hear_about}\n\nMessage:\n{$message}\n";
	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );
	wp_mail( $admin, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'contact', 'success', wp_get_referer() ?: home_url( '/contact/' ) ) );
	exit;
}
add_action( 'admin_post_nopriv_growmodo_contact', 'growmodo_handle_contact' );
add_action( 'admin_post_growmodo_contact', 'growmodo_handle_contact' );

/**
 * Handle Properties / single-property inquiry form.
 */
function growmodo_handle_inquiry() {
	if ( ! isset( $_POST['growmodo_inquiry_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['growmodo_inquiry_nonce'] ) ), 'growmodo_inquiry' ) ) {
		wp_die( 'Invalid request.' );
	}

	$redirect = get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' );
	if ( ! empty( $_POST['redirect_to'] ) ) {
		$candidate = esc_url_raw( wp_unslash( $_POST['redirect_to'] ) );
		if ( $candidate ) {
			$redirect = $candidate;
		}
	} elseif ( ! empty( $_POST['property_id'] ) ) {
		$property_link = get_permalink( absint( $_POST['property_id'] ) );
		if ( $property_link ) {
			$redirect = $property_link;
		}
	}

	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( $redirect );
		exit;
	}

	$first           = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
	$last            = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
	$email           = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone           = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$loc             = isset( $_POST['preferred_location'] ) ? sanitize_text_field( wp_unslash( $_POST['preferred_location'] ) ) : '';
	$type            = isset( $_POST['property_type'] ) ? sanitize_text_field( wp_unslash( $_POST['property_type'] ) ) : '';
	$baths           = isset( $_POST['bathrooms'] ) ? sanitize_text_field( wp_unslash( $_POST['bathrooms'] ) ) : '';
	$beds            = isset( $_POST['bedrooms'] ) ? sanitize_text_field( wp_unslash( $_POST['bedrooms'] ) ) : '';
	$budget          = isset( $_POST['budget'] ) ? sanitize_text_field( wp_unslash( $_POST['budget'] ) ) : '';
	$method          = isset( $_POST['contact_method'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_method'] ) ) : '';
	$message         = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$property_id     = isset( $_POST['property_id'] ) ? absint( $_POST['property_id'] ) : 0;
	$property_title  = isset( $_POST['property_title'] ) ? sanitize_text_field( wp_unslash( $_POST['property_title'] ) ) : '';
	$terms           = ! empty( $_POST['terms'] );

	if ( '' === $first || '' === $last || ! is_email( $email ) || '' === $message || ! $terms ) {
		wp_safe_redirect( add_query_arg( 'inquiry', 'invalid', $redirect ) . '#inquiry' );
		exit;
	}

	if ( ! $property_title && $property_id ) {
		$property_title = get_the_title( $property_id );
	}

	$admin   = get_option( 'admin_email' );
	$subject = 'Estatein property inquiry: ' . $first . ' ' . $last;
	$body    = "First Name: {$first}\nLast Name: {$last}\nEmail: {$email}\nPhone: {$phone}\nPreferred Location: {$loc}\nProperty Type: {$type}\nBathrooms: {$baths}\nBedrooms: {$beds}\nBudget: {$budget}\nContact Method: {$method}\n";
	if ( $property_id || $property_title ) {
		$body .= "Property ID: {$property_id}\nProperty Title: {$property_title}\n";
	}
	$body   .= "\nMessage:\n{$message}\n";
	$headers = array( 'Reply-To: ' . $first . ' ' . $last . ' <' . $email . '>' );
	wp_mail( $admin, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'inquiry', 'success', $redirect ) . '#inquiry' );
	exit;
}
add_action( 'admin_post_nopriv_growmodo_inquiry', 'growmodo_handle_inquiry' );
add_action( 'admin_post_growmodo_inquiry', 'growmodo_handle_inquiry' );
