<?php
/**
 * Media.
 *
 * @package blvnk-tools
 * @since 0.1.0
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Allow SVG files upload to WordPress media library.
 *
 * @since 0.1.0
 */
function blvnk_tools_allow_media_svg() {
  $bt_value = get_option('bt_media_svg');

  if ($bt_value) {
    add_filter('upload_mimes', function($file_types) {
      $allow_svg = [];
      $allow_svg['svg'] = 'image/svg+xml';
      $file_types = array_merge($file_types, $allow_svg);
      return $file_types;
    });
  }
}

add_action('init', 'blvnk_tools_allow_media_svg');

/**
 * Change quality of uploaded JPEG images.
 *
 * @since 0.1.0
 */
function blvnk_tools_jpeg_quality() {
  $bt_value1 = get_option('bt_jpeg_quality');

  if ($bt_value1) {
    add_filter('jpeg_quality', 'blvnk_tools_jpeg_quality_fn');
  }
}

function blvnk_tools_jpeg_quality_fn($quality) {
  $bt_value2 = get_option('bt_jpeg_quality_number');

  if ($bt_value2) {
    $quality = $bt_value2;
  }
  return $quality;
}

add_action('init', 'blvnk_tools_jpeg_quality');

/**
 * Remove "loading=lazy" attribute from the HTML string.
 *
 * @since 0.1.0
 */
function blvnk_tools_remove_lazy_loading() {
  $bt_value = get_option('bt_lazy_loading');

  if ($bt_value) {
    add_filter('wp_get_attachment_image', 'blvnk_tools_remove_lazy_loading_fn');
    add_filter('post_thumbnail_html', 'blvnk_tools_remove_lazy_loading_fn');
    add_filter('the_content', 'blvnk_tools_remove_lazy_loading_fn');
  }
}

function blvnk_tools_remove_lazy_loading_fn($html) {
  $html = preg_replace('/loading="lazy"/', '', $html);
  return $html;
}

add_action('init', 'blvnk_tools_remove_lazy_loading');
