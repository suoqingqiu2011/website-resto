<? 
	include ('include/config_perso.php');
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
	<script language="javascript">
		function popup() {
			var name = navigator.appName;
			if (name == "Microsoft Internet Explorer") {
				largeur=470;
				var nav=parseFloat(navigator.appVersion);
				if (nav>=7) {hauteur=120;}
				else {hauteur=90;}
			}else {
				largeur=450;
				hauteur=70;
			}
			hauteur+=document.getElementById('detail').clientHeight;
			window.resizeTo(largeur,hauteur);
			var PosX = ( screen.availWidth - largeur ) / 2; 
			var PosY = ( screen.availHeight - hauteur ) / 2;
			window.moveTo(PosX,PosY);
		}
	</script>
	<link href="<? echo $chemin_court; ?>style.css" rel="stylesheet" type="text/css" />
</head>

<body style="text-align:center;" onLoad="popup();">
<div class="col_gauche" style="width:430px;" id="detail">
  <table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
	    <div align="center" style="padding-bottom:15px; color:#ffffff; font-size:18px;">
		  <strong>
		   <?
			$sql="SELECT * FROM ".$tb_menu." WHERE RestoID='".$restoID."' && MenuID='".$_GET['articleID']."'";
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
		  </strong> 
	    </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="middle">
				<?
					if ($aff_img!="") {
					  $aff_img="http://www.rueresto.com/".$aff_img;
					  $taille_img=getimagesize($aff_img);
					  if ($taille_img[0]>400) {$largeur="400";}
					  else {$largeur=$taille_img[0];}
					  echo "<img src='$aff_img' alt='$aff_name' width='".$largeur."' /><br />";
					} else {
						echo "<img src='".$chemin."indispo.gif'/><br />";
					}
		        ?>
			</td>
          </tr>
          <tr>
            <td align="left" valign="top"><? echo "<strong>".$aff_name."</strong><br /><br />".nl2br($aff_note); ?></td>
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
						  </a></div></td>
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
                    <td valign="middle"><input type="submit" name="Submit2" value="Ajouter" />
                        <input name="mode" type="hidden" id="mode" value="ajout" />
                        <input name="articleID" type="hidden" value="<? echo $aff_articleID; ?>" />
					</td>
                  </tr>
                </table>
            </form></td>
          </tr>
          <tr>
            <td height="30"><div align="center"><a href="javascript:window.close()">Fermer</a></div></td>
          </tr>
      </table></td>
   </tr>
  </table>
 </div>
</body>
</html>
