<?php get_header(); ?>
<main id="content">
<article id="post-0" class="post not-found">
<header class="header">
<h1 class="error-heading"><?php esc_html_e( 'Error 404', 'minim' ); ?></h1>
</header>
<div class="entry-content">
<h4 class="error-info-text"><?php _e( 'Nothing found for the requested page', 'minim' ); ?></h4>
<h4 class="error-info-text"><?php _e( 'Please try selecting from the Menu or Archives', 'minim' ); ?></h4>
</div>
</article>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>