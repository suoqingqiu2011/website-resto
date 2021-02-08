<?
	include_once("../include/config.php");
	
	$RestoID = $_COOKIE["systa_restoid"];
	$UserName = $_COOKIE["systa_restoname"];
	$Password = $_COOKIE["systa_restopassword"];
	
	$sql = "select * from $tb_resto where `Login`='$UserName' and `Password`='$Password' and `Check`='1'";
	$result=mysql_query($sql) or die(mysql_error());
    $row=mysql_num_rows($result);
    if($row==0){
  			die("VOUS DEVEZ VOUS IDENTIFIER<a href=\"index.php\">ICI</a>");
  	}
?>