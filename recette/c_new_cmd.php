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
	<script language="javascript">
		function calcul_prix() {
			prix=document.getElementById('Prixu').value*document.getElementById('qte').value;
			prix=prix.toFixed(2);
			document.getElementById('Total').innerHTML=prix;
		}
		function checktable() {
			if (document.getElementById('type').value=="P") {
				document.getElementById('table').style.display="block";
			}else {
				document.getElementById('table').style.display="none";
			}
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
				<div class="box" >
					<div class="box-head" style="width:875px; padding:5px;">
						<h2><strong><? print new_article; ?> </strong> </h2>
					</div>
					<!-- Sidebar -->
					<div id="sidebar" >				
					<!-- Box -->
					<div class="box" style="padding-bottom:20px;">
						<!-- <p align="center"><strong>Ajouter un nouveau article</strong></p> -->
						<form id="form3" name="form3" method="post" action="new_cmd_ok.php">
							  <table align="center" cellspacing="5" style="margin:20px;">
								<tr >
							      <td width="150" align="left" style="padding-left:10px;">
									  <span><? print mode_distri;?>
										  <select class="field" name="type" id="type" onchange="checktable()">
											<option value="P"><? print sur_place;?></option>
											<option value="E"><? print emporter;?></option>
											<option value="L"><? print livraison;?></option>
										  </select>
									  </span>
								  </td>
								  <td width="250" align="left"><span id="table"><? print table_Number ?> :  
								       <input class="field input2" name="table" type="text" id="table"/>				  
							        </span></td></tr>					
								 <tr>
								  <td width="360" align="left" style="padding-left:10px;"><span><? print temps_distri;?>
								  <select class="field" name="day" id="day">
								  <? for ($i=1;$i<=31;$i++)  {
										 echo "<option value='";
										 if ($i<10) { echo "0".$i."'";} 
										 else {echo $i."'";}
										if ($i==date('d')) {
										  echo " selected='selected'";
									   }
										echo ">".$i."</option>";
									  }
								  ?>
								  </select>
									<select class="field" name="month" id="month">
									  <option value="01"<? if (date('m')=="01") {echo 'selected="selected"';}?>><? print JAN; ?></option>
									  <option value="02"<? if (date('m')=="02") {echo 'selected="selected"';}?>><? print FEV; ?></option>
									  <option value="03"<? if (date('m')=="03") {echo 'selected="selected"';}?>><? print MAR; ?></option>
									  <option value="04"<? if (date('m')=="04") {echo 'selected="selected"';}?>><? print AVR; ?></option>
									  <option value="05"<? if (date('m')=="05") {echo 'selected="selected"';}?>><? print MAI; ?></option>
									  <option value="06"<? if (date('m')=="06") {echo 'selected="selected"';}?>><? print JUI; ?></option>
									  <option value="07"<? if (date('m')=="07") {echo 'selected="selected"';}?>><? print JUY; ?></option>
									  <option value="08"<? if (date('m')=="08") {echo 'selected="selected"';}?>><? print AOU; ?></option>
									  <option value="09"<? if (date('m')=="09") {echo 'selected="selected"';}?>><? print SEP; ?></option>
									  <option value="10"<? if (date('m')=="10") {echo 'selected="selected"';}?>><? print OCT; ?></option>
									  <option value="11"<? if (date('m')=="11") {echo 'selected="selected"';}?>><? print NOV; ?></option>
									  <option value="12"<? if (date('m')=="12") {echo 'selected="selected"';}?>><? print DEC; ?></option>
									</select>
									<select class="field" name="year" id="year">
									  <?
									   $thisyear=date('Y');
									   for ($i="2007"; $i<=$thisyear; $i++) {
									   echo '<option value="'.$i.'"';
									   if ($i==$thisyear) {echo " selected='selected' ";} 
									   echo'>'.$i.'</option>';
									   }
									   ?>
									</select></span></td>
								  <td align="left">
								  <select class="field" name="hh" id="hh">
									<? for ($i=0;$i<=23;$i++)  {
								  echo "<option value='";
								  if ($i<10) {echo "0".$i."'";}  else {echo $i."'";}
								  if ($i==date('H')) {echo " selected='selected' ";}
								  echo ">";
								  if ($i<10) {echo "0".$i;}  else {echo $i;}
								  echo "</option>";
								  }
								  ?>
								  </select>
									&nbsp;h&nbsp;
									<select class="field" name="mm" id="mm">
									  <? for ($i=0; $i<=59; $i++)  {
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
											<input type="submit" name="Submit" value="<? echo button_ajout;?>" id="bouton_ajouter" disabled="disabled" style="color:#fff; width: 80px; background-color: #191818; "/>
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
						<div align="center"><a href="c_index.php?today=<? echo $today; ?>&amp;aff_month=<? echo $aff_month; ?>&amp;aff_year=<? echo $aff_year; ?>" style="padding-left:20px; padding-right: 20px; padding-bottom:5px; padding-top: 5px; border:1px solid #888888;  background-color: #9c8d8d; "><? print Retour;?></a></div>					
					</div>
					<!-- end Box -->
					</div>
					<!-- end Sidebar -->
				</div>
				
				<!-- end-box-top-->
				
				<!-- Box-bottom -->
					<div class="box" style=" overflow:auto; padding-bottom:20px; width:885px;">
					<!-- Box Head -->
					<div class="box-head" id="tt_list" style="padding:5px;">
						<div align="center" style="padding-left:10px; float:left;"><h2><strong><? echo new_cmd;?></strong></h2></div>
	
						<div align="center" class="right" style="margin-top:30px; padding-left:0px; overflow-y:scroll; max-height:300px;">
						<table class="zoneListing" border="1" align="center" cellpadding="2" cellspacing="0" style="padding-left:50px;">
							  <tr style="height:30px;">
								<td width="160" class="elementListing rubriqueListing" align="center"><strong><? print datecmd; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print montant; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print cash; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print cheque; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print tresto; ?></strong></td>
								<td width="110" class="elementListing rubriqueListing" align="center"><strong><? print cb; ?></strong></td>
								<td width="100" class="elementListing rubriqueListing" align="center"><strong><? print type; ?></strong></td>
							  </tr>
							<td align="center">-</td>
								<td class="elementListing" align="center">0 &euro; 00 </td>
								<td class="elementListing" align="center">0 &euro; 00 </td>
								<td class="elementListing" align="center">0 &euro; 00 </td>
								<td class="elementListing" align="center">0 &euro; 00 </td>
								<td class="elementListing" align="center">0 &euro; 00 </td>
								<td class="elementListing" align="center">0 &euro; 00</td>
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