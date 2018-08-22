<?php
/**
 * The file for displaying the portfolio meta.
 *  
 * @package York Pro
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the content.
 */
if ( post_password_required() ) {
	return;
}

/*
 * Set variables for the content below.
 */
$portfolio_date = get_post_meta($post->ID, '_bean_portfolio_date', true); 
$portfolio_client = get_post_meta($post->ID, '_bean_portfolio_client', true); 
$portfolio_role = get_post_meta($post->ID, '_bean_portfolio_role', true); 
$portfolio_views = get_post_meta($post->ID, '_bean_portfolio_views', true); 
$portfolio_permalink = get_post_meta($post->ID, '_bean_portfolio_permalink', true);
$portfolio_url = get_post_meta($post->ID, '_bean_portfolio_url', true); 
$portfolio_url_clean = str_replace("http://","",$portfolio_url);
$portfolio_url_clean = preg_replace('/\s+/', '', $portfolio_url_clean); 
?>

<div class="project-meta">

	<?php if ($portfolio_date == 'on') { ?> 
		<p class="published">
			<span><?php the_time('M Y') ?></span>
		</p>	
	<?php } ?>

	<?php if ($portfolio_role) { ?>
		<p class="role">
			<?php _e( 'Role: ', 'york-pro' ); ?><span><?php echo esc_html( $portfolio_role ); ?></span>
		</p>
	<?php } ?>

	<?php if ($portfolio_client) { ?>
		<p class="client">
			<?php _e( 'Client: ', 'york-pro' ); ?>
			<span>
			<?php if ($portfolio_url) { ?>
				<a href="<?php echo esc_url($portfolio_url); ?>" target="blank"><?php echo esc_html( $portfolio_client ); ?></a>
			<?php } else { 
				echo esc_html( $portfolio_client ); 
			} ?>
			</span>
		</p> 
	<?php } ?>

	<?php if ($portfolio_url && !$portfolio_client ) { ?>
		<p class="url">
			<?php _e( 'URL: ', 'york-pro' ); ?><span><a href="<?php echo esc_url($portfolio_url); ?>" target="blank"><?php echo esc_html( $portfolio_url_clean ); ?></a></span>
		</p>
	<?php } ?>

	<?php if ($portfolio_views == 'on') { ?>	
		<p class="views">
			<?php _e( 'Views: ', 'york-pro' ); ?><span><?php echo esc_html(york_getPostViews(get_the_ID())); ?></span>
		</p>
	<?php } ?>

    <?php if ($portfolio_permalink == 'on') { ?>   
        <p class="permalink">
            <span>
                <?php printf( '<a href="%1s" rel="%2$s">#</a>', 
                    esc_url( get_the_permalink() ), 
                    esc_html( get_the_title() )
                ); ?>
            </span>
        </p>
    <?php } ?>

</div>