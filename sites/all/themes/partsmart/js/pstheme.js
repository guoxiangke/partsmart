$(document).ready(function() { 

	var $handler,lindex = 0,$handlerps;
	 
	$handler = $('#navv li').each(function(ind){ this.iv= ind;});
	$('#navv li').css( 'cursor', 'pointer');
	 
	$('#navv li').hover(function(){
		$('.banerimg').hide();
		$('#navv li a').removeClass();
		$('#navv li a').eq(this.iv).addClass('navo'+(this.iv+1));
		$('.banerimg').eq(this.iv).show();
	});
	
	var $handlerv;
	 
	$handlerv = $('#nav li').each(function(ind){ this.iv= ind;});
	$('#nav li').css( 'cursor', 'pointer');
	 
	$('#nav li').hover(function(){
		$('.banerimg').hide();
		//$('#nav li a').removeClass();
		//$('#nav li a').eq(this.iv).addClass('navo'+(this.iv+1));
		$('.banerimg').eq(this.iv).show();
	}); 

	
   $handlerps = $('#partssearch .left-slide').each(function(i){ this.si= i;});

   	$('#partssearch .left-slide').click(function(){
    
		$('#partssearch .chlid').hide();
		$('#partssearch .child').eq(this.si).toggle();
		return false;
	}); 

   $handlerpsd = $('.part_compatible-models .parent-part-cm').each(function(i){ this.cm= i;});

   	$('.part_compatible-models .parent-part-cm').hover(function(){
        console.log("kk  kk "+ this.cm);
		$('.part_compatible-models   .part-child-cm').hide();
		$('.part_compatible-models .parent-part-cm .part-child-cm').eq(this.cm).toggle();
	    $(this).addClass('pspm1');
		return false;
	},
	function (){
		$('.part_compatible-models .part-child-cm').hide();
	    $(this).removeClass('pspm1');

	}
	); 


 $handlerpsc = $('.pt-diagram ').each(function(i){ this.pcm= i;});
   
   	$('.pt-diagram ').hover(function(){
		   $('.pt-diagram').css( 'cursor', 'pointer');
	       $('#product-silde li a').removeClass('pcp');
	       var bigimg = $('#product-silde .dgindex').eq(this.pcm).attr('bigimg');
           $('#prdshowbigimg').attr('src',bigimg);
		   $('#product-silde li a').eq((this.pcm+1)).addClass('pcp');
		return false;
	}); 

$('.banerimg').hover(function(){
  
     

},function(){
  var index = $('.banerimg').index(this);
	$('.banerimg').eq(index).hide();

}

);




 });


	 
function addRounded(mel,mlink){
    htmlString = '';
    htmlString += '<div style="margin:0 4px; background:#B0BEC7; height:1px; overflow:hidden;"></div>';
    htmlString += '<div style="margin:0 2px; border:1px solid #B0BEC7; border-width:0 2px; background:#E1E7E9; height:1px; overflow:hidden;"></div>';
    htmlString += '<div style="margin:0 1px; border:1px solid #B0BEC7; border-width:0 1px; background:#E1E7E9; height:1px; overflow:hidden;"></div>';
    htmlString += '<div style="margin:0 1px; border:1px solid #B0BEC7; border-width:0 1px; background:#E1E7E9; height:1px; overflow:hidden;"></div>';
    htmlString += '<div style="background:#E1E7E9; border:1px solid #B0BEC7; border-width:0 1px;">';
    htmlString += '<a href="'+mlink+'">Coporate History</a><br />';
    htmlString += '</div>';
    htmlString += '<div style="margin:0 1px; border:1px solid #B0BEC7; border-width:0 1px; background:#E1E7E9; height:1px; overflow:hidden;"></div>';
    htmlString += '<div style="margin:0 1px; border:1px solid #B0BEC7; border-width:0 2px; background:#E1E7E9; height:1px; overflow:hidden;"></div>';
    htmlString += '<div style="margin:0 2px; border:1px solid #B0BEC7; border-width:0 2px; background:#E1E7E9; height:1px; overflow:hidden;"></div>';
    htmlString += '<div style="margin:0 4px; background:#B0BEC7; height:1px; overflow:hidden;"></div>';
    mel.innerHTML=htmlString;
    //alert(htmlString);
}
function removeRounded(mel,mlink){
    htmlString = '<a href="'+mlink+'">Coporate History</a><br />';
    //alert(htmlString);
    mel.innerHTML=htmlString;
}


 function initFeatureSlide(strId) {
    var domRoot = document.getElementById('feature-slide-block');
    if (!domRoot) return;
    domRoot.list = [];
    var children = domRoot.childNodes;
    var offset = 0;
    for (var i in children) {
        var domItem = children[i];
        if (domItem && domItem.className == 'feature-slide-preview') {
            domRoot.list.push(domItem);
            domItem.offset = offset;
            offset++;
        }
    }
    var domList = document.getElementById('feature-slide-list-items');
    if (!domList) return;
    domList.innerHTML = '';
    domList.items = [];
    for (var i = 0; i < domRoot.list.length; i++) {
        var temp = domRoot.list[i];
        var domItem = document.createElement('a');
        domList.appendChild(domItem);
        domItem.href = '#';
        domItem.onclick = function(){
            return false;
        }
        domList.items.push(domItem);
        domItem.offset = i;
    }
    var domPreviousBtn = document.getElementById('feature-slide-list-previous');
    var domNextBtn = document.getElementById('feature-slide-list-next');
    domPreviousBtn.onclick = function(evt) {
        evt = evt || window.event;
        var target = evt.target || evt.srcElement;
        var offset = domList.current.offset;
        offset--;
        if (offset >= domList.items.length || offset < 0)
            offset = domList.items.length - 1;
        target.blur();
        doSlide(offset);
        return false;
    }
    domNextBtn.onclick = function(evt) {
        evt = evt || window.event;
        var target = evt.target || evt.srcElement;
        var offset = domList.current.offset;
        offset++;
        if (offset >= domList.items.length || offset < 0)
            offset = 0;
        target.blur();
        doSlide(offset);
        return false;
    }
    domRoot.current = domRoot.list[0];
    domList.current = domList.items[0];
    domRoot.current.style.display = 'block';
    domList.current.className = 'current';
    function doSlide(offset, timeStamp) {
        if (
            timeStamp &&
            (
                domRoot.boolHover ||
                timeStamp != domRoot.timeStamp
                )
                ) return;

        if (typeof(offset) != 'number') {
            offset = domList.current.offset - (-1);
            if (offset >= domList.items.length || offset < 0)
                offset = 0;
        }
        domRoot.current.style.display = 'none';
        domList.current.className = '';
        domRoot.current = domRoot.list[offset];
        domList.current = domList.items[offset];
        domRoot.current.style.display = 'block';
        domList.current.className = 'current';
        if (domRoot.boolHover) return;
        var now = new Date();
        domRoot.timeStamp = now.valueOf();
        window.setTimeout(function() {
            doSlide(null, now.valueOf());
        }, 5000);
    }
    domList.onmouseover = domList.onclick = function (evt) {
        evt = evt || window.event;
        var target = evt.target || evt.srcElement;
        while (target && target != domList) {
            if (target.tagName.toLowerCase() == 'a') {
                target.blur();
                doSlide(target.offset);
                return false;
            }
            target = target.parentNode;
        }
    }
    domRoot.onmouseover = domRoot.onmousemove = function() {
        domRoot.boolHover = true;
    }
    domRoot.onmouseout = function(evt) {
        domRoot.boolHover = false;
        var now = new Date();
        domRoot.timeStamp = now.valueOf();
        window.setTimeout(function() {
            doSlide(null, now.valueOf());
        }, 5000);
    }
    var now = new Date();
    domRoot.timeStamp = now.valueOf();
    window.setTimeout(function() {
        doSlide(null, now.valueOf());
    }, 5000);
}