<?
	include('config.php');
	$sql = "SELECT * FROM commanddetail20 WHERE CommandID=$CommandID && CmdID=$CmdID"; 
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	while($data = mysql_fetch_array($req)) {
		$montant_article=$data['CmdMontant'];	
	}
	$sql = "SELECT * FROM commandinfo20 WHERE CommandID=$CommandID"; 
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	
	while($data = mysql_fetch_array($req)) {
		$montant=$data['Montant'];
		$paye=$data['Cash']+$data['Cheque']+$data['Ticket']+$data['Carte'];	
	}
	$montant_futur=$montant-$montant_article;
	$reste_du=$montant_futur-$paye;
	if ($paye<=$montant_futur) { 
	   // On supprime directement l'article si le montant payé est inférieur ou égal au total après suppression
	   $mysql="delete from commanddetail20 WHERE CommandID=$CommandID && CmdID=$CmdID";
	   mysql_query($mysql) or die(mysql_error());
	   
	   $sql="update commandinfo20 set `Montant` = '$montant_futur' WHERE CommandID=$CommandID";
	   mysql_query($sql) or die(mysql_error());
	   header("Location:c_details_cmd.php?CommandID=".$CommandID."&today=".$today."&aff_month=".$aff_month."&aff_year=".$affyear."&message=supprok");
	}
	else { // sinon on demande de modifier les montants ou d'annuler
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Systa Resto &reg;</title>
	<script language="javascript">
	function check_montant() {
		montant_futur=<? echo $montant_futur; ?>;
		cash=document.getElementById('cash').value; 
		cheque=document.getElementById('cheque').value; 
		ticket=document.getElementById('ticket').value;
		carte=document.getElementById('carte').value;
		if (isNaN(cash) || cash=="") {cash=0;}
		if (isNaN(cheque) || cheque=="") {cheque=0;}
		if (isNaN(ticket) || ticket=="") {ticket=0;}
		if (isNaN(carte) || carte=="") {carte=0;}
		cash=parseFloat(cash);
		cheque=parseFloat(cheque);
		ticket=parseFloat(ticket);
		carte=parseFloat(carte);
		paye=cash+cheque+ticket+carte;
		reste_du=montant_futur-paye;
		reste_du=reste_du.toFixed(2);
		if (reste_du>=0) {
			document.getElementById('bouton_modifier').disabled=false;
			document.getElementById('reste_du').innerHTML=reste_du;
			document.getElementById('reste_du').style.color="#009036";
		}
		else{
			document.getElementById('bouton_modifier').disabled=true;
			document.getElementById('reste_du').innerHTML=reste_du;
			document.getElementById('reste_du').style.color="#FF0000";
		}
	}
	</script>
	</head>

	<body onload="check_montant()">
	<p align="center">Attention ! Le reste du est n&eacute;gatif, veuillez modifier les cases Cash, Ch&egrave;que, Titre restaurant et/ou Carte bleue pour qu'il soit au moins &eacute;gal &agrave; z&eacute;ro.<br>
	Vous pouvez aussi annuler la suppression de l'article.</p>
	<p>
	  <?
	$sql = "SELECT * FROM commandinfo20 WHERE CommandID=$CommandID"; 
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	while($data = mysql_fetch_array($req)) {
?>
	</p>

	<table border="1" align="center" cellpadding="2" cellspacing="0">
	<form name="form1" method="post" action="del_article_ok.php">
	<tr>
		<td width="160" align="center"><strong><? print datecmd; ?></strong></td>
		<td width="110" align="center"><strong><? print montant; ?></strong></td>
		<td width="110" align="center"><strong><? print cash; ?></strong></td>
		<td width="110" align="center"><strong><? print cheque; ?></strong></td>
		<td width="110" align="center"><strong><? print tresto; ?></strong></td>
		<td width="110" align="center"><strong><? print cb; ?></strong></td>
		<td width="100" align="center"><strong>Reste du </strong></td>
	  <tr>
		<td align="center"><? echo $data['Day']."/".$data['Month']."/".$data['Year']." - ".$data['Time']; ?></td>
		<td align="center"><? echo format_prix($montant_futur); ?></td>
		<td align="center">
		  <input name="cash" type="text" id="cash" value="<? echo$data['Cash']; ?>" size="8" onKeyUp="check_montant();" onBlur="check_montant();">    </td>
		<td align="center"><input name="cheque" type="text" id="cheque" size="8" value="<? echo $data['Cheque']; ?>" onKeyUp="check_montant();" onBlur="check_montant();">      </td>
		<td align="center"><input name="ticket" type="text" id="ticket" size="8" value="<? echo $data['Ticket']; ?>" onKeyUp="check_montant();" onBlur="check_montant();">      </td>
		<td align="center"><input name="carte" type="text" id="carte" size="8" value="<? echo $data['Carte']; ?>" onKeyUp="check_montant();" onBlur="check_montant();">      </td>
		<td align="center"><div id="reste_du" style="color:#FF0000; font-weight:bold"></div></td>
	  </tr>
	  <tr>
		<td colspan="7" align="center"><p>
		  <input type="submit" name="Submit" value="Modifier" disabled="disabled" id="bouton_modifier">
		  <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
		  <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
		  <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
		  <input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
		  <input name="CmdID" type="hidden" id="CmdID" value="<? echo $CmdID; ?>" />
		</p>      </td>
		</tr></form>
	  <tr>
		<td colspan="7" align="center"><form id="form2" name="form2" method="post" action="details_cmd.php">
		  <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
		  <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
		  <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
		  <input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
		  <input type="submit" name="Submit2" value="Annuler" />
		</form>
		</td>
	  </tr>

	</table>
  <? } ?>
	<div align="center"><a href="c_index.php?today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>">Retour</a></div>
	</body>
	</html>
  <? } ?>