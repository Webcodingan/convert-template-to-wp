<?php get_header(); ?>

<section class="ve-page-hero"
    style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bg-img/6.jpg);">
    <div class="ve-page-hero-overlay"></div>
    <div class="container ve-page-hero-content">
        <span class="ve-section-tag">Error 404</span>
        <h1>Page <span>Not Found</span></h1>
        <nav aria-label="breadcrumb">
            <ol class="ve-breadcrumb">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                <li class="active">404</li>
            </ol>
        </nav>
    </div>
</section>

<section class="ve-section text-center">
    <div class="container">
        <div style="max-width:560px; margin:0 auto;">
            <div style="font-size:96px; font-weight:900; color:var(--ve-gold); line-height:1;">404</div>
            <h2 style="margin-top:16px;">Oops! That page doesn&rsquo;t exist.</h2>
            <p style="margin-bottom:32px;">The page you&rsquo;re looking for may have been moved, deleted,
                or never existed. Let&rsquo;s get you back on track.</p>

            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>"
                  class="ve-search-box" style="max-width:400px; margin:0 auto 32px;">
                <input type="text" name="s" placeholder="Search the site..."
                       value="<?php echo esc_attr( get_search_query() ); ?>">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ve-btn-primary">
                <i class="fa fa-home"></i> Back to Home
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
