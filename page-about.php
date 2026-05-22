<?php get_header(); ?>
<section class="ve-page-hero" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-img/13.jpg);">
    <div class="ve-page-hero-overlay"></div>
    <div class="container ve-page-hero-content">
        <span class="ve-section-tag">Our Story</span>
        <h1>Building Trust Since <span>2012</span></h1>
        <nav aria-label="breadcrumb">
            <ol class="ve-breadcrumb">
                <li><a href="<?php echo site_url('/'); ?>">Home</a></li>
                <li class="active">About Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- ABOUT SPLIT -->
<section class="ve-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                <div class="ve-about-img-stack">
                    <div class="ve-about-img-1 bg-img"
                        style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-img/14.jpg);"></div>

                    <div class="ve-about-img-2 bg-img"
                        style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-img/5.jpg);"></div>
                    <div class="ve-about-ribbon"><strong>12+</strong><span>Years of Trust</span></div>
                </div>
            </div>
            <div class="col-12 col-lg-6 wow fadeInRight" data-wow-delay="200ms">
                <div class="ve-about-text">
                    <span class="ve-section-tag">Who We Are</span>
                    <h2>A Firm Built on <span>Integrity</span> &amp; Results</h2>
                    <p class="ve-lead">We are a team of certified financial advisors and analysts dedicated to
                        helping individuals and businesses achieve financial clarity and long-term prosperity.</p>
                    <p>Founded in San Francisco in 2012, VaultEdge started with a single mission: make professional
                        wealth management accessible to everyone. Today, we manage over $4.2 billion in assets
                        across 30+ countries.</p>
                    <div class="ve-about-features">
                        <div class="ve-af-item"><i class="fa fa-check"></i><span>Certified Financial Planners
                                (CFP)</span></div>
                        <div class="ve-af-item"><i class="fa fa-check"></i><span>SEC Registered Investment
                                Advisor</span></div>
                        <div class="ve-af-item"><i class="fa fa-check"></i><span>Fiduciary — we always act in your
                                interest</span></div>
                        <div class="ve-af-item"><i class="fa fa-check"></i><span>No conflict-of-interest
                                products</span></div>
                    </div>
                    <a href="<?php echo site_url('/services'); ?>" class="ve-btn-primary mt-30">View Our Services</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MISSION / VISION / VALUES -->
<section class="ve-mvv-section">
    <div class="container">
        <div class="ve-section-header text-center">
            <span class="ve-section-tag">Our Foundation</span>
            <h2>Mission, Vision &amp; <span>Values</span></h2>
        </div>
        <div class="ve-mvv-grid">
            <div class="ve-mvv-card wow fadeInUp" data-wow-delay="100ms">
                <div class="ve-mvv-icon"><i class="fa fa-bullseye"></i></div>
                <h4>Our Mission</h4>
                <p>To democratise access to world-class financial planning, empowering every client to make smarter
                    money decisions with confidence.</p>
            </div>
            <div class="ve-mvv-card wow fadeInUp" data-wow-delay="250ms">
                <div class="ve-mvv-icon"><i class="fa fa-eye"></i></div>
                <h4>Our Vision</h4>
                <p>To be the most trusted financial partner for the next generation of wealth builders — globally
                    recognised for integrity and innovation.</p>
            </div>
            <div class="ve-mvv-card wow fadeInUp" data-wow-delay="400ms">
                <div class="ve-mvv-icon"><i class="fa fa-heart"></i></div>
                <h4>Our Values</h4>
                <p>Transparency, client-first thinking, continuous innovation, and an unwavering commitment to
                    ethical financial practice.</p>
            </div>
        </div>
    </div>
</section>

<!-- TEAM -->
<?php
$team_query = new WP_Query( [
    'post_type'      => 've_team',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
] );
// Fallback photos used when CPT has no posts yet
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
                <!-- Fallback — shown until Team CPT has members -->
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