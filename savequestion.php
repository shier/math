<?php include("res/dbconnect.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>qa</title>
<link href="css/text.css" rel="stylesheet" type="text/css" />

</head>

<body >
<?php 
	$question=$_POST[question];
	$ip=get_real_ip();
	$qdate=date("Y-m-d H:i:s");
	$strsql="insert into qlist (question,askerIP,qdate,cmode,amode) values ('$question', '$ip','$qdate', 0,0)";
	$result=mysql_query($strsql, $conn);

?>	


<table width="712" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td ><img src="images/depart_r1_c1.jpg" width="712" height="15" /></td>
  </tr>
  <tr>
    <td class="content"><table width="712" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="13" rowspan="2" background="images/depart_r2_c1.jpg">&nbsp;</td>
        <td height="20"  align=center >&nbsp;</td>
        <td width="13" rowspan="2" background="images/depart_r2_c3.jpg">&nbsp;</td>
      </tr>
      <tr>
        <td height="60"  align=center ><span class="bigp" style="padding-top:10px; padding-bottom:10px">问题已提交，老师会尽快回复，谢谢参与。</span>
          <P ><a href="addquestion.html" target="_self" class="adown">继续提问》</a></P></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="content"><img src="images/depart_r4_c1.jpg" width="712" height="38" /></td>
  </tr>
</table>
</body>
</html>
