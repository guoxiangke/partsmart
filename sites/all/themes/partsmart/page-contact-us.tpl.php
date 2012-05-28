<?php 
require 'header.php';
require 'nav.php';

?>
			<!-- left -->
		<div class="globall floatl">
			<div class="conout">
				<div id="address_explain">
				<p>In order to support world wide market demand,PartSmart has set up global presence in five different contintnts.</p>
				</div>
				<!-- list -->
				<div id="location-input" class="mapinput">
				<?php 
				$sql = "SELECT * FROM {node} WHERE type = '%s'";
				$result = db_query($sql,'contact');
				$i = 0;
				$data = '';
				$options = '';
				while($item = db_fetch_object($result)) {
					$node = node_load($item->nid);
					$data .= '<div id="location-'.$i.'" class="goblico address">';
					
					if($i == 0)
					{
						$options .= '<option value="'.$i.'" selected="selected">'.$node->title.'</option>';
						
					}
					else {
					$options .= '<option value="'.$i.'" selected="">'.$node->title.'</option>';
					}
					
					$data .= '<div class="goblih"><img title="" alt="" src="'.url($node->field_contact_img[0][filepath]).'">'. $node->title .'</div>';
					$data .= '<div class="goblihw">';
					$data .= '<div class="goblihww floatl">';
					$data .='<p class="print">'.$node->field_contact_email[0][value].'</p>';
					if($node->field_contact_phone[0]['value']) {
						$data .='<p class="photo">';
						$phone = '';
						$count = count(field_contact_phone);
						foreach($node->field_contact_phone as $key=>$value) {
							$phone .= $value['value'];
							if($key < $count) $phone .='<br />';
						}
						$data .= $phone;
						$data .='</p>';
					}
						
					if($node->field_contact_fax[0]['value']) {
						$data .='<p class="print">';
						$fax = '';
						$count = count(field_contact_fax);
						foreach($node->field_contact_fax as $key=>$value) {
							$fax .= $value['value'];
								if($key < $count) $fax .='<br />';
						}
						$data .= $fax;
						$data .='</p>';
					}
					
					$data .= '</div>';
					$data .= '<div class="goblihww floatl">';
					$data .= '<p class="dree">';
					$data .= $node->field_contact_address[0]['street'].','.$node->field_contact_address[0]['additional'].'<br />'.$node->field_contact_address[0]['city'].'&nbsp;'. $node->field_contact_address[0]['province']. ','. $node->field_contact_address[0]['postal_code'] .'&nbsp;'. $node->field_contact_address[0]['country_name'] .'</p>';
					$data .= location_map_link($node->field_contact_address[0],'View In ');
					$data .='</div><div class="clear"></div></div></div>';
					$i++;
				}
				
				?>
					<div class="floatr">
						<p class="floatl spnn">Select location to Explore</p>
						<p class="floatl">
							<select name="country">
								<?php print $options; ?>
							</select>
						</p>
					</div>
				</div>
				<!-- list end -->
				<div id ="address_gmap" class="goblico">
				 <?php print $content ?>
				</div>
				<?php print $data;?>
				
				
			</div>
		</div>
		<!-- left end -->
		<!-- right -->
		<div class="globalr floatl">
			<!-- got -->
			<div class="globt globtt">Customer Tools</div>
			<!-- got end -->
			<div class="goblo"><img src="images/globgt.png" alt="" /></div>
			<div class="gobli">
				<ul>
					<li><a href="#">Retail Customer Support</a></li>
					<li><a href="#">Coporate Customer Support</a></li>
				</ul>
			</div>
			<div class="goblo"><img src="images/globgb.png" alt="" /></div>
		</div>
		<!-- right end -->

		</div>
		<div class="clear"></div>
	</div>
</div>
<div id="container2"></div>
<!-- container end -->

<?php 
require 'footer.php';
?>
