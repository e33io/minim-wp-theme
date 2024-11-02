<?php

// page navigation 
function minim_page_navigation() {
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) {
		echo '<nav id="nav-below" class="navigation" role="navigation">';
		echo '<ul><li class="nav-next" style="display: inline-block;">';
		previous_posts_link( '&#10094; Newer' );
		echo '</li><li class="nav-previous" style="display: inline-block;">';
		next_posts_link( 'Older &#10095;' );
		echo '</li></ul>';
		echo '</nav>';
	} else {
		echo '<div class="nav-space"></div>';
	}
}

// get featured image or first image or text only 
function minim_thumbnail_image() {
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'medium' );
	} else {
		global $post;
		$args = array(
			'post_type' => 'attachment',
			'numberposts' => -1,
			'post_status' => null,
			'post_parent' => $post->ID
		);
		$attachments = get_posts( $args );
		if ( $attachments ) {
			echo wp_get_attachment_image( $attachments[0]->ID, 'medium', false, array( 'class'=>'img-responsive' ) );
		} else {
			echo '<div class="text-summary">';
			echo the_title( '<h2 class="text-summary-title">', '</h2>' );
			echo '<p class="text-summary-excerpt">' . wp_strip_all_tags( get_the_excerpt() ) . '</p>';
			echo '</div>';
		}
	}
}

// get featured image or first image or default image URL 
function minim_thumbnail_image_url() {
	if ( has_post_thumbnail() ) {
		the_post_thumbnail_url( 'large' );
	} else {
		global $post;
		$args = array(
			'post_type' => 'attachment',
			'numberposts' => -1,
			'post_mime_type' => 'image',
			'post_status' => null,
			'post_parent' => $post->ID,
			'posts_per_page' => 1
		);
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
				$src = wp_get_attachment_image_src( $attachment->ID, 'large' );
				if ( $src ) {
					echo $src[0];
				}
			}
		} else {
			echo get_stylesheet_directory_uri() . '/assets/images/default-post-image.png';
		}
	}
}

// add Open Graph and Twitter Card meta tags 
function minim_og_meta_tags() {
	global $post;
	$current_url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$current_uri = $_SERVER['REQUEST_URI'];
	if ( is_single() ) { ?>
		<meta name="twitter:card" content="summary_large_image" />
		<meta property="og:url" content="<?php the_permalink() ?>" />
		<meta property="og:title" content="<?php echo wp_strip_all_tags( get_the_excerpt() ); ?>" />
		<meta property="og:description" content="<?php the_time( get_option( 'date_format' ) ); ?>" />
		<meta property="og:image" content="<?php minim_thumbnail_image_url() ?>" />
	<?php } elseif ( is_front_page() ) { ?>
		<meta name="twitter:card" content="summary" />
		<meta property="og:url" content="<?php echo get_home_url(); ?>" />
		<meta property="og:title" content="<?php bloginfo( 'name' ); ?>" />
		<meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
		<meta property="og:image" content="<?php site_icon_url() ?>" />
	<?php } else { ?>
		<meta name="twitter:card" content="summary" />
		<meta property="og:url" content="<?php echo $current_url; ?>" />
		<meta property="og:title" content="<?php bloginfo( 'name' ); ?>" />
		<meta property="og:description" content="<?php echo $current_uri; ?>" />
		<meta property="og:image" content="<?php site_icon_url() ?>" />
	<?php }
}
add_action( 'wp_head', 'minim_og_meta_tags', 99 );
