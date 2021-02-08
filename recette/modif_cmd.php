<?
include('config.php');
$sql = "SELECT * FROM commandinfo20 WHERE CommandID=$CommandID"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
	$montant=$data['Montant'];
	$carte=$data['Carte'];
	$cheque=$data['Cheque'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Systa Resto &reg;</title>
<script language="javascript">
function check_montant() {
	montantfutur=<? echo $montant; ?>;
	<? if($new_cmd!=1) { ?>
	carte=<? echo $carte; ?>;
	cheque=<? echo $cheque; ?>;
	<? } else { ?>
	cheque=window.document.getElementById('cheque').value; 
	carte=window.document.getElementById('carte').value;
	<? } ?>
	ticket=window.document.getElementById('ticket').value;
	cash=window.document.getElementById('cash').value;
	if (isNaN(cash) || cash=="") {cash=0;}
	if (isNaN(cheque) || cheque=="") {cheque=0;}
	if (isNaN(ticket) || ticket=="") {ticket=0;}
	if (isNaN(carte) || carte=="") {carte=0;}
	cash=parseFloat(cash);
	cheque=parseFloat(cheque);
	ticket=parseFloat(ticket);
	carte=parseFloat(carte);
	paye=cash+cheque+ticket+carte;
	restedu=montantfutur-paye;
	restedu=restedu.toFixed(2);
	if (restedu>=0) {
		document.getElementById('bouton_modifier').disabled=false;
		document.getElementById('reste_du').innerHTML=restedu;
		document.getElementById('reste_du').style.color="#009036";
	}
	else{
		document.getElementById('bouton_modifier').disabled=true;
		document.getElementById('reste_du').innerHTML=restedu;
		document.getElementById('reste_du').style.color="#FF0000";
	}
}
function checktable() {
if (document.getElementById('type').value=="P") {document.getElementById('table').style.display="block";}
else {document.getElementById('table').style.display="none";}
}
</script>
</head>

<body onload="check_montant()">
<h1 align="center">Modification de la commande </h1>
<p>
  <?
$sql = "SELECT * FROM commandinfo20 WHERE CommandID=$CommandID"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
?>
</p>

<table border="1" align="center" cellpadding="2" cellspacing="0">
<form name="form1" method="post" action="modif_cmd_ok.php">
<tr>
    <td width="160" align="center"><strong><? print datecmd; ?></strong></td>
    <td width="110" align="center"><strong><? print montant; ?></strong></td>
    <td width="110" align="center"><strong><? print cash; ?></strong></td>
    <td width="110" align="center"><strong><? print cheque; ?></strong></td>
    <td width="110" align="center"><strong><? print tresto; ?></strong></td>
    <td width="110" align="center"><strong><? print cb; ?></strong></td>
    <td width="220" align="center"><strong>Type</strong></td>
    <td width="100" align="center"><strong>Reste du </strong></td>
  <tr>
    <td align="center"><? echo $data['Day']."/".$data['Month']."/".$data['Year']." - ".$data['Time']; ?></td>
    <td align="center"><? echo format_prix($data['Montant']); ?></td>
    <td align="center">
      <input name="cash" type="text" id="cash" value="<? echo $data['Cash']; ?>" size="8" onKeyUp="check_montant();" onBlur="check_montant();">    </td>
    <td align="center">
	<? if ($new_cmd==1) { ?><input name="cheque" type="text" id="cheque" size="8" value="<? echo $data['Cheque']; ?>" onKeyUp="check_montant();" onBlur="check_montant();"><? } else { echo $data['Cheque']; } ?></td>
    <td align="center"><input name="ticket" type="text" id="ticket" size="8" value="<? echo $data['Ticket']; ?>" onKeyUp="check_montant();" onBlur="check_montant();">      </td>
    <td align="center"><? if ($new_cmd==1) { ?><input name="carte" type="text" id="carte" size="8" value="<? echo $data['Carte']; ?>" onKeyUp="check_montant();" onBlur="check_montant();"><? } else { echo $data['Carte']; } ?></td>
    <td align="center"><table border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="right" valign="top"><select name="type" id="type" onchange="checktable()">
            <option value="P">Sur Place</option>
            <option value="E">A emporter</option>
            <option value="L">Livraison</option>
        </select></td>
        <td align="left" valign="top">&nbsp;</td>
        <td align="left" valign="top"><span id="table">Table :
          <input name="table" type="text" id="table" size="3" value="<? if($data['Type']=="PLACE") {echo $data['OrderNum'];} ?>" />
        </span>&nbsp;</td>
      </tr>
    </table></td>
    <td align="center"><div id="reste_du" style="color:#FF0000; font-weight:bold"></div></td>
  </tr>
  <tr>
    <td colspan="8" align="center"><p>
      <input type="submit" name="Submit" value="<? if ($new_cmd==1) {echo "Terminer";} else {echo "Modifier";} ?>" disabled="disabled" id="bouton_modifier">
      <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
      <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
      <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
      <input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
      <input name="CmdID" type="hidden" id="CmdID" value="<? echo $CmdID; ?>" />
    </p>      </td>
    </tr></form>
<? if($new_cmd!=1) { ?> <tr>
    <td colspan="8" align="center"><form id="form2" name="form2" method="post" action="details_cmd.php">
      <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
      <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
      <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
      <input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
      <input type="submit" name="Submit2" value="Annuler" />
    </form>    </td>
  </tr><? } ?>
</table>
<p>
  <? } ?>
</p>
<div align="center"><a href="index.php?today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>">Retour</a></div>
</body>
</html>