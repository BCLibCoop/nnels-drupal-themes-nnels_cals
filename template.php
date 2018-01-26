<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * A QUICK OVERVIEW OF DRUPAL THEMING
 *
 *   The default HTML for all of Drupal's markup is specified by its modules.
 *   For example, the comment.module provides the default HTML markup and CSS
 *   styling that is wrapped around each comment. Fortunately, each piece of
 *   markup can optionally be overridden by the theme.
 *
 *   Drupal deals with each chunk of content using a "theme hook". The raw
 *   content is placed in PHP variables and passed through the theme hook, which
 *   can either be a template file (which you should already be familiary with)
 *   or a theme function. For example, the "comment" theme hook is implemented
 *   with a comment.tpl.php template file, but the "breadcrumb" theme hooks is
 *   implemented with a theme_breadcrumb() theme function. Regardless if the
 *   theme hook uses a template file or theme function, the template or function
 *   does the same kind of work; it takes the PHP variables passed to it and
 *   wraps the raw content with the desired HTML markup.
 *
 *   Most theme hooks are implemented with template files. Theme hooks that use
 *   theme functions do so for performance reasons - theme_field() is faster
 *   than a field.tpl.php - or for legacy reasons - theme_breadcrumb() has "been
 *   that way forever."
 *
 *   The variables used by theme functions or template files come from a handful
 *   of sources:
 *   - the contents of other theme hooks that have already been rendered into
 *     HTML. For example, the HTML from theme_breadcrumb() is put into the
 *     $breadcrumb variable of the page.tpl.php template file.
 *   - raw data provided directly by a module (often pulled from a database)
 *   - a "render element" provided directly by a module. A render element is a
 *     nested PHP array which contains both content and meta data with hints on
 *     how the content should be rendered. If a variable in a template file is a
 *     render element, it needs to be rendered with the render() function and
 *     then printed using:
 *       <?php print render($variable); ?>
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. With this file you can do three things:
 *   - Modify any theme hooks variables or add your own variables, using
 *     preprocess or process functions.
 *   - Override any theme function. That is, replace a module's default theme
 *     function with one you write.
 *   - Call hook_*_alter() functions which allow you to alter various parts of
 *     Drupal's internals, including the render elements in forms. The most
 *     useful of which include hook_form_alter(), hook_form_FORM_ID_alter(),
 *     and hook_page_alter(). See api.drupal.org for more information about
 *     _alter functions.
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   If a theme hook uses a theme function, Drupal will use the default theme
 *   function unless your theme overrides it. To override a theme function, you
 *   have to first find the theme function that generates the output. (The
 *   api.drupal.org website is a good place to find which file contains which
 *   function.) Then you can copy the original function in its entirety and
 *   paste it in this template.php file, changing the prefix from theme_ to
 *   NNELS_CALS_v001_. For example:
 *
 *     original, found in modules/field/field.module: theme_field()
 *     theme override, found in template.php: NNELS_CALS_v001_field()
 *
 *   where NNELS_CALS_v001 is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_field() function.
 *
 *   Note that base themes can also override theme functions. And those
 *   overrides will be used by sub-themes unless the sub-theme chooses to
 *   override again.
 *
 *   Zen core only overrides one theme function. If you wish to override it, you
 *   should first look at how Zen core implements this function:
 *     theme_breadcrumbs()      in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called theme hook suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node--forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and theme hook suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440 and http://drupal.org/node/1089656
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function NNELS_CALS_v001_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  NNELS_CALS_v001_preprocess_html($variables, $hook);
  NNELS_CALS_v001_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function NNELS_CALS_v001_preprocess_html(&$variables, $hook) {
  //$variables['sample_variable'] = t('Lorem ipsum.');
  //drupal_add_css("rubik-overrides.css")
  	//drupal_add_css(path_to_theme() . '/css/rubik-overrides.css');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function */
function NNELS_CALS_v001_preprocess_page(&$variables, $hook) {
  //$variables['sample_variable'] = t('Lorem ipsum.');
  switch($_SERVER['HTTP_HOST']) {
    case "dev.nnels.ca":
    	global $language;
    	//dpm($language->name);
    	drupal_set_message(t("NB: DEVEL server!"), "error");
    	drupal_add_css(drupal_get_path('theme', 'NNELS_CALS_v001') . '/css/dev-overrides.css', array('group' => CSS_THEME, 'type' => 'file'));
    	if(isset($_SESSION['calsauthen_target_driver']) ) {
	  		dpm("driver: " .$_SESSION['calsauthen_target_driver']);
	  		dpm("org: " . $_SESSION['calsauthen_target_organization']);
  		}
    	break;

    case "staging.nnels.ca":
    	drupal_set_message(t("NB: STAGING server!"), "error");
    	drupal_add_css(drupal_get_path('theme', 'NNELS_CALS_v001') . '/css/staging-overrides.css', array('group' => CSS_THEME, 'type' => 'file'));
    	break;

  }
  //if($_SERVER['HTTP_HOST'] == 'http://dev.nnels.ca') drupal_set_title("DEV SERVER");
	drupal_add_css(drupal_get_path('theme', 'NNELS_CALS_v001') . '/css/externalsearch.css', array('group' => CSS_THEME, 'type' => 'file'));

  //Create custom Piwik event with user's organization and bind to download links to track downloads per org
	global $user;
	$token = "[current-user:field_organization]";
        $org = token_replace($token, array('user' => $user));
	$bclc = "BC Libraries Cooperative";
        if (strcmp($org, $token) == 0) {
        	$org = "No organization";
        }
	if (!(strcmp($org, $bclc)) == 0) {
       	 drupal_add_js('(function($) {$(document).ready(function() {$(".views-field-field-s3-file-upload span a").click(function() {_paq.push(["trackEvent", "Download", "S3", "'.$org.'"]);});});}(jQuery));', 'inline');
	}
}

function NNELS_CALS_v001_preprocess_block(&$vars) {

  if($vars['block']->module == 'facetapi') {

    $vars['theme_hook_suggestions'][] = 'block__facetapi_skiplinks';
	  //dpm($vars);
  }

  if ($vars['block_html_id'] == 'block-views-exp-repository-search-page') {
    drupal_add_js(
                'Drupal.behaviors.nnelsSearchWithinSearch = {
                        attach: function (context, settings) {
                                if (Drupal.ajax_facets) {
                                        Drupal.ajax_facets.force_update_results = true;
                                        jQuery("input#edit-submit-repository-search").click(function () {
                                                Drupal.ajax_facets.sendAjaxQuery({
                                                        pushStateNeeded: true,
                                                        searchResultsNeeded: true
                                                });
                                        });
                                }
                        }
                };',
                array(
                        'type' => 'inline',
                        'scope' => 'footer'
                ));
    drupal_add_js(
                'Drupal.behaviors.nnelsSearchResultsPlurals = {
                        attach: function (context, settings) {
                                count = jQuery(".search-results .views-row .view-content").length;
                                if (count > 1) {
                                        jQuery("#search-view-total-count").addClass("plural");
                                }
                        }
                };',
                array(
                        'type' => 'inline',
                        'scope' => 'footer'
                ));

  }

  if ($vars['block_html_id'] == 'block-views-repository-items-front-page-bra' || $vars['block_html_id'] == 'block-views-repository-items-front-page-bmd') {
    drupal_add_js(drupal_get_path('theme', 'NNELS_CALS_v001') . '/js/uniform_height.js');
  }
}


// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function */
function NNELS_CALS_v001_preprocess_node(&$variables, $hook) {
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }

}
/**
 * Override or insert variables into the item repository templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function NNELS_CALS_v001_preprocess_node_repository_item(&$variables, $hook) {
	global $user;
	$nid = $variables['nid'];
  //roles that are allowed to edit / update S3 files. Probably want to update this to a permission
  $roles_allowed = array('site editor', 'site manager', 'contributor', 'administrator');
  $display_check = array_intersect($roles_allowed, $user->roles);
  $node = node_load($nid);
  //see also the templates/views-view-field--field-s3-file-upload.tpl.php
  if ($display_check || user_access('bypass node access') ) {
	  $variables['view_download_files'] =
	    views_embed_view("field_collection_view_repo_files", "embed_4", $nid) .
	    views_embed_view("field_collection_view_commercially_available", "embed_4", $nid) .
	    views_embed_view("repository_item_detail_page_embedded", "embed_1", $nid) .
	    views_embed_view("repository_item_detail_page_embedded", "embed_4", $nid) ;
  }
  else {
	  $variables['view_download_files'] =
	    views_embed_view("field_collection_view_repo_files", "embed_5", $nid) .
	    views_embed_view("field_collection_view_commercially_available", "embed_5", $nid) .
	    views_embed_view("repository_item_detail_page_embedded", "embed_1", $nid) .
	    views_embed_view("repository_item_detail_page_embedded", "embed_4", $nid) ;
  }
  //Flag icon markup
  if ( $user->uid) {
	$variables['flag_icon'] = '<div class="bookshelf-add-wrapper">' .
                            '<i class="fa fa-bookmark-o flag-bookmark-icon" aria-hidden="true"></i>' .
			    flag_create_link('bookshelf', $nid) .
			    '</div>';
  }
}

// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function NNELS_CALS_v001_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function NNELS_CALS_v001_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function NNELS_CALS_v001_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

/**
 * Theme the loggedinblock that shows for logged-in users.
 */
function NNELS_CALS_v001_lt_loggedinblock($variables){
  return theme('username', array('account' => $variables['account'])) .'  '. l(t('Log Out'), 'user/logout');
}
