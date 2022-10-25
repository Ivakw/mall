<?php 
    /*
    Plugin Name: Mobile APP Dashboard  Custom Fields Json API
    Plugin URI: https://wordpress.org/plugins/mobile-app-dashboard-custom-fields-json-api/
    Description: Plugin for provide Configuration page or Dashboard for your mobile APP so you can add custom fields as many as you want and get data in Jason API.
    Author: Muhammad Sufian
    Version: 1.1
    Author URI: http://technologicx.com/
    */

if ( ! defined( 'ABSPATH' ) ) exit;
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// add custom post for get Jason API
add_action( 'init', 'madcfja_create_post_custom_json_api' );
function madcfja_create_post_custom_json_api() {
  register_post_type( 'custom_json_api',
    array(
      'labels' => array(
        'name' => __( 'Custom Fields API' ),
        'singular_name' => __( 'Custom Field API' )
      ),
      'public' => true,
	  'has_archive' => true,
	  'supports' => array('title'),
	  'rewrite' => array('slug' => 'custom_json_api'),
    )
  );
}
// call custom single.php templete for custom post type
function madcfja_get_custom_post_type_template($single_template) {
     global $post;
     if ($post->post_type == 'custom_json_api') {
          $single_template = dirname( __FILE__ ) . '/include/custom_json_api_single.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'madcfja_get_custom_post_type_template' );
function app_custom_field_admin_page_actions() {
    add_options_page("APP Configurator", "APP Configurator", 1, "APP Configurator", "app_custom_field_page_file_admin");
}
function app_custom_field_page_file_admin(){
	include('include/config_page.php');
	}
 
add_action('admin_menu', 'app_custom_field_admin_page_actions');
function madcfja_load_custom_field_admin_style() {
        wp_register_style( 'app_wp_admin_css', plugin_dir_url( __FILE__ ) . 'css/app_admin_style.css', false, '1.0.0' );
        wp_enqueue_style( 'app_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'madcfja_load_custom_field_admin_style' );

function madcfja_app_custom_field_enqueue() {

    wp_enqueue_script( 'app_admin_script', plugin_dir_url( __FILE__ ) . 'js/app_admin_js.js' );
}
add_action( 'admin_enqueue_scripts', 'madcfja_app_custom_field_enqueue' );

if ( is_plugin_active( 'Mobile APP Dashboard  Custom Field Json API/appconfigurator.php' ) ) {
  	global $wpdb; // you may not need this part. Try with and without it
	$table_name = $wpdb->prefix.'app_config'; // here is your database prefix
	$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  label text NOT NULL,
  type text NOT NULL,
  value text NOT NULL,
  identifier text NOT NULL,
  UNIQUE KEY id (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );
}

?>