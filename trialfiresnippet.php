<?php
/*
Plugin Name: Trialfire
Plugin URI: http://wordpress.org/extend/plugins/trialfire/
Description: Inserts Trialfire tracking snippet in all pages.
Version: 1.0.0
Author: Trialfire Inc.
Author URI: http://trialfire.com/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_trialfire() {
  add_option('tf_snippet', '');
}

function deactive_trialfire() {
  delete_option('tf_snippet');
}

function admin_init_trialfire() {
  register_setting('trialfire', 'tf_snippet');
}

function admin_menu_trialfire() {
  add_options_page('Trialfire', 'Trialfire', 'manage_options', 'trialfire', 'options_page_trialfire');
}

function options_page_trialfire() {
  include(WP_PLUGIN_DIR.'/trialfire/options.php');  
}

function insert_trialfire_snippet() {
  $tf_snippet = get_option('tf_snippet');
?>
<!-- Trialfire Wordpress plugin start -->
<?php echo $tf_snippet; ?>
<!-- Trialfire Wordpress plugin end -->
<?php
}

register_activation_hook(__FILE__, 'activate_trialfire');
register_deactivation_hook(__FILE__, 'deactive_trialfire');

if (is_admin()) {
  add_action('admin_init', 'admin_init_trialfire');
  add_action('admin_menu', 'admin_menu_trialfire');
}

if (!is_admin()) {
  add_action('wp_head', 'insert_trialfire_snippet');
}

?>
