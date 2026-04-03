<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php bloginfo('name'); ?></title>

    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/core-img/favicon.ico">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- NAVBAR -->
    <header class="ve-header" id="ve-sticky">
        <div class="container-fluid ve-nav-wrap">
            <!-- Logo -->
            <div class="ve-logo">
                <a href="<?php echo site_url('/'); ?>">
                    <span class="ve-logo-icon">V</span>
                    <span class="ve-logo-text">Vault<strong>Edge</strong></span>
                </a>
            </div>

            <!-- Nav Links -->
            <nav class="ve-nav">
                <ul>
                    <li><a href="<?php echo site_url('/'); ?>" class="active">Home</a></li>
                    <li class="has-drop">
                        <a href="<?php echo site_url('/about'); ?>">About <i class="fa fa-angle-down"></i></a>
                        <ul class="ve-dropdown">
                            <li><a href="<?php echo site_url('/about'); ?>">About Us</a></li>
                            <li><a href="<?php echo site_url('/services'); ?>">Our Services</a></li>
                            <li><a href="<?php echo site_url('/elements'); ?>">UI Elements</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('/services'); ?>">Services</a></li>
                    <li class="has-drop">
                        <a href="#">Solutions <i class="fa fa-angle-down"></i></a>
                        <ul class="ve-dropdown">
                            <li><a href="#">Wealth Management</a></li>
                            <li><a href="#">Retirement Plans</a></li>
                            <li><a href="#">Tax Advisory</a></li>
                            <li><a href="#">Risk Analysis</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('/post'); ?>">Insights</a></li>
                    <li><a href="<?php echo site_url('/contact'); ?>">Contact</a></li>
                </ul>
            </nav>

            <!-- CTA -->
            <div class="ve-nav-cta">
                <a href="<?php echo site_url('/contact'); ?>" class="ve-cta-btn">Get Started <i class="fa fa-arrow-right"></i></a>
            </div>

            <!-- Mobile Toggle -->
            <button class="ve-toggler" id="ve-toggle">
                <span></span><span></span><span></span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="ve-mobile-menu" id="ve-mobile-menu">
            <ul>
                <li><a href="<?php echo site_url('/'); ?>">Home</a></li>
                <li><a href="<?php echo site_url('/about'); ?>">About</a></li>
                <li><a href="<?php echo site_url('/services'); ?>">Services</a></li>
                <li><a href="#">Solutions</a></li>
                <li><a href="<?php echo site_url('/post'); ?>">Insights</a></li>
                <li><a href="<?php echo site_url('/contact'); ?>">Contact</a></li>
            </ul>
        </div>
    </header>