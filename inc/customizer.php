<?php

/**
 * Theme Customizer settings — site-wide editable options.
 * Accessible at: Appearance → Customize
 */
function vaultedge_customizer_register( $wp_customize ) {

    // ── CONTACT INFORMATION ──────────────────────────────────────
    $wp_customize->add_section( 've_contact_info', [
        'title'    => 'Contact Information',
        'priority' => 30,
    ] );

    $contact_fields = [
        've_address' => [ 'Address',        '42 Harbor View, San Francisco, CA 94105' ],
        've_phone'   => [ 'Phone Number',   '+1 800 555 0199' ],
        've_email'   => [ 'Email Address',  'hello@vaultedge.com' ],
        've_hours'   => [ 'Business Hours', 'Mon–Fri, 9am – 6pm' ],
    ];

    foreach ( $contact_fields as $key => [ $label, $default ] ) {
        $wp_customize->add_setting( $key, [
            'default'           => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ] );
        $wp_customize->add_control( $key, [
            'label'   => $label,
            'section' => 've_contact_info',
            'type'    => 'text',
        ] );
    }

    // ── SOCIAL MEDIA ─────────────────────────────────────────────
    $wp_customize->add_section( 've_social_media', [
        'title'    => 'Social Media Links',
        'priority' => 31,
    ] );

    $social_fields = [
        've_facebook'  => 'Facebook URL',
        've_twitter'   => 'Twitter URL',
        've_linkedin'  => 'LinkedIn URL',
        've_instagram' => 'Instagram URL',
    ];

    foreach ( $social_fields as $key => $label ) {
        $wp_customize->add_setting( $key, [
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ] );
        $wp_customize->add_control( $key, [
            'label'   => $label,
            'section' => 've_social_media',
            'type'    => 'url',
        ] );
    }

    // ── FOOTER ───────────────────────────────────────────────────
    $wp_customize->add_section( 've_footer', [
        'title'    => 'Footer Settings',
        'priority' => 32,
    ] );

    $wp_customize->add_setting( 've_footer_desc', [
        'default'           => 'Empowering individuals and businesses with intelligent financial strategies since 2012.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );
    $wp_customize->add_control( 've_footer_desc', [
        'label'   => 'Footer Brand Description',
        'section' => 've_footer',
        'type'    => 'textarea',
    ] );

    $wp_customize->add_setting( 've_copyright_text', [
        'default'           => 'VaultEdge. All Rights Reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 've_copyright_text', [
        'label'   => 'Copyright Text',
        'section' => 've_footer',
        'type'    => 'text',
    ] );

    // ── HOMEPAGE COUNTERS ────────────────────────────────────────
    $wp_customize->add_section( 've_counters', [
        'title'    => 'Homepage Counters',
        'priority' => 33,
    ] );

    $counter_fields = [
        've_counter_clients'   => [ 'Happy Clients (number)',       '50000' ],
        've_counter_assets'    => [ 'Assets Managed (number)',      '4200' ],
        've_counter_countries' => [ 'Countries Served (number)',    '30' ],
        've_counter_awards'    => [ 'Industry Awards (number)',     '18' ],
    ];

    foreach ( $counter_fields as $key => [ $label, $default ] ) {
        $wp_customize->add_setting( $key, [
            'default'           => $default,
            'sanitize_callback' => 'absint',
        ] );
        $wp_customize->add_control( $key, [
            'label'   => $label,
            'section' => 've_counters',
            'type'    => 'number',
        ] );
    }
}
add_action( 'customize_register', 'vaultedge_customizer_register' );


/**
 * Helper: returns a customizer value with its registered default as fallback.
 */
function ve_option( $key ) {
    global $wp_customize;

    $defaults = [
        've_address'          => '42 Harbor View, San Francisco, CA 94105',
        've_phone'            => '+1 800 555 0199',
        've_email'            => 'hello@vaultedge.com',
        've_hours'            => 'Mon–Fri, 9am – 6pm',
        've_facebook'         => '',
        've_twitter'          => '',
        've_linkedin'         => '',
        've_instagram'        => '',
        've_footer_desc'      => 'Empowering individuals and businesses with intelligent financial strategies since 2012.',
        've_copyright_text'   => 'VaultEdge. All Rights Reserved.',
        've_counter_clients'  => '50000',
        've_counter_assets'   => '4200',
        've_counter_countries'=> '30',
        've_counter_awards'   => '18',
    ];

    return get_theme_mod( $key, $defaults[ $key ] ?? '' );
}
