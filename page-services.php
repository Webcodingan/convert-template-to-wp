<?php
/**
 * Template Name: Our Services
 */

get_header();

// ── Field helpers with fallback defaults ──────────────────────────────────────
$hero_tag       = ve_get_field( 've_svc_hero_tag',       null, 'What We Offer' );
$hero_title     = ve_get_field( 've_svc_hero_title',     null, 'Comprehensive' );
$hero_title_hl  = ve_get_field( 've_svc_hero_title_hl',  null, 'Financial Services' );
$hero_bg_raw    = ve_get_field( 've_svc_hero_bg',        null, '' );
$hero_bg_url    = $hero_bg_raw ?: get_template_directory_uri() . '/assets/img/bg-img/20.jpg';

$grid_tag       = ve_get_field( 've_svc_grid_tag',       null, 'Our Expertise' );
$grid_heading   = ve_get_field( 've_svc_grid_heading',   null, 'Solutions for Every' );
$grid_heading_hl = ve_get_field( 've_svc_grid_heading_hl', null, 'Financial Goal' );
$grid_subtext   = ve_get_field( 've_svc_grid_subtext',   null, "Whether you're just starting out or managing significant wealth, we have a solution designed for you." );

$services = [
    [
        'icon'  => ve_get_field( 've_svc1_icon',  null, 'icon-profits' ),
        'title' => ve_get_field( 've_svc1_title', null, 'Investment Planning' ),
        'desc'  => ve_get_field( 've_svc1_desc',  null, 'We craft diversified, goal-aligned portfolios based on your risk profile, timeline, and financial ambitions.' ),
        'link'  => ve_get_field( 've_svc1_link',  null, '' ),
    ],
    [
        'icon'  => ve_get_field( 've_svc2_icon',  null, 'icon-money-1' ),
        'title' => ve_get_field( 've_svc2_title', null, 'Wealth Management' ),
        'desc'  => ve_get_field( 've_svc2_desc',  null, 'Holistic strategies to grow, protect, and transfer your wealth across generations — personalised to your life.' ),
        'link'  => ve_get_field( 've_svc2_link',  null, '' ),
    ],
    [
        'icon'  => ve_get_field( 've_svc3_icon',  null, 'icon-coin' ),
        'title' => ve_get_field( 've_svc3_title', null, 'Retirement Planning' ),
        'desc'  => ve_get_field( 've_svc3_desc',  null, 'Build a retirement that funds your lifestyle with structured pension plans and tax-advantaged savings.' ),
        'link'  => ve_get_field( 've_svc3_link',  null, '' ),
    ],
    [
        'icon'  => ve_get_field( 've_svc4_icon',  null, 'icon-smartphone-1' ),
        'title' => ve_get_field( 've_svc4_title', null, 'Tax Advisory' ),
        'desc'  => ve_get_field( 've_svc4_desc',  null, 'Maximise your after-tax returns with proactive, year-round tax planning and compliance strategies.' ),
        'link'  => ve_get_field( 've_svc4_link',  null, '' ),
    ],
    [
        'icon'  => ve_get_field( 've_svc5_icon',  null, 'icon-diamond' ),
        'title' => ve_get_field( 've_svc5_title', null, 'Risk Management' ),
        'desc'  => ve_get_field( 've_svc5_desc',  null, 'Identify, assess, and mitigate financial and market risks before they affect your portfolio or business.' ),
        'link'  => ve_get_field( 've_svc5_link',  null, '' ),
    ],
    [
        'icon'  => ve_get_field( 've_svc6_icon',  null, 'icon-piggy-bank' ),
        'title' => ve_get_field( 've_svc6_title', null, 'Savings &amp; Goals' ),
        'desc'  => ve_get_field( 've_svc6_desc',  null, 'Automated savings tools and milestone-based plans that keep you on track for every financial goal.' ),
        'link'  => ve_get_field( 've_svc6_link',  null, '' ),
    ],
];

$proc_tag        = ve_get_field( 've_proc_tag',        null, 'How It Works' );
$proc_heading    = ve_get_field( 've_proc_heading',    null, 'Getting Started is' );
$proc_heading_hl = ve_get_field( 've_proc_heading_hl', null, 'Simple' );

$steps = [
    [
        'num'   => ve_get_field( 've_step1_num',   null, '01' ),
        'title' => ve_get_field( 've_step1_title', null, 'Book a Consultation' ),
        'desc'  => ve_get_field( 've_step1_desc',  null, 'Schedule a free 30-minute call with one of our certified advisors to discuss your goals.' ),
    ],
    [
        'num'   => ve_get_field( 've_step2_num',   null, '02' ),
        'title' => ve_get_field( 've_step2_title', null, 'Financial Assessment' ),
        'desc'  => ve_get_field( 've_step2_desc',  null, 'We analyse your financial position, risk tolerance, and long-term objectives.' ),
    ],
    [
        'num'   => ve_get_field( 've_step3_num',   null, '03' ),
        'title' => ve_get_field( 've_step3_title', null, 'Custom Strategy' ),
        'desc'  => ve_get_field( 've_step3_desc',  null, 'Receive a fully personalised financial plan tailored to your unique situation and goals.' ),
    ],
    [
        'num'   => ve_get_field( 've_step4_num',   null, '04' ),
        'title' => ve_get_field( 've_step4_title', null, 'Ongoing Support' ),
        'desc'  => ve_get_field( 've_step4_desc',  null, 'We monitor, adjust, and optimise your plan continuously as markets and life evolve.' ),
    ],
];

$faq_tag        = ve_get_field( 've_faq_tag',          null, 'Common Questions' );
$faq_heading    = ve_get_field( 've_faq_heading',       null, 'Frequently Asked' );
$faq_heading_hl = ve_get_field( 've_faq_heading_hl',    null, 'Questions' );
$faq_sidebar    = ve_get_field( 've_faq_sidebar_text',  null, "Can't find what you're looking for? Reach out to us and we'll respond within 24 hours." );
$faq_cta_text   = ve_get_field( 've_faq_cta_text',     null, 'Contact Our Team' );

$faqs = [
    [
        'q' => ve_get_field( 've_faq1_q', null, 'How do I get started with VaultEdge?' ),
        'a' => ve_get_field( 've_faq1_a', null, 'Simply book a free consultation via our contact page. One of our advisors will reach out within one business day.' ),
    ],
    [
        'q' => ve_get_field( 've_faq2_q', null, 'What is the minimum investment to get started?' ),
        'a' => ve_get_field( 've_faq2_a', null, 'There is no minimum investment. We work with clients at all wealth levels and tailor our services accordingly.' ),
    ],
    [
        'q' => ve_get_field( 've_faq3_q', null, 'Are my funds secure with VaultEdge?' ),
        'a' => ve_get_field( 've_faq3_a', null, 'Yes. Your assets are held with SIPC-protected custodians and we use bank-grade 256-bit encryption across all platforms.' ),
    ],
    [
        'q' => ve_get_field( 've_faq4_q', null, 'How are your fees structured?' ),
        'a' => ve_get_field( 've_faq4_a', null, 'We operate on a transparent fee-only model. We never earn commissions — our advice is always purely in your best interest.' ),
    ],
];
?>

<!-- PAGE HERO -->
<section class="ve-page-hero" style="background-image:url(<?php echo esc_url( $hero_bg_url ); ?>);">
    <div class="ve-page-hero-overlay"></div>
    <div class="container ve-page-hero-content">
        <span class="ve-section-tag"><?php echo esc_html( $hero_tag ); ?></span>
        <h1><?php echo esc_html( $hero_title ); ?> <span><?php echo esc_html( $hero_title_hl ); ?></span></h1>
        <nav aria-label="breadcrumb">
            <ol class="ve-breadcrumb">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                <li class="active">Services</li>
            </ol>
        </nav>
    </div>
</section>

<!-- SERVICES GRID -->
<section class="ve-section">
    <div class="container">
        <div class="ve-section-header text-center">
            <span class="ve-section-tag"><?php echo esc_html( $grid_tag ); ?></span>
            <h2><?php echo esc_html( $grid_heading ); ?> <span><?php echo esc_html( $grid_heading_hl ); ?></span></h2>
            <p><?php echo esc_html( $grid_subtext ); ?></p>
        </div>
        <div class="ve-services-grid">
            <?php
            $delays = [ 100, 200, 300, 400, 500, 600 ];
            foreach ( $services as $i => $svc ) :
                $link = $svc['link'] ?: '#';
            ?>
            <div class="ve-service-card wow fadeInUp" data-wow-delay="<?php echo absint( $delays[ $i ] ); ?>ms">
                <div class="ve-service-icon"><i class="<?php echo esc_attr( $svc['icon'] ); ?>"></i></div>
                <h4><?php echo esc_html( $svc['title'] ); ?></h4>
                <p><?php echo esc_html( $svc['desc'] ); ?></p>
                <a href="<?php echo esc_url( $link ); ?>" class="ve-card-link">Learn more <i class="fa fa-long-arrow-right"></i></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- PROCESS STEPS -->
<section class="ve-process-section">
    <div class="container">
        <div class="ve-section-header text-center">
            <span class="ve-section-tag"><?php echo esc_html( $proc_tag ); ?></span>
            <h2><?php echo esc_html( $proc_heading ); ?> <span><?php echo esc_html( $proc_heading_hl ); ?></span></h2>
        </div>
        <div class="ve-process-grid">
            <?php
            $step_delays = [ 100, 250, 400, 550 ];
            foreach ( $steps as $i => $step ) :
            ?>
            <div class="ve-process-step wow fadeInUp" data-wow-delay="<?php echo absint( $step_delays[ $i ] ); ?>ms">
                <div class="ve-process-num"><?php echo esc_html( $step['num'] ); ?></div>
                <h5><?php echo esc_html( $step['title'] ); ?></h5>
                <p><?php echo esc_html( $step['desc'] ); ?></p>
            </div>
            <?php if ( $i < count( $steps ) - 1 ) : ?>
            <div class="ve-process-arrow"><i class="fa fa-long-arrow-right"></i></div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="ve-section ve-faq-section">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-12 col-lg-5 wow fadeInLeft" data-wow-delay="100ms">
                <span class="ve-section-tag"><?php echo esc_html( $faq_tag ); ?></span>
                <h2><?php echo esc_html( $faq_heading ); ?> <span><?php echo esc_html( $faq_heading_hl ); ?></span></h2>
                <p><?php echo esc_html( $faq_sidebar ); ?></p>
                <a href="<?php echo esc_url( site_url( '/contact' ) ); ?>" class="ve-btn-primary mt-30">
                    <?php echo esc_html( $faq_cta_text ); ?>
                </a>
            </div>
            <div class="col-12 col-lg-7 wow fadeInRight" data-wow-delay="200ms">
                <div class="ve-faq-list">
                    <?php foreach ( $faqs as $idx => $faq ) : ?>
                    <div class="ve-faq-item<?php echo $idx === 0 ? ' open' : ''; ?>">
                        <div class="ve-faq-q">
                            <span><?php echo esc_html( $faq['q'] ); ?></span>
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="ve-faq-a"><?php echo esc_html( $faq['a'] ); ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/components/cta-banner' ); ?>
<?php get_footer(); ?>
