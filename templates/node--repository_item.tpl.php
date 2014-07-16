<?php
/**
 * @file
 * Zen theme's implementation to display a node.
 */
?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

	<?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
		<section>
			<?php print render($title_prefix); ?>
			<?php if (!$page && $title): ?>
				<h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
			<?php endif; ?>
			<?php print render($title_suffix); ?>

			<?php if ($unpublished): ?>
				<p class="unpublished"><?php print t('Unpublished'); ?></p>
			<?php endif; ?>
		</section>
	<?php endif; ?>
	
	<?php
	  //view downloaded files - called from NNELS_CALS_v001_preprocess_node_repository_item()
	  //in template.php
	?>
	<?php if ($view_download_files): ?>
		<?php print $view_download_files; ?>
	<?php endif; ?>

	<?php
		print render($content);
	?>


</article><!-- /.node -->
