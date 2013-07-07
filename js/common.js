var ie = (typeof window.ActiveXObject != 'undefined');


var nameList=new Array();
nameList[0]=["首页",[]];
nameList[1]=["专业概况",["学校介绍","学院介绍","专业介绍"]];
nameList[2]=["师资队伍",["学院班子","专业负责人","学科部设置","专业教师"]];
nameList[3]=["课程体系",["培养方案","选课指导","专业建设","教学管理","评价体系"]];
nameList[4]=["精品课程",["课程介绍","申报书","教学大纲","教案","课堂视频"]];
nameList[5]=["实践教学",["课程设计","毕业设计","科技竞赛"]];
nameList[6]=["人才培养",["学生获奖","就业指导","社会评价"]];
nameList[7]=["学科与科研",["学科介绍","研究方向","学术交流","科研成果"]];
nameList[8]=["试题库下载",["试题库介绍","试题库下载"]];
nameList[9]=["课件下载",["课件目录","课件下载"]];

var leftPosition=new Array(0,10,20,30,40,50,60,70,80,90,100)
function putUpMenuArea(){
	str='<table width="1000" border=0 cellspacing=0 cellpadding=0 align="center">';
 	str+='<tr><td width="225"><img name="homepage_r1_c1" src="images/homepage_r1_c1.jpg" width="225" height="101" border=0 id="homepage_r1_c1" alt="" /></td>';
	str+='<td width="775"><table width="775" border=0 cellspacing=0 cellpadding=0>';
	str+='<tr><td height="31" valign="bottom" align="right" style="padding-right:40px"><table width="181" border=0 cellspacing=0 cellpadding=0 >';
	str+='<tr><td align="center" height="17"><div id="topmenu"></div></td></tr></table></td></tr>';
	str+='<tr><td height="70" id="menuContent"><table width=750 border=0 align=center cellpadding=0 cellspacing=0>';
	str+='<tr><td height=20></td></tr><tr><td><div id="menuarea"></div></td></tr><tr><td height=25><div id="subarea"></div></td></tr></table></td></tr></table></td></tr></table>';
	$(str).appendTo($('#mainTopArea'));
	var k=0
	for(i=0;i<10;i++){
		ref="#"
		if(i==0){ref="index.html"}
		$("<div id='mMenu"+i+"' class='mainMenu'>"+nameList[i][0]+"</div>").appendTo($('#menuarea'));
		if(nameList[i][1].length>0){
			$('<div id="sMain'+i+'" class="subMain"></div>').appendTo($('#subarea'));
			for(j=0;j<nameList[i][1].length;j++){
				$('<div id="sMenu'+k+'" class="subMenu">'+nameList[i][1][j]+'</div>').appendTo($('#sMain'+i));	
				$('#sMenu'+k).attr("realID",j)
				k++
				
			}
			$('#sMain'+i).css("left",leftPosition[i])
		}
		
	}

	$('#menuarea').css("left",10);
	$(".mainMenu").each(function(index){  
	   $(this).bind({  
            mouseover:function(){
				$(".mainMenu").removeClass('mainMenuOver'); 
				$(this).addClass('mainMenuOver'); 
				menuID=index
				jsddm_open(index);
				
             },
			 click:function(){
				 if(index==0){
					$.cookie("menuID",0);
					$.cookie("submenuID",0); 
					jumpto("index.html")	
				 }
			 }
	   })
	})
	$(".subMenu").each(function(index){  
	   $(this).bind({  
            mouseover:function(){
				$(this).addClass('subMenuOver'); 
				//jsddm_open(index);
             },
			 mouseout:function(){  
           		 $(this).removeClass('subMenuOver'); 
				 // jsddm_timer(); 
			 },
			 click:function(){
				 $(".subMenu").removeClass('subMenuPick'); 
				 subMenuID=$(this).attr('realID')
				 $.cookie("menuID",menuID)
				 $.cookie("submenuID",subMenuID)
				 $.cookie("teacherID",-1)
				 jumpto("content.html")	
			 }
	   })
	})
}
function putLeftArea(){
	str='<table width="225" border=0 cellspacing=0 cellpadding=0><tr><td height="191"><div id="loginarea"></div></td></tr>';
	str+='<tr><td><img src="images/big_news.jpg" name="newNews" width="225" height="94" border=0 id="newNews" class="overPicture"  /></td></tr>';
	str+='<tr><td><table width="224" border=0 cellspacing=0 cellpadding=0><tr>';
	str+='<td><img src="images/ano_up.jpg" name="newAnonce" width="224" height="39" border=0 id="newAnonce" class="overPicture" /></td></tr>';
	str+='<tr><td><table width="224" border=0 cellspacing=0 cellpadding=0><tr><td width="15" background="images/ano_side.jpg">&nbsp;</td>';
	str+='<td><div id="newAnonceList"></div></td><td width="15" background="images/ano_side.jpg">&nbsp;</td></tr></table></td></tr>';
	str+='<tr><td><img src="images/ano_down.jpg" width="225" height="17" /></td></tr></table></td></tr>';
	str+='<tr><td><table width="225" border=0 cellspacing=0 cellpadding=0><tr>';
	str+='<td><img src="images/lab_qa.jpg" name="teacherQA" width="225" height="67" border=0 id="teacherQA" class="overPicture"/></td></tr>';
	str+='<tr><td><img src="images/lab_address.jpg" name="address" width="225" height="59" border=0 id="address" class="overPicture" /></td></tr>';
	str+='<tr><td><img src="images/lab_sitemap.jpg" name="siteMap" width="225" height="66" border=0 id="siteMap" class="overPicture"/></td></tr></table></td></tr></table>';
	$(str).appendTo($('#leftMenuArea'));
	swfobject.embedSWF("loginbox.swf?userid="+$.cookie("userID")+"&userpower="+$.cookie("userPower"), "loginarea", "225", "191", "8.0.0", "expressInstall.swf"); 
	//alert("loginbox.swf?userid="+$.cookie("userID")+"&userpower="+$.cookie("userPower"));
	$.get("res/getanonce.php", function(result){
			$('#newAnonceList').html(result);
			$('.annonce_title').bind({		 
			click:function(){
			$.cookie("showmode",2);
			$.cookie("menuID",11);
			$.cookie("submenuID",0);
			$.cookie("newsID",$(this).attr("id"));
			jumpto("content.html")
		}
		});
	});
}
function showsubMenu(mid,sid){

	var obj=$("#mainmenu")
	if(	oldmenuid==mid &&  obj.length >0){
		$("#mainmenu").SetVariable("submenuID", sid);
		$("#mainmenu").SetVariable("changemode", 1);
	}else{
		swfobject.embedSWF("submenu.swf?menuID="+mid+"&submenuID="+sid, "submenu", "775", "26", "8.0.0", "expressInstall.swf"); 
		oldmenuid=mid
	}
	
}
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;
var lastOverID=-1
function jsddm_open(index){
	//jsddm_canceltimer();
	//jsddm_close();
	//ddmenuitem = $(this).find('ul').eq(0).css('visibility', 'visible');}
	//$('.subMain').hide();
	if(lastOverID !=-1){
		$('#sMain'+lastOverID).hide();
	}
	var pos=$('#mMenu'+index).offset().left+$('#mMenu'+index).width()*0.5-$('#sMain'+index).width()*0.5
	var poso=$('#mMenu0').offset().left
	pos-=poso
	if(pos<25){pos=25};

	if(pos>725-$('#sMain'+index).width()){
		pos=725-$('#sMain'+index).width();
	}
	
	$('#sMain'+index).css("left",pos)
	$('#sMain'+index).show();
	lastOverID=index
	$('#menuID').focus();
}
function jsddm_close(){
	if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');
}

function jsddm_timer(){
	closetimer = window.setTimeout(jsddm_close, timeout);
}

function jsddm_canceltimer(){
	if(closetimer){
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}
$(function(){
	putUpMenuArea();
	putLeftArea();
	$(".overPicture").each(function(index, element) {
		var picname=$(this).attr("src")
		picname=picname.substring(0,picname.length-4)
		
        $(this).attr("picname",picname)
		$(this).bind({  
            mouseover:function(){  
           $(this).attr("src",$(this).attr("picname")+"_o.jpg")
             },
			 mouseout:function(){  
            $(this).attr("src",$(this).attr("picname")+".jpg")
			 }
	   })
    });
	$('#newNews').bind({
		click:function(){
			$.cookie("showmode",1);
			$.cookie("menuID",12);
			$.cookie("submenuID",0);
			jumpto("content.html")
		}
	});
	$('#newAnonce').bind({
		click:function(){
			$.cookie("showmode",2);
			$.cookie("menuID",11);
			$.cookie("submenuID",0);
			jumpto("content.html")
		}
	});
	$('#teacherQA').bind({
		click:function(){
			$.cookie("menuID",10);
			$.cookie("submenuID",0);
			jumpto("content.html")
		}
	});
	
	$('#address').bind({
		click:function(){
			$.cookie("menuID",14);
			$.cookie("submenuID",0);
			jumpto("content.html")
		}
	});
	$('#siteMap').bind({
		click:function(){
			$.cookie("menuID",15);
			$.cookie("submenuID",0);
			jumpto("content.html")
		}
	});
	/*
	$(".leftNewsList").each(function(index){  
   
	   $(this).bind({  
            mouseover:function(){  
            	this.style.backgroundColor = "#EEF8FF";  
             },
			 mouseout:function(){  
           		 this.style.backgroundColor = "white";
				 
			 },
			 click:function(){
				var nid=$(this).attr("id");
				nid=nid.substring(12,nid.length)
				$.cookie("menuID",11);
				$.cookie("submenuID",0); 
				$.cookie("newsID",nid); 
				jumpto("index.html")
			 }
			 
	   })
	});
	*/
});

function logout(){
	$.cookie("userID",null);
	$.cookie("userPower",null); 
	$.cookie("userName",null); 
	jumpto("out.php")
}

function jumpto(url){
	
	if(ie){
			window.location.href(url);
		}else{
			window.location=url;
	}	
}

function saveinfo(name,id,power){
	$.cookie("userName",name);
	$.cookie("userID",id);
	$.cookie("userPower",power);
}