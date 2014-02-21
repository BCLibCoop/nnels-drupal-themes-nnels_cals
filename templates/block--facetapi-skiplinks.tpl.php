<?php
/* block.tpl.php */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

	<?php print render($title_prefix); ?>
		<?php if ($title): ?>
			<h2<?php print $title_attributes; ?>><?php print $title; ?> ... Let's add skip link anchors!!</h2>
		<?php endif; ?>
	<?php print render($title_suffix); ?>

	<?php print $content; ?>

</div><!-- /.block -->
