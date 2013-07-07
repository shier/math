<?php 
session_start();  
?>
<?php include("res/dbconnect.php");?>
<?php

	$uname = $_POST[uname];
	$upass =$_POST[upass];

	$strsql="select *  from member where userID='$uname' and  password='$upass' and delmark=0";
	$result=mysql_query($strsql, $conn);
	$detailNum=mysql_num_rows($result);
	echo ("<returnmessage>");
	if($detailNum==0){

		echo ("<errmode>1</errmode>");

	}else{
		$row = mysql_fetch_array($result);
		$_SESSION['username']=$row[pname];
		$_SESSION['userid']=$row[id];
		$_SESSION['userpower']=$row[userpower];
		echo ("<errmode>0</errmode>");
		echo ("<name>" . convert2utf8($row[pname]) . "</name><userpower>" . $row[userpower] . "</userpower><userid>" . $row[id] . "</usrid>");
	}
	echo ("</returnmessage>");
?>
