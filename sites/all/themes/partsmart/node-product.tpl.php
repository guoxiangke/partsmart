
<div class="conpic floatl" id="product-silde">
	<div class="pic floatl">
		<?php
		global $base_path;
		global $user;
		$roles_id = array_keys($user->roles);

		if(!$node->field_part_prtestore[0]['value']&&($user->id==0||in_array(3,$roles_id))){ //dale add 20120531 2201
			print '<a><img src="'. imagecache_create_url("s326x326", path_to_theme().'/images/wholesale-signup.jpg'). '" alt="" /></a>';
		}elseif(file_exists('sites/default/files/product/' . $node->title .'.jpg')) {
			print '<a class="jqzoomimg" href="'.$base_path.'sites/default/files/product/' . $node->title .'.jpg" title=""><img src="'. imagecache_create_url("s326x326", 'sites/default/files/product/' . $node->title .'.jpg'). '" alt="" /></a>';
		}else{
			print '<a><img src="'. imagecache_create_url("s326x326", 'sites/default/files/default_images/blank.jpg'). '" alt="" /></a>';
		}
		?>           
	</div>
			
	<ul class="picli floatr clearfix"  id="thumblist"  >
		<?php
			if(!$node->field_part_prtestore[0]['value']&&($user->id==0||in_array(3,$roles_id))){ //dale add 20120531 2201
			print '<a><img src="'. imagecache_create_url("s326x326", path_to_theme().'/images/wholesale-signup.jpg'). '" alt="" /></a>';
		}elseif(file_exists('sites/default/files/product/' . $node->title .'.jpg')) {
					print '<li class="selected"><div class="product-smallimg"><img src="'. imagecache_create_url("s51x51", 'sites/default/files/product/' . $node->title .'.jpg'). '" alt="" /></div></li>';
			}
		?>
	</ul>
</div>

<div class="contex floatl">
	<p>
		<label><?php print t('OEM PN'); ?></label>
		<strong class="texfont"><?php print $node->title;?></strong></p>
	<p>
		<label><?php print t('Description'); ?></label>
		<span><?php print strip_tags($node->content['body']['#value']);?></span></p>
	<p>
		<label><?php print t('PartSmart PN'); ?></label>
		<?php print $node->field_part_prtmaspn[0][value];?></p>
	<p>
		<label><?php print t('Release Date'); ?></label>
		<?php print date('m/d/Y',$node->field_part_release_date[0]['value']);?></p>
	<p>
		<label><?php print t('Diagram'); ?></label>
				
				<?php 
				$dia= array();
				if(!empty($node->field_part_diagram[0]['filepath'])) {
					foreach($node->field_part_diagram as $k=>$diagram ) {
						$dia[]=  '<span class="pt-diagram"   bigimg="jqzoomli'.($k+1).'">'.'Diagram'.($k+1).',&nbsp'.$diagram['data']['description'].'</span>';
					}
		 		}
				if(!empty($dia[0])) {
			   	print implode('<span style="width:2px;margin-right:5px; float:none; display:inline;">&nbsp&nbsp</span>',$dia);
				}
				else {
						print 'N/a';
				}
				?>
				
				</p>
			<p class="prd-stock">
				<label><?php print t('Stock Status');?></label>
				<?php 
			   $stock = uc_stock_level($node->title);
				print  ($stock > 0 ) ? $stock : t('Not available');?> </p>
			<p class="prd-condition">
				<label><?php print t('Condition');?></label>
				<?php
				print $node->field_part_prtcondition[0]['value'];?> </p>
				
				<?php 
					global $user;
					$roles_id = array_keys($user->roles);
					$output = '';
					if($node->field_part_prtenable[0]['value'] >0){
						if(in_array(4,$roles_id) || in_array(5,$roles_id)){
							if($node->field_part_unitprice[0]['value'] == 0){
								$output .= '<p><label>'. t('Retail Price').'</label><span>N/A</span></p>';
							}
							else{
								$output .= '<p><label>'. t('Retail Price').'</label><span>$'.number_format($node->field_part_unitprice[0]['value'], 2, '.', '').'</span></p>';
							}
							$output .= '<p><label>'. t('Wholesale Price').'</label><span>';
					
							$prices = array();
							foreach ($node->field_part_rg_price_vr as $k => $range) {
								if( $node->field_part_rg_unitprice[$k]['value'] > 0 ) {
        					$prices[] = '(' . $range['value'] . ') ' . '$' . number_format($node->field_part_rg_unitprice[$k]['value'], 2, '.', '');
   							}
							}
							$showprice = implode('<br>', $prices);
							$output .= str_replace("$0.00","N/a",$showprice);
					
							$output .='</span></p>'; 
						}
						elseif(in_array(3,$roles_id)){
							$output .= '<p><label>'. t('Wholesale Price').'</label><span>';
							if(in_array(2,$roles_id)){
								$prices = array();
                if($node->field_part_rg_price_vr)
								foreach ($node->field_part_rg_price_vr as $k => $range) {
									if( $node->field_part_rg_unitprice[$k]['value'] > 0 ) {
        					$prices[] = '(' . $range['value'] . ') ' . '$' . number_format($node->field_part_rg_unitprice[$k]['value'], 2, '.', '');
   								}
								}
								$showprice = implode('<br>', $prices);
								$output .= str_replace("$0.00","N/a",$showprice);
							}
					}else{
						if(($node->field_part_unitprice[0]['value'] == 0) || !$node->field_part_prtestore[0]['value']){
						$output .= '<p><label>'. t('Price').'</label><span>N/A</span></p>';
						}
					else{
							$output .= '<p><label>'. t('Price').'</label><span>$'.number_format($node->field_part_unitprice[0]['value'], 2, '.', '').'</span></p>';
						}
					}
					}//dale add          
          if(in_array(3,$roles_id)||in_array(5,$roles_id)||$user->uid==1){ // user roles id 3 = wholesale
            if($price1=$node->field_part_price1[0]['value'])$output .= '<p class="wholesale_price">'. t('(1+) ').'$'.number_format($price1, 2, '.', '').'</p>';
            if($price10=$node->field_part_price10[0]['value'])$output .= '<p class="wholesale_price">'. t('(10+) ').'$'.number_format($price10, 2, '.', '').'</p>';
            if($price100=$node->field_part_price100[0]['value'])$output .= '<p class="wholesale_price">'. t('(100+) ').'$'.number_format($price100, 2, '.', '').'</p>';
          }
					print $output;
				?>
			<p>
				<?php 
					print l(t('Add to cart'), 'ps/addtocart/' . $node->nid, array('attributes' =>array('class'=>'addtocart')));
				?>
			</p>
		</div>
		
		<div class="contma floatl">
			<div class="contmat brand"><table class="product-brand-cate"><tr><td class="product-label"><?php print t('Brand'); ?>:</td><td><span class="blue">
                        <?php 
												$b= array();
                        foreach($node->taxonomy as $k =>$value){
													if($value->vid == 2  || $value->vid == 5 || $value->vid == 7)
													{
														foreach(taxonomy_get_parents($value->tid) as $m => $maker) {
															if(!array_key_exists($maker->tid,$b))
																$b[$maker->tid]=l($maker->name,'taxonomy/term/'.$maker->tid);
														}
													}
                        }
                        print implode('</br>',$b);
                        ?>
                        </span></td></tr>
				<tr><td><?php print t('Category');?>:</td>
				
				<td style="white-space: normal;"><span class="blue">
				<?php 
				$cate_link = array();
						 foreach($node->taxonomy as $term) {
							  if($term->vid == 3 || $term->vid == 4 || $term->vid == 6 ) {
										$has_parent = taxonomy_get_parents($term->tid);
										if($has_parent) {
										  $parent = $has_parent[key($has_parent)];
									  	$cate_link[] =  l(t($parent->name),'taxonomy/term/'.$parent->tid); 
										}
										$cate_link[]  = l(t($term->name),'taxonomy/term/'.$term->tid);
						     	} 
						 }
         print  implode('<br/>',array_merge($cate_link));
				?>
				 
				
				</span></td>
				
				</tr>
			</table>
			</div>
			
			<p><?php print t('Compatible Models');?></p>
			<div class="contmat">

			<?php 
 				foreach($node->taxonomy as $k =>$value){
					
					if($value->vid == 2  || $value->vid == 5 || $value->vid == 7) {
						$child_term =  taxonomy_get_children($value->tid);
						$print_output = '';
						if (count($child_term) > 0) {
							$str = '';
							foreach($child_term as $child_item) {
								$str .='<li>' . $child_item->name . '</li>';
							}
							$print_output .= '<li class="parent-part-cm">' . l($value->name,'taxonomy/term/'.$value->tid) . '<ul class="part-child-cm">' . $str . '</ul></li>';
						}
						else {
							$print_output .= '<li class="parent-part-ncm">' . l($value->name,'taxonomy/term/'.$value->tid) .'</li>';
						}
					print '<ul class="part_compatible-models">' . $print_output . '</ul>';	
					}
				}
    	?>

				

			</div>
		</div>
		<div class="clear"></div>
	</div>
		<?php if($node->field_part_prtestore[0]['value']): ?>
		<h3><?php print t('View Related Products'); ?></h3>

		<div class="conout" id="partdetails">
	
		
		<div class="prolp floatl">
		
		<div id="relateparts">
		<a class="buttons prev" href="#">left</a>
		<div class="viewport">
			<ul class="overview">
				<?php 
    	if(!empty($node->taxonomy))  {
				foreach($node->taxonomy as $k => $value) {
					$where[] = 'tid = %d';
					$where_value[] = $value->tid;
				}
				
				$output = '';
				$sql = 'SELECT * FROM {term_node} WHERE';
				$sql = $sql . ' ' . implode(' OR ', $where);
				
				$result = db_query($sql, $where_value);
				while($item = db_fetch_object($result)) {
					if($node->nid != $item->nid) {
					$part = node_load($item->nid);
					if($part->type == 'printer' || $part->type == 'copier' || $part->type == 'cartridge') {
						if(file_exists('sites/default/files/product/' . $part->title .'.jpg'))
						$output .='	<li><a href="' . url('node/' . $part->nid) . '"><img src="'. imagecache_create_url("s158x158", 'sites/default/files/product/' . $part->title .'.jpg'). '" alt="" /></a><div class="newparts-title">'.l($part->title,'node/' . $part->nid).'</div><p class="newparts-desc">'.$part->body.'</p></li>';
						else
						$output .='	<li><a href="' . url('node/' . $part->nid) . '"><img src="'. imagecache_create_url("s158x158", 'sites/default/files/default_images/blank.jpg'). '" alt="" /></a><div class="newparts-title">'.l($part->title,'node/' . $part->nid).'</div><p class="newparts-desc">'.$part->body.'</p></li>';
					} //dale
				}
				}
				print $output;
			}
		?>         
			</ul>
		</div>
		<a class="buttons next" href="#">right</a>
	  </div>
		</div>

		<div class="clear"></div>
	</div>
<?php endif; ?>
<?php if(user_access('show partSmart internal data')): ?>
	<h3><?php print t('PartSmart Internal Data');?></h3>

<div class="conout">
		<div class="contmaa floatl">
			<h4><span><?php print t('Part Info');?>.</span></h4>
			<div class="contmat"><span class="blue"><strong><?php print t('Market Status');?></strong></span> <strong><?php print $node->field_part_market_status[0]['value'] =1?t('Available'):t('Unavailable')?></strong><br>
			</div>
			<p class="blue"><strong><?php print t('Compatible Parts');?></strong></p>
			<div class="contmat">
				<?php 
				$output ='';
				$output .= '<ul>';
				if(db_result(db_query('SELECT COUNT(*) FROM {compatible} WHERE part_a = "%s"',$node->title)) > 0){
					$result =  db_query('SELECT * FROM {compatible} WHERE part_a LIKE "%s"',$node->title);
					while($item = db_fetch_object($result)){
						$nid = db_result(db_query('SELECT nid FROM {node} WHERE title = "%s"',$item->parts_b));
						$part_compatible = node_load($nid);
						
						$output .= '<li>'. l($part_compatible->title,$part_compatible->path) . '</li>';	
					}
				}
				if(db_result(db_query('SELECT COUNT(*) FROM {compatible} WHERE parts_b = "%s"',$node->title)) > 0){
					$result =  db_query('SELECT * FROM {compatible} WHERE parts_b LIKE "%s"',$node->title);
					while($item = db_fetch_object($result)){
						$nid = db_result(db_query('SELECT nid FROM {node} WHERE title = "%s"',$item->part_a));
						$part_compatible = node_load($nid);
						
						$output .= '<li>'. l($part_compatible->title,$part_compatible->path) . '</li>';	
					}
				}
				$output .= '</ul>';
				print $output; 
				?>
			</div>
            
            <p class="blue"><strong><?php print t('Kit configuration');?></strong></p>
			<div class="contmat">
				<?php 
				$output ='';
				$output .= '<table><tr><td>Kit No.</td><td>';
				if(db_result(db_query('SELECT COUNT(*) FROM {kit} WHERE partno = "%s"',$node->title)) > 0){
					$result =  db_query('SELECT * FROM {kit} WHERE partno = "%s"',$node->title);
					while($item = db_fetch_object($result)){
						$nid = db_result(db_query('SELECT nid FROM {node} WHERE title = "%s"',$item->kitno));
						$part_kit = node_load($nid);
						$output .= l($part_kit->title,$part_kit->path) . '<br>';	
					}
				}
				$output .= '</td></tr><tr><td>Part No.</td><td>';
				if(db_result(db_query('SELECT COUNT(*) FROM {kit} WHERE kitno = "%s"',$node->title)) > 0){
					$result =  db_query('SELECT * FROM {kit} WHERE kitno = "%s"',$node->title);
					while($item = db_fetch_object($result)){
						$nid = db_result(db_query('SELECT nid FROM {node} WHERE title = "%s"',$item->partno));
						$part_kit = node_load($nid);
						
						$output .= l($part_kit->title,$part_kit->path) . '<br>';	
					}
				}
				$output .= '</td></tr></table>';
				print $output; 
				?>
			</div>
			
			<?php foreach($node->taxonomy as $term) {
				
			if($term->vid == 9) {//this is a kitno category
					if($node->title != $term->name) {
						print '<p class="blue"><strong>'.t("KitNo").'</strong></p>';
						print '<div class="contmat">';
						print l($term->name, 'part/'.$term->name);
						print '</div>';
					} 
				}		
			}
			?>
			<?php $terms = taxonomy_get_tree(9);	
				
				foreach( $terms as $seq=>$term ){
					
					if($node->title == $term->name){
					print '<p class="blue"><strong>'.t('Component Info.').'</strong></p><div class="contmat">';
					$output ='<ul>';	
				
					 $sql = 'SELECT n.nid, n.title FROM {node} n INNER JOIN {term_node} tn ON n.nid=tn.nid WHERE tn.tid=%d';
					 $result = db_query($sql, $term->tid);
					 while($item= db_fetch_object($result)){
						$output.='<li>'.l($item->title, 'node/'.$item->nid).'</li>';
					 }
					 $output .='</ul>';
					 print $output; 
					print '</div>';
				}
				}
			?>
			
			
		</div>
		<div class="contable floatl">
			<h4><span><?php print l(t('Notes'),'comment/reply/'.$node->nid)?></span></h4>
			<div class="contab">
			 
			</div>
			<h4><span><?php print t('Price');?></span></h4>
			<div class="contab">
		  
			</div>
		</div>
		
	</div>
	<?php endif; ?>
	<div class="clear"></div>