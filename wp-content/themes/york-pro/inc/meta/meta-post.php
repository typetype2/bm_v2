<?php
/**
 * The file is for creating the portfolio post type meta. 
 * Meta output is defined on the portfolio single editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 *  
 * @package WordPress
 * @subpackage York Pro
 * @author ThemeBeans
 */
 
add_action('add_meta_boxes', 'bean_metabox_post');
function bean_metabox_post(){

$prefix = '_bean_';




/*===================================================================*/
/*  PORTFOLIO FORMAT SETTINGS                                                                           
/*===================================================================*/
$meta_box = array(
    'id' => 'portfolio-type',
    'title' =>  esc_html__('Portfolio Format', 'york-pro'),
    'description' => esc_html__('', 'york-pro'),
    'page' => 'post',
    'context' => 'side',
    'priority' => 'core',
    'fields'   => array(
        array(  
            'name' => esc_html__('Gallery','york-pro'),
            'desc' => esc_html__('','york-pro'),
            'id' => $prefix.'portfolio_type_gallery',
            'type' => 'checkbox',
            'std' => true 
            ),  
        array(  
            'name' => esc_html__('Video','york-pro'),
            'desc' => esc_html__('','york-pro'),
            'id' => $prefix.'portfolio_type_video',
            'type' => 'checkbox',
            'std' => false 
            ),                          
    )
);
bean_add_meta_box( $meta_box );





/*===================================================================*/
/*  PORTFOLIO META SETTINGS                                                                         
/*===================================================================*/
$meta_box = array(
    'id' => 'portfolio-meta',
    'title' =>  esc_html__('Portfolio Settings', 'york-pro'),
    'description' => esc_html__('', 'york-pro'),
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields'   => array(
        array( 
            'name' => esc_html__('Header Style:', 'york-pro'),
            'desc' => esc_html__('Select the size of the project thumbnail.', 'york-pro'),
            'id' => $prefix.'portfolio_grid_size',
            'type' => 'radio',
            'std' => 'project-med',
            'options' => array(
                'project-sml'  => esc_html__('Small', 'york-pro'),
                'project-med'  => esc_html__('Medium', 'york-pro'),
                'project-lrg'  => esc_html__('Large', 'york-pro'),
                'project-xlg'  => esc_html__('Xtra-Large', 'york-pro'),
                )
            ),
        array( 
            'name' => esc_html__('Gallery Images:','york-pro'),
            'desc' => esc_html__('Upload, reorder and caption the post gallery.','york-pro'),
            'id' => $prefix .'portfolio_upload_images',
            'type' => 'images',
            'std' => esc_html__('Browse & Upload', 'york-pro')
            ),
        array(
            'name' => esc_html__('Date:', 'york-pro'),
            'id' => $prefix.'portfolio_date',
            'type' => 'checkbox',
            'desc' => esc_html__('Display the date.', 'york-pro'),
            'std' => false 
            ),
        array(
            'name' => esc_html__('Views:', 'york-pro'),
            'id' => $prefix.'portfolio_views',
            'type' => 'checkbox',
            'desc' => esc_html__('Display the view count.', 'york-pro'),
            'std' => false 
            ),
        array(
            'name' => esc_html__('Categories:', 'york-pro'),
            'id' => $prefix.'portfolio_cats',
            'type' => 'checkbox',
            'desc' => esc_html__('Display the portfolio categories.', 'york-pro'),
            'std' => false 
            ),
        array(
            'name' => esc_html__('Tags:', 'york-pro'),
            'id' => $prefix.'portfolio_tags',
            'type' => 'checkbox',
            'desc' => esc_html__('Display the portfolio tags.', 'york-pro'),
            'std' => false 
            ),
        array(
            'name' => esc_html__('Permalink:', 'york-pro'),
            'id' => $prefix.'portfolio_permalink',
            'type' => 'checkbox',
            'desc' => esc_html__('Display the post permalink.', 'york-pro'),
            'std' => false 
            ),
        array(  
            'name' => esc_html__('Role:','york-pro'),
            'desc' => esc_html__('Display the role.','york-pro'),
            'id' => $prefix.'portfolio_role',
            'type' => 'text',
            'std' => ''
            ),
        array(  
            'name' => esc_html__('Client:','york-pro'),
            'desc' => esc_html__('Display the client meta.','york-pro'),
            'id' => $prefix.'portfolio_client',
            'type' => 'text',
            'std' => ''
            ),  
        array(  
            'name' => esc_html__('URL:','york-pro'),
            'desc' => esc_html__('Display a URL to link to.','york-pro'),
            'id' => $prefix.'portfolio_url',
            'type' => 'text',
            'std' => ''
            ),  
        array(  
            'name' => esc_html__('External URL:','york-pro'),
            'desc' => esc_html__('Link this portfolio post to an external URL. For example, link this post to your Behance portfolio post.','york-pro'),
            'id' => $prefix.'portfolio_external_url',
            'type' => 'text',
            'std' => ''
            ),              
    )
);
bean_add_meta_box( $meta_box );
 
 
 
 
/*===================================================================*/
/*  VIDEO POST FORMAT SETTINGS                                                                      
/*===================================================================*/
$meta_box = array(
    'id' => 'bean-meta-box-portfolio-video',
    'title' => esc_html__('Video Settings', 'york-pro'),
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',   
    'fields' => array(
        array(
            'name' => esc_html__('Lightbox Embed URL:', 'york-pro'),
            'desc' => esc_html__('Insert your embeded URL to play in the blogroll grid pages.', 'york-pro'),
            'id' => $prefix . 'portfolio_embed_url',
            'type' => 'text',
            'std' => ''
            ),
        array(
            'name' => esc_html__('Embed 1:', 'york-pro'),
            'desc' => esc_html__('Insert your embeded code here.', 'york-pro'),
            'id' => $prefix . 'portfolio_embed_code',
            'type' => 'textarea',
            'std' => ''
            ),
        array(
            'name' => esc_html__('Embed 2:', 'york-pro'),
            'desc' => esc_html__('Insert your embeded code here.', 'york-pro'),
            'id' => $prefix . 'portfolio_embed_code_2',
            'type' => 'textarea',
            'std' => ''
            ),
        array(
            'name' => esc_html__('Embed 3:', 'york-pro'),
            'desc' => esc_html__('Insert your embeded code here.', 'york-pro'),
            'id' => $prefix . 'portfolio_embed_code_3',
            'type' => 'textarea',
            'std' => ''
            ),
        array(
            'name' => esc_html__('Embed 4:', 'york-pro'),
            'desc' => esc_html__('Insert your embeded code here.', 'york-pro'),
            'id' => $prefix . 'portfolio_embed_code_4',
            'type' => 'textarea',
            'std' => ''
            ),
        array(
            'name' => esc_html__('Video Shortcodes:', 'york-pro'),
            'desc' => esc_html__('Insert any <a target="blank" href="https://codex.wordpress.org/Video_Shortcode">video shortcodes</a> here.', 'york-pro'),
            'id' => $prefix . 'portfolio_video_shortcodes',
            'type' => 'textarea',
            'std' => ''
            ),      
    ),
    
);
bean_add_meta_box( $meta_box );
}