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
	$output = trim($output);
	$hrs = 0;
	$mins = 0;
	$l = strlen($output);
	

	if($l > 0) {
		//variants	
	  if($l == 4) $mins = (string) substr($output, 0, 2); // e.g., 99 min 01 sec
	 	
	  if($l == 3) $mins = (string) substr($output, 0, 1); // e.g., 9 min 01 sec
	  
	  if($l >= 5) { //includes HRS, e.g., 050101 = 5 hrs 01 min 01 sec
		  $mins = (string) substr($output, -4, 2);
		  $hrs = (string) substr($output, 0, $l-4);
	  }
		if(strlen($hrs) == 1) $hrs = "0" . $hrs; //prepend 0 for nicer format
		$output = $hrs . ":" . $mins . " " . t("hrs");
	} 
?>
<?php print $output; ?>