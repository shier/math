<?php 
session_start();  
$username=$_SESSION['username'];
if($username==""){
	header("Location: needlogin.html");
}
?>

<?php include("res/dbconnect.php");?>
<?php 
	if (!isset($depid)) 
	$depid=1; 
	if(($_REQUEST[depid])==""){
       	$depid=1;
   	}else{
		$depid=intval($_REQUEST[depid]);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link type="text/css" rel="stylesheet" href="css/text.css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/downlist.js"></script>
<title>-<?php echo $username;?>-</title>
</head>

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
        <td style="padding-top:10px; padding-bottom:10px" align=center><table  border="0" cellpadding="0" cellspacing="1" bgcolor="#a2d7cd">
          <tr>
            <td class="tabletitle" width="100">编号</td>
            <td width="300" class="tabletitle">学科</td>
            <td width="100" class="tabletitle">下载地址</td>
          </tr>
  <?php 		  

	$strsql="SELECT * from downlist order by name";
	//echo $strsql;
    // 执行sql查询
  $result=mysql_query($strsql, $conn);
    // 获取查询结果
   // $row=mysql_fetch_row($result);
    //mysql_data_seek($result, 0);
    // 循环取出记录
	$i=0;
    while ($row=mysql_fetch_array($result))
    {
		$i++;
			echo '<tr class="nameList" id="pname' . $i .'"><td  class="tablecontent">' . $i . '</td>';
			echo '<td class="tablecontent">' . $row[name] . '</td>';
        	echo '<td class="tablecontent">点击下载</td></tr>';
			echo '<script>idList[' . $i . ']="' . $row[address] . '"</script>';
			
		
	}
	?>

        </table></td>
        <td width="13" background="images/depart_r2_c3.jpg">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="content"><img src="images/depart_r4_c1.jpg" width="712" height="38" /></td>
  </tr>
</table>
<iframe id="downloadURL" height="0" width="0" src="" style="display:none"></iframe> 

</body>
</html>
