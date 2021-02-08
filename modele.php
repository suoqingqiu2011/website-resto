<? 
	include ('include/config_perso.php');
	include ('../aritosushi75015.com/include/config.php');
	@require_once("include/mots.php");
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

<body 
  <? if ($_GET['valid']==1) {
	   echo "onLoad=\"alert('Ce lien de validation ne correspond à aucun compte en attente.')\"";
	 } 
  ?> onload="afficher_la_date();">
  
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
    <tr><td class="col_gauche">&nbsp;</td>
      <td valign="top"><div align="center" class="contenu"><table width="760" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
              <p align="center">&nbsp;</p>                  
			</td>
        </tr>
      </table>
      </div></td>
     <td valign="top" class="menu"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr class="menu">
          <td><iframe src="rueresto.com-livraison-a-domicile-menu-site.html" name="menu_site" frameborder="0" scrolling="no" width="200" height="350"></iframe>		 </td>
        </tr>
    </table><div class="motscle"><? echo $mots_cle_sous_menu; ?></div></td>
     <td background="<? echo $chemin_court; ?>ombre_vert.gif">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="<? echo $chemin_court; ?>ombre_b_g.gif" width="20" height="20" /></td>
    <td colspan="2" background="<? echo $chemin_court; ?>ombre_hori.gif">&nbsp;</td>
    <td><img src="<? echo $chemin_court; ?>ombre_b_d.gif" width="20" height="20" /></td>
  </tr>
</table>
</div>
<? include ('header.php');
include ('footer.php'); ?>
</body>
</html>
