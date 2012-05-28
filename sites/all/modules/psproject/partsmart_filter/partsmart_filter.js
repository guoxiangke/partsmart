if (Drupal.jsEnabled) {
  $(document).ready(function(){
    $('#edit-search-submit').click(function(){
	  
	/*  $.ajax({
			  url: url,
			  beforeSend: function( xhr ) {
			    $("#srp_loading").removeClass("gone");
			    $("#srp_loading").attr("style","left: "+(($(window).width() - $("#srp_loading").width()) / 2)+"px; top: "+(($(window).height() - $("#srp_loading").height()) / 2)+"px;");
			  },
			  success: function( data ) {
				$("#srp_loading").addClass("gone");
			    $("#srp_loading").attr("style","");
			    $("#child_terms").html(data);
			  }
			});
	*/		
	//  return false;
	});
  });
    
}