<?php 
require 'header.php';
//require 'nav.php';
//require 'left.php';
?>

<div id="navs">
<?php
$menu_name = variable_get('menu_primary_links_source', 'primary-links');
print menu_tree($menu_name);
?>
	<!-- search -->
	<div class="search">
		<input name="keys" type="text"    title="SEARCH..." class="search-textbox" id="search-keyword" />
		<input type="submit" name="" id="navsearch-button" class="search-button" />
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
			
			<a class="news-archive" href="<?php print url('news/archive');?>"></a>
			
		</div>
		
	</div>
	<div class="conout">
	
	<!-- left -->
		<div class="newslist floatl">
			<div class="profilet">
				<h2><?php print $category_name;?></h2>
			</div>
		</div>
		<!-- left end -->
		<!-- right -->
		<?php
		$sql = "SELECT * FROM {node} WHERE type = '%s' AND status = 1 ORDER BY created DESC";
		$result = db_query($sql,'news'); 
		$item = db_fetch_object($result);
		$nodes = node_load($item->nid);
		?>
		<div id = "news-headline" class="newslist floatl"><a href="<?php print url('node/'.$nodes->nid); ?>"><img src="<?php print $nodes->field_new_image[0]['filepath'];?>" alt="" title="" /></a><a href="<?php print url('node/'.$nodes->nid); ?>"><?php print $nodes->title;?></a></div>
		<!-- right end -->
		<div class="clear"></div>
	</div>
	<!-- cont -->
	<?php
		$sql = "SELECT * FROM {node} WHERE type = '%s' AND status = 1 ORDER BY created DESC";
		$result = db_query_range($sql, 'news', 1, 6);
		$proimg = '';
		$i =1;
		while($item = db_fetch_object($result)) {
		$nodes = node_load($item->nid);
		$proimg .= '<li class="item-'.$i.'"><a href="'.url('node/'.$nodes->nid).'"><img src="'. $nodes->field_new_image[0]['filepath'] .'" alt="" tilte="" /></a></li>';
		$proti .= '<li class="item-'.$i.'"><a href="'.url('node/'.$nodes->nid).'">'.$nodes->title.'</a></li>';
		$i++;
		}
		?>
	<div class="conout proborder">
		<!-- left -->
		<div class="newslist floatl">
			<ul class="proimgli">
				<?php print $proimg; ?>
			</ul>
		</div>
		<!-- left end -->
		<!-- right -->
		<div class="newslist floatl">
			<ul class="proimglii">
				<?php print $proti;?>
			</ul>
		</div>
		<!-- right end -->	
		
		
		<div class="clear"></div>
		
		
	</div>
	<div class="archive">
		<a class="news-archive" href="<?php print url('news/archive');?>"></a>
	</div>
</div>
<div id="container2"></div>
<!-- container end -->

<?php 
require 'footer.php';
?>
