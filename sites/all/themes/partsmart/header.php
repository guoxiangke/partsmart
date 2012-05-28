<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>" xmlns:fb="http://www.facebook.com/2008/fbml">
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
	<div class="logo"><a href="<?php print base_path(); ?>"><img src="<?php print base_path() . path_to_theme() ?>/images/logo.jpg" alt="Partsmart" title="Partsmart" /></a></div>
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
	</span><a href="<?php print url('cart')?>">Cart</a></span></div>
	<!-- contact end -->
</div>
<!-- header end -->