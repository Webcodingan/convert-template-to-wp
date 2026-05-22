<?php get_header(); ?>

<!-- Page Hero -->
<section class="ve-page-hero"
    style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bg-img/24.jpg);">
    <div class="ve-page-hero-overlay"></div>
    <div class="container ve-page-hero-content">
        <span class="ve-section-tag">Knowledge Hub</span>
        <h1><?php the_archive_title(); ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="ve-breadcrumb">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                <li class="active"><?php the_archive_title(); ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- Posts + Sidebar -->
<section class="ve-section">
    <div class="container">
        <div class="row">

            <!-- Post Grid -->
            <div class="col-12 col-lg-8">
                <?php if ( have_posts() ) : ?>
                    <div class="row">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="col-12 col-md-6 wow fadeInUp mb-30">
                                <div class="ve-insight-card">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="ve-insight-img bg-img"
                                            style="background-image:url(<?php echo esc_url( get_the_post_thumbnail_url( null, 've-card' ) ); ?>);">
                                        </div>
                                    <?php endif; ?>
                                    <div class="ve-insight-body">
                                        <?php
                                        $cats = get_the_category();
                                        if ( $cats ) {
                                            echo '<span class="ve-insight-cat">' . esc_html( $cats[0]->name ) . '</span>';
                                        }
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

                    <!-- Pagination -->
                    <div class="ve-pagination">
                        <?php
                        the_posts_pagination( [
                            'prev_text' => '<i class="fa fa-chevron-left"></i>',
                            'next_text' => '<i class="fa fa-chevron-right"></i>',
                        ] );
                        ?>
                    </div>

                <?php else : ?>
                    <p><?php esc_html_e( 'No posts found in this archive.', 'vaultedge' ); ?></p>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
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
