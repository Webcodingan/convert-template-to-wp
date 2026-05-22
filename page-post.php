<?php get_header(); ?>
<section class="ve-page-hero" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-img/24.jpg);">
    <div class="ve-page-hero-overlay"></div>
    <div class="container ve-page-hero-content">
        <span class="ve-section-tag">Knowledge Hub</span>
        <h1>Financial <span>Insights &amp; Analysis</span></h1>
        <nav aria-label="breadcrumb">
            <ol class="ve-breadcrumb">
                <li><a href="<?php echo site_url('/'); ?>">Home</a></li>
                <li class="active">Insights</li>
            </ol>
        </nav>
    </div>
</section>

<?php
$paged       = get_query_var( 'paged' ) ?: 1;
$posts_query = new WP_Query( [
    'post_type'      => 'post',
    'posts_per_page' => 6,
    'paged'          => $paged,
    'post_status'    => 'publish',
] );
?>
<section class="ve-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="row">
                    <?php if ( $posts_query->have_posts() ) : ?>
                        <?php
                        $delay = 100;
                        while ( $posts_query->have_posts() ) :
                            $posts_query->the_post();
                            $thumb = get_the_post_thumbnail_url( null, 've-card' );
                            $cats  = get_the_category();
                            ?>
                            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="<?php echo absint( $delay ); ?>ms">
                                <div class="ve-insight-card">
                                    <?php if ( $thumb ) : ?>
                                        <div class="ve-insight-img bg-img"
                                            style="background-image:url(<?php echo esc_url( $thumb ); ?>);">
                                        </div>
                                    <?php endif; ?>
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
                            $delay += 100;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    <?php else : ?>
                        <div class="col-12 text-center" style="padding:40px 0;">
                            <p>No insights published yet. Check back soon!</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <div class="ve-pagination">
                    <?php
                    echo paginate_links( [
                        'total'     => $posts_query->max_num_pages,
                        'current'   => $paged,
                        'prev_text' => '<i class="fa fa-chevron-left"></i>',
                        'next_text' => '<i class="fa fa-chevron-right"></i>',
                    ] );
                    ?>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="ve-sidebar">
                    <?php get_template_part( 'template-parts/components/sidebar' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_template_part( 'template-parts/components/newsletter' ); ?>
<?php get_footer(); ?>