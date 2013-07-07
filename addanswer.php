<?php 
session_start(); 
?> 
<?php include("res/dbconnect.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link type="text/css" rel="stylesheet" href="css/text.css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/adjust.js"></script>
<script type="text/javascript" src="js/swfobject.js"></script>
<script>
function jump(jid){
	
	document.all.main.page.value=jid
	document.all.main.submit()
}

function check(){
	if($('#answer').val()==""){
		alert("请输入您的回答");
		$('#answer').focus()
		return false;
	}
	
}
</script>
<title>无标题文档</title>
</head>
<?php 
$id=$_REQUEST[id];
?>
<body  style="margin:0px">

        <?php
		 	

			$strsql="select * from qlist where id=" . $id;
			$result= mysql_query($strsql,$conn);
			//echo $strsql;
			$detailNum = mysql_num_rows($result);
			//echo convert2utf8(substr($_SESSION['username'],0,2));
			//for($i=0;$i<=detailNum;$i++){
				//echo $i;
			$row=mysql_fetch_array($result);
		?>
			
			<!-----------begin--------------------->
			<table width="712" border="0" cellspacing="0" cellpadding="0" align=center>
                <tr>
                  <td ><img src="images/depart_r1_c1.jpg" width="712" height="15" /></td>
                </tr>
                <tr>
                  <td class="content"><table width="712" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="13" background="images/depart_r2_c1.jpg">&nbsp;</td>
                        <td style="padding-top:10px; padding-bottom:10px" ><table width="680" border="0" cellspacing="0" cellpadding="0" align="center">
                          
                          <tr>
                            <td><table width="680" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10">&nbsp;</td>
                                  <td width="700" bgcolor="#0f95b0" class="barTitle"><p>问题：<?php echo $row[question];?>（<?php echo $row[qdate];?>） </p></td>
                                  <td width="10">&nbsp;</td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td>
                            <form method="post" action="saveanswer.php" onsubmit="return check()">
                            <table width="680" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align=center height=120><textarea name="answer"  rows="5" id="answer" style="width:655px"></textarea></td>
                              </tr>
                              <tr>
                                <td height="40" align=center><input type="text" name="qid" id="qid" value="<?php echo $id; ?>" style="display:none"/>
                                  <table  border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width=200 class="annonce_splice">回答者：<?php echo $_SESSION['username']; ?></td>
                                      <td><input type="submit" name="Submit" value="提交我的回答" style="width:150px" /></td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table></form></td>
                          </tr>
                          <?php 
						  //id  askerIP  question  qdate  cmode  checkID  askerName  amode  id  qid  answerName  answerIP  adate  answer  
			//1 202.82.107.1 三角函数真的很难学，有什么好的技巧吗？ 2011-03-02 16:51:48 0 0   0 1 1 admin 192.168.0.1 2011-03-02 哈哈这个问题我不知道 
                          	$strsql="select * from alist where delmark=0 and qid=" . $id;
							$result= mysql_query($strsql,$conn);
							//echo $strsql;
							while($row=mysql_fetch_array($result)){
						?>
							
                          <tr>
                            <td bgcolor="#339999" style="padding:1px">
                            
                            <table width="680" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
                                <tr>
                                  <td width="11">&nbsp;</td>
                                  <td class="content"><p><?php echo $row[answer];?></p>
                                      <p class="qa_content"><?php echo $row[username];?>, <?php echo $row[adate];?> | <a href="delecomm.php?qid=<?php echo $id; ?>&id=<?php echo $row[id]; ?>">删除此回复</a></p></td>
                                  <td width="11">&nbsp;</td>
                                </tr>
                            </table></td>
                          </tr>
                          <?php } ?>
                          
                          
                        </table></td>
                        <td width="13" background="images/depart_r2_c3.jpg">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td class="content"><img src="images/depart_r4_c1.jpg" width="712" height="38" /></td>
                </tr>
            </table>
</body>
</html>
