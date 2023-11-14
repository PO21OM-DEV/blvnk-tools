<?php
/**
 * CleanUp.
 *
 * @package blvnk-tools
 * @since 0.1.0
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Remove admin bar on page preview.
 *
 * @since 0.1.0
 */
function blvnk_tools_remove_admin_bar() {
  $bt_value = get_option('bt_admin_bar');

  if ($bt_value) {
    add_filter('show_admin_bar', '__return_false');
  }
}

add_action('init', 'blvnk_tools_remove_admin_bar');

/**
 * Remove jquery migrate script.
 *
 * @since 0.1.0
 */
function blvnk_tools_remove_jquery_migrate($scripts) {
  $bt_value = get_option('bt_jqmigrate');

  if ($bt_value) {
    if (isset($scripts->registered['jquery'])) {
      $script = $scripts->registered['jquery'];
      if (! empty($script->deps)) {
        $script->deps = array_diff($script->deps, ['jquery-migrate']);
      }
    }
  }
}

add_action('wp_default_scripts', 'blvnk_tools_remove_jquery_migrate');

/**
 * Remove emoji support for older browsers.
 *
 * @since 0.1.0
 */
function blvnk_tools_remove_emoji() {
  $bt_value = get_option('bt_emoji');

  if ($bt_value) {
    // Remove from comment feed and RSS feed
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    // Remove from emails
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

    // Remove from head tag
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    // Remove from editor
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');

    add_filter('tiny_mce_plugins', 'blvnk_tools_remove_emojis_tinymce');
    add_filter('wp_resource_hints', 'blvnk_tools_remove_emojis_dns_prefetch', 10, 2);
  }
}

function blvnk_tools_remove_emojis_tinymce($plugins) {
  if (is_array($plugins)) {
    return array_diff($plugins, ['wpemoji']);
  }
  return [];
}

function blvnk_tools_remove_emojis_dns_prefetch($urls, $relation_type) {
  if ('dns-prefetch' == $relation_type) {
    $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
    $urls = array_diff($urls, [$emoji_svg_url]);
  }
  return $urls;
}

add_action('init', 'blvnk_tools_remove_emoji');

/**
 * Remove WordPress meta generator version number.
 *
 * @since 0.1.0
 */
function blvnk_tools_remove_meta_generator_ver() {
  $bt_value = get_option('bt_meta_generator');

  if ($bt_value) {
    remove_action('wp_head', 'wp_generator');
    add_filter('the_generator', '__return_empty_string');
  }
}

add_action('init', 'blvnk_tools_remove_meta_generator_ver');

/**
 * Remove version parameter from the URL of enqueued styles and scripts.
 *
 * @since 0.1.0
 */
function blvnk_tools_remove_styles_scripts_ver() {
  $bt_value = get_option('bt_styles_scripts_ver');

  if ($bt_value) {
    add_filter('style_loader_src', 'blvnk_tools_remove_styles_scripts_ver_fn', 9999);
    add_filter('script_loader_src', 'blvnk_tools_remove_styles_scripts_ver_fn', 9999);
  }
}

function blvnk_tools_remove_styles_scripts_ver_fn($src) {
  if ($src && strpos($src, '?ver=')) {
    $src = remove_query_arg('ver', $src);
  }
  return $src;
}

add_action('init', 'blvnk_tools_remove_styles_scripts_ver');

/**
 * Minify the HTML output of a WordPress page.
 *
 * @since 0.1.0
 */
function blvnk_tools_minify_code() {
  $bt_value = get_option('bt_minify_code');

  if ($bt_value) {
    function wp_minify_page($html) {
      // Check if the user is logged in
      if (is_user_logged_in()) {
        return $html;
      }
      // Remove HTML comments
      $html = preg_replace('/<!--(?!s*(?:[if [^]]+]|<!|>))(?:(?!-->).)*-->/s', '', $html);

      // Remove whitespace between HTML tags
      $html = preg_replace('/>\s+</', '><', $html);

      // Remove whitespace around HTML tags
      $html = preg_replace('/\s+(<[^>]+>)/', '$1', $html);
      $html = preg_replace('/(<[^>]+>)\s+/', '$1', $html);
      
      // Return the minified HTML
      return $html;
    }
    // Use the function to minify the output of WordPress if the user is not logged in
    add_action('template_redirect', function() {
      if (!is_user_logged_in()) {
        ob_start('wp_minify_page');
      }
    });
  }
}

add_action('init', 'blvnk_tools_minify_code');
