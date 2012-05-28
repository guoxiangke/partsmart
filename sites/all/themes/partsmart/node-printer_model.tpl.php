<div class="conout">
          <?php 
						$term = $node->taxonomy;
						$m = $term[key($term)];
						if(is_numeric($_GET['cid'])) {
							$query = array('cid'=>$_GET['cid']);
						}
						$rt= l(t('Return to Model Page'),'manufacturer/parts/1/'.$m->tid.'/'.$nid,array('query'=>$query));
						?>
				<h5><span id="return-page"><?php print $rt;?></span><?php print t('Model Facts');?> : <?php print $node->title;?></h5>
				<!-- modelout -->
				<div class="modelout">
					<div class="model floatl">
						<div class="modelimg"><img src="<?php print imagecache_create_url("s118x118", $node->field_model_image[0]['filepath']);   ?>" alt="Partsmart" title="Partsmart"></div>
	 
				 
					</div>
					<div class="modelri floatr">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tbody>
							<tr class="brand">
								<td width="37%"><?php print t('Brand');?></td>
								<td width="63%"><?php $term = $node->taxonomy; $t = array_shift($term); print $t->name;?></td>
							</tr>
							
							<?php 
							
							$contents = $node->content;
						  
							$i=0;
							foreach($contents  as $k=> $field) {
							    if($k=='field_model_type')								continue;
							 if(is_array($field)) {

							     							     //var_dump($field);
						      
								if(array_key_exists('field',$field) && $k !=='field_model_image') {
                    $filde_value = $node->{$k}[0]['value'];
										if($k == 'field_model_submodels') {
											   $filde_value = ps_pages_list_child_models($node->nid);
										}
										
										if($k == 'field_model_color') {
											   $filde_value = $filde_value == 1?'<span class="color-1">'.t('Color'): '</span><span class="color-2">'.t('Black / White').'</span>';
										}
										else if($k == 'field_model_mfp') {
											   $filde_value = $filde_value == 1? t('Yes'):t('No');
										}
										else if($k == 'field_mode_intr_date') {
											   $filde_value =  date('m/d/Y',$filde_value);
										}
										else if($k == 'field_model_parents') {
										   
								      if(!empty($node->field_model_parents[0]['nid'])) {
												   
													foreach($node->field_model_parents as  $kvp) {						 
																	$kvpp[] = $kvp['view'];
													}
												  $prt = ps_pages_get_compatible_child_models($node->field_model_parents[0]['nid']);
												  $kvpp = array_merge($kvpp,$prt);
													$unsettitle[] = l($node->title,'node/'.$nid);
									 
											    $kvpp = array_diff( $kvpp,$unsettitle);
                          $filde_value = 	implode(', ',$kvpp);
											 }
											else {
												$prt = ps_pages_get_compatible_child_models($nid);
												if(!empty($prt)) {
														$filde_value  =  implode(',',$prt);

												}
										   //$field['field']['#title'] = t('Sub Models');
											}


										}
										else if($k == 'field_model_maintenance_kit') {
											 if(!empty($node->field_model_maintenance_kit)) {
													foreach($node->field_model_maintenance_kit as $kv) {
																	$kvv[] = $kv['view'];
													}
														 $filde_value = 	implode(', ',$kvv);
											 }
										}
										else if($k == 'field_model_fuser') {
											 if(!empty($node->field_model_fuser)) {
												  
													foreach($node->field_model_fuser as $k=>$kvf) {						 
																	$kvff[] = $kvf['view'];
													}
												 
														 $filde_value = 	implode(', ',$kvff);
											 }
										}
										else if($k == 'field_model_toner_cartridge') {
											 if(!empty($node->field_model_toner_cartridge)) {
												  
													foreach($node->field_model_toner_cartridge as  $kvfc) {						 
																	$kvffc[] = $kvfc['view'];
													}
												 
														 $filde_value = 	implode(', ',$kvffc);
											 }
										}
										 
 							 if($field['field']['#title'] != 'Idx' && $field['field']['#title'] != 'Siblings' && $field['field']['#title'] != 'Listdesc' && $field['field']['#title'] != 'sSeries') {
							 ?>
							
							<tr class="<?php print $i%2 !== 0 ?'modtabll':'';?> <?php print $k;?>">
								<td width="37%"><?php print $field['field']['#title']?></td>
								<td width="63%"><?php print $filde_value;?></td>
							</tr>
							 <?php
							 		}
								  $i++;
									
								}

							 }
							
							} 
							?>
						
					 
						</tbody></table>
					</div>
					<div class="clear"></div>
				</div>
				<!-- modelout end -->
			</div>