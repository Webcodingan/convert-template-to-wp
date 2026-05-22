<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<!-- Page Hero -->
<?php
$hero_thumb = has_post_thumbnail()
    ? get_the_post_thumbnail_url( null, 've-hero' )
    : get_template_directory_uri() . '/assets/img/bg-img/10.jpg';

$cats = get_the_category();
?>
<section class="ve-page-hero ve-page-hero-sm"
    style="background-image:url(<?php echo esc_url( $hero_thumb ); ?>);">
    <div class="ve-page-hero-overlay"></div>
    <div class="container ve-page-hero-content">
        <?php if ( $cats ) : ?>
            <span class="ve-insight-cat" style="margin-bottom:16px;"><?php echo esc_html( $cats[0]->name ); ?></span>
        <?php endif; ?>
        <h1><?php the_title(); ?></h1>
        <div class="ve-post-meta-hero">
            <span><i class="fa fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?></span>
            <span><i class="fa fa-user"></i> <?php the_author(); ?></span>
            <span><i class="fa fa-clock-o"></i> <?php echo esc_html( vaultedge_read_time() ); ?></span>
        </div>
    </div>
</section>

<!-- Content + Sidebar -->
<section class="ve-section">
    <div class="container">
        <div class="row">

            <!-- Article -->
            <div class="col-12 col-lg-8">
                <article class="ve-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="ve-article-featured bg-img"
                            style="background-image:url(<?php echo esc_url( get_the_post_thumbnail_url( null, 've-hero' ) ); ?>);">
                        </div>
                    <?php endif; ?>
                    <div class="ve-article-body">
                        <?php the_content(); ?>

                        <?php
                        wp_link_pages( [
                            'before' => '<div class="ve-page-links"><strong>' . __( 'Pages:', 'vaultedge' ) . '</strong>',
                            'after'  => '</div>',
                        ] );
                        ?>

                        <?php
                        $tags = get_the_tags();
                        if ( $tags ) :
                            echo '<div class="ve-article-tags"><strong>Tags:</strong>';
                            foreach ( $tags as $tag ) {
                                echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a>';
                            }
                            echo '</div>';
                        endif;
                        ?>

                        <div class="ve-article-share">
                            <strong>Share:</strong>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
                               target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php echo rawurlencode( get_the_title() ); ?>"
                               target="_blank" rel="noopener noreferrer"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"
                               target="_blank" rel="noopener noreferrer"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </article>

                <!-- Comments -->
                <?php comments_template(); ?>
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

<?php endwhile; ?>

<?php get_template_part( 'template-parts/components/newsletter' ); ?>

<?php get_footer(); ?>
