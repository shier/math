var menuID=0
var submenuID=0

$(function(){
	swfobject.embedSWF("banner.swf", "butMenu", "287", "408", "8.0.0", "expressInstall.swf");  
	swfobject.embedSWF("members.swf", "members", "488", "273", "8.0.0", "expressInstall.swf"); 
	getQList();


	$('#downKeJian').bind({
		click:function(){
			$.cookie("menuID",9);
			$.cookie("submenuID",1);
			jumpto("content.html")
		}
	});

	$('#downLib').bind({
		click:function(){
			$.cookie("menuID",8);
			$.cookie("submenuID",1);
			jumpto("content.html")
		}
	});
	$('#classTiXi').bind({
		click:function(){
			$.cookie("menuID",3);
			$.cookie("submenuID",0);
			jumpto("content.html")
		}
	});
	$('#jumpQA').bind({
		click:function(){
			$.cookie("menuID",10);
			$.cookie("submenuID",0);
			jumpto("content.html")
		}
	});
	
	
});
function showteacher(did,tid){
	$.cookie("depID",did);
	$.cookie("teacherID",tid);
	$.cookie("menuID",2);
	$.cookie("submenuID",3);
	jumpto("content.html")
}
function getQList(){
	$.get("res/getqlist.php", function(result){
		$('#qlist').html(result);
		$('.qa_title').bind({
		click:function(){
			$.cookie("menuID",10);
			$.cookie("submenuID",0);
			jumpto("content.html")
		}
	});
	});
}

function jumptoPage(mid,sid){
	$.cookie("menuID",mid);
	$.cookie("submenuID",sid);
	jumpto("content.html")
	
}