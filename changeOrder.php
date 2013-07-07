<?php 
session_start();  
include("res/dbconnect.php");
$showmode=$_REQUEST[sm];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>后台管理程序</title>

</head>

<body >
<?php 
	$id=$_POST[id];
	$idList=$_POST[idList];

	//echo  $checkidlist. "<br>";
	$params =split(",",$idList);
	$_count = count($params);
	for($j=0;$j<$_count;$j++){
		$k=$j+1;
		$picid =(int) $params[$j];
		$strsql="update newslib set ordrerList='" .$k  . "' where id=" . $picid;
		$result=mysql_db_query($mysql_database, $strsql, $conn);
		//echo  $strsql . "<br>";
	}

?>	

<script>
var ie = (typeof window.ActiveXObject != 'undefined');

function jumpto(url){
	
	if(ie){
			window.location.href(url);
		}else{
			window.location=url;
	}	
}
jumpto('annonce.php?sm=<?php echo $showmode; ?>');

</script>
</body>
</html>
