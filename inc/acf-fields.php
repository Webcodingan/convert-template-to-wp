<?php

/**
 * Registers ACF field groups programmatically.
 * Requires Advanced Custom Fields plugin to be active.
 * Also configures acf-json save/load paths for Git tracking.
 */

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}

// ── ACF JSON: save & load from theme directory ────────────────────
add_filter( 'acf/settings/save_json', function () {
    return get_template_directory() . '/acf-json';
} );

add_filter( 'acf/settings/load_json', function ( $paths ) {
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
} );


add_action( 'acf/init', function () {

    // ── Service Details ──────────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_ve_service',
        'title'  => 'Service Details',
        'fields' => [
            [
                'key'           => 'field_ve_service_icon',
                'label'         => 'Icon Class',
                'name'          => 've_service_icon',
                'type'          => 'text',
                'instructions'  => 'CSS class from Credit Icon set. E.g. icon-profits, icon-money-1, icon-coin, icon-smartphone-1, icon-diamond, icon-piggy-bank',
                'default_value' => 'icon-profits',
                'required'      => 0,
            ],
            [
                'key'          => 'field_ve_service_link',
                'label'        => 'Custom Link URL',
                'name'         => 've_service_link',
                'type'         => 'url',
                'instructions' => 'Override the default link. Leave blank to use this service\'s permalink.',
                'required'     => 0,
            ],
        ],
        'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 've_service' ] ] ],
    ] );

    // ── Team Member Details ──────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_ve_team',
        'title'  => 'Team Member Details',
        'fields' => [
            [
                'key'      => 'field_ve_team_role',
                'label'    => 'Job Title / Role',
                'name'     => 've_team_role',
                'type'     => 'text',
                'required' => 1,
            ],
            [
                'key'      => 'field_ve_team_linkedin',
                'label'    => 'LinkedIn URL',
                'name'     => 've_team_linkedin',
                'type'     => 'url',
                'required' => 0,
            ],
            [
                'key'      => 'field_ve_team_twitter',
                'label'    => 'Twitter URL',
                'name'     => 've_team_twitter',
                'type'     => 'url',
                'required' => 0,
            ],
        ],
        'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 've_team' ] ] ],
    ] );

    // ── Testimonial Details ──────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_ve_testimonial',
        'title'  => 'Testimonial Details',
        'fields' => [
            [
                'key'      => 'field_ve_client_name',
                'label'    => 'Client Name',
                'name'     => 've_client_name',
                'type'     => 'text',
                'required' => 1,
            ],
            [
                'key'      => 'field_ve_client_role',
                'label'    => 'Client Role / Title',
                'name'     => 've_client_role',
                'type'     => 'text',
                'required' => 1,
            ],
            [
                'key'           => 'field_ve_client_avatar',
                'label'         => 'Client Photo',
                'name'          => 've_client_avatar',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 've-square',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_rating',
                'label'         => 'Star Rating',
                'name'          => 've_rating',
                'type'          => 'number',
                'min'           => 1,
                'max'           => 5,
                'step'          => 1,
                'default_value' => 5,
                'required'      => 1,
            ],
        ],
        'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 've_testimonial' ] ] ],
    ] );

} );
