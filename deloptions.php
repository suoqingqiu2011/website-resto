<?
	include_once("../include/config.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];

	if($optionmenuid!=""){
		$mysql="delete from options_menu where `OptionMenuID`='$optionmenuid' && RestoID='$RestoID'";
		mysql_query($mysql) or die(mysql_error());

		$mysql="delete from options where `OptionMenuID`='$optionmenuid' && RestoID='$RestoID'";
		mysql_query($mysql) or die(mysql_error());
	}elseif ($optionid!="") {
		$mysql="delete from options where `OptionID`='$optionid' && RestoID='$RestoID'";
		mysql_query($mysql) or die(mysql_error());
	}
	// Verifie qu'il y a toujours des options pour ce menuid
	$test=0;
	$sql="select * from options where `RestoID`='$RestoID' && MenuID='".$MenuID."'";	
	$result=mysql_query($sql);
	while($myrow=mysql_fetch_array($result)){
		$test=1;
	}

	$sql="update menu set `Options` = '$test' WHERE `RestoID`='$RestoID' && `MenuID`='".$MenuID."'";
	mysql_query($sql) or die(mysql_error());
?>

<html>
	<head>
	<title></title>
		<meta http-equiv="refresh" content="0; url=adminoptions.php?MenuID=<? echo $MenuID; ?>">
	</head>
	<body>
	</body>
</html>