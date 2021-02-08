<?
	include_once("../include/config.php");
	include_once("session.php");

	if ($MenuTypeID!="") {
		//$mysql="delete from $tb_famille where `MenuTypeID`='$MenuTypeID' && RestoID='$RestoID'";

		$mysql="delete from $tb_famille where `MenuTypeID`='$MenuTypeID'";
		mysql_query($mysql) or die(mysql_error());
	}

	/*elseif ($sousFamilleID!="") {
	//$mysql="delete from sous_famille where `sousFamilleID`='$sousFamilleID' && RestoID='$RestoID'";
	$mysql="delete from sous_famille where `sousFamilleID`='$SousFamilleID'";
	mysql_query($mysql) or die(mysql_error());
	}*/

	$mysql="delete from sous_famille where `sousFamilleID`='$SousFamilleID'";
	mysql_query($mysql) or die(mysql_error());
?>

<html>
	<head>
	<title></title>
		<meta http-equiv="refresh"  content="0; url=adminfamille.php">
	</head>
	<body>
	</body>
</html>