<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ajouter by liu 18/05/2010-->
<?
//ajouter pour change language by liu
session_start();
include('../lang/'.$_SESSION['lang'].'.php');
require("../include/config.php");
include "session.php";

	$RestoID = $_COOKIE["systa_restoid"];

$redirection="adminfamille.php";
//   le 2012 05 21 lang modifier pour traiter le probleme de ' et " (guillmet et apostrophe)

	$sql="Select * from $tb_famille Where `RestoID`='$RestoID'";
  	$result=mysql_query($sql) OR die (mysql_error());
  	$row+=mysql_num_rows($result);

	$Name=mysql_escape_string(stripslashes($Name));

	/*while($row = mysql_fetch_row($result)){
		echo $row[0]; echo "&nbsp";
		echo $row[1]; echo "&nbsp";
		echo $row[2]; echo "&nbsp";
		echo $row[3]; echo "&nbsp";
		echo $row[4]; echo "&nbsp";
		echo $row[5]; echo "</br>";	
	}*/
//fin
				
if($_SESSION['lang']=="fr"){// ajouter by liu 18/05/2010 changer language
	/*if($row != 0 && $action!="Modifier" ){
		echo "<script> alert('Le Menu Existe!'); history.back();</script>";		
	}else{
	*/
	if($action == "Ajouter")
	{
		//ling change for list 13/01/2014
		/*if ($mode=="famille") {$mysql="insert into famille(`FamilleID`,`RestoID`,`Name`,`Cache`) Values('$FamilleID','$RestoID','$Name','$Cache')";}
		else {$mysql="insert into sous_famille(`RestoID`,`FamilleID`,`Name`) Values('$RestoID','$FamilleID','$Name')";}*/
		
		//得到最大的值 往后加值1 : CHEN Tong 
		$sqlID="SELECT Max(MenuTypeID) AS MenuTypeID FROM menutype550;";
		$reqID = mysql_query($sqlID) or die(mysql_error());
		$data=mysql_fetch_array($reqID);
		$MenuTypeID=$data['MenuTypeID'] + 1;				
			
		if ($mode=="menutype550") {
			$mysql="insert into $tb_famille(`MenuTypeID`,`RestoID`,`MenuTypeName`,`Cache`) Values('$MenuTypeID','$RestoID','$Name','$Cache')";
			
		
			if(isset($_POST["famille_list"])){
				if ($_POST["famille_list"] == 1){
					mysql_query("insert into famille_list(`famille_id`) Values(".$ID.")") or die(mysql_error());
				}
			}
		}else {
			$mysql="insert into sous_famille(`RestoID`,`MenuTypeID`,`Name`) Values('$RestoID','$MenuTypeID','$Name')";
			if(isset($_POST["famille_list"])){
				if ($_POST["famille_list"] == 1){
					mysql_query("insert into famille_list(`sous_famille_id`) Values(".$ID.")") or die(mysql_error());
				}
			}
		}
	
		
	} elseif($action == "Modifier") {
		//ling change for list 13/01/2014
		/*if ($mode=="famille") {
			$mysql="update famille set `Name`='$Name',`Cache`='$Cache' where `FamilleID`='$ID'";
			$redirection="adminfamille.php?exFamilleID=".$ID;
		}
		else {
			$mysql="update sous_famille set `Name`='$Name',`FamilleID`='$FamilleID' where `sousFamilleID`='$ID'";
		}*/
		if ($mode=="menutype550") {
			$mysql="update $tb_famille set `MenuTypeName`='$Name',`Cache`='$Cache' where `MenuTypeID`='$ID'";
			if(isset($_POST["famille_list"])){
				if ($_POST["famille_list"] == 1){
					mysql_query("insert into famille_list(`famille_id`) Values(".$ID.")") or die(mysql_error());
				}
			}else{
				mysql_query("delete from famille_list where famille_id = ".$ID) or die(mysql_error());
			}
			$redirection="adminfamille.php?exFamilleID=".$ID;
		}
		else {
			$mysql="update sous_famille set `Name`='$Name',`MenuTypeID`='$MenuTypeID' where `sousFamilleID`='$ID'";
			if(isset($_POST["famille_list"])){
				if ($_POST["famille_list"] == 1){
					mysql_query("insert into famille_list(`sous_famille_id`) Values(".$ID.")") or die(mysql_error());
				}
			}else{
				mysql_query("delete from famille_list where sous_famille_id = ".$ID) or die(mysql_error());
			}
		}
	
	}
}

if($_SESSION['lang']=="cn"){// ajouter by liu 18/05/2010 changer language
	if($action == "增加")
	{
		//ling change for list 13/01/2014
		/*if ($mode=="famille") {$mysql="insert into famille(`FamilleID`,`RestoID`,`Name`,`Cache`) Values('$FamilleID','$RestoID','$Name','$Cache')";}
		else {$mysql="insert into sous_famille(`RestoID`,`FamilleID`,`Name`) Values('$RestoID','$FamilleID','$Name')";}*/
		//得到最大的值 往后加值1 : CHEN Tong 
		$sqlID="SELECT Max(MenuTypeID) AS MenuTypeID FROM menutype550;";
		$reqID = mysql_query($sqlID) or die(mysql_error());
		$data=mysql_fetch_array($reqID);
		$MenuTypeID=$data['MenuTypeID'] + 1;	
		
		if ($mode=="menutype550") {
			$mysql="insert into $tb_famille(`MenuTypeID`,`RestoID`,`MenuTypeName`,`Cache`) Values('$MenuTypeID','$RestoID','$Name','$Cache')";
			if(isset($_POST["famille_list"])){
				if ($_POST["famille_list"] == 1){
					mysql_query("insert into famille_list(`famille_id`) Values(".$ID.")") or die(mysql_error());
				}
			}
		}else {
			$mysql="insert into sous_famille(`RestoID`,`MenuTypeID`,`Name`) Values('$RestoID','$MenuTypeID','$Name')";
			if(isset($_POST["famille_list"])){
				if ($_POST["famille_list"] == 1){
					mysql_query("insert into famille_list(`sous_famille_id`) Values(".$ID.")") or die(mysql_error());
				}
			}
		}
	} elseif($action == "修改") {
		//ling change for list 13/01/2014
		/*if ($mode=="famille") {
			$mysql="update famille set `Name`='$Name',`Cache`='$Cache' where `FamilleID`='$ID'";
			$redirection="adminfamille.php?exFamilleID=".$ID;
		}
		else {
			$mysql="update sous_famille set `Name`='$Name',`FamilleID`='$FamilleID' where `sousFamilleID`='$ID'";
		}*/
		if ($mode=="menutype550") {
			$mysql="update $tb_famille set `MenuTypeName`='$Name',`Cache`='$Cache' where `MenuTypeID`='$ID'";
			if(isset($_POST["famille_list"])){
				if ($_POST["famille_list"] == 1){
					mysql_query("insert into famille_list(`famille_id`) Values(".$ID.")") or die(mysql_error());
				}
			}else{
				mysql_query("delete from famille_list where famille_id = ".$ID) or die(mysql_error());
			}
			$redirection="adminfamille.php?exFamilleID=".$ID;
		}
		else {
			$mysql="update sous_famille set `Name`='$Name',`MenuTypeID`='$MenuTypeID' where `sousFamilleID`='$ID'";
			if(isset($_POST["famille_list"])){
				if ($_POST["famille_list"] == 1){
					mysql_query("insert into famille_list(`sous_famille_id`) Values(".$ID.")") or die(mysql_error());
				}
			}else{
				mysql_query("delete from famille_list where sous_famille_id = ".$ID) or die(mysql_error());
			}
		}
	}
}
mysql_query($mysql) or die(mysql_error());
//header("Location:adminfamille.php?exFamilleID=".$FamilleID); //delete by liu 25/06/2010

?>
<html>
<head>
<title></title>
<meta http-equiv="refresh" content="0; url=<? echo $redirection; ?>">
</head>
<body>
</body>
</html>