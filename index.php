<?php get_header(); ?>

<section class="ve-section">
    <div class="container">

        <?php if ( have_posts() ) : ?>
            <div class="ve-section-header text-center">
                <h2><?php the_archive_title(); ?></h2>
                <?php the_archive_description( '<p>', '</p>' ); ?>
            </div>
            <div class="row">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-30">
                        <div class="ve-insight-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ve-insight-img bg-img"
                                    style="background-image:url(<?php echo esc_url( get_the_post_thumbnail_url( null, 've-card' ) ); ?>);">
                                </div>
                            <?php endif; ?>
                            <div class="ve-insight-body">
                                <?php
                                $cats = get_the_category();
                                if ( $cats ) :
                                    echo '<span class="ve-insight-cat">' . esc_html( $cats[0]->name ) . '</span>';
                                endif;
                                ?>
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <p><?php echo wp_trim_words( get_the_excerpt(), 18 ); ?></p>
                                <div class="ve-insight-meta">
                                    <span><i class="fa fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?></span>
                                    <a href="<?php the_permalink(); ?>">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="ve-pagination">
                <?php
                the_posts_pagination( [
                    'prev_text' => '<i class="fa fa-chevron-left"></i>',
                    'next_text' => '<i class="fa fa-chevron-right"></i>',
                ] );
                ?>
            </div>

        <?php else : ?>
            <p class="text-center"><?php esc_html_e( 'No posts found.', 'vaultedge' ); ?></p>
        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>
