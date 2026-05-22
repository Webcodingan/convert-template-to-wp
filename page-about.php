<?php
/**
 * Template Name: About Us
 */

get_header();

// ── Field helpers with fallback defaults ──────────────────────────────────────
$hero_tag       = ve_get_field( 've_about_hero_tag',   null, 'Our Story' );
$hero_title     = ve_get_field( 've_about_hero_title', null, 'Building Trust Since' );
$hero_year      = ve_get_field( 've_about_hero_year',  null, '2012' );
$hero_bg        = ve_get_field( 've_about_hero_bg',    null, '' );
$hero_bg_url    = $hero_bg ?: get_template_directory_uri() . '/assets/img/bg-img/13.jpg';

$about_tag      = ve_get_field( 've_about_tag',        null, 'Who We Are' );
$about_heading  = ve_get_field( 've_about_heading',    null, 'A Firm Built on' );
$about_hl       = ve_get_field( 've_about_heading_hl', null, 'Integrity' );
$about_lead     = ve_get_field( 've_about_lead',       null, 'We are a team of certified financial advisors and analysts dedicated to helping individuals and businesses achieve financial clarity and long-term prosperity.' );
$about_body     = ve_get_field( 've_about_body',       null, 'Founded in San Francisco in 2012, VaultEdge started with a single mission: make professional wealth management accessible to everyone. Today, we manage over $4.2 billion in assets across 30+ countries.' );
$about_feat_1   = ve_get_field( 've_about_feat_1',     null, 'Certified Financial Planners (CFP)' );
$about_feat_2   = ve_get_field( 've_about_feat_2',     null, 'SEC Registered Investment Advisor' );
$about_feat_3   = ve_get_field( 've_about_feat_3',     null, 'Fiduciary — we always act in your interest' );
$about_feat_4   = ve_get_field( 've_about_feat_4',     null, 'No conflict-of-interest products' );
$about_cta_text = ve_get_field( 've_about_cta_text',   null, 'View Our Services' );
$about_cta_url  = ve_get_field( 've_about_cta_url',    null, site_url( '/services' ) );
$ribbon_num     = ve_get_field( 've_about_ribbon_num', null, '12+' );
$ribbon_lbl     = ve_get_field( 've_about_ribbon_lbl', null, 'Years of Trust' );
$img_main_raw   = ve_get_field( 've_about_img_main',   null, '' );
$img_accent_raw = ve_get_field( 've_about_img_accent', null, '' );
$img_main       = $img_main_raw   ?: get_template_directory_uri() . '/assets/img/bg-img/14.jpg';
$img_accent     = $img_accent_raw ?: get_template_directory_uri() . '/assets/img/bg-img/5.jpg';

$mvv_tag        = ve_get_field( 've_mvv_tag',           null, 'Our Foundation' );
$mvv_heading    = ve_get_field( 've_mvv_heading',       null, 'Mission, Vision &' );
$mvv_hl         = ve_get_field( 've_mvv_heading_hl',    null, 'Values' );
$mission_title  = ve_get_field( 've_mvv_mission_title', null, 'Our Mission' );
$mission_text   = ve_get_field( 've_mvv_mission_text',  null, 'To democratise access to world-class financial planning, empowering every client to make smarter money decisions with confidence.' );
$vision_title   = ve_get_field( 've_mvv_vision_title',  null, 'Our Vision' );
$vision_text    = ve_get_field( 've_mvv_vision_text',   null, 'To be the most trusted financial partner for the next generation of wealth builders — globally recognised for integrity and innovation.' );
$values_title   = ve_get_field( 've_mvv_values_title',  null, 'Our Values' );
$values_text    = ve_get_field( 've_mvv_values_text',   null, 'Transparency, client-first thinking, continuous innovation, and an unwavering commitment to ethical financial practice.' );
?>

<!-- PAGE HERO -->
<section class="ve-page-hero" style="background-image:url(<?php echo esc_url( $hero_bg_url ); ?>);">
    <div class="ve-page-hero-overlay"></div>
    <div class="container ve-page-hero-content">
        <span class="ve-section-tag"><?php echo esc_html( $hero_tag ); ?></span>
        <h1><?php echo esc_html( $hero_title ); ?> <span><?php echo esc_html( $hero_year ); ?></span></h1>
        <nav aria-label="breadcrumb">
            <ol class="ve-breadcrumb">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                <li class="active">About Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- WHO WE ARE -->
<section class="ve-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                <div class="ve-about-img-stack">
                    <div class="ve-about-img-1 bg-img"
                        style="background-image:url(<?php echo esc_url( $img_main ); ?>);"></div>
                    <div class="ve-about-img-2 bg-img"
                        style="background-image:url(<?php echo esc_url( $img_accent ); ?>);"></div>
                    <div class="ve-about-ribbon">
                        <strong><?php echo esc_html( $ribbon_num ); ?></strong>
                        <span><?php echo esc_html( $ribbon_lbl ); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 wow fadeInRight" data-wow-delay="200ms">
                <div class="ve-about-text">
                    <span class="ve-section-tag"><?php echo esc_html( $about_tag ); ?></span>
                    <h2><?php echo esc_html( $about_heading ); ?> <span><?php echo esc_html( $about_hl ); ?></span></h2>
                    <p class="ve-lead"><?php echo esc_html( $about_lead ); ?></p>
                    <p><?php echo esc_html( $about_body ); ?></p>
                    <div class="ve-about-features">
                        <?php foreach ( [ $about_feat_1, $about_feat_2, $about_feat_3, $about_feat_4 ] as $feat ) : ?>
                            <?php if ( $feat ) : ?>
                                <div class="ve-af-item">
                                    <i class="fa fa-check"></i>
                                    <span><?php echo esc_html( $feat ); ?></span>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <a href="<?php echo esc_url( $about_cta_url ); ?>" class="ve-btn-primary mt-30">
                        <?php echo esc_html( $about_cta_text ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MISSION / VISION / VALUES -->
<section class="ve-mvv-section">
    <div class="container">
        <div class="ve-section-header text-center">
            <span class="ve-section-tag"><?php echo esc_html( $mvv_tag ); ?></span>
            <h2><?php echo esc_html( $mvv_heading ); ?> <span><?php echo esc_html( $mvv_hl ); ?></span></h2>
        </div>
        <div class="ve-mvv-grid">
            <div class="ve-mvv-card wow fadeInUp" data-wow-delay="100ms">
                <div class="ve-mvv-icon"><i class="fa fa-bullseye"></i></div>
                <h4><?php echo esc_html( $mission_title ); ?></h4>
                <p><?php echo esc_html( $mission_text ); ?></p>
            </div>
            <div class="ve-mvv-card wow fadeInUp" data-wow-delay="250ms">
                <div class="ve-mvv-icon"><i class="fa fa-eye"></i></div>
                <h4><?php echo esc_html( $vision_title ); ?></h4>
                <p><?php echo esc_html( $vision_text ); ?></p>
            </div>
            <div class="ve-mvv-card wow fadeInUp" data-wow-delay="400ms">
                <div class="ve-mvv-icon"><i class="fa fa-heart"></i></div>
                <h4><?php echo esc_html( $values_title ); ?></h4>
                <p><?php echo esc_html( $values_text ); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- TEAM -->
<?php
$team_query    = new WP_Query( [
    'post_type'      => 've_team',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
] );
$fallback_imgs = [ '15.jpg', '16.jpg', '17.jpg', '18.jpg' ];
$fallback_team = [
    [ 'name' => 'Jordan Hayes',  'role' => 'Chief Executive Officer' ],
    [ 'name' => 'Taylor Brooks', 'role' => 'Chief Investment Officer' ],
    [ 'name' => 'Morgan Lane',   'role' => 'Head of Wealth Planning' ],
    [ 'name' => 'Casey Rivera',  'role' => 'Head of Risk &amp; Compliance' ],
];
?>
<section class="ve-section ve-team-section">
    <div class="container">
        <div class="ve-section-header text-center">
            <span class="ve-section-tag">Meet the Experts</span>
            <h2>Our Leadership <span>Team</span></h2>
            <p>Seasoned professionals with decades of combined experience across global financial markets.</p>
        </div>
        <div class="row">
            <?php if ( $team_query->have_posts() ) : ?>
                <?php
                $delay = 100;
                while ( $team_query->have_posts() ) :
                    $team_query->the_post();
                    $role     = ve_get_field( 've_team_role',     null, '' );
                    $linkedin = ve_get_field( 've_team_linkedin', null, '#' );
                    $twitter  = ve_get_field( 've_team_twitter',  null, '#' );
                    $photo    = get_the_post_thumbnail_url( null, 've-square' );
                    ?>
                    <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay="<?php echo absint( $delay ); ?>ms">
                        <div class="ve-team-card">
                            <?php if ( $photo ) : ?>
                                <div class="ve-team-img bg-img"
                                    style="background-image:url(<?php echo esc_url( $photo ); ?>);"></div>
                            <?php endif; ?>
                            <div class="ve-team-info">
                                <h5><?php the_title(); ?></h5>
                                <span><?php echo esc_html( $role ); ?></span>
                                <div class="ve-team-social">
                                    <?php if ( $linkedin && $linkedin !== '#' ) : ?>
                                        <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-linkedin"></i></a>
                                    <?php endif; ?>
                                    <?php if ( $twitter && $twitter !== '#' ) : ?>
                                        <a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-twitter"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $delay += 100;
                endwhile;
                wp_reset_postdata();
                ?>
            <?php else : ?>
                <?php foreach ( $fallback_team as $idx => $member ) : ?>
                    <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay="<?php echo absint( ( $idx + 1 ) * 100 ); ?>ms">
                        <div class="ve-team-card">
                            <div class="ve-team-img bg-img"
                                style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bg-img/<?php echo esc_attr( $fallback_imgs[ $idx ] ); ?>);"></div>
                            <div class="ve-team-info">
                                <h5><?php echo esc_html( $member['name'] ); ?></h5>
                                <span><?php echo wp_kses_post( $member['role'] ); ?></span>
                                <div class="ve-team-social">
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/sections/counters' ); ?>
<?php get_template_part( 'template-parts/components/newsletter' ); ?>
<?php get_footer(); ?>
