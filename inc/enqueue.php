<?php

function vaultedge_assets() {
    $ver = wp_get_theme()->get( 'Version' );
    $uri = get_template_directory_uri();

    // ── CSS ──────────────────────────────────────────────────────
    wp_enqueue_style( 've-bootstrap',   $uri . '/assets/css/bootstrap.min.css',   [],            '5.3.0' );
    wp_enqueue_style( 've-animate',     $uri . '/assets/css/animate.css',          [],            '4.1.1' );
    wp_enqueue_style( 've-fontawesome', $uri . '/assets/css/font-awesome.min.css', [],            '4.7.0' );
    wp_enqueue_style( 've-owl',         $uri . '/assets/css/owl.carousel.min.css', [],            '2.3.4' );
    wp_enqueue_style( 've-classy-nav',  $uri . '/assets/css/classy-nav.css',       [],            '1.0.0' );
    wp_enqueue_style( 've-credit-icon', $uri . '/assets/css/credit-icon.css',      [],            '1.0.0' );
    wp_enqueue_style( 've-main',        $uri . '/assets/css/style.css',            [],              $ver );
    wp_enqueue_style( 've-global',     $uri . '/assets/css/global.css',            [ 've-main' ],  $ver );
    wp_enqueue_style( 've-utilities',  $uri . '/assets/css/utilities.css',         [ 've-global' ], $ver );
    wp_enqueue_style( 've-components', $uri . '/assets/css/components.css',        [ 've-utilities' ], $ver );
    wp_enqueue_style( 've-pages',      $uri . '/assets/css/pages.css',             [ 've-components' ], $ver );
    wp_enqueue_style( 've-responsive', $uri . '/assets/css/responsive.css',        [ 've-pages' ], $ver );

    // ── JS ───────────────────────────────────────────────────────
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 've-popper',    $uri . '/assets/js/bootstrap/popper.min.js',    [ 'jquery' ],              '2.11.6', true );
    wp_enqueue_script( 've-bootstrap', $uri . '/assets/js/bootstrap/bootstrap.min.js', [ 'jquery', 've-popper' ], '5.3.0',  true );
    wp_enqueue_script( 've-plugins',   $uri . '/assets/js/plugins/plugins.js',          [ 'jquery' ],              '1.0.0',  true );
    wp_enqueue_script( 've-active',    $uri . '/assets/js/active.js',                   [ 'jquery' ],              $ver,     true );
    wp_enqueue_script( 've-theme',     $uri . '/assets/js/vaultedge.js',                [ 'jquery' ],              $ver,     true );

    // Contact form AJAX — only on contact page
    if ( is_page( 'contact' ) ) {
        wp_enqueue_script( 've-contact-form', $uri . '/assets/js/modules/contact-form.js', [ 'jquery' ], $ver, true );
        wp_localize_script( 've-contact-form', 'veAjax', [
            'url'   => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 've_contact_nonce' ),
        ] );
    }
}
add_action( 'wp_enqueue_scripts', 'vaultedge_assets' );
