<?php
/** page.tpl.php **/
?>

<div id="page">
	<header id="header">
    <?php print render($page['utility']); ?>
		<?php print render($page['header']); ?>

    <div id="search">
      <nav id="search-navigation" role="navigation">
        <?php print render($page['search']); ?>
      </nav>
    </div>
    <!-- /#search -->
	</header>

	<div id="navigation">
		<?php print render($page['navigation']); ?>
	</div>
	<!-- /#navigation -->

	<div id="main" role="main">
		<a id="main-content" class="element-invisible">Main content</a>

		<?php print render($page['admin_nav']); ?>
		<?php print $messages; ?>

		<?php if ($page['front_side']): ?>
		<div id="front-side-content">
			<?php print render($page['front_side']); ?>
		</div>
		<?php endif; ?>

		<div id="content" class="column">

			<?php print render($tabs); ?>

			<?php if ($action_links): ?>
				<ul class="action-links">
					<?php print render($action_links); ?>
				</ul>
			<?php endif; ?>

			<?php print render($page['help']); ?>

			<?php print render($page['highlighted']); ?>

			<?php if ($title): ?>
				<h1 class="title" id="page-title"><?php print $title; ?></h1>
			<?php endif; ?>

			<?php print render($page['content']); ?>

			<?php print render($page['content_bottom']); ?>

		</div><!-- /#content -->

		<div id="front-main-views">
			<?php print render($page['front_bottom']); ?>
		</div>

	</div><!-- /#main -->

	<?php print render($page['footer']); ?>

</div><!-- /#page -->

<?php print render($page['bottom']); ?>
