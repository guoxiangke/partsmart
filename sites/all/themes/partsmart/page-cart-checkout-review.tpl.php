<?php 
require 'header.php';
//require 'nav_checkout_review.php';
require 'nav.php';
?>
		<div class="navprod floatl">
			<div class="cart-step"><img src="<?php global $base_url; print $base_url.'/'.path_to_theme().'/images/cart-step-3.gif'; ?>" /></div>
			<div class="conout">
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
          <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
		  <div id="checkout-review">
          <?php print $content ?>
          </div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
<div id="container2"></div>
</div>
<!-- container end -->

<?php 
require 'footer.php';
?>
