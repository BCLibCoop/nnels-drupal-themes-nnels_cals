<?php
/** page.tpl.php **/
?>

<div id="page">
	<header id="header" role="banner">
		<?php print render($page['header']); ?>
	</header>

	<div id="navigation">
		<nav id="main-navigation" role="navigation">
			<?php print render($page['navigation']); ?>
		</nav>
	</div><!-- /#navigation -->

	<div id="search">
		<nav id="search-navigation" role="navigation">
			<?php print render($page['search']); ?>
		</nav>
	</div><!-- /#search -->

	<div id="main">
		<div id="content" class="column" role="main">

			<?php print $breadcrumb; ?>

			<?php print render($page['admin_nav']); ?>

			<?php print render($tabs); ?>

			<?php if ($action_links): ?>
				<ul class="action-links">
					<?php print render($action_links); ?>
				</ul>
			<?php endif; ?>

			<?php print $messages; ?>

			<?php print render($page['help']); ?>

			<?php print render($page['highlighted']); ?>

			<a id="main-content"></a>

			<?php print render($title_prefix); ?>

			<?php if ($title): ?>
				<h1 class="title" id="page-title"><?php print $title; ?></h1>
			<?php endif; ?>

			<?php print render($title_suffix); ?>

			<?php print render($page['content']); ?>

			<?php print render($page['content_bottom']); ?>

			<?php print $feed_icons; ?>
		</div><!-- /#content -->

		<?php
			// Render the sidebars to see if there's anything in them.
			$sidebar_first	= render($page['sidebar_first']);
			$sidebar_second = render($page['sidebar_second']);
		?>

		<?php if ($sidebar_first || $sidebar_second): ?>
			<aside class="sidebars">
				<a id="secondary-navigation"></a>
				<?php print $sidebar_first; ?>
				<?php print $sidebar_second; ?>
			</aside><!-- /.sidebars -->
		<?php endif; ?>

	</div><!-- /#main -->

	<?php print render($page['footer']); ?>

</div><!-- /#page -->

<?php print render($page['bottom']); ?>
