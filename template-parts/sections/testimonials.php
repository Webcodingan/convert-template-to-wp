<?php
$testi_query = new WP_Query( [
    'post_type'      => 've_testimonial',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
] );
$use_cpt = $testi_query->have_posts();
?>
<section class="ve-section ve-testimonials-section">
    <div class="container">
        <div class="ve-section-header text-center">
            <span class="ve-section-tag">Client Stories</span>
            <h2>What Our Clients <span>Say</span></h2>
        </div>
        <div class="ve-testi-grid">

            <?php if ( $use_cpt ) : ?>
                <?php
                $delays = [ 100, 250, 400 ];
                $i = 0;
                while ( $testi_query->have_posts() ) :
                    $testi_query->the_post();
                    $name   = ve_get_field( 've_client_name', null, get_the_title() );
                    $role   = ve_get_field( 've_client_role', null, '' );
                    $avatar = ve_get_field( 've_client_avatar', null, get_the_post_thumbnail_url( null, 've-square' ) );
                    $rating = (int) ve_get_field( 've_rating', null, 5 );
                    $stars  = str_repeat( '&#9733;', $rating ) . str_repeat( '&#9734;', 5 - $rating );
                    ?>
                    <div class="ve-testi-card wow fadeInUp" data-wow-delay="<?php echo absint( $delays[ $i ] ?? 100 ); ?>ms">
                        <div class="ve-testi-stars"><?php echo $stars; ?></div>
                        <p><?php echo wp_kses_post( get_the_content() ); ?></p>
                        <div class="ve-testi-author">
                            <?php if ( $avatar ) : ?>
                                <div class="ve-testi-avatar bg-img"
                                    style="background-image:url(<?php echo esc_url( $avatar ); ?>);"></div>
                            <?php endif; ?>
                            <div>
                                <strong><?php echo esc_html( $name ); ?></strong>
                                <span><?php echo esc_html( $role ); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                endwhile;
                wp_reset_postdata();
                ?>

            <?php else : ?>
                <!-- Fallback — shown until Testimonials CPT has posts -->
                <div class="ve-testi-card wow fadeInUp" data-wow-delay="100ms">
                    <div class="ve-testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <p>"VaultEdge transformed how I manage my finances. My portfolio has grown by 22% in just 18 months. Incredible service!"</p>
                    <div class="ve-testi-author">
                        <div class="ve-testi-avatar bg-img"
                            style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bg-img/32.jpg);"></div>
                        <div><strong>Alex Morgan</strong><span>Entrepreneur</span></div>
                    </div>
                </div>
                <div class="ve-testi-card wow fadeInUp" data-wow-delay="250ms">
                    <div class="ve-testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <p>"The retirement planning team at VaultEdge gave me total peace of mind. Professional, responsive, and results-driven."</p>
                    <div class="ve-testi-author">
                        <div class="ve-testi-avatar bg-img"
                            style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bg-img/33.jpg);"></div>
                        <div><strong>Sarah Patel</strong><span>Marketing Director</span></div>
                    </div>
                </div>
                <div class="ve-testi-card wow fadeInUp" data-wow-delay="400ms">
                    <div class="ve-testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <p>"Switched from our old firm and couldn't be happier. Their tax advisory alone saved us thousands in the first year."</p>
                    <div class="ve-testi-author">
                        <div class="ve-testi-avatar bg-img"
                            style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bg-img/14.jpg);"></div>
                        <div><strong>James Liu</strong><span>Business Owner</span></div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
