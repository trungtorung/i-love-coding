<?php
/**
 * Plugin Name: I Love Coding
 * Plugin URI: https://wordpress.org/plugins/
 * Description: "I Love Coding" plugin for Wordpress.
 * Version: 1.0
 * Author: Trung Huynh
 * Author URI: http://fb.com/jerrykist
 * License: GPLv2 or later
 */

// Add the column
function th_custom_column( $cols ) {
        $cols["custom_column"] = "Custom Column";
        return $cols;
}

// Display column value
function th_custom_column_value( $column_name ) {
    echo '<p><label><input type="checkbox" value="1" checked>Is it protected?</label></p>';
	echo '<p><a href="javascript:alert(\'Hello World!\');">Configure private URLs</a></p>';
}

// Hook actions to admin_init
function hook_new_media_columns() {
    add_filter( 'manage_media_columns', 'th_custom_column' );
    add_action( 'manage_media_custom_column', 'th_custom_column_value', 10, 1 );
}
add_action( 'admin_init', 'hook_new_media_columns' );

// Add custom CSS
add_action('admin_head', 'th_custom_css');
function th_custom_css() {
	echo '<style>
		.wp-list-table tbody tr:hover {
			background-color: violet;
		} 
	</style>';
}
