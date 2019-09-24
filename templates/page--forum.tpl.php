<?php
/** page--forum.tpl.php **/
?>
<!--
<h1>FORUM PAGES</h1>
 -->
<div id="page">
	<header id="header">
    <?php print render($page['utility']); ?>
		<?php print render($page['header']); ?>
    <div id="search">
      <nav id="search-navigation" role="navigation">
        <?php print render($page['search']); ?>
      </nav>
    </div><!-- /#search -->
	</header>

	<div id="navigation">
		<nav id="main-navigation" role="navigation">
			<?php print render($page['navigation']); ?>
		</nav>
	</div><!-- /#navigation -->

	<div id="main">
		<div id="content" class="column" role="main">

			<?php print $breadcrumb; ?>

			<?php print render($tabs); ?>

			<?php print $messages; ?>

			<?php print render($page['help']); ?>

			<?php print render($page['highlighted']); ?>

			<a id="main-content"></a>

			<?php print render($title_prefix); ?>

			<?php if ($title): ?>
				<h1 class="title" id="page-title"><?php print $title; ?></h1>
			<?php endif; ?>

			<?php print render($title_suffix); ?>

			<?php if ($action_links): ?>
				<ul class="action-links">
					<?php print render($action_links); ?>
				</ul>
			<?php endif; ?>

			<?php print render($page['content']); ?>

			<?php print render($page['content_bottom']); ?>

		</div><!-- /#content -->

		<?php
			// Render the sidebars to see if there's anything in them.
			$sidebar_first	= render($page['sidebar_first']);
			$sidebar_second = render($page['sidebar_second']);
		?>

		<?php if ($sidebar_first || $sidebar_second): ?>
			<aside class="sidebars">
				<?php if ( !(count(block_list('sidebar_first')) == 1 && array_keys(block_list('sidebar_first'))[0] == "block_14")): ?>
					<!--Generate skip link if there is a navigation menu in sidebar_first, i.e. not just "block_14" (spacer)-->
					<a id="secondary-navigation" class="element-invisible">Sidebar menu</a>
				<?php endif; ?>
				<?php print $sidebar_first; ?>
				<?php print $sidebar_second; ?>
			</aside><!-- /.sidebars -->
		<?php endif; ?>

	</div><!-- /#main -->

	<?php print render($page['footer']); ?>

</div><!-- /#page -->

<?php print render($page['bottom']); ?>
