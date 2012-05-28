<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>Partsmart</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Partsmart" />
<meta name="description" content="Partsmart" />

<link rel="shortcut icon" href="<?php print base_path() . path_to_theme() ?>/images/favicon.ico" type="image/x-icon" />
 <?php print $styles ?>

 <link type="text/css" rel="stylesheet" media="all" href="<?php print base_path() . path_to_theme() ?>/css/indexhome.css" />

 <?php print $scripts ?>
</head>

<body id="bodybg" class="home">
<!-- header -->
<div id="header">
	<!-- logo  -->
	<div id="indexlogo" class="logo"><a href="<?php print  base_path(); ?>" alt="Partsmart" title="Partsmart" ></a></div>
	<div class="logolan"><a href="<?php print  base_path(); ?>">PARTSMART</a></div>
	<div class="linkn"><a href="#"><img src="<?php print base_path() . path_to_theme() ?>/images/link.png" alt="" title="" /></a></div>
	<!-- logo end -->
	<!-- contact -->
	<div class="contact"><span class="con"><a href="<?php print url('node/41')?>">Contact Us</a></span> <span class="langa"><a href="#">Languages</a></span> <span class="login">
	<?php if($user->uid==0) {
	?>
	<a href="<?php print url('user/login')?>">Sign in</a> | <a href="<?php print url('user/register')?>">Register</a>
	<?php }  else { ?>
	  <a href="<?php print url('logout')?>">Logout</a>
	<?php } ?>
	</span><a href="<?php print url('cart')?>"></a></div>
	<!-- contact end -->
</div>
<!-- header end -->
<!-- banner -->
<div class="nabanner">
<?php
 $slide_block = module_invoke('slideshow','block','view',0); 
 
 print $slide_block['content']; 
?>
</div>
<!-- banner end -->
<!-- nav -->
<div id="navv">
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
<!-- indexcon -->
<div class="indexcon">
	<div class="conout">
		<!-- search -->

		<div class="paesearw floatl">
			<div class="paesear paesearp"> <em>Parts Search</em>
		
				<div id="select-partstype" class="form-item filter-select">
					<select><option value="0">Select A Product</option><option value="2">Printer</option><option value="5">Copier</option><option value="7">Catridge</option></select>
				</div>
				<div id="select-partsbrand" class="form-item filter-select">
					<select><option value="0">Select A Brand</option></select>
				</div>
				<div id="select-partsmodel" class="form-item filter-select">
					<select><option value="0">Select A Model</option></select>
				</div>
				<div id="select-sumbit" class="form-item">
					<input class="form-submit" type="button" value="Search" />
				</div>
			</div>
			<div class="mainlink">
			<input name="keys" type="text" title="Enter a part number" id="enter-part-number" class="search-textbox" autocomplete="off"/>
			<input type="submit" name="" id="parts-search-button" value="submit" class="search-button" />
			</div>
		</div>
		<!-- search end -->
		<div class="cenbg floatl">
		<p class="newst">New Products</p>
					<div id="slider-code">
						<a class="buttons prev" href="#">left</a>
						<div class="viewport">
						<ul class="overview">
							<?php
								$output = '';
								$sql = 'SELECT * FROM {node} WHERE type = "%s" OR type = "%s" OR type = "%s" LIMIT 12';
								$result = db_query($sql,'printer','copier','cartridge');
								
								while($item = db_fetch_object($result)){
									$parts_node = node_load($item->nid);
									
									$brand= array();
                  foreach($parts_node->taxonomy as $k =>$value){
										if($value->vid == 2  || $value->vid == 5 || $value->vid == 7){
											foreach(taxonomy_get_parents($value->tid) as $m => $maker) {
												if(!array_key_exists($maker->tid,$brand))
													$brand[$maker->tid]=$maker->name;
											}
										}
                  }
                  $brand_html = implode(',',$brand);
									
									unset($cate_link);
						 			foreach($parts_node->taxonomy as $term) {
							  		if($term->vid == 3 || $term->vid == 4 || $term->vid == 6 ) {
											$has_parent = taxonomy_get_parents($term->tid);
												if($has_parent) {
										  		$parent = $has_parent[key($has_parent)];
									  			$cate_link[] =  t($parent->name);
												}
						     		} 
						 			}
									$category_html = implode(',',array_merge($cate_link));
									
									if(file_exists('sites/default/files/product/' . $parts_node->title .'.jpg')) {
									$imgs = '<img src="'. imagecache_create_url("s80x80", 'sites/default/files/product/' . $parts_node->title .'.jpg'). '" alt="" />';
									$output .='<li><div><a href="' . url('node/' . $parts_node->nid) . '">'.$imgs.'</a><div class="newparts-title"><a href="'.url('node/' . $parts_node->nid).'">'.$parts_node->title.'</a></div><p class="newparts-desc">'.$category_html.'</p><p class="newparts-desc">'.$brand_html.'</p></div></li>' ;
								} 
								}
							print $output;
						?>
						</ul>
						</div>
						<a class="buttons next" href="#">right</a>
					</div>
					
		</div>
		<div class="indextex floatr">
		 <?php $rnode = node_load(94);?>
			<div class="indextexi"><img src="<?php print $rnode->field_page_image[0]['filepath'] ?>" alt="" title="" /><span><?php print l($rnode->title,'node/'.$rnode->nid);?></span></div>
			 <p><?php print l($rnode->body,'node/'.$rnode->nid);?></p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="conout neww">
		<!-- search -->
		<div class="newww floatl">
			<li>
				<p class="newst">What’s New</p>
				<p class="newstp">Hot off the press news about partsmart</p>
				<p class="blue"><a href="<?php print url('news')?>">View More  >></a></p>
			</li>
			<?php $sql = "SELECT nid FROM {node} WHERE  type = 'news' AND  status = 1 AND  promote = 1 ORDER BY nid desc limit 3";
			 $result = db_query($sql);
			 while($itemnews = db_fetch_object($result)) {
				 $news = node_load($itemnews->nid);
			   $file = imagecache_create_url("s83x56", $news->field_new_image[0]['filepath']);
				 ?>
				 <li>
				<Div class="newimg"><a href="<?php print url('node/'.$news->nid);?>"><img src="<?php print $file; ?>" alt="" title="" /></a></Div>
				<a href="<?php print url('node/'.$news->nid);?>" > <?php print $news->title;?> </a> </li>
				 <?php
			 }
			?>
 
		</div>
		<!-- search end -->
		<!-- huann -->
		<div id="index-splash-block" class="index-splash-block floatr">
			<div id="feature-slide-block" class="feature-slide-block">

  			<?php $sql = "SELECT nid FROM {node} WHERE  type = 'technology' AND  status = 1 AND  promote = 1 ORDER BY nid desc limit 3";
			 $result = db_query($sql);
			 while($item_tp = db_fetch_object($result)) {
				 $tp = node_load($item_tp->nid);
			   $tpfile = imagecache_create_url("s85x57", $tp->field_tp_image[0]['filepath']);
					 
				 ?>
					<div class="feature-slide-preview" style="display:none; ">
					<p class="luntext"><a href="<?php print $tp->field_tp_link['0']['value'];?>" > <?php print $tp->title;?></a></p>
					<p><a href="<?php print $tp->field_tp_link['0']['value'] ?> "> <img src="<?php print $tpfile; ?>" alt="" title="" class="floatr luntextimg" /><?php print drupal_substr(strip_tags($tp->field_tp_summary[0]['value']),0,240); ?></a></p>
				</div>
				 <?php
			 }
			?>
	
	 
				<div id="feature-slide-list" class="feature-slide-list"> <a href="#" id="feature-slide-list-previous" class="feature-slide-list-previous"></a>
					<div id="feature-slide-list-items" class="feature-slide-list-items"> </div>
					<a href="#" id="feature-slide-list-next" class="feature-slide-list-next"></a> </div>
			</div>
			<script type="text/javascript">
		initFeatureSlide();
	</script>
		</div>
		<!-- huann end -->
		<div class="clear"></div>
	</div>
</div>
<!-- indexcon end -->
 
<?php 
require 'footer.php';
?>

<!-- footer end -->

<?php print $closure;?>
</body>
</html>
