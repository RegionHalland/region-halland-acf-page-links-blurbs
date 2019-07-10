<?php

	/**
	 * @package Region Halland ACF Page Links Blurbs
	 */
	/*
	Plugin Name: Region Halland ACF Page Links Blurbs
	Description: Skapar post_typen "Blurbs", dvs puffar + visa dessa "puffar" på en sida 
	Version: 1.6.0
	Author: Roland Hydén
	License: GPL-3.0
	Text Domain: regionhalland
	*/

	// vid 'init', anropa funktionen region_halland_register_utbildning()
	add_action('init', 'region_halland_register_page_links_blurbs' );

	// Denna funktion registrerar en ny post_type och gör den synlig i wp-admin
	function region_halland_register_page_links_blurbs() {
		
		// Vilka labels denna post_type ska ha
		$labels = array(
		        'name'                  => _x('Puffar', 'Post type general name', 'textdomain' ),
		        'singular_name'         => _x('Puffar', 'Post type singular name', 'textdomain' ),
		        'menu_name'             => _x('Puffar', 'Admin Menu text', 'textdomain' ),
		        'add_new'               => __('Lägg till ny', 'textdomain' ),
        		'add_new_item'          => __('Lägg till ny', 'textdomain' ),
        		'edit_item'          	=> __('Editera', 'textdomain' )
		    );
		
		// Inställningar för denna post_type 
	    $args = array(
	        'labels' => $labels,
	        'rewrite' => array('slug' => 'puffar'),
			'show_ui' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'public' => true,
			'query_var' => false,
			'menu_icon' => 'dashicons-megaphone',
	        'supports' => array( 'title', 'editor', 'author', 'thumbnail')
	    );

	    // Registrera post_type
	    register_post_type('blurbs', $args);
	    
	}

	// Anropa function om ACF är installerad
	add_action('acf/init', 'my_acf_page_links_blurbs_field_groups');

	// Function för att lägga till "field groups"
	function my_acf_page_links_blurbs_field_groups() {

		if (function_exists('acf_add_local_field_group')):

			acf_add_local_field_group(array(
			    'key' => 'group_1000115',
			    'title' => ' ',
			    'fields' => array(
			        0 => array(
		              'key' => 'field_1000116',
            		  'label' => __('Länk', 'regionhalland'),
            		  'name' => 'name_1000117',
            		  'type' => 'link',
            		  'instructions' => __('Länk till läs mer. Kan vara en extern länk eller en sida.', 'regionhalland'),
            		  'required' => 0,
            		  'conditional_logic' => 0,
            		  'wrapper' => array(
                		'width' => '',
                		'class' => '',
                		'id' => '',
            		  ),
            		  'return_format' => 'array',
        		    ),
			    ),
			    'location' => array(
			        0 => array(
			            0 => array(
			                'param' => 'post_type',
			                'operator' => '==',
			                'value' => 'blurbs',
			            ),
			        )
			    ),
			    'menu_order' => 0,
			    'position' => 'normal',
			    'style' => 'default',
			    'label_placement' => 'top',
			    'instruction_placement' => 'label',
			    'hide_on_screen' => '',
			    'active' => 1,
			    'description' => '',
			));

		endif;

	}

	// Anropa function om ACF är installerad
	add_action('acf/init', 'my_acf_add_main_post_page_links_blurb_repeater_field_groups');

	// Function för att lägga till "field groups"
	function my_acf_add_main_post_page_links_blurb_repeater_field_groups() {

		// Om funktionen existerar
		if (function_exists('acf_add_local_field_group')):

			// Skapa formlärfält
			acf_add_local_field_group(array(
			    
			    'key' => 'group_1000110',
			    'title' => 'Visa puffar på sidan',
			    'fields' => array(
			        0 => array(
			            'key' => 'field_1000111',
			            'label' => __('Välj vilka puffar som ska visas', 'halland'),
			            'name' => 'name_1000112',
			            'type' => 'repeater',
			            'instructions' => __('Klicka på "Lägg till rad" för att lägga till en ny puff.', 'halland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'collapsed' => '',
			            'min' => 0,
			            'max' => 25,
			            'layout' => 'row',
			            'button_label' => '',
			            'sub_fields' => array(
			              0 => array(
		            		  'key' => 'field_1000113',
		            		  'label' => __('Puff', 'regionhalland'),
		            		  'name' => 'name_1000114',
		            		  'type' => 'page_link',
		            		  'post_type' => 'blurbs',
		            		  'allow_archives' => 0,
		            		  'instructions' => __('Lägg till en valfri puff'),
		            		  'required' => 0,
		            		  'conditional_logic' => 0,
		            		  'wrapper' => array(
		                		'width' => '',
		                		'class' => '',
		                		'id' => '',
		            		  ),
		            		  'return_format' => 'array',
		        		  )
				        
			            ),
		        	),
			    ),
				    'location' => array(
				        0 => array(
				            0 => array(
				                'param' => 'post_type',
				                'operator' => '==',
				                'value' => 'post',
				            ),
				        ),
				        1 => array(
				            0 => array(
				                'param' => 'post_type',
				                'operator' => '==',
				                'value' => 'page',
				            ),
				        ),
				    ),
				    'menu_order' => 0,
				    'position' => 'normal',
				    'style' => 'default',
				    'label_placement' => 'top',
				    'instruction_placement' => 'label',
				    'hide_on_screen' => '',
				    'active' => 1,
				    'description' => '',
			));

		endif;

	}
	
	// Returnera blurbar
	function get_region_halland_acf_main_post_page_links_blurbs($myID = 0) {
		
		// Hämta alla länkar
		if ($myID == 0) {
			$myFields = get_field('name_1000112');
		} else {
			$myFields = get_field('name_1000112', $myID);
		}

		// Temporär array för alla poster
		$myPosts = array();
		
		if ($myFields) {

			// Loopa igenom alla länkar
			foreach ($myFields as $field) {
			    
			    // Länk url
			    $strLinkUrl		= $field['name_1000114'];
			    
			    // Längden på url:en
			    $lenLinkUrl     = strlen($strLinkUrl);
				
			    // Kolla så att det faktiskt finns en länk
				if ($lenLinkUrl > 0 ) {

					// Splitta länken på "/"
					$arrUrl = explode("/",$strLinkUrl);
					$countUrl = count($arrUrl);
					
					// välj post_name
					$strPostName = $arrUrl[$countUrl-2];
					
					// Funktion som returnerar postID basterat på post_name
					$postID = get_region_halland_acf_page_links_blurbs_post_id($strPostName);
					
					// Hämta hela posten
					$post = get_post($postID);
					
					// Post title från posten
					$postTitle = $post->post_title;
					
					// Post content från posten
					$postContent = $post->post_content;
					
					// Bild
					$image = get_the_post_thumbnail($post->ID);
					$imageUrl = get_the_post_thumbnail_url($post->ID);
					$imageID = get_post_thumbnail_id($post->ID);
					$imageAlt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
					
					// Hämta ACF-objektet för link
					$fieldLink = get_field_object('field_1000116', $post->ID);
				
					// Kontrollera om det finns en sparad länk
					$isFieldLinkArray = is_array($fieldLink['value']);
									
					// Spara ner ACF-data i page-arrayen
					if ($isFieldLinkArray) {
						$linkTitle 		= $fieldLink['value']['title'];
						$linkUrl 		= $fieldLink['value']['url'];
						$linkTarget 	= $fieldLink['value']['target'];
					} else {
						$linkTitle 		= "";
						$linkUrl 		= "";
						$linkTarget 	= "";
					}

					// Pusha data till temporär array
			        array_push($myPosts, array(
			           'ID' => $postID,
			           'post_url' => $strLinkUrl,
			           'post_name' => $strPostName,
			           'post_title' => $postTitle,
			           'post_content' => $postContent,
			           'image' => $image,
			           'image_url' => $imageUrl,
			           'image_alt' => $imageAlt,
			           'link_title' => $linkTitle,
			           'link_url' => $linkUrl,
			           'link_target' => $linkTarget
			        ));

				}
	        }

		}
		
		// Returnera alla poster
		return $myPosts;

	}

	function get_region_halland_acf_page_links_blurbs_post_id($post_name) {
		
		// Databas connection
		global $wpdb; 

		// Select
		$sql = "";
		$sql .= "SELECT ID FROM wp_posts ";
		
		// Where
		$sql .= "WHERE ";
		$sql .= "post_type = 'blurbs' ";
		$sql .= "AND ";
		$sql .= "post_status = 'publish' ";
		$sql .= "AND ";
		$sql .= "post_name = '$post_name' ";

		// Get result
		$arrID = $wpdb->get_row($sql, ARRAY_A);
		
		// Get ID from result
		$myID = intval($arrID['ID']);
		
		// Return id
		return $myID;
			
	}

	function get_region_halland_acf_page_links_single_blurb($pageID) {
		
		// Hämta page information
		$page 				= get_post($pageID);

		// Lägg till sidans url
		$page->post_url = get_permalink($page->ID);
		
		// Lägg till featured image url
		$page->image 		= get_the_post_thumbnail($page->ID);
		$page->image_url 	= get_the_post_thumbnail_url($page->ID);

		// Hämta ACF-objektet för link
		$fieldLink 		= get_field_object('field_1000116', $page->ID);
			
		// Spara ner ACF-data i page-arrayen
		$page->link_title 		= $fieldLink['value']['title'];
		$page->link_url 		= $fieldLink['value']['url'];
		$page->link_target 	= $fieldLink['value']['target'];

		// Returnera page-array
		return $page;
	
	}
	
	// Metod som anropas när pluginen aktiveras
	function region_halland_acf_page_links_blurbs_activate() {
		
		// Vi aktivering, registrera post_type "blurbs"
		region_halland_register_page_links_blurbs();

		// Tala om för wordpress att denna post_type finns
		// Detta gör att permalink fungerar
	    flush_rewrite_rules();
	}

	// Metod som anropas när pluginen avaktiveras
	function region_halland_acf_page_links_blurbs_deactivate() {
		// Ingenting just nu...
	}
	
	// Vilken metod som ska anropas när pluginen aktiveras
	register_activation_hook( __FILE__, 'region_halland_acf_page_links_blurbs_activate');

	// Vilken metod som ska anropas när pluginen avaktiveras
	register_deactivation_hook( __FILE__, 'region_halland_acf_page_links_blurbs_deactivate');

?>