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
	</div>
	<!-- /#navigation -->

	<div id="main">

		<div id="search">
			<nav id="search-navigation" role="navigation">
				<?php print $messages; ?>
				<?php print render($page['admin_nav']); ?>
				<?php print render($page['search']); ?>
			</nav>
		</div>
		<!-- /#search -->

		<div id="content" class="column" role="main">

			<?php print render($tabs); ?>

			<?php if ($action_links): ?>
				<ul class="action-links">
					<?php print render($action_links); ?>
				</ul>
			<?php endif; ?>

			<?php print render($page['help']); ?>

			<?php print render($page['highlighted']); ?>

			<a id="main-content"></a>

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
