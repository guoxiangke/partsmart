<?php
// $Id: search-result.tpl.php,v 1.1.2.1 2008/08/28 08:21:44 dries Exp $

/**
 * @file search-result.tpl.php
 * Default theme implementation for displaying a single search result.
 *
 * This template renders a single search result and is collected into
 * search-results.tpl.php. This and the parent template are
 * dependent to one another sharing the markup for definition lists.
 *
 * Available variables:
 * - $url: URL of the result.
 * - $title: Title of the result.
 * - $snippet: A small preview of the result. Does not apply to user searches.
 * - $info: String of all the meta information ready for print. Does not apply
 *   to user searches.
 * - $info_split: Contains same data as $info, split into a keyed array.
 * - $type: The type of search, e.g., "node" or "user".
 *
 * Default keys within $info_split:
 * - $info_split['type']: Node type.
 * - $info_split['user']: Author of the node linked to users profile. Depends
 *   on permission.
 * - $info_split['date']: Last update of the node. Short formatted.
 * - $info_split['comment']: Number of comments output as "% comments", %
 *   being the count. Depends on comment.module.
 * - $info_split['upload']: Number of attachments output as "% attachments", %
 *   being the count. Depends on upload.module.
 *
 * Since $info_split is keyed, a direct print of the item is possible.
 * This array does not apply to user searches so it is recommended to check
 * for their existance before printing. The default keys of 'type', 'user' and
 * 'date' always exist for node searches. Modules may provide other data.
 *
 *   <?php if (isset($info_split['comment'])) : ?>
 *     <span class="info-comment">
 *       <?php print $info_split['comment']; ?>
 *     </span>
 *   <?php endif; ?>
 *
 * To check for all available data within $info_split, use the code below.
 *
 *   <?php print '<pre>'. check_plain(print_r($info_split, 1)) .'</pre>'; ?>
 *
 * @see template_preprocess_search_result()
 */
?>

<li class="search_top_list first">
<div class="grid_1">
	<a href="/partsmartfile/part/gd-e250-ent">
	<img alt="" src="http://ziyodesign.com/partsmartfile/sites/default/files/imagecache/s90x93/GD-E250-ENT.jpg"></a>
</div>
<div class="grid_2">
<ul>
<li class="list_name">
<a href="/partsmartfile/taxonomy/term/"></a>
</li>
<li class="list_body">Entrance Guide</li>
<li class="oen_pn"><span>OEN PN</span>xyz-hppt-001</li>
<li class="ps_pn"><span>Partsmart PN</span><?php print $title; ?></li>
</ul>
</div>
<div class="grid_3">
<ul><li class="unitprice">$ 0.00</li>
<li class="addtocart">
<a href="/partsmartfile/ps/addtocart/48">Add to cart</a>
</li>
<li class="viewdetails">
<a href="/partsmartfile/part/gd-e250-ent">View Details</a></li></ul></div><div class="clear"></div></li>
