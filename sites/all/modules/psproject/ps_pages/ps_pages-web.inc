<?php

function parts_list() {

	$parts_type = arg(0);
	global $base_path;
	global $user;
	drupal_set_title('');
	$output = '';
	$output .='<div class="conout">
			   <div class="navpimg floatl"><img alt="" src="'.$base_path.'sites/all/themes/partsmart/images/lunzi.jpg"></div>
				<div class="navlit floatr">
					<ul>
						<li class="uox"><a href="#"><img alt="" src="'.$base_path.'sites/all/themes/partsmart/images/upx.png"></a></li>
						<li><a class="navhover" href="#"><img alt="" src="'.$base_path.'sites/all/themes/partsmart/images/quann.png">
							<p>Delivery Roller, 2<br>
								Rollers</p>
							</a></li>
						<li><a href="#"><img alt="" src="'.$base_path.'sites/all/themes/partsmart/images/quann.png">
							<p>Delivery Roller, 2<br>
								Rollers</p>
							</a></li>
						<li><a href="#"><img alt="" src="'.$base_path.'sites/all/themes/partsmart/images/quann.png">
							<p>Delivery Roller, 2<br>
								Rollers</p>
							</a></li>
						<li class="uox navtop"><a href="#"><img alt="" src="'.$base_path.'sites/all/themes/partsmart/images/dox.png"></a></li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>';

	

	$sql = 'SELECT cd.field_part_release_date_value FROM {content_field_part_release_date} cd INNER JOIN {node} n ON n.nid = cd.nid WHERE n.type = "%s" ORDER BY cd.field_part_release_date_value DESC';

	$result = db_query($sql,$parts_type);
	$release_date = array();
	$release_date_options = '';
	$i = 0;
	while($item = db_fetch_object($result)){
		if(!in_array($item->field_part_release_date_value,$release_date)) {
		if($i<=3){
			$release_date[] = $item->field_part_release_date_value;
			$release_date_options .='<option value="'. $item->field_part_release_date_value .'">Release Date ' . format_date($item->field_part_release_date_value,'custom','m/d/Y') . '</option>'; 
		$i++;
		}
		}
	}

	$newsparts = '';
	$sql = 'SELECT cd.nid FROM {content_field_part_release_date} cd INNER JOIN {node} n ON n.nid = cd.nid WHERE n.type = "%s" AND cd.field_part_release_date_value =%d';
	$result = db_query_range(db_rewrite_sql($sql),$parts_type,$release_date[0],0,8);
	$i = 1;
	while($item = db_fetch_object($result)){
		$parts_node = node_load($item->nid);
		if(file_exists('sites/default/files/product/' . $parts_node->title .'.jpg')) {
			$imgs = '<img src="'. imagecache_create_url("s158x158", 'sites/default/files/product/' . $parts_node->title .'.jpg'). '" alt="" />';
		} 
		elseif(!empty($node->field_image_cache[0])){
			$imgs = '<img src="' . imagecache_create_url("s158x158", $parts_node->field_image_cache[0]['filepath']) . '" alt="" />';
		} 
		else {
			$imgs  = '<img src="'. imagecache_create_url("s158x158", 'sites/default/files/default_images/blank.jpg') . '" alt="" />';
		}
		$price = array();		 
      
      if($parts_node->field_part_price1[0][value])
	  $price[] = '$'. $parts_node->field_part_price1[0][value] .'(1+)';
      if($parts_node->field_part_price10[0][value])
      $price[] = '$'. $parts_node->field_part_price10[0][value] .'(10+)';
      if($parts_node->field_part_price100[0][value])
      $price[] = '$'. $parts_node->field_part_price100[0][value] .'(100+)';
  		
		$parts_title = l($parts_node->title,$parts_node->path);
		
		if($i % 4 != 0) {
			$newsparts .= '<div class="partsproductitem"><div class="partsitem-img">'. $imgs .'</div><div class="partsitem-title">'. $parts_title .'</div><div class="partsprice">'.implode(',',$price).'</div></div>';
		}
		else {
			$newsparts .= '<div id="partsproduceitem-right" class="partsproductitem"><div class="partsitem-img">'. $imgs .'</div><div class="partsitem-title">'. $parts_title .'</div><div class="partsprice">'.implode(',',$price).'</div></div>';
		}
		$i++;
	}

	$output .='<div id="newproduct-top" class="productlist-top"><span>New-Parts</span><div id="newproductselect"><select name="select">' . $release_date_options . '</select></div></div>';
	$output .='<div id="newproductajax" class="newproductlist">'. $newsparts .'<div class="clear"></div></div>';
	$output .='<div id="bestproduct-top" class="productlist-top"><span>Best Selling Parts</span></div>';
  return $output;
}

function parts_new() {

	$parts_type = arg(0);
	global $base_path;
	drupal_set_title('New Parts');
	$output = '';
	
	$sql = 'SELECT cd.field_part_release_date_value FROM {content_field_part_release_date} cd INNER JOIN {node} n ON n.nid = cd.nid WHERE n.type = "%s" ORDER BY cd.field_part_release_date_value DESC';

	$result = db_query($sql,$parts_type);
	$release_date = array();
	$release_date_options = '';
	$i = 0;
	while($item = db_fetch_object($result)){
		if(!in_array($item->field_part_release_date_value,$release_date)) {
		if($i<=3){
			$release_date[] = $item->field_part_release_date_value;
			$newsparts = '';
			$sql = 'SELECT cd.nid FROM {content_field_part_release_date} cd INNER JOIN {node} n ON n.nid = cd.nid WHERE n.type = "%s" AND cd.field_part_release_date_value =%d';
			$data = db_query_range(db_rewrite_sql($sql),$parts_type,$item->field_part_release_date_value,0,4);
			$j = 1;
			while($parts = db_fetch_object($data)){
				$parts_node = node_load($parts->nid);
				if(file_exists('sites/default/files/product/' . $parts_node->title .'.jpg')) {
					$imgs = '<img src="'. imagecache_create_url("s158x158", 'sites/default/files/product/' . $parts_node->title .'.jpg'). '" alt="" />';
					
				} else {
					$imgs  = '<img src="'. imagecache_create_url("s158x158", 'sites/default/files/default_images/blank.jpg') . '" alt="" />';
				}
				$price = array();
        
      
        global $user;
        $roles_id = array_keys($user->roles);
    	if($parts_node->field_part_price1[0][value])
	  	$price[] = '$'. $parts_node->field_part_price1[0][value] .'(1+)';
      	if($parts_node->field_part_price10[0][value])
      	$price[] = '$'. $parts_node->field_part_price10[0][value] .'(10+)';
      	if($parts_node->field_part_price100[0][value])
      	$price[] = '$'. $parts_node->field_part_price100[0][value] .'(100+)';
				
		$parts_title = l($parts_node->title,$parts_node->url.'node/'.$parts_node->nid);
		if($j % 4 != 0) {
			$newsparts .= '<div class="partsproductitem"><div class="partsitem-img">'. $imgs .'</div><div class="partsitem-title">'. $parts_title .'</div><div class="partsprice">'.implode(' ',$price).'</div></div>';
		}
		else {
			$newsparts .= '<div id="partsproduceitem-right" class="partsproductitem"><div class="partsitem-img">'. $imgs .'</div><div class="partsitem-title">'. $parts_title .'</div><div class="partsprice">'.implode(' ',$price).'</div></div>';
		}
		$j++;
	}
	$output .='<div class="newproductdate">'.format_date($item->field_part_release_date_value,'custom','m/d/Y').'</div>';
	$output .='<div class="newproductlist">'. $newsparts .'<div class="clear"></div><div class="containerr"><span><a href="#">Return to Top</a></span></div></div>';
	$i++;
	}
	}
	}
	return $output;
}



function parts_brand() {

	global $base_path;
	$output = '';
	$type = arg(0);
	switch($type){
		case 'printer':
			$parts_type = 2;
		break;
		case 'copier':
			$parts_type = 5;
		break;
		case 'cartridge':
			$parts_type = 7;
		break;
	}

	if(!arg(2)){
		$brand_terms = taxonomy_get_tree($parts_type,0,-1,1);
		$terms_img = '<div class="maplink">';
		foreach($brand_terms as $value){
			if(taxonomy_image_display($value->tid)){
				$terms_img .= '<a href="'.$base_path.$type.'/brand/'.$value->tid.'">'.taxonomy_image_display($value->tid).'</a>';
			}
			else{
				$terms_img .= '<a href="'.$base_path.$type.'/brand/'.$value->tid.'">'.taxonomy_image_display($value->tid).'</a>';
			}
		}

		$terms_img .='<div class="clear"></div></div>';
		$output .= '<h5>Manufacturer</h5>';
		$output .= $terms_img;
	}

	if(arg(2) && !(arg(3))){
		$brand = taxonomy_get_term(arg(2));
		$models = taxonomy_get_children(arg(2));
		$models_html = '<ul>';
		foreach($models as $value){
		$models_html .= '<li><div class="modeloutpp"><img title="Partsmart" alt="Partsmart" src="'.$base_path.'/sites/all/themes/partsmart/images/daport.jpg"></div><a href="'.$base_path.$type.'#ajax_partslist?parts_type='. arg(0) .'&brand='. arg(2) . '&model=' .$value->tid .'">'.$value->name.'</a></li>';
		}
		$models_html .='</ul>';
		switch($type){
		case 'printer':
			$output .= '<h5>' . $brand->name .' Printers</h5>';
		break;

		case 'copier':
			$output .= '<h5>' . $brand->name .' Copiers</h5>';
		break;

	}
	$output .= '<div class="modelout">'.$models_html.'</div>';
	}	
	return $output;
}



function parts_category() {
	global $base_path;
	$output = '';
	switch(arg(0)){
		case 'printer':
			$category_vid = 3;
		break;
		case 'copier':
			$category_vid = 6;
		break;
		case 'cartridge':
			$category_vid = 4;
		break;
	}
	$categorys_terms = taxonomy_get_tree($category_vid,0,-1,1);
	$category_html = '';
	foreach($categorys_terms as $value){
		$category_html .= '<div class="categorylist">';
		$category_html .= '<div class="categorytitle">'.$value->name.'</div>';
		$category_html .='<div class="categoryout">';
		$category_html .='<ul>';
		$subcategory = taxonomy_get_children($value->tid);
		foreach($subcategory as $k){
			$sqlc =  "SELECT COUNT(n.nid) FROM {node} n  WHERE n.type = '%s' AND n.nid IN (SELECT tn.nid FROM {term_node} tn WHERE tn.tid = %d)";
			$count = db_result(db_query($sqlc,arg(0),$k->tid));
			$category_html .= '<li><a href="'.$base_path.arg(0).'/category#ajax_partslist?'. 'parts_type=' . arg(0) . '&category=' . $value->tid. '&subcategory=' .$k->tid.'">'.$k->name.'('. $count .')</a></li>';
		}
		$category_html .='</ul><div class="clear"></div></div></div>';
	}
	$output .='<h5>All Product Category</h5>';
	$output .= $category_html;
	return $output;
}



function parts_best() {

	global $base_path;
	$output = '';
	$output .= '<h5>Best Selling Parts</h5>';
	$best_html = '';
	$sql = 'SELECT * FROM {node} WHERE type = "%s"';
	$result = db_query_range(db_rewrite_sql('SELECT n.nid FROM {node} n WHERE n.type = "%s"'),arg(0),0,12);
	$i = 1;
	while($item = db_fetch_object($result)){
		$part = node_load($item->nid);
		if(($i % 4) != 0){
			$best_html .= '<li>';
		}else
		{
			$best_html .= '<li class="prodmarg">';
		}
		if(file_exists('sites/default/files/product/' . $part->title .'.jpg')){
			$best_html .= '<div class="proimgae"><a href="'.$base_path.'node/'.$part->nid.'"><img alt="" src="'.imagecache_create_url("s164x164", 'sites/default/files/product/' . $part->title .'.jpg').'"></a></div>';
		}
		else{
			$best_html .= '<div class="proimgae"><a href="'.$base_path.'node/'.$part->nid.'"><img alt="" src="'.imagecache_create_url("s164x164", 'sites/default/files/default_images/blank.jpg').'"></a></div>';
		}
		$best_html .= '<em>'.$part->title.'</em>';
    
		$best_html .= '<p>HP Laser Jet 123<br>';
   		if($parts_node->field_part_price1[0][value])
	  	$best_html .= '$'. $parts_node->field_part_price1[0][value] .'(1+)';
      	if($parts_node->field_part_price10[0][value])
      	$best_html .= '$'. $parts_node->field_part_price10[0][value] .'(10+)';
      	if($parts_node->field_part_price100[0][value])
      	$best_html .= '$'. $parts_node->field_part_price100[0][value] .'(100+)';
    
		$best_html .='</p>';
		$best_html .='</li>';
		$i++;
	}
	$output .='<div class="product"><ul>'.$best_html.'</ul><div class="clear"></div></div>';
	return $output;
}