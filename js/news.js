var ie = (typeof window.ActiveXObject != 'undefined');

function jumpNews(){
	jumpTOP("index.php?menuID=12&submenuID=0&id="+idList[this.id]+"&showmode=2")
}
function jumpTOP(url){
	
	if(ie){
			top.window.location.href(url);
		}else{
			top.window.location=url;
	}	
}
function jump(url){
	
	if(ie){
			window.location.href(url);
		}else{
			window.location=url;
	}	
}
var showmode
$(function(){

	$(".newsList").each(function(index){  
   
	   $(this).bind({  
            mouseover:function(){  
            	this.style.backgroundColor = "#EEF8FF";  
             },
			 mouseout:function(){  
           		 this.style.backgroundColor = "white";
				 
			 },
			 click:function(){
				 var nid=$(this).attr("id");
				 nid=nid.substring(8,nid.length)
				 $.cookie("menuID",$('#showMode').val());
				$.cookie("showmode",2);
				$.cookie("newsID",nid);
				jumpTOP("content.html")
			 }
			 
	   })
	   
	});
	showmode=$.cookie("showmode")
	if(showmode==undefined){showmode=1}
	swfobject.embedSWF("midmenu.swf?id="+showmode, "midmenu", "488", "23", "8.0.0", "expressInstall.swf");
});


function shownews(nid){
	$.cookie("showmode",nid)
	jump("news.php")
	
}

function showmore(){
	menuID=13-showmode
	submenuID=0
	$.cookie("menuID",menuID)
	$.cookie("submenuID",submenuID)
	jumpTOP("content.html")
	
}
