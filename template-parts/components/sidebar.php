<!-- Search -->
<div class="ve-sidebar-widget">
    <h5 class="ve-sidebar-title">Search</h5>
    <form class="ve-search-box" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="text" name="s" placeholder="Search articles..."
               value="<?php echo esc_attr( get_search_query() ); ?>">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>

<!-- Categories -->
<div class="ve-sidebar-widget">
    <h5 class="ve-sidebar-title">Categories</h5>
    <ul class="ve-cat-list">
        <?php
        $cats = get_categories( [ 'hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC' ] );
        foreach ( $cats as $cat ) :
            echo '<li><a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">'
               . esc_html( $cat->name )
               . ' <span>' . absint( $cat->count ) . '</span>'
               . '</a></li>';
        endforeach;
        ?>
    </ul>
</div>

<!-- Recent Posts -->
<div class="ve-sidebar-widget">
    <h5 class="ve-sidebar-title">Recent Posts</h5>
    <?php
    $recent = new WP_Query( [ 'posts_per_page' => 3, 'post_status' => 'publish' ] );
    while ( $recent->have_posts() ) :
        $recent->the_post();
        $thumb = get_the_post_thumbnail_url( null, 've-square' );
        ?>
        <div class="ve-recent-post">
            <?php if ( $thumb ) : ?>
                <div class="ve-rp-img bg-img"
                    style="background-image:url(<?php echo esc_url( $thumb ); ?>);"></div>
            <?php endif; ?>
            <div>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <span><i class="fa fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?></span>
            </div>
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
</div>

<!-- Tags -->
<div class="ve-sidebar-widget">
    <h5 class="ve-sidebar-title">Popular Tags</h5>
    <div class="ve-tags">
        <?php
        $tags = get_tags( [ 'orderby' => 'count', 'order' => 'DESC', 'number' => 10, 'hide_empty' => true ] );
        foreach ( $tags as $tag ) :
            echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a>';
        endforeach;
        ?>
    </div>
</div>
