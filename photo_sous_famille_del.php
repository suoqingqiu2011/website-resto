<?
session_start();
	include_once("../include/config.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];
	$sql="select * from $tb_menu where `RestoID`='$RestoID' && SousFamilleID='".$SousFamilleID."'";	
	$result=mysql_query($sql);
	while($myrow=mysql_fetch_array($result))
	{
	if (file_exists("../".$myrow['Image']))  {unlink("../".$myrow['Image']);}
	}
	$sql="update $tb_menu set `Image`='' where `RestoID`='$RestoID' && `SousFamilleID`='$SousFamilleID'";
	mysql_query($sql) or die(mysql_error());
	header("location:adminfamille.php?photo=del");
?>