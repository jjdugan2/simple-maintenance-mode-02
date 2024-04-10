<?php
/**
 * Plugin Name: Simple Maintenance Mode
 * Description: Displays a maintenance mode message for users who are not logged in.
 * Version: 2.0
 * Author: Jorgen Jensen
 */

// Hook the 'wp_loaded' action to check for maintenance mode before the site loads.
add_action('wp_loaded', 'smm_maintenance_mode');

function smm_maintenance_mode() {
    // Check if the current user is not an administrator.
    if (!current_user_can('manage_options')) {
		// Create maintenance message
		$message = '<h1>Website Under Maintenance</h1><p>Sorry for the inconvenience. Please check back later.</p>';

		// Use wp_die() to show the maintenance message and stop script execution.
        wp_die($message, 'Maintenance Mode', array('response' => 503));
    }
}
?>
