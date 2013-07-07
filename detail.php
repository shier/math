<?php include("res/dbconnect.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link type="text/css" rel="stylesheet" href="css/text.css" />


<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script>
var ie = (typeof window.ActiveXObject != 'undefined');
function jumpto(url){
	
	if(ie){
			window.location.href(url);
		}else{
			window.location=url;
	}	
}
function changepage(pid){
	jumpto("teacher.php?depid="+pid)
	
}
$(function(){
	$(window.parent.document).find("#content").load(function(){
		var main = $(window.parent.document).find("#content");
		var thisheight = $(document).height();
		main.height(thisheight);
	})
});
</script>
</head>

<?php 

	 
	if(($_COOKIE[teacherID])==""){
       	$teacherid=0;
   	}else{
		$teacherid=intval($_COOKIE[teacherID]);
	}

	$strsql="select * from detail where pid=" .$teacherid;	
	//echo $strsql;
    $detail_result=mysql_query($strsql, $conn);

	$rowdetail=mysql_fetch_array($detail_result);

	$strsql="select * from member where id=" . $teacherid;
	//echo $strsql;
    
	$result = mysql_query($strsql,$conn);
	$rowname=mysql_fetch_array($result);
	
	if($teacherid==6){$tname='谢琍';}else{$tname=convert2utf8($rowname[pname]);}
	

?><script> swfobject.embedSWF("depmenu.swf?menuID=<?php echo $rowname[depid]; ?>", "depmenu", "686", "25", "8.0.0", "expressInstall.swf"); </script>
<body  style="margin:0px"><form id="form1" name="form1" method="post" action="">
<table width="712" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td >
    <img src="images/depart_r1_c1.jpg" width="712" height="15" /></td>
  </tr>
    <tr>
    <td >
      <table width="712" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="13" background="images/depart_r2_c1.jpg">&nbsp;</td>
          <td><div id="depmenu"></div></td>
          <td width="13" background="images/depart_r2_c3.jpg">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
    <tr>
    <td class="content"><table width="712" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="13" background="images/depart_r2_c1.jpg">&nbsp;</td>
        <td style="padding-top:10px; padding-bottom:10px" ><table width="680" border="0" cellspacing="0" cellpadding="0" align=center>
          <tr>
            <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="10">&nbsp;</td>
                  <td width="11"><img src="images/xkbsz_tu_001.jpg" width="11" height="27" /></td>
                  <td width="678" bgcolor="#0f95b0" class="barTitle">基本信息</td>
                  <td width="11"><img src="images/xkbsz_tu_002.jpg" width="11" height="27" /></td>
                  <td width="10">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="20">&nbsp;</td>
                  <td><table width="500" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="82" class="infocontent">姓　　名：</td>
                        <td width="210" class="infocontentb" ><?php echo $tname; ?></td>
                        <td width="82" class="infocontent">学　　位：</td>
                        <td width="110" class="infocontentb"><?php echo convert2utf8($rowname[pdegree]); ?></td>
                      </tr>
                      <tr>
                        <td class="infocontent">出生年月：</td>
                        <td class="infocontentb"><?php echo convert2utf8($rowdetail[pdob]); ?></td>
                        <td class="infocontent">职　　称：</td>
                        <td class="infocontentb"><?php echo convert2utf8($rowname[ptitle]); ?></td>
                      </tr>
                      <tr>
                        <td class="infocontent">职　　务：</td>
                        <td class="infocontentb"><?php echo convert2utf8($rowdetail[pjob]); ?></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="infocontent">导师类型：</td>
                        <td class="infocontentb"><?php echo convert2utf8($rowname[ptype]); ?></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="infocontent">办公电话：</td>
                        <td class="infocontentb"><?php echo convert2utf8($rowdetail[ptele]); ?></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="infocontent">性　　别：</td>
                        <td class="infocontentb"><?php echo convert2utf8($rowdetail[psex]); ?></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="infocontent">通讯地址：</td>
                        <td colspan="3" class="infocontentb"><?php echo convert2utf8($rowdetail[paddress]); ?></td>
                      </tr>
                      <tr>
                        <td class="infocontent">电子邮件：</td>
                        <td colspan="3" class="infocontentb"><a href="mailto:<?php echo $rowdetail[pmail]; ?>"><?php echo $rowdetail[pmail]; ?></a></td>
                      </tr>
                  </table></td>
                  <td width="185" align="center">
				  <?php if($rowname[picmode]==1){ ?>
				  <img src="images/t_<?php echo $teacherid; ?>.jpg" width="160" height="208" />
				  <?php } ?>
				  </td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="10">&nbsp;</td>
                        <td width="11"><img src="images/xkbsz_tu_001.jpg" width="11" height="27" /></td>
                        <td width="678" bgcolor="#0f95b0" class="barTitle">个人简历</td>
                        <td width="11"><img src="images/xkbsz_tu_002.jpg" width="11" height="27" /></td>
                        <td width="10">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="21">&nbsp;</td>
                        <td class="content"><?php echo convert2utf8(formatData(replacemark($rowdetail[presume]),0)); ?></td>
                        <td width="21">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="10">&nbsp;</td>
                        <td width="11"><img src="images/xkbsz_tu_001.jpg" width="11" height="27" /></td>
                        <td bgcolor="#0f95b0" class="barTitle">研究领域</td>
                        <td width="11"><img src="images/xkbsz_tu_002.jpg" width="11" height="27" /></td>
                        <td width="10">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="21">&nbsp;</td>
                        <td class="content"><?php echo convert2utf8(formatData(replacemark($rowdetail[parea]),0)); ?></td>
                        <td width="21">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="10">&nbsp;</td>
                        <td width="11"><img src="images/xkbsz_tu_001.jpg" width="11" height="27" /></td>
                        <td width="678" bgcolor="#0f95b0" class="barTitle">教学工作</td>
                        <td width="11"><img src="images/xkbsz_tu_002.jpg" width="11" height="27" /></td>
                        <td width="10">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="21">&nbsp;</td>
                        <td class="content"><?php echo convert2utf8(formatData(replacemark($rowdetail[pteach]),0)); ?></td>
                        <td width="21">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="10">&nbsp;</td>
                        <td width="11"><img src="images/xkbsz_tu_001.jpg" width="11" height="27" /></td>
                        <td width="678" bgcolor="#0f95b0" class="barTitle">科研工作</td>
                        <td width="11"><img src="images/xkbsz_tu_002.jpg" width="11" height="27" /></td>
                        <td width="10">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="21">&nbsp;</td>
                        <td class="content"><?php echo convert2utf8(formatData(replacemark($rowdetail[presearch]),0)); ?></td>
                        <td width="21">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
<!----------------------subbegin------------>
	<?php 
	$strsql="select * from study where memberID='" . $rowname[id] ."'";
	//echo $strsql;
    // 执行sql查询
	$result = mysql_query($strsql,$conn);
 	$nameNum = mysql_num_rows($result);
	$i=1;
	if ($nameNum>0){ ?>
		<tr><td><table width="680" border="0" cellspacing="0" cellpadding="0">
        <tr><td width="21">&nbsp;</td><td class="content"><table width="678" border="0" cellspacing="0" cellpadding="0">
    
		<?php	while ($row=mysql_fetch_array($result))  {	?>
			<tr><td width="38" class="special">[<?php echo $i; ?>]</td>
        	<td width="616"><?php echo convert2utf8(formatData(replacemark($row[content]),0)); ?></td></tr>
    		<?php 
			$i++;
		}	?>
		</table></td> <td width="21">&nbsp;</td></tr></table></td></tr>
     <?php } ?>
<!----------------------aub end -------->
          <tr>
            <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="10">&nbsp;</td>
                        <td width="11"><img src="images/xkbsz_tu_001.jpg" width="11" height="27" /></td>
                        <td width="678" bgcolor="#0f95b0" class="barTitle">指导研究生情况</td>
                        <td width="11"><img src="images/xkbsz_tu_002.jpg" width="11" height="27" /></td>
                        <td width="10">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="21">&nbsp;</td>
                        <td class="content"><?php echo convert2utf8(formatData(replacemark($rowdetail[pstudent]),0)); ?></td>
                        <td width="21">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <!--------------分割------------->
          <tr>
            <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="10">&nbsp;</td>
                        <td width="11"><img src="images/xkbsz_tu_001.jpg" width="11" height="27" /></td>
                        <td width="678" bgcolor="#0f95b0" class="barTitle">获得荣誉</td>
                        <td width="11"><img src="images/xkbsz_tu_002.jpg" width="11" height="27" /></td>
                        <td width="10">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="21">&nbsp;</td>
                        <td class="content"><?php echo convert2utf8(formatData(replacemark($rowdetail[paward]),0)); ?></td>
                        <td width="21">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr> 
          <!-------------------------------分割结束  -------------->
               <tr>
            <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="10">&nbsp;</td>
                        <td width="11"><img src="images/xkbsz_tu_001.jpg" width="11" height="27" /></td>
                        <td width="678" bgcolor="#0f95b0" class="barTitle">团体兼职</td>
                        <td width="11"><img src="images/xkbsz_tu_002.jpg" width="11" height="27" /></td>
                        <td width="10">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="21">&nbsp;</td>
                        <td class="content"><?php echo convert2utf8(formatData(replacemark($rowdetail[potherjob]),0)); ?></td>
                        <td width="21">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="13" background="images/depart_r2_c3.jpg">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
    <tr>
    <td class="content"><img src="images/depart_r4_c1.jpg" width="712" height="38" /></td>
  </tr>
</table>
</body>
</html>
