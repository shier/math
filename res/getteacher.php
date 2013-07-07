<?php 

include("dbconnect.php");

$depid=$_REQUEST[depid];
$outStr='<table width=680 border=0 cellpadding=0 cellspacing=1 bgcolor="#a2d7cd">';
$outStr.='<tr><td width="70" class="tabletitle">姓名</td><td width="150" class="tabletitle">学历</td>';
$outStr.='<td width="100" class="tabletitle">职称</td><td width="100" class="tabletitle">导师类型</td>';
$outStr.='<td width="254" class="tabletitle">研究方向</td></tr>';

$strsql="SELECT a.*,b.pdob FROM member as a, detail as b where a.id=b.pid and a.depid=" . $depid  . " order by orderlist";
$result=mysql_query($strsql, $conn);
echo $outStr;
$i=0;	
while($row = mysql_fetch_array($result)){
	$i++;
	$q=convert2utf8($row[question]);
	$a=convert2utf8($row[answer]);
	if($row[id]==6){$tname='谢琍';}else{$tname=convert2utf8($row[pname]);}
	echo '<tr id="nameList' . $row[id] . '" class="nameList"><td >' .$tname . '</td>';
	echo '<td >' .convert2utf8($row[pdegree]) . '</td>';
    echo '<td >' . convert2utf8($row[ptitle]) . '</td>';
	echo '<td >' . convert2utf8($row[ptype]) . '</td>';
	echo '<td >' . convert2utf8($row[pstudy]) . '</td></tr>';
}

//$outStr.='</table>';
                   
echo '</table>';
?>


  