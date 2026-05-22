<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/core-img/favicon.ico">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div><div></div><div></div><div></div>
        </div>
    </div>

    <!-- NAVBAR -->
    <header class="ve-header" id="ve-sticky">
        <div class="container-fluid ve-nav-wrap">

            <!-- Logo -->
            <div class="ve-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php vaultedge_logo(); ?>
                </a>
            </div>

            <!-- Primary Navigation (desktop) -->
            <?php
            wp_nav_menu( [
                'theme_location'  => 'primary',
                'container'       => 'nav',
                'container_class' => 've-nav',
                'menu_class'      => '',
                'walker'          => new VaultEdge_Nav_Walker(),
                'fallback_cb'     => '__return_false',
            ] );
            ?>

            <!-- CTA -->
            <div class="ve-nav-cta">
                <a href="<?php echo esc_url( site_url( '/contact' ) ); ?>" class="ve-cta-btn">
                    Get Started <i class="fa fa-arrow-right"></i>
                </a>
            </div>

            <!-- Mobile Toggle -->
            <button class="ve-toggler" id="ve-toggle" aria-label="Toggle navigation">
                <span></span><span></span><span></span>
            </button>

        </div>

        <!-- Mobile Navigation -->
        <?php
        wp_nav_menu( [
            'theme_location'  => 'primary',
            'container'       => 'div',
            'container_class' => 've-mobile-menu',
            'container_id'    => 've-mobile-menu',
            'menu_class'      => '',
            'depth'           => 1,
            'fallback_cb'     => '__return_false',
        ] );
        ?>

    </header>
