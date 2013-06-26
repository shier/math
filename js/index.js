var ie = (typeof window.ActiveXObject != 'undefined');

var idList= new Array();
var idName= new Array();
var idPass= new Array();
var menuList=new Array()
menuList[0]=["index.php",[]];
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
menuList[11]=["最新公告",["newslist.php?showmode=2",""]]
menuList[12]=["新闻动态",["newslist.php?showmode=1",""]]
menuList[13]=["精品课程",["newslist.php?showmode=2",""]]
menuList[14]=["address",["address",""]]
menuList[15]=["sitemap",["sitemap",""]]
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


var teacherList=new Array()

teacherList[1]="teacher_gltz"
teacherList[2]="teacher_jcsx"
teacherList[3]="teacher_yysx"
teacherList[4]="teacher_ycx"
teacherList[5]="teacher_jssx"



var leftPosition=new Array(0,10,20,30,40,50,60,70,80,90,100)

var oldmenuid=-1

var menuID,subMenuID
function showteacher(mid,sid){
	showsubMenu(2,4)
	$("#content").attr("src","detail.php?teacherid="+sid)
}

function jumpsubPage(mid,sid){
	//$('#submenu').each(function(){$(this).remove()});
	//showsubMenu(mid,sid)
	if(mid>=11 && mid<=13 && sid>0){
		$("#content").attr("src","shownews.php?id="+sid)
		return
	}
	if($('#menuID').val()==0){
		if(mid>0){
			jumpto("index.php?menuID="+mid+"&submenuID="+sid)
		}
		return
	}
	
	
	//alert(geturl(menuList[mid][1][sid]))
	$("#content").attr("src",geturl(menuList[mid][1][sid]))
	
}

function geturl(str){
	if(str.indexOf(".")<0){
		return str+".html"
	}else{
		return str
	}
	
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
function jumpto(url){
	
	if(ie){
			window.location.href(url);
		}else{
			window.location=url;
	}	
	
	
}
function shownews(nid){
	$("#newslist").attr("src","news.php?showMode="+nid);
}
function showlist(nid){
	jumpto("index.php?menuID=12&submenuID=0&id=4&showmode="+nid)
}
function showmore(sid){
	sid=13-sid
	jumpto("index.php?menuID="+sid+"&submenuID=0");
	
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
function jsddm_close()
{	if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}

function jsddm_timer()
{	closetimer = window.setTimeout(jsddm_close, timeout);}

function jsddm_canceltimer()
{	if(closetimer)
	{	window.clearTimeout(closetimer);
		closetimer = null;}}
	
$(function(){
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
				jumpto("index.php?menuID=11&submenuID=0&id="+nid)
			 }
			 
	   })
	});
	var k=0
	for(i=0;i<10;i++){
		ref="#"
		if(i==0){ref=menuList[0][0]}
		$("<div id='mMenu"+i+"' class='mainMenu'>"+nameList[i][0]+"</div>").appendTo($('#menuarea'));
		
		if(nameList[i][1].length>0){
			$('<div id="sMain'+i+'" class="subMain"></div>').appendTo($('#subarea'));
			//$('<div class="subimg "><img src="images/xkbsz_tu_001.jpg" width="11" height="27" /></div>').appendTo($('#sMain'+i));	
			for(j=0;j<nameList[i][1].length;j++){
				
				$('<div id="sMenu'+k+'" class="subMenu">'+nameList[i][1][j]+'</div>').appendTo($('#sMain'+i));	
				//$('<li><a href="index.php?menuID='+i+'&submenuID='+j+'">'+nameList[i][1][j]+'</a></li>').appendTo($('#ul'+i));
				$('#sMenu'+k).attr("realID",j)
				
				k++
				
			}
			$('#sMain'+i).css("left",leftPosition[i])
			
			//$('<div class="subimg"><img src="images/xkbsz_tu_002.jpg" width="11" height="27" /></div>').appendTo($('#sMain'+i));	
		}
		
	}
	/*
	var each_width, sum_width=100;
	$('.mainMenu').each(function() {
		
  		each_width =  $(this).width();
		
  		sum_width += each_width;
	});
	*/
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
					jumpto("index.php?menuID=0")	
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
				 jumpsubPage(menuID,subMenuID)
				 $(this).addClass('subMenuPick'); 
			 }
	   })
	})
	getNewAnonce();
	getQList();
});
function getNewAnonce(){
	$.get("res/getanonce.php", function(result){$('#newAnonceList').html(result);});
}
function getQList(){
	$.get("res/getqlist.php", function(result){$('#qlist').html(result);});
}
