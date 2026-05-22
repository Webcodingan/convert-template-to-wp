<?php get_header(); ?>

<!-- Page Hero -->
<section class="ve-page-hero"
    style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bg-img/24.jpg);">
    <div class="ve-page-hero-overlay"></div>
    <div class="container ve-page-hero-content">
        <span class="ve-section-tag">Search Results</span>
        <h1>Results for: <span>&ldquo;<?php echo esc_html( get_search_query() ); ?>&rdquo;</span></h1>
        <nav aria-label="breadcrumb">
            <ol class="ve-breadcrumb">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                <li class="active">Search</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Results + Sidebar -->
<section class="ve-section">
    <div class="container">
        <div class="row">

            <!-- Results -->
            <div class="col-12 col-lg-8">

                <!-- Search bar -->
                <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>"
                      class="ve-search-box" style="margin-bottom:40px;">
                    <input type="text" name="s" placeholder="Search again..."
                           value="<?php echo esc_attr( get_search_query() ); ?>">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>

                <?php if ( have_posts() ) : ?>
                    <p style="margin-bottom:24px; color:var(--ve-text);">
                        <?php
                        global $wp_query;
                        printf(
                            _n( 'Found %d result.', 'Found %d results.', $wp_query->found_posts, 'vaultedge' ),
                            absint( $wp_query->found_posts )
                        );
                        ?>
                    </p>
                    <div class="row">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="col-12 col-md-6 mb-30 wow fadeInUp">
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

                    <div class="ve-pagination">
                        <?php
                        the_posts_pagination( [
                            'prev_text' => '<i class="fa fa-chevron-left"></i>',
                            'next_text' => '<i class="fa fa-chevron-right"></i>',
                        ] );
                        ?>
                    </div>

                <?php else : ?>
                    <div style="text-align:center; padding:60px 0;">
                        <i class="fa fa-search" style="font-size:48px; color:var(--ve-gold); margin-bottom:20px;"></i>
                        <h3>No results found</h3>
                        <p>Try different keywords or browse our <a href="<?php echo esc_url( site_url( '/post' ) ); ?>"
                           style="color:var(--ve-gold);">Insights</a> section.</p>
                    </div>
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
