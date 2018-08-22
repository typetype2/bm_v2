/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. This javascript will grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
 
( function( $ ) {

	//LIVE HTML
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.site-logo-link a' ).html( newval );
		} );
	} );


    wp.customize( 'body_font_family', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="body_font_family"> body { font-family: ' + newval + '!important; }</style>';

            el =  $( '.body_font_family' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'pagetitle_font_family', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="pagetitle_font_family"> body .hero .entry-title, body .project-caption, body.single .navigation a { font-family: ' + newval + '!important; }</style>';

            el =  $( '.pagetitle_font_family' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );
    

    wp.customize( 'body_font_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="body_font_size"> body { font-size: ' + newval + 'px!important; }</style>';

            el =  $( '.body_font_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'body_line_height', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="body_line_height"> body #content { line-height: ' + newval + 'em!important; }</style>';

            el =  $( '.body_line_height' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'body_letter_spacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="body_letter_spacing"> body #content p { letter-spacing: ' + newval + 'px!important; }</style>';

            el =  $( '.body_letter_spacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'body_word_spacing', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="body_word_spacing"> body #content p { word-spacing: ' + newval + 'px!important; }</style>';

            el =  $( '.body_word_spacing' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );


    wp.customize( 'mobile_pagetitle_font_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="mobile_pagetitle_font_size"> @media (max-width: 823px) { body .hero .entry-title, body .project-caption, body.single .navigation a  { font-size: ' + newval + 'px!important; } } </style>';

            el =  $( '.mobile_pagetitle_font_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'mobile_pagetitle_line_height', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="mobile_pagetitle_line_height"> @media (max-width: 823px) { body .hero .entry-title, body .project-caption, body.single .navigation a  { line-height: ' + newval + 'em!important; } }</style>';

            el =  $( '.mobile_pagetitle_line_height' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'pagetitle_font_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="pagetitle_font_size"> @media screen and (max-width: 1920px) and (min-width: 823px) { body .hero .entry-title, body .project-caption, body.single .navigation a  { font-size: ' + newval + 'vw!important; } } </style>';

            el =  $( '.pagetitle_font_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'pagetitle_line_height', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="pagetitle_line_height"> @media screen and (max-width: 1920px) and (min-width: 823px) {  body .hero .entry-title, body .project-caption, body.single .navigation a  { line-height: ' + newval + 'em!important; } } </style>';

            el =  $( '.pagetitle_line_height' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'bigdesktop_pagetitle_font_size', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="bigdesktop_pagetitle_font_size"> @media screen and (min-width: 1920px) { body .hero .entry-title, body .project-caption, body.single .navigation a { font-size: ' + newval + 'px!important; } } </style>';

            el =  $( '.bigdesktop_pagetitle_font_size' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'bigdesktop_pagetitle_line_height', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="bigdesktop_pagetitle_line_height"> @media screen and (min-width: 1920px) { body .hero .entry-title { body .hero .entry-title, body .project-caption, body.single .navigation a  { line-height: ' + newval + 'em!important; } } </style>';

            el =  $( '.bigdesktop_pagetitle_line_height' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );


    wp.customize( 'body_secondary_typography_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="secondary-typography-color">body .post-meta a, body .post-meta span, body .post-meta span:before, body .project-meta p, body .project-meta p:before, body .widget_bean_tweets a.twitter-time-stamp { color: ' + newval + '!important; }</style>';

            el =  $( '.secondary-typography-color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'body_typography_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="body-typography-color">body,body button,body input,body select,body textarea, p a:hover,body #content a:hover, body .widget-area a:hover, body #modal-content a:hover,body .tagcloud > a, body .tagcloud > a:hover, body .post-meta a:hover, body .project-meta a:hover { color: ' + newval + '!important; } body blockquote { border-color: ' + newval + '!important; }</style>';

            el =  $( '.body-typography-color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'york_background_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="background-color">body.logged-in, body .site { background: ' + newval + '!important; } body .cta a:after { border-color: ' + newval + '!important; } body .cd-words-wrapper.selected b { color: ' + newval + '!important; }</style>';

            el =  $( '.background-color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'york_sitetitle_color', function( value ) {
        value.bind( function( newval ) {
            $('body h1.site-logo-link').css('color', newval );
        } );
    } );

    wp.customize( 'header_typography_color', function( value ) {
        value.bind( function( newval ) {
            $('body h1, body h2, body h3, body h4, body h5, body .main-navigation a').css('color', newval );

            var style, el;
            style = '<style class="header-typography-color"> body .cd-words-wrapper::after, body .cd-words-wrapper.selected { background-color: ' + newval + '!important; }</style>';

            el =  $( '.header-typography-color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'york_sidebarsocial_color', function( value ) {
        value.bind( function( newval ) {
            $('body .sidebar .social-navigation svg').css('fill', newval );
        } );
    } );

    wp.customize( 'york_sitetitlehover_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site-logo-link-a-hover">body h1.site-logo-link a:hover { color: ' + newval + '!important; }</style>';

            el =  $( '.site-logo-link-a-hover' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'york_navigationicon_color', function( value ) {
        value.bind( function( newval ) {
            $('body .button--close span, body .mobile-menu-toggle span').css('background', newval );
        } );
    } );

    wp.customize( 'york_navigationiconhover_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="mobile-menu-toggle-a-hover">body .button--close:hover span, body .mobile-menu-toggle:hover span { background-color: ' + newval + '; }</style>';

            el =  $( '.mobile-menu-toggle-a-hover' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'york_portfolio_social_color', function( value ) {
        value.bind( function( newval ) {
            $('body .share-toggle + label').css('background', newval );
            $('body .share-menu-item svg').css('fill', newval );
        } );
    } );

    wp.customize( 'york_footertext_color', function( value ) {
        value.bind( function( newval ) {
            $('body .site-footer').css('color', newval );
        } );
    } );

    wp.customize( 'york_footernav_a_color', function( value ) {
        value.bind( function( newval ) {
            $('body .site-footer .footer-navigation a').css('color', newval );
        } );
    } );

    wp.customize( 'york_footertexthover_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="site-footer-a-hover">body #colophon.site-footer span a:hover, body .site-footer .footer-navigation a:hover { color: ' + newval + '; }</style>';

            el =  $( '.site-footer-a-hover' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'york_footersocial_color', function( value ) {
        value.bind( function( newval ) {
            $('body .site-footer .social-navigation svg').css('fill', newval );
        } );
    } );

    wp.customize( 'powered_by_york', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.site-theme' ).removeClass( 'hidden' );
            } else {
                $( '.site-theme' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'york_footer_cta_text1', function( value ) {
        value.bind( function( newval ) {
            $( '.cta h2.intro-text' ).html( newval );
        } );
    } );

    wp.customize( 'york_footer_cta_text2', function( value ) {
        value.bind( function( newval ) {
            $( '.cta h2.lets-chat' ).html( newval );
        } );
    } );

    wp.customize( 'york_footer_cta_link', function( value ) {
        value.bind( function( newval ) {
            $('.cta .cta-link').attr('href', newval );
        } );
    } );

    wp.customize( 'york_footer_cta_link_target', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $('.cta .cta-link').attr('target', '_blank' );
            } else {
                $('.cta .cta-link').attr('target', '_self' );
            }
        } );
    } );

    wp.customize( 'york_footer_cta_shapes', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.cta .float' ).removeClass( 'hidden' );
            } else {
                $( '.cta .float' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'nav_social_icons', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.sidebar .sidebar-social' ).removeClass( 'hidden' );
            } else {
                $( '.sidebar .sidebar-social' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'portfolio_single_navigation', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.project-navigation' ).removeClass( 'hidden' );
            } else {
                $( '.project-navigation' ).addClass( 'hidden' );
            }
        } );
    } );

    wp.customize( 'york_social_sharing', function( value ) {
        value.bind( function( newval ) {
            if ( true === newval ) {
                $( '.social-sharing' ).removeClass( 'hidden' );
            } else {
                $( '.social-sharing' ).addClass( 'hidden' );
            }
        } );
    } );

    



	wp.customize( 'contact_button', function( value ) {
		value.bind( function( newval ) {
			$( '.bean-contact-form .button' ).html( newval );
		} );
	} );

	wp.customize( 'portfolio_cta_button', function( value ) {
		value.bind( function( newval ) {
			$( '.project-form .button' ).html( newval );
		} );
	} );

	wp.customize( 'portfolio_cta_email', function( value ) { } );

	wp.customize( 'contact_email', function( value ) { } );

    wp.customize( 'york_cta_text_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="cta-text-color">body .cta h2 { color: ' + newval + '!important; }</style>';

            el =  $( '.cta-text-color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'york_cta_shape_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="cta-shapes-color">body .cta svg { fill: ' + newval + '!important; }</style>';

            el =  $( '.cta-shapes-color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'york_cta_background_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="cta-background-color">body .cta { background: ' + newval + '!important; }</style>';

            el =  $( '.cta-background-color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'york_overlay_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="project-overlay-color">body .project .overlay { background: ' + newval + '!important; }</style>';

            el =  $( '.project-overlay-color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

    wp.customize( 'york_overlay_text_color', function( value ) {
        value.bind( function( newval ) {
            var style, el;
            style = '<style class="project-overlay-text-color">body .project .overlay h3 { color: ' + newval + '!important; } body .lightbox-play svg { fill: ' + newval + '!important; } </style>';

            el =  $( '.project-overlay-text-color' );

            if ( el.length ) {
                el.replaceWith( style ); // style element already exists, so replace it
            } else {
                $( 'head' ).append( style ); // style element doesn't exist so add it
            }
        } );
    } );

} )( jQuery );