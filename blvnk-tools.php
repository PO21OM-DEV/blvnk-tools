<?php
/*
 * Plugin Name:       BLVNK Tools
 * Plugin URI:        https://github.com/PO21OM-DEV/blvnk-tools
 * Description:       Code clean up, media files and posts/pages settings.
 * Version:           0.1.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            PO21OM
 * Author URI:        https://po21om.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:
 * Text Domain:       blvnk-tools
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
 exit;
}

define('BLVNK_TOOLS_VERSION', '0.1.0');
define('BLVNK_TOOLS_DIR_URL', plugin_dir_url( __FILE__ ));
define('BLVNK_TOOLS_BASENAME', plugin_basename( __FILE__ ));

/**
 * Load text domain for plugin.
 *
 * @since 0.1.0
 */
function blvnk_tools_load_textdomain() {
  load_plugin_textdomain(
    'blvnk-tools',
    false,
    dirname(BLVNK_TOOLS_BASENAME) . '/languages'
  );
}

add_action('plugins_loaded', 'blvnk_tools_load_textdomain');

/**
 * Enqueue scripts and styles for the admin section.
 *
 * @since 0.1.0
 */
function blvnk_tools_admin_enqueue($hook) {
  if(is_admin()) {
    wp_enqueue_media();
    wp_enqueue_style(
      'blvnk-tools-admin',
      BLVNK_TOOLS_DIR_URL . 'assets/css/admin.css',
      [],
      BLVNK_TOOLS_VERSION,
      'all'
    );
    wp_enqueue_script(
      'blvnk-tools-admin',
      BLVNK_TOOLS_DIR_URL . 'assets/js/admin.js',
      ['jquery'],
      BLVNK_TOOLS_VERSION,
      true
    );
  }
}

add_action('admin_enqueue_scripts', 'blvnk_tools_admin_enqueue');

/**
 * Add settings link to plugin actions.
 *
 * @since 0.1.0
 */
function blvnk_tools_add_settings_link($links) {
  $settings_url = esc_url(admin_url('options-general.php?page=blvnk-tools'));
  $settings_link = '<a href="' . $settings_url . '">' . __('Settings') . '</a>';
  array_unshift($links, $settings_link);
  return $links;
}

add_filter('plugin_action_links_' . BLVNK_TOOLS_BASENAME, 'blvnk_tools_add_settings_link');

/**
 * Include necessary files.
 *
 * @since 0.1.0
 */
require_once __DIR__ . '/inc/Admin.php';
require_once __DIR__ . '/inc/CleanUp/CleanUp.php';
require_once __DIR__ . '/inc/Media/Media.php';
require_once __DIR__ . '/inc/PostsPages/PostsPages.php';
