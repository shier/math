<?php

$mysql_server_name="localhost"; 
$mysql_username="shier"; 
$mysql_password="a!s@d#f$"; 
$mysql_database="haisw_math";

//$mysqli = new mysqli($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);


$conn=mysql_connect($mysql_server_name, $mysql_username, $mysql_password);
mysql_select_db("haisw_math", $conn);
mysql_query("SET NAMES 'gb2312'");



/* 定义字符转换函数，解决mssql中文乱码问题*/
function convert2utf8($string){
	return iconv("gbk","utf-8",$string);
}

function convert2gbk($string){
	return iconv("utf-8","gbk",$string);
}

function replacemark($string){
	$string=str_replace("[","<",$string);
	$string=str_replace("]",">",$string);
	return $string;
}
function replacesmark($string){
	$string=str_replace("'","",$string);
	return $string;
}
function formatData($string,$lens){

	$string=str_replace("\\r","",$string);
	$string=str_replace("\\n"," ",$string);
	$endstr="";
	$temp=strip_tags($string);
	
	if($lens>0 && mb_strlen($temp)>=$lens){
		$endstr= "..."; 
		$temp= mb_substr($temp, 0, $lens-1,"gb2312"); 
	}
	$temp=$temp. $endstr;
	return $temp;
}
function formatDatau($string,$lens){

	$string=str_replace("\\r","",$string);
	$string=str_replace("\\n"," ",$string);
	$endstr="";
	$temp=strip_tags($string);
	
	if($lens>0 && mb_strlen($temp)>=$lens){
		$endstr= "..."; 
		$temp= mb_substr($temp, 0, $lens-1,"utf-8"); 
	}
	$temp=$temp. $endstr;
	return $temp;
}



function get_real_ip(){
	$ip=false;
	if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
		if($ip) { array_unshift($ips, $ip); $ip = FALSE; }
		for ($i = 0; $i < count($ips); $i++) {
			if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
				$ip = $ips[$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}
?>
