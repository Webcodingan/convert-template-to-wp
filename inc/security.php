<?php

// ── Remove WordPress version exposure ───────────────────────────────────────
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

// Strip ?ver= query string from CSS/JS URLs in the frontend
function vaultedge_remove_version_query( $src ) {
    if ( is_admin() ) {
        return $src;
    }
    $parts = explode( '?', $src );
    if ( isset( $parts[1] ) ) {
        parse_str( $parts[1], $query );
        unset( $query['ver'] );
        $src = empty( $query ) ? $parts[0] : $parts[0] . '?' . http_build_query( $query );
    }
    return $src;
}
add_filter( 'style_loader_src',  'vaultedge_remove_version_query', 9999 );
add_filter( 'script_loader_src', 'vaultedge_remove_version_query', 9999 );

// ── Disable XML-RPC ─────────────────────────────────────────────────────────
add_filter( 'xmlrpc_enabled', '__return_false' );

// Remove X-Pingback header
add_filter( 'wp_headers', function ( $headers ) {
    unset( $headers['X-Pingback'] );
    return $headers;
} );

// ── Disable file editing via admin UI ───────────────────────────────────────
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
    define( 'DISALLOW_FILE_EDIT', true );
}

// ── Obscure login error messages ────────────────────────────────────────────
add_filter( 'login_errors', function () {
    return esc_html__( 'Login failed. Please check your credentials.', 'vaultedge' );
} );

// ── Disable REST API user enumeration for non-logged-in visitors ────────────
add_filter( 'rest_endpoints', function ( $endpoints ) {
    if ( ! is_user_logged_in() ) {
        unset( $endpoints['/wp/v2/users'] );
        unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
    }
    return $endpoints;
} );

// ── Remove unnecessary HTML head tags ───────────────────────────────────────
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
remove_action( 'wp_head', 'feed_links_extra', 3 );

// ── Disable Trackbacks/Pingbacks ────────────────────────────────────────────
add_filter( 'pings_open', '__return_false', 20 );

// ── Remove WordPress from RSS generator string ──────────────────────────────
add_filter( 'the_generator', '__return_empty_string' );

// ── Content Security Policy header — restrictive for financial sites ─────────
add_action( 'send_headers', function () {
    if ( is_admin() ) {
        return;
    }
    header( "X-Content-Type-Options: nosniff" );
    header( "X-Frame-Options: SAMEORIGIN" );
    header( "X-XSS-Protection: 1; mode=block" );
    header( "Referrer-Policy: strict-origin-when-cross-origin" );
} );
