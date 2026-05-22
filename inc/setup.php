<?php

function vaultedge_setup() {
    // WordPress manages <title> tag
    add_theme_support( 'title-tag' );

    // Featured images
    add_theme_support( 'post-thumbnails' );

    // Custom logo with fallback dimensions
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    // HTML5 semantic markup
    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ] );

    // Navigation menus
    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'vaultedge' ),
        'footer'  => __( 'Footer Navigation', 'vaultedge' ),
    ] );

    // Custom image sizes for theme use
    add_image_size( 've-card',   800, 500, true );
    add_image_size( 've-square', 400, 400, true );
    add_image_size( 've-hero',  1920, 900, true );
}
add_action( 'after_setup_theme', 'vaultedge_setup' );
