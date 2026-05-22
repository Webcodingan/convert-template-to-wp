<?php get_header(); ?>

<section class="ve-page-hero" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-img/22.jpg);">
    <div class="ve-page-hero-overlay"></div>
    <div class="container ve-page-hero-content">
        <span class="ve-section-tag">Get In Touch</span>
        <h1>We'd Love to <span>Hear From You</span></h1>
        <nav aria-label="breadcrumb">
            <ol class="ve-breadcrumb">
                <li><a href="<?php echo site_url('/'); ?>">Home</a></li>
                <li class="active">Contact</li>
            </ol>
        </nav>
    </div>
</section>

<section class="ve-contact-cards-section">
    <div class="container">
        <div class="ve-contact-cards-grid">
            <div class="ve-contact-info-card wow fadeInUp" data-wow-delay="100ms">
                <div class="ve-ci-icon"><i class="fa fa-map-marker"></i></div>
                <h5>Visit Our Office</h5>
                <p>42 Harbor View, San Francisco, CA 94105</p>
            </div>
            <div class="ve-contact-info-card wow fadeInUp" data-wow-delay="250ms">
                <div class="ve-ci-icon"><i class="fa fa-phone"></i></div>
                <h5>Call Us</h5>
                <p>+1 800 555 0199<br><small>Mon–Fri, 9am – 6pm PST</small></p>
            </div>
            <div class="ve-contact-info-card wow fadeInUp" data-wow-delay="400ms">
                <div class="ve-ci-icon"><i class="fa fa-envelope"></i></div>
                <h5>Email Us</h5>
                <p>hello@vaultedge.com<br><small>We reply within 24 hours</small></p>
            </div>
        </div>
    </div>
</section>

<section class="ve-section ve-contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7 wow fadeInLeft" data-wow-delay="100ms">
                <div class="ve-contact-form-wrap">
                    <span class="ve-section-tag">Send a Message</span>
                    <h2>Book a <span>Free Consultation</span></h2>
                    <p>Fill in the form and one of our advisors will contact you within one business day.</p>
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
                    <div class="ve-ca-box">
                        <h4>Why Clients Choose Us</h4>
                        <ul class="ve-ca-list">
                            <li><i class="fa fa-check-circle"></i> Free initial consultation</li>
                            <li><i class="fa fa-check-circle"></i> Response within 24 hours</li>
                            <li><i class="fa fa-check-circle"></i> No sales pressure — ever</li>
                            <li><i class="fa fa-check-circle"></i> Certified financial planners</li>
                            <li><i class="fa fa-check-circle"></i> Fiduciary standard of care</li>
                        </ul>
                    </div>
                    <div class="ve-ca-hours">
                        <h5><i class="fa fa-clock-o"></i> Office Hours</h5>
                        <ul>
                            <li><span>Monday – Friday</span><strong>9:00 AM – 6:00 PM</strong></li>
                            <li><span>Saturday</span><strong>10:00 AM – 2:00 PM</strong></li>
                            <li><span>Sunday</span><strong>Closed</strong></li>
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