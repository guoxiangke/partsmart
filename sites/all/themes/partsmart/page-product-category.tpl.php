<?php 
require 'header.php';
require 'nav.php';
require 'left-product-category.php';
?>
 
<div class="navprod floatl">
			 <div class="conout">
				<h5><?php print $title;?></h5>
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
  
          <?php if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
         <?php print $content;?>
			</div>
</div>


<!-- end navprod-->

		<div class="clear"></div>
	</div>
</div>
<div id="container2"></div>
<!-- container end -->

<?php 
require 'footer.php';
?>
