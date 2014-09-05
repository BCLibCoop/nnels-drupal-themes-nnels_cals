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
	$l = strlen($output);
	
	switch($l) {
	  case 7:
		  $hrs = substr($output, 0, 3);
		  $mins = substr($output, 3, 2);
		  break;
	  case 6:
		  $hrs = substr($output, 0, 2);
		  $mins = substr($output, 2, 2);
		  break;
	  case 5: //e.g. 61443
		  $hrs = substr($output, 0, 1);
		  $mins = substr($output, 1, 2);
		  break;
	  case 4: //e.g. 1443
		  $hrs = 0; //substr($output, 0, 1);
		  $mins = substr($output, 0, 2);
		  break;
	}
  $output = t("not known");
  $output = 0;
  if($mins > 0) $output = $mins . " " . t("mins");
  if($hrs > 0) $output = $hrs . " " . t("hours") . ", " . $output;
 
?>
<?php print $output; ?>
