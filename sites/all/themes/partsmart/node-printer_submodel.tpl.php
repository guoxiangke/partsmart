<div class="conout">
          <?php 
						$pnode = node_load($node->field_model_mainmodels[0]['nid']);
						
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
						<div class="modelimg"><img src="<?php if(file_exists($pnode->field_model_image[0]['filepath'])) print imagecache_create_url("s118x118", $pnode->field_model_image[0]['filepath']); else print imagecache_create_url("s118x118", drupal_get_path('theme','partsmart').'/images/blank.jpg'); ?>" alt="Partsmart" title="Partsmart"></div>		 
					</div>
					<div class="modelri floatr">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tbody>
							<tr class="brand">
								<td width="37%"><?php print t('Brand');?></td>
								<td width="63%"><?php $term = $pnode->taxonomy; $t = array_shift($term); print $t->name;?></td>
							</tr>
							
					
							
							<tr class="description modtabll">
								<td width="37%"><?php print t('Description');?></td>
								<td width="63%"><?php print $node->title;?></td>
							</tr>
							
							<tr class="parentmodel">
								<td width="37%"><?php print t('Compatible/Parent Model');?></td>
								<td width="63%"><?php print l($pnode->title,$pnode->path);?></td>
							</tr>
					 
						</tbody></table>
					</div>
					<div class="clear"></div>
				</div>
				<!-- modelout end -->
			</div>