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
?>
<?php 
	//see: https://github.com/BCLibCoop/nnels/issues/89
  $output = '';
  $links = array();
  foreach($row->field_field_dc_relation as $value) {
  	$id = $value['raw']['value'];
    $item = $value['rendered']['entity']['field_collection_item'][$id];
    if($item['field_dc_relation_qualifiers']['#items'][0]['value'] == 'IsPartOf') {
	    $title = $item['field_value_term_'][0]['#title'];
	    $href = $item['field_value_term_'][0]['#href'];
	    $links[] = l($title, $href);
    }
  }
  if(count($links)) $output = implode(" | ", $links);
?>
<?php print $output; ?>
