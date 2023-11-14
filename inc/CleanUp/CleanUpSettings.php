<?php
/**
 * CleanUpSettings.
 *
 * @package blvnk-tools
 * @since 0.0.1
 */

if (!defined('ABSPATH')) {
  exit;
}
?>

<br>
<p><?php _e('Toggle the features you want to use on your website.', 'blvnk-tools'); ?></p>
<table class="form-table">
  <tr>
    <th scope="row"><?php _e('Remove editor admin bar on site preview', 'blvnk-tools'); ?></th>
    <td>
      <label for="bt_admin_bar" class="checkbox-switch">
        <input type="checkbox" name="bt_admin_bar" id="bt_admin_bar" class="checkbox-switch-input" value="1" <?php checked(get_option('bt_admin_bar'), true); ?> />
        <span class="checkbox-switch-label" data-on="" data-off=""></span>
        <span class="checkbox-switch-handle"></span>
      </label>
    </td>
  </tr>
  <tr>
    <th scope="row"><?php _e('Remove jQuery Migrate', 'blvnk-tools'); ?></th>
    <td>
      <label for="bt_jqmigrate" class="checkbox-switch">
        <input type="checkbox" name="bt_jqmigrate" id="bt_jqmigrate" class="checkbox-switch-input" value="1" <?php checked(get_option('bt_jqmigrate'), true); ?> />
        <span class="checkbox-switch-label" data-on="" data-off=""></span>
        <span class="checkbox-switch-handle"></span>
      </label>
    </td>
  </tr>
  <tr>
    <th scope="row"><?php _e('Remove emiji support for older browsers', 'blvnk-tools'); ?></th>
    <td>
      <label for="bt_emoji" class="checkbox-switch">
        <input type="checkbox" name="bt_emoji" id="bt_emoji" class="checkbox-switch-input" value="1" <?php checked(get_option('bt_emoji'), true); ?> />
        <span class="checkbox-switch-label" data-on="" data-off=""></span>
        <span class="checkbox-switch-handle"></span>
      </label>
    </td>
  </tr>
  <tr>
    <th scope="row"><?php _e('Remove meta generator', 'blvnk-tools'); ?></th>
    <td>
      <label for="bt_meta_generator" class="checkbox-switch">
        <input type="checkbox" name="bt_meta_generator" id="bt_meta_generator" class="checkbox-switch-input" value="1" <?php checked(get_option('bt_meta_generator'), true); ?> />
        <span class="checkbox-switch-label" data-on="" data-off=""></span>
        <span class="checkbox-switch-handle"></span>
      </label>
    </td>
  </tr>
  <tr>
    <th scope="row"><?php _e('Remove styles & scripts version', 'blvnk-tools'); ?></th>
    <td>
      <label for="bt_styles_scripts_ver" class="checkbox-switch">
        <input type="checkbox" name="bt_styles_scripts_ver" id="bt_styles_scripts_ver" class="checkbox-switch-input" value="1" <?php checked(get_option('bt_styles_scripts_ver'), true); ?> />
        <span class="checkbox-switch-label" data-on="" data-off=""></span>
        <span class="checkbox-switch-handle"></span>
      </label>
    </td>
  </tr>
  <tr>
    <th scope="row"><?php _e('Minify website code', 'blvnk-tools'); ?></th>
    <td>
      <label for="bt_minify_code" class="checkbox-switch">
        <input type="checkbox" name="bt_minify_code" id="bt_minify_code" class="checkbox-switch-input" value="1" <?php checked(get_option('bt_minify_code'), true); ?> />
        <span class="checkbox-switch-label" data-on="" data-off=""></span>
        <span class="checkbox-switch-handle"></span>
      </label>
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-triangle"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
      <?php _e('Minify code is not active if user is logged in', 'blvnk-tools'); ?>
    </td>
  </tr>
</table>
