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
  print '<div id="select_brand_list"><ul class="search_brand_header"><li class="count_list">Show '.$from.' - '.$to.' of '.format_plural($pager_total_items[0], '1 result', '@count results').'</li>';
  print '<li class="view_list">View <select onchange="window.location.href=this.options[this.selectedIndex].value" id="pagview"><option value="/partsmartfile/manufacturer/parts/2/5/233?view=1&amp;bid=&amp;orderby=&amp;page="> Icon </option><option value="/partsmartfile/manufacturer/parts/2/5/233?view=2&amp;bid=&amp;orderby=&amp;page="> List </option></select></li>';
  print '<li class="sortby_list">Sortby<select onchange="window.location.href=this.options[this.selectedIndex].value" id="pagsortby"><option value="/partsmartfile/manufacturer/parts/2/5/233?orderby=1&amp;bid=&amp;page="> Best Results </option><option value="/partsmartfile/manufacturer/parts/2/5/233?orderby=2&amp;bid=&amp;page="> By Release Date </option><option value="/partsmartfile/manufacturer/parts/2/5/233?orderby=3&amp;bid=&amp;page="> By Price Range Low to High</option><option value="/partsmartfile/manufacturer/parts/2/5/233?orderby=4&amp;bid=&amp;page=">By Price Range High to Low</option></select></li></ul><div class="item-list"></div></div>';
  
}
?>

<div class="item-list <?php print $type; ?>-results">
<ul>
<?php print $search_parts_results; ?>
</ul>
<?php print $pager; ?>
</div>


