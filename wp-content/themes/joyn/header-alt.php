<!DOCTYPE html>

<!--// OPEN HTML //-->
<html <?php language_attributes(); ?>>

	<!--// OPEN HEAD //-->
	<head>
		<?php
			$page_classes = sf_page_classes();
			$page_class = $page_classes['page'];
			
			global $post, $sf_options;
			$extra_page_class = $page_header_type = "";
			$header_layout = $sf_options['header_layout'];
			if (isset($_GET['header'])) {
				$header_layout = $_GET['header'];
			}
			if ($post) {
				$extra_page_class = sf_get_post_meta($post->ID, 'sf_extra_page_class', true);
			}
			if ($post && is_page()) {
				$page_header_type = sf_get_post_meta($post->ID, 'sf_page_header_type', true);
			}
			if (is_singular('portfolio') || is_singular('post')) {
				remove_action('sf_main_container_start', 'sf_page_heading', 20);
			}			
			if ($page_header_type == "below-slider" && ($header_layout != "header-vert" || $header_layout != "header-vert-right")) {
				add_action('sf_container_start', 'sf_pageslider', 5);
			} else {
				add_action('sf_container_start', 'sf_pageslider', 30);
			}
			
			// Remove Header
			remove_action('sf_before_page_container', 'sf_mobile_menu', 10);
			remove_action('sf_before_page_container', 'sf_mobile_cart', 20);
			remove_action('sf_container_start', 'sf_mobile_header', 10);
			remove_action('sf_container_start', 'sf_header_wrap', 20);
		?>
						
		<?php wp_head(); ?>
	
	<!--// CLOSE HEAD //-->
	</head>
	
	<!--// OPEN BODY //-->
	<body <?php body_class($page_class.' '.$extra_page_class); ?>>
				
		<?php 
			/**
			 * @hooked - sf_site_loading - 0
			 * @hooked - sf_mobile_menu - 10
			 * @hooked - sf_mobile_cart - 20
			 * @hooked - sf_pageslider - 30 (if above header)
			**/
			do_action('sf_before_page_container');
		?>
	
		<!--// OPEN #container //-->
		<div id="container">
			
			<?php 
				/**
				 * @hooked - sf_mobile_header - 10
				 * @hooked - sf_header_wrap - 20
				**/
				do_action('sf_container_start');
			?>

			<!--// OPEN #main-container //-->
			<div id="main-container" class="clearfix">
				
				<?php 
					/** 
					 * @hooked - sf_pageslider - 10 (if standard)
					 * @hooked - sf_breadcrumbs - 20
					 * @hooked - sf_page_heading - 30
					**/ 
					do_action('sf_main_container_start');
				?>