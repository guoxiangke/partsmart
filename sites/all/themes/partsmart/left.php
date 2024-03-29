<?php global $base_path; $parts_type = arg(0); ?>
<?php if($left == 1) { ?>
<div id="parts_type" value="<?php print $parts_type; ?>"></div>
<div class="navlist floatl">
	<div id="brand-list" class = "mainnav">
		<div id="brand-label" class="partslist-label expanded">By Brand</div>
		<ul id="brand-items-list">
			<?php
				$term_list = '';
				if($parts_type) {
				switch ($parts_type) {
				case 'printer':
					$parts_model_vid = 2;
				break;
				case 'copier':
					$parts_model_vid = 5;
				break;
				case 'cartridge':
					$parts_model_vid = 7;
				break;
				}
				foreach(taxonomy_get_tree($parts_model_vid) as $term) {
					if($term->depth === 0) {
						$count = 0;
						$mainmodels = array_keys(taxonomy_get_children(array($term->tid)));
						
						$count = db_result(db_query("SELECT COUNT(distinct n.nid) FROM {node} n WHERE n.nid IN (SELECT tn.nid FROM {term_node} tn WHERE tn.tid IN (". implode(",",$mainmodels) .")) AND n.type = '%s'", $parts_type));					
						$term_list .= '<li id="'. $term->tid .'" class="brand-item"><input type="checkbox" name="'. $term->tid .'">'. $term->name .'(<img class="small_loading" src="'.$base_path.'sites/all/themes/partsmart/images/small_loading.gif" /><span class="parts_num" value="'.$count.'">'. $count .'</span>)</li>';
					}
				}
				print $term_list;
				}

			?>
		</ul>
		<div id="select-model">
			<div class="select-child hidden">
			<h4>Select A Model</h4>
			<select name="select-model"><option value="0">All</option></select>
		</div>
	</div>
	</div>
	
	<div id="category-list" class = "mainnav">
		<div id="category-label" class="partslist-label expanded">By Category</div>
		<ul id="category-items-list">
			<?php
				$term_list = '';
				if($parts_type) {
				switch ($parts_type) {
				case 'printer':
					$parts_category_vid = 3;
				break;
				case 'copier':
					$parts_category_vid = 6;
				break;
				case 'cartridge':
					$parts_category_vid = 4;
				break;
				}
				foreach(taxonomy_get_tree($parts_category_vid) as $term) {
					if($term->depth === 0) {
						$count = 0;
						foreach(taxonomy_get_children(array($term->tid)) as $model_term) {
							$count += db_result(db_query("SELECT COUNT(nid) FROM {term_node} WHERE tid = %d",$model_term->tid));
						}	
						$term_list .= '<li id="'. $term->tid .'" class="category-item"><input type="checkbox" name="'.$term->tid.'">'. $term->name .'(<img class="small_loading" src="'.$base_path.'sites/all/themes/partsmart/images/small_loading.gif" /><span class="parts_num" value="'.$count.'">'. $count .'</span>)</li>';
					}
				}
				print $term_list;
				}
			?>
		</ul>
		<div id="select-category">
		<div class="select-child hidden">
			<h4>Select A Category</h4>
			<select name="select-category"><option value="0">All</option></select>
		</div>
		</div>
	</div>
	<?php if($parts_type == 'printer') { ?>
	<div id="color-list" class = "mainnav">
		<div id="color-label" class="partslist-label expanded">By Color</div>
		<ul id="color-items-list">
			<?php 
				$count = 0;
				$count = db_result(db_query("SELECT COUNT(n.nid) FROM {node} n INNER JOIN {content_field_part_color} cc ON n.nid = cc.nid WHERE n.type = '%s' AND cc.field_part_color_value IN (1,3)",$parts_type));
			?>
			<li id="color" class="color-item"><input type="checkbox" name="1">Color(<img class="small_loading" src="<?php print $base_path ?>sites/all/themes/partsmart/images/small_loading.gif" /><span class="parts_num" value="<?php print $count;?>"><?php print $count;?></span>)</li>
			<?php 
				$count = 0;
				$count = db_result(db_query("SELECT COUNT(n.nid) FROM {node} n INNER JOIN {content_field_part_color} cc ON n.nid = cc.nid WHERE n.type = '%s' AND cc.field_part_color_value IN (2,3)",$parts_type));
			?>
			<li id="black" class="color-item"><input type="checkbox" name="2">Laser(Black/White)(<img class="small_loading" src="<?php print $base_path ?>sites/all/themes/partsmart/images/small_loading.gif" /><span class="parts_num" value="<?php print $count;?>"><?php print $count;?></span>)</li>	
		</ul>
	</div>
	<?php } ?>
</div>
<?php }elseif($left==2){?>
<div class="navlist floatl">
















<div class="mainlink">
			<input type="text" autocomplete="off" class="search-textbox ac_input tagged" id="enter-part-number" title="Enter a part number" name="keys">
			<input type="submit" class="search-button" value="submit" id="parts-search-button" name="">
</div></div>
<?php }elseif($left == 0){?>
<div class="navlist floatl"></div>
<?php } ?>