<?php

/**
 * @file
 * Support file for the token module.
 */

/**
 * Implementation of hook_ps_import_postprocess().
 */
function token_ps_import_postprocess($type, $values, $options, $preview) {
  if (($node_type = ps_import_type_is_node($type)) !== FALSE) {
    token_get_values('global', NULL, TRUE);
  }
}

