<?php
/*
* Plugin Name: Meta Box Plugin MH
* Plugin URI: http://github.com/Miksikuksikaksi
* Description: Just an example on how to show metadata
* Version: 1.0
* Author: Michael Hanson
* Author URI: http://github.com/Miksikuksikaksi
* License: Just GPL2 - feel free to do what you like with it ;-)
*/
?>
<?php

// Create your very own custom meta box - snippet 02
add_action( 'add_meta_boxes', 'add_color_metaboxes' );

// Function to create a custom meta box to posts in wp-dashboard - snippet 03
function add_color_metaboxes() {
	add_meta_box('mh_add_color_metabox', 'Produktfarve', 'mh_add_color_metabox', 'post', 'side', 'default');
}

// How to fill meta box with data - snippet 04
function mh_add_color_metabox() {
	global $post;
	// Noncename needed to verify where the data came from
	echo '<input type="hidden" name="color_meta_noncename" id="color_meta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	// Get the location data if its already been entered
	$color = get_post_meta($post->ID, '_color', true);
	// Echo out the field
	echo '<input type="text" name="_color" value="' . $color  . '" class="widefat" />';
}

// Save the Metabox Data - snippet 05
function mhanson_save_color_meta($post_id, $post) {
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['color_meta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}
	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	// if all ok
	// Use array to loop through.
	$color_meta['_color'] = $_POST['_color'];
	// Add values of $color_meta as custom fields
	foreach ($color_meta as $key => $value) { // Cycle through the $color_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); 
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom 0 value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}
}
add_action('save_post', 'mhanson_save_color_meta', 1, 2); // save custom fields

?>