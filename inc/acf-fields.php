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

    // ── About Page Content ──────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_ve_about_page',
        'title'  => 'About Page Content',
        'fields' => [

            // ── TAB: Hero ─────────────────────────────────────────
            [ 'key' => 'field_ve_about_tab_hero', 'label' => 'Hero Section', 'type' => 'tab' ],
            [
                'key'           => 'field_ve_about_hero_tag',
                'label'         => 'Hero Tag (small label above title)',
                'name'          => 've_about_hero_tag',
                'type'          => 'text',
                'default_value' => 'Our Story',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_hero_title',
                'label'         => 'Hero Title (plain part)',
                'name'          => 've_about_hero_title',
                'type'          => 'text',
                'instructions'  => 'Text before the highlighted year. E.g. "Building Trust Since"',
                'default_value' => 'Building Trust Since',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_hero_year',
                'label'         => 'Hero Title (highlighted year)',
                'name'          => 've_about_hero_year',
                'type'          => 'text',
                'instructions'  => 'Displayed in gold color. E.g. "2012"',
                'default_value' => '2012',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_hero_bg',
                'label'         => 'Hero Background Image',
                'name'          => 've_about_hero_bg',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 've-hero',
                'required'      => 0,
            ],

            // ── TAB: Who We Are ───────────────────────────────────
            [ 'key' => 'field_ve_about_tab_split', 'label' => 'Who We Are Section', 'type' => 'tab' ],
            [
                'key'           => 'field_ve_about_tag',
                'label'         => 'Section Tag',
                'name'          => 've_about_tag',
                'type'          => 'text',
                'default_value' => 'Who We Are',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_heading',
                'label'         => 'Heading (plain part)',
                'name'          => 've_about_heading',
                'type'          => 'text',
                'instructions'  => 'E.g. "A Firm Built on"',
                'default_value' => 'A Firm Built on',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_heading_hl',
                'label'         => 'Heading (highlighted word)',
                'name'          => 've_about_heading_hl',
                'type'          => 'text',
                'instructions'  => 'Displayed in gold color. E.g. "Integrity & Results"',
                'default_value' => 'Integrity &amp; Results',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_lead',
                'label'         => 'Lead Paragraph (bold intro text)',
                'name'          => 've_about_lead',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'We are a team of certified financial advisors and analysts dedicated to helping individuals and businesses achieve financial clarity and long-term prosperity.',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_body',
                'label'         => 'Body Paragraph',
                'name'          => 've_about_body',
                'type'          => 'textarea',
                'rows'          => 4,
                'default_value' => 'Founded in San Francisco in 2012, VaultEdge started with a single mission: make professional wealth management accessible to everyone. Today, we manage over $4.2 billion in assets across 30+ countries.',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_feat_1',
                'label'         => 'Feature Item 1',
                'name'          => 've_about_feat_1',
                'type'          => 'text',
                'default_value' => 'Certified Financial Planners (CFP)',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_feat_2',
                'label'         => 'Feature Item 2',
                'name'          => 've_about_feat_2',
                'type'          => 'text',
                'default_value' => 'SEC Registered Investment Advisor',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_feat_3',
                'label'         => 'Feature Item 3',
                'name'          => 've_about_feat_3',
                'type'          => 'text',
                'default_value' => 'Fiduciary — we always act in your interest',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_feat_4',
                'label'         => 'Feature Item 4',
                'name'          => 've_about_feat_4',
                'type'          => 'text',
                'default_value' => 'No conflict-of-interest products',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_cta_text',
                'label'         => 'CTA Button Text',
                'name'          => 've_about_cta_text',
                'type'          => 'text',
                'default_value' => 'View Our Services',
                'required'      => 0,
            ],
            [
                'key'      => 'field_ve_about_cta_url',
                'label'    => 'CTA Button URL',
                'name'     => 've_about_cta_url',
                'type'     => 'url',
                'required' => 0,
            ],
            [
                'key'           => 'field_ve_about_ribbon_num',
                'label'         => 'Ribbon — Number/Badge',
                'name'          => 've_about_ribbon_num',
                'type'          => 'text',
                'instructions'  => 'E.g. "12+" — shown on the floating gold badge over the image.',
                'default_value' => '12+',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_ribbon_lbl',
                'label'         => 'Ribbon — Label',
                'name'          => 've_about_ribbon_lbl',
                'type'          => 'text',
                'default_value' => 'Years of Trust',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_img_main',
                'label'         => 'Main Photo (large)',
                'name'          => 've_about_img_main',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 've-card',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_about_img_accent',
                'label'         => 'Accent Photo (small overlay)',
                'name'          => 've_about_img_accent',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 've-square',
                'required'      => 0,
            ],

            // ── TAB: Mission Vision Values ─────────────────────────
            [ 'key' => 'field_ve_about_tab_mvv', 'label' => 'Mission / Vision / Values', 'type' => 'tab' ],
            [
                'key'           => 'field_ve_mvv_tag',
                'label'         => 'Section Tag',
                'name'          => 've_mvv_tag',
                'type'          => 'text',
                'default_value' => 'Our Foundation',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_mvv_heading',
                'label'         => 'Heading (plain part)',
                'name'          => 've_mvv_heading',
                'type'          => 'text',
                'default_value' => 'Mission, Vision &',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_mvv_heading_hl',
                'label'         => 'Heading (highlighted word)',
                'name'          => 've_mvv_heading_hl',
                'type'          => 'text',
                'default_value' => 'Values',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_mvv_mission_title',
                'label'         => 'Mission — Card Title',
                'name'          => 've_mvv_mission_title',
                'type'          => 'text',
                'default_value' => 'Our Mission',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_mvv_mission_text',
                'label'         => 'Mission — Description',
                'name'          => 've_mvv_mission_text',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'To democratise access to world-class financial planning, empowering every client to make smarter money decisions with confidence.',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_mvv_vision_title',
                'label'         => 'Vision — Card Title',
                'name'          => 've_mvv_vision_title',
                'type'          => 'text',
                'default_value' => 'Our Vision',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_mvv_vision_text',
                'label'         => 'Vision — Description',
                'name'          => 've_mvv_vision_text',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'To be the most trusted financial partner for the next generation of wealth builders — globally recognised for integrity and innovation.',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_mvv_values_title',
                'label'         => 'Values — Card Title',
                'name'          => 've_mvv_values_title',
                'type'          => 'text',
                'default_value' => 'Our Values',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_mvv_values_text',
                'label'         => 'Values — Description',
                'name'          => 've_mvv_values_text',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => 'Transparency, client-first thinking, continuous innovation, and an unwavering commitment to ethical financial practice.',
                'required'      => 0,
            ],
        ],
        'location' => [ [ [ 'param' => 'page_template', 'operator' => '==', 'value' => 'page-about.php' ] ] ],
        'menu_order' => 0,
        'position'   => 'normal',
        'style'      => 'default',
    ] );

    // ── Services Page Content ────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_ve_services_page',
        'title'  => 'Services Page Content',
        'fields' => [

            // ── TAB: Hero ─────────────────────────────────────────
            [ 'key' => 'field_ve_svc_tab_hero', 'label' => 'Hero Section', 'type' => 'tab' ],
            [
                'key'           => 'field_ve_svc_hero_tag',
                'label'         => 'Hero Tag',
                'name'          => 've_svc_hero_tag',
                'type'          => 'text',
                'default_value' => 'What We Offer',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_svc_hero_title',
                'label'         => 'Hero Title (plain part)',
                'name'          => 've_svc_hero_title',
                'type'          => 'text',
                'instructions'  => 'Text before the highlighted word. E.g. "Comprehensive"',
                'default_value' => 'Comprehensive',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_svc_hero_title_hl',
                'label'         => 'Hero Title (highlighted part)',
                'name'          => 've_svc_hero_title_hl',
                'type'          => 'text',
                'instructions'  => 'Displayed in gold color. E.g. "Financial Services"',
                'default_value' => 'Financial Services',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_svc_hero_bg',
                'label'         => 'Hero Background Image',
                'name'          => 've_svc_hero_bg',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 've-hero',
                'required'      => 0,
            ],

            // ── TAB: Services Grid ────────────────────────────────
            [ 'key' => 'field_ve_svc_tab_grid', 'label' => 'Services Grid', 'type' => 'tab' ],
            [
                'key'           => 'field_ve_svc_grid_tag',
                'label'         => 'Section Tag',
                'name'          => 've_svc_grid_tag',
                'type'          => 'text',
                'default_value' => 'Our Expertise',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_svc_grid_heading',
                'label'         => 'Section Heading (plain part)',
                'name'          => 've_svc_grid_heading',
                'type'          => 'text',
                'default_value' => 'Solutions for Every',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_svc_grid_heading_hl',
                'label'         => 'Section Heading (highlighted part)',
                'name'          => 've_svc_grid_heading_hl',
                'type'          => 'text',
                'default_value' => 'Financial Goal',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_svc_grid_subtext',
                'label'         => 'Section Subtext',
                'name'          => 've_svc_grid_subtext',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => "Whether you're just starting out or managing significant wealth, we have a solution designed for you.",
                'required'      => 0,
            ],
            // Service Card 1
            [ 'key' => 'field_ve_svc1_icon',  'label' => 'Service 1 — Icon Class',   'name' => 've_svc1_icon',  'type' => 'text',     'default_value' => 'icon-profits',     'required' => 0 ],
            [ 'key' => 'field_ve_svc1_title', 'label' => 'Service 1 — Title',         'name' => 've_svc1_title', 'type' => 'text',     'default_value' => 'Investment Planning', 'required' => 0 ],
            [ 'key' => 'field_ve_svc1_desc',  'label' => 'Service 1 — Description',   'name' => 've_svc1_desc',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'We craft diversified, goal-aligned portfolios based on your risk profile, timeline, and financial ambitions.', 'required' => 0 ],
            [ 'key' => 'field_ve_svc1_link',  'label' => 'Service 1 — Link URL',      'name' => 've_svc1_link',  'type' => 'url',      'required' => 0 ],
            // Service Card 2
            [ 'key' => 'field_ve_svc2_icon',  'label' => 'Service 2 — Icon Class',   'name' => 've_svc2_icon',  'type' => 'text',     'default_value' => 'icon-money-1',     'required' => 0 ],
            [ 'key' => 'field_ve_svc2_title', 'label' => 'Service 2 — Title',         'name' => 've_svc2_title', 'type' => 'text',     'default_value' => 'Wealth Management', 'required' => 0 ],
            [ 'key' => 'field_ve_svc2_desc',  'label' => 'Service 2 — Description',   'name' => 've_svc2_desc',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'Holistic strategies to grow, protect, and transfer your wealth across generations — personalised to your life.', 'required' => 0 ],
            [ 'key' => 'field_ve_svc2_link',  'label' => 'Service 2 — Link URL',      'name' => 've_svc2_link',  'type' => 'url',      'required' => 0 ],
            // Service Card 3
            [ 'key' => 'field_ve_svc3_icon',  'label' => 'Service 3 — Icon Class',   'name' => 've_svc3_icon',  'type' => 'text',     'default_value' => 'icon-coin',        'required' => 0 ],
            [ 'key' => 'field_ve_svc3_title', 'label' => 'Service 3 — Title',         'name' => 've_svc3_title', 'type' => 'text',     'default_value' => 'Retirement Planning', 'required' => 0 ],
            [ 'key' => 'field_ve_svc3_desc',  'label' => 'Service 3 — Description',   'name' => 've_svc3_desc',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'Build a retirement that funds your lifestyle with structured pension plans and tax-advantaged savings.', 'required' => 0 ],
            [ 'key' => 'field_ve_svc3_link',  'label' => 'Service 3 — Link URL',      'name' => 've_svc3_link',  'type' => 'url',      'required' => 0 ],
            // Service Card 4
            [ 'key' => 'field_ve_svc4_icon',  'label' => 'Service 4 — Icon Class',   'name' => 've_svc4_icon',  'type' => 'text',     'default_value' => 'icon-smartphone-1', 'required' => 0 ],
            [ 'key' => 'field_ve_svc4_title', 'label' => 'Service 4 — Title',         'name' => 've_svc4_title', 'type' => 'text',     'default_value' => 'Tax Advisory',     'required' => 0 ],
            [ 'key' => 'field_ve_svc4_desc',  'label' => 'Service 4 — Description',   'name' => 've_svc4_desc',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'Maximise your after-tax returns with proactive, year-round tax planning and compliance strategies.', 'required' => 0 ],
            [ 'key' => 'field_ve_svc4_link',  'label' => 'Service 4 — Link URL',      'name' => 've_svc4_link',  'type' => 'url',      'required' => 0 ],
            // Service Card 5
            [ 'key' => 'field_ve_svc5_icon',  'label' => 'Service 5 — Icon Class',   'name' => 've_svc5_icon',  'type' => 'text',     'default_value' => 'icon-diamond',     'required' => 0 ],
            [ 'key' => 'field_ve_svc5_title', 'label' => 'Service 5 — Title',         'name' => 've_svc5_title', 'type' => 'text',     'default_value' => 'Risk Management',  'required' => 0 ],
            [ 'key' => 'field_ve_svc5_desc',  'label' => 'Service 5 — Description',   'name' => 've_svc5_desc',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'Identify, assess, and mitigate financial and market risks before they affect your portfolio or business.', 'required' => 0 ],
            [ 'key' => 'field_ve_svc5_link',  'label' => 'Service 5 — Link URL',      'name' => 've_svc5_link',  'type' => 'url',      'required' => 0 ],
            // Service Card 6
            [ 'key' => 'field_ve_svc6_icon',  'label' => 'Service 6 — Icon Class',   'name' => 've_svc6_icon',  'type' => 'text',     'default_value' => 'icon-piggy-bank',  'required' => 0 ],
            [ 'key' => 'field_ve_svc6_title', 'label' => 'Service 6 — Title',         'name' => 've_svc6_title', 'type' => 'text',     'default_value' => 'Savings &amp; Goals', 'required' => 0 ],
            [ 'key' => 'field_ve_svc6_desc',  'label' => 'Service 6 — Description',   'name' => 've_svc6_desc',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'Automated savings tools and milestone-based plans that keep you on track for every financial goal.', 'required' => 0 ],
            [ 'key' => 'field_ve_svc6_link',  'label' => 'Service 6 — Link URL',      'name' => 've_svc6_link',  'type' => 'url',      'required' => 0 ],

            // ── TAB: Process Steps ────────────────────────────────
            [ 'key' => 'field_ve_svc_tab_process', 'label' => 'Process Steps', 'type' => 'tab' ],
            [
                'key'           => 'field_ve_proc_tag',
                'label'         => 'Section Tag',
                'name'          => 've_proc_tag',
                'type'          => 'text',
                'default_value' => 'How It Works',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_proc_heading',
                'label'         => 'Section Heading (plain part)',
                'name'          => 've_proc_heading',
                'type'          => 'text',
                'default_value' => 'Getting Started is',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_proc_heading_hl',
                'label'         => 'Section Heading (highlighted part)',
                'name'          => 've_proc_heading_hl',
                'type'          => 'text',
                'default_value' => 'Simple',
                'required'      => 0,
            ],
            // Step 1
            [ 'key' => 'field_ve_step1_num',   'label' => 'Step 1 — Number',      'name' => 've_step1_num',   'type' => 'text',     'default_value' => '01', 'required' => 0 ],
            [ 'key' => 'field_ve_step1_title', 'label' => 'Step 1 — Title',       'name' => 've_step1_title', 'type' => 'text',     'default_value' => 'Book a Consultation', 'required' => 0 ],
            [ 'key' => 'field_ve_step1_desc',  'label' => 'Step 1 — Description', 'name' => 've_step1_desc',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'Schedule a free 30-minute call with one of our certified advisors to discuss your goals.', 'required' => 0 ],
            // Step 2
            [ 'key' => 'field_ve_step2_num',   'label' => 'Step 2 — Number',      'name' => 've_step2_num',   'type' => 'text',     'default_value' => '02', 'required' => 0 ],
            [ 'key' => 'field_ve_step2_title', 'label' => 'Step 2 — Title',       'name' => 've_step2_title', 'type' => 'text',     'default_value' => 'Financial Assessment', 'required' => 0 ],
            [ 'key' => 'field_ve_step2_desc',  'label' => 'Step 2 — Description', 'name' => 've_step2_desc',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'We analyse your financial position, risk tolerance, and long-term objectives.', 'required' => 0 ],
            // Step 3
            [ 'key' => 'field_ve_step3_num',   'label' => 'Step 3 — Number',      'name' => 've_step3_num',   'type' => 'text',     'default_value' => '03', 'required' => 0 ],
            [ 'key' => 'field_ve_step3_title', 'label' => 'Step 3 — Title',       'name' => 've_step3_title', 'type' => 'text',     'default_value' => 'Custom Strategy', 'required' => 0 ],
            [ 'key' => 'field_ve_step3_desc',  'label' => 'Step 3 — Description', 'name' => 've_step3_desc',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'Receive a fully personalised financial plan tailored to your unique situation and goals.', 'required' => 0 ],
            // Step 4
            [ 'key' => 'field_ve_step4_num',   'label' => 'Step 4 — Number',      'name' => 've_step4_num',   'type' => 'text',     'default_value' => '04', 'required' => 0 ],
            [ 'key' => 'field_ve_step4_title', 'label' => 'Step 4 — Title',       'name' => 've_step4_title', 'type' => 'text',     'default_value' => 'Ongoing Support', 'required' => 0 ],
            [ 'key' => 'field_ve_step4_desc',  'label' => 'Step 4 — Description', 'name' => 've_step4_desc',  'type' => 'textarea', 'rows' => 2, 'default_value' => 'We monitor, adjust, and optimise your plan continuously as markets and life evolve.', 'required' => 0 ],

            // ── TAB: FAQ ──────────────────────────────────────────
            [ 'key' => 'field_ve_svc_tab_faq', 'label' => 'FAQ Section', 'type' => 'tab' ],
            [
                'key'           => 'field_ve_faq_tag',
                'label'         => 'Section Tag',
                'name'          => 've_faq_tag',
                'type'          => 'text',
                'default_value' => 'Common Questions',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_faq_heading',
                'label'         => 'Section Heading (plain part)',
                'name'          => 've_faq_heading',
                'type'          => 'text',
                'default_value' => 'Frequently Asked',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_faq_heading_hl',
                'label'         => 'Section Heading (highlighted part)',
                'name'          => 've_faq_heading_hl',
                'type'          => 'text',
                'default_value' => 'Questions',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_faq_sidebar_text',
                'label'         => 'Sidebar Text',
                'name'          => 've_faq_sidebar_text',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => "Can't find what you're looking for? Reach out to us and we'll respond within 24 hours.",
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_faq_cta_text',
                'label'         => 'Sidebar CTA Button Text',
                'name'          => 've_faq_cta_text',
                'type'          => 'text',
                'default_value' => 'Contact Our Team',
                'required'      => 0,
            ],
            // FAQ Item 1
            [ 'key' => 'field_ve_faq1_q', 'label' => 'FAQ 1 — Question', 'name' => 've_faq1_q', 'type' => 'text',     'default_value' => 'How do I get started with VaultEdge?', 'required' => 0 ],
            [ 'key' => 'field_ve_faq1_a', 'label' => 'FAQ 1 — Answer',   'name' => 've_faq1_a', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Simply book a free consultation via our contact page. One of our advisors will reach out within one business day.', 'required' => 0 ],
            // FAQ Item 2
            [ 'key' => 'field_ve_faq2_q', 'label' => 'FAQ 2 — Question', 'name' => 've_faq2_q', 'type' => 'text',     'default_value' => 'What is the minimum investment to get started?', 'required' => 0 ],
            [ 'key' => 'field_ve_faq2_a', 'label' => 'FAQ 2 — Answer',   'name' => 've_faq2_a', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'There is no minimum investment. We work with clients at all wealth levels and tailor our services accordingly.', 'required' => 0 ],
            // FAQ Item 3
            [ 'key' => 'field_ve_faq3_q', 'label' => 'FAQ 3 — Question', 'name' => 've_faq3_q', 'type' => 'text',     'default_value' => 'Are my funds secure with VaultEdge?', 'required' => 0 ],
            [ 'key' => 'field_ve_faq3_a', 'label' => 'FAQ 3 — Answer',   'name' => 've_faq3_a', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Yes. Your assets are held with SIPC-protected custodians and we use bank-grade 256-bit encryption across all platforms.', 'required' => 0 ],
            // FAQ Item 4
            [ 'key' => 'field_ve_faq4_q', 'label' => 'FAQ 4 — Question', 'name' => 've_faq4_q', 'type' => 'text',     'default_value' => 'How are your fees structured?', 'required' => 0 ],
            [ 'key' => 'field_ve_faq4_a', 'label' => 'FAQ 4 — Answer',   'name' => 've_faq4_a', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'We operate on a transparent fee-only model. We never earn commissions — our advice is always purely in your best interest.', 'required' => 0 ],
        ],
        'location'   => [ [ [ 'param' => 'page_template', 'operator' => '==', 'value' => 'page-services.php' ] ] ],
        'menu_order' => 0,
        'position'   => 'normal',
        'style'      => 'default',
    ] );

    // ── Contact Page Content ─────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_ve_contact_page',
        'title'  => 'Contact Page Content',
        'fields' => [

            // ── TAB: Hero ─────────────────────────────────────────
            [ 'key' => 'field_ve_con_tab_hero', 'label' => 'Hero Section', 'type' => 'tab' ],
            [
                'key'           => 'field_ve_con_hero_tag',
                'label'         => 'Hero Tag',
                'name'          => 've_con_hero_tag',
                'type'          => 'text',
                'default_value' => 'Get In Touch',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_con_hero_title',
                'label'         => 'Hero Title (plain part)',
                'name'          => 've_con_hero_title',
                'type'          => 'text',
                'instructions'  => 'Text before the highlighted phrase.',
                'default_value' => "We'd Love to",
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_con_hero_title_hl',
                'label'         => 'Hero Title (highlighted part)',
                'name'          => 've_con_hero_title_hl',
                'type'          => 'text',
                'instructions'  => 'Displayed in gold color.',
                'default_value' => 'Hear From You',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_con_hero_bg',
                'label'         => 'Hero Background Image',
                'name'          => 've_con_hero_bg',
                'type'          => 'image',
                'return_format' => 'url',
                'preview_size'  => 've-hero',
                'required'      => 0,
            ],

            // ── TAB: Form Section ─────────────────────────────────
            [ 'key' => 'field_ve_con_tab_form', 'label' => 'Form Section', 'type' => 'tab' ],
            [
                'key'           => 'field_ve_con_form_tag',
                'label'         => 'Section Tag',
                'name'          => 've_con_form_tag',
                'type'          => 'text',
                'default_value' => 'Send a Message',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_con_form_heading',
                'label'         => 'Form Heading (plain part)',
                'name'          => 've_con_form_heading',
                'type'          => 'text',
                'default_value' => 'Book a',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_con_form_heading_hl',
                'label'         => 'Form Heading (highlighted part)',
                'name'          => 've_con_form_heading_hl',
                'type'          => 'text',
                'default_value' => 'Free Consultation',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ve_con_form_subtext',
                'label'         => 'Form Subtext',
                'name'          => 've_con_form_subtext',
                'type'          => 'textarea',
                'rows'          => 2,
                'default_value' => 'Fill in the form and one of our advisors will contact you within one business day.',
                'required'      => 0,
            ],

            // ── TAB: Sidebar ──────────────────────────────────────
            [ 'key' => 'field_ve_con_tab_aside', 'label' => 'Sidebar', 'type' => 'tab' ],
            [
                'key'           => 'field_ve_con_aside_title',
                'label'         => '"Why Clients Choose Us" Title',
                'name'          => 've_con_aside_title',
                'type'          => 'text',
                'default_value' => 'Why Clients Choose Us',
                'required'      => 0,
            ],
            [ 'key' => 'field_ve_con_aside_pt1', 'label' => 'Bullet Point 1', 'name' => 've_con_aside_pt1', 'type' => 'text', 'default_value' => 'Free initial consultation', 'required' => 0 ],
            [ 'key' => 'field_ve_con_aside_pt2', 'label' => 'Bullet Point 2', 'name' => 've_con_aside_pt2', 'type' => 'text', 'default_value' => 'Response within 24 hours', 'required' => 0 ],
            [ 'key' => 'field_ve_con_aside_pt3', 'label' => 'Bullet Point 3', 'name' => 've_con_aside_pt3', 'type' => 'text', 'default_value' => 'No sales pressure — ever', 'required' => 0 ],
            [ 'key' => 'field_ve_con_aside_pt4', 'label' => 'Bullet Point 4', 'name' => 've_con_aside_pt4', 'type' => 'text', 'default_value' => 'Certified financial planners', 'required' => 0 ],
            [ 'key' => 'field_ve_con_aside_pt5', 'label' => 'Bullet Point 5', 'name' => 've_con_aside_pt5', 'type' => 'text', 'default_value' => 'Fiduciary standard of care', 'required' => 0 ],
        ],
        'location'   => [ [ [ 'param' => 'page_template', 'operator' => '==', 'value' => 'page-contact.php' ] ] ],
        'menu_order' => 0,
        'position'   => 'normal',
        'style'      => 'default',
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
