<?php 
require 'header.php';
require 'nav.php';
require 'left.php';


?>
		<div class="navprod floatl">
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
<div id="container2"><div id="loading"><img src="<?php print $base_path ?>sites/all/themes/partsmart/images/loading.gif" /></div></div>
<!-- container end -->

<?php 
require 'footer.php';
?>
