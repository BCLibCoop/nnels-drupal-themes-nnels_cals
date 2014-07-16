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
	//dpm($output);
	//dpm($row);
	//dpm($field);
	global $user;
	$nid = $row->field_file_resource_field_collection_item_nid;
	$item_id = $row->field_collection_item_item_id;
	$access =  $row->field_field_access_restrictions[0]['raw']['value'];
	$availability = $row->field_field_availability_status[0]['raw']['value'];
	$file_id = $row->file_managed_field_data_field_s3_file_upload_fid;

	if($access == 0 || $user->uid > 0) {
	  $link = l(t("Download the Daisy File"), $output);
		$class = "daisy-icon";
	}
	else { // access = 1, restrict to logged in users
	  $dest = array("destination" => "node/" . $nid);
	  $link = l(t('Login to access this item'), "user/login", array("query" => $dest) );
		$class = 'daisy-icon-login';
	}
	//if no file produced yet...
	if($availability != 1 || $file_id === NULL) {
	  $link = t("No file available");
	  $class = "daisy-icon-na";
	}
	$output = '<span class="' . $class . '">' . $link . '</span>';

	
?>
<?php print $output; ?>
