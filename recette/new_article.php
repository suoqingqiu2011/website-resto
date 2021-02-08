<? include('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Systa Resto &reg;</title>
<script language="JavaScript" type="text/JavaScript">
<!--
function ConfirmDel()
{
	if(!confirm("Supprimer l'article ?"))
	{
		return (false);	
	}
	else 
		return true;
}
function calcul_prix() {
	prix=document.getElementById('Prixu').value*document.getElementById('qte').value;
	prix=prix.toFixed(2);
	document.getElementById('Total').innerHTML=prix;
}
//-->
</script>
</head>

<body>
<?
$sql = "SELECT * FROM commandinfo20 WHERE CommandID=$CommandID"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
$day=$data['Day'];	
?><table border="1" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="160" align="center"><strong><? print datecmd; ?></strong></td>
    <td width="110" align="center"><strong><? print montant; ?></strong></td>
    <td width="110" align="center"><strong><? print cash; ?></strong></td>
    <td width="110" align="center"><strong><? print cheque; ?></strong></td>
    <td width="110" align="center"><strong><? print tresto; ?></strong></td>
    <td width="110" align="center"><strong><? print cb; ?></strong></td>
    <td width="100" align="center"><strong><? print type; ?></strong></td>
    <td width="100" align="center"><strong><? print modifier; ?></strong></td>
  <tr>
<td align="center"><? echo $data['Day']."/".$data['Month']."/".$data['Year']." - ".$data['Time']; ?></td>
    <td align="center"><? echo format_prix($data['Montant']); $Total_Montant+=$data['Montant']; ?></td>
	<td align="center"><? echo format_prix($data['Cash']); $Total_Cash+=$data['Cash']; ?></td>
    <td align="center"><? echo format_prix($data['Cheque']); $Total_Cheque+=$data['Cheque']; ?></td>
    <td align="center"><? echo format_prix($data['Ticket']); $Total_Ticket+=$data['Ticket']; ?></td>
    <td align="center"><? echo format_prix($data['Carte']); $Total_Carte=$data['Carte']; ?></td>
    <td align="center"><? if ($data['Type']=="EMPORTER") {echo "A emporter";} elseif ($data['Type']=="PLACE") {echo "Sur place";} ?></td>
    <td align="center"><a href="modif_cmd.php?CommandID=<? echo $data['CommandID']; ?>&amp;today=<? echo $data['Year']; ?>-<? echo $data['Month']; ?>-<? echo $data['Day']; ?>&aff_month=<? echo $aff_month; ?>&aff_year=<? echo $aff_year; ?>"><img src="img/edit.png" width="16" height="16" border="0" /></a></td>
  </tr></table>
<p>
  <? } ?>
</p>
<p align="center"><strong>	</strong><strong>Ajouter un article</strong></p>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="20">
  <tr>
    <td width="50%"><iframe src="choix_element.php" width="500" height="300" frameborder="0"></iframe></td>
    <td width="50%"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">

      <form id="form1" name="form1" method="post" action="new_article_ok.php">
        <tr>
          <td>Votre choix : </td>
          <td align="center"><span id="MenuName"></span></td>
        </tr>
        <tr>
          <td>Prix unitaire </td>
          <td align="center"><span id="MenuPrixPlace"></span></td>
        </tr>
        <tr>
          <td width="100">Quantiti&eacute; : </td>
          <td align="center"><div align="center"><span id="MenuName">
              <input name="qte" type="text" id="qte" onkeyup="calcul_prix()" value="1" size="2" maxlength="2" />
          </span></div></td>
        </tr>
        <tr>
          <td align="center"><div align="left">Total : </div></td>
          <td align="center"><span id="Total" style="font-weight:bold">0.00</span></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="Submit" value="Ajouter" id="bouton_ajouter" disabled="disabled"/>
              <input name="MenuID" type="hidden" id="MenuID" />
              <input name="Prixu" type="hidden" id="Prixu" />
              <input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
              <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
              <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
              <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
              <input name="new_cmd" type="hidden" id="new_cmd" value="<? echo $new_cmd; ?>" /></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
<table border="1" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="160" align="center"><strong>Code</strong></td>
    <td width="110" align="center"><strong>Nom</strong></td>
    <td width="110" align="center"><strong>Quantit&eacute;</strong></td>
    <td width="110" align="center"><strong>Prix Unitaire </strong></td>
    <td width="110" align="center"><strong>Montant </strong></td>
    <td width="100" align="center"><strong>Modifier</strong></td>
    <td width="100" align="center"><strong>Supprimer</strong></td>
  </tr>
<?
$sql = "SELECT * FROM commanddetail20 WHERE CommandID=$CommandID"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
?>
  <tr>
    <td align="center"><? echo $data['CmdCode']; ?></td>
    <td align="left"><? echo $data['CmdName']; ?></td>
	<td align="center"><? echo $data['CmdNum']; ?></td>
    <td align="right"><? echo format_prix($data['CmdPrix']); ?></td>
    <td align="right"><? echo format_prix($data['CmdMontant']); ?></td>
    <td align="center"><img src="img/edit.png" width="16" height="16" /></td>
    <td align="center"><a href="del_article.php?CommandID=<? echo $CommandID; ?>&amp;CmdID=<? echo $data['CmdID']; ?>&amp;today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>" onclick="return ConfirmDel();"><img src="img/delete.png" width="16" height="16" border="0" /></a><a href="del_article.php?CmdID=<? echo $data['CmdID']; ?>&today=<? echo $aff_year; ?>-<? echo $aff_month; ?>-<? echo $day; ?>&aff_month=<? echo $aff_month; ?>&aff_year=<? echo $aff_year; ?>" onClick="return ConfirmDel();"></a></td>
  </tr>
 
<? } ?>
</table>

<div align="center">
<? if($new_cmd==1)  {  ?>  <p>&nbsp;</p>
  <form id="form2" name="form2" method="post" action="modif_cmd.php">
    <div align="center">
      <input type="submit" name="Submit2" value="Terminer la commande" />
      <input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
      <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
      <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
      <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
      <input name="new_cmd" type="hidden" id="new_cmd" value="<? echo $new_cmd; ?>" />
      </div>
  </form>
  <p>&nbsp;</p><? } ?>
<div align="center"><a href="index.php?today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>">Retour</a></div>
</body>
</html>
