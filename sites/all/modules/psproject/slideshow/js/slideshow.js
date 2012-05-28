Drupal.behaviors.abowd= function(context) {
	$('.tcontent-theme-project-wrapper',context).bind('mouseover',function(){

		$(this).children('.tcontent-theme-project-title').css('display','block');

	});

	$('.tcontent-theme-project-wrapper',context).bind('mouseout',function(){

		$(this).children('.tcontent-theme-project-title').css('display','none');

	});



	if($('.banner-wrapper',context).length > 0){

		var interval=8000;

		var bannerInt=setInterval(function(){

			$('.banner-scrollable',context).animate({left:'-='+954},'normal',function(){

				$(this).css('left',0);

				var bannerBlock=$('.banner-block',context);

				$('.banner-block',context).removeClass('banner-block').next('.banner').addClass('banner-block');

				bannerBlock.appendTo('.banner-scrollable');

			});

		},interval);



		$('.banner-wrapper',context).bind('mouseover',function(event){

			$('.slider-left-arrow',context).css('display','block');

			$('.slider-right-arrow',context).css('display','block');

		});



		$('.banner-wrapper',context).bind('mouseout',function(event){

			$('.slider-left-arrow',context).css('display','none');

			$('.slider-right-arrow',context).css('display','none');

		});



		$('.slider-left-arrow',context).bind('click',function(event){

			clearInterval(bannerInt);

			var bannerBlock=$('.banner-scrollable .banner:last',context);

			$('.banner-block',context).removeClass('banner-block');

			bannerBlock.prependTo('.banner-scrollable').addClass('banner-block');

			$('.banner-scrollable',context).css('left',-954);

			$('.banner-scrollable',context).animate({left:'+='+954},'normal',function(){

				$(this).css('left',0);

				bannerInt=setInterval(function(){

					$('.banner-scrollable',context).animate({left:'-='+954},'normal',function(){

						$(this).css('left',0);

						var bannerBlock=$('.banner-block',context);

						$('.banner-block',context).removeClass('banner-block').next('.banner').addClass('banner-block');

						bannerBlock.appendTo('.banner-scrollable');

					});

				},interval);

			});

		});





		$('.slider-right-arrow',context).bind('click',function(event){

			clearInterval(bannerInt);

			$('.banner-scrollable',context).animate({left:'-='+954},'normal',function(){

				$(this).css('left',0);

				var bannerBlock=$('.banner-block',context);

				$('.banner-block',context).removeClass('banner-block').next('.banner').addClass('banner-block');

				bannerBlock.appendTo('.banner-scrollable');



				bannerInt=setInterval(function(){

					$('.banner-scrollable',context).animate({left:'-='+954},'normal',function(){

						$(this).css('left',0);

						var bannerBlock=$('.banner-block',context);

						$('.banner-block',context).removeClass('banner-block').next('.banner').addClass('banner-block');

						bannerBlock.appendTo('.banner-scrollable');

					});

				},interval);



			});

		});

	}

	/*

	 * ABOWD NAVI BAR

	 */

//	 var concor_tab_width=0;

//	for(var w=0;w<$('.concor-tab',context).length;w++){

//		concor_tab_width=concor_tab_width+$('.concor-tab',context).eq(w).width();	

//	}

//	if(concor_tab_width > 0 && concor_tab_width < $('.scrollable').width()){

//		var factor=$('.scrollable').width()/concor_tab_width;

//		$('.concor-tab',context).css('width',$('.concor-tab',context).width()*factor);

//	}



	$('.abowd-home-navibar img',context).bind('mousemove',function(event){

		var origiPos=$(this).parents('.zoupl').offset().left;

		$(this).parents('.zoupl').css('cursor','pointer');

		var moveL=event.pageX-$('.abowd-home-navibar').offset().left;

		$(this).parents('.zoupl').css('left',moveL-20);

		moveD=$(this).parents('.zoupl').offset().left-origiPos;

		if(moveD < 0){

			if($('.concor-tab:first').offset().left < $('.scrollable',context).offset().left){

				var x=$('.scrollable',context).offset().left-$('.concor-tab:first').offset().left;	

				var y=origiPos-$('.scrollable',context).offset().left;

				$('.concor',context).css('left',parseInt($('.concor',context).css('left'))+Math.abs(moveD)*x/y);

			}

		}else if(moveD > 0){

			if(($('.concor-tab:last').offset().left+$('.concor-tab:last').width()) > ($('.scrollable',context).offset().left+$('.scrollable',context).width())){

				var x=$('.concor-tab:last').offset().left+$('.concor-tab:last').width()-$('.scrollable',context).offset().left-$('.scrollable',context).width();	

				var y=($('.scrollable',context).offset().left+$('.scrollable',context).width())-origiPos-$(this).parents('.zoupl').width();

				$('.concor',context).css('left',parseInt($('.concor',context).css('left'))-Math.abs(moveD)*x/y);

			}

		}



		if($(this).parents('.zoupl').offset().left <= $('.abowd-home-navibar',context).offset().left){

			$(this).parents('.zoupl').css('left',0);

		}else if($(this).parents('.zoupl').offset().left+$(this).parents('.zoupl').width() >= $('.abowd-home-navibar',context).offset().left+$('.abowd-home-navibar',context).width())			{

			$(this).parents('.zoupl').css('left',$('.abowd-home-navibar',context).width()-$(this).parents('.zoupl').width());

		}

	});

	$('.concor-tab',context).bind('click',function(event){

		if($(this).offset().left < $('.scrollable',context).offset().left){

			var itemL=$(this).offset().left;

			var newItemL=$(this,context).offset().left-$('.zoupl',context).offset().left+$(this,context).width()/2-10+$('.scrollable',context).offset().left-itemL;

			$('.concor',context).animate({left:'+='+($('.scrollable',context).offset().left-itemL)},"normal");

			$('.zoupl',context).animate({left:'+='+(newItemL)},'normal');

		}else if($(this).offset().left+$(this).width() > $('.scrollable',context).offset().left+$('.scrollable',context).width()){

			var itemL=$(this).offset().left+$(this).width()+13;

			var newItemL=$(this,context).offset().left-(itemL-($('.scrollable',context).offset().left+$('.scrollable',context).width()))-$('.zoupl',context).offset().left+$(this,context).width()/2-10;

			$('.concor',context).animate({left:'-='+(itemL-($('.scrollable',context).offset().left+$('.scrollable',context).width()))},"normal");

			$('.zoupl',context).animate({left:'+='+(newItemL)},'normal');

		}else{

			var newItemL=$(this,context).offset().left-$('.zoupl',context).offset().left+$(this,context).width()/2-10;

			$('.zoupl',context).animate({left:'+='+(newItemL)},'normal');

		}



		var num=/\d+/.exec($(this).attr('id'));



		$('.concor-tab',context).removeClass('concor-active-tab');

		$(this).addClass('concor-active-tab');

		$('.tcontent',context).fadeOut(200);

		$("#tcontent-"+num,context).fadeIn(1000);

		



	});





	$('.abowd-home-navibar',context).bind('mouseover',function(event){

		if((event.pageX > $('.abowd-home-navibar img',context).offset().left+$('.abowd-home-navibar img',context).width()) && (($('.zoupl',context).offset().left+$('.zoupl',context).width()) < ($('.scrollable',context).offset().left+$('.scrollable',context).width())) && ($('.concor-tab:last',context).offset().left+$('.concor-tab:last').width()) > ($('.scrollable',context).offset().left+$('.scrollable',context).width())){

			var concorL=$('.concor-tab:last',context).offset().left+$('.concor-tab:last',context).width()-$('.scrollable',context).offset().left-$('.scrollable',context).width();

			var zouplR=$('.scrollable',context).offset().left+$('.scrollable').width()-$('.zoupl',context).offset().left-$('.zoupl',context).width();



			var concorMove=concorL*(event.pageX-$('.zoupl',context).offset().left-$('.zoupl').width())/zouplR;

			$('.zoupl',context).css('left',event.pageX-$(this).offset().left-$('.zoupl',context).width()/2);

			$('.concor',context).animate({left:'-='+(concorMove)},'normal');	



		}else if((event.pageX < $('.abowd-home-navibar img',context).offset().left) && ($('.zoupl',context).offset().left) > $('.scrollable',context).offset().left && ($('.concor-tab:first',context).offset().left < $('.scrollable',context).offset().left)){

			var concorR=$('.scrollable',context).offset().left-$('.concor-tab:first',context).offset().left;

			var zouplL=$('.zoupl',context).offset().left-$('.scrollable',context).offset().left;

			var concorMove=concorR*($('.zoupl',context).offset().left-event.pageX)/zouplL;

			$('.zoupl',context).css('left',event.pageX-$(this).offset().left-$('.zoupl',context).width()/2);

			$('.concor',context).animate({left:'+='+(concorMove)},'normal');	

		}

	});



	/*

	 * PROJECTS NAVI BAR

	 */

	if($('.navibar',context).length > 0){



		$('.zoupl img',context).bind('mousemove',function(event){

			var origiPos=$(this).parents('.zoupl').offset().left;

			$(this).parents('.zoupl').css('cursor','pointer');

			var moveL=event.pageX-$('.navibar').offset().left;

			$(this).parents('.zoupl').css('left',moveL-20);

			moveD=$(this).parents('.zoupl').offset().left-origiPos;

			if(moveD < 0){

				var x=$('.scrollable',context).offset().left-$('.concor li:first').offset().left;	

				var y=origiPos-$('.scrollable',context).offset().left;

				$('.concor',context).css('left',parseInt($('.concor',context).css('left'))+Math.abs(moveD)*x/y);

			}else if(moveD > 0){

				var x=$('.concor li:last').offset().left+$('.concor li:last').width()-$('.scrollable',context).offset().left-$('.scrollable',context).width();	

				var y=($('.scrollable',context).offset().left+$('.scrollable',context).width())-origiPos-$(this).parents('.zoupl').width();

				$('.concor',context).css('left',parseInt($('.concor',context).css('left'))-Math.abs(moveD)*x/y);

			}



			if($(this).parents('.zoupl').offset().left <= $('.navibar',context).offset().left){

				$(this).parents('.zoupl').css('left',0);

			}else if($(this).parents('.zoupl').offset().left+$(this).parents('.zoupl').width() >= $('.navibar',context).offset().left+$('.navibar',context).width())			{

				$(this).parents('.zoupl').css('left',$('.navibar',context).width()-$(this).parents('.zoupl').width());

			}

		});



		$('.navibar',context).bind('mouseover',function(event){

			if((event.pageX > $('.navibar img',context).offset().left+$('.navibar img',context).width()) && (($('.zoupl',context).offset().left+$('.zoupl',context).width()) < ($('.scrollable',context).offset().left+$('.scrollable',context).width()))){

				var concorL=$('.concor li:last',context).offset().left+$('.concor li:last',context).width()-$('.scrollable',context).offset().left-$('.scrollable',context).width();

				var zouplR=$('.scrollable',context).offset().left+$('.scrollable').width()-$('.zoupl',context).offset().left-$('.zoupl',context).width();



				var concorMove=concorL*(event.pageX-$('.zoupl',context).offset().left-$('.zoupl').width())/zouplR;

				$('.zoupl',context).css('left',event.pageX-$(this).offset().left-$('.zoupl',context).width()/2);

				$('.concor',context).animate({left:'-='+(concorMove)},'normal');	



			}else if((event.pageX < $('.navibar img',context).offset().left) && ($('.zoupl',context).offset().left) > $('.scrollable',context).offset().left){

				var concorR=$('.scrollable',context).offset().left-$('.concor li:first',context).offset().left;

				var zouplL=$('.zoupl',context).offset().left-$('.scrollable',context).offset().left;

				var concorMove=concorR*($('.zoupl',context).offset().left-event.pageX)/zouplL;

				$('.zoupl',context).css('left',event.pageX-$(this).offset().left-$('.zoupl',context).width()/2);

				$('.concor',context).animate({left:'+='+(concorMove)},'normal');	

			}

		});

	}



	$('#edit-keyword',context).bind('click',function(event){

		if($(this).val()=='Search Publications...'){

			$(this).val('');

		}

	});

	/*

	 ** ABOWD HOME STUDENT LIST JS 

	 */

	 //...tedtian 2011-03-30 start ��ʼ�Զ���

	if($('.abowd-home-student-list-wrapper',context).length > 0){

		var interval=8000;

		var shsimv = function(){

			if($('.abowd-home-student-item:first').css('display')!='none'){

				$('.abowd-home-student-item:first').fadeOut(1000,function(){

					

				});

				$('.abowd-home-student-item:last').fadeIn(1000,function(){

					

				});

			}else{

				$('.abowd-home-student-item:visible').fadeOut(1000,function(){



				});

				$('.abowd-home-student-item:visible').prev('.abowd-home-student-item').fadeIn(1000,function(){

					

				});

			}

		};

		var bannerIntstunv = function(){

			bannerIntstu=setInterval(shsimv,interval);

		}

		var cwait=null;

		$('.abowd-student-left-arrow',context).bind('click',function(event){

			clearTimeout(cwait);

			clearInterval(bannerIntstu);

			if($('.abowd-home-student-item:first').css('display')!='none'){

				$('.abowd-home-student-item:first').fadeOut(1000,function(){

					

				});

				$('.abowd-home-student-item:last').fadeIn(1000,function(){

					

				});

			}else{

				$('.abowd-home-student-item:visible').fadeOut(1000,function(){



				});

				$('.abowd-home-student-item:visible').prev('.abowd-home-student-item').fadeIn(1000,function(){

					

				});

			}

			cwait = setTimeout(bannerIntstunv,2000);

		});

		$('.abowd-student-right-arrow',context).bind('click',function(event){

			clearTimeout(cwait);

			clearInterval(bannerIntstu);

			if($('.abowd-home-student-item:last').css('display')!='none'){

				$('.abowd-home-student-item:last').fadeOut(1000,function(){

					

				});

				$('.abowd-home-student-item:first').fadeIn(1000,function(){

					

				});

			}else{

				$('.abowd-home-student-item:visible').fadeOut(1000,function(){



				});

				$('.abowd-home-student-item:visible').next('.abowd-home-student-item').fadeIn(1000,function(){

					

				});

			}

			cwait = setTimeout(bannerIntstunv,2000);

		});

		bannerIntstunv();

	}		//...tedtian 2011-03-30 end ��ʼ�Զ���

	

	if($('.conlib',context).length > 0){

		if($('.conlib',context).offset().left+$('.conlib',context).width() > $('.scrollable',context).offset().left+$('.scrollable',context).width()){

			var scrollableL =$('.conlib',context).offset().left+$('.conlib',context).width()-$('.scrollable',context).offset().left-$('.scrollable',context).width(); 

			var interval=($('.conlib',context).offset().left-$('.zoupl',context).offset().left-$('.conlib',context).width());

			$('.concor',context).animate({left:'-='+(scrollableL)},'normal');	

			$('.zoupl',context).animate({left:'+='+($('.conlib',context).offset().left-interval-$('.concor',context).offset().left+$('.conlib',context).width()/2)},"normal");

		}else{

			$('.zoupl',context).animate({left:'+='+($('.conlib',context).offset().left-$('.concor',context).offset().left+$('.conlib',context).width()/2-20)},"normal");

		}

	}



	if($('#Tab1',context).length > 0){

		$('.zoupl',context).animate({left:'+='+($('.concor-tab:first',context).offset().left-$('.concor',context).offset().left+$('.concor-tab:first',context).width()/2-20)},"normal");

	}

	/*



		var i = 0;

		$('.navibar',context).bind('click',function(event){

			if(event.pageX > ($('.zoupl',context).offset().left+$('.navibar-span').width()) && $('.concor li:last',context).offset().left+$('.concor li:last',context).width() >= $('.scrollable',context).offset().left+$('.scrollable',context).width()){

				var scrollableL=$('.concor li:last',context).offset().left+$('.concor li:last',context).width()-($('.scrollable',context).offset().left+$('.scrollable',context).width());

				if(scrollableL < ($('.concor li:last',context).width())){

					$('.concor',context).animate({left:'-='+(scrollableL)},"normal");



					var navibarL=$('.scrollable',context).offset().left+$('.scrollable',context).width()-($('.zoupl',context).offset().left+$('.zoupl',context).width());

					var curserinterval=(scrollableL)*(navibarL/scrollableL)-$('.navibar-span').width();	

				}else{

					var i = 0;

					var targetLi = 0;

					if(($('.concor li',context).eq(i).offset().left <= ($('.scrollable',context).offset().left+$('.scrollable',context).width())) && (($('.concor li',context).eq(i).offset().left+$('.concor li',context).eq(i).width()) > ($('.scrollable',context).offset().left)+$('.scrollable',context).width())){

						targetLi=i;

					}else{

						i=i+1;

					}

					$('.concor',context).animate({left:'-='+($('.concor li',context).eq(targetLi).width())},"normal");

					var navibarL=$('.scrollable',context).offset().left+$('.scrollable',context).width()-($('.zoupl',context).offset().left+$('.zoupl',context).width());

					var curserinterval=($('.concor li',context).eq(targetLi).width())*(navibarL/scrollableL);	

				}



				$('.zoupl',context).animate({left:'+='+(curserinterval)},"normal");



			}else if(event.pageX < ($('.zoupl').offset().left) && ($('.concor li:first',context).offset().left) <= $('.scrollable',context).offset().left){

				var scrollableL=$('.scrollable',context).offset().left-$('.concor li:first',context).offset().left;

				if(scrollableL < ($('.concor li:first',context).width())){

					$('.concor',context).animate({left:'+='+(scrollableL)},"normal");

					var navibarL=($('.zoupl',context).offset().left)-$('.scrollable',context).offset().left;

					var curserinterval=navibarL-$('.navibar-span').width();	

				}else{

					var i = 0;

					var targetLi = 0;

					if(($('.concor li',context).eq(i).offset().left <= $('.scrollable',context).offset().left) && (($('.concor li',context).eq(i).offset().left+$('.concor li',context).eq(i).width()) > $('.scrollable',context).offset().left)){

						targetLi=i;

					}else{

						i=i+1;

					}

					$('.concor',context).animate({left:'+='+($('.concor li',context).eq(targetLi).width())},"normal");

					var navibarL=($('.zoupl',context).offset().left)-$('.scrollable',context).offset().left;

					var curserinterval=(navibarL/scrollableL)*$('.concor li',context).eq(targetLi).width();	

				}

				$('.zoupl',context).animate({left:'-='+(curserinterval)},"normal");



				i=i-1;

			}

		});	

	}



	if($('#Tab1',context).length > 0){



		var i=0;



		$('.abowd-home-navibar',context).bind('click',function(event){

			if(event.pageX > ($('.zoupl',context).offset().left+$('.navibar-span').width()) && $('.concor-tab:last',context).offset().left+$('.concor-tab:last',context).width() >= $('.scrollable',context).offset().left+$('.scrollable',context).width()){

				var scrollableL=$('.concor-tab:last',context).offset().left+$('.concor-tab:last',context).width()-($('.scrollable',context).offset().left+$('.scrollable',context).width());

				if(scrollableL < ($('.concor-tab',context).eq(i).width()+13)){

					$('.concor',context).animate({left:'-='+(scrollableL+13)},"normal");

					var navibarL=$('.scrollable',context).offset().left+$('.scrollable',context).width()-($('.zoupl',context).offset().left+$('.zoupl',context).width());

					var curserinterval=(scrollableL+13)*(navibarL/scrollableL)-$('.navibar-span').width()-20;	

				}else{

					$('.concor',context).animate({left:'-='+($('.concor-tab',context).eq(i).width()+13)},"normal");

					var navibarL=$('.scrollable',context).offset().left+$('.scrollable',context).width()-($('.zoupl',context).offset().left+$('.zoupl',context).width());

					var curserinterval=($('.concor-tab',context).eq(i).width()+13)*(navibarL/scrollableL);	

				}



				$('.zoupl',context).animate({left:'+='+(curserinterval)},"normal");

				i=i+1;

			}else if(event.pageX < ($('.zoupl').offset().left) && ($('.concor div:first',context).offset().left+$('.concor div:first',context).width()/2) <= $('.scrollable',context).offset().left){



				var scrollableL=$('.scrollable',context).offset().left-$('.concor-tab:first',context).offset().left;

				if(scrollableL < ($('.concor-tab',context).eq(i-1).width()+13)){

					$('.concor',context).animate({left:'+='+(scrollableL)},"normal");

					var navibarL=($('.zoupl',context).offset().left)-$('.scrollable',context).offset().left;

					var curserinterval=(scrollableL+13)*navibarL/scrollableL-$('.concor div:first',context).width()/2;	

				}else{

					if($('.concor-tab',context).eq(i-1).offset().left < $('.scrollable',context).offset().left && ($('.concor-tab',context).eq(i-1).offset().left+$('.concor-tab',context).eq(i-1).width()) > $('.scrollable',context).offset().left){

						var animateL=$('.scrollable',context).offset().left-$('.concor-tab',context).eq(i-1).offset().left;

						$('.concor',context).animate({left:'+='+(animateL)},"normal");

						var navibarL=($('.zoupl',context).offset().left)-$('.scrollable',context).offset().left;

						var curserinterval=(animateL+13)*navibarL/scrollableL;	

					}else{

						$('.concor',context).animate({left:'+='+($('.concor-tab',context).eq(i-1).width()+13)},"normal");

						var navibarL=($('.zoupl',context).offset().left)-$('.scrollable',context).offset().left;

						var curserinterval=($('.concor-tab',context).eq(i).width()+13)*navibarL/scrollableL;	

					}

				}

				$('.zoupl',context).animate({left:'-='+(curserinterval)},"normal");



				i=i-1;

			}

		});	

	}

	

	*/





	/*

	 ** NEWS HOME SLIDER SHOW

	 */

	if($(".feature-news-wrapper:last").attr('class') != $(".feature-news-wrapper:first").attr('class')){

		var interval=5000;

		var int=setInterval(function(){

			if($(".feature-news-wrapper:last").css('display')!='none'){

				$(".feature-news-wrapper:last").fadeOut(1000,function(){

					$(this).removeClass('news-show');	

					$(this).addClass('news-hide');

				});

				$(".feature-news-wrapper:first").fadeIn(1000,function(){

					$(this).addClass('news-show');	

					$(this).removeClass('news-hide');

				});

				$('.active-news-dot',context).removeClass('active-news-dot');

				$('.news-dots li:first',context).addClass('active-news-dot');

			}else{

				$(".feature-news-wrapper:visible",context).fadeOut(1000,function(){

					$(this).removeClass('news-show');

					$(this).addClass('news-hide');

				});

				$(".feature-news-wrapper:visible",context).next(".feature-news-wrapper").fadeIn(1000,function(){

					$(this).addClass('news-show');

					$(this).removeClass('news-hide');

				});

				if($('.news-dots li:last').attr('class')=='active-news-dot'){

					$('.news-dots .active-news-dot',context).removeClass('active-news-dot');

					$('.news-dots li:first',context).addClass('active-news-dot');

				}else{

					$('.news-dots .active-news-dot',context).removeClass('active-news-dot').next('li').addClass('active-news-dot');

				}

			}

		},interval);

		$('.news-dots li',context).bind('mouseover',function(event){

			clearInterval(int);

			if($(this).attr('class')!='active-news-dot'){

				$('.active-news-dot',context).removeClass('active-news-dot');

				$(this).addClass('active-news-dot');

				$('.feature-news-wrapper',context).css('display','none');

				featureNews=/\d+/.exec($(this).attr('id'));

				$('#feature-news-wrapper-'+featureNews,context).css('display','block').addClass('news-show').removeClass('news-hide');

			}

		});

		$('.news-dots li',context).bind('mouseout',function(event){

			int=setInterval(function(){

				if($(".feature-news-wrapper:last").css('display')!='none'){

					$(".feature-news-wrapper:last").fadeOut(1000,function(){

						$(this).removeClass('news-show');	

						$(this).addClass('news-hide');

					});

					$(".feature-news-wrapper:first").fadeIn(1000,function(){

						$(this).addClass('news-show');	

						$(this).removeClass('news-hide');

					});

					$('.active-news-dot',context).removeClass('active-news-dot');

					$('.news-dots li:first',context).addClass('active-news-dot');

				}else{

					$(".feature-news-wrapper:visible",context).fadeOut(1000,function(){

						$(this).removeClass('news-show');

						$(this).addClass('news-hide');

					});

					$(".feature-news-wrapper:visible",context).next(".feature-news-wrapper").fadeIn(1000,function(){

						$(this).addClass('news-show');

						$(this).removeClass('news-hide');

					});

					if($('.news-dots li:last').attr('class')=='active-news-dot'){

						$('.news-dots .active-news-dot',context).removeClass('active-news-dot');

						$('.news-dots li:first',context).addClass('active-news-dot');

					}else{

						$('.news-dots .active-news-dot',context).removeClass('active-news-dot').next('li').addClass('active-news-dot');

					}

				}

			},interval);

		});

	}



}