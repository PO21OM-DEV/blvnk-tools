<?php
/**
 * PostsPagesSettings.
 *
 * @package blvnk-tools
 * @since 0.1.0
 */

if (!defined('ABSPATH')) {
  exit;
}
?>

<br>
<p><?php _e('Add duplicate button for posts & pages.', 'blvnk-tools'); ?></p>
<table class="form-table">
  <tr>
    <th scope="row"><?php _e('Duplicate button', 'blvnk-tools'); ?></th>
    <td>
      <label for="bt_duplicate_postpage" class="checkbox-switch">
        <input type="checkbox" name="bt_duplicate_postpage" id="bt_duplicate_postpage" class="checkbox-switch-input" value="1" <?php checked(get_option('bt_duplicate_postpage'), true); ?> />
        <span class="checkbox-switch-label" data-on="" data-off=""></span>
        <span class="checkbox-switch-handle"></span>
      </label>
    </td>
  </tr>
</table>
<hr>
<p><?php _e('Turn off or limit revisions - <a href="https://wordpress.org/documentation/article/revisions/" target="_blank">Learn more about revisions</a>', 'blvnk-tools'); ?></p>
<table class="form-table">
  <tr>
    <th scope="row"><?php _e('Revisions status:', 'blvnk-tools'); ?></th>
    <td>
      <select name="bt_revisions_status" id="bt_revisions_status">
        <option value="on" <?php selected( get_option('bt_revisions_status'), 'on'); ?>><?php _e('On', 'blvnk-tools'); ?></option>
        <option value="off" <?php selected( get_option('bt_revisions_status'), 'off'); ?>><?php _e('Off', 'blvnk-tools'); ?></option>
        <option value="limit" <?php selected( get_option('bt_revisions_status'), 'limit'); ?>><?php _e('Limit', 'blvnk-tools'); ?></option>
      </select>
    </td>
  </tr>
  <tr class="revisions-limit-number">
    <th scope="row"><?php _e('Revisions limit number:', 'blvnk-tools'); ?></th>
    <td>
      <input type="number" name="bt_revisions_limit_number" class="small-text" value="<?php echo esc_attr(get_option('bt_revisions_limit_number')); ?>" min="2" max="20" required /> 2-20
    </td>
  </tr>
</table>
<p class="description last">
  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-triangle"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
  <?php _e('This settings wont work if revisions are already defined elsewhere', 'blvnk-tools'); ?>
</p>
