$(document).ready( function(){

	var slider_width=$('#pane-options li').width() * $('#pane-options li').length;
	$('#pane-options ul').width(slider_width+50);
	$('#partsleft').click( function(){
		$('#pane-options').scrollTo( '-=166px' ,0, { axis:'x' } );
		return false;
	});

	$('#partsright').click( function(){
		 
		$('#pane-options').scrollTo( '+=166px' , 0, { 

				axis:'x'
			
			});
		return false;
	});


	var slider_width=$('#part-detail-page li').width() * $('#part-detail-page li').length;
	$('#part-detail-page  ul').width(slider_width+50);
	$('#pt-left').click( function(){
		$('#part-detail-page').scrollTo( '-=166px' ,0, { axis:'x' } );
		return false;
	});

	$('#pt-right').click( function(){
		 
		$('#part-detail-page').scrollTo( '+=166px' , 0, { 

				axis:'x'
			
			});
		return false;
	});




	$psmhandler = $('#page-manufacturer-list li').each(function(index){ this.im= index;});

	$('#page-manufacturer-list li').hover(function(){
        $('#page-manufacturer-list li .modeloutpp').eq(this.im).show();

	 },
     function () {
       
	   $('#page-manufacturer-list li .modeloutpp').eq(this.im).hide();
     }
	 
	 ); 


	$psmmhandler = $('.partsimage ').each(function(index){ this.imm= index;});
     // $('.partsimage tr').eq(0).show();
	$('.partsimage').css( 'cursor', 'pointer');
	$('.partsimage').hover(function(){
	      $('.part-image').hide();
		  $('.part-image').eq(this.imm).show();
	 } 
	 ); 


	$psmmhandlers = $('.tb-partsimage ').each(function(index){ this.imms= index;});
     // $('.partsimage tr').eq(0).show();
	$('.tb-partsimage').css( 'cursor', 'pointer');
	$('.tb-partsimage').hover(function(){
	      $('.tb-part-image').hide();
		  $('.tb-part-image').eq(this.imms).show();
	 } 
	 ); 



	  $prdmmhandler = $('#product-silde li').each(function(index){ 
														   this.iprd= index;
														   });
	 $('#product-silde li').hover(function(){
		    $('#product-silde li a').removeClass('pcp');
			
			
			for(var i=0;i<$('#product-silde li').length;i++){
				
				if(i==this.iprd){
					
				  $('#jqzoom'+i).show();
				   
					
				}else{
				   
				  $('#jqzoom'+i).hide();
				}
				
				
				
			}
			
			$('#jqzoom'+this.iprd).jqzoom({
						zoomType: 'innerzoom',
						preloadImages: false,
						alwaysOn:false
			});
			
		    $('#product-silde li a').eq(this.iprd).addClass('pcp');
		  
	 } 
	 ); 
	 
	 $('.pt-diagram').hover(function(){
									 
									var ja= $(this).attr('bigimg');
									 
									 $('#'+ja).hover();
																  
																  });

    var node=null,filepath=null;
     
        node = $('.pagecategorywen').eq(0).attr('imgnode');
		filepath =  $('.pagecategorywen').eq(0).attr('filepath');
	    $('.node-'+node).attr('src',filepath);

       $('.page-category-showimages').each(function(index){
		  
		   filepath =  $('.firstimg-'+$(this).attr('nid')).eq(0).attr('filepath');

		   $('.node-'+$(this).attr('nid')).attr('src',filepath);
	   });




	$psmmchandler = $('.pagecategorywen').each(function(index){ this.immc= index;});
          

	    $('.pagecategorywen').hover(function(){
         
        node = $('.pagecategorywen').eq(this.immc).attr('imgnode');
		filepath =  $('.pagecategorywen').eq(this.immc).attr('filepath');
	    $('.node-'+node).attr('src',filepath);

	   } 
	 ); 


  var currentPosition = 0;
  var slideWidth = 90;
  var slides = $('.slide');
  var numberOfSlides = slides.length;

	var $pschandler = $('#clickSlidesContainer li').each(function(ind){ this.iv= ind;});
	 
	 
	$('#clickSlidesContainer li').hover(function(){
		 $('#slideInner').animate({
		  'marginLeft' : slideWidth*(-this.iv)
		});
		 $('#page-partscategory-slide .hoverslide a').removeClass('navhover');
     $('#page-partscategory-slide .hoverslide  a').eq(this.iv).addClass('navhover');
	}); 

   var  clickSlidesHeight = 60;
   var clickSlides = $('#page-partscategory-slide .hoverslide');
   var numberOfclickSlides = clickSlides.length;

  $('#clickSlidesContainer').css('overflow', 'hidden');
  $('#slidesContainer').css('overflow', 'hidden');


  slides.wrapAll('<div id="slideInner"></div>').css({
      'float' : 'left',
      'width' : slideWidth
    });

  clickSlides.wrapAll('<div id="clickSlidesInner"></div>').css({
      'height' : clickSlidesHeight
    });


  $('#slideInner').css('width', slideWidth * numberOfSlides);

  $('#clickSlidesInner').css('height', clickSlidesHeight * numberOfclickSlides);


  $('.control')
    .bind('click', function(){
	currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
     $('#page-partscategory-slide .hoverslide a').removeClass('navhover');
      $('#page-partscategory-slide .hoverslide  a').eq(currentPosition).addClass('navhover');

     manageControls(currentPosition);
	
    $('#slideInner').animate({
      'marginLeft' : slideWidth*(-currentPosition)
    });
    $('#clickSlidesInner').animate({
      'marginTop' : clickSlidesHeight*(-currentPosition)
    });

	  return false;
  });
  function manageControls(position){
	if(position==0){ $('#leftControl').hide() } else{ $('#leftControl').show() }
    if(position==numberOfSlides-1){ $('#rightControl').hide() } else{ $('#rightControl').show() }
  }
});