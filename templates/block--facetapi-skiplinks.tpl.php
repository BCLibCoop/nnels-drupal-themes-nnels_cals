<?php
/* block.tpl.php */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<a href="searchapi-facetblock" id="facet-<?php print $block_id; ?>"></a>

	<?php print render($title_prefix); ?>
		<?php if ($title): ?>
			<h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
		<?php endif; ?>
	<?php print render($title_suffix); ?>

	<?php print $content; ?>

</div><!-- /.block -->
