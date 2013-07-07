<?php 
session_start(); 
?> 
<?php include("res/dbconnect.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>qa</title>

</head>

<body >
<?php 
 //id  askerIP  question  qdate  cmode  checkID  askerName  amode  id  qid  answerName  answerIP  adate  answer  
	$answer=replacesmark($_POST[answer]);
	$qid=$_POST[qid];
	$username=$_SESSION['username'];
	$nickname=$_POST[nickname];
	$userid=$_SESSION['userid'];
	$ip=get_real_ip();
	$adate=date("Y-m-d H:i:s");
	$strsql="insert into alist (qid,answer,answerIP,adate,userID,username,delmark) values ($qid , '$answer', '$ip','$adate',$userid,'$username',0)";
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
</body>
</html>
