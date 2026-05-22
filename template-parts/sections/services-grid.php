<?php
$services_query = new WP_Query( [
    'post_type'      => 've_service',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
] );
$use_cpt = $services_query->have_posts();
?>
<section class="ve-section ve-services-section">
    <div class="container">
        <div class="ve-section-header text-center">
            <span class="ve-section-tag">What We Offer</span>
            <h2>Comprehensive Financial <span>Solutions</span></h2>
            <p>From wealth building to retirement security — we cover every stage of your financial journey.</p>
        </div>
        <div class="ve-services-grid">

            <?php if ( $use_cpt ) : ?>
                <?php
                $delay = 100;
                while ( $services_query->have_posts() ) :
                    $services_query->the_post();
                    $icon = ve_get_field( 've_service_icon', null, 'icon-profits' );
                    $link = ve_get_field( 've_service_link', null, get_permalink() );
                    ?>
                    <div class="ve-service-card wow fadeInUp" data-wow-delay="<?php echo absint( $delay ); ?>ms">
                        <div class="ve-service-icon"><i class="<?php echo esc_attr( $icon ); ?>"></i></div>
                        <h4><?php the_title(); ?></h4>
                        <p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                        <a href="<?php echo esc_url( $link ); ?>" class="ve-card-link">Learn more <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    <?php
                    $delay += 100;
                endwhile;
                wp_reset_postdata();
                ?>

            <?php else : ?>
                <!-- Fallback — shown until Services CPT has posts -->
                <div class="ve-service-card wow fadeInUp" data-wow-delay="100ms">
                    <div class="ve-service-icon"><i class="icon-profits"></i></div>
                    <h4>Investment Planning</h4>
                    <p>Tailored portfolios built around your goals, risk appetite, and investment horizon.</p>
                    <a href="<?php echo esc_url( site_url( '/services' ) ); ?>" class="ve-card-link">Learn more <i class="fa fa-long-arrow-right"></i></a>
                </div>
                <div class="ve-service-card wow fadeInUp" data-wow-delay="200ms">
                    <div class="ve-service-icon"><i class="icon-money-1"></i></div>
                    <h4>Wealth Management</h4>
                    <p>Holistic strategies to preserve, grow, and transfer your wealth across generations.</p>
                    <a href="<?php echo esc_url( site_url( '/services' ) ); ?>" class="ve-card-link">Learn more <i class="fa fa-long-arrow-right"></i></a>
                </div>
                <div class="ve-service-card wow fadeInUp" data-wow-delay="300ms">
                    <div class="ve-service-icon"><i class="icon-coin"></i></div>
                    <h4>Retirement Plans</h4>
                    <p>Secure your future with structured pension plans, annuities, and long-term savings.</p>
                    <a href="<?php echo esc_url( site_url( '/services' ) ); ?>" class="ve-card-link">Learn more <i class="fa fa-long-arrow-right"></i></a>
                </div>
                <div class="ve-service-card wow fadeInUp" data-wow-delay="400ms">
                    <div class="ve-service-icon"><i class="icon-smartphone-1"></i></div>
                    <h4>Tax Advisory</h4>
                    <p>Smart tax-efficient strategies to maximise your returns and stay fully compliant.</p>
                    <a href="<?php echo esc_url( site_url( '/services' ) ); ?>" class="ve-card-link">Learn more <i class="fa fa-long-arrow-right"></i></a>
                </div>
                <div class="ve-service-card wow fadeInUp" data-wow-delay="500ms">
                    <div class="ve-service-icon"><i class="icon-diamond"></i></div>
                    <h4>Risk Management</h4>
                    <p>Identify, assess, and mitigate financial risks with expert guidance and analysis.</p>
                    <a href="<?php echo esc_url( site_url( '/services' ) ); ?>" class="ve-card-link">Learn more <i class="fa fa-long-arrow-right"></i></a>
                </div>
                <div class="ve-service-card wow fadeInUp" data-wow-delay="600ms">
                    <div class="ve-service-icon"><i class="icon-piggy-bank"></i></div>
                    <h4>Savings Goals</h4>
                    <p>Set, track, and achieve your savings milestones with automated, goal-based tools.</p>
                    <a href="<?php echo esc_url( site_url( '/services' ) ); ?>" class="ve-card-link">Learn more <i class="fa fa-long-arrow-right"></i></a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
