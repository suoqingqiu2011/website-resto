<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
	//ajouter by liu pour changer la language begin
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	//end
	include_once("../include/config.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];
	if($MenuID=="") {
		$sql="select * from $tb_menu where RestoID='$RestoID' ORDER BY MenuID DESC";
		$res=mysql_query($sql);
		while($data=mysql_fetch_array($res)) {
			$MenuID=$data['MenuID'];
		}
	}
	$sql="select * from $tb_menu where RestoID='$RestoID' && MenuID='".$MenuID."'";
		$res=mysql_query($sql);
		while($data=mysql_fetch_array($res)) {
		$Name=$data['Name'];
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title><? print t_option_gestion; ?></title>
	<link rel="stylesheet" href="css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css1/component.css" />
	<link rel="stylesheet" type="text/css" href="css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="css1/style1.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script language="JavaScript" type="text/JavaScript">
			<!--
			function ConfirmDelOption(){	
				//ajouter by liu pour changer la language 19/05/2010
			   var alert_option1= "<? print text_option_alert1; ?>";	
			   if(!confirm(alert_option1)){
					return (false);	
				}else 
					return true;
			}
			function ConfirmDelChoix(){
			   //ajouter by liu pour changer la language 19/05/2010
			   var alert_option2= "<? print text_option_alert2; ?>";
			   if(!confirm(alert_option2)){
					return (false);	
			   }else 
					return true;
			}
			-->
		</script>
</head>

<body>

<div id="bg"></div>
	
<?php include ("top_left_nav.php"); ?>

<!-- container-->
<div id="container">
<!-- contain menu -->
<div class="shell_top">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<div class="small_titre" ><a href="adminmenu.php"><? print m_menus; ?></a>
			<span>&gt;</span>	
			<a href="adminmenu.php"><? print m_gestion_menu; ?></a>
			<span>&gt;</span>
			<a href="adminoptions.php"><? print t_option_gestion; ?> </a> </div>
		</div>
		<!-- end Small Nav -->
	
		<!-- Main -->
		<div id="main" style="text-a">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
			<!-- box-top -->
				<div class="box" style="min-height:254px;">
					<div class="box-head">
						<h2><strong><? print t_Gestion_Familles; ?></strong></h2>
					</div>
					
				<!-- Sidebar -->
				<div id="sidebar" >
					
					<!-- Box -->
					<div class="box" style="padding-bottom:20px; min-height:215px;">
						<!-- box_content -->
						<div class="box-content" style="height:150px;">	
							<!-- Sort -->
							<div class="sort">
							<!-- form1 -->
							<div align="left" valign="top" style="float:left;  width:50%;"><? if ($act!="modifier") { ?>
							  <form name="form1" class="form1" method="post" action="saveoptions.php" >
								<div width="100%" border="0" align="left" cellpadding="0" cellspacing="2">
								 
									<label><strong><? print option_ajouter_op; ?> </strong></label>
									<!-- nom_option -->
									<div align="left" class="form_elemnt"><? print option_nom; ?>
									<input name="name" type="text" class="field size1 input2" id="name" style="width:190px;"> 
									<!-- end_nom_option -->
									<input name="MenuID" type="hidden" id="MenuID" value="<? echo $MenuID; ?>">
									<input name="action" type="hidden" id="action" value="newOption"></div>
									 
									 <!-- input_ajouter1 -->
									  <div colspan="2" align="left" class="form_elemnt" style="">
										  <input name="Submit" type="submit" class="submitcss" value="<? print Ajouter; ?>">
									  </div>	
									  <!-- input_ajouter1 -->
								  </div>
								 
								  
							  </form>
						  </div>
						  <!-- end form1 -->
						  
						   <!-- form2 -->				
							  <div  align="left" valign="top" style="float:left; width=50%;">
							  <form name="form2" class="form2" method="post" action="saveoptions.php">
								<div width="100%" border="0" align="left" cellpadding="0" cellspacing="2">
								  
									<label><strong><? print option_choix; ?> </strong></label>
									<!-- OptionMenu -->
									<div class="">
										<div align="left" class="form_elemnt2"><? print option_op; ?> </div>
										<div align="left" class="form_elemnt2">
											<select class="field" name="OptionMenuID" class="input2" id="OptionMenuID">
											  <? $sql="select * from options_menu where `RestoID`='$RestoID' && MenuID='".$MenuID."'";					  
												   $result=mysql_query($sql);
												   While($myrow=mysql_fetch_array($result)){
													 echo "<option value='".$myrow['OptionMenuID']."'>".$myrow['Name']."</option>";	
												   } 
											  ?>	
											</select>  
										 </div>
									 </div>
									 <!-- end OptionMenu -->
									 <!-- choix_element-->
									 <div class="zoneFormulaire form_elemnt2" align="left">
										  <div colspan="2" align="left">
										  <input name="button"  type="button" class="submitcss" style="width:180px;" onClick="window.open('choix_element.php?MenuID=<? echo $MenuID; ?>','choix','menubar=no, status=no, scrollbars=auto, menubar=no, width=450, height=500');" value="<? print option_element_ajou; ?>">
										  </div>
								    </div>	
								    <!-- end choix_element-->
									
								    <!-- choisir -->
								    <div class="form_elemnt2" align="left">
									  <div align="left"><? print option_choisi; ?></div>
									  <div align="left"><span id="ecrire_choix"></span></div>
									</div>
									<!-- end choisir -->
									
									<!-- supplmnt_prix -->
									<div class="form_elemnt2" align="left">
									  <div align="left"><? print option_supp_prix; ?> </div>
									  <div align="left"><input name="prix" type="text" class="field size1 input2" id="prix" value="0" size="5" style="width:190px;"></div>
									</div>
									<!-- supplmnt_prix -->
								  
								  <!-- input_ajouter2 -->
								  <div class="form_elemnt2" colspan="2" align="center">
									  <input name="Submit" type="submit" class="submitcss" value="<? print Ajouter; ?>" style="float:left;">
										<input name="action" type="hidden" id="action" value="newChoix">
										<input name="MenuID" type="hidden" id="MenuID" value="<? echo $MenuID; ?>">
										<input name="ChoixMenuID" type="hidden" id="ChoixMenuID">
								  </div>
								  <!-- end input_ajouter2 -->
								</div>
	
							  </form>
							 <? } elseif ($act=="modifier" && $mode=="options") {?>
							  </div>
							  <!-- end form2 -->
							  
							  <!-- form3 -->
							  <div align="left" valign="top">
							  <form name="form3" method="post" action="saveoptions.php">
								  <div width="40%" border="0" cellspacing="2" cellpadding="0">
									
								  <label align="left" colspan="2"><strong><? print option_modi; ?> </strong></label>	  
									<?
									$sql="select * from options_menu where `RestoID`='$RestoID' && OptionMenuID='".$optionmenuid."'";	
										$result=mysql_query($sql);
										while($myrow=mysql_fetch_array($result)){
												$name=$myrow['Name'];
										}
									?>
									<!-- nom_option -->
									<div class="">
									  <div align="left" class="form_elemnt2"><? print option_nom_option; ?></div>
										<div align="left" class="form_elemnt2">
											<input name="name" type="text" class="field size1 input2" id="name" value="<? echo $name; ?>">
											<input name="MenuID" type="hidden" id="MenuID" value="<? echo $MenuID; ?>">
											<input name="action" type="hidden" id="action" value="modifOption">
											<input name="optionmenuid" type="hidden" id="optionmenuid" value="<? echo $optionmenuid; ?>">
										</div>
									</div>
									<!-- end nom_option -->
									<!-- input_modif -->
									<div align="left" class="form_elemnt2">
									  <input name="Submit" type="submit" class="submitcss" value="<? print Modifier; ?>">
								    </div>
									<!-- end input_modif -->
								  </div>
							  </form>  
							   <? } elseif ($act=="modifier" && $mode=="choix" ){ ?><form name="form1" method="post" action="saveoptions.php"><table width="50%" border="0" cellspacing="2" cellpadding="0">
									<div align="left" class="form_elemnt2">
									  <label align="left" colspan="2"><strong><? print option_modi_choix; ?> </strong></label>
								    </div>
								<?
									$sql="select m.Name,o.Prix,o.OptionMenuID,o.ChoixMenuID from options o, Menu m where m.RestoID='$RestoID' && o.OptionID='$optionid' && m.MenuID=o.ChoixMenuID";
									$result=mysql_query($sql);
									while($myrow=mysql_fetch_array($result)){
										$name=$myrow['Name'];
										$prix=$myrow['Prix'];
										$optionmenuid=$myrow['OptionMenuID'];
										$choixmenuid=$myrow['ChoixMenuID'];		
									}
								?>	
									<!-- option_op -->
									<div align="left" class="form_elemnt2">
									  <div align="left" class="form_elemnt2"><? print option_op; ?> </div>
									  <div align="left" class="form_elemnt2">
										  <select name="OptionMenuID" class="input2" id="OptionMenuID">
										  <? 
											 $sql="select * from options_menu where `RestoID`='$RestoID' && MenuID='".$MenuID."'";		  
											 $result=mysql_query($sql);
											 While($myrow=mysql_fetch_array($result)){
											   echo "<option value='".$myrow['OptionMenuID']."'";
											   if ($myrow['OptionMenuID']==$optionmenuid) {echo " selected";}
											   echo ">".$myrow['Name']."</option>";	
											} 
										  ?>	
										  </select>                      
									  </div>
									</div>
									<!-- end option_op -->
									
									<tr class="zoneFormulaire">
									  <td colspan="2" align="center">
										<input  type="button" class="submitcss" onClick="window.open('choix_element.php?MenuID=<? echo $MenuID; ?>','choix','menubar=no, status=no, scrollbars=auto, menubar=no, width=450, height=500');" value="<? print option_element_ajou; ?>">
									  </td>
									</tr>
									
									<tr>
									  <td align="left"><? print option_choisi; ?> </td>
									  <td align="left"><span id="ecrire_choix"><? echo $name; ?></span></td>
									</tr>
									<tr>
									  <td align="left"><? print option_supp_prix; ?> </td>
									  <td align="left"><input name="prix" type="text" class="input2" id="prix" value="<? echo $prix; ?>" size="5"></td>
									</tr>
									<tr>
									  <td colspan="2" align="center"><input name="Submit" type="submit" class="submitcss" value="<? print Modifier; ?>">
										<input name="action" type="hidden" id="action" value="modifChoix">
										<input name="MenuID" type="hidden" id="MenuID" value="<? echo $MenuID; ?>">
										<input name="ChoixMenuID" type="hidden" id="ChoixMenuID" value="<? echo $choixmenuid; ?>">
										<input name="optionid" type="hidden" id="optionid" value="<? echo $optionid; ?>"></td>
									  </tr>
								  </table>
								  </form>
							   <? } ?>
							  </div>
							  <!-- end form3 -->
						  </div>
						  <!-- end Sort -->
						</div>
						<!-- end box_content -->
					</div>
					<!-- End Box -->
				</div>
				<!-- end Sidebar -->
				</div>
				<!-- end-box-top-->
				
				<!-- Box-bottom -->
					<div class="box" style=" min-height:300px; width:885px;">
					<!-- Box Head -->
					<div class="box-head" style="padding:10px;">
						<h2 class="left"><strong><? print listing_menus; ?> </strong></h2>
						<div align="center" class="right">
						<!-- info_photo -->
						<div colspan="2" align="center"><? if ($photo=="ok") {echo "<br /><strong>La photo a bien &eacute;t&eacute; ajout&eacute; pour la famille.</strong><br />";} 
						  elseif ($photo=="del") {echo "<br /><strong>Les photos ont bien &eacute;t&eacute; supprim&eacute;e</strong><br />";}  ?></td>
						</div>		
						<!-- end  info_photo -->
						
						<!-- table bottom -->
						<table align="center" border="0" cellspacing="0" cellpadding="0" style="width:100%; margin-left:20px; margin-top:20px;">
						<tr>
						  <td width="100%" rowspan="2" align="center" valign="top">
						  <div class="listing2">
							  
							  <table class="zoneListing">
								<tr>
							  <td width="176" class="rubriqueListing"><? print op_option; ?></td>
							  <td width="50" class="rubriqueListing"><? print op_modi_op; ?></td>
							  <td width="57" class="rubriqueListing"><? print op_supp_su; ?></td>
							  </tr>
								<?php 
									$sql="select * from options_menu where `RestoID`='$RestoID' && MenuID='".$MenuID."'";	
									$result=mysql_query($sql);
									while($myrow=mysql_fetch_array($result)){
								?>
							<tr>
							  <td class="elementListing"><?php print($myrow[Name]);?></td>
							  <td class="elementListing"><a href="adminoptions.php?MenuID=<? echo $MenuID ?>&optionmenuid=<? echo $myrow['OptionMenuID']; ?>&mode=options&act=modifier"><img src="images/edit.png" width="16" height="16" border="0">Modif.</a> </td>
							  <td class="elementListing"><a href="deloptions.php?MenuID=<? echo $MenuID ?>&optionmenuid=<? echo $myrow['OptionMenuID']; ?>" onClick="return ConfirmDelOption();"><img src="images/delete.png" width="16" height="16" border="0">Suppri.</a> </td>
							  </tr>
								 <?php 
								    $sql2="select m.Name,o.Prix,o.OptionID from options o, menu m where m.RestoID='$RestoID' && o.OptionMenuID='$myrow[OptionMenuID]' && m.MenuID=o.ChoixMenuID";
								    $result2=mysql_query($sql2) or die (mysql_error());
								    while($myrow2=mysql_fetch_array($result2)){ 
								 ?>
							<tr>
							  <td align="right" class="elementListingSousF"><div align="right">&rArr; <em><?php print($myrow2[Name]);?></em>&nbsp;&nbsp;+<? echo format_prix($myrow2[Prix]); ?></div></td>
							  <td class="elementListingSousF"><a href="adminoptions.php?MenuID=<? echo $MenuID ?>&optionid=<? echo $myrow2['OptionID']; ?>&mode=choix&act=modifier"><img src="images/edit.png" width="16" height="16" border="0"></a> </td>
							  <td class="elementListingSousF"><a href="deloptions.php?MenuID=<? echo $MenuID ?>&optionid=<? echo $myrow2['OptionID']; ?>" onClick="return ConfirmDelChoix();"><img src="images/delete.png" width="16" height="16" border="0"></a> </td>
							  </tr>
							<?php } 
							  }
							?>
							  </table>
						  </div>                    
						  </td>	  
						</tr>
						</table>
						<!-- end table bottom -->
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

<script src="js1/classie.js"></script>
<script src="js1/modalEffects.js"></script>
<script src="js1/jquery.min.js"></script>

<!-- Footer -->
<div id="con_footer ">
	<div class="shell">
		<?php include ("bottom.php"); ?>
	</div>
</div>
<!-- End Footer -->
</body>
</html>