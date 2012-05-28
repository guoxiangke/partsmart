<?php 
require 'header.php';
//require 'nav.php';
//require 'left.php';
?>

<div id="navs">
<?php
global $base_path;
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
		
		<div id="headlines_archive"><a href="<?php print url('news/archive'); ?>"></a></div>
		<div id="headlines_line"></div>
		<div id="headlines"><a href="<?php print url('news');?>"></a></div>
		</div>
	</div>
	
	<h2><?php print $category_name;?></h2>
	
	<div class="conout">
	
		<div style="margin:10px 270px; line-height:30px">
		<div style="color:#666; font-size:22px;"><?php print $node->title; ?></div>
		<div style="font-size:13px; color:#A29F9F; font-weight:bold;">
		<span style="color:#CCC">Posted:</span>
		<?php print format_date($node->created,'custom','F d, Y');?>
		</div>
		</div>
<!-- left -->
		
		<div class="gobimg floatl"><img id="bigimg" src="<?php print $base_path.$node->field_new_image[0]['filepath']; ?>" alt="" title="" />
		<?php 
		$little_img = '';
		foreach($node->field_new_image as $key => $value) {
			if($key == 0)
			$little_img .= '<li class="selected"><img src="'. $base_path.$value['filepath'] .'" alt="" title="" /></li>';
			else
			$little_img .= '<li><img src="'. $base_path.$value['filepath'] .'" alt="" title="" /></li>';
		}
		?>
			<div class="gobimgul">
				<ul>
					<?php print $little_img; ?>
				</ul>
			</div>
		</div>
		<div class="gobtext floatl">
			<div>
				<?php print $node->body; ?>
			</div>	
		</div>
		<!-- left end -->
		<!-- right -->
		<?php 
		$related_img = '';
		foreach($node->field_related_img as $key => $value) {
			$related_img .= '<li><div class="related-img"><a href="'.$value['data']['url'].'"><img src="'. $base_path.$value['filepath'] .'" alt="" title="" /></a></div><div class="related-title"><a href="'.$value['data']['url'].'">'.$value['data']['title'].'</a></div><div class="clear"></div></li>';
		}
		?>
		<div class="globalr floatl">
			<!-- got -->
			<div class="globt globtt">Corporate History</div>
			<!-- got end -->			
			<div class="goblii">
				<ul>
					<?php print $related_img; ?>
				</ul>
			</div>
		</div>
		<!-- right end -->

		
		<div class="clear"></div>
	</div>
</div>
<div id="container2"></div>
<!-- container end -->

<?php 
require 'footer.php';
?>
