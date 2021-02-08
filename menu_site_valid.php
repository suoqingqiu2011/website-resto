<? include ('include/config_perso.php');
include ('include/config.php');
$message=$_GET['message'];
$email=$_REQUEST['email'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include("include/meta.php");
include("include/rollover.php");
?>
<script language="javascript">
// Recharge lae panier si on est dessus quand on se log
url=window.top.location.href;
long=url.length;
url=url.substr(long-10,10);
login="<? echo $_GET['login']; ?>";
if (login=="1" && url=="rueresto.com-livraison-a-domicile-panier.html") {window.top.location="rueresto.com-livraison-a-domicile-panier.html";}
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
<link href="<? echo $chemin_court; ?>style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table class="menu" width="200" height="500" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td valign="top"><div align="center">
            <form action="rueresto.com-livraison-a-domicile-traitement-user.html" method="post">
			  <p align="justify" style="padding:20px;">
			  <?
			  if ($message==1) {echo "Vous n'avez pas encore validé votre compte. Veuillez cliquer sur le lien envoyé dans l'email de confirmation.<br>Si vous voulez le recevoir à nouveau, tapez votre email ci-dessous.";}
			  elseif ($message==2) {echo "L'email que vous avez tap&eacute; n'est pas pr&eacute;sent dans notre base, ou votre compte est déjà validé";}
			  elseif ($message==3) {echo "Nous avons envoyé à nouveau un mail de confirmation. Veuillez cliquer sur le lien de validation qui s'y trouve vour valider votre compte.";}
			  else {echo "Si vous avez oubli&eacute; votre mot de passe, tapez votre email ci-dessous et nous vous le renverrons.";}
			  ?>               </p>
			  <p<? if ($message=="3") {echo " style='display:none;'";} ?>>
			    <input name="email" type="text" class="membre" id="email" value="<? echo $email; ?>" onclick="this.value=''"/>
			    <input name="mode" type="hidden" id="mode" value="renvoi_mail_confirm" />
			    <br />
				<br />
			    <input type="submit" name="Submit" value="Entrer" class="membre" />
		      </p>
            </form>
              <a href="rueresto.com-livraison-a-domicile-menu-site.html" class="roll_retour"><img src="img/pixel.gif" alt="Accueil" width="70" height="35" border="0"/></a></div>
             </div></td>
        </tr>
</table>
</body>
</html>
