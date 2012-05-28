
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
		<?php 
			if(isset($_SESSION['pscart_checkout_step1']) && $_SESSION['pscart_checkout_step1']) {
				unset($_SESSION['pscart_checkout_step1']);
				print '<p class="floatl"><img src="'.path_to_theme().'/images/checkout_step1.png"/></p>';
			}
		?>
			<p class="floatl">Share</p>
			<p class="floatl linkcp" style="line-height:0;"><a href="#"><img src="<?php print base_path() . path_to_theme(); ?>/images/twitterr.png" alt="Partsmart" title="Partsmart" /></a><a href="#"><img src="<?php print base_path() . path_to_theme() ?>/images/fabook.png" alt="Partsmart" title="Partsmart" /></a></p>
		</div>
	</div>
	<h2><?php print $category_name;?></h2>
	<div class="conout">