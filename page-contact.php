<?php
/**
 * Template Name: Contact Us
 */

get_header();

// ── ACF fields ────────────────────────────────────────────────────────────────
$hero_tag       = ve_get_field( 've_con_hero_tag',       null, 'Get In Touch' );
$hero_title     = ve_get_field( 've_con_hero_title',     null, "We'd Love to" );
$hero_title_hl  = ve_get_field( 've_con_hero_title_hl',  null, 'Hear From You' );
$hero_bg_raw    = ve_get_field( 've_con_hero_bg',        null, '' );
$hero_bg_url    = $hero_bg_raw ?: get_template_directory_uri() . '/assets/img/bg-img/22.jpg';

$form_tag       = ve_get_field( 've_con_form_tag',       null, 'Send a Message' );
$form_heading   = ve_get_field( 've_con_form_heading',   null, 'Book a' );
$form_heading_hl = ve_get_field( 've_con_form_heading_hl', null, 'Free Consultation' );
$form_subtext   = ve_get_field( 've_con_form_subtext',   null, 'Fill in the form and one of our advisors will contact you within one business day.' );

$aside_title    = ve_get_field( 've_con_aside_title', null, 'Why Clients Choose Us' );
$aside_points   = array_filter( [
    ve_get_field( 've_con_aside_pt1', null, 'Free initial consultation' ),
    ve_get_field( 've_con_aside_pt2', null, 'Response within 24 hours' ),
    ve_get_field( 've_con_aside_pt3', null, 'No sales pressure — ever' ),
    ve_get_field( 've_con_aside_pt4', null, 'Certified financial planners' ),
    ve_get_field( 've_con_aside_pt5', null, 'Fiduciary standard of care' ),
] );

// ── Customizer fields (global business info) ──────────────────────────────────
$address        = ve_option( 've_address' );
$phone          = ve_option( 've_phone' );
$email          = ve_option( 've_email' );
$hours_short    = ve_option( 've_hours' );
$hours_monfri   = ve_option( 've_hours_monfri' );
$hours_sat      = ve_option( 've_hours_sat' );
$hours_sun      = ve_option( 've_hours_sun' );
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
                <li class="active">Contact</li>
            </ol>
        </nav>
    </div>
</section>

<!-- CONTACT INFO CARDS -->
<section class="ve-contact-cards-section">
    <div class="container">
        <div class="ve-contact-cards-grid">
            <?php if ( $address ) : ?>
            <div class="ve-contact-info-card wow fadeInUp" data-wow-delay="100ms">
                <div class="ve-ci-icon"><i class="fa fa-map-marker"></i></div>
                <h5>Visit Our Office</h5>
                <p><?php echo esc_html( $address ); ?></p>
            </div>
            <?php endif; ?>
            <?php if ( $phone ) : ?>
            <div class="ve-contact-info-card wow fadeInUp" data-wow-delay="250ms">
                <div class="ve-ci-icon"><i class="fa fa-phone"></i></div>
                <h5>Call Us</h5>
                <p>
                    <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>" style="color:inherit;">
                        <?php echo esc_html( $phone ); ?>
                    </a>
                    <?php if ( $hours_short ) : ?>
                        <br><small><?php echo esc_html( $hours_short ); ?></small>
                    <?php endif; ?>
                </p>
            </div>
            <?php endif; ?>
            <?php if ( $email ) : ?>
            <div class="ve-contact-info-card wow fadeInUp" data-wow-delay="400ms">
                <div class="ve-ci-icon"><i class="fa fa-envelope"></i></div>
                <h5>Email Us</h5>
                <p>
                    <a href="mailto:<?php echo esc_attr( $email ); ?>" style="color:inherit;">
                        <?php echo esc_html( $email ); ?>
                    </a>
                    <br><small>We reply within 24 hours</small>
                </p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CONTACT FORM + ASIDE -->
<section class="ve-section ve-contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7 wow fadeInLeft" data-wow-delay="100ms">
                <div class="ve-contact-form-wrap">
                    <span class="ve-section-tag"><?php echo esc_html( $form_tag ); ?></span>
                    <h2><?php echo esc_html( $form_heading ); ?> <span><?php echo esc_html( $form_heading_hl ); ?></span></h2>
                    <p><?php echo esc_html( $form_subtext ); ?></p>
                    <form class="ve-contact-form" id="ve-contact-form" novalidate>
                        <?php wp_nonce_field( 've_contact_nonce', 've_nonce' ); ?>
                        <div id="ve-form-message" style="display:none; padding:14px 18px; border-radius:8px; margin-bottom:20px; font-weight:600;"></div>
                        <div class="ve-form-row">
                            <div class="ve-form-group">
                                <label for="ve_name">Full Name <span style="color:var(--ve-gold);">*</span></label>
                                <input type="text" id="ve_name" name="ve_name" placeholder="Your full name" required>
                            </div>
                            <div class="ve-form-group">
                                <label for="ve_email">Email Address <span style="color:var(--ve-gold);">*</span></label>
                                <input type="email" id="ve_email" name="ve_email" placeholder="Your email" required>
                            </div>
                        </div>
                        <div class="ve-form-row">
                            <div class="ve-form-group">
                                <label for="ve_phone">Phone Number</label>
                                <input type="tel" id="ve_phone" name="ve_phone" placeholder="Your phone">
                            </div>
                            <div class="ve-form-group">
                                <label for="ve_service">Service Interested In</label>
                                <select id="ve_service" name="ve_service">
                                    <option value="">Select a service</option>
                                    <option value="Investment Planning">Investment Planning</option>
                                    <option value="Wealth Management">Wealth Management</option>
                                    <option value="Retirement Planning">Retirement Planning</option>
                                    <option value="Tax Advisory">Tax Advisory</option>
                                    <option value="Risk Management">Risk Management</option>
                                </select>
                            </div>
                        </div>
                        <div class="ve-form-group">
                            <label for="ve_message">Your Message <span style="color:var(--ve-gold);">*</span></label>
                            <textarea id="ve_message" name="ve_message" rows="5"
                                placeholder="Tell us about your financial goals..."></textarea>
                        </div>
                        <button type="submit" class="ve-btn-primary">
                            Send Message <i class="fa fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-5 wow fadeInRight" data-wow-delay="200ms">
                <div class="ve-contact-aside">
                    <?php if ( $aside_points ) : ?>
                    <div class="ve-ca-box">
                        <h4><?php echo esc_html( $aside_title ); ?></h4>
                        <ul class="ve-ca-list">
                            <?php foreach ( $aside_points as $point ) : ?>
                                <li><i class="fa fa-check-circle"></i> <?php echo esc_html( $point ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class="ve-ca-hours">
                        <h5><i class="fa fa-clock-o"></i> Office Hours</h5>
                        <ul>
                            <li><span>Monday – Friday</span><strong><?php echo esc_html( $hours_monfri ); ?></strong></li>
                            <li><span>Saturday</span><strong><?php echo esc_html( $hours_sat ); ?></strong></li>
                            <li><span>Sunday</span><strong><?php echo esc_html( $hours_sun ); ?></strong></li>
                        </ul>
                    </div>
                    <div class="ve-ca-social">
                        <h5>Connect With Us</h5>
                        <div class="ve-social">
                            <?php if ( ve_option( 've_facebook' ) ) : ?>
                                <a href="<?php echo esc_url( ve_option( 've_facebook' ) ); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook"></i></a>
                            <?php endif; ?>
                            <?php if ( ve_option( 've_twitter' ) ) : ?>
                                <a href="<?php echo esc_url( ve_option( 've_twitter' ) ); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-twitter"></i></a>
                            <?php endif; ?>
                            <?php if ( ve_option( 've_linkedin' ) ) : ?>
                                <a href="<?php echo esc_url( ve_option( 've_linkedin' ) ); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-linkedin"></i></a>
                            <?php endif; ?>
                            <?php if ( ve_option( 've_instagram' ) ) : ?>
                                <a href="<?php echo esc_url( ve_option( 've_instagram' ) ); ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
