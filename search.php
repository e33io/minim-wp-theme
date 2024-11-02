<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<header class="header">
<h3 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'minim' ), get_search_query() ); ?></h3>
</header>
<main id="content">
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry-summary' ); ?>
<?php endwhile; ?>
<?php minim_page_navigation(); ?>
</main>
<?php else : ?>
<main id="content">
<article id="post-0" class="post no-results not-found">
<header class="header">
<h2 class="entry-title"><?php esc_html_e( 'Nothing Found', 'minim' ); ?></h2>
</header>
<div class="entry-content">
<p class="search-error"><?php _e( 'Please try a new search, or select from the Menu or Archives', 'minim' ); ?></p>
<div id="search" class="error-search">
<?php get_search_form(); ?>
</div>
</div>
</article>
</main>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>