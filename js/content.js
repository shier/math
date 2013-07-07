var ie = (typeof window.ActiveXObject != 'undefined');

var menuID
var submenuID
var menuList=new Array()
menuList[0]=["index.html",[]];
menuList[1]=["zygk",["xxjj","xyjj","zyjs"]]
menuList[2]=["szdw",["xybz","zyfzr","xkbsz","teacher.php"]]
menuList[3]=["kctx",["pyfa","xkzd","professional","jxgl","pjtx"]]
menuList[4]=["jpkc",["kcjs","apply","jxdg","teachingplan","ktsp"]]
menuList[5]=["sjjx",["kcsj","bysj","kjjs"]]
menuList[6]=["rcpy",["xshj","jyzd","shpj"]]
menuList[7]=["xkyky",["xkjs","yjfx","xsjj","kycg"]]
menuList[8]=["stkxz",["stkjs","downlist.php"]]
menuList[9]=["kjxz",["kjml","kjxz"]]
menuList[10]=["qa",["qa.php","addquestion.html"]]
menuList[11]=["最新公告",["newslist.php?showmode=2","shownews.php"]]
menuList[12]=["新闻动态",["newslist.php?showmode=1","shownews.php"]]
menuList[13]=["精品课程",["newslist.php?showmode=2",""]]
menuList[14]=["address",["address",""]]
menuList[15]=["sitemap",["sitemap",""]]
function jumpto(url){
	
	if(ie){
			window.location.href(url);
		}else{
			window.location=url;
	}	
}
function geturl(str){
	if(str.indexOf(".")<0){
		return str+".html"
	}else{
		return str
	}
	
}
$(function(){
	menuID=$.cookie("menuID")
	
	submenuID=$.cookie("submenuID")
	teacherID=$.cookie("teacherID")
	if(menuID==undefined){menuID=0}
	if(teacherID==undefined){teacherID=-1}
	if(submenuID==undefined){submenuID=0}
	
	swfobject.embedSWF("submenu.swf?menuID="+menuID+"&submenuID="+submenuID, "submenu", "775", "26", "8.0.0", "expressInstall.swf"); 
	//jumpsubPage(menuID,submenuID)
	if(menuID==0){
		jumpto("index.html");
	}else{
		if(menuID==2 && submenuID==3 && teacherID>-1){
			$("#content").attr("src","detail.php");
		}else{
			$("#content").attr("src",geturl(menuList[menuID][1][submenuID]))
		}
	}
});


function jumpsubPage(mid,sid){
	$.cookie("menuID",mid)
	$.cookie("submenuID",sid)
	$.cookie("teacherID",-1)
	if(mid==2 && sid==3 && $.cookie("depID")==undefined){
			$.cookie("depID",1)
	}
	if(menuID==0){
		jumpto("index.html");
	}else{
		jumpto("content.html");
		//$("#content").attr("src",geturl(menuList[mid][1][sid]))
	}
}