<?
session_start();

//测试的数据库
/*
$db_server="localhost";
$db_user="root";
$db_password="admin";
$systa_db="systaresto";
*/

//服务器的最终的数据库 systatestnew
// 远程连接数据库测试 192.168.1.28
$db_server="192.168.1.28";
$db_user="root";
$db_password="test";
$systa_db="systatestnew";

$connect=mysql_connect($db_server,$db_user,$db_password) or die(mysql_error()); 
$select=mysql_select_db($systa_db,$connect) or die(mysql_error());

function format_prix($prix) {
	$prix=number_format($prix,'2','.',' ');
	$prix=str_replace('.',' &euro; ',$prix);
	return $prix;
}

include("lang/fr.php");	

?>