<?php global $base_path; $parts_type = arg(0); ?>
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
				}
				foreach(taxonomy_get_tree($parts_model_vid) as $term) {
					if($term->depth === 0) {
						$count = 0;
						$mainmodels = array_keys(taxonomy_get_children(array($term->tid)));
						
						$count = db_result(db_query("SELECT COUNT(distinct n.nid) FROM {node} n WHERE n.nid IN (SELECT tn.nid FROM {term_node} tn WHERE tn.tid IN (". implode(",",$mainmodels) .")) AND n.type = '%s'", $parts_type));					
						$term_list .= '<li id="'. $term->tid .'" class="brand-item"><input type="checkbox" name="'. $term->tid .'">'. $term->name .'('. $count .')</li>';
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
				}
				foreach(taxonomy_get_tree($parts_category_vid) as $term) {
					if($term->depth === 0) {
						$count = 0;
						foreach(taxonomy_get_children(array($term->tid)) as $model_term) {
							$count += db_result(db_query("SELECT COUNT(nid) FROM {term_node} WHERE tid = %d",$model_term->tid));
						}
						
						$term_list .= '<li id="'. $term->tid .'" class="category-item"><input type="checkbox" name="'.$term->tid.'">'. $term->name .'('. $count .')</li>';
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
	
	<div id="color-list" class = "mainnav">
		<div id="color-label" class="partslist-label expanded">By Color</div>
		<ul id="color-items-list">
			<li class="color-item"><input type="checkbox" name="1">Color</li>
			<li class="color-item"><input type="checkbox" name="2">Laser(Black/White)</li>	
		</ul>
	</div>
</div>