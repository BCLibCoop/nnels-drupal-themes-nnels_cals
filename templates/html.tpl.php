<?php
/* html.tpl.php*/
?>
<!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->

<head profile="<?php print $grddl_profile; ?>">
	<?php print $head; ?>

	<title><?php print $head_title; ?></title>

	<?php if ($default_mobile_metatags): ?>
		<meta name="MobileOptimized" content="width">
		<meta name="HandheldFriendly" content="true">
		<meta name="viewport" content="width=device-width">
	<?php endif; ?>

	<meta http-equiv="cleartype" content="on">

	<?php print $styles; ?>

	<?php print $scripts; ?>

	<?php if ($add_respond_js): ?>
		<!--[if lt IE 9]>
		<script src="<?php print $base_path . $path_to_zen; ?>/js/html5-respond.js"></script>
		<![endif]-->
	<?php elseif ($add_html5_shim): ?>
		<!--[if lt IE 9]>
		<script src="<?php print $base_path . $path_to_zen; ?>/js/html5.js"></script>
		<![endif]-->
	<?php endif; ?>
</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>
	<?php if ($skip_link_text && $skip_link_anchor): ?>
		<ul id="skip-link" class="element-invisible">
			<li><a href="#<?php print $skip_link_anchor; ?>" class="element-invisible element-focusable">
				<?php print $skip_link_text; ?></a>
			</li>
			<li><a href="#search-navigation" class="element-invisible element-focusable">
				skip to main search</a>
			</li>
			<li><a href="#main-content" class="element-invisible element-focusable">
				skip to main content</a>
			</li>
			<?php if ( count(block_list('sidebar_first')) ): ?>
			<!-- include secondary links if there are sidebar blocks -->
			  <li><a href="#secondary-navigation" class="element-invisible element-focusable">
				  skip to secondary navigation</a>
			  </li>
			<?php endif; ?>
		</ul>
	<?php endif; ?>

	<?php print $page_top; ?>

	<?php print $page; ?>

	<?php print $page_bottom; ?>
</body>
</html>
