<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
	//ajouter by liu pour changer language begin
	session_start();
	include('../../lang/'.$_SESSION['lang'].'.php');
	
	//end
	$RestoID = $_COOKIE["systa_restoid"];
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
	function calcul_prix() {
	prixu=<? echo $prixu; ?>;
	qte=document.getElementById('qte').value;
	montantarticle=prixu*qte;
	document.getElementById('montant').innerHTML=montantarticle;
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
		
				<!-- Box -->
					<div class="box" style=" overflow:auto; margin-bottom:30px; width:900px;">
					<!-- Box Head -->
					<div class="box-head" id="tt_list" style="padding:5px;">
						<div align="center" style=" float:left;"><h2><strong><? print modif_article;?></strong></h2></div>
	
						<div align="center" class="right" style="margin-top:30px; margin-bottom:30px; padding-left:20px; overflow-y:scroll; height:200px;">
							<form id="form1" name="form1" method="post" action="modif_article_ok.php">
							<table class="zoneListing" border="1" align="center" cellpadding="2" cellspacing="0">
							  <tr>
								<td width="160" class="elementListing rubriqueListing" align="center"><strong><? print Code;?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print Nom;?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? echo quantite;?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print prix_uni;?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print montant;?></strong></td>
							  </tr>
							  <tr>
								<td align="center" class="elementListing"><? echo $code; ?></td>
								<td align="left" class="elementListing"><? echo $nom; ?></td>
								<td align="center" class="elementListing">
								  <input name="qte" type="text" id="qte" value="<? echo $qte; ?>" size="3" onkeyup="calcul_prix()"/>    </td>
								<td align="right" class="elementListing"><? echo format_prix($prixu); ?></td>
								<td align="right" class="elementListing"><span id="montant"><? echo format_prix($montant); ?></span></td>
							  </tr>
							  <tr >	
								<td colspan="7" align="center" style="" >
								  <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
								  <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
								  <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
								  <input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
								  <input name="CmdID" type="hidden" id="CmdID" value="<? echo $CmdID; ?>" />
								  <input type="submit" name="Submit" value="<? print Modifier;?>" style="background:#000; color:#fff; width: 80px; margin-left:360px;" />    </td>
							   
							  </tr>
							</table>
							</form>
							<form id="form2" name="form2" method="post" action="details_cmd.php" >
							  <div align="center" style="padding-left:370px; padding:10px;">
								<input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
								<input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
								<input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
								<input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
								<input type="submit" name="Submit2" value="<? print Annuler;?>" style="background:#000; color:#fff; width: 80px; margin-left:350px;"/>
							  </div>
							</form>

						</div>
						<div align="center" style="float:left; margin-left:395px; margin-top:10px; margin-bottom:20px;" ><a href="c_index.php?today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>" style=" padding:5px; border:1px solid #888888; "><? print Retour;?></a></div>
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