<?php
session_start();  
error_reporting(0);
$userpower=$_SESSION['userpower'];

if(substr_count($userpower,"1")<1){
	header("Location: index.html");
}

$urllist = array("","answer.php?showmode=1", "annonce.php?sm=2","annonce.php?sm=1","adjpos.php");

if($_REQUEST[adminpage] !=""){
    $adminpage=intval($_REQUEST[adminpage]);
}else{
	$adminpage=0;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��ӭ����������ҵ��ѧӦ������ѧԺ ��Ϣ������ѧ��ɫרҵ��վ</title>

<link href="css/text.css" rel="stylesheet" type="text/css" />
<style>  
.leftNewsList { cursor:pointer;}
#menuContent {background:url(images/mback.jpg) no-repeat;height:70px;}

#menuarea {
	position: relative;
	height:25px;
}
#subarea {
	position: relative;
	height:27px;
	
}
.hidden {display:none;}
.mainMenu{float:left;font:15px "΢���ź�";padding: 5px 6px;color:black;  cursor:pointer; text-align:center; }
.mainMenuOver {color:#1096B3;}
.subMain{position:relative; display:none;}
.subMenu {float:left;font:12px "΢���ź�"; padding: 0px 6px;line-height:27px;color:white; cursor:pointer; background:#1096B3;}
.subMenuOver{ color:yellow; background:#63C}
.subMenuPick{ color:yellow; font-weight:bold}

.subimg{float:left; position:relative}
</style>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/adjust.js"></script>
<script>
$(function(){
	$("#content").attr("src","<?php echo $urllist[$adminpage];?>");
})
</script>


</head>

<body>


<!---------------------��table��ܣ����1000�����У�225+775 -------------------->
<table width="1000" border="0" cellspacing="0" cellpadding="0" align=center>
<tr><td colspan=2><div id="mainTopArea"></div></td></tr>
  <tr>
    <td width="225" valign="top"><div id="leftMenuArea"></div></td>
    <!---------------------��Ҫ��������225x128 -------------------->

    <td width="775" valign="top">
    <!------------begin----->
    <table width="775" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
	  
	  <tr>
	  <!--      ��ҳ�渱����-------775x26------------>
        <td height="26" valign="bottom"><div id="submenu"></div></td>
      </tr>   
     
        <tr>
        <td><img src="images/sub_bar.jpg" width="775" height="22" /></td>
      </tr>
      <tr>
        <td><table width="775" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td  style="padding-left:20px"><iframe id="content" name="content" width=730 height=550 frameborder="0" scrolling="auto"></iframe></td>
            </tr>
        </table></td>
      </tr>
    </table>
    <!------------end ------>
    </td>
  </tr>
</table>


<table width="1000" border="0" cellspacing="0" cellpadding="0" align=center>
  
  <tr>
    <td style="padding:5px; text-align:center; font-size:12px; color:#666666">Copyright 2011 College of Applied Sciences ,Beijing University of Technology.All Rights Reserved.        2011 ��Ȩ���� ������ҵ��ѧ<br />
    Уַ�������г�����ƽ��԰100�� �ʱࣺ100124</td>
  </tr>
</table>
<form id="loginform" name="loginform" method="post" action="login.php" style="display:none">
  <input type="text" name="pname" id="pname" />
  <input type="password" name="ppass" id="ppass" />
</form>
</body>
</html>
