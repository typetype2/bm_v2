<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package York Pro
 */



if ( ! function_exists( 'york_404_background' ) ) :
/**
 * Output an <img> tag of the site logo.
 * 
 * Checks if an image is uploaded and creates a background image div
 * Create your own york_404_backgrounds() to override in a child theme.
 */
function york_404_background() {
    if ( get_theme_mod( 'york_404_bg' ) ) :
        $hero_bg_img = 'style="background-image: url(' . esc_url( get_theme_mod( 'york_404_bg' ) ) . ');"'; 
        return $hero_bg_img;
    endif;
}
endif;



if ( ! function_exists( 'york_video_lightbox' ) ) :
/**
 * Display a video lightbox.
 */
function york_video_lightbox() {   

    global $post;     

    /*
     * Now let's check if there is an embed url. If so, let's show the "play" icon 
     * and add an lightbox iframe to display the video.
     */
    $embed_url = get_post_meta($post->ID, '_bean_portfolio_embed_url', true);

    if ( $embed_url ) :
        printf( 
            '<a href="%s" class="lightbox-link lightbox-play" data-lity><svg class="play-icon" shape-rendering="geometricPrecision"><use xlink:href="#play-icon"></use></svg></a>', esc_url( $embed_url ) );
    endif;
}
endif;



if ( ! function_exists( 'york_social_navigation' ) ) :
/**
 * Output the social menu.
 *
 * Checks if the social navigation is added.
 *
 */
function york_social_navigation() {

    if ( has_nav_menu( 'social' ) ) : ?>
        <nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'york-pro' ); ?>">
            <?php
            // Let's get the SVG URL. We switch it via JS, depending on the URL.
            $svg = '<svg viewBox="0 0 64 64"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href=""></use></svg>';

            wp_nav_menu( array(
                'theme_location' => 'social',
                'menu_class'     => 'social-links-menu',
                'depth'          => '1',
                'link_before'    => '<div>'. $svg .'</div><span class="screen-reader-text">',
                'link_after'     => '</span>',
                ) );
            ?>
        </nav><!-- .social-navigation -->
    <?php endif; 
}
endif;



if ( ! function_exists( 'york_site_logo' ) ) :
/**
 * Output an <img> tag of the site logo.
 *
 * Checks if jetpack_the_site_logo is available. If so, use  jetpack_the_site_logo();.
 * If not, there's a fallback of site_logo in the Theme Customizer.
 *
 */
function york_site_logo() {

	if ( function_exists( 'jetpack_the_site_logo' ) ) : 
		if ( jetpack_has_site_logo() ) { jetpack_the_site_logo(); } 
		else { ?> <h1 class="site-logo-link"><a href="<?php echo esc_url( home_url('/') ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><?php }
	else : 
		if( get_theme_mod( 'site_logo' )) { ?> 
		  	<a class="site-logo-link" href="<?php echo esc_url( home_url('/') ); ?>" rel="home"><img style="<?php york_retina_logo(); ?>" src="<?php echo esc_url( get_theme_mod( 'site_logo' ) );?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="site-logo"></a>
		<?php
		} else { ?>
		  	<h1 class="site-logo-link"><a href="<?php echo esc_url( home_url('/') ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php }
	endif; 
}
endif;



if ( ! function_exists( 'york_retina_logo' ) ) :
/**
* Output the width of the uploaded image, at 1/2 the original size.
*
* Create your own york_retina_logo() to override in a child theme.
*
*/
function york_retina_logo() {
    
    $data = get_theme_mod( 'site_logo_width' ); 
    $width = 'width:'.$data.'px;';
    echo $width;
}
endif;



if ( ! function_exists( 'york_gallery' ) ) :
/**
 * Return the portfolio and post galleries.
 * 
 * Checks if there are images uploaded to the post or portfolio post and outputs them.
 * Create your own york_gallery() to override in a child theme.
 */
function york_gallery($postid, $imagesize = '', $layout = '', $orderby = '', $single = false ) {
	$thumb_ID = get_post_thumbnail_id( $postid );
	$image_ids_raw = get_post_meta($postid, '_bean_image_ids', true);

	//Post meta
	$embed = get_post_meta($postid, '_bean_portfolio_embed_code', true);
	$embed2 = get_post_meta($postid, '_bean_portfolio_embed_code_2', true);
	$embed3 = get_post_meta($postid, '_bean_portfolio_embed_code_3', true);
	$embed4 = get_post_meta($postid, '_bean_portfolio_embed_code_4', true);
	$video_shortcodes = get_post_meta($postid, '_bean_portfolio_video_shortcodes', true);

	wp_reset_postdata();

	if( $image_ids_raw != '' )
	{
		$image_ids = explode(',', $image_ids_raw);
		$post_parent = null;
	} else {
		$image_ids = '';
		$post_parent = $postid;
	}

	$i = 1;

	//Pull in the image assets
	$args = array(
		'exclude' => $thumb_ID,
		'include' => $image_ids,
		'numberposts' => -1,
		'orderby' => 'post__in',
		'order' => 'ASC',
		'post_type' => 'attachment',
		'post_parent' => $post_parent,
		'post_mime_type' => 'image',
		'post_status' => null,
		);
	$attachments = get_posts($args); ?>
        
    <div class="project-assets">
        <?php 
        if ( !post_password_required() ) {
            if($embed) {
                echo '<figure class="video-frame">';
                    echo stripslashes(htmlspecialchars_decode($embed));
                echo '</figure>';
            }

            if($embed2) {
                echo '<figure class="video-frame">';
                    echo stripslashes(htmlspecialchars_decode($embed2));
                echo '</figure>';
            }

            if($embed3) {
                echo '<figure class="video-frame">';
                    echo stripslashes(htmlspecialchars_decode($embed3));
                echo '</figure>';
            }

            if($embed4) {
                echo '<figure class="video-frame">';
                    echo stripslashes(htmlspecialchars_decode($embed4));
                echo '</figure>';
            }

            if($video_shortcodes) { 
                echo '<figure class="video-frame">';
                    echo do_shortcode(''.$video_shortcodes.'');
                echo '</figure>';
            }
        } ?>

		<div itemscope itemtype="http://schema.org/ImageGallery" class="<?php if( get_theme_mod( 'york_portfolio_lazyload' ) == true) { echo 'lazy-load'; } ?>">
			
			<?php
			if( !empty($attachments) ) { 	
				
                if ( !post_password_required() ) {
					
                    foreach( $attachments as $attachment ) {

						$caption = $attachment->post_excerpt;
						$caption = ($caption) ? "$caption" : '';
						$alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;		    			
						$src = wp_get_attachment_image_src( $attachment->ID, $imagesize ); 
						?>

						<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
							
							<?php
                            if( get_theme_mod( 'york_portfolio_lightbox' ) == true) {
                                echo '<a href="'.$src[0].'" class="lightbox-link" title="'. htmlspecialchars($caption) .'" alt="'.$alt.'" itemprop="contentUrl" data-size="'.$src[1].'x'.$src[2].'">';
                            }

                            if( get_theme_mod( 'york_portfolio_lazyload' ) == true) {
                                echo '<img data-src="'.$src[0].'" class="lazy-img" alt=""/>';
                                echo '<noscript>';
                                echo    '<img src="'.$src[0].'"/>';
                                echo '</noscript>';
                            } else {
                                echo '<img src="'.$src[0].'"/>';
                            }   

                            if( get_theme_mod( 'york_portfolio_lightbox' ) == true) { echo '</a>'; }

							if ($caption) { echo '<div class="project-caption">'. htmlspecialchars($caption) .'</div>'; } ?>
					
						</figure>

						<?php
				    }
			    }
            }     

    echo '</div>';

} // END function york_gallery
endif;



if ( ! function_exists( 'york_entry_taxonomies' ) ) :
/**
 * Print HTML with category and tags for current post.
 * Create your own york_entry_taxonomies() to override in a child theme.
 */
function york_entry_taxonomies() {
    
    global $post;

    $portfolio_cats = get_post_meta($post->ID, '_bean_portfolio_cats', true);
    $portfolio_tags = get_post_meta($post->ID, '_bean_portfolio_tags', true); 

    if ($portfolio_cats == 'on') :

        if ( 'portfolio' == get_post_type() ) :

            $terms = get_the_terms( $post->ID, 'portfolio_category' );
            if ( $terms && ! is_wp_error( $terms ) ) :
                the_terms($post->ID, 'portfolio_category','', '', '');
            endif;

        else :

            $categories_list = get_the_category_list( esc_html_x( '', 'Used between list items, there is a space after the comma.', 'york-pro' ) );

            if ( $categories_list && york_categorized_blog() ) {
                printf( '<span class="screen-reader-text">%1$s</span>%2$s',
                    esc_html_x( 'Categories', 'Used before category names.', 'york-pro' ),
                    $categories_list
                );
            } 

        endif;

    endif;

    if ($portfolio_tags == 'on') :

        if ( 'portfolio' == get_post_type() ) :

            the_terms($post->ID, 'portfolio_tag','', '', '');

        else :

            $tags_list = get_the_tag_list( '', esc_html_x( '', 'Used between list items, there is a space after the comma.', 'york-pro' ) );

            if ( $tags_list ) {
                printf( '<span class="screen-reader-text">%1$s </span>%2$s',
                    esc_html_x( 'Tags', 'Used before tag names.', 'york-pro' ),
                    $tags_list
                );
            }

        endif;    

    endif; 
}
endif;



/**
 * Determine whether blog/site has more than one category.
 *
 * @return bool True of there is more than one category, false otherwise.
 */
function york_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'york_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,

            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'york_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so york_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so york_categorized_blog should return false.
        return false;
    }
}



/**
 * Flush out the transients used in { @see york_categorized_blog() }.
 */
function york_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'york_categories' );
}
add_action( 'edit_category', 'york_category_transient_flusher' );
add_action( 'save_post',     'york_category_transient_flusher' );


