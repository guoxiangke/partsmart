<?php

/**
 * @file
 * Support file for the auto_nodetitle module.
 */

/**
 * Implementation of hook_ps_import_fields_alter().
 */
function auto_nodetitle_ps_import_fields_alter(&$fields, $type) {
  if (($node_type = ps_import_type_is_node($type)) !== FALSE) {
    switch (auto_nodetitle_get_setting($node_type)) {
      case AUTO_NODETITLE_DISABLED:
        break;

      case AUTO_NODETITLE_ENABLED:
        $fields['title']['default_value'] = 'ant';
        $fields['title']['is_mappable'] = FALSE;
        $fields['title']['map_required'] = FALSE;
        break;

      case AUTO_NODETITLE_OPTIONAL:
        $fields['title']['map_required'] = FALSE;
        break;
    }
  }
}

