<?php include("res/dbconnect.php");?>
<?php
	$uid = $_POST[uid];
	$upass =$_POST[upass];
	$strsql="update member set  password='$upass' where id='$uid'";
	$result=mysql_query($strsql ,$conn); 

	echo ("<returnmessage>");
	echo ("<errmode>0</errmode>");
	echo ("</returnmessage>");
?>
