<?php 
	header('Content-type: text/html; charset=iso-8859-1'); 
	include ('include/config.php');
	echo "<select name=\"ville\" id=\"ville\" style=\"width:145px;\" onfocus=\"this.style.backgroundColor='#fff59b'\" onblur=\"this.style.backgroundColor='#ffffff'\"/>";
	$sqlVille = "SELECT * FROM ville WHERE CP=$CP && VilleID in(SELECT VilleID FROM resto_livraison WHERE RestoID='$restoID') ORDER BY Ville";
	$resVille = mysql_query($sqlVille) or die(mysql_error());
	while($rowVille = mysql_fetch_array($resVille)){
		if ($admin==1) {
			echo "<option value=\"".$rowVille[VilleID]."\"";
		} else {
			echo "<option value=\"".$rowVille[Ville]."\"";
		}
		echo">".$rowVille[Ville]."</option>";
	}
	echo"</select>";
?>