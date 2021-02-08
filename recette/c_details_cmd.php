<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
	//ajouter by liu pour changer language begin
	session_start();
	include('../../lang/'.$_SESSION['lang'].'.php');
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
		function ConfirmDel(){
			if(!confirm("<? print delete_article; ?>")){
				return (false);	
			}else 
				return true;
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

<body onload="checktable()">

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
				<div class="box" style="overflow:auto; " >
					<div class="box-head" style="width:875px; padding:5px;">
						<h2><strong><? print m_comd; ?> </strong> 
						 <?
						$sql = "SELECT * FROM commandinfo20 WHERE CommandID=$CommandID"; 
						$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
						while($data = mysql_fetch_array($req)) 
							{
						$day=$data['Day'];	
						?>
						</h2>
					</div>
					<!-- Sidebar -->
					<div id="sidebar"style="overflow:auto; " >
						
					<!-- Box -->
					<div class="box" style="margin-top:30px; margin-bottom:20px; margin-left:50px; overflow-y:scroll; width:800px;">
						<table class="zoneListing" style="width:780px;" border="1" align="center" cellpadding="2" cellspacing="0" >
							  <tr>
								<td width="160" class="elementListing rubriqueListing" align="center"><strong><? print datecmd; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print montant; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print cash; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print cheque; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print tresto; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print cb; ?></strong></td>
								<td width="100" class="elementListing rubriqueListing" align="center"><strong><? print type; ?></strong></td>
							<? if($new_cmd!=1) { ?>
								<td width="100" align="center" class="elementListing rubriqueListing"><strong><? print modifier; ?></strong></td><? } ?>
							  <tr>
							<td align="center" class="elementListing" ><? echo $data['Day']."/".$data['Month']."/".$data['Year']." - ".$data['Time']; ?></td>
								<td align="center" class="elementListing" ><? echo format_prix($data['Montant']); ?></td>
								<td align="center" class="elementListing"><? echo format_prix($data['Cash']); ?></td>
								<td align="center" class="elementListing"><? echo format_prix($data['Cheque']); ?></td>
								<td align="center" class="elementListing"><? echo format_prix($data['Ticket']); ?></td>
								<td align="center" class="elementListing"><? echo format_prix($data['Carte']); ?></td>
								<td align="center" class="elementListing"><? echo $data['OrderNum']; ?></td>
								<? if($new_cmd!=1) { ?><td align="center"><a href="c_modif_cmd.php?CommandID=<? echo $data['CommandID']; ?>&amp;today=<? echo $data['Year']; ?>-<? echo $data['Month']; ?>-<? echo $data['Day']; ?>&aff_month=<? echo $aff_month; ?>&aff_year=<? echo $aff_year; ?>"><img src="img/edit.png" width="16" height="16" border="0" /></a></td><? } ?>
							  </tr></table>
							<div align="center">
							  <? } 
							if ($message=="supprok") {
							?>
							  <br />
							  <span style="color:red"><strong><? print m_articl_suprri;?><br /></strong></span>
							  <? }
							?>	
							</div>
					</div>
					<!-- end Box -->
					</div>
					<!-- end Sidebar -->
				</div>
				
				<!-- end-box-top-->
				
				<!-- Box-bottom -->
					<div class="box" style=" overflow:auto; margin-bottom:30px; width:885px;">
					<!-- Box Head -->
					<div class="box-head" id="tt_list" style="padding:5px;">
						<div align="center" style=" float:left;"><h2><strong><? echo m_detail;?></strong></h2></div>
	
						<div align="center" class="right" style="margin-top:30px; margin-bottom:30px; overflow-y:scroll; max-height:300px;">
							<table class="zoneListing" style="width:650px;" border="1" align="center" cellpadding="2" cellspacing="0" >
							  <tr>
								<td width="160" class="elementListing rubriqueListing" align="center"><strong><? print Code;?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print Nom;?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? echo quantite;?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print prix_uni;?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print montant;?> </strong></td>
								<td width="100" class="elementListing rubriqueListing" align="center"><strong><? print modifier;?></strong></td>
								<td width="100" class="elementListing rubriqueListing" align="center"><strong><? print supprimer;?></strong></td>
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
								<td align="center" class="elementListing"><a href="c_modif_article.php?CommandID=<? echo $CommandID; ?>&amp;CmdID=<? echo $data['CmdID']; ?>&amp;today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>"><img src="img/edit.png" width="16" height="16" border="0" /></a></td>
								<td align="center" class="elementListing"><a href="del_article.php?CommandID=<? echo $CommandID; ?>&amp;CmdID=<? echo $data['CmdID']; ?>&amp;today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>" onClick="return ConfirmDel();"><img src="img/delete.png" width="16" height="16" border="0" /></a></td>
							  </tr>
							 
							<? } ?>  <tr>
								<td colspan="7" align="center" style="padding-left:230px;">
								<form id="form1" name="form1" method="post" action="c_new_article.php" >
								  <input name="new_cmd" type="hidden" id="new_cmd" value="<? echo $new_cmd; ?>" />
								  <input name="today" type="hidden" id="today" value="<? echo $today; ?>" />
								  <input name="aff_month" type="hidden" id="aff_month" value="<? echo $aff_month; ?>" />
								  <input name="aff_year" type="hidden" id="aff_year" value="<? echo $aff_year; ?>" />
								  <input name="CommandID" type="hidden" id="CommandID" value="<? echo $CommandID; ?>" />
								  <input type="submit" name="Submit" value="<? print m_ajout;?>" align="center" style="background:#000; color:#fff; width:150px;"/>
								</form>
								</td>
								</tr>
							</table>
				
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