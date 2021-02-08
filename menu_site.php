<? include ('include/config_perso.php');
include ('../aritosushi75015.com/include/config.php');
// Nb articles dans panier
$panier = $_SESSION["panier"];

$tab_panier=explode("/",$panier);
$nb_panier=0;
for ($i=0;$i<count($tab_panier);$i++)
	{
	$tab_article=explode(";",$tab_panier[$i]);
	$nb_panier+=$tab_article[1];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include("include/meta.php");
?>
<script language="javascript">
// Recharge le panier si on est dessus quand on se log
url=window.top.location.href;
long=url.length;
url=url.substr(long-10,10);
login="<? echo $_GET['login']; ?>";
if (login=="1" && url=="rueresto.com-livraison-a-domicile-panier.html") {window.top.location="rueresto.com-livraison-a-domicile-panier.html";}
else if (login=="1" && url=="_login.php") {window.top.location="rueresto.com-livraison-a-domicile-panier-valid.html";}
else if (login=="1") {window.top.location="rueresto.com-livraison-a-domicile-commande.html";}

// Vide ou non le panier pour une nouvelle commande
function vider_panier () {
if (window.confirm('Une commande a déjà été validée. Si vous désirez en passer une autre, vous devez auparavant vider votre panier. Voulez vous vider votre panier maintenant ?')) {
	window.top.document.location.replace('rueresto.com-livraison-a-domicile-traitement-panier.html?mode=vider_panier');
	} 
}
</script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<? include("include/rollover.php"); ?>
<link href="<? echo $chemin_court; ?>style.css" rel="stylesheet" type="text/css" />
</head>
<body <? if ($_GET['logout']==1) {echo "onLoad='window.top.document.location.replace(\"rueresto.com-livraison-a-domicile-index.html\")'";}
elseif ($_GET['message']=="panier") {echo "onLoad=vider_panier()";}
elseif ($_GET['erreur']=="1") {echo "onLoad=\"alert('Erreur lors de l\'authentification');\"";}
?>>
<table class="menu" width="200" height="500" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td valign="top"><div align="center">
            <div style="display:<? if ($_SESSION['login_pseudo']!="") {echo"none";} else {echo"block";} ?>"><form action="rueresto.com-livraison-a-domicile-login.html" method="post">
			  <p class="petit">  
                <input name="pseudo" type="text" class="membre" id="pseudo" value="votre@email" onFocus="this.value=''"/>
                <br />
                <input name="mdp" type="password" class="membre" id="mdp" value="pass" onFocus="this.value=''"/>
                <br />
                <input type="submit" name="Submit" value="Entrer" class="membre"/>
                <br />
              <a href="rueresto.com-livraison-a-domicile-menu-site-mdp.html">Mot de passe oubli&eacute; ?</a></p>
            </form>
            </div>
               <? echo $_SESSION['login_pseudo'];?>
             </p>
            <p style="display:<? if ($_SESSION['login_pseudo']=="") {echo"none";} else {echo"block";} ?>"><a href="logout.php"><img src="<? echo $chemin_court; ?>quitter.gif" width="10" height="10" align="absmiddle" /></a> <a href="logout.php">Quitter</a> <img src="img/pixel.gif" width="10" height="10" align="absmiddle" /></p>
            <p><a href="rueresto.com-livraison-a-domicile-panier.html" target="_top"><? echo $nb_panier." article";
			if ($nb_panier>1) {echo "s";}
			echo " dans votre panier "; ?></a></p>
            	<? if ($fidelite_nb_points>0) { ?><p><strong><? echo $fidelite_nb_points; ?></strong> point<? if($fidelite_nb_points>1) {echo "s";}; ?> fidélité<br />
	<? if ($fidelite_nb_bon_reduc>0) { ?>
	<strong><? echo $fidelite_nb_bon_reduc; ?></strong> bon<? if($fidelite_nb_bon_reduc>1) {echo "s";}; ?> de réduction de <strong><? echo $fidelite_reduc; ?></strong> &euro; </p>
	<? } ?>
	<? } ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="cell_menu">
                <td align="center"><a href="rueresto.com-livraison-a-domicile-index.html" class="roll_accueil" target="_top"><img src="img/pixel.gif" alt="Accueil" width="180" height="35" border="0"/></a></td>
              </tr>
              <tr class="cell_menu">
                <td align="center"><a href="rueresto.com-livraison-a-domicile-commande.html" class="roll_carte" target="_top"><img src="img/pixel.gif" alt="Commande en ligne" width="180" height="35" border="0"/></a></td>
              </tr>
              <tr class="cell_menu">
                <td align="center"><a href="rueresto.com-livraison-a-domicile-commande.html" class="roll_commande" target="_top"><img src="img/pixel.gif" alt="Commande en ligne" width="180" height="35" border="0"/></a></td>
              </tr>
              <? if ($_SESSION['login_pseudo']!="") { ?>
			  <tr class="cell_menu">
                <td align="center"><a href="rueresto.com-livraison-a-domicile-inscription.html" class="roll_compte" target="_top"><img src="img/pixel.gif" alt="Votre compte" width="180" height="35" border="0"/></a></td>
              </tr>
			  <? } else { ?>
              <tr class="cell_menu">
                <td align="center"><a href="rueresto.com-livraison-a-domicile-inscription.html" class="roll_inscription" target="_top"><img src="img/pixel.gif" alt="Inscription" width="180" height="35" border="0"/></a></td>
              </tr>
			  <? }?>
              <tr class="cell_menu">
                <td align="center"><a href="rueresto.com-livraison-a-domicile-contact.html" class="roll_contact" target="_top"><img src="img/pixel.gif" alt="Contactez-nous" width="180" height="35" border="0"/></a></td>
              </tr>
            </table>
            </div></td>
        </tr>
</table>
</body>
</html>