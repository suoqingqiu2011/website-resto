<?
	include('config.php');
	if ($_REQUEST['today']=="") {
		$today=date('Y-m-d');
	}else {
		$today=$_REQUEST['today'];
	}
	$sel_year=substr($today,0,4);
	$sel_month=substr($today,5,2);
	$sel_day=substr($today,8,2);
	if ($aff_month=="") {
		$aff_month=$sel_month;
	}
	if ($aff_year=="") {
		$aff_year=$sel_year;
	}
	$thisyear=date('Y');
	$nom_mois=array('',JAN,FEV,MAR,AVR,MAI,JUI,JUY,AOU,SEP,OCT,NOV,DEC);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Systa Resto &reg;</title>
<script language="javascript">
	<?
		$cb_cheque_id=array();
		$sql = "SELECT * FROM commandinfo20 WHERE Year=$sel_year && Month=$sel_month && Day=$sel_day"; 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
		while($data = mysql_fetch_array($req)) {
			if ($data['Cheque']>0 || $data['Carte']>0) {
				$cb_cheque_id[]=$data['CommandID'];
			}
			$cb_cheque+=$data['Cheque']+$data['Carte'];
		} 
		if ($cb_cheque>0) {
			echo "cb_cheque_present=true;";
		}	
	?>

	function cb_cheque(box) {
		if (document.getElementById(box).checked==true) {
			alert('ATTENTION !\nVous êtes sur le point de supprimer une commande ayant été payée par chèque et/ou carte bleue !');
		}
	}
	
	function check_all(state){	  
	  var i;
	  var tabInput=document.getElementsByTagName("input");
	  var n=tabInput.length;
	  
	  for(i=0;i<n;i++){
		if(tabInput[i].type=='checkbox'){
			tabInput[i].checked=state;
		}
	  }
	  <? 
	  foreach($cb_cheque_id as $i) {
	      echo "document.getElementById('".$i."').checked=false;";
	  } 
	  ?>
	 }

</script>

</head>

<body>
<div align="center">
<h1>Commandes du <? echo $sel_day."/".$sel_month."/".$sel_year; ?></h1></div>
<table border="1" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td colspan="11" align="center">
	   <form id="form" name="form" method="post" action="new_cmd.php">
           <input type="submit" name="Submit" value="Ajouter une commande" />
           <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
           <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
           <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
        </form>
   </td>
  </tr>
  <form id="form2" name="form2" method="post" action="del_cmd.php">
   <tr>
		<td align="center"><input type="submit" name="Submit32" value="Supprimer les &eacute;l&eacute;ments coch&eacute;s" /><br />
		  <a href="javascript:void(0)" onclick="check_all(true)">Tout cocher</a>&nbsp;
		  <a href="javascript:void(0)" onclick="check_all(false)">Tout décocher</a>
		</td>
		<td width="160" align="center"><strong><? print datecmd; ?></strong></td>
		<td width="110" align="center"><strong><? print montant; ?></strong></td>
		<td width="110" align="center"><strong><? print cash; ?></strong></td>
		<td width="110" align="center"><strong><? print cheque; ?></strong></td>
		<td width="110" align="center"><strong><? print tresto; ?></strong></td>
		<td width="110" align="center"><strong><? print cb; ?></strong></td>
		<td width="100" align="center"><strong><? print type; ?></strong></td>
		<td width="100" align="center"><strong><? print details; ?></strong></td>
		<td width="100" align="center"><strong><? print modifier; ?></strong></td>
  </tr>
<?
$sql = "SELECT * FROM commandinfo20 WHERE Year=$sel_year && Month=$sel_month && Day=$sel_day ORDER BY  Time DESC"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
?>
  <tr>
    <td align="right"><? 
	$sql2 = "SELECT * FROM repas WHERE Date='".$data['Year']."-".$data['Month']."-".$data['Day']."' && Montant='".$data['Montant']."'"; 
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	while($data2 = mysql_fetch_array($req2)) 
	{
	$facture=$data2['FactureNum'];
	}
	if ($facture=="") {
	?>
      <input name="efface[]" type="checkbox" id="<? echo $data['CommandID']; ?>" value="<? echo $data['CommandID']; ?>" <? if($data['Carte']>0 || $data['Cheque']>0) { echo 'onclick="cb_cheque('.$data['CommandID'].')"'; }?>/>
      <? } 
	else {echo "<input type='checkbox' disabled >";} 
	unset($facture);
	?></td>
    <td align="center"><? echo $data['Day']."/".$data['Month']."/".$data['Year']." - ".$data['Time']; ?></td>
    <td align="right"><? echo format_prix($data['Montant']); $Total_Montant+=$data['Montant']; ?></td>
	<td align="right"><? echo format_prix($data['Cash']); $Total_Cash+=$data['Cash']; ?></td>
    <td align="right" style="color:red; font-weight:bold"><? echo format_prix($data['Cheque']); $Total_Cheque+=$data['Cheque']; ?></td>
    <td align="right"><? echo format_prix($data['Ticket']); $Total_Ticket+=$data['Ticket']; ?></td>
    <td align="right" style="color:red; font-weight:bold"><? echo format_prix($data['Carte']); $Total_Carte+=$data['Carte']; ?></td>
    <td align="center"><? echo $data['OrderNum']; ?></td>
    <td align="center"><a href="details_cmd.php?CommandID=<? echo $data['CommandID']; ?>&amp;today=<? echo $data['Year']; ?>-<? echo $data['Month']; ?>-<? echo $data['Day']; ?>&aff_month=<? echo $aff_month; ?>&aff_year=<? echo $aff_year; ?>"><img src="img/loupe.gif" width="25" height="16" border="0" /></a></td>
    <td align="center"><a href="modif_cmd.php?CommandID=<? echo $data['CommandID']; ?>&amp;today=<? echo $data['Year']; ?>-<? echo $data['Month']; ?>-<? echo $data['Day']; ?>&aff_month=<? echo $aff_month; ?>&aff_year=<? echo $aff_year; ?>"><img src="img/edit.png" width="16" height="16" border="0" /></a></td>
  </tr>
<? } ?> 
 <tr>
   <td align="center"><a href="javascript:void(0)" onclick="check_all(true)">Tout cocher</a>&nbsp; <a href="javascript:void(0)" onclick="check_all(false)">Tout d&eacute;cocher</a><br />
     <input type="submit" name="Submit3" value="Supprimer les &eacute;l&eacute;ments coch&eacute;s" />
     <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
     <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
     <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" /></td>
    <td align="center"><strong>TOTAL</strong></td>
    <td align="right"><strong><? echo format_prix($Total_Montant); ?></strong></td>
	<td align="right"><strong><? echo format_prix($Total_Cash); ?></strong></td>
    <td align="right"><strong><? echo format_prix($Total_Cheque); ?></strong></td>
    <td align="right"><strong><? echo format_prix($Total_Ticket); ?></strong></td>
    <td align="right"><strong><? echo format_prix($Total_Carte); ?></strong></td>
    <td colspan="3" align="center">&nbsp;</td>
  </tr></form>
</table>
<br />
<form action="index.php" method="get" name="form2" id="form2">
  <div align="center">
    <input type="submit" id="Submit" value="Aujourd'hui" />
  </div>
</form>
<form action="index.php" method="post" name="form1" id="form1">
  <div align="center">
    <select name="aff_month" id="aff_month">
      <option value="01"<? if($aff_month=="01") {echo " selected";} ?>><? print JAN; ?></option>
      <option value="02"<? if($aff_month=="02") {echo " selected";} ?>><? print FEV; ?></option>
      <option value="03"<? if($aff_month=="03") {echo " selected";} ?>><? print MAR; ?></option>
      <option value="04"<? if($aff_month=="04") {echo " selected";} ?>><? print AVR; ?></option>
      <option value="05"<? if($aff_month=="05") {echo " selected";} ?>><? print MAI; ?></option>
      <option value="06"<? if($aff_month=="06") {echo " selected";} ?>><? print JUI; ?></option>
      <option value="07"<? if($aff_month=="07") {echo " selected";} ?>><? print JUY; ?></option>
      <option value="08"<? if($aff_month=="08") {echo " selected";} ?>><? print AOU; ?></option>
      <option value="09"<? if($aff_month=="09") {echo " selected";} ?>><? print SEP; ?></option>
      <option value="10"<? if($aff_month=="10") {echo " selected";} ?>><? print OCT; ?></option>
      <option value="11"<? if($aff_month=="11") {echo " selected";} ?>><? print NOV; ?></option>
      <option value="12"<? if($aff_month=="12") {echo " selected";} ?>><? print DEC; ?></option>
    </select>
    <select name="aff_year" id="aff_year">
      <? for ($i="2007";$i<=$thisyear;$i++) {
			   echo '<option value="'.$i.'"';
			   if ($i==$aff_year) {echo ' selected';} 
			   echo'>'.$i.'</option>';
			   }
			   ?>
    </select>
    <input name="today" type="hidden" id="today" value="<? echo $today?>" />
    <input type="submit" name="Submit2" value="GO" />
  </div>
</form>
<div align="center"><strong>
            <?
		$premierjour=date("w", mktime (0,0,0,"$aff_month",1,"$aff_year")); // 1er jour du mois
		$nombrejour=date("t", mktime (0,0,0,"$aff_month",1,"$aff_year")); // nombre de jour dans le mois
		 if ($premierjour==0) {$premierjour=7;}
		 if ($aff_month<10) {$aff_sel_month=substr($aff_month,1,1);}
		 else {$aff_sel_month=$aff_month;}
		 echo $nom_mois[$aff_sel_month]." ".$aff_year;
		 ?></strong>          </div>
          <TABLE border=0 align="center" cellPadding=0 cellSpacing=1 
      borderColorLight=#ffffff borderColorDark=#ffffff>
            <TBODY>
              <TR valign="middle">			
                <TD width="35" height=35 align="center" valign="middle"><strong>Lun</strong></TD>
                <TD width="35" height=35 align="center"><strong>Mar</strong></TD>
                <TD width="35" height=35 align="center"><strong>Mer</strong></TD>
                <TD width="35" height=35 align="center"><strong>Jeu</strong></TD>
                <TD width="35" height=35 align="center"><strong>Ven</strong></TD>
                <TD width="35" height=35 align="center"><strong>Sam</strong></TD>
                <TD width="35" height=35 align="center"><strong>Dim</strong></TD>
              </TR>
              <TR>
                <?
			$case=0;			
			for ($i=1;$i<$premierjour;$i++) {
			echo '<TD width="35"  height=35 align="center" >&nbsp;</TD>';
			$case++;
			}
			for ($i=1;$i<=$nombrejour;$i++) {
			$case++;
			if ($i>9) {$jour_cal=$i;}
			else {$jour_cal="0".$i;}
			echo '<TD width="35"  height=35 align="center"><strong><a href="index.php?today='.$aff_year.'-'.$aff_month.'-'.$jour_cal.'&aff_month='.$aff_month.'&aff_year='.$aff_year.'">'.$i.'</a></strong></TD>';
			if ($case>=7) {$case=0;
				echo'</tr><tr>';
				}
			}
			for ($i=$case;$i<7;$i++) {
				echo '<TD width="35" height=35 align="center">&nbsp;</TD>';
				$case++;
			}
			?>
            </TBODY>
</TABLE>
          <p align="center"><strong>Cliquez sur un jour pour avoir le d&eacute;tail </strong></p> 
</body>
</html>
