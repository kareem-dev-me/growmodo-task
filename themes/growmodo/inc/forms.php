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

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $name || ! is_email( $email ) || '' === $message ) {
		wp_safe_redirect( add_query_arg( 'contact', 'invalid', wp_get_referer() ?: home_url( '/contact/' ) ) );
		exit;
	}

	$admin   = get_option( 'admin_email' );
	$subject = 'Estatein contact form: ' . $name;
	$body    = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\n\nMessage:\n{$message}\n";
	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );
	wp_mail( $admin, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'contact', 'success', wp_get_referer() ?: home_url( '/contact/' ) ) );
	exit;
}
add_action( 'admin_post_nopriv_growmodo_contact', 'growmodo_handle_contact' );
add_action( 'admin_post_growmodo_contact', 'growmodo_handle_contact' );
