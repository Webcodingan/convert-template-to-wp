<?php

// ── Disable emoji scripts (saves ~10 KB per page) ───────────────────────────
remove_action( 'wp_head',               'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts',   'print_emoji_detection_script' );
remove_action( 'wp_print_styles',       'print_emoji_styles' );
remove_action( 'admin_print_styles',    'print_emoji_styles' );
remove_filter( 'the_content_feed',      'wp_staticize_emoji' );
remove_filter( 'comment_text_rss',      'wp_staticize_emoji' );
remove_filter( 'wp_mail',              'wp_staticize_emoji_for_email' );

// Remove TinyMCE emoji as well
add_filter( 'tiny_mce_plugins', function ( $plugins ) {
    return array_diff( (array) $plugins, [ 'wpemoji' ] );
} );

// ── Add preconnect hints for Google Fonts ───────────────────────────────────
add_action( 'wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}, 1 );

// ── Defer non-critical third-party scripts ──────────────────────────────────
function vaultedge_defer_scripts( $tag, $handle, $src ) {
    $defer_handles = [ 've-plugins', 've-active', 've-theme', 've-popper', 've-bootstrap' ];
    if ( in_array( $handle, $defer_handles, true ) ) {
        return str_replace( ' src=', ' defer src=', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'vaultedge_defer_scripts', 10, 3 );

// ── Native lazy loading for post content images ─────────────────────────────
add_filter( 'the_content', function ( $content ) {
    return str_replace( '<img ', '<img loading="lazy" ', $content );
} );

// ── Add loading="lazy" to post thumbnails ───────────────────────────────────
add_filter( 'wp_get_attachment_image_attributes', function ( $attrs ) {
    if ( ! isset( $attrs['loading'] ) ) {
        $attrs['loading'] = 'lazy';
    }
    return $attrs;
} );

// ── Remove Gutenberg block library CSS on non-block pages ───────────────────
add_action( 'wp_enqueue_scripts', function () {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' );
}, 100 );

// ── Disable Heartbeat API on the frontend (only needed in admin) ─────────────
add_action( 'init', function () {
    if ( ! is_admin() ) {
        wp_deregister_script( 'heartbeat' );
    }
} );

// ── Remove jQuery Migrate unless explicitly required ────────────────────────
add_action( 'wp_default_scripts', function ( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
        if ( $script->deps ) {
            $script->deps = array_diff( $script->deps, [ 'jquery-migrate' ] );
        }
    }
} );

// ── Add DNS prefetch for external domains ───────────────────────────────────
add_action( 'wp_head', function () {
    echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">' . "\n";
    echo '<link rel="dns-prefetch" href="//fonts.gstatic.com">' . "\n";
}, 0 );
