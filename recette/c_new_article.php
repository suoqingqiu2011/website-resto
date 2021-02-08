<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
	//ajouter by liu pour changer language begin
	session_start();
	include('../../lang/'.$_SESSION['lang'].'.php');
	
	//end
	$RestoID = $_COOKIE["systa_restoid"];
	include('config.php');
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

<body >

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
			<!-- box-top -->
				<div class="box" >
					<div class="box-head" style="width:875px; padding:5px;">
						<h2><strong><? print autre_article; ?> </strong> </h2>
					</div>
					<!-- Sidebar -->
					<div id="sidebar" >
					
					<!-- Box -->
					<div class="box" style="padding-bottom:20px; padding-top:20px;">
						<!-- <p align="center"><strong>Ajouter un nouveau article</strong></p> -->
						<form id="form1" name="form1" method="post" action="new_article_ok.php">
							  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="20" >
								<tr>
								  <td width="50%"><iframe src="choix_element.php" width="580" height="300" frameborder="0"></iframe></td>
								  <td width="30%" style="border:1px solid #888888; border-radius:2px;">
								  <table width="250" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-left:10px;">
									  <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
									  <tr>
										<td class="compterelement"><? echo votre_choix;?>:&nbsp; </td>
										<td align="center"><span id="MenuName"></span></td>
									  </tr>
									  <tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr>
									  <tr >
										<td class="compterelement"><? echo prix_uni;?>:&nbsp; </td>
										<td align="center"><span id="MenuPrixPlace" style="font-size:13px;">0</span>&nbsp;€</td>
									  </tr>
									  <tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr>
									  <tr >
										<td class="compterelement" width="100"><? echo quantite;?>:&nbsp;</td>
										<td align="center"><div align="center"><span id="MenuName">
											<input class="field input2" name="qte" type="text" id="qte" style="width:100px; text-align:center;" onkeyup="calcul_prix()" value="1" size="2" maxlength="2" />
										</span></div></td>
									  </tr>
									  <tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr>
									  <tr>
										<td class="compterelement" align="center"><? echo total?>:&nbsp;</td>
										<td align="center"><span id="Total" style="font-weight:bold; font-size:15px;">0.00</span>&nbsp;€</td>
									  </tr>
									  <tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr>
									  <tr>
										<td colspan="2" align="center">
											<input type="submit" name="Submit" value="<? echo button_ajout;?>" id="bouton_ajouter" disabled="disabled" style="color:#fff; width: 80px; background-color: #191818;"/>
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
						<div align="center"><a href="c_index.php?today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>" style="padding-left:20px; padding-right: 20px; padding-bottom:5px; padding-top: 5px; border:1px solid #888888;"><? print Retour;?></a></div>					
					</div>
					<!-- end Box -->
					</div>
					<!-- end Sidebar -->
				</div>
				
				<!-- end-box-top-->
				
				<!-- Box-middle -->
					<div class="box" style=" overflow:auto; padding-bottom:5px; width:885px;">
					<!-- Box Head -->
					<div class="box-head" id="tt_list" style="padding:5px;">
						<div align="center" style="padding-left:10px; float:left;"><h2><strong><? echo old_cmd;?></strong></h2></div>
	
						<div align="center" class="right" style="padding-left:0px; overflow-y:auto; max-height:300px; width:860px;">
						
						<table class="zoneListing" border="1" align="center" cellpadding="2" cellspacing="0" style=" width:860px; padding-bottom: 20px; float:left; margin-left:40px;">
						  <tr style="height:30px;">
							<td width="100" class="elementListing rubriqueListing" align="center"><strong><? print Code;?></strong></td>
							<td width="100" class="elementListing rubriqueListing" align="center"><strong><? print Nom;?></strong></td>
							<td width="100" class="elementListing rubriqueListing" align="center"><strong><? echo quantite;?></strong></td>
							<td width="100" class="elementListing rubriqueListing" align="center"><strong><? print prix_uni;?></strong></td>
							<td width="100" class="elementListing rubriqueListing" align="center"><strong><? print montant;?> </strong></td>
							<td width="100" class="elementListing rubriqueListing" align="center"><strong><? print modifier;?></strong></td>
							<td width="80" class="elementListing rubriqueListing" align="center"><strong><? print supprimer;?></strong></td>
						  </tr>
						<?
						$sql = "SELECT * FROM commanddetail20 WHERE CommandID=$CommandID"; 
						$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
						while($data = mysql_fetch_array($req)) {
						?>
						  <tr>
							<td align="center" class="elementListing"><? echo $data['CmdCode']; ?></td>
							<td align="left" class="elementListing"><? echo $data['CmdName']; ?></td>
							<td align="center" class="elementListing"><? echo $data['CmdNum']; ?></td>
							<td align="right" class="elementListing"><? echo format_prix($data['CmdPrix']); ?></td>
							<td align="right" class="elementListing"><? echo format_prix($data['CmdMontant']); ?></td>
							<td align="center" class="elementListing"><img src="img/edit.png" width="16" height="16" /></td>
							<td align="center" class="elementListing"><a href="del_article.php?CommandID=<? echo $CommandID; ?>&amp;CmdID=<? echo $data['CmdID']; ?>&amp;today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>" onclick="return ConfirmDel();"><img src="img/delete.png" width="16" height="16" border="0" /></a><a href="del_article.php?CmdID=<? echo $data['CmdID']; ?>&today=<? echo $aff_year; ?>-<? echo $aff_month; ?>-<? echo $day; ?>&aff_month=<? echo $aff_month; ?>&aff_year=<? echo $aff_year; ?>" onClick="return ConfirmDel();"></a></td>
						  </tr>
						 
						<? } ?>
						</table>

						</div>
						<div align="center" style="padding-left:350px; float:left;">
						<? if($new_cmd==1)  {  ?>  <p>&nbsp;</p>
						  <form id="form2" name="form2" method="post" action="c_modif_cmd.php">
							<div align="center">
							  <input type="submit" name="Submit2" value="<? print termi;?>" style="background:#000; color:#fff; width:160px; height:30px;"/>
							  <input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
							  <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
							  <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
							  <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
							  <input name="new_cmd" type="hidden" id="new_cmd" value="<? echo $new_cmd; ?>" />
							  </div>
						  </form>
						  <p>&nbsp;</p><? } ?>
						 
						<div align="left" style="padding-left:60px; padding-bottom:20px;">
						<a href="c_index.php?today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>" style="padding-left:20px; padding-right: 20px; padding-bottom:5px; padding-top:5; border:1px solid #888888;"><? print Retour;?></a></div>
					</div>
					<!-- end Box Head -->
					</div>
					</div>
					<!-- end Box-middle -->
					
					<!-- Box-bottom -->
					<div class="box" style=" overflow:auto; padding-bottom:20px; width:885px;">
					<!-- Box Head -->
					<div class="box-head" id="tt_list" style="padding:5px;">
						<div align="center" style="padding-left:10px; float:left;"><h2><strong><? echo addition;?></strong></h2></div>
	
						<div align="center" class="right" style="margin-top:30px; padding-left:0px; overflow-y:scroll; max-height:300px;">
						  <?
							$sql = "SELECT * FROM commandinfo20 WHERE CommandID=$CommandID"; 
							$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
							while($data = mysql_fetch_array($req)) {
							$day=$data['Day'];	
							?>
							<table class="zoneListing" border="1" align="center" cellpadding="2" cellspacing="0" style="padding-left:0px;">
							  <tr>
								<td width="160" class="elementListing rubriqueListing" align="center"><strong><? print datecmd; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print montant; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print cash; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print cheque; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print tresto; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print cb; ?></strong></td>
								<td width="100" class="elementListing rubriqueListing" align="center"><strong><? print type; ?></strong></td>
								<td width="100" class="elementListing rubriqueListing" align="center"><strong><? print modifier; ?></strong></td>
							  <tr>
							<td align="center"><? echo $data['Day']."/".$data['Month']."/".$data['Year']." - ".$data['Time']; ?></td>
								<td align="center" class="elementListing"><? echo format_prix($data['Montant']); $Total_Montant+=$data['Montant']; ?></td>
								<td align="center" class="elementListing"><? echo format_prix($data['Cash']); $Total_Cash+=$data['Cash']; ?></td>
								<td align="center" class="elementListing"><? echo format_prix($data['Cheque']); $Total_Cheque+=$data['Cheque']; ?></td>
								<td align="center" class="elementListing"><? echo format_prix($data['Ticket']); $Total_Ticket+=$data['Ticket']; ?></td>
								<td align="center" class="elementListing"><? echo format_prix($data['Carte']); $Total_Carte=$data['Carte']; ?></td>
								<td align="center" class="elementListing"><? if ($data['Type']=="EMPORTER") {echo "A emporter";} elseif ($data['Type']=="PLACE") {echo "Sur place";} ?></td>
								<td align="center" class="elementListing"><a href="modif_cmd.php?CommandID=<? echo $data['CommandID']; ?>&amp;today=<? echo $data['Year']; ?>-<? echo $data['Month']; ?>-<? echo $data['Day']; ?>&aff_month=<? echo $aff_month; ?>&aff_year=<? echo $aff_year; ?>"><img src="img/edit.png" width="16" height="16" border="0" /></a></td>
							  </tr>
							</table>
							<p>
							  <? } ?>
							</p>
						
						</div>
					</div>
					<!-- end Box Head -->				
					</div>
					<!-- end Box-bottom -->			
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