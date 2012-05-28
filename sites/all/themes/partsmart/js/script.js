// JavaScript Document

$(document).ready(function() {
						   $('.newslist li').hover(
												   function () {
													   var items = $(this).attr("class");
													   var cName = '.newslist li.' + items;
													   $(cName).addClass('selected');
													   }, 
												   function () {
													   $('.newslist li.selected').removeClass('selected');
													   
													   }
												   );
						   });

$(document).ready(function() {
						   $('#news-headline img').hover(
												   function () {
													   $('#news-headline').addClass('selected');
													   }, 
												   function () {
													   $('#news-headline').removeClass('selected');
													   
													   }
												   );
						    $('#news-headline a').hover(
												   function () {
													   $('#news-headline').addClass('selected');
													   }, 
												   function () {
													   $('#news-headline').removeClass('selected');
													   
													   }
												   );
						   });


$(document).ready(function() {
						   $('.gobimgul li').hover(
												   function () {
													   $('.gobimgul li.selected').removeClass('selected');
													   $(this).addClass('selected');
													   imgsrc= $(this).find('img').attr('src');
													   $('#bigimg').attr('src',imgsrc);
													   }
												   );
						   });

//node-product.tpl.php thumbimg hover
$(document).ready(function() {
													 var imgsrc = $('.picli li.selected').find('img').attr('src');
													 $('#product-bgimg').attr('src',imgsrc);
													 $('.picli li').hover(
																								function () {
																								$('.picli li.selected').removeClass('selected');
													   										$(this).addClass('selected');
																								imgsrc = $(this).find('img').attr('src');
																								$('#product-bgimg').attr('src',imgsrc);
																								}
																								);
													 });

//node-product.tpl.php bigimage jqzoom.

$(document).ready(function() {
						   $('.address').hover(
												   function () {
													   $('.address').not(this).addClass('gloomy');
													   $(this).addClass('maphover');
													   
													   $('#location-input').insertBefore(this);
													   $('#address_gmap').insertAfter('#location-input');
													   var gmap_ = $(this).offset();
													   
													   var lid ='#mtgt_unnamed_' + $(this).attr('id').substr(9);
													   
													   $('.globalr').css({position:"absolute",top:gmap_.top});
													   $(lid).width(23);
													   $(lid).height(38);
													  
													   },
												   function() {
													    $('.address').not(this).removeClass('gloomy');
														$(this).removeClass('maphover'); 
														 $('#location-input').insertAfter('#address_explain');
													   $('#address_gmap').insertAfter('#location-input');
													   
													   
														var lid ='#mtgt_unnamed_' + $(this).attr('id').substr(9);
														 $('.globalr').css({position:"relative",top:"0"});
													  
													   $(lid).width(12);
													   $(lid).height(20);
													  
												   }
													   
												   );
						   });

$(document).ready(function(){
													 $('.pt-diagram').hover(
																									function() {
																										$(this).css('color','#74AD1C');
																										},
																									function() {
																										$(this).css('color','#000000');
																									}
																									
																									);
													 });

//parts-list page jquery
$(document).ready(function(){
	$('.brand-item input:checked').removeAttr("checked");
	$('.category-item input:checked').removeAttr("checked");
	$('.color-item input:checked').removeAttr("checked");
	$('#brand-label').toggle(function() {
		$(this).removeClass('expanded');
		$('#brand-items-list').addClass('hidden');
		$('.brand-item input:checked').removeAttr("checked");
		$("#select-model select option[index!='0']").remove();
		$('#select-model .select-child').addClass('hidden');
	},
	function() {
		$(this).addClass('expanded');
		$('#brand-items-list').removeClass('hidden');
		$('.brand-item input:checked').removeAttr("checked");
		$("#select-model select option[index!='0']").remove();
	});
	
	$('#category-label').toggle(function() {
		$(this).removeClass('expanded');
		$('#category-items-list').addClass('hidden');
		$('.category-item input:checked').removeAttr("checked");
		$("#select-category select option[index!='0']").remove();
		$('#select-category .select-child').addClass('hidden');
	},
	function() {
		$(this).addClass('expanded');
			$('#category-items-list').removeClass('hidden');
			$('.category-item input:checked').removeAttr("checked");
			$("#select-category select option[index!='0']").remove();
		});
	
	$('#color-label').toggle(function() {
		$(this).removeClass('expanded');
		$('#color-items-list').addClass('hidden');
		$('.color-item input:checked').removeAttr("checked");
	},
	function() {
		$(this).addClass('expanded');
		$('#color-items-list').removeClass('hidden');
		$('.color-item input:checked').removeAttr("checked");
	});
	
		
		$('.brand-item input').click(function(){
			var basepath = Drupal.settings.basePath;
		var parts_type = $('#parts_type').attr("value");
		var brand = $('.brand-item input:checked').attr('name') ? $('.brand-item input:checked').attr('name') : 0;
		var model = $('#select-model select').attr('value') ? $('#select-model select').attr('value') : 0;
		var category = $('.category-item input:checked').attr("name") ? $('.category-item input:checked').attr("name") : 0;
		var subcategory = $('#select-category select').attr('value') ? $('#select-category select').attr('value') : 0;
		var color = $('.color-item input:checked').attr("name") ? $('.color-item input:checked').attr("name") : 0;
		var sortby = $('#pagsortby').val();
		var viewlist = $('#pagview').val();
		var limit = $('#limit_number').val();
		
		if(brand == 0) model = 0;
		if(category == 0) subcategory = 0;
				
		var arrhash = new Array();
				
		arrhash[0] = 'parts_type=' + parts_type;
		arrhash[1] = 'brand=' + brand;
		arrhash[2] = 'model=' + model;
		arrhash[3] = 'category=' + category;
		arrhash[4] = 'subcategory=' + subcategory;
		arrhash[5] = 'color=' + color;
		arrhash[6] = 'sortby=' + sortby;
		arrhash[7] = 'viewlist=' + viewlist;
		arrhash[8] = 'limit=' + limit;
		location.hash = 'ajax_partslist?' +arrhash.join('&');
		});
		
		$('.category-item input').click(function(){
			var basepath = Drupal.settings.basePath;
		var parts_type = $('#parts_type').attr("value");
		var brand = $('.brand-item input:checked').attr('name') ? $('.brand-item input:checked').attr('name') : 0;
		var model = $('#select-model select').attr('value') ? $('#select-model select').attr('value') : 0;
		var category = $('.category-item input:checked').attr("name") ? $('.category-item input:checked').attr("name") : 0;
		var subcategory = $('#select-category select').attr('value') ? $('#select-category select').attr('value') : 0;
		var color = $('.color-item input:checked').attr("name") ? $('.color-item input:checked').attr("name") : 0;
		var sortby = $('#pagsortby').val();
		var viewlist = $('#pagview').val();
		var limit = $('#limit_number').val();
		
		if(brand == 0) model = 0;
		if(category == 0) subcategory = 0;
				
		var arrhash = new Array();
				
		arrhash[0] = 'parts_type=' + parts_type;
		arrhash[1] = 'brand=' + brand;
		arrhash[2] = 'model=' + model;
		arrhash[3] = 'category=' + category;
		arrhash[4] = 'subcategory=' + subcategory;
		arrhash[5] = 'color=' + color;
		arrhash[6] = 'sortby=' + sortby;
		arrhash[7] = 'viewlist=' + viewlist;
		arrhash[8] = 'limit=' + limit;
		location.hash = 'ajax_partslist?' +arrhash.join('&');
		});
														
		$('.color-item input').click(function(){
		var basepath = Drupal.settings.basePath;
		var parts_type = $('#parts_type').attr("value");
		var brand = $('.brand-item input:checked').attr('name') ? $('.brand-item input:checked').attr('name') : 0;
		var model = $('#select-model select').attr('value') ? $('#select-model select').attr('value') : 0;
		var category = $('.category-item input:checked').attr("name") ? $('.category-item input:checked').attr("name") : 0;
		var subcategory = $('#select-category select').attr('value') ? $('#select-category select').attr('value') : 0;
		var color = $('.color-item input:checked').attr("name") ? $('.color-item input:checked').attr("name") : 0;
		var sortby = $('#pagsortby').val();
		var viewlist = $('#pagview').val();
		var limit = $('#limit_number').val();
		
		if(brand == 0) model = 0;
		if(category == 0) subcategory = 0;
				
		var arrhash = new Array();
				
		arrhash[0] = 'parts_type=' + parts_type;
		arrhash[1] = 'brand=' + brand;
		arrhash[2] = 'model=' + model;
		arrhash[3] = 'category=' + category;
		arrhash[4] = 'subcategory=' + subcategory;
		arrhash[5] = 'color=' + color;
		arrhash[6] = 'sortby=' + sortby;
		arrhash[7] = 'viewlist=' + viewlist;
		arrhash[8] = 'limit=' + limit;
		location.hash = 'ajax_partslist?' +arrhash.join('&');
		});
												
		$('#select-model select').change(function(){
			var basepath = Drupal.settings.basePath;
		var parts_type = $('#parts_type').attr("value");
		var brand = $('.brand-item input:checked').attr('name') ? $('.brand-item input:checked').attr('name') : 0;
		var model = $('#select-model select').attr('value') ? $('#select-model select').attr('value') : 0;
		var category = $('.category-item input:checked').attr("name") ? $('.category-item input:checked').attr("name") : 0;
		var subcategory = $('#select-category select').attr('value') ? $('#select-category select').attr('value') : 0;
		var color = $('.color-item input:checked').attr("name") ? $('.color-item input:checked').attr("name") : 0;
		var sortby = $('#pagsortby').val();
		var viewlist = $('#pagview').val();
		var limit = $('#limit_number').val();
		
		if(brand == 0) model = 0;
		if(category == 0) subcategory = 0;
				
		var arrhash = new Array();
				
		arrhash[0] = 'parts_type=' + parts_type;
		arrhash[1] = 'brand=' + brand;
		arrhash[2] = 'model=' + model;
		arrhash[3] = 'category=' + category;
		arrhash[4] = 'subcategory=' + subcategory;
		arrhash[5] = 'color=' + color;
		arrhash[6] = 'sortby=' + sortby;
		arrhash[7] = 'viewlist=' + viewlist;
		arrhash[8] = 'limit=' + limit;
		location.hash = 'ajax_partslist?' +arrhash.join('&');
		});
		
		$('#select-category select').change(function(){
			var basepath = Drupal.settings.basePath;
		var parts_type = $('#parts_type').attr("value");
		var brand = $('.brand-item input:checked').attr('name') ? $('.brand-item input:checked').attr('name') : 0;
		var model = $('#select-model select').attr('value') ? $('#select-model select').attr('value') : 0;
		var category = $('.category-item input:checked').attr("name") ? $('.category-item input:checked').attr("name") : 0;
		var subcategory = $('#select-category select').attr('value') ? $('#select-category select').attr('value') : 0;
		var color = $('.color-item input:checked').attr("name") ? $('.color-item input:checked').attr("name") : 0;
		var sortby = $('#pagsortby').val();
		var viewlist = $('#pagview').val();
		var limit = $('#limit_number').val();
		
		if(brand == 0) model = 0;
		if(category == 0) subcategory = 0;
				
		var arrhash = new Array();
				
		arrhash[0] = 'parts_type=' + parts_type;
		arrhash[1] = 'brand=' + brand;
		arrhash[2] = 'model=' + model;
		arrhash[3] = 'category=' + category;
		arrhash[4] = 'subcategory=' + subcategory;
		arrhash[5] = 'color=' + color;
		arrhash[6] = 'sortby=' + sortby;
		arrhash[7] = 'viewlist=' + viewlist;
		arrhash[8] = 'limit=' + limit;
		location.hash = 'ajax_partslist?' +arrhash.join('&');
		});
	});


$(document).ready(function(){
	$('#pagsortby').livequery('change',function(){
		var basepath = Drupal.settings.basePath;
		var parts_type = $('#parts_type').attr("value");
		var brand = $('.brand-item input:checked').attr('name') ? $('.brand-item input:checked').attr('name') : 0;
		var model = $('#select-model select').attr('value') ? $('#select-model select').attr('value') : 0;
		var category = $('.category-item input:checked').attr("name") ? $('.category-item input:checked').attr("name") : 0;
		var subcategory = $('#select-category select').attr('value') ? $('#select-category select').attr('value') : 0;
		var color = $('.color-item input:checked').attr("name") ? $('.color-item input:checked').attr("name") : 0;
		var sortby = $('#pagsortby').val();
		var viewlist = $('#pagview').val();
		var limit = $('#limit_number').val();
		
		if(brand == 0) model = 0;
		if(category == 0) subcategory = 0;
				
		var arrhash = new Array();
				
		arrhash[0] = 'parts_type=' + parts_type;
		arrhash[1] = 'brand=' + brand;
		arrhash[2] = 'model=' + model;
		arrhash[3] = 'category=' + category;
		arrhash[4] = 'subcategory=' + subcategory;
		arrhash[5] = 'color=' + color;
		arrhash[6] = 'sortby=' + sortby;
		arrhash[7] = 'viewlist=' + viewlist;
		arrhash[8] = 'limit=' + limit;
		location.hash = 'ajax_partslist?' +arrhash.join('&');
	});
													 
	$('#pagview').livequery('change',function(){
		var basepath = Drupal.settings.basePath;
		var parts_type = $('#parts_type').attr("value");
		var brand = $('.brand-item input:checked').attr('name') ? $('.brand-item input:checked').attr('name') : 0;
		var model = $('#select-model select').attr('value') ? $('#select-model select').attr('value') : 0;
		var category = $('.category-item input:checked').attr("name") ? $('.category-item input:checked').attr("name") : 0;
		var subcategory = $('#select-category select').attr('value') ? $('#select-category select').attr('value') : 0;
		var color = $('.color-item input:checked').attr("name") ? $('.color-item input:checked').attr("name") : 0;
		var sortby = $('#pagsortby').val();
		var viewlist = $('#pagview').val();
		var limit = $('#limit_number').val();
		
		if(brand == 0) model = 0;
		if(category == 0) subcategory = 0;
				
		var arrhash = new Array();
				
		arrhash[0] = 'parts_type=' + parts_type;
		arrhash[1] = 'brand=' + brand;
		arrhash[2] = 'model=' + model;
		arrhash[3] = 'category=' + category;
		arrhash[4] = 'subcategory=' + subcategory;
		arrhash[5] = 'color=' + color;
		arrhash[6] = 'sortby=' + sortby;
		arrhash[7] = 'viewlist=' + viewlist;
		arrhash[8] = 'limit=' + limit;
		location.hash = 'ajax_partslist?' +arrhash.join('&');
	});
													 
	$('#limit_number').livequery('change',function(){
		var basepath = Drupal.settings.basePath;
		var parts_type = $('#parts_type').attr("value");
		var brand = $('.brand-item input:checked').attr('name') ? $('.brand-item input:checked').attr('name') : 0;
		var model = $('#select-model select').attr('value') ? $('#select-model select').attr('value') : 0;
		var category = $('.category-item input:checked').attr("name") ? $('.category-item input:checked').attr("name") : 0;
		var subcategory = $('#select-category select').attr('value') ? $('#select-category select').attr('value') : 0;
		var color = $('.color-item input:checked').attr("name") ? $('.color-item input:checked').attr("name") : 0;
		var sortby = $('#pagsortby').val();
		var viewlist = $('#pagview').val();
		var limit = $('#limit_number').val();
		
		if(brand == 0) model = 0;
		if(category == 0) subcategory = 0;
				
		var arrhash = new Array();
				
		arrhash[0] = 'parts_type=' + parts_type;
		arrhash[1] = 'brand=' + brand;
		arrhash[2] = 'model=' + model;
		arrhash[3] = 'category=' + category;
		arrhash[4] = 'subcategory=' + subcategory;
		arrhash[5] = 'color=' + color;
		arrhash[6] = 'sortby=' + sortby;
		arrhash[7] = 'viewlist=' + viewlist;
		arrhash[8] = 'limit=' + limit;
		location.hash = 'ajax_partslist?' +arrhash.join('&');
	});													
});

//parts list
$(document).ready(function(){
	$('#select_brand_list ul.pager a').live('click',function(){
		var href =  $(this).attr('href').substr($(this).attr('href').indexOf('?')+1);
		
		location.hash = 'ajax_partslist?' + href;
		return false;	
	});
});

//printerҳnew parts list
$(document).ready(function(){
	var parts_type = $('#parts_type').attr("value");
	var basepath = Drupal.settings.basePath;
	$('#newproductselect select').change(function(){
		$.ajax({
			'url' : basepath +'ajax_newpartslist',
			'data' : {'parts_type':parts_type,'date':$(this).val()},
			'dataType':'html',
			'success' : function(data) {
				$('#newproductajax').html(data);
			}
		});
	});
});

/**************************************
        frontpage filter search
***************************************/
$(document).ready(function(){
	var base_path = Drupal.settings.basePath;
	$('#select-partstype select').change(function(){
		$("#select-partsbrand select option[index!='0']").remove();
		$("#select-partsmodel select option[index!='0']").remove();
		$.ajax({
			'url' : base_path + 'ajax_filter_brand',
			'data' : {'vid':$(this).val()},
			'dataType' :'json',
			'type' : 'GET',
			'success':function(data){
			 	if (data.length) {
					$.each(data,function(index,term) {
						$('#select-partsbrand select').append("<option value='"+ term['tid'] +"'>"+ term['name'] +"</option>");	
						});
					}
			}
					 });																									
		});
	
	$('#select-partsbrand select').change(function(){
		$("#select-partsmodel select option[index!='0']").remove();
		$.ajax({
			'url' : base_path + 'ajax_mainmodel',
			'data' : {'tid':$(this).val()},
			'dataType' :'json',
			'type' : 'GET',
			'success':function(data){
			 	if (data.length) {
					$.each(data,function(index,term) {
						$('#select-partsmodel select').append("<option value='"+ term['tid'] +"'>"+ term['name'] +"</option>");	
						});
					}
			}
					 });																									
		});
	
	$('#select-sumbit input').click(function(){
		if($('#select-partstype select').val() == 0) {
			alert('Please Select A Product!');
		}
		else {
			var type = $('#select-partstype select').val();
			var brand = $('#select-partsbrand select').val();
			var model = $('#select-partsmodel select').val();
			if(type == 2)
			window.location = base_path + 'printer/filter/' + brand +'/' + model;
			if(type == 5) 
			window.location = base_path + 'copier/filter/' + brand +'/' + model;
			if(type == 7) 
			window.location = base_path + 'catridge/filter/' + brand +'/' + model;
		}
																					 });
});

/***************************************
   Autocomplete search parts
-------------------------------------- */

$(document).ready(function(){
	var base_path = Drupal.settings.basePath;
	$('#enter-part-number').autocomplete('ajax_parts_autocomplete', {
		width:200,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.name,
					result: row.name 
				}
			});
		},
	formatItem: function(item) {
			return item.name;
		}
	}).result(function(e, item) {
		$("#parts-search-button").attr("name",item.nid);
	});
	
	$('.search-button').click(function(){
		var nid = $(this).attr('name');
		if(!nid || nid ==0) alert('Please Select A parts!'); 
		else {
			window.location = base_path + 'node' +'/' + nid;
		}
																		 });
	
	$('#search-keyword').autocomplete('ajax_parts_autocomplete', {
		width:200,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.name,
					result: row.name 
				}
			});
		},
	formatItem: function(item) {
			return item.name;
		}
	}).result(function(e, item) {
		$("#navsearch-button").attr("name",item.nid);
	});
	
	$('.search-button').click(function(){
		var nid = $(this).attr('name');
		if(!nid || nid ==0) alert('Please Select A parts!'); 
		else {
			window.location = base_path + 'node' +'/' + nid;
		}
																		 });
													 });

$(document).ready(function(){
	$('.navlist')
	.ajaxStart(function(){
		$('.small_loading').show();
		$('.parts_num').hide();
	}).ajaxStop(function(){
		$('.small_loading').hide();
		$('.parts_num').show();
	});
	
});


$(document).ready(function(){
	$('.modelout li').hover(
		function(){
		$(this).find('div').show();},
		function(){
		$(this).find('div').hide();}	
	);													 
});

$(document).ready(function(){
   $('#relateparts').tinycarousel({ display: 5});
});

$(document).ready(function(){
	var options = {  
  	zoomType: 'innerzoom'
  };  
	$('.jqzoomimg').jqzoom(options);  
});

$(document).ready(function(){
	var url = location.href;
	$(window).hashchange( function(){
		var hash = location.hash;
		var basepath = Drupal.settings.basePath;
		if (hash.charAt(0) === '#'){
			var isfilter = hash.substr(1,hash.indexOf('?')-1);
			if(isfilter == 'ajax_partslist'){
				
				$.ajax({
					'url' : basepath + hash.substr(1),
					'dataType' : 'json',
					'type' : 'GET',
					'success' : function(data) {
						if(data.select_brand > 0){
							$.each(data.brand_num,function(index,term) {
								if(term['tid'] == data.select_brand){	
									$('#brand-items-list li').each(function() {
										if($(this).attr('id') == term['tid']){
											$(this).show();
											$(this).find('span').html(term['num']);
											$(this).find('input').attr('checked',true);
										}
										else{
											$(this).hide();
										}
									});
								}
							});
							$('#select-model').fadeIn(1000);
						}else{
							$.each(data.brand_num,function(index,term) {
								$('#brand-items-list li').each(function() {
									if($(this).attr('id')== term['tid']){
										if(term['num']>0){
											$(this).show();
											$(this).find('span').html(term['num']);
											$(this).find('input').attr('checked',false);
										}
										else{
											$(this).hide();
										}
									}
								});
							});
							$('#select-model select option[index!=0]').remove();
							$('#select-model').fadeOut(1000);
						}
						
						if(data.model_num.length) {
							$('#select-model select option[index!=0]').remove();
							$.each(data.model_num,function(index,term) {
								if(term['num']>0){
								$("#select-model select").append("<option value='"+ term['tid'] +"'>"+ term['name'] +"("+ term['num'] +")</option>");
								}
							});
							if(data.select_model>0){
								var count=$("#select-model select option").length;
								for(var i=0;i<count;i++){
									if($("#select-model select").get(0).options[i].value == data.select_model){  
									$("#select-model select").get(0).options[i].selected = true;
									break;
									}
								}
							}
						}
						
						if(data.select_category > 0) {	
							$.each(data.category_num,function(index,term) {
								if(data.select_category == term['tid']){
									$('#category-items-list li').each(function() {
										if($(this).attr('id')== term['tid']){
											$(this).find('input').attr('checked',true);
											$(this).find('span').html(term['num']);
											$(this).show();
										}
										else{
											$(this).hide();
										}
									});
								}
							});
							$('#select-category').fadeIn(1000);
						}else{
							$.each(data.category_num,function(index,term) {
								$('#category-items-list li').each(function() {
									if($(this).attr('id')== term['tid']){
										if(term['num']>0){
											$(this).find('input').attr('checked',false);
											$(this).find('span').html(term['num']);
											$(this).show();
										}
										else{
											$(this).hide();
										}
									}
								});
							});
							$('#select-category select option[index!=0]').remove();
							$('#select-category').fadeOut(1000);
						}
						
						if(data.subcategory_num.length) {
							$('#select-category select option[index!=0]').remove();
							$.each(data.subcategory_num,function(index,term) {
								if(term['num']>0){
								$("#select-category select").append("<option value='"+ term['tid'] +"'>"+ term['name'] +"("+ term['num'] +")</option>");
								}
							});
							if(data.select_subcategory>0){
								var count=$("#select-category select option").length;
								for(var i=0;i<count;i++){
									if($("#select-category select").get(0).options[i].value == data.select_subcategory){  
									$("#select-category select").get(0).options[i].selected = true;
									break;
									}
								}
							}
						}
						
						if(data.color_num.length){
							if(data.select_color==0){
							$.each(data.color_num,function(index,term){
								if(term['tid'] == 1){
									if(term['num'] == 0){
										$('li#color').hide();
									}
									else{
										$('li#color').find('span').html(term['num']);
										$('li#color').show();
									}
								}
								if(term['tid'] == 2){
									if(term['num'] == 0){
										$('li#black').hide();
									}
									else{
										$('li#black').find('span').html(term['num']);
										$('li#black').show();
									}
								}
							});
							}
							if(data.select_color==1){
								$.each(data.color_num,function(index,term){
								if(term['tid'] == 1){
									$('li#color').find('span').html(term['num']);
									$('li#color').show();
									$('li#black').hide();
								}
								});
							}
							if(data.select_color==2){
								$.each(data.color_num,function(index,term){
								if(term['tid'] == 2){
									$('li#black').find('span').html(term['num']);
									$('li#black').show();
									$('li#color').hide();
								}
								});
							}
						}	
					$('.navprod').html(data.partslist);
				}	
				});
			}
		}
	});
	$(window).hashchange();
})