<?php
$insights = new WP_Query( [
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
] );

// Fallback images if post has no thumbnail
$fallback_imgs = [ 'bg-img/10.jpg', 'bg-img/11.jpg', 'bg-img/12.jpg' ];
?>
<section class="ve-section ve-insights-section">
    <div class="container">
        <div class="ve-section-header text-center">
            <span class="ve-section-tag">Blog &amp; News</span>
            <h2>Latest Financial <span>Insights</span></h2>
            <p>Stay ahead with expert commentary, market analysis, and actionable financial tips.</p>
        </div>
        <div class="row">

            <?php if ( $insights->have_posts() ) : ?>
                <?php
                $delays = [ 100, 250, 400 ];
                $i = 0;
                while ( $insights->have_posts() ) :
                    $insights->the_post();
                    $thumb = get_the_post_thumbnail_url( null, 've-card' )
                           ?: get_template_directory_uri() . '/assets/img/' . $fallback_imgs[ $i ];
                    $cats = get_the_category();
                    ?>
                    <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="<?php echo absint( $delays[ $i ] ); ?>ms">
                        <div class="ve-insight-card">
                            <div class="ve-insight-img bg-img"
                                style="background-image:url(<?php echo esc_url( $thumb ); ?>);"></div>
                            <div class="ve-insight-body">
                                <?php if ( $cats ) : ?>
                                    <span class="ve-insight-cat"><?php echo esc_html( $cats[0]->name ); ?></span>
                                <?php endif; ?>
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <p><?php echo wp_trim_words( get_the_excerpt(), 18 ); ?></p>
                                <div class="ve-insight-meta">
                                    <span><i class="fa fa-calendar"></i> <?php echo esc_html( get_the_date( 'M d' ) ); ?></span>
                                    <a href="<?php the_permalink(); ?>">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                endwhile;
                wp_reset_postdata();
                ?>

            <?php else : ?>
                <!-- Fallback — shown until WordPress posts exist -->
                <div class="col-12 text-center" style="padding:40px 0;">
                    <p>No insights published yet. Check back soon!</p>
                    <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="ve-btn-primary" style="display:inline-flex;">
                        Add First Post
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
