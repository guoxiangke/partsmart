<div class="banner">
	
						<div class="banner-wrapper">
							<div class="banner-scrollable">
								<?php foreach($slides as $key => $image){ ?>
									<?php if($key==0): ?>
										<div class="banner banner-block" id="banner-<?php print $key; ?>">
											<div class="banner-image"><img src="<?php print $image['filepath']; ?>"></div>
											
											<div class="banner-link"><?php print l(t('Learn More'),$image['data']['description']); ?></div>
										</div>
									<?php else: ?>
										<div class="banner" id="banner-<?php print $key; ?>">
											<div class="banner-image"><img src="<?php print $image['filepath']; ?>"></div>
											
											<div class="banner-link"><?php print l(t('Learn More'),$image['data']['description']); ?></div>
										</div>
									<?php endif; ?>
								<?php } ?> 
							</div>
						<div class="slider-left-arrow"><?php print $slideLeftArrow; ?></div>
						<div class="slider-right-arrow"><?php print $slideRightArrow; ?></div>
						</div>
						
</div>	
			