var ie = (typeof window.ActiveXObject != 'undefined');



function MM_swapImgRestore() { //v3.0
 // var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
 // var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
  //  var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
  //  if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
 // var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
 //   d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
//  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
 // for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
 // if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
 // var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
 //  if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}



function changecolorin(){
	var obj = document.getElementsByName("pname"+this.id);
	for(i=0;i<obj.length;i++){
		obj[i].className="overText"
	}
			
}
function changecolorout(){
	var obj = document.getElementsByName("pname"+this.id);
	for(i=0;i<obj.length;i++){
		obj[i].className="outText"
	}
}
function overText(){
	var obj = document.getElementsByName("pname"+this.id);
	for(i=0;i<obj.length;i++){
		obj[i].className="smalloverText"
	}
			
}
function outText(){
	var obj = document.getElementsByName("pname"+this.id);
	for(i=0;i<obj.length;i++){
		obj[i].className="smalloutText"
	}
}
function homeoverText(){
	var obj = document.getElementsByName("pname"+this.id);
	for(i=0;i<obj.length;i++){
		obj[i].className="homeoverText"
	}
			
}
function homeoutText(){
	var obj = document.getElementsByName("pname"+this.id);
	for(i=0;i<obj.length;i++){
		obj[i].className="homeoutText"
	}
}

function jumpout(){
	jumpto("detail.php?depid="+depid+"&teacherid="+idList[this.id])
}
function download(){
	//window.open (idList[this.id])
	document.getElementById("downloadURL").src="maindoc/"+idList[this.id]
}

function jumpAnnonce(){
	jumpto("index.php?menuID=11&submenuID=0&id="+idList[this.id])
}

function jumpNews(){
	jumpTOP("index.php?menuID=12&submenuID=0&id="+idList[this.id]+"&showmode="+showMode)
}
function jumpClass(){
	jumpTOP("index.php?menuID=11&submenuID=0&id="+idList[this.id]+"&showmode="+showMode)
}
function jumpto(url){
	
	if(ie){
			window.location.href(url);
		}else{
			window.location=url;
	}	
}
function jumpTOP(url){
	
	if(ie){
			top.window.location.href(url);
		}else{
			top.window.location=url;
	}	
}
var idList= new Array();
var idName= new Array();
var idPass= new Array();
var menuList=new Array()

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
var teacherList=new Array()

teacherList[1]="teacher_gltz"
teacherList[2]="teacher_jcsx"
teacherList[3]="teacher_yysx"
teacherList[4]="teacher_ycx"
teacherList[5]="teacher_jssx"

function changepage(pid){
	jumpto("teacher.php?depid="+pid)
	
}

function showitem(itemname){
	var _temp=document.getElementById(itemname)
		_temp.style.display="block";
}
function hideitem(itemname){
	var _temp=document.getElementById(itemname)
		_temp.style.display="none";
}
function showcontent(mid,sid){
	
	//alert("mid:"+mid+"  sid"+sid+"   "+menuList[mid][1][sid])
	//alert(menuList[mid][1][sid].indexOf(".")<0);
	if(mid>=11 && mid<=13 && sid>0){
		document.getElementById("content").src="shownews.php?id="+sid
		return
	}
	
	if(menuList[mid][1][sid].indexOf(".")<0){
		documnt.getElementById("content").src=menuList[mid][1][sid]+".html"
	}else{
		
	document.getElementById("content").src=menuList[mid][1][sid]
		
	}
	
}
function showteacher(mid,sid){
	document.getElementById("content").src="detail.php?teacherid="+sid
	
}
function showmore(sid){
	sid=13-sid
	jumpto("index.php?menuID="+sid+"&submenuID=0");
	
}

function AttachEvent(target, eventName, handler, argsObject)
{
    var eventHandler = handler;
    if(argsObject)
    {
        eventHander = function(e)
        {
            handler.call(argsObject, e);
        }
    }
    if(window.attachEvent)//IE
        target.attachEvent("on" + eventName, eventHander );
    else//FF
        target.addEventListener(eventName, eventHander, false);
}

$(function(){
	$('.overPicture').each(function(index){
		//alert($(this).attr("src"));
	});
	
});
