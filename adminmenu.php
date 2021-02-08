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
	<title><? print t_Gestion_Menus; ?></title>
	<link rel="stylesheet" href="css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css1/component.css" />
	<link rel="stylesheet" type="text/css" href="css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="css1/style1.css" />
</head>

<script language="javascript">
		function writediv(texte){
			 document.getElementById('affichage_sous_menu').innerHTML = texte;
		}
		function affichage_sous_menu() {
			if(texte = file('affichage_sous_menu.php?restoID=<? echo $RestoID; ?>&MenuTypeID='+escape(document.getElementById('deroulant_familleID').value)+'&sousfamilleID=<? echo $SousFamilleID; ?>')){
			writediv(texte);
			}
		}	
		function file(fichier){
			 if(window.XMLHttpRequest) // FIREFOX
				  xhr_object = new XMLHttpRequest();
			 else if(window.ActiveXObject) // IE
				  xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
			 else
				  return(false);
			 xhr_object.open("GET", fichier, false);
			 xhr_object.send(null);
			 if(xhr_object.readyState == 4) 
				 return(xhr_object.responseText);
			 else return(false);
		} 
</script>

<style type="text/css">
 .aa{ width:200px; float:left;}
    .aa li{ padding:5px; background:#ff0000; cursor:pointer;}
 .bb{ width:700px; float:left; background:#00ff00;}
</style>

<body onLoad="affichage_sous_menu()">

<?php include ("top_left_nav.php"); ?>


<?php include ("box_menu.php"); ?>

<script src="js1/classie.js"></script>
<script src="js1/modalEffects.js"></script>
<script src="js1/jquery.min.js"></script>

<!-- Footer -->
<div id="con_footer " >
	<div class="shell">
		<?php include ("bottom.php"); ?>
	</div>
</div>
<!-- End Footer -->
</body>
</html>