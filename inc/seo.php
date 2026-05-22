<?php

/**
 * SEO: dynamic meta description, Open Graph, Twitter Card, JSON-LD schema.
 * Title tag is handled natively via add_theme_support('title-tag') in setup.php.
 */

function vaultedge_seo_meta() {
    global $post;

    // ── Description ─────────────────────────────────────────────
    if ( is_singular() && ! empty( $post ) ) {
        $desc = $post->post_excerpt
            ? wp_strip_all_tags( $post->post_excerpt )
            : wp_trim_words( wp_strip_all_tags( $post->post_content ), 25, '' );
    } elseif ( is_front_page() ) {
        $desc = wp_strip_all_tags( ve_option( 've_footer_desc' ) );
        if ( ! $desc ) {
            $desc = get_bloginfo( 'description' );
        }
    } else {
        $desc = get_bloginfo( 'description' );
    }
    $desc = esc_attr( wp_strip_all_tags( $desc ) );

    // ── OG image ────────────────────────────────────────────────
    if ( is_singular() && has_post_thumbnail() ) {
        $og_img = get_the_post_thumbnail_url( $post->ID, 've-hero' );
    } else {
        $og_img = get_template_directory_uri() . '/assets/img/og-default.jpg';
    }

    // ── Canonical URL ───────────────────────────────────────────
    $canonical = is_singular() ? get_permalink() : home_url( add_query_arg( [] ) );

    // ── OG type ─────────────────────────────────────────────────
    $og_type = is_singular( 'post' ) ? 'article' : 'website';

    // ── Title ───────────────────────────────────────────────────
    $og_title = is_singular()
        ? get_the_title() . ' | ' . get_bloginfo( 'name' )
        : wp_get_document_title();

    ?>
    <?php if ( $desc ) : ?>
    <meta name="description" content="<?php echo $desc; ?>">
    <?php endif; ?>
    <link rel="canonical" href="<?php echo esc_url( $canonical ); ?>">

    <!-- Open Graph -->
    <meta property="og:type"        content="<?php echo esc_attr( $og_type ); ?>">
    <meta property="og:title"       content="<?php echo esc_attr( $og_title ); ?>">
    <meta property="og:description" content="<?php echo $desc; ?>">
    <meta property="og:url"         content="<?php echo esc_url( $canonical ); ?>">
    <meta property="og:site_name"   content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
    <?php if ( $og_img ) : ?>
    <meta property="og:image"       content="<?php echo esc_url( $og_img ); ?>">
    <meta property="og:image:width"  content="1920">
    <meta property="og:image:height" content="900">
    <?php endif; ?>

    <!-- Twitter Card -->
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="<?php echo esc_attr( $og_title ); ?>">
    <meta name="twitter:description" content="<?php echo $desc; ?>">
    <?php if ( $og_img ) : ?>
    <meta name="twitter:image"       content="<?php echo esc_url( $og_img ); ?>">
    <?php endif; ?>
    <?php
}
add_action( 'wp_head', 'vaultedge_seo_meta', 2 );


/**
 * JSON-LD structured data — LocalBusiness on front page, Article on posts.
 */
function vaultedge_schema_markup() {
    if ( is_front_page() ) {
        $schema = [
            '@context'        => 'https://schema.org',
            '@type'           => 'FinancialService',
            'name'            => get_bloginfo( 'name' ),
            'description'     => wp_strip_all_tags( ve_option( 've_footer_desc' ) ),
            'url'             => home_url( '/' ),
            'telephone'       => ve_option( 've_phone' ),
            'email'           => ve_option( 've_email' ),
            'address'         => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => ve_option( 've_address' ),
            ],
            'openingHours'    => ve_option( 've_hours' ),
            'sameAs'          => array_filter( [
                ve_option( 've_facebook' ),
                ve_option( 've_twitter' ),
                ve_option( 've_linkedin' ),
                ve_option( 've_instagram' ),
            ] ),
        ];
        // Remove empty keys
        $schema = array_filter( $schema );
        echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";

    } elseif ( is_singular( 'post' ) ) {
        global $post;
        $schema = [
            '@context'         => 'https://schema.org',
            '@type'            => 'Article',
            'headline'         => get_the_title(),
            'description'      => wp_trim_words( wp_strip_all_tags( $post->post_content ), 25, '' ),
            'datePublished'    => get_the_date( 'c' ),
            'dateModified'     => get_the_modified_date( 'c' ),
            'author'           => [
                '@type' => 'Person',
                'name'  => get_the_author(),
            ],
            'publisher'        => [
                '@type' => 'Organization',
                'name'  => get_bloginfo( 'name' ),
                'url'   => home_url( '/' ),
            ],
            'mainEntityOfPage' => get_permalink(),
        ];
        if ( has_post_thumbnail() ) {
            $schema['image'] = get_the_post_thumbnail_url( $post->ID, 've-hero' );
        }
        echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
    }
}
add_action( 'wp_head', 'vaultedge_schema_markup', 5 );


/**
 * Custom document title separator.
 */
add_filter( 'document_title_separator', function () {
    return '|';
} );
