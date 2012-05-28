<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>" xmlns:fb="http://www.facebook.com/2008/fbml"
>
  <head>
    <?php print $head ?>
		<link rel="shortcut icon" href="<?php print base_path() . path_to_theme() ?>/images/favicon.ico" type="image/x-icon" />
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
		
    <?php print $scripts ?>
 
</head>
<body class="<?php  print $body_classess;?>">
<!-- header -->
<div id="header">
	<!-- logo  -->
	<div class="logo"><a href="<?php print  base_path(); ?>"><img src="<?php print base_path() . path_to_theme() ?>/images/logo.jpg" alt="Partsmart" title="Partsmart" /></a></div>
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
			<p class="floatl">Share</p>
			<p class="floatl linkcp" style="line-height:0;"><a href="#"><img src="<?php print base_path() . path_to_theme(); ?>/images/twitterr.png" alt="Partsmart" title="Partsmart" /></a><a href="#"><img src="<?php print base_path() . path_to_theme() ?>/images/fabook.png" alt="Partsmart" title="Partsmart" /></a></p>
		</div>
	</div>
	<h2><?php print $category_name;?></h2>
	<div class="conout">

		<div class="navprod floatl">
			<div class="cart-step"><img src="<?php global $base_url; print $base_url.'/'.path_to_theme().'/images/cart-step-1.gif'; ?>" /></div>
			<div class="conout">
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
          <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
          <?php print $content ?>
          
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
