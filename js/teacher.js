var ie = (typeof window.ActiveXObject != 'undefined');


function jumpto(url){
	
	if(ie){
			window.location.href(url);
		}else{
			window.location=url;
	}	
}
function changepage(pid){
	$.cookie("depID",pid)
	jumpto("teacher.php")
	
}
function getCookies(cname){
	if($.cookie(cname)==undefined){
		return 0
	}else{
		return $.cookie(cname);
	}
}
var depID,teacherID
$(function(){
	depID=getCookies('depID')
	if(depID==0){depID=1}
	swfobject.embedSWF("depmenu.swf?menuID="+depID, "depmenu", "686", "25", "8.0.0", "expressInstall.swf"); 
	
	$.get("res/getteacher.php?depid="+depID, function(result){
		$('#teacherList').html(result);
		setupbtn();
	});
	
});
function setupbtn(){
	var fcolor="#F3F3F3";
	var bcolor="#DEE9F7";
	$('.nameList td').addClass('tablecontent');
	$(".nameList").each(function(index){  
		this.style.backgroundColor = (index % 2 != 1 ?  "#F3F3F3":"#DEE9F7"); 
	   $(this).bind({  
            mouseover:function(){  
            	this.style.backgroundColor = "#EEF8FF";  
             },
			 mouseout:function(){  
           		 this.style.backgroundColor = (index % 2 != 1 ? "#F3F3F3":"#DEE9F7")
				 
			 },
			 click:function(){
				 var nid=$(this).attr("id");
				 nid=nid.substring(8,nid.length)
				if(nid != "0"){
					$.cookie("teacherID",nid);
					jumpto("detail.php")
				}
			 }
			 
	   })
	});
	var main = $(window.parent.document).find("#content");
	var thisheight = $(document).height();
	main.height(thisheight+30);
}