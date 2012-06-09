<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>" xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$( "div.dialogs" ).dialog({
				autoOpen: false,
				show: "blind",
				hide: "explode",
				width: 1200,
     			maxWidth: 1200

			});
			
			$( "div.news_img" ).click(function() {
				idd = $(this).attr('idd'); 
				$( '#dialogs-'+idd).dialog( "open" );
				$('#header').slideToggle();
				return false;
			});
		});
	</script>
</head>
<body class="<?php  print $body_classess;?>">
<!-- header -->
<div id="header">
	<!-- logo  -->
	<div class="logo"><a href="<?php print  base_path(); ?>"><img src="<?php print base_path() . path_to_theme() ?>/images/logo.png" alt="Partsmart" title="Partsmart" /></a></div>
	<div class="logolan"><a href="<?php print  base_path(); ?>">PARTSMART</a></div>
	<div class="linkn"><a href="#"><img src="<?php print base_path() . path_to_theme() ?>/images/link.png" alt="" title="" /></a></div>
	<!-- logo end -->
	<!-- contact -->
	<div class="contact"><span class="con"><a href="<?php print url('node/41')?>">Contact Us</a></span> <span class="langa"><a href="#">Languages</a></span> <span class="login">
	<?php if($user->uid==0) {
	?>
	<a href="<?php print url('user/login')?>">Sign in</a> | <a href="<?php print url('user/register')?>">Register</a>
	<?php }  else { ?>
	  <a href="<?php print url('user/logout')?>">Logout</a>
	<?php } ?>
	</span><a href="<?php print url('cart')?>">Cart</a></span></div>
	<!-- contact end -->
</div>
<!-- header end -->

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
			<div id="headlines">
				<a href="<?php print url('news'); ?>"></a>
			</div>
		</div>
	</div>
	<h2><?php print $category_name;?></h2>
	<div class="conout">

		<div>
			<div class="conout">
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
          <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
          <?php
		  global $base_url;
		  $output = '';
		  
		  $sql = "SELECT * FROM {node} WHERE type = '%s' AND status = 1 ORDER BY nid DESC";
		  $pager_num = 0;
		  $data = '';
  		  $result = pager_query($sql, 10, $pager_num, NULL, 'news');
		  $i=0;
		  while ($item = db_fetch_object($result)) {
		  	$node = node_load($item->nid);
			$data .= '<div class="news_item">';
			$data .= '<div class="news_title">'.$node->title.'</div>';
			$data .= '<div class="news_created"><span class="news_posted">Posted:</span>'. format_date($node->created,'custom','F d, Y').'</div>';
			$data .= '<div>';
			//<a id="single_image" href="image_big.jpg"><img src="image_small.jpg" alt=""/></a>
			$data .= '<div class="news_img" idd="'.++$i.'"><img src="'.url($node->field_new_image[0][filepath]).'"/></div>';
			$data .= '<div class="dialogs"id="dialogs-'.$i.'"  rel="'.$i.'"><img src="'.url($node->field_new_image[0][filepath]).'"/></div>';
			if (str_word_count($node->body) <= 60)
			$data .= '<div class="news_content">'.$node->body.'</div>';
			else 
			{
			$pattern = '/([\S]+?[ ]+){60}/';
			preg_match($pattern, $node->body, $out);
			$data .= '<div class="news_content">'.$out[0].'...'. l('Read More',$node->path) .'</div>';
			}
			$data .='<div class="clear"></div></div>';
			$data .='</div>';
			
		  }
		  $pager = theme('pager', array('<<','<','','>','>>'), 10, 0);
		  
		  global $pager_page_array;
		  
		  $node_count = db_result(db_query("SELECT COUNT(nid) FROM {node} WHERE type = '%s' AND status = 1",'news'));
		  
		  $count_first = $pager_page_array[0] * 10 + 1;
		  if (($pager_page_array[0] + 1) * 10 > $node_count) {
			$count_last = $node_count;
		  }
		  else {
			$count_last = $pager_page_array[0] * 10 + 10;
		  }

    	  $header = '<ul class="search_brand_header"><li class="count_list">Show '.$count_first.' - '.$count_last.' of '.$node_count.' results</li></ul>';

		  $output.='<div id="news_list">'. $header.$pager.$data .'</div>';
		  print $output;
		  ?>
          
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div id="container2"></div>
<!-- container end -->

<?php 
require 'footer.php';
?>
