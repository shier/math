
<?php include("res/dbconnect.php");
	$id=$_POST[delID];
	$libname=$_POST[libname];
	$strsql="update $libname set delMode=1 where id=" . $id;
	$result = mysql_query($strsql,$conn);
	
?>	

