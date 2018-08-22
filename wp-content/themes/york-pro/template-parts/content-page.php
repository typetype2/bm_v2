<?php
/**
 * The template used for displaying page content
 *
 * @package York Pro
 */ 

if ( has_post_thumbnail() ) { 
    echo '<div class="entry-media">'; 
        the_post_thumbnail('page-feat'); 
    echo '</div>'; 
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
		
		<?php
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'york-pro' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'york-pro' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );

		/*
		 * Check to see if the page is using specialized page templates. 
		 * If so, load the functions below to get the specialized content. 
		 * If you want to override this in a child theme, then include the
		 * functions below (located in the template-tags.php file) and
		 * place them in your child theme's functions.php file. 
		 */
		if ( is_page_template('template-contact.php') ) {
			get_template_part( 'template-parts/contact', 'form' );
		}	
		?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->