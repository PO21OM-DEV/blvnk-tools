<?php
/**
 * admin.
 *
 * @package blvnk-tools
 * @since 0.1.0
 */

if (!defined('ABSPATH')) {
  exit;
}

class BLVNK_TOOLS {

  /**
   * Constructor function for BLVNK Tools.
   *
   * @since 0.1.0
   */
  public function __construct()	{
    if (is_admin())	{
      add_action('admin_menu', [$this, 'blvnk_tools_menu_page']);
      add_action('admin_init', [$this, 'blvnk_tools_register_settings']);
    }
  }

  /**
   * Register BLVNK Tools menu page.
   *
   * @since 0.1.0
   */
  public function blvnk_tools_menu_page() {
    add_options_page(
      __('BLVNK Tools', 'blvnk-tools'),
      __('BLVNK Tools', 'blvnk-tools'),
      'manage_options',
      'blvnk-tools',
      [$this, 'blvnk_tools_settings_page']
    );
  }

  /**
   * Register BLVNK Tools settings.
   *
   * @since 0.1.0
   */
  public function blvnk_tools_register_settings() {
    // Register settings for blvnk_tools_cleanup section
    register_setting(
      'blvnk_tools_cleanup',
      'bt_admin_bar',
      [
        'sanitize_callback' => 'sanitize_text_field',
        'default' => false
      ]
    );

    register_setting(
      'blvnk_tools_cleanup',
      'bt_jqmigrate',
      [
        'sanitize_callback' => 'sanitize_text_field',
        'default' => false
      ]
    );
    
    register_setting(
      'blvnk_tools_cleanup',
      'bt_emoji',
      [
        'sanitize_callback' => 'sanitize_text_field',
        'default' => false
      ]
    );

    register_setting(
      'blvnk_tools_cleanup',
      'bt_meta_generator',
      [
        'sanitize_callback' => 'sanitize_text_field',
        'default' => false
      ]
    );

    register_setting(
      'blvnk_tools_cleanup',
      'bt_styles_scripts_ver',
      [
        'sanitize_callback' => 'sanitize_text_field',
        'default' => false
      ]
    );

    register_setting(
      'blvnk_tools_cleanup',
      'bt_minify_code',
      [
        'sanitize_callback' => 'sanitize_text_field',
        'default' => false
      ]
    );

    // Register settings for blvnk_tools_media section
    register_setting(
      'blvnk_tools_media',
      'bt_media_svg',
      [
        'sanitize_callback' => 'sanitize_text_field',
        'default' => false
      ]
    );
    
    register_setting(
      'blvnk_tools_media',
      'bt_jpeg_quality',
      [
        'sanitize_callback' => 'sanitize_text_field',
        'default' => false
      ]
    );

    register_setting(
      'blvnk_tools_media',
      'bt_jpeg_quality_number',
      [
        'sanitize_callback' => 'absint',
        'default' => 82
      ]
    );

    register_setting(
      'blvnk_tools_media',
      'bt_lazy_loading',
      [
        'sanitize_callback' => 'sanitize_text_field',
        'default' => false
      ]
    );

    // Register settings for blvnk_tools_postspages section
    register_setting(
      'blvnk_tools_postspages',
      'bt_duplicate_postpage',
      [
        'sanitize_callback' => 'sanitize_text_field',
        'default' => false
      ]
    );
    
    register_setting(
      'blvnk_tools_postspages',
      'bt_revisions_status',
      [
        'sanitize_callback' => 'sanitize_text_field'
      ]
    );
    
    register_setting(
      'blvnk_tools_postspages',
      'bt_revisions_limit_number',
      [
        'sanitize_callback' => 'absint',
        'default' => 2
      ]
    );
  }

  /**
   * Display BLVNK Tools settings page.
   *
   * @since 0.1.0
   */
  public function blvnk_tools_settings_page() {
    $active_tab = isset($_GET['tab']) && in_array($_GET['tab'], ['clean-up', 'media', 'posts-pages']) ? $_GET['tab'] : 'clean-up';

    ?>
    <div class="wrap blvnk-tools">
      <h1 class="blvnk-tools-header">
        <div>
          <svg fill="none" width="24" height="24" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="m0 0h12v12h-12zm2 2h8v8h-8zm4.13745 13.9999v-1.9999h7.86255v-7.86255h2v9.86245z" fill="currentColor" fill-rule="evenodd"/></svg>
          <?php _e('BLVNK Tools', 'blvnk-tools'); ?>
        </div>
        <a href="https://www.paypal.com/donate/?hosted_button_id=XSV3VP79DSUKA" title="❤️" class="u-like-it" target="_blank">You like it? <span>❤️</span></a>
      </h1>
      <div class="blvnk-tools-content">
        <h2 class="nav-tab-wrapper">
          <a href="?page=blvnk-tools&tab=clean-up" class="nav-tab <?= $active_tab == 'clean-up' ? 'nav-tab-active' : ''; ?>">Clean up</a>
          <a href="?page=blvnk-tools&tab=media" class="nav-tab <?= $active_tab == 'media' ? 'nav-tab-active' : ''; ?>">Media</a>
          <a href="?page=blvnk-tools&tab=posts-pages" class="nav-tab <?= $active_tab == 'posts-pages' ? 'nav-tab-active' : ''; ?>">Posts & Pages</a>
        </h2>
        <form method="post" action="options.php">
          <?php
          switch($active_tab) {
            case 'clean-up':
              settings_fields('blvnk_tools_cleanup');
              include __DIR__ . '/CleanUp/CleanUpSettings.php';
              break;
            case 'media':
              settings_fields('blvnk_tools_media');
              include __DIR__ . '/Media/MediaSettings.php';
              break;
            case 'posts-pages':
              settings_fields('blvnk_tools_postspages');
              include __DIR__ . '/PostsPages/PostsPagesSettings.php';
              break;
          }
          ?>
          <?php submit_button(); ?>
        </form>
      </div>
    </div>
    <?php
  }

}
$blvnk_tools = new BLVNK_TOOLS();
