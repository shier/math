var ie = (typeof window.ActiveXObject != 'undefined');

var menuID
var submenuID=0

function jumpto(url){
	
	if(ie){
			window.location.href(url);
		}else{
			window.location=url;
	}	
}
$(function(){
	if($.cookie("showmode")==undefined){$.cookie("showmode",1)}
	
	menuID=13-$.cookie("showmode")
	swfobject.embedSWF("submenu.swf?menuID="+menuID+"&submenuID=0", "submenu", "775", "26", "8.0.0", "expressInstall.swf"); 
	
	$("#content").attr("src","newslist.php");
	
	
});
