
<div id="navs">
<?php
$menu_name = variable_get('menu_primary_links_source', 'primary-links');
print menu_tree($menu_name);
?>
	<!-- search -->
	<div class="search searchh">
<form action="<?php print base_path()?>search/node" accept-charset="UTF-8" method="post" id="search-form" class="search-form "  >
		<input name="keys" type="text"    title="SEARCH..." class="searchin tagged" id="search-keyword" />
		<input type="submit" name="button" id="button" value="" class="seargo" />

		</form>
	</div>
	<!-- search end -->
</div>
<!-- nav end -->

<!-- container -->
<div id="container">
	<h1><span> <?php print $breadcrumb; ?></span></h1>
	<div class="linkc">
		
		
		<div class="linkcc floatr">
		<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4fc7b3ce3f96809f"></script>
<!-- AddThis Button END -->
		</div>
	</div>
	<h2><?php print $category_name;?></h2>
	<div class="conout">