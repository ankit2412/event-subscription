<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.event-subscription.com
 * @since      1.0.0
 *
 * @package    Event_Subscription
 * @subpackage Event_Subscription/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Event_Subscription
 * @subpackage Event_Subscription/includes
 * @author     Ankit Jani <ankit.jani@gmail.com>
 */
class Event_Subscription_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
            flush_rewrite_rules();
	}

}
