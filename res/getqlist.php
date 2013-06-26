<?php 

include("dbconnect.php");

$outStr='<table width="425" border=0 cellspacing=0 cellpadding=0>';

$strsql="select  * from qlist as q, alist as a where a.qid=q.id order by qdate desc limit 0,2";
$result=mysql_query($strsql, $conn);

$i=0;	
while($row = mysql_fetch_array($result)){
	$i++;
	$q=convert2utf8($row[question]);
	$a=convert2utf8($row[answer]);
	
	$d="[" . $row[adate]. "]"; 
    
    $outStr.='<tr><td height="57"><table width="425" border=0 cellspacing=0 cellpadding=0><tr>';
    $outStr.='<td height="25" colspan="2" class="qa_title"><a href="index.php?menuID=10&submenuID=0" class="adown">'.formatDatau($q,25)."</a></td></tr><tr>";
    $outStr.='<td width="341" height="30" class="qa_content">'.formatDatau($a,20).'</td>';
    $outStr.='<td width="84" class="qa_content">'.$d.'</td></tr></table></td></tr>';
  
	if($i==1){ 
		$outStr.='<tr><td><img src="images/qa_sp.jpg" width=425 height=10 /></td></tr>';
	}
}

$outStr.='</table>';
                   
echo $outStr;
?>