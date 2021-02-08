<?php
	//ajouter pour change language by liu
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	//end
	include_once("../include/config.php");
	include_once("session.php");

	$RestoID = $_COOKIE["systa_restoid"];
	$sql="Insert into ".$tb_suggestions_menu."(`MenuID`,`RestoID`) values(".$_GET['MenuID'].",".$RestoID.")";
	mysql_query($sql) or die(mysql_error());
?>

<html>
	<head>
	<title></title>
		<meta http-equiv="refresh" content="0; url=sugg_menu.php">
	</head>
	<body>
	</body>
</html>