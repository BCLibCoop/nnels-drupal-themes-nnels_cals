<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php
/* Some Repository Items only use the external URL field ("Resource URL")
 * in place of File Resources.
 *
 * There are 2x2 properties between File Resource
 * and External URL:
 *
 * File   URL	 Result
 * ------------------
 *  Y 	|  Y   | Hide URL
 *  Y   |  N   | No action, File shows
 *  N   |  Y   | Hide Request
 *  N   |  N   | Show Request (Sub-view result)
 */

// Use isset, property for the renderable View object might not exist.
$file_resource = ( isset( $row->field_field_file_resource[0]['raw'] ) ?
  $row->field_field_file_resource[0]['raw'] : NULL );
$url_external = ( isset( $row->field_field_urls_external[0]['raw'] ) ?
  $row->field_field_urls_external[0]['raw'] : NULL );

if ( ! empty($file_resource) ) {
  if ( ! empty($url_external) ) {
    //FYUY: hide URL
    $fields['field_urls_external'] = NULL;
  } else {
    //FYUN: no action
  }
} else { //File not present
    if ( ! empty($url_external) ) {
      //FNUY: hide request
      //Set the sub-view markup to NULL
      $fields['view'] = NULL;
  } else {
      //FNUN: Show Request
    }
}

?>
<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>
  <?php //Don't render any nullified fields
  if (isset($field)): ?>
    <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
      <?php print $field->content; ?>
    <?php print $field->wrapper_suffix; ?>
  <?php endif; ?>
<?php endforeach; ?>
