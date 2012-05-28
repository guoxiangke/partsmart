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
					 <div class="navpimg floatl" id="slidesContainer">
					  <div class="slide"><img src="<?php print base_path() . path_to_theme() ?>/images/lunzi.jpg" alt=""></div>
					  <div class="slide"><img src="<?php print base_path() . path_to_theme() ?>/images/lunzi.jpg" alt=""></div>
					  <div class="slide"><img src="<?php print base_path() . path_to_theme() ?>/images/lunzi.jpg" alt=""></div>
					  <div class="slide"><img src="<?php print base_path() . path_to_theme() ?>/images/lunzi.jpg" alt=""></div>
					  <div class="slide"><img src="<?php print base_path() . path_to_theme() ?>/images/lunzi.jpg" alt=""></div>
					  <div class="slide"><img src="<?php print base_path() . path_to_theme() ?>/images/lunzi.jpg" alt=""></div>
					  <div class="slide"><img src="<?php print base_path() . path_to_theme() ?>/images/lunzi.jpg" alt=""></div>
					  <div class="slide"><img src="<?php print base_path() . path_to_theme() ?>/images/lunzi.jpg" alt=""></div>
					 
					 </div>
							<div class="navlit floatr" id="page-partscategory-slide">
	        <img src="<?php print base_path() . path_to_theme() ?>/images/upx.png" alt="" class="control" id="leftControl"></a>
								<ul id="clickSlidesContainer">
								 
									<li class="hoverslide"><a href="#" class="navhover"><img src="<?php print base_path() . path_to_theme() ?>/images/quann.png" alt="" >
										<p>Delivery Roller, 2<br>
											Rollers</p>
										</a></li>
									<li class="hoverslide"><a href="#"><img src="<?php print base_path() . path_to_theme() ?>/images/quann.png" alt="">
										<p>Delivery Roller, 2<br>
											Rollers</p>
										</a></li>
									<li class="hoverslide"><a href="#"><img src="<?php print base_path() . path_to_theme() ?>/images/quann.png" alt="">
										<p>Delivery Roller, 2<br>
											Rollers</p>
										</a></li>
									 <li class="hoverslide"><a href="#"><img src="<?php print base_path() . path_to_theme() ?>/images/quann.png" alt="">
										<p>Delivery Roller, 2<br>
											Rollers</p>
										</a></li>
			 
									 						<li class="hoverslide"><a href="#" class="navhover"><img src="<?php print base_path() . path_to_theme() ?>/images/quann.png" alt="" >
										<p>Delivery Roller, 2<br>
											Rollers</p>
										</a></li>
									<li class="hoverslide"><a href="#"><img src="<?php print base_path() . path_to_theme() ?>/images/quann.png" alt="">
										<p>Delivery Roller, 2<br>
											Rollers</p>
										</a></li>
									<li class="hoverslide"><a href="#"><img src="<?php print base_path() . path_to_theme() ?>/images/quann.png" alt="">
										<p>Delivery Roller, 2<br>
											Rollers</p>
										</a></li>
									 <li class="hoverslide"><a href="#"><img src="<?php print base_path() . path_to_theme() ?>/images/quann.png" alt="">
										<p>Delivery Roller, 2<br>
											Rollers</p>
										</a></li>
							
								</ul>		 <a href="#"><img src="<?php print base_path() . path_to_theme() ?>/images/dox.png" alt="" class="control" id="rightControl"></a> 
							</div>
							<div class="clear"></div>
			   </div>


    <div class="conout navtop">
				<h5><span>
<?php 
$selects = array();
		 $selects =ps_pages_new_parts_group_release_date($language->language,arg(2));
		 if(!empty($selects)) {
		 
		 foreach($selects as $select) {
			 $opts .= '<option value="'.url('new-parts/'.arg(2)).'#'.$select.'">'.date('m/d/Y',$select).'</option>';
		 }
		 }
		  
?>
					<select name="select" id="select" onchange="window.location.href=this.options[this.selectedIndex].value">
					<?php print '<option value="">By Release Dates</option>'.$opts;?>
					</select>
					</span><?php print l(t('New Parts'),'new-parts/'.arg(2));?></h5>
				<div class="product">
		        <?php print $newparts;?>
					<div class="clear"></div>
				</div>
				<h5><?php print l(t('Best Selling Parts'),'best-selling-parts/'.arg(2));?></h5>
				<div class="product" id="partshome">
				<!-- left -->
				<div class="proleft"><img src="<?php print base_path() . path_to_theme() ?>/images/proleft.png" alt="" id="partsleft"></div>
				<div class="proright"><img src="<?php print base_path() . path_to_theme() ?>/images/porright.png" alt="" id="partsright"></div>
				<!-- left end -->
				<div id="pane-options" class="pane">
				 <?php print $bestsellingparts;?>
         </div>
					<div class="clear"></div>
				</div>
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
