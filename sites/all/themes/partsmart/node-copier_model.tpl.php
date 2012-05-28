<div class="conout">
				<h5><span><img src="<?php print base_path() . path_to_theme() ?>/images/jiqi.png" alt="" title=""></span>Copier Model Facts</h5>
				<!-- modelout -->
				<div class="modelout">
					<div class="model floatl">
						<div class="modelimg"><img src="<?php print imagecache_create_url("s118x118", $node->field_copier_image[0]['filepath']);   ?>" alt="Partsmart" title="Partsmart"></div>
						<p class="modelh"><?php print $node->title;?></p>
						<p class="modelh modelhb"><?php print $node->title;?></p>
						<p><?php 
						$term = $node->taxonomy;
						$m = $term[key($term)];
						if(is_numeric($_GET['cid'])) {
							$query = array('cid'=>$_GET['cid']);
						}
						print l(t('Return to Model Page'),'taxonomy/term/'.$m->tid,array('query'=>$query));
						?></p>
					</div>
					<div class="modelri floatr">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tbody>
							<?php 
							$contents = $node->content;
						 
							$i=0;
							foreach($contents  as $k=> $field) {
							 if(is_array($field)) {
						      
								if(array_key_exists('field',$field) && $k !=='field_copier_image') {
                    $filde_value = $node->{$k}[0]['value'];
										if($k == 'field_model_color') {
											   $filde_value = $filde_value == 1? t('Color'):t('Black / White');
										}
										else if($k == 'field_model_mfp') {
											   $filde_value = $filde_value == 1? t('Yes'):t('No');
										}
										else if($k == 'field_mode_intr_date') {
											   $filde_value =  date('m/d/Y',$filde_value);
										}
										else if($k == 'field_copier_parent_model') {
											$cpp = ps_pages_copier_compatible_child_models($node->nid);
											if(!empty($cpp)) {
													$filde_value = 	implode('/ ',$cpp);
											}
								     
										
										}
										else if($k == 'field_model_brand'){
											$filde_value = $node->field_model_brand[0]['view'];
										}

               ?>
							<tr class="<?php print $i%2 !== 0 ?'modtabll':'';?>">
								<td width="37%"><?php print $field['field']['#title']?></td>
								<td width="63%"><?php print $filde_value;?></td>
							</tr>
							 <?php
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