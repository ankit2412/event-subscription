<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.event-subscription.com
 * @since      1.0.0
 *
 * @package    Event_Subscription
 * @subpackage Event_Subscription/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 *
 * @package    Event_Subscription
 * @subpackage Event_Subscription/admin
 * @author     Ankit Jani <ankit.jani@gmail.com>
 */
class Event_Subscription_Admin {

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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/event-subscription-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/event-subscription-admin.js', array('jquery'), $this->version, false);
    }

    /**
     * Register Custom Post type Event
     *
     * @since    1.0.0
     */
    public function create_post_type_event() {
        $labels = array(
            'name' => __('Events', 'Post Type General Name', 'twentytwenty'),
            'singular_name' => __('Event', 'Post Type Singular Name', 'twentytwenty'),
            'menu_name' => __('Events', 'twentytwenty'),
            'parent_item_colon' => __('Parent Event', 'twentytwenty'),
            'all_items' => __('All Events', 'twentytwenty'),
            'view_item' => __('View Event', 'twentytwenty'),
            'add_new_item' => __('Add New Event', 'twentytwenty'),
            'add_new' => __('Add New Event', 'twentytwenty'),
            'edit_item' => __('Edit Event', 'twentytwenty'),
            'update_item' => __('Update Event', 'twentytwenty'),
            'search_items' => __('Search Event', 'twentytwenty'),
            'not_found' => __('No Event Found', 'twentytwenty'),
            'not_found_in_trash' => __('No Event found in Trash', 'twentytwenty'),
        );

        $args = array(
            'label' => __('event', 'twentytwenty'),
            'description' => __('Event news and reviews', 'twentytwenty'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
            'show_in_rest' => true,
        );

        register_post_type('event', $args);
    }

    public function my_rewrite_flush() {
        $this->create_post_type_event();
        flush_rewrite_rules();
    }
    
    public function show_subscribed_user(){
        add_meta_box(
            'event_subscribed_users', // Unique ID
            'Subscribed Users',                  // Box title
            array($this, 'event_subscribed_users_html'),          // Content callback, must be of type callable
            'event',                           // Post type
            'advanced',
            'high'    
        );
    }
    
    public function event_subscribed_users_html($post){
        include plugin_dir_path(dirname(__FILE__)) . 'admin/partials/show_subscribed_user.php';
    }
    
}
