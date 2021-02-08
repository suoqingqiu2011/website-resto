<?
	session_start();
	include('../../lang/'.$_SESSION['lang'].'.php');
	include_once("config.php");
	if ($menutypeName=="") {
		$str2="select * from menutype550 LIMIT 1";
		$res2=mysql_query($str2);
		while($aff2=mysql_fetch_array($res2)) {
		$menutypeName=$aff2['MenuTypeName'];
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Choisir un &eacute;lement</title>
	<link rel="stylesheet" href="../css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="../css1/component.css" />
	<link rel="stylesheet" type="text/css" href="../css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="../css1/style1.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css">
<script language="javascript">
function choix(MenuID,Name,Prix) {
	//Prix=Prix.toFixed(2);
	window.top.document.getElementById('MenuID').value=MenuID;
	window.top.document.getElementById('MenuName').innerHTML=Name;
	window.top.document.getElementById('MenuPrixPlace').innerHTML=Prix;
	window.top.document.getElementById('Prixu').value=Prix;
	window.top.document.getElementById('bouton_ajouter').disabled=false;
	window.top	.calcul_prix();
	window.close();
}
</script>
<style>
html { 
overflow-x:hidden; 
}
</style>
</head>

<body style="width:550px;">
<table style="width:549px; overflow-x:hidden; "  border="0" cellpadding="0" cellspacing="0" bordercolor="#9B2323">

  <tr style="width:549px;">
    <td align="center" style="width:549px;">
	<div class="listing2" style="width:549px;">
      <div class="titreListing" style="padding:10px;"><? print choix_ajout;?></div>
      <form action="choix_element.php" method="post" name="form2" id="form2" style="padding:8px;">
        <select class="field" name="menutypeName" id="menutypeName">
          <? $str2="select * from menutype550";
							$res2=mysql_query($str2);
						   	while($aff2=mysql_fetch_array($res2)) {
							echo "<option value='".$aff2['MenuTypeName']."'";
							if ($menutypeName==$aff2['MenuTypeName']) {echo " selected";}
							echo">".$aff2['MenuTypeName']."</option>";
							}?>
        </select>
        <input type="submit" name="Submit" value="<? print voir_la_famille; ?>" style="background:#000; color:#fff; width: 110px;"/>
      </form>
      <table  style="width:540px;" height="73" class="zoneListing">
        <tr>
          <td width="26" class="rubriqueListing"><? print ref; ?></td>
          <td width="93" class="rubriqueListing"><? print menu; ?></td>
          <td width="100" class="rubriqueListing"><? print sous_famille; ?></td>
          <td width="63"  class="rubriqueListing" align="center"><? print prix; ?></td>
          <td width="63"  class="rubriqueListing" align="center"><? print selectionner;?></td>
        </tr>
        <?php 
	$sql="select * from menuinfo550 where menutype='".$menutypeName."'";	
	$result=mysql_query($sql) OR die(mysql_error());
	while($myrow=mysql_fetch_array($result))
							{
                        	 ?>
        <tr>
          <td class="elementListing"><?php print($myrow[MenuCode]);?></td>
          <td class="elementListing"><?php print($myrow[MenuName]);?></td>
          <td class="elementListing"><?php print($myrow[menutype]);?></td>
          <td align="right" class="elementListing"><?php echo format_prix($myrow[MenuPrixPlace]);?></td>
          <td align="center" class="elementListing"><a href="javascript:void(0)" onclick="choix('<?php print($myrow[MenuID]);?>','<?php print($myrow[MenuName]);?>','<?php print($myrow[MenuPrixPlace]);?>')"><img src="img/choix.gif" width="30" height="28" border="0" /></a></td>
        </tr>
        <?php 
                        	 }
                        ?>
      </table>
    </div></td>
  </tr>
</table>
</body>
</html>
