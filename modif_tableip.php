<?php
	//include_once("../include/config.php");
	//include_once("session.php");
	
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	include_once("../include/config.php");
	include_once("session.php");	
	$name = $_COOKIE["systa_restoname"];
	
	echo "<script> alert('Modifier IP Adresse et Table Number!'); </script>";		 
	$sql="update tableip set `num`='$table_number' where `ip`='$ipadress' ";
	print $sql;
	mysql_query($sql) or die(mysql_error());
?>

<html>
	<head>
	<title></title>
		<meta http-equiv="refresh" content="0; url=modifieripnumber.php">
	</head>
	<body>
	</body>
</html>