<?php 
session_start();  
error_reporting(0);
$userpower=$_SESSION['userpower'];
if(substr_count($userpower,"1")<1){
	header("Location: needlogin.html");
}


$username=$_SESSION['username'];

$ansID=intval($_REQUEST[ansID]);
if ($ansID==""){
	$ansID=1;
}
?>
<?php include("res/dbconnect.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理程序</title>
<link href="css/text.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/adjust.js"></script>
<script>
function showcontent(){
	sid=document.getElementById("newsList").value;
	document.getElementById("main").src= "addanswer.php?id="+sid;

}
function moveitem(mdir){
	obj=document.getElementById("newsList")
	currentID=obj.selectedIndex;
	if(mdir==-1 && currentID==1){
		return false
	}
	if(mdir==1 && currentID==obj.length-1){
		return false
	}
	nextID=currentID+mdir
	var selText=obj.options[nextID].text
	var selValue=obj.options[nextID].value
	obj.options[nextID].text=obj.options[currentID].text
	obj.options[nextID].value=obj.options[currentID].value
	obj.options[currentID].text=selText
	obj.options[currentID].value=selValue
	obj.options[currentID].selected=false;
	obj.options[nextID].selected=true;
	objlist=document.getElementById("idList")
	tempvalue=obj[1].value
	for(i=2;i<obj.length;i++){
		tempvalue+=","+obj[i].value
	}
	objlist.value=tempvalue
}
function changeitem(){
	if(document.getElementById("idList").value !=""){
		document.getElementById("orderForm").submit();
	}
}

</script>

</head>

<body  style="margin:0px">
<?php 
       //echo $ansID;
	   if($ansID==1){
			$strsql="SELECT * from qlist where id not in (select distinct qid from alist where delmark=0) order by qdate desc";
		}
       if($ansID==2){
			$strsql="SELECT * from qlist where id in (select distinct qid from alist where delmark=0) order by qdate desc";
		}
       if($ansID==3){
			$strsql="SELECT * from qlist where id in (select distinct qid from alist where username='$username' and delmark=0) order by qdate desc";
		}
		//echo $strsql;
		$result=mysql_query($strsql, $conn);
		
?>
<!-----------------主菜单区，1000x101 ------------>

<table  border="0" cellpadding="0" cellspacing="1"  align=center width=720>
  <tr><td width="653" class="tablecontent">&nbsp;
  <select name="newsList" size="8" id="newsList" style="width:500px" onchange="showcontent()">
    
    
<?php 
		
		while ($row=mysql_fetch_array($result)){
			echo "<option value='$row[id]'>" . $row[qdate] . " | "  . convert2utf8($row[question]) . "</option>";
		}
		
?>   

    
  </select>
  </td><td width="146" class="tablecontent" >

    <table border="0" cellspacing="0" cellpadding="0" align=center>
      <tr>
        <td class="tablecontent"><a href="answer.php?ansID=1" target="_self" class="cdown">显示未回答的</a></td>
      </tr>
      <tr>
        <td class="tablecontent"><a href="answer.php?ansID=2" target="_self" class="cdown">显示已回答的</a></td>
      </tr>
      <tr>
        <td class="tablecontent"><a href="answer.php?ansID=3" target="_self" class="cdown">显示我回答的</a></td>
      </tr>
    </table>
    </form>
</td>
   
</tr>
<tr>
    <td colspan=2><iframe id="main" src="" width="720" height="500" frameborder="0" scrolling="none"></iframe></td>
  </tr>

</table>


<?php 
if ($id>0){
	echo "<script>document.getElementById('main').src= 'addcontent.php?id=" . $id . "&showmode=" . $showmode . "'</script>";
}
?>
</body>
</html>
