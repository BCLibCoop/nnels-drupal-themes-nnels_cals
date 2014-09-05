<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<?php
  global $user;
  $skip_links = array();
	$path = request_uri();
	$blocks = block_list('sidebar_first');
	$header = '<ul id="search-skip-link">
	<li><a href="#block-facetapi-m0xbt2plkszcq7ydu4whplcebcevnz1i">
		Filter by Availability</a>
	</li>
	<li><a href="#block-facetapi-gg3bl1hccorojvwrv0hdxs3gcnghgakm">
		Filter by creator</a>
	</li>
	<li><a href="#block-facetapi-2sjcr0oglhj79v3xreaxpenbxoy61l3b">
		Filter by genre</a>
	</li>
</ul>';
 
 	
	
	foreach(array_keys($blocks) as $name) {
		if(strpos($name, "facetapi_") !== FALSE) {
			$label = str_replace(":", "", $blocks[$name]->title);		
			//dpm($name);
			//dpm($blocks[$name]);
			$id = "block-" . strtolower(str_replace("_", "-", $name));
			//dpm($label . ": " . $id);
		  $skip_links[] = l($label, '', array('fragment' => $id, 'external' => TRUE)); 
		}
		
	}
	if(count($skip_links)) $header = theme_item_list(array('items' => $skip_links, 'title' => "", 'type' => "ul", 'attributes' => array('class' => 'search-skip-links element-invisible'))); 

  
?>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">

      <?php print $header; ?>
     </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>
