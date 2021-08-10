<?php

/**
 * The plugin bootstrap file
 *
 
 * @link              https://www.event-subscription.com
 * @since             1.0.0
 * @package           Event_Subscription
 *
 * @wordpress-plugin
 * Plugin Name:       Event Subscription
 * Plugin URI:        https://www.event-subscription.com
 * Description:       This is a event subscription plugin.
 * Version:           1.0.0
 * Author:            Ankit Jani
 * Author URI:        https://www.event-subscription.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       event-subscription
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'EVENT_SUBSCRIPTION_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-event-subscription-activator.php
 */
function activate_event_subscription() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-event-subscription-activator.php';
	Event_Subscription_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-event-subscription-deactivator.php
 */
function deactivate_event_subscription() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-event-subscription-deactivator.php';
	Event_Subscription_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_event_subscription' );
register_deactivation_hook( __FILE__, 'deactivate_event_subscription' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-event-subscription.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_event_subscription() {

	$plugin = new Event_Subscription();
	$plugin->run();

}
run_event_subscription();
