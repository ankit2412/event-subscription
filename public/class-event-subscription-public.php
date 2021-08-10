<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.event-subscription.com
 * @since      1.0.0
 *
 * @package    Event_Subscription
 * @subpackage Event_Subscription/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Event_Subscription
 * @subpackage Event_Subscription/public
 * @author     Ankit Jani <ankit.jani@gmail.com>
 */
class Event_Subscription_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/event-subscription-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/event-subscription-public.js', array('jquery'), $this->version, false);
    }

    public function my_plugin_templates($template) {

        if (is_singular('event')) {

            if (file_exists(plugin_dir_path(dirname(__FILE__)) . 'public/partials/single-event.php')) {
                return plugin_dir_path(dirname(__FILE__)) . 'public/partials/single-event.php';
            }
        }

        return $template;
    }

    public function show_user_first_name($value) {
        $current_user = wp_get_current_user();
        if ($current_user->ID > 0 && $current_user->first_name != '') {
            return $current_user->first_name;
        }
        return $value;
    }

    public function show_user_last_name($value) {
        $current_user = wp_get_current_user();
        if ($current_user->ID > 0 && $current_user->last_name != '') {
            return $current_user->last_name;
        }
        return $value;
    }

}
