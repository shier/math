<?php include("res/dbconnect.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/text.css" />
<style>
.newsList{cursor:pointer;}
</style>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/newslist.js"></script>
<script>
function jump(jid){
	
	document.all.main.page.value=jid
	document.all.main.submit()
}
</script>
<title></title>
</head>
<?php 
	$showmode=$_COOKIE[showmode];
	if ($showmode==""){
		$showmode=1;
	}
	if (!isset($page)) 
	$page=1; 
	if(($_POST[page])==""){
       	$page=1;
   	}else{
       	$page=intval($_POST[page]);
     }
	$pagesize=10; 
	
	$strsql="select count(id) as cid from newslib where showMode=" . $showmode . " and delMode=0";
	$result=mysql_query($strsql, $conn);
	
	$row = mysql_fetch_array($result);
	$nameNum= $row[cid] ;
	$pages=intval($nameNum/$pagesize); 
	if ($nameNum%$pagesize) 
	$pages++; 
	if($page>$pages){
		$page=$pages;
	}
	$offset=($page-1)*$pagesize;
	if ($offset<0){
		$offset=0;
		$page=1;
	}
?>
<body  style="margin:0px">
<table width="712" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td >
    <img src="images/depart_r1_c1.jpg" width="712" height="15" /></td>
  </tr>

    <tr>
    <td class="content"><table width="712" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="13" background="images/depart_r2_c1.jpg">&nbsp;</td>
        <td style="padding-top:10px; padding-bottom:10px" ><table width="680" border="0" cellspacing="0" cellpadding="0">
        <?php
		 				$frompage=$offset*$pagesize;
						$strsql="select  * from  newslib where showMode=" . $showmode . " and delMode=0 order by ordrerList   limit $frompage,$pagesize";
			
			$result=mysql_query($strsql, $conn);
	
			while ($row = mysql_fetch_array($result)) {	
		?>
			
			<!-----------begin--------------------->
			 <tr class="newsList" id="newsList<?php echo $row[id]; ?>">
            <td width="95" class="annonce_content" align=center>[<?php echo substr($row[udate],0,10); ?>]</td>
            <td width="585" class="infocontent"><?php echo convert2utf8($row[title]); ?></td>
			 </tr>
		<?php 
		 	}
		?>
			<!-------end --------->
			
		
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
<?php
	//echo $numQuery;
 $init=1;
 $page_len=7;
 $max_p=$pages;

 $page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数
 $pageoffset = ($page_len-1)/2;//页码个数左右偏移量
 

 	$key="\n<span class='brownDescText'>总数: $nameNum 条 | 第 $page 页/共 $pages 页</span>&nbsp;";			//第几页,共几页
	if($page!=1){
		$key.="<span onmouseover=\"this.style.backgroundColor='#3366cc';this.style.color='#FFFF00';\"  onmouseout=\"this.style.backgroundColor='#FFFFFF';this.style.color='#0000ff';\" style=\"cursor:pointer;color:#0000ff\" onclick=\"jump(1)\">首页</span> ";				//第一页
		//$key.="<a  href=\"#\" onclick=\"jump(".($page-1).")\">上一页</a>\n";	//上一页
	}else {
		$key.="首页 ";//第一页
		//$key.="上一页";	//上一页
	}
$key.=" | ";

	if($pages>$page_len){
		//如果当前页小于等于左偏移
		if($page<=$pageoffset){
			$init=1;
			$max_p = $page_len;
		}else{//如果当前页大于左偏移
			//如果当前页码右偏移超出最大分页数
			if($page+$pageoffset>=$pages+1){
				$init = $pages-$page_len+1;
			}else{
				//左右偏移都存在时的计算
				$init = $page-$pageoffset;
				$max_p = $page+$pageoffset;
			}
		}
 	}
	
 	for($i=$init;$i<=$max_p;$i++){
		if($i==$page){
			$key.=' <span>'.$i.'</span>';
		} else {
			$key.=" <span onmouseover=\"this.style.backgroundColor='#3366cc';this.style.color='#FFFF00';\"  onmouseout=\"this.style.backgroundColor='#FFFFFF';this.style.color='#0000ff';\" style=\"cursor:pointer;color:#0000ff\" onclick=\"jump(".$i.")\">".$i."</span>";
		}
 	}
 	
	$key.=" | ";
 	if($page!=$pages &&  $detailNum>0){
		//$key.=" <a href=\"#\" onclick=\"jump(".($page+1).")\">下一页</a> \n";//下一页
		$key.="<span onmouseover=\"this.style.backgroundColor='#3366cc';this.style.color='#FFFF00';\"  onmouseout=\"this.style.backgroundColor='#FFFFFF';this.style.color='#0000ff';\" style=\"cursor:pointer;color:#0000ff\" onclick=\"jump(".$pages.")\">尾页</span>\n";	//最后一页
	}else {
		//$key.="下一页 ";//下一页
		$key.="尾页";	//最后一页
	}
?>
		  
		  
            <td colspan="2"><div align="center"><?php echo $key?></div></td>
          </tr>
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
