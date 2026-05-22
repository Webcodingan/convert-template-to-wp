<?php

/**
 * Handles the contact form AJAX submission.
 * Validates, sanitizes, and sends the enquiry via wp_mail().
 */
function vaultedge_handle_contact_form() {

    // Security check
    if ( ! isset( $_POST['ve_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ve_nonce'] ) ), 've_contact_nonce' ) ) {
        wp_send_json_error( [ 'message' => 'Security verification failed. Please refresh and try again.' ] );
    }

    // Sanitize inputs
    $name    = sanitize_text_field( wp_unslash( $_POST['ve_name']    ?? '' ) );
    $email   = sanitize_email(      wp_unslash( $_POST['ve_email']   ?? '' ) );
    $phone   = sanitize_text_field( wp_unslash( $_POST['ve_phone']   ?? '' ) );
    $service = sanitize_text_field( wp_unslash( $_POST['ve_service'] ?? '' ) );
    $message = sanitize_textarea_field( wp_unslash( $_POST['ve_message'] ?? '' ) );

    // Validate required fields
    if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
        wp_send_json_error( [ 'message' => 'Please fill in all required fields.' ] );
    }

    if ( ! is_email( $email ) ) {
        wp_send_json_error( [ 'message' => 'Please enter a valid email address.' ] );
    }

    // Build email
    $to      = get_option( 'admin_email' );
    $subject = sprintf( '[%s] New Consultation Request from %s', get_bloginfo( 'name' ), $name );

    $body  = "Name:    $name\n";
    $body .= "Email:   $email\n";
    $body .= "Phone:   " . ( $phone ?: 'Not provided' ) . "\n";
    $body .= "Service: " . ( $service ?: 'Not specified' ) . "\n";
    $body .= "\nMessage:\n$message\n";

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $name . ' <' . $email . '>',
    ];

    $sent = wp_mail( $to, $subject, $body, $headers );

    if ( $sent ) {
        wp_send_json_success( [
            'message' => "Thank you, $name! Your message has been sent. We'll be in touch within 24 hours.",
        ] );
    } else {
        wp_send_json_error( [
            'message' => 'Failed to send your message. Please email us directly at ' . ve_option( 've_email' ),
        ] );
    }
}
add_action( 'wp_ajax_ve_contact_form',        'vaultedge_handle_contact_form' );
add_action( 'wp_ajax_nopriv_ve_contact_form', 'vaultedge_handle_contact_form' );
