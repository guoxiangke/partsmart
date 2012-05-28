<?php 
require 'header.php';
require 'nav.php';

?>
<div class="conout">
	<div class="navlist floatl">
		<div class="paesear paesearp"> <em>Parts Search</em>
			
			<?php print $taxonomy_search_box ?>
		</div>
			
		<div class="search searchh">
		<form action="<?php print base_path()?>search/node" accept-charset="UTF-8" method="post" id="search-form" class="search-form "  >
				<input name="keys" type="text"    title="SEARCH..." class="searchin tagged" id="search-keyword" />
				<input type="submit" name="button" id="button" value="" class="seargo" />

				</form>
		</div>

	</div>

	
	<div class="navprod floatr">
			<div class="conout">
       
         
          <?php print $content ?>
          
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
