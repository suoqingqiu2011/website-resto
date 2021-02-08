<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?
	//ajouter pour change language by liu
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	//end
	include_once("../include/config.php");
	include_once("../include/config_perso.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];

	if ($FamilleID=="") {
		$str2="select * from $tb_famille where RestoID='$RestoID' ORDER BY SortID LIMIT 1";
		$res2=mysql_query($str2);
		while($aff2=mysql_fetch_array($res2)) {
			$FamilleID=$aff2['MenuTypeID'];
		}
	}
	$str2="select * from sous_famille where RestoID='$RestoID' && MenuTypeID=$FamilleID";
		$res2=mysql_query($str2);
		while($aff2=mysql_fetch_array($res2)) {
			$sous_famille_presentes=1;
		}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>votre commande</title>
	<link rel="stylesheet" href="#" type="text/css" media="all" />
</head>

<form action="#" method="#" enctype="multipart/form-data" onSubmit="return check();" style="padding-bottom:20px;">
			<div class="form_enter">
					

			</div>
			
			<button onclick="pupclose()"  name="action" type="submit" class="submitbutton" id="action" >enter</button>
</form>
				
<script src="#></script>
