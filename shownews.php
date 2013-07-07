<?php include("res/dbconnect.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link type="text/css" rel="stylesheet" href="css/text.css" />
<style>
.newsList{cursor:pointer;}
</style>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/adjust.js"></script>
<title>shownews</title>
</head>
<?php
	$id=$_COOKIE[newsID];
?>
<body  style="margin:0px">
<table width="712" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td >
    <img src="images/depart_r1_c1.jpg" width="712" height="15" /></td>
  </tr>

    <tr>
    <td class="content"><table width="712" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="13" background="images/depart_r2_c1.jpg">&nbsp;</td>
        <td style="padding-top:10px; padding-bottom:10px" ><table width="680" border="0" cellspacing="0" cellpadding="0">
        <?php
		 	//$strsql="select *,date_format(qdate,'%Y-%m-%d') as nudate from qList where  id not in (select id from qList order by id desc limit 0,$offset) order by id desc limit 0,$offset";
		
			//select count(id) as cid from newslib where showMode=" . $showmode . " and delMode=0
			
			$strsql="select * from  newslib where id=" . $id;
			//$result=mysql_db_query($mysql_database, $strsql, $conn);
			//echo $strsql;
			$result=mysql_query($strsql, $conn);
			$row = mysql_fetch_array($result);	
		?>
			
			<!-----------begin--------------------->
			 <tr>
            <td width="95" class="annonce_content" align=center>[<?php echo substr($row[udate],0,10); ?>]</td>
            <td width="585" class="annonce_title"><?php echo convert2utf8($row[title]); ?></td>
			 </tr>
	
			<!-------end --------->
			
		
          <tr>
            <td colspan="2" class="infocontent"><p><?php echo convert2utf8($row[content]); ?></p></td>
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
