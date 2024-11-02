<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
<?php if ( is_single() ) { ?>
<div class="entry-meta">
<span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
</div>
<?php } ?>
</header>
<div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages( array(
'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'minim' ) . '</span>',
'after'       => '</div>',
'link_before' => '<span>',
'link_after'  => '</span>',
) );
?>
</div>
</article>