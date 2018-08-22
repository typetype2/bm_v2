<?php
/**
 *  The footer Call to Action
 *
 *  @package York Pro
 */

if ( ! 
    is_home() OR
    is_page_template('template-portfolio') OR
    is_search() OR 
    is_archive() ) :

    $visibility = ( false == get_theme_mod( 'york_footer_cta' ) ) ? 'hidden' : ''; ?>

    <div class="cta-spacer <?php echo esc_html( $visibility ); ?>"></div>
            
    <footer class="cta animsition <?php echo esc_html( $visibility ); ?>">
        <div class="cta-wrapper">
            <div class="cta-wrapper-inner">

                <?php 
                if( get_theme_mod( 'york_footer_cta_text1' ) ) :
                    printf( '<h2 class="intro-text">%1$s</h2>', esc_html( get_theme_mod( 'york_footer_cta_text1' ) )
                );
                endif;

                if( get_theme_mod( 'york_footer_cta_text2' ) ) :
                    printf( '<h2 class="lets-chat"><i>%1$s</i></h2>', esc_html( get_theme_mod( 'york_footer_cta_text2' ) )
                );
                endif; ?>
            </div>
        </div>

        <?php 
        if( get_theme_mod( 'york_footer_cta_link' ) ) :

            $target = ( true == get_theme_mod( 'york_footer_cta_link_target' ) ) ? 'target="_blank"' : '';

            printf( '<a href="%1$s" class="cta-link" %2$s alt=""></a>', 
                esc_url( get_theme_mod( 'york_footer_cta_link' ) ),
                esc_attr( $target )
              
        );
        endif;

        if( get_theme_mod( 'york_footer_cta_shapes' ) ) :
            get_template_part( 'template-parts/shapes');
        endif;
        ?>
    </footer>

<?php endif; ?>