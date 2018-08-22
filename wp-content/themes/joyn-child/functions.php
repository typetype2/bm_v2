<?php
	
	/*
	*
	*	Joyn Functions - Child Theme
	*	------------------------------------------------
	*	These functions will override the parent theme
	*	functions. We have provided some examples below.
	*
	*
	*/
	
	/* LOAD PARENT THEME STYLES
	================================================== */
	function joyn_child_enqueue_styles() {
	    wp_enqueue_style( 'joyn-parent-style', get_template_directory_uri() . '/style.css' );
	
	}
	add_action( 'wp_enqueue_scripts', 'joyn_child_enqueue_styles' );
	

	/* LOAD THEME LANGUAGE
	================================================== */
	/*
	*	You can uncomment the line below to include your own translations
	*	into your child theme, simply create a "language" folder and add your po/mo files
	*/
	
	// load_theme_textdomain('swiftframework', get_stylesheet_directory_uri().'/language');
	
	
	/* REMOVE PAGE BUILDER ASSETS
	================================================== */
	/*
	*	You can uncomment the line below to remove selected assets from the page builder
	*/
	
	// function spb_remove_assets( $pb_assets ) {
	//     unset($pb_assets['parallax']);
	//     return $pb_assets;
	// }
	// add_filter( 'spb_assets_filter', 'spb_remove_assets' );	


	/* ADD/EDIT PAGE BUILDER TEMPLATES
	================================================== */
	function custom_prebuilt_templates($prebuilt_templates) {
			
		/*
		*	You can uncomment the lines below to add custom templates
		*/
		// $prebuilt_templates["custom"] = array(
		// 	'id' => "custom",
		// 	'name' => 'Custom',
		// 	'code' => 'your-code-here'
		// );

		/*
		*	You can uncomment the lines below to remove default templates
		*/
		// unset($prebuilt_templates['home-1']);
		// unset($prebuilt_templates['home-2']);

		// return templates array
	    return $prebuilt_templates;

	}
	//add_filter( 'spb_prebuilt_templates', 'custom_prebuilt_templates' );
	
	function custom_post_thumb_image($thumb_img_url) {
	    
	    if ($thumb_img_url == "") {
	    	global $post;
	  		ob_start();
	  		ob_end_clean();
	  		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	  		if (!empty($matches) && isset($matches[1][0])) {
	  		$thumb_img_url = $matches[1][0];
	    	}
	    }
	    
	    return $thumb_img_url;
	}
	add_filter( 'sf_post_thumb_image_url', 'custom_post_thumb_image' );
	
?>