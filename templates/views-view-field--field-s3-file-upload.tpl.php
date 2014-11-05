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
	$nid = $row->field_file_resource_field_collection_item_nid;
	$item_id = $row->field_collection_item_item_id;
	$access =  $row->field_field_access_restrictions[0]['raw']['value'];
	$availability = $row->field_field_availability_status[0]['raw']['value'];
	$file_id = trim($row->file_managed_field_data_field_s3_file_upload_fid);
	$s3_path = $row->_field_data['item_id']['entity']->field_s3_path['und'][0]['value'];
	$format = '';
	$class = '';
	if(isset($row->field_field_file_format[0]['rendered']['#markup'])) {
		$format = $row->field_field_file_format[0]['rendered']['#markup'];
		//$format = str_replace("Other", "file", $format); // strip out 2 and 3 from Daisy
	}
	
	if($access == 0 || $user->uid > 0) {
	  $link = l(t("Download (@format)", array("@format" => $format)), $output);
		//$class = "daisy-icon";
		
		$class = "generic-file-icon";
		//provide format specific class
		$class = str_replace(" ", "", strtolower($format));
		if($class == 'pdf') $class = "file-pdf";
	}
	else { // access = 1, restrict to logged in users
	  $dest = array("destination" => "node/" . $nid);
	  $link = l(t('Login to access this item'), "user/login", array("query" => $dest) );
		$class = 'daisy-icon-login';
	}
	//if no file produced yet.....
	if($availability != 1 || empty($file_id)) {
		$link = t("No file available");
	  //$class = "daisy-icon-na";
	  $class = "no-file-avai-icon";

		if (empty($file_id) && !empty($s3_path) && user_access('parse s3 paths') ) {
			$link .= ": " . l(t("Update File Attachment"), "admin/" . $nid . "/update-file-upload-from-field-collection/" . $item_id);
		  //$link = _cals_importer_s3path_to_file_updater($nid, $item_id);
		  
		}
  }
	$output = '<span class="' . $class . '">' . $link . '</span>';

	
?>
<?php print $output; ?>