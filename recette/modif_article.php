<?
include('config.php');
$sql = "SELECT * FROM commanddetail20 WHERE CommandID=$CommandID && CmdID=$CmdID";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
	$code=$data['CmdCode'];
	$nom=$data['CmdName'];
	$qte=$data['CmdNum'];
	$prixu=$data['CmdPrix'];
	$montant=$data['CmdMontant'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Systa Resto &reg;</title>
<script language="javascript">
function calcul_prix() {
prixu=<? echo $prixu; ?>;
qte=document.getElementById('qte').value;
montantarticle=prixu*qte;
document.getElementById('montant').innerHTML=montantarticle;
}
</script>
</head>

<body>
<h1 align="center">Modification d'un article </h1>
<form id="form1" name="form1" method="post" action="modif_article_ok.php">
<table border="1" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="160" align="center"><strong>Code</strong></td>
    <td width="110" align="center"><strong>Nom</strong></td>
    <td width="110" align="center"><strong>Quantit&eacute;</strong></td>
    <td width="110" align="center"><strong>Prix Unitaire </strong></td>
    <td width="110" align="center"><strong>Montant </strong></td>
  </tr>
  <tr>
    <td align="center"><? echo $code; ?></td>
    <td align="left"><? echo $nom; ?></td>
    <td align="center">
      <input name="qte" type="text" id="qte" value="<? echo $qte; ?>" size="3" onkeyup="calcul_prix()"/>    </td>
    <td align="right"><? echo format_prix($prixu); ?></td>
    <td align="right"><span id="montant"><? echo format_prix($montant); ?></span></td>
  </tr>
  <tr>
    <td colspan="7" align="center">
      <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
      <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
      <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
      <input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
      <input name="CmdID" type="hidden" id="CmdID" value="<? echo $CmdID; ?>" />
      <input type="submit" name="Submit" value="Modifier" />    </td>
  </tr>
</table>
</form>
<form id="form2" name="form2" method="post" action="details_cmd.php">
  <div align="center">
    <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
    <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
    <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
    <input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
    <input type="submit" name="Submit2" value="Annuler" />
  </div>
</form>
<div align="center"><a href="index.php?today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>">Retour</a></div>
</body>
</html>