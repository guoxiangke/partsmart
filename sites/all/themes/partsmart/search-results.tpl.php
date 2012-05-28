<?php
// $Id: search-results.tpl.php,v 1.1 2007/10/31 18:06:38 dries Exp $

/**
 * @file search-results.tpl.php
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependant to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $type: The type of search, e.g., "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 */
?>
<?php
global $pager_page_array, $pager_total, $pager_total_items;


if ($pager_total_items <> 0){
  $results_per_page=10;
  $from = 1+(($pager_page_array[0])*$results_per_page);
  if ( ($pager_page_array[0]+1) == $pager_total[0]){
    // we are on the last page
    $to =   $pager_total_items[0];  
  }
  else {
    $to = 1+(($pager_page_array[0])*$results_per_page)+$results_per_page-1;
  }
  print "Displaying $from - $to of ".format_plural($pager_total_items[0], '1 result', '@count results'); 
}
?>

<dl class="search-results <?php print $type; ?>-results">
  <?php print $search_results; ?>
</dl>
<?php print $pager; ?>
