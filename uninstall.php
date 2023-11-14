<?php // exit if uninstall constant is not defined
if (!defined('WP_UNINSTALL_PLUGIN'))
  exit;

// delete options
$options = [
  'bt_admin_bar',
  'bt_jqmigrate',
  'bt_emoji',
  'bt_meta_generator',
  'bt_styles_scripts_ver',
  'bt_minify_code',
  'bt_media_svg',
  'bt_jpeg_quality',
  'bt_jpeg_quality_number',
  'bt_lazy_loading',
  'bt_duplicate_postpage',
  'bt_revisions_status',
  'bt_revisions_limit_number',
];

foreach ($options as $option) {
  if (get_option($option))
    delete_option($option);
}
