<?php

/**
 * @file
 * Support file for the CCK FileField module.
 */

/**
 * Implementation of hook_ps_import_fields().
 */
function filefield_ps_import_fields($type) {
  $fields = array();

  foreach (ps_import_cck_fields($type, 'filefield') as $fieldname => $fieldinfo) {
    foreach ($fieldinfo['columns'] as $colname => $colinfo) {
      $cck_fieldname = ps_import_cck_name($fieldname, $colname);

      $fields[$cck_fieldname] = ps_import_cck_field_defaults($fieldinfo);

      switch ($colname) {
        case 'fid':
          $fields[$cck_fieldname]['title'] = $fieldinfo['widget']['label'];
          $fields[$cck_fieldname]['input_format'] = 'filepath';
          $fields[$cck_fieldname]['to_directory'] = $fieldinfo['widget']['file_path'];
          $fields[$cck_fieldname]['map_required'] = $fieldinfo['required'];
          break;

        case 'list':
          // Don't think we really need to map this.
          $fields[$cck_fieldname]['is_mappable'] = FALSE;
          $fields[$cck_fieldname]['input_format'] = 'boolean';
          $fields[$cck_fieldname]['default_value'] = $fieldinfo['list_default'];
          break;

        case 'data':
          // Not sure, but this seems to store the description only.
          $fields[$cck_fieldname]['title'] = $fieldinfo['widget']['label'] .' - '. t('Description');
          $fields[$cck_fieldname]['is_mappable'] = $fieldinfo['show_description'];
          $fields[$cck_fieldname]['default_value'] = '';
          break;

        default:
          $fields[$cck_fieldname]['title'] = t('Unsupported: ') . $fieldinfo['widget']['label'] .' - '. $colname;
          break;
      }
    }
  }

  return $fields;
}

/**
 * Implementation of hook_ps_import_values_alter().
 */
function filefield_ps_import_value_alter(&$values, $type, $defaults, $options, $fields, $preview) {
  foreach (ps_import_cck_fields($type, 'filefield') as $fieldname => $fieldinfo) {
    foreach ($values[$fieldname] as $i => $value) {
      if (isset($values[$fieldname][$i]['data'])) {
        $values[$fieldname][$i]['data'] = array('description' => $values[$fieldname][$i]['data']);
      }
    }
  }
}
