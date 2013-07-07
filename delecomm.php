
<?php include("res/dbconnect.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>qa</title>

</head>


<?php 
 //id  askerIP  question  qdate  cmode  checkID  askerName  amode  id  qid  answerName  answerIP  adate  answer  
	//$answer=convert2gbk(replacesmark($_POST[answer]));
	$qid=$_REQUEST[qid];
	$id=$_REQUEST[id];
	$strsql="update alist set delmark=1 where id=$id";
	$result= mysql_query($strsql,$conn);
	//echo $strsql;

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
jumpto("addanswer.php?id=<?php echo $qid; ?>");
</script>
<body ></body>
</html>
