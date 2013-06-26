<?php
session_start();
$_SESSION['login'] = '1';
$flashid=06231;
?>
<?php include("res/dbconnect.php");?>
<?php 
	if($_REQUEST[menuID] !=""){
       	$menuID=intval($_REQUEST[menuID]);
   	}else{
		$menuID=0;
	}
	if($_REQUEST[adminpage] !=""){
       	$adminpage=intval($_REQUEST[adminpage]);
   	}else{
		$adminpage=0;
	}
	if( $_REQUEST[submenuID] !=""){
       	$submenuID=intval($_REQUEST[submenuID]);
   	}else{
		$submenuID=-1;
	}
	if( $_REQUEST[teacherID] !=""){
       	$teacherID=intval($_REQUEST[teacherID]);
		$menuID=2;
		$submenuID=3;
   	}else{
		$teacherID=0;
	}
	if( $_REQUEST[depID] !=""){
       	$depID=intval($_REQUEST[depID]);
   	}else{
		$depID=0;
	}
	if( $_REQUEST[showmode] !=""){
       	$showmode=intval($_REQUEST[showmode]);
   	}else{
		$showmode=0;
	}
	$_SESSION['showmode'] = $showmode;
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>欢迎来到北京工业大学应用数理学院 信息与计算科学特色专业网站</title>

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

.mainMenu{float:left;font:15px "微软雅黑";padding: 5px 6px;color:black; font-weight:bold; cursor:pointer; text-align:center; }
.mainMenuOver {color:#1096B3;}
.subMain{position:relative; display:none;}
.subMenu {float:left;font:12px "微软雅黑"; padding: 0px 6px;line-height:27px;color:white; cursor:pointer; background:#1096B3;}
.subMenuOver{ color:yellow; background:#63C}
.subMenuPick{ color:yellow; font-weight:bold}

.subimg{float:left; position:relative}
</style>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script>

swfobject.embedSWF("topmenu.swf?id=<?php echo $flashid; ?>", "topmenu", "181", "17", "8.0.0", "expressInstall.swf"); 
swfobject.embedSWF("midmenu.swf?id=<?php echo $flashid; ?>", "midmenu", "488", "23", "8.0.0", "expressInstall.swf"); 
swfobject.embedSWF("banner.swf", "butMenu", "287", "408", "8.0.0", "expressInstall.swf"); 
swfobject.embedSWF("loginbox.swf?username=<?php echo convert2utf8($_SESSION['username']); ?>&userid=<?php echo $_SESSION['userid']; ?>&userpower=<?php echo $_SESSION['userpower']; ?>", "loginarea", "225", "191", "8.0.0", "expressInstall.swf"); 
swfobject.embedSWF("teacher/members.swf?v=06191&id=<?php echo $flashid; ?>", "members", "488", "273", "8.0.0", "expressInstall.swf"); 

function jumpPage(mid,sid){
	if(<?php echo $menuID; ?>==0 && mid>0){
		jumpto("index.php?menuID="+mid+"&submenuID="+sid)
		return;
	}
	if(<?php echo $menuID; ?>>0 && mid==0){
		jumpto("index.php?menuID="+mid+"&submenuID="+sid)
		return;
	}
	jumpsubPage(mid,sid)
}
</script>

</head>

<body>
<!-----------------主菜单区，1000x101 ------------>
<input type="hidden" id="menuID" value="<?php echo $menuID; ?>" />
<input type="hidden" id="submenuID" value="<?php echo $submenuID; ?>" />
<table width="1000" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="225"><img name="homepage_r1_c1" src="images/homepage_r1_c1.jpg" width="225" height="101" border="0" id="homepage_r1_c1" alt="" /></td>
    <td width="775"><table width="775" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="31" valign="bottom" align="right" style="padding-right:40px"><table width="181" border="0" cellspacing="0" cellpadding="0" >
          <tr>
            <td  align="center" height="17"><div id="topmenu"></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="70" id="menuContent"><table width=750 border="0" align=center cellpadding="0" cellspacing="0">
        <tr><td height=20></td></tr>
        <tr>
          <td>
          <div id="menuarea"></div></td></tr><tr>
          <td height=25><div id="subarea"></div></td></tr></table></td>
      </tr>
    </table></td>
  </tr>
</table>

<!---------------------主table框架，宽度1000，两列，225+775 -------------------->
<table width="1000" border="0" cellspacing="0" cellpadding="0" align=center>
  <tr>
    <td width="225" valign="top"><table width="225" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <!---------------------login框架，225x197 -------------------->
        <td height="191"><div id="loginarea"></div></td>
      </tr>
      <tr>
        <td><a href="index.php?menuID=12&amp;submenuID=0&amp;showmode=2"><img src="images/big_news.jpg" name="Image45" width="225" height="94" border="0" id="Image45" class="overPicture" /></a></td>
      </tr>
      <tr>
        <!---------------------最新公告框架，225x197 -------------------->
        <td><table width="224" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><a href="index.php?menuID=11&submenuID=0"><img src="images/ano_up.jpg" name="Image33" width="224" height="39" border="0" id="Image33" class="overPicture" /></a></td>
            </tr>
            <tr>
              <td><table width="224" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="15" background="images/ano_side.jpg">&nbsp;</td>
                    <td><div id="newAnonceList"></div></td>
                    <td width="15" background="images/ano_side.jpg">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td><img src="images/ano_down.jpg" width="225" height="17" /></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <!---------------------互动，225x192 -------------------->
        <td><table width="225" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><a href="index.php?menuID=10&submenuID=0" target="_self"><img src="images/lab_qa.jpg" name="Image37" width="225" height="67" border="0" id="Image37"  class="overPicture"/></a></td>
            </tr>
            <tr>
              <td><a href="index.php?menuID=14&amp;submenuID=0" target="_self"><img src="images/lab_address.jpg" name="Image38" width="225" height="59" border="0" id="Image38"  class="overPicture" /></a></td>
            </tr>
            <tr>
              <td><a href="index.php?menuID=15&amp;submenuID=0" target="_self"><img src="images/lab_sitemap.jpg" name="Image39" width="225" height="66" border="0" id="Image39"  class="overPicture"/></a></td>
            </tr>
        </table></td>
      </tr>

    </table></td>
    <!---------------------主要内容区，225x128 -------------------->

    <td width="775" valign="top">
     
	  <?php if($menuID==0 && $adminpage==0){ ?>
	  <table width="775" border="0" cellspacing="0" cellpadding="0">
	  <tr><td><img name="homepage_r3_c2" src="images/homepage_r3_c2.jpg" width="775" height="285" border="0" id="homepage_r3_c2" alt="" /></td></tr>
      <tr>
        <td><table width="775" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="488"><table width="488" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="23"><div id="midmenu"></div></td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
              <tr>
                <td><iframe id="newslist" src="news.php?showMode=1" width="488" height="120" frameborder="0" scrolling="No"></iframe></td>
              </tr>
              <tr>
              
              
                <td  valign="bottom"><table width="488" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><a href="index.php?menuID=10&submenuID=0"><img src="images/qa_top.jpg" name="Image44" width="488" height="39" border="0" id="Image44"  class="overPicture"/></a></td>
                    </tr>
                    <tr>
                      <td><table width="488" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="47"><img src="images/qa_left.jpg" width="47" height="124" /></td>
                            <td><table width="425" border="0" cellspacing="0" cellpadding="0">
                                  <?php 
								  
								  
								  $strsql="select  * from qlist as q, alist as a where a.qid=q.id order by qdate desc limit 0,2";
								  $result=mysql_query($strsql, $conn);
								  $detailNum =mysql_num_rows($result);
						
		
								  for($id=1; $id<=$detailNum;$id++){
								  	$row=mysql_fetch_array($result);
								  	$q=formatData($row[question],25);
									$a=formatData($row[answer],20);
									$d="[" . $row[adate]. "]"; ?>
									<tr><td height="57">
                                  	<table width="425" border="0" cellspacing="0" cellpadding="0"><tr>
                                    <td height="25" colspan="2" class="qa_title"><a href="index.php?menuID=10&submenuID=0" class="adown">
									<?php echo $q; ?></a></td></tr><tr>
                                    <td width="341" height="30" class="qa_content"><?php echo $a; ?></td>
                                    <td width="84" class="qa_content"><?php echo $d; ?></td></tr></table></td></tr>
                                   <?php if($id==1){ echo("<tr><td><img src=\"images/qa_sp.jpg\" width=425 height=10 /></td></tr>"); } 
								  }
								  ?>
                                  
                            </table></td>
                            <td width="16"><img src="images/qa_right.jpg" width="16" height="124" /></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><img src="images/qa_down.jpg" width="488" height="5" /></td>
                    </tr>
                </table></td>
              </tr>
            </table></td>
            <td width="287"><img src="images/download.jpg" width="287" height="325" /></td>
          </tr>
          <tr>
            <td><table width="488" border="0" cellspacing="0" cellpadding="0">
             
              <tr>
                <td height="273" align="center"><div id="members"></div></td>
              </tr>
              <tr>
                <td><table width="488" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><a href="index.php?menuID=8&amp;submenuID=0"><img src="images/down_tiku.jpg" name="Image46" width="248" height="135" border="0" id="Image46"  class="overPicture"/></a></td>
                    <td><a href="index.php?menuID=3&amp;submenuID=0"><img src="images/down_class.jpg" name="Image47" width="240" height="135" border="0" id="Image47"  class="overPicture" /></a></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
            <td width="287"><div id="butMenu"></div></td>
          </tr>
        </table></td>
      </tr></table>
      <?php }else{ 
	  if($adminpage==0){
	  ?>
      
<!-----------显示副导航页面------------------------------------------------------------>		
	<table width="775" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="images/sub_pic.jpg" width="775" height="192" /></td>
      </tr>
	  
	  <tr>
	  <!--      子页面副导航-------775x26------------>
        <td height="26" valign="bottom"><div id="submenu"></div></td>
      </tr>   
     
        <tr>
        <td><img src="images/sub_bar.jpg" width="775" height="22" /></td>
      </tr>
      <tr>
        <td><table width="775" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td  style="padding-left:30px"><iframe id="content" name="content" width=730 height=550 frameborder="0" scrolling="auto"></iframe></td>
            </tr>
        </table></td>
      </tr>
    </table>
	<script>
	<?php if ($teacherID==0){ 
		if($menuID>=11 && $menuID<=13){
			echo("jumpsubPage($menuID," . intval($_REQUEST[id]) . ")");
		}else{
			echo("jumpsubPage($menuID,$submenuID)");
		}
	}else{
		
		echo ("showteacher($depID, $teacherID);");
	}?>

	</script>
<!----------------------------------------------------------------------->	
	<?php
	}else{
		$urllist = array("","answer.php?showmode=1", "annonce.php?showmode=1","annonce.php?showmode=2","adjpos.php");
	 ?>
	<!------------------显示管理页面 -->
	<table width="775" border="0" cellspacing="0" cellpadding="0">
    <tr><td><iframe width=775 id="showadminframe"  height=900 frameborder="1" src="<?php echo $urllist[$adminpage];?>"></iframe></td></tr></table>
    
	<?php
	//-------------管理页面结束
    }

	 } ?>	</td>
  </tr>
</table>


<table width="1000" border="0" cellspacing="0" cellpadding="0" align=center>
  
  <tr>
    <td style="padding:5px; text-align:center; font-size:12px; color:#666666">Copyright 2011 College of Applied Sciences ,Beijing University of Technology.All Rights Reserved.        2011 版权所有 北京工业大学<br />
    校址：北京市朝阳区平乐园100号 邮编：100124</td>
  </tr>
</table>
<form id="loginform" name="loginform" method="post" action="login.php" style="display:none">
  <input type="text" name="pname" id="pname" />
  <input type="password" name="ppass" id="ppass" />
</form>
</body>
</html>
