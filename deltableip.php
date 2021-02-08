<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="refresh"  content="0; url=modifieripnumber.php">
	</head>
	<body>
	</body>
</html>

<?php
	session_start();
    include('../lang/'.$_SESSION['lang'].'.php');
	include_once("../include/config.php");
	include_once("../include/config_perso.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];
	$name = $_COOKIE["systa_restoname"];

	/*$sql="delete from tableip Where `ip`='$ipadress'";
	print $sql;
	mysql_query($sql) or die(mysql_error());*/
	
	if($_SESSION['lang']=="fr"){ 
	echo "<script> alert('Supprimer IP Adresse et Table Number!'); </script>";
	}
	if($_SESSION['lang']=="cn"){ 
	echo "<script> alert('删除平板和对应的IP地址!'); </script>";	
	}
	$sql="delete from tableip Where `ip`='$ipadress'";
	//print $sql;
	mysql_query($sql) or die(mysql_error());				
?>

