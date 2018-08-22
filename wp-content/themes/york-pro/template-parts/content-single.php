<?php
/**
 * The file for displaying the portfolio meta.
 *  
 * @subpackage York Pro
 */


//Log the view counts.
york_setPostViews( get_the_ID() ); 


/*
 * Set variables for the content below.
 */
$portfolio_cats = get_post_meta($post->ID, '_bean_portfolio_cats', true);
$portfolio_tags = get_post_meta($post->ID, '_bean_portfolio_tags', true); ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

    <div class="hero">

        <header class="entry-header">
        
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

            <?php if ($portfolio_cats == 'on' OR $portfolio_tags == 'on' ) { ?> 

                <div class="project-taxonomy">
                    <p><?php york_entry_taxonomies(); ?></p>
                </div>

            <?php } ?>

        </header><!-- .entry-header -->

        <div class="project-description entry-content">
            <?php the_content(); ?>
        </div>
    
        <?php get_template_part( 'template-parts/portfolio-meta'); ?>
        
    </div>

    <?php york_gallery($post->ID, 'port-full', 'portfolio-single' , '' , true); ?>

</article>

<?php
if ( get_theme_mod( 'portfolio_single_navigation' ) || is_customize_preview() ) :
$visibility = ( false == get_theme_mod( 'portfolio_single_navigation' ) ) ? 'hidden' : ''; ?>
    
    <div class="project-navigation <?php echo esc_html($visibility); ?>">
        <?php
        the_post_navigation( array(
            'next_text' => '<span class="meta-nav" aria-hidden="true"></span> ' .
                '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'york-pro' ) . ' %title</span> ' .
                '<span class="post-title">' . esc_html__( 'Next', 'york-pro' ) . '</span>',
            'prev_text' => '<span class="meta-nav" aria-hidden="true"></span> ' .
                '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'york-pro' ) . '</span> ' .
                '<span class="post-title">%title</span>',
        ) ); ?>
    </div>
    
<?php endif; ?>  

<?php get_template_part( 'template-parts/portfolio-sharing' ); ?>  