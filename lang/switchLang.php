<?
session_start();
$_SESSION['lang']=$newLang;
include_once("../include/config.php");
include_once("session.php");
$RestoID = $_COOKIE["systa_restoid"];

$sql = "SELECT * FROM restaurant WHERE `RestoID`='$RestoID'";
$result=mysql_query($sql) OR die (mysql_error());
$row=mysql_fetch_array($result);
$num_resto=$row['yylx'];


if(empty($_SERVER['HTTP_REFERER'])) {
	if($num_resto==0){
		$adresse="../adminresto_deux/index.php";
	}
	elseif($num_resto==1){
		$adresse="../adminresto_l/index.php";
	} 
	elseif($num_resto==2){
		$adresse="../adminresto_r/index.php";
	} 
	elseif($num_resto==3){
		$adresse="../index.php";
	}
	else{
		$adresse="../index.php";
	} 
}
else {$adresse=$_SERVER['HTTP_REFERER'];}
header("location:".$adresse);
?>