<?php if ( get_theme_mod( 'york_social_sharing' ) || is_customize_preview() ) : ?>
    
    <?php $visibility = ( false == get_theme_mod( 'york_social_sharing' ) ) ? 'hidden' : ''; ?>

    <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
        
    <div class="social-sharing <?php echo esc_html($visibility); ?>">
        <input class="share-toggle" id="share-menu" type="checkbox">
        <label for="share-menu">
            <svg class="share-icon social-share-icon" shape-rendering="geometricPrecision"><use xlink:href="#share-icon"></use></svg>
            <svg class="share-icon close-icon" shape-rendering="geometricPrecision"><use xlink:href="#close-icon"></use></svg>
        </label>
        <ul>
            <li class="share-menu-item">
                <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php the_title(); ?>&amp;p[summary]=&amp;p[url]=<?php the_permalink(); ?>&amp;&amp;p[images][0]=','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)">
                    <div>
                        <svg class="social-icon" shape-rendering="geometricPrecision"><use xlink:href="#facebook-mask"></use></svg>
                    </div>
                </a>
            </li>
            <li class="share-menu-item">
                <a href="http://twitter.com/share?text=<?php the_title(); ?>" target="blank">
                    <div>
                        <svg class="social-icon" shape-rendering="geometricPrecision"><use xlink:href="#twitter-mask"></use></svg>
                    </div>
                </a>
            </li>
            <li class="share-menu-item">
                <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="blank">
                    <div>
                        <svg class="social-icon" shape-rendering="geometricPrecision"><use xlink:href="#google-mask"></use></svg>
                    </div>
                </a>
            </li>
            <li class="share-menu-item">
                <a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo esc_url($feat_image); ?>&url=<?php the_permalink(); ?>&is_video=false&description=<?php the_title(); ?>" target="blank">
                    <div>
                        <svg class="social-icon" shape-rendering="geometricPrecision"><use xlink:href="#pinterest-mask"></use></svg>
                    </div>
                </a>
            </li>
        </ul>
    </div>
<?php endif; ?> 
