<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
$entity = $row->_entity_properties['entity object'];
$jacket = nnels_content_cafe_select_multiple_content_cafe_jacket_rows_by_nids(array($row->entity));
if ($jacket) {
  $record = array_shift($jacket[$row->entity]);
  $file   = file_load($record->fid);
  $image  = theme(
    'image',
    array(
      'path' => image_style_path('book_cover__50x75_', $file->uri),
    )
  );
}
else {
  $image = theme(
    'image',
    array(
      'path' => '/sites/default/modules/nnels_content_cafe/img/blank.gif',
      'alt'  => $entity->title,
    )
  );
}
?>
<?php print l($image, 'node/' . $row->entity, array('html' => TRUE)); ?>
