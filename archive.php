<?php get_header(); ?>
<header class="header">
<h3 class="entry-title"><?php the_archive_title(); ?></h3>
</header>
<main id="content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry-summary' ); ?>
<?php endwhile; endif; ?>
<?php minim_page_navigation(); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>