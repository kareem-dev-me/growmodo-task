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

/**
 * Handle Properties page inquiry form.
 */
function growmodo_handle_inquiry() {
	if ( ! isset( $_POST['growmodo_inquiry_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['growmodo_inquiry_nonce'] ) ), 'growmodo_inquiry' ) ) {
		wp_die( 'Invalid request.' );
	}

	$redirect = get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' );

	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( $redirect );
		exit;
	}

	$first   = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
	$last    = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$loc     = isset( $_POST['preferred_location'] ) ? sanitize_text_field( wp_unslash( $_POST['preferred_location'] ) ) : '';
	$type    = isset( $_POST['property_type'] ) ? sanitize_text_field( wp_unslash( $_POST['property_type'] ) ) : '';
	$baths   = isset( $_POST['bathrooms'] ) ? sanitize_text_field( wp_unslash( $_POST['bathrooms'] ) ) : '';
	$beds    = isset( $_POST['bedrooms'] ) ? sanitize_text_field( wp_unslash( $_POST['bedrooms'] ) ) : '';
	$budget  = isset( $_POST['budget'] ) ? sanitize_text_field( wp_unslash( $_POST['budget'] ) ) : '';
	$method  = isset( $_POST['contact_method'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_method'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$terms   = ! empty( $_POST['terms'] );

	if ( '' === $first || '' === $last || ! is_email( $email ) || '' === $message || ! $terms ) {
		wp_safe_redirect( add_query_arg( 'inquiry', 'invalid', $redirect ) . '#inquiry' );
		exit;
	}

	$admin   = get_option( 'admin_email' );
	$subject = 'Estatein property inquiry: ' . $first . ' ' . $last;
	$body    = "First Name: {$first}\nLast Name: {$last}\nEmail: {$email}\nPhone: {$phone}\nPreferred Location: {$loc}\nProperty Type: {$type}\nBathrooms: {$baths}\nBedrooms: {$beds}\nBudget: {$budget}\nContact Method: {$method}\n\nMessage:\n{$message}\n";
	$headers = array( 'Reply-To: ' . $first . ' ' . $last . ' <' . $email . '>' );
	wp_mail( $admin, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'inquiry', 'success', $redirect ) . '#inquiry' );
	exit;
}
add_action( 'admin_post_nopriv_growmodo_inquiry', 'growmodo_handle_inquiry' );
add_action( 'admin_post_growmodo_inquiry', 'growmodo_handle_inquiry' );
