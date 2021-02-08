<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="refresh"  content="0; url=sugg_menu.php">
	</head>
	<body>
	</body>
</html>


<?php
	//ajouter pour change language by liu
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	//end
	include_once("../include/config.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];
	
	if($_SESSION['lang']=="fr"){ 
		echo "<script> alert('Supprimer cette suggestion!'); </script>";
	}
	if($_SESSION['lang']=="cn"){ 
		echo "<script> alert('删除该推荐菜品!'); </script>";	
	}
	
	$mysql="delete from ".$tb_suggestions_menu." where MenuID=".$_GET['MenuID'];
	mysql_query($mysql) or die(mysql_error());
?>
