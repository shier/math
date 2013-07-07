<?php 
session_start();  
include("res/dbconnect.php");
$username=$_SESSION['username'];
if($username==""){
	header("Location: needlogin.html");
}
$showMode=$_REQUEST[showmode];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理程序</title>
<link href="css/text.css" rel="stylesheet" type="text/css" />
<?php 
	$id=$_REQUEST[id];
	if($id>0){
		$strsql="select * from newslib where id=" . $id;
		$result = mysql_query($strsql,$conn);
		$row = mysql_fetch_array($result);
		$title=convert2utf8($row[title]);
		$content=convert2utf8($row[content]);
		$udate=$row[udate];
	}else{
		$title="";
		$content="";
		$udate=date("Y-m-d");
	}
?>	
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>	

<script type="text/javascript" src="js/adjust.js"></script>
<script>
function showcontent(){
	sid=document.getElementById("newsList").selectedIndex
	document.getElementById("main").src= "addcontent.php?id="+sid
	
}
function checkvalue(){
	obj=document.getElementById("title")
	if(obj.value==""){
		alert("输入标题")
		obj.focus()
		return false
	}
	obj=document.getElementById("udate")
	if(obj.value==""){
		alert("输入显示时间")
		obj.focus()
		return false
	}
	obj=document.getElementById("content")
	if(obj.value==""){
		alert("输入正文")
		obj.focus()
		return false
	}
	//obj=document.getElementById("mainform")
	//obj.submit();
	
	$.post("savecontent.php",{content:$('#content').val(),title:$('#title').val(),id:$('#id').val(),udate:$('#udate').val(),showMode:$('#showMode').val()},function(result){
    	//$("span").html(result);
		parent.location.reload(); 
		
  	});
}

</script>

</head>

<body >
<!-----------------主菜单区，1000x101 ------------>
<form action="savecontent.php" id="mainform" name="mainform" method="post">
<table  border="0" cellspacing="0" cellpadding="0" align=center>
  <tr>
    <td width="97" height="40" class="tabletitle">标题</td>
    <td><input name="title" type="text" id="title" value="<?php echo $title; ?>" size="60" maxlength="80" /></td>
  </tr>
  <tr>
    <td height="40" class="tabletitle">页面显示时间</td>
    <td><input name="udate" type="text" id="udate" value="<?php echo $udate; ?>" />
    <input name="id" type="text" id="id" value="<?php echo $id; ?>" style="display:none" />
    <input name="showMode" type="text" id="showMode" value="<?php echo $showMode; ?>"  style="display:none"  /></td>
  </tr>
  <tr>
    <td height="130" class="tabletitle">内容正文</td>
    <td><textarea name="content" id="content" cols="75" rows="15"><?php echo $content; ?></textarea></td>
  </tr>
  <tr><td colspan=2 class="tablecontent" style="cursor:pointer" onclick="checkvalue()" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','images/conf_o.jpg',1)"><img src="images/conf.jpg" name="Image1" width="100" height="25" border="0" id="Image1" /></td></tr>
</table>

</form>
</body>
</html>
