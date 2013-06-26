<?php 

include("dbconnect.php");

$outStr='<table width=194 border=0 cellspacing=0 cellpadding=0><tr><td height=7></td></tr><tr><td height=7><img src="images/ano_dot.jpg" /></td></tr>';


$strsql="SELECT * from newslib where showMode=2 and delMode=0 order by ordrerList,addinDate desc limit 0,5";
$result=mysql_query($strsql, $conn);

$i=0;	
while($row = mysql_fetch_array($result)){
	$i++;
	$content=convert2utf8($row[content]);
	$title=convert2utf8($row[title]);
	$outStr.='<tr class="leftNewsList" id="leftNewsList$id"><td  id="pname' . $i . '">';
    $outStr.='<table width=194 border=0 cellspacing=0 cellpadding=0><tr><td width=23 height=46 class="annonce_number">' . $i . '</td>';
    $outStr.='<td width=19 class="annonce_splice">|</td><td width=152><span class="annonce_title">' .formatData($title,9).'</span><br /><span class="annonce_content">';
	$outStr.= formatData($content,12). '</span></td></tr></table></td></tr>';
	if($i<5){ 
		$outStr.='<tr><td height=7><img src="images/ano_dot.jpg" /></td></tr>';
	}
}

for($j=$i+1;$j<=5;$j++){	
 	$outStr.='<tr><td ><table width=194 border=0 cellspacing=0 cellpadding=0><tr><td width=23 height=46 class="annonce_number">' . $j . '</td>';
    $outStr.='<td width="19" class="annonce_splice">|</td><td width="152"><span class="annonce_title"></span><br /><span class="annonce_content"></span></td></tr></table></td></tr>';
	if($j<5){ 
		$outStr.='<tr><td height=7><img src="images/ano_dot.jpg" /></td></tr>';
	}
}
$outStr.='</table>';
                   
echo $outStr;
?>