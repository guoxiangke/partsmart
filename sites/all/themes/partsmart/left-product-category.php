		<div class="navlist floatl">

	  <?php  if($left_partscategory) { ?>
			<div class="<?php print $left_class?>">
				<h6><strong><?php print $left_partcategory_title;?> </strong></h6>
				<?php print $left_partscategory;?>
			</div>
	  <?php } ?>

		 <?php  if($left_manufacturers) { ?>
			<div class="mainnav">
				<h6><strong><?php if(!empty($left_manufacturers_title)){ print $left_manufacturers_title; } else { print '&gt;'.t('Browse by Manufacturer');}?> </strong></h6>
				<?php print $left_manufacturers;?>
			</div>
	  <?php } ?>

	  <?php  if($left_manufacturers2) { ?>
			<div class="<?php print $left_class2?>">
				<h6><strong><?php print t('SELECT A BRAND ');?> </strong></h6>
				<?php print $left_manufacturers2;?>
			</div>
	  <?php } ?>

		</div>