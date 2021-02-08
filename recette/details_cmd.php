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
-->
</script>
</head>

<body>
<h1 align="center">Commande
  <?
$sql = "SELECT * FROM commandinfo20 WHERE CommandID=$CommandID"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
$day=$data['Day'];	
?>
</h1>
<table border="1" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="160" align="center"><strong><? print datecmd; ?></strong></td>
    <td width="110" align="center"><strong><? print montant; ?></strong></td>
    <td width="110" align="center"><strong><? print cash; ?></strong></td>
    <td width="110" align="center"><strong><? print cheque; ?></strong></td>
    <td width="110" align="center"><strong><? print tresto; ?></strong></td>
    <td width="110" align="center"><strong><? print cb; ?></strong></td>
    <td width="100" align="center"><strong><? print type; ?></strong></td>
<? if($new_cmd!=1) { ?><td width="100" align="center"><strong><? print modifier; ?></strong></td><? } ?>
  <tr>
<td align="center"><? echo $data['Day']."/".$data['Month']."/".$data['Year']." - ".$data['Time']; ?></td>
    <td align="center"><? echo format_prix($data['Montant']); ?></td>
	<td align="center"><? echo format_prix($data['Cash']); ?></td>
    <td align="center"><? echo format_prix($data['Cheque']); ?></td>
    <td align="center"><? echo format_prix($data['Ticket']); ?></td>
    <td align="center"><? echo format_prix($data['Carte']); ?></td>
    <td align="center"><? echo $data['OrderNum']; ?></td>
    <? if($new_cmd!=1) { ?><td align="center"><a href="modif_cmd.php?CommandID=<? echo $data['CommandID']; ?>&amp;today=<? echo $data['Year']; ?>-<? echo $data['Month']; ?>-<? echo $data['Day']; ?>&aff_month=<? echo $aff_month; ?>&aff_year=<? echo $aff_year; ?>"><img src="img/edit.png" width="16" height="16" border="0" /></a></td><? } ?>
  </tr></table>
<div align="center">
  <? } 
if ($message=="supprok") {
?>
  <br />
  <span style="color:red"><strong>L'article a bien &eacute;t&eacute; supprim&eacute;<br /></strong></span>
  <? }
?>
  <br /> 
  D&eacute;tails
</div>
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
    <td align="center"><a href="modif_article.php?CommandID=<? echo $CommandID; ?>&amp;CmdID=<? echo $data['CmdID']; ?>&amp;today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>"><img src="img/edit.png" width="16" height="16" border="0" /></a></td>
    <td align="center"><a href="del_article.php?CommandID=<? echo $CommandID; ?>&amp;CmdID=<? echo $data['CmdID']; ?>&amp;today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>" onClick="return ConfirmDel();"><img src="img/delete.png" width="16" height="16" border="0" /></a></td>
  </tr>
 
<? } ?>  <tr>
    <td colspan="7" align="center"><form id="form1" name="form1" method="post" action="new_article.php">
      <input name="new_cmd" type="hidden" id="new_cmd" value="<? echo $new_cmd; ?>" />
      <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
      <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
      <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
<input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
      <input type="submit" name="Submit" value="Ajouter un article" />
    </form>
    </td>
    </tr>
</table>
<div align="center">
  <? if($new_cmd==1)  {  ?>
  <p>&nbsp;</p>
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
  <p>&nbsp;</p>
  <? } ?>
<div align="center"><a href="index.php?today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>">Retour</a></div></body>
</html>
