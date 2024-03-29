<?php

/**
 * @file
 * Support file for the Amazon ASIN (CCK Field) module.
 */

/**
 * Implementation of hook_ps_import_fields().
 */
function asin_ps_import_fields($type) {
  $fields = array();

  foreach (ps_import_cck_fields($type, 'asin') as $fieldname => $fieldinfo) {
    foreach ($fieldinfo['columns'] as $colname => $colinfo) {
      $cck_fieldname = ps_import_cck_name($fieldname, $colname);

      $fields[$cck_fieldname] = ps_import_cck_field_defaults($fieldinfo);

      switch ($colname) {
        case 'asin':
          $fields[$cck_fieldname]['title'] = $fieldinfo['widget']['label'];
          $fields[$cck_fieldname]['map_required'] = $fieldinfo['required'];
          break;

        default:
          $fields[$cck_fieldname]['title'] = t('Unsupported: ') . $fieldinfo['widget']['label'] .' - '. $colname;
          break;
      }
    }
  }

  return $fields;
}

