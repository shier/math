<?php 
session_start();  
?>
<?php include("res/dbconnect.php");?>
<?php

	$username = $_POST[username];
	$id =$_POST[uid];
	$userpower =$_POST[userpower];
	$strsql="select *  from member where id='$id' and  delmark=0 and userpower='$userpower'";
	//echo $strsql;
	$result=mysql_query($strsql, $conn);
	$detailNum=mysql_num_rows($result);
	echo ("<returnmessage>");
	if($detailNum==0){
		echo ("<errmode>1</errmode>");
	}else{
		$row = mysql_fetch_array($result);
		$_SESSION['username']=$row[pname];
		
		echo ("<errmode>0</errmode>");
		echo ("<name>" .convert2utf8($row[pname]) . "</name>");
	}
	echo ("</returnmessage>");
?>
