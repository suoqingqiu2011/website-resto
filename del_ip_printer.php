<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>   
	<title></title>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="refresh" content="0; url=ajouter_ip_printer.php">
	</head>
	<body>
	</body>
</html>

<?php
	//include_once("../include/config.php");
	//include_once("session.php");
	
	session_start();
    include('../lang/'.$_SESSION['lang'].'.php');
	include_once("../include/config.php");
	include_once("../include/config_perso.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];
	$name = $_COOKIE["systa_restoname"];

	/*$sql="delete from impriment Where `IP_Address`='$ipadress'";
	print $sql;
	mysql_query($sql) or die(mysql_error());*/
	
	if($_SESSION['lang']=="fr"){ 
		echo "<script>alert('Supprimer Nom d\'Imprimante et IP Adresse!'); </script>";
	}
	if($_SESSION['lang']=="cn"){
		echo "<script> alert('删除IP地址对应的打印机!');</script>";		
	} 
		
	$sql="delete from impriment Where `IP_Address`='$ipadress' ";
	//print $sql;
	mysql_query($sql) or die(mysql_error());		
			
?>

