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

			<?php if ($display_submitted): ?>
				<div class="submitted">
					<?php print $user_picture; ?>
					<?php print $submitted; ?>
				</div>
			<?php endif; ?>

			<?php if ($unpublished): ?>
				<p class="unpublished"><?php print t('Unpublished'); ?></p>
			<?php endif; ?>
		</section>
	<?php endif; ?>

	<?php
		// We hide the comments and links now so that we can render them later.
		hide($content['comments']);
		hide($content['links']);
		print render($content);
	?>

	<?php print render($content['links']); ?>

	<?php print render($content['comments']); ?>

</article><!-- /.node -->
