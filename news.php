<?php include("res/dbconnect.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>news</title>
<link href="css/text.css" rel="stylesheet" type="text/css" />
<style>
.newsList{cursor:pointer;}
</style>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/news.js"></script>

</head>

<body style="margin:0px">
<table width="470" border="0" cellspacing="0" cellpadding="0" align=center>
<tr><td height="23" colspan=3><div id="midmenu"></div></td></tr>
<tr><td height="10" colspan=3></td></tr>
<?php 
	$showmode=$_COOKIE[showmode];
	if($showmode==""){$showmode=1;}
	if($showmode==1){
		$jumpName=12;
	}else{
		$jumpName=11;
	}
 	$strsql="SELECT  * from newslib where showMode=$showmode and delMode=0 order by ordrerList,addinDate desc limit 0,5";
	$result=mysql_query($strsql, $conn);
	$i=0;
	while ($row = mysql_fetch_array($result)) {	
		
		?>
  		<tr class="newsList" id="newsList<?php echo $row[id]; ?>"><td width="19" align=center class="news_list"  id="pname<?php echo $i; ?>"><img src="images/news_dot.jpg" width="7" height="7" /></td>
    	<td width="363" height="22" class="news_list" id="pname<?php echo $i; ?>"><?php echo convert2utf8(formatData($row[title],20)); ?></td>
    	<td width="88" class="news_list"  id="pname<?php echo $i; ?>">[<?php echo substr($row[udate],0,10); ?>]</td></tr>
        
        <?php  
		$i++;   
	} 
?>
 
</table>
<input type="hidden" id="showMode" value="<?php echo $jumpName; ?>" />

</body>
</html>
