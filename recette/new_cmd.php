<? include('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Systa Resto &reg;</title>
<script language="javascript">
function calcul_prix() {
	prix=document.getElementById('Prixu').value*document.getElementById('qte').value;
	prix=prix.toFixed(2);
	document.getElementById('Total').innerHTML=prix;
}
function checktable() {
if (document.getElementById('type').value=="P") {document.getElementById('table').style.display="block";}
else {document.getElementById('table').style.display="none";}
}
</script>
</head>

<body  onload="checktable()">
<h1 align="center">Nouvelle commande </h1>
<table border="1" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="160" align="center"><strong><? print datecmd; ?></strong></td>
    <td width="110" align="center"><strong><? print montant; ?></strong></td>
    <td width="110" align="center"><strong><? print cash; ?></strong></td>
    <td width="110" align="center"><strong><? print cheque; ?></strong></td>
    <td width="110" align="center"><strong><? print tresto; ?></strong></td>
    <td width="110" align="center"><strong><? print cb; ?></strong></td>
    <td width="100" align="center"><strong><? print type; ?></strong></td>
  <tr>
<td align="center">-</td>
    <td align="center">0 &euro; 00 </td>
	<td align="center">0 &euro; 00 </td>
    <td align="center">0 &euro; 00 </td>
    <td align="center">0 &euro; 00 </td>
    <td align="center">0 &euro; 00 </td>
    <td align="center">0 &euro; 00</td>
  </tr></table>
<p align="center"><strong>Ajouter un article</strong></p>
<form id="form3" name="form3" method="post" action="new_cmd_ok.php">
      <table align="center" cellspacing="5">
        <tr><td width="300" align="right"><select name="type" id="type" onchange="checktable()">
            <option value="P">Sur Place</option>
            <option value="E">A emporter</option>
            <option value="L">Livraison</option>
          </select></td>
          <td width="300" align="left"><span id="table">Table : 
      <input name="table" type="text" id="table" size="3" />
      </span></td></tr>
        <tr>
          <td align="right"><select name="day" id="day">
          <? for ($i=1;$i<=31;$i++)  {
		  echo "<option value='";
		  if ($i<10) {echo "0".$i."'";}  else {echo $i."'";}
		  if ($i==date('d')) {echo " selected='selected'";}
		  echo ">".$i."</option>";
		  }
		  ?>
          </select>
            <select name="month" id="month">
              <option value="01"<? if (date('m')=="01") {echo 'selected="selected"';}?>>Janvier</option>
              <option value="02"<? if (date('m')=="02") {echo 'selected="selected"';}?>>F&eacute;vrier</option>
              <option value="03"<? if (date('m')=="03") {echo 'selected="selected"';}?>>Mars</option>
              <option value="04"<? if (date('m')=="04") {echo 'selected="selected"';}?>>Avril</option>
              <option value="05"<? if (date('m')=="05") {echo 'selected="selected"';}?>>Mai</option>
              <option value="06"<? if (date('m')=="06") {echo 'selected="selected"';}?>>Juin</option>
              <option value="07"<? if (date('m')=="07") {echo 'selected="selected"';}?>>Juillet</option>
              <option value="08"<? if (date('m')=="08") {echo 'selected="selected"';}?>>Ao&ucirc;t</option>
              <option value="09"<? if (date('m')=="09") {echo 'selected="selected"';}?>>Septembre</option>
              <option value="10"<? if (date('m')=="10") {echo 'selected="selected"';}?>>Octobre</option>
              <option value="11"<? if (date('m')=="11") {echo 'selected="selected"';}?>>Novembre</option>
              <option value="12"<? if (date('m')=="12") {echo 'selected="selected"';}?>>D&eacute;cembre</option>
            </select>
            <select name="year" id="year">
              <?
			   $thisyear=date('Y');
			   for ($i="2007";$i<=$thisyear;$i++) {
			   echo '<option value="'.$i.'"';
			   if ($i==$aff_year) {echo ' selected';} 
			   echo'>'.$i.'</option>';
			   }
			   ?>
            </select></td>
          <td align="left">&agrave;&nbsp;<select name="hh" id="hh">
            <? for ($i=0;$i<=23;$i++)  {
		  echo "<option value='";
		  if ($i<10) {echo "0".$i."'";}  else {echo $i."'";}
		  if ($i==date('H')) {echo " selected='selected'";}
		  echo ">";
		  if ($i<10) {echo "0".$i;}  else {echo $i;}
		  echo "</option>";
		  }
		  ?>
          </select>
            &nbsp;h&nbsp;
            <select name="mm" id="mm">
              <? for ($i=0;$i<=59;$i++)  {
		  echo "<option value='";
		  if ($i<10) {echo "0".$i."'";}  else {echo $i."'";}
		  if ($i==date('i')) {echo " selected='selected'";}
		  echo ">";
		  if ($i<10) {echo "0".$i;}  else {echo $i;}
		  echo "</option>";
		  }
		  ?>
          </select></td>
        </tr>
  </table>
      <table width="80%" border="0" align="center" cellpadding="0" cellspacing="20">
        <tr>
          <td width="50%"><iframe src="choix_element.php" width="500" height="300" frameborder="0"></iframe></td>
          <td width="50%"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
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
          </table></td>
        </tr>
      </table>
      <p>&nbsp;</p>
</form>
<div align="center"><a href="index.php?today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>">Retour</a></div>
</body>
</html>
