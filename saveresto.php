<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ajouter by liu 20/05/2010-->
<?
//ajouter by liu 20/05/2010 pour changer la language begin
session_start();
include('../lang/'.$_SESSION['lang'].'.php');
//end
include_once("../include/config.php");
include_once("session.php");

$RestoID = $_COOKIE["systa_restoid"];

if($_SESSION['lang']=="fr"){// ajouter by liu 20/05/2010 changer language	
if ($act=="del") {
	mysql_query("delete from resto_livraison where `RestoID`='$RestoID' && LivraisonID='$id'");
	header("Location:lieu_livraison.php");
}
elseif ($act=="add") {
	$sql = "SELECT * FROM resto_livraison WHERE VilleID='$Ville' && RestoID='".$RestoID."'";
	$res = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($res))
	{
		$test=1;
	}
	$mini=$minieur.".".$minict;
	if ($test==1) 
	//ajouter by liu 20/05/2010 pour determiner information
	{echo "<script> alert('La ville indiquée est déjà présente dans les lieux de livraison!');</script>";}
	//{header("Location:lieu_livraison.php?erreur=3");} // Ville déjà dans la base pour le resto //delete by liu 20/05/2010
	elseif ($Ville==0) 
	//ajouter by liu 20/05/2010 pour determiner information
	{echo "<script> alert('Veuillez indiquer une ville!'); </script>";}
	//{header("Location:lieu_livraison.php?erreur=2");} // Pas de ville choisie  //delete by liu 20/05/2010
	elseif ($mini<0 || $mini>999.99) 
	//ajouter by liu 20/05/2010 pour determiner information
	{echo "<script> alert('Le prix minimum indiqué est incorrect!'); </script>";}
	//{header("Location:lieu_livraison.php?erreur=1");} // Prix minimum éronné  //delete by liu 20/05/2010
	else {$sql = "INSERT INTO resto_livraison (`RestoID`, `VilleID`,`Mini`) VALUES ( '$RestoID', '$Ville','$mini')";
	mysql_query($sql) or die(mysql_error());
	header("Location:lieu_livraison.php");
}
	
}
elseif ($act=="mini_global") {
	$mini=$minieur.".".$minict;
	if ($mini<0 || $mini>999.99) 
	//ajouter by liu 20/05/2010 pour determiner information
	{echo "<script> alert('Le prix minimum indiqué est incorrect!'); </script>";}
	//{header("Location:lieu_livraison.php?erreur=1");} //delete by liu 20/05/2010
	else {
	$sql="Update resto_livraison set `Mini` = '$mini' WHERE `RestoID`='$RestoID'";
	mysql_query($sql) or die(mysql_error());
	header("Location:lieu_livraison.php");
	}
}
}
if($_SESSION['lang']=="cn"){// ajouter by liu 20/05/2010 changer language	
if ($act=="del") {
	mysql_query("delete from resto_livraison where `RestoID`='$RestoID' && LivraisonID='$id'");
	header("Location:lieu_livraison.php");
}
elseif ($act=="add") {
	$sql = "SELECT * FROM resto_livraison WHERE VilleID='$Ville' && RestoID='".$RestoID."'";
	$res = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($res))
	{
		$test=1;
	}
	$mini=$minieur.".".$minict;
	if ($test==1) 
	//ajouter by liu 20/05/2010 pour determiner information
	{echo "<script> alert('区号代码已经存在!');</script>";}
	//{header("Location:lieu_livraison.php?erreur=3");} // Ville déjà dans la base pour le resto //delete by liu 20/05/2010
	elseif ($Ville==0) 
	//ajouter by liu 20/05/2010 pour determiner information
	{echo "<script> alert('请指定一个地区!');</script>";}
	//{header("Location:lieu_livraison.php?erreur=2");} // Pas de ville choisie  //delete by liu 20/05/2010
	elseif ($mini<0 || $mini>999.99) 
	//ajouter by liu 20/05/2010 pour determiner information
	{echo "<script> alert('指定的最低价格不正确!');</script>";}
	//{header("Location:lieu_livraison.php?erreur=1");} // Prix minimum éronné  //delete by liu 20/05/2010
	else {$sql = "INSERT INTO resto_livraison (`RestoID`, `VilleID`,`Mini`) VALUES ( '$RestoID', '$Ville','$mini')";
	mysql_query($sql) or die(mysql_error());
	header("Location:lieu_livraison.php");
}
	
}
elseif ($act=="mini_global") {
	$mini=$minieur.".".$minict;
	if ($mini<0 || $mini>999.99) 
	//ajouter by liu 20/05/2010 pour determiner information
	{echo "<script> alert('指定的最低价格不正确!');</script>";}
	//{header("Location:lieu_livraison.php?erreur=1");} //delete by liu 20/05/2010
	else {
	$sql="Update resto_livraison set `Mini` = '$mini' WHERE `RestoID`='$RestoID'";
	mysql_query($sql) or die(mysql_error());
	header("Location:lieu_livraison.php");
	}
}
}
?>

<meta http-equiv="refresh" content="0; url=lieu_livraison.php">