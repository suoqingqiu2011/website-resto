<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ajouter by liu 19/05/2010-->
<?
	//ajouter by liu pour changer la language 19/05/2010
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	//end
	include_once("../include/config.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];
	
if($_SESSION['lang']=="fr"){// ajouter by liu 19/05/2010 changer language
if($action == "newOption")	{
	if (empty($name)) {
		echo "<script language='javascript'>alert('Veuillez donner un nom à l\'option')</script>";
		}
	else {
		$sql="INSERT INTO options_menu (`RestoID`,`MenuID`,`Name`) VALUES ('$RestoID','$MenuID','$name')";
		mysql_query($sql) or die(mysql_error());  
		}
}	
			
elseif($action=="newChoix") {
	if (empty($ChoixMenuID)) {
		echo "<script language='javascript'>alert('Veuillez choisir un élement à ajouter à l\'option')</script>";
		}
	else {
		$sql="INSERT INTO options (`RestoID`,`MenuID`,`OptionMenuID`,`ChoixMenuID`,`Prix`)
						VALUES	 ('$RestoID','$MenuID','$OptionMenuID','$ChoixMenuID','$prix')";
		mysql_query($sql) or die(mysql_error()); 
	} 
}
elseif($action=="modifOption") {
	if (empty($name)) {
		echo "<script language='javascript'>alert('Veuillez donner un nom à l\'option')</script>";
		}
	else {
		$sql="update options_menu set `Name` = '$name' WHERE `RestoID`='$RestoID' && `OptionMenuID`='".$optionmenuid."'";
	mysql_query($sql) or die(mysql_error());
	}
}	
elseif($action=="modifChoix") {
	if (empty($ChoixMenuID)) {
		echo "<script language='javascript'>alert('Veuillez donner un nom à l\'option')</script>";
		}
	else {
		$sql="update options set `OptionMenuID` = '$OptionMenuID', `ChoixMenuID`='$ChoixMenuID',`Prix`='$prix' WHERE `RestoID`='$RestoID' && `OptionID`='".$optionid."'";
	mysql_query($sql) or die(mysql_error());
	}
}
}

if($_SESSION['lang']=="cn"){// ajouter by liu 19/05/2010 changer language
if($action == "newOption")	{
	if (empty($name)) {
		echo "<script language='javascript'>alert('请输入一个选项名')</script>";
		}
	else {
		$sql="INSERT INTO options_menu (`RestoID`,`MenuID`,`Name`) VALUES ('$RestoID','$MenuID','$name')";
		mysql_query($sql) or die(mysql_error());  
		}
}	
			
elseif($action=="newChoix") {
	if (empty($ChoixMenuID)) {
		echo "<script language='javascript'>alert('请选择一个项')</script>";
		}
	else {
		$sql="INSERT INTO options (`RestoID`,`MenuID`,`OptionMenuID`,`ChoixMenuID`,`Prix`)
						VALUES	 ('$RestoID','$MenuID','$OptionMenuID','$ChoixMenuID','$prix')";
		mysql_query($sql) or die(mysql_error()); 
	} 
}
elseif($action=="modifOption") {
	if (empty($name)) {
		echo "<script language='javascript'>alert('请输入一个选项名')</script>";
		}
	else {
		$sql="update options_menu set `Name` = '$name' WHERE `RestoID`='$RestoID' && `OptionMenuID`='".$optionmenuid."'";
	mysql_query($sql) or die(mysql_error());
	}
}	
elseif($action=="modifChoix") {
	if (empty($ChoixMenuID)) {
		echo "<script language='javascript'>alert('请输入一个选项名')</script>";
		}
	else {
		$sql="update options set `OptionMenuID` = '$OptionMenuID', `ChoixMenuID`='$ChoixMenuID',`Prix`='$prix' WHERE `RestoID`='$RestoID' && `OptionID`='".$optionid."'";
	mysql_query($sql) or die(mysql_error());
	}
}
}
// Verifie qu'il y a toujours des options pour ce menuid
$test=0;
$sql="select * from options where `RestoID`='$RestoID' && MenuID='".$MenuID."'";	
$result=mysql_query($sql);
while($myrow=mysql_fetch_array($result))
			{
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