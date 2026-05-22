<?php

/**
 * Registers all Custom Post Types for VaultEdge theme.
 */
function vaultedge_register_post_types() {

    // ── Services ─────────────────────────────────────────────────
    register_post_type( 've_service', [
        'labels' => [
            'name'          => 'Services',
            'singular_name' => 'Service',
            'add_new_item'  => 'Add New Service',
            'edit_item'     => 'Edit Service',
            'all_items'     => 'All Services',
        ],
        'public'        => true,
        'has_archive'   => false,
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-money-alt',
        'menu_position' => 5,
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ],
        'rewrite'       => [ 'slug' => 'service', 'with_front' => false ],
    ] );

    // ── Team Members ─────────────────────────────────────────────
    register_post_type( 've_team', [
        'labels' => [
            'name'          => 'Team Members',
            'singular_name' => 'Team Member',
            'add_new_item'  => 'Add New Team Member',
            'edit_item'     => 'Edit Team Member',
            'all_items'     => 'All Team Members',
        ],
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-groups',
        'menu_position'      => 6,
        'supports'           => [ 'title', 'thumbnail', 'page-attributes' ],
    ] );

    // ── Testimonials ─────────────────────────────────────────────
    register_post_type( 've_testimonial', [
        'labels' => [
            'name'          => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new_item'  => 'Add New Testimonial',
            'edit_item'     => 'Edit Testimonial',
            'all_items'     => 'All Testimonials',
        ],
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-format-quote',
        'menu_position'      => 7,
        'supports'           => [ 'editor', 'thumbnail', 'page-attributes' ],
    ] );
}
add_action( 'init', 'vaultedge_register_post_types' );
