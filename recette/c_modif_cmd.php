<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
	//ajouter by liu pour changer language begin
	session_start();
	include('../../lang/'.$_SESSION['lang'].'.php');
	
	//end
	$RestoID = $_COOKIE["systa_restoid"];
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

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Systa Resto &reg;</title>
	<link rel="stylesheet" href="../css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="../css1/component.css" />
	<link rel="stylesheet" type="text/css" href="../css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="../css1/style1.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css">
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

<style>

.elementListing{
	min-width:80px;
}

#tb_c{
	height:30px;
}
.compterelement{
	text-align: center;
    font-family: Arial;
    font-size: 13px;
    font-weight: bold;
    color: #818181;
}

iframe{
	border: 1px solid #888888;
    border-radius: 2px;
}

input[type="submit"]:enabled{
background:#000;
}
input[type="submit"]:disabled{
background:#888888;
}

</style>	
</head>

<body onload="check_montant()">

<div id="bg"></div>
	
<?php include ("top_left_nav.php"); ?>

<!-- container-->
<div id="container">
<!-- contain menu -->
<div class="shell_top">
		
		<!-- Small Nav -->
		<div class="small-nav" style="margin-top: 15px;">
			<div class="small_titre" ><a href="#"><? print m_commande; ?></a>
			<span>&gt;</span>
			<a href="c_index.php"><? print m_article_compte; ?></a></div>
		</div>
		<!-- end Small Nav -->
	
		<!-- Main -->
		<div id="main" style="text-a">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
			<p>
			  <?
			$sql = "SELECT * FROM commandinfo20 WHERE CommandID=$CommandID"; 
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			while($data = mysql_fetch_array($req)) 
				{
			?>
			</p>
				
				<!-- Box -->
					<div class="box" style=" overflow:auto; margin-bottom:30px; width:885px;">
					<!-- Box Head -->
					<div class="box-head" id="tt_list" style="padding:5px;">
						<div align="center" style=" float:left;"><h2><strong><? print modif_commd;?></strong></h2></div>
	
						<div align="center" class="right"  style="margin-top:30px; margin-bottom:30px; padding-left:20px; overflow-y:scroll; max-height:300px; width:95%;">
							<table border="1" align="center" cellpadding="2" cellspacing="0">
							<form name="form1" method="post" action="modif_cmd_ok.php">
							<tr>
								<td width="20%" class="elementListing rubriqueListing" align="center"><strong><? print datecmd; ?></strong></td>
								<td width="10%" class="elementListing rubriqueListing" align="center"><strong><? print montant; ?></strong></td>
								<td width="5%" class="elementListing rubriqueListing" align="center"><strong><? print cash; ?></strong></td>
								<td width="5%" class="elementListing rubriqueListing" align="center"><strong><? print cheque; ?></strong></td>
								<td width="5%" class="elementListing rubriqueListing" align="center"><strong><? print tresto; ?></strong></td>
								<td width="5%" class="elementListing rubriqueListing" align="center"><strong><? print cb; ?></strong></td>
								<td width="40%" style="min-width:250px;" class="elementListing rubriqueListing" align="center"><strong><? print type;?></strong></td>
								<td width="10%" class="elementListing rubriqueListing" align="center"><strong><? print reste;?></strong></td>
							  <tr>
								<td class="elementListing" align="center"><? echo $data['Day']."/".$data['Month']."/".$data['Year']." - ".$data['Time']; ?></td>
								<td class="elementListing" align="center"><? echo format_prix($data['Montant']); ?></td>
								<td class="elementListing" align="center">
								  <input name="cash" type="text" id="cash" value="<? echo $data['Cash']; ?>" size="8" onKeyUp="check_montant();" onBlur="check_montant();" style="width: 60px;">    </td>
								<td align="center">
								<? if ($new_cmd==1) { ?>
								<input name="cheque" type="text" id="cheque" size="8" value="<? echo $data['Cheque']; ?>" onKeyUp="check_montant();" onBlur="check_montant();" style="width: 60px;"><? } else { echo $data['Cheque']; } ?></td>
								<td class="elementListing" align="center">
								<input name="ticket" type="text" id="ticket" size="8" value="<? echo $data['Ticket']; ?>" onKeyUp="check_montant();" onBlur="check_montant();" style="width: 60px;">      </td>
								<td class="elementListing" align="center"><? if ($new_cmd==1) { ?>
								<input name="carte" type="text" id="carte" size="8" value="<? echo $data['Carte']; ?>" onKeyUp="check_montant();" onBlur="check_montant();" style="width: 60px;"><? } else { echo $data['Carte']; } ?></td>
								<td align="center">
								<table border="0" align="center" cellpadding="0" cellspacing="0">
								  <tr>
									<td align="right" valign="top"><select name="type" id="type" onchange="checktable()">
										<option value="P"><? print sur_place;?></option>
										<option value="E"><? print emporter;?></option>
										<option value="L"><? print livraison;?></option>
									</select></td>
									<td align="left" valign="top">&nbsp;</td>
									<td align="left" valign="top"><span id="table" style="float:left;"><? print table_Number ?> :</span>
									  <input name="table" type="text" id="table" size="3" value="<? if($data['Type']=="PLACE") {echo $data['OrderNum'];} ?>" />
									&nbsp;</td>
								  </tr>
								</table></td>
								<td align="center"><div id="reste_du" style="color:#FF0000; font-weight:bold"></div></td>
							  </tr>
							  <tr style="height:50px;">
								<td colspan="8" align="center"><p>
								  <input type="submit" name="Submit" value="<? if ($new_cmd==1) {echo Terminer;} else {echo Modifier;} ?>" disabled="disabled" id="bouton_modifier" style=" color:#fff; width:80px; height:25px; margin-left:370px; ">
								  <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
								  <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
								  <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
								  <input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
								  <input name="CmdID" type="hidden" id="CmdID" value="<? echo $CmdID; ?>" />
								</p>      </td>
								</tr></form>
							<? if($new_cmd!=1) { ?> <tr style="height:50px;">
								<td colspan="8" align="center"><form id="form2" name="form2" method="post" action="c_details_cmd.php">
								  <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
								  <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
								  <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
								  <input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
								  <input type="submit" name="Submit2" value="<? print Annuler;?>" style="background:#000; color:#fff; width:80px; height:25px; margin-left:370px; "/>
								</form>    </td>
							  </tr><? } ?>
							</table>
							<p>
							  <? } ?>
							</p>
							<p>&nbsp;</p>
	
						</div>
						<div align="center" style="float:left; margin-left:395px; margin-top:10px; margin-bottom:20px;" ><a href="c_index.php?today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>" style="padding:5px; border:1px solid #888888;"><? print Retour;?></a></div>
					</div>
					<!-- end Box Head -->
					
					</div>
					<!-- end Box -->
				
			</div>
			<!-- End Content -->
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
<!-- End contain menu-->
	
</div>
<!-- End Container -->

<script src="../js1/classie.js"></script>
<script src="../js1/modalEffects.js"></script>
<script src="../js1/jquery.min.js"></script>

<!-- Footer -->
<div id="con_footer ">
	<div class="shell">
		<?php include ("bottom.php"); ?>
	</div>
</div>
<!-- End Footer -->
</body>
</html>