<?
	include_once("../include/config.php");
	include_once("session.php");

	/* 去除第二次的删除提醒 //
	if($_SESSION['lang']=="fr"){ 
		echo "<script> alert('Supprimer ce menu!'); </script>";
	}
	if($_SESSION['lang']=="cn"){ 
		echo "<script> alert('删除这个套餐!'); </script>";	
	}
	*/
	
	$res = mysql_query("select `MenuPath` from $tb_menu where `MenuID`='$MenuID'") or die(mysql_error());
	
	if($row = mysql_fetch_array($res)){
		if (file_exists("../resto/".$row[MenuPath])) {
			unlink("../resto/".$row[MenuPath]);	
		}
	}
	$mysql="delete from $tb_menu where `MenuID`='$MenuID'";
	mysql_query($mysql) or die(mysql_error());
	//Suppression des options
	$mysql="delete from options_menu where `MenuID`='$MenuID' && RestoID='$RestoID'";
	mysql_query($mysql) or die(mysql_error());
	$mysql="delete from options_web where `MenuID`='$MenuID' && RestoID='$RestoID'";
	mysql_query($mysql) or die(mysql_error()); 
?>

<html>
	<head>
	<title></title>
		<meta http-equiv="refresh" content="0; url=adminmenu.php">
	</head>
	<body>
	</body>
</html>

