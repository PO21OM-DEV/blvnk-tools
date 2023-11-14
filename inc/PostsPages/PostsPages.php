<?php
/**
 * PostsPages.
 *
 * @package blvnk-tools
 * @since 0.1.0
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Duplicate posts and pages settings.
 *
 * @since 0.1.0
 */
function blvnk_tools_duplicate_button() {
  $bt_value = get_option('bt_duplicate_postpage');

  if ($bt_value) {
    add_filter('post_row_actions', 'blvnk_tools_duplicate_post_link', 10, 2);
    add_filter('page_row_actions', 'blvnk_tools_duplicate_post_link', 10, 2);
    add_action('admin_action_bt_duplicate_post', 'bt_duplicate_post');
  }
}

function blvnk_tools_duplicate_post_link($actions, $post) {
  if (current_user_can('edit_posts') && $post->post_type != 'attachment') {
    $actions['duplicate'] = '<a href="' . wp_nonce_url(admin_url('admin.php?action=bt_duplicate_post&post=' . $post->ID), 'bt_duplicate_post_' . $post->ID) . '" title="' . __('Duplicate this item', 'textdomain') . '" rel="permalink">' . __('Duplicate', 'textdomain') . '</a>';
  }
  return $actions;
}

function bt_duplicate_post() {
  if (! isset($_GET['post']) || ! isset($_GET['_wpnonce']) || ! wp_verify_nonce($_GET['_wpnonce'], 'bt_duplicate_post_' . $_GET['post']) || ! isset($_GET['action'])) {
    wp_die('Security check');
  }
  $post_id = absint($_GET['post']);
  $post = get_post($post_id);
  $new_post_id = wp_insert_post([
    'post_title'   => $post->post_title . ' (' . __('copy', 'textdomain') . ')',
    'post_content' => $post->post_content,
    'post_status'  => 'draft',
    'post_type'    => $post->post_type,
  ]);
  if (is_wp_error($new_post_id)) {
    wp_die($new_post_id->get_error_message());
  }
  $post_meta = get_post_meta($post_id);
  foreach ($post_meta as $meta_key => $meta_values) {
    foreach ($meta_values as $meta_value) {
      add_post_meta($new_post_id, $meta_key, $meta_value);
    }
  }
  $redirect_url = admin_url('edit.php?post_type=' . $post->post_type);
  wp_redirect($redirect_url);
  exit;
}

add_action('init', 'blvnk_tools_duplicate_button');

/**
 * Revisions settings.
 *
 * @since 0.1.0
 */
function blvnk_tools_set_revisions() {
  $bt_value1 = get_option('bt_revisions_status');
  $bt_value2 = get_option('bt_revisions_limit_number');

  if ($bt_value1 === 'off' || ($bt_value1 === 'limit' && $bt_value2)) {
    if (!defined('WP_POST_REVISIONS')) {
      define('WP_POST_REVISIONS', $bt_value1 === 'off' ? false : $bt_value2);
    }
  }
}

add_action('plugins_loaded', 'blvnk_tools_set_revisions');
