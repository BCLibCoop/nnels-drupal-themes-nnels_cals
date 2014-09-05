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
	global $user;
	$hrs = 0;
	$mins = 0;
  $l = strlen($output);
  if($l == 4) $mins = substr($output, 0, 2);
  if($l == 3) $mins = substr($output, 0, 1);
  
  if($l >= 4) $mins = substr($output, $l-4, 2);

  if($l >= 5) $hrs = substr($output, 0, $l-4);
	

  $output = t("not known");
  $output = 0;
  if($mins > 0) $output = $mins . " " . t("mins");
  if($hrs > 0) $output = $hrs . " " . t("hours") . ", " . $output;
 
?>
<?php print $output; ?>
