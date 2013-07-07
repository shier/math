<?php 
session_start(); 
include("res/dbconnect.php"); 
$username=$_SESSION['username'];
if($username==""){
	header("Location: index.html");
}
$showmode=$_REQUEST[sm];

$id=$_REQUEST[id];
if($id==""){
	$id=0;
}
$str="--------增加公告-------";
if($showmode==1){
$str="--------增加新闻-------";
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理程序</title>
<link href="css/text.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="js/adjust.js"></script>
<script>
function showcontent(){
	sid=document.getElementById("newsList").value;
	document.getElementById("content").src= "addcontent.php?id="+sid+"&showmode=<?php echo $showmode; ?>";

}
function moveitem(mdir){
	obj=document.getElementById("newsList")
	currentID=obj.selectedIndex;
	if(mdir==-1 && currentID==1){
		return false
	}
	if(mdir==1 && currentID==obj.length-1){
		return false
	}
	nextID=currentID+mdir
	var selText=obj.options[nextID].text
	var selValue=obj.options[nextID].value
	obj.options[nextID].text=obj.options[currentID].text
	obj.options[nextID].value=obj.options[currentID].value
	obj.options[currentID].text=selText
	obj.options[currentID].value=selValue
	obj.options[currentID].selected=false;
	obj.options[nextID].selected=true;
	objlist=document.getElementById("idList")
	tempvalue=obj[1].value
	for(i=2;i<obj.length;i++){
		tempvalue+=","+obj[i].value
	}
	objlist.value=tempvalue
}
function changeitem(){
	if(document.getElementById("idList").value !=""){
		document.getElementById("orderForm").submit();
	}
}
function dealitem(){
	
		$.post("delinfo.php",{delID:$('#newsList').val(),libname:"newslib"},function(result){
    	//$("span").html(result);
		window.location.reload(); 
		
  	});
		//jumpto("delinfo.php?showmode=<?php echo $showmode; ?>&backname=annonce&libname=newslib&delID="+currentValue);
	
}
var ie = (typeof window.ActiveXObject != 'undefined');

function jumpto(url){
	
	if(ie){
			window.location.href(url);
		}else{
			window.location=url;
	}	
}


</script>

</head>

<body style="margin:0px" >
<!-----------------主菜单区，1000x101 ------------>

<table  border="0" cellpadding="0" cellspacing="1"  align=center width=720><tr><td class="tablecontent">&nbsp;
  <select name="newsList" size="8" id="newsList" style="width:500px" onchange="showcontent()">
    <option value="0"><?php echo $str; ?></option>
    
<?php 
		
		$strsql="SELECT * from newslib where showMode=" . $showmode . " and delMode=0 order by ordrerList,addinDate desc";
		$result = mysql_query($strsql,$conn);
		//echo $strsql . "<br>";
		while ($row=mysql_fetch_array($result)){
			echo "<option value='$row[id]'>" . $row[udate] . " | "  . convert2utf8($row[title]) . "</option>";
		}
		
?>   
    
    
    
  </select>
 
  </td>
    <td class="tablecontent"><table width="100" border="0" cellspacing="0" cellpadding="0">
      <tr>
        
        <td height="20" align=center bgcolor="#CCFF00" class="barTitle"  id="voteclick<?php echo $i; ?>" style="cursor:pointer; background-color:#FF9900; padding:5px"  onmouseover="this.style.backgroundColor='#6600CC';this.style.color='#CCFF00';"  onmouseout="this.style.backgroundColor='#FF9900';this.style.color='#FFFFFF';" onclick="moveitem(-1)">↑上移</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
       <td height="20" align=center bgcolor="#CCFF00" class="barTitle"  id="voteclick<?php echo $i; ?>" style="cursor:pointer; background-color:#FF9900; padding:5px"  onmouseover="this.style.backgroundColor='#6600CC';this.style.color='#CCFF00';"  onmouseout="this.style.backgroundColor='#FF9900';this.style.color='#FFFFFF';"  onclick="moveitem(1)">↓下移</td>
       
      </tr>
      <tr><td>&nbsp;</td></tr>
       <tr>
         <td height="20" align=center bgcolor="#CCFF00" class="barTitle"  id="voteclick<?php echo $i; ?>" style="cursor:pointer; background-color:#FF9900; padding:5px"  onmouseover="this.style.backgroundColor='#6600CC';this.style.color='#CCFF00';"  onmouseout="this.style.backgroundColor='#FF9900';this.style.color='#FFFFFF';"  onclick="changeitem()">提交</td>
       </tr> <tr><td>&nbsp;</td></tr>
       <tr>
         <td height="20" align=center bgcolor="#CCFF00" class="barTitle"  style="cursor:pointer; background-color:#FF9900; padding:5px"  onmouseover="this.style.backgroundColor='#6600CC';this.style.color='#CCFF00';"  onmouseout="this.style.backgroundColor='#FF9900';this.style.color='#FFFFFF';"  onclick="dealitem()">删除</td>
       </tr>
    </table></td>
</tr>
<tr>
    <td colspan=2><iframe id="content" src="" width="720" height="450" frameborder="0" scrolling="none"></iframe></td>
  </tr>

</table>
<form id="orderForm" name="orderForm" method="post" action="changeOrder.php?sm=<?php echo $showmode; ?>&id=<?php echo $id; ?>"  style="display:none" >
  <input name="idList" type="text" id="idList" size="100" />
</form>
<?php 
if ($id>0){
	echo "<script>document.getElementById('content').src= 'addcontent.php?id=" . $id . "&showmode=" . $showmode . "'</script>";
}
?>
</body>
</html>
