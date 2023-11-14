<?php
/**
 * MediaSettings.
 *
 * @package blvnk-tools
 * @since 0.1.0
 */

if (!defined('ABSPATH')) {
  exit;
}
?>

<br>
<p><?php _e('Allow upload additional media files.', 'blvnk-tools'); ?></p>
<table class="form-table">
  <tr>
    <th scope="row"><?php _e('SVG files', 'blvnk-tools'); ?></th>
    <td>
      <label for="bt_media_svg" class="checkbox-switch">
        <input type="checkbox" name="bt_media_svg" id="bt_media_svg" class="checkbox-switch-input" value="1" <?php checked(get_option('bt_media_svg'), true); ?> />
        <span class="checkbox-switch-label" data-on="" data-off=""></span>
        <span class="checkbox-switch-handle"></span>
      </label>
    </td>
  </tr>
</table>
<p class="description">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-triangle"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
  <?php _e('Upload SVG files only from safe sources! Or check files for viruses before upload', 'blvnk-tools'); ?>
</p>
<hr class="more-space">
<p><?php _e('Toggle the features you want to use on your website.', 'blvnk-tools'); ?></p>
<table class="form-table">
  <tr>
    <th scope="row"><?php _e('Change JPEG upload quality', 'blvnk-tools'); ?></th>
    <td>
      <label for="bt_jpeg_quality" class="checkbox-switch">
        <input type="checkbox" name="bt_jpeg_quality" id="bt_jpeg_quality" class="checkbox-switch-input" value="1" <?php checked(get_option('bt_jpeg_quality'), true); ?> />
        <span class="checkbox-switch-label" data-on="" data-off=""></span>
        <span class="checkbox-switch-handle"></span>
      </label>
    </td>
  </tr>
  <tr class="jpeg-quality-number">
    <th scope="row"><?php _e('JPEG quality', 'blvnk-tools'); ?></th>
    <td>
      <input type="number" name="bt_jpeg_quality_number" class="small-text" value="<?php echo esc_attr(get_option('bt_jpeg_quality_number')); ?>" min="1" max="100" required /> 1-100
    </td>
  </tr>
</table>
<p class="description jpeg-quality-number">
  <?php _e('Set the desired JPEG image quality value (WordPress default quality - 82)', 'blvnk-tools'); ?>
</p>
<table class="form-table">
  <tr>
    <th scope="row"><?php _e('Remove lazy loading of images', 'blvnk-tools'); ?></th>
    <td>
      <label for="bt_lazy_loading" class="checkbox-switch">
        <input type="checkbox" name="bt_lazy_loading" id="bt_lazy_loading" class="checkbox-switch-input" value="1" <?php checked(get_option('bt_lazy_loading'), true); ?> />
        <span class="checkbox-switch-label" data-on="" data-off=""></span>
        <span class="checkbox-switch-handle"></span>
      </label>
    </td>
  </tr>
</table>
