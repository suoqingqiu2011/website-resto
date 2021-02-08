<?  include ('include/config_perso.php');
	include ('../aritosushi75015.com/include/config.php');
	include("common.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php
		include("include/meta.php");
		include("include/rollover.php");
	?>
	<script language="javascript" src="fonctions.js"></script>
	<link href="<? echo $chemin_court; ?>style.css" rel="stylesheet" type="text/css" />
</head>

<body onload="afficher_la_date()">
<div class="page">

  <table width="980" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
    <tr>
      <td width="20">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td width="8"><img src="<? echo $chemin_court; ?>ombre_h_d.gif" width="20" height="20" /></td>
    </tr>
	
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><img src="img/pixel.gif" width="1" height="64" /></td>
      <td background="<? echo $chemin_court; ?>ombre_vert.gif">&nbsp;</td>
    </tr>
	
    <tr>
      <td class="col_gauche">&nbsp;</td>
      <td valign="top"><div class="contenu">
        <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="150" valign="top"><div align="left"><br />
                <?
				// R&eacute;cup&eacute;ration de la première catégorie
				$sql="SELECT * FROM ".$tb_famille." WHERE RestoID = '".$restoID."' ORDER BY SortID LIMIT 0,1";
				$req = mysql_query($sql) or die(mysql_error());
				while($data=mysql_fetch_array($req)){
					$familleID=$data['FamilleID'];
				}	
				// Récupération des catégories
				$sql="SELECT * FROM ".$tb_famille." WHERE RestoID = '".$restoID."' ORDER BY SortID";
				$req = mysql_query($sql) or die(mysql_error());
				while($data=mysql_fetch_array($req)){
					echo "<img src='".$chemin_court."pt_fleche_d";
					if ($data['FamilleID']==$familleID) {echo "_b";}
					echo".gif' style='padding-right:5px' /><a href='".id_to_url_menu($data["FamilleID"],$data["Name"])."'>";
					if (strlen($data['Name'])>11) {echo substr($data['Name'],0,11)."...";}
					else {echo $data['Name'];}
					echo"</a><br>";
				//<a href='menu.php?familleID=".$data['FamilleID']."'>".$data['Name']."</a><br><br>";
				}
				if ($_GET['articleID']=="") {
					// Récupération du premier article de la catégorie en cours
					$sql="SELECT * FROM ".$tb_menu." WHERE FamilleID = '".$familleID."' && RestoID='".$restoID."' ORDER BY SortID LIMIT 0,1 ";
				}else {
					// Récupération de l'article selon l'ID
					$sql="SELECT * FROM ".$tb_menu." WHERE FamilleID = '".$familleID."' && RestoID='".$restoID."' && MenuID='".$_GET['articleID']."'";
				}
				$req = mysql_query($sql) or die(mysql_error());
				while($data=mysql_fetch_array($req)){
					$aff_articleID=$data['MenuID'];
					$aff_code=$data['Code'];
					$aff_name=$data['Name'];
					$aff_prix=format_prix($data['Prix']);
					$aff_img=$data['Image'];
					$aff_note=$data['Note'];
				}
			  ?>
              </div></td>
              <td valign="top">
			    <div align="center" style="padding-bottom:15px; color:#ffffff; font-size:18px;">
					<strong>
					   <?
						$sql="SELECT * FROM ".$tb_famille." WHERE FamilleID = '".$familleID."'";
						$req = mysql_query($sql) or die(mysql_error());
						while($data=mysql_fetch_array($req)){
							echo $data['Name'];
						} 
					  ?>
					</strong> 
				</div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                   <tr>
                      <td width="294" rowspan="2" align="center" valign="middle">
						  <a href="javascript:void(0)" class="petit" onclick="window.open('detail.php?articleID=<? echo $aff_articleID; ?>','detail','width=5,height=5')">
						  <? if ($aff_img!="") {
							  $aff_img="http://www.rueresto.com/".$aff_img;
							  echo "<img src='$aff_img' alt='$aff_name' width='150' height='80'/><br />";
						  }else {
							  echo "<img src='".$chemin."indispo.gif'/><br />";
						  } ?>
						  </a>
					  </td>
                      <td width="294" align="left" valign="top">
					     <?  echo "<strong>".$aff_name."</strong><br /><br />".substr($aff_note,0,60); ?>... <a href="javascript:void(0)" class="petit" onclick="window.open('detail.php?articleID=<? echo $aff_articleID; ?>','detail','width=5, height=5, status=no, directories=no, toolbar=no, location=no, menubar=no, scrollbars=no, resizable=no, status=no')">+&nbsp;de&nbsp;d&eacute;tails</a>
					     <a href="javascript:void(0)" class="petit" onclick="window.open('detail.php?articleID=<? echo $aff_articleID; ?>','detail','width=5,height=5,location=no,status=no')"></a>
					     <a href="javascript:void(0)" class="petit" onclick="window.open('detail.php?articleID=<? echo $aff_articleID; ?>','detail','status=no, directories=no, toolbar=no, location=no, menubar=no, scrollbars=no, resizable=no')"></a>
					  </td>
                  </tr>
                  <tr>
                      <td><form id="form1" name="form1" method="post" action="rueresto.com-livraison-a-domicile-traitement-panier.html" target="menu_site">
                          <table border="0" align="center" cellpadding="0" cellspacing="2">
                        <tr>
                          <td valign="middle"><? echo $aff_prix; ?>&nbsp;</td>
                          <td width="20" valign="middle">
						      <div align="right">
							    <a href="javascript:void(0)">
								   <img src="img/qte-moins.gif" width="20" height="20" border="0" onclick="calcul_qte('qte','moins');"/>
								</a>
							  </div>
						  </td>
                          <td width="30" valign="middle">
						      <div align="center">
                                 <input name="qte" type="text" class="qte" id="qte" value="1" readonly="readonly"/>
                              </div>
						  </td>
                          <td width="20" valign="middle">
						      <div align="left">
							     <a href="javascript:void(0)">
						         <img src="img/qte-plus.gif" width="20" height="20" border="0" onclick="calcul_qte('qte','plus');"/>
							     </a>
							  </div>
						  </td>
                          <td valign="middle">
						      <input type="submit" name="Submit2" value="Ajouter" />
                              <input name="mode" type="hidden" id="mode" value="ajout" />
                              <input name="articleID" type="hidden" value="<? echo $aff_articleID; ?>" /></td>
                        </tr>
                      </table></form></td>
                   </tr>
                   <tr>
                      <td colspan="2">
					    <div align="center">  </div>
					  </td>
                    </tr>
                  </table>
                <br />
                <? // Recherche d'&eacute;ventuelles sous famille
					if ($sous_famille_ok==1) {// Si on a des sous famille, on va chercher les produits correspondants
						$sql="SELECT * FROM ".$tb_menu." WHERE FamilleID = '".$familleID."' && SousFamilleID= '".$sousFamilleID."'&& RestoID='".$restoID."' ORDER BY SortID";
					}else { // S'il n'y a pas de sous famille on affiche les produits de la famille
						$sql="SELECT * FROM ".$tb_menu." WHERE FamilleID = '".$familleID."' && RestoID='".$restoID."' ORDER BY SortID";
					}
					// Affichage des liens des sous familles 
					$sqlSF="SELECT * FROM sous_famille WHERE FamilleID = '".$familleID."' && RestoID='".$restoID."' ORDER BY SortID";
					$reqSF = mysql_query($sqlSF) or die(mysql_error());
					echo "<p><strong>";
					while($dataSF=mysql_fetch_array($reqSF)){
						if ($dataSF['SousFamilleID']==$sousFamilleID) {
							echo" &rArr; ".$dataSF['Name'];
						}else{
							echo " &ndash; <a href='menu.php?familleID=".$familleID."&sousFamilleID=".$dataSF['SousFamilleID']."'>".$dataSF['Name']."</a>&nbsp;&nbsp;";
						}
					}
					echo "</strong></p>";
				?>
                <div style="height:190px;width:100%;overflow:auto; margin-top:0px;">
                    <? 
					   $sql="SELECT * FROM ".$tb_menu." WHERE FamilleID = '".$familleID."' && RestoID='".$restoID."' ORDER BY SortID";
					   $req = mysql_query($sql) or die(mysql_error());
					   while($data=mysql_fetch_array($req)){
						  echo "<table width='400' border='0' align='center' cellpadding='0' cellspacing='0'><tr><form method='post' action='rueresto.com-livraison-a-domicile-traitement-panier.html' target='menu_site'>";
						  //echo"<td width='200' class='filet'><a href='menu.php?familleID=".$_GET['familleID']."&articleID=".$data['MenuID']."'>".$data['Name']." (".$data['Code'].")</a></td>
						  echo"<td width='200' class='filet'><a href='".id_to_url($familleID,$data["MenuID"],$data["Name"])."'>".$data['Name']."</a></td>
					&nbsp;</td>";
						   echo"<td width='100' align='right' class='filet'>".format_prix($data['Prix'])."</td>";
						   echo"<td width='100' align='right' class='filet'><input name='qte' type='hidden' value='1' /><input name='articleID' type='hidden' value=".$data['MenuID']." /><input name='mode' type='hidden' value='ajout' /><input type='image' src='img/qte-plus.gif' alt='Ajouter au panier' /></td>
						   </form></tr></table>";
						}
				    ?>
                </div>
			  </td>
            </tr>
          </table>
        </td>
      <td valign="top" class="menu"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr class="menu">
            <td>
			  <iframe src="rueresto.com-livraison-a-domicile-menu-site.html" name="menu_site" frameborder="0" scrolling="no" width="200" height="350">
			  </iframe>
			</td>
          </tr>
      </table><div class="motscle"><? echo $mots_cle_sous_menu; ?></div></td>
      <td background="<? echo $chemin_court; ?>ombre_vert.gif">&nbsp;</td>
    </tr>
    <tr>
      <td><img src="<? echo $chemin_court; ?>ombre_b_g.gif" width="20" height="20" /></td>
      <td colspan="2" background="<? echo $chemin_court; ?>ombre_hori.gif">&nbsp; </td>
      <td><img src="<? echo $chemin_court; ?>ombre_b_d.gif" width="20" height="20" /></td>
    </tr>
   </table>
  </div>

   <?  include ('header.php');
	   include ('footer.php'); 
   ?>
   </body>
	
</html>
