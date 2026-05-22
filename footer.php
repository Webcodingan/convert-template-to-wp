<footer class="ve-footer">
    <div class="container">
        <div class="row">

            <!-- Col 1: Brand -->
            <div class="col-12 col-sm-6 col-lg-4 mb-50">
                <div class="ve-footer-brand">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ve-footer-logo">
                        <?php vaultedge_logo(); ?>
                    </a>
                    <p><?php echo esc_html( ve_option( 've_footer_desc' ) ); ?></p>
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

            <!-- Col 2: Quick Links (WP Menu) -->
            <div class="col-12 col-sm-6 col-lg-2 mb-50">
                <h5 class="ve-footer-title">Quick Links</h5>
                <?php
                wp_nav_menu( [
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 've-footer-links',
                    'depth'          => 1,
                    'fallback_cb'    => function () {
                        // Fallback list when no footer menu is assigned
                        echo '<ul class="ve-footer-links">';
                        $links = [
                            home_url( '/' )      => 'Home',
                            site_url( '/about' ) => 'About Us',
                            site_url( '/services' ) => 'Services',
                            site_url( '/post' )  => 'Insights',
                            site_url( '/contact' ) => 'Contact',
                        ];
                        foreach ( $links as $url => $label ) {
                            echo '<li><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></li>';
                        }
                        echo '</ul>';
                    },
                ] );
                ?>
            </div>

            <!-- Col 3: Our Services -->
            <div class="col-12 col-sm-6 col-lg-3 mb-50">
                <h5 class="ve-footer-title">Our Services</h5>
                <ul class="ve-footer-links">
                    <?php
                    $footer_services = new WP_Query( [
                        'post_type'      => 've_service',
                        'posts_per_page' => 5,
                        'post_status'    => 'publish',
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    ] );
                    if ( $footer_services->have_posts() ) :
                        while ( $footer_services->have_posts() ) :
                            $footer_services->the_post();
                            $link = ve_get_field( 've_service_link', null, get_permalink() );
                            echo '<li><a href="' . esc_url( $link ) . '">' . get_the_title() . '</a></li>';
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Fallback
                        $services = [ 'Investment Planning', 'Wealth Management', 'Retirement Plans', 'Tax Advisory', 'Risk Management' ];
                        foreach ( $services as $service ) {
                            echo '<li><a href="' . esc_url( site_url( '/services' ) ) . '">' . esc_html( $service ) . '</a></li>';
                        }
                    endif;
                    ?>
                </ul>
            </div>

            <!-- Col 4: Contact Info (Customizer) -->
            <div class="col-12 col-sm-6 col-lg-3 mb-50">
                <h5 class="ve-footer-title">Get In Touch</h5>
                <ul class="ve-footer-contact">
                    <?php if ( ve_option( 've_address' ) ) : ?>
                        <li><i class="fa fa-map-marker"></i> <?php echo esc_html( ve_option( 've_address' ) ); ?></li>
                    <?php endif; ?>
                    <?php if ( ve_option( 've_phone' ) ) : ?>
                        <li><i class="fa fa-phone"></i>
                            <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', ve_option( 've_phone' ) ) ); ?>">
                                <?php echo esc_html( ve_option( 've_phone' ) ); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ( ve_option( 've_email' ) ) : ?>
                        <li><i class="fa fa-envelope"></i>
                            <a href="mailto:<?php echo esc_attr( ve_option( 've_email' ) ); ?>">
                                <?php echo esc_html( ve_option( 've_email' ) ); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ( ve_option( 've_hours' ) ) : ?>
                        <li><i class="fa fa-clock-o"></i> <?php echo esc_html( ve_option( 've_hours' ) ); ?></li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </div>

    <!-- Footer Bottom Bar -->
    <div class="ve-footer-bottom">
        <div class="container">
            <div class="ve-footer-bottom-inner">
                <p>Copyright &copy; <?php echo date( 'Y' ); ?> <?php echo esc_html( ve_option( 've_copyright_text' ) ); ?></p>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
