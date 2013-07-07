<?php 
session_start();  
include("res/dbconnect.php");

	$id=$_POST[id];
	$content=convert2gbk($_POST[content]);
	$title=convert2gbk($_POST[title]);
	$ip=get_real_ip();
	$udate=$_POST[udate];
	$showMode=$_POST[showMode];
	$username=$_COOKIE['userName'];
	$addinDate=date("Y-m-d H:i:s");
	if($id>0){
		$strsql="update newslib set content='$content', title='$title',  addinIP='$ip',  udate='$udate',  username='$username',  addinDate='$addinDate' where id=" . $id;
		echo $strsql . "<br>";
		$result=mysql_query( $strsql, $conn);
	}else{
		$strsql="insert into newslib (content,title,addinIP,udate,username,addinDate,showMode) values ('$content', '$title', '$ip','$udate', '$username','$addinDate', '$showMode')";
		echo $strsql . "<br>";
		$result=mysql_query($strsql, $conn);
		$strsql="SELECT * from newslib where username='$username' and addinDate='$addinDate'";
		$result=mysql_query($strsql, $conn);
		//echo $strsql . "<br>";
		$row=mysql_fetch_array($result);
		$id=$row[id];
	}
?>	
