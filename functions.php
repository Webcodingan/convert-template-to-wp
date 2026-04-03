<?php

function vaultedge_assets()
{
    // CSS
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css');

    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');

    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');

    wp_enqueue_style('classy-nav', get_template_directory_uri() . '/assets/css/classy-nav.css');

    wp_enqueue_style('credit-icon', get_template_directory_uri() . '/assets/css/credit-icon.css');

    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css');

    wp_enqueue_style('custom-override', get_template_directory_uri() . '/assets/css/custom-override.css');

    // JS
    wp_enqueue_script('jquery');

    wp_enqueue_script('bootstrap-popper', get_template_directory_uri() . '/assets/js/bootstrap/popper.min.js', array('jquery'), false, true);

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.min.js', array('jquery'), false, true);

    wp_enqueue_script('plugins', get_template_directory_uri() . '/assets/js/plugins/plugins.js', array('jquery'), false, true);

    wp_enqueue_script('active', get_template_directory_uri() . '/assets/js/active.js', array('jquery'), false, true);

    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/vaultedge.js', array('jquery'), false, true);
}

add_action('wp_enqueue_scripts', 'vaultedge_assets');
