<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
	//ajouter by liu pour changer language begin
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	//end
	include_once("../include/config.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title><? print t_Gestion_Menus; ?></title>
	<link rel="stylesheet" href="css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css1/component.css" />
	<link rel="stylesheet" type="text/css" href="css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="css1/style1.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script language="JavaScript" type="text/JavaScript">
		function ConfirmDel(){  
		//ajouter by liu pour changer la language 17/05/2010
		var alert1= "<? print alter_adminfamille_su; ?>";
		if(!confirm(alert1)){
			return (false);	
		}else 
			return true;
		}
		function ConfirmModif(){  
		//ajouter by liu pour changer la language 17/05/2010
		var alert2= "<? print alter_adminfamille_mo; ?>";
		if(!confirm(alert2)){
			return (false);	
		}else 
			return true;
		}
	</SCRIPT>
	
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
			<div class="small_titre" ><a href="adminfamille.php"><? print m_famille; ?></a></div>	
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
					<div class="box" style="padding-bottom:20px; min-height:200px;">
						<!-- box_content -->
						<div class="box-content" style="height:150px;">	
							<!-- Sort -->
							<div class="sort">
							<!-- form1 -->
							<div align="left" valign="top" style="float:left;  width:50%; margin-left:50px;"><? if ($act!='modifier') { ?>
							  <form name="form1" class="form1" method="post" action="savefamille.php" >
								<div width="100%" border="0" align="left" cellpadding="0" cellspacing="2">
								 
									<label><strong> &nbsp; <? print ajou_famille; ?> </strong></label>
									<!-- nom_famille -->
									<div align="left" class="form_elemnt"><input placeholder ="Name" name="Name" type="text" class="field size1 input2" id="Name" style="width:190px;"> </div>
									<!-- end_nom_famille -->
									<!-- famille_option -->
									<div align="left" class="form_elemnt" style="">
									<input name="Cache" type="checkbox" id="Cache" value="1">
									  <? print cacher_famille; ?>
									  <!-- ling change for list 13/01/2014  -->
									  <input name="famille_list" type="checkbox" id="famille_list" value="1" >
									  <? print famille_list; ?>
									</div>
									<!-- end famille_option -->
									 
									 <!-- input_ajouter1 -->
									  <div colspan="2" align="left" class="form_elemnt" style="">
										  <input name="Submit" type="submit" id="sub_ajout" class="submitcss" value="<? print Ajouter; ?>"/>
										  <input name="action" type="hidden" id="action" class="submitcss" value="<? print Ajouter; ?>">
										  <input name="mode" type="hidden" id="mode" value="menutype550">
									  </div>	
									  <!-- input_ajouter1 -->
								  </div>
								 
								  
							  </form>
						  </div>
						  <!-- end form1 -->
						  
						   <!-- form2 -->				
							<!--  <div  align="left" valign="top" style="float:left; width=50%;">
							  <form name="form2" class="form2" method="post" action="savefamille.php">
								<div width="100%" border="0" align="left" cellpadding="0" cellspacing="2">
								  
									<label><strong><? print ajouter_sous_famille; ?> </strong></label>
									<!-- sous_famille_type -->
								<!--	<div class="">
										<div align="left" class="form_elemnt2"><? print pour_famille;?></div>
										<div align="left" class="form_elemnt2">
											<select class="field" name="MenuTypeID"  id="MenuTypeID">
												<?	
												   $sql="select * from $tb_famille where `RestoID`='$RestoID' order by SortID";	
												   $result=mysql_query($sql);
													while($data=mysql_fetch_array($result))
													{
													echo "<option value='".$data['MenuTypeID']."'";
													if ($data['MenuTypeID']==$MenuTypeID || $data['MenuTypeID']==$exMenuTypeID) {echo " selected"; }
													echo ">".htmlspecialchars($data['MenuTypeName'])."</option>";
													} 
												?>                                                                                                                
											</select>
										 </div>
									 </div>
									 <!-- end sous_famille_type -->
								  
								  <!-- sous_famille_nom -->
								<!--  <div class="form_elemnt2">
									<div align="left" >							
									<div align="left" ><? print nom;?> </div>
									<div align="left" ><input name="Name" type="text" class="field size1 input2" style="width:190px; margin-top:10px; margin-bottom:10px;" id="Name"></div>
									<input name="famille_list" type="checkbox" id="famille_list" value="1">
									  <? print famille_list; ?>
									</div>
									<!-- ling change for list 13/01/2014  -->	
							<!--	  </div> -->
								  <!-- end sous_famille_nom -->
								  
								  <!-- input_ajouter2 -->
								<!--  <div class="form_elemnt2">
									<div colspan="2" align="left">
										<input name="Submit" type="submit" class="submitcss" style="float:left;" value="<? print Ajouter; ?>">
									  <input name="action" type="hidden" id="action" value="<? print Ajouter; ?>"></div>
								  </div>
								  <!-- end input_ajouter2 -->
							<!--	</div>
							  </form>
							<!--  <? } else {
									if ($mode=="menutype550") {$champ="MenuTypeID";}
									else {$champ="SousFamilleID";}  
									$sql="select * from ".$mode." where `RestoID`='$RestoID' && ".$champ."='".$ID."' order by SortID ";	
									$result=mysql_query($sql) OR die($sql);
									while($data=mysql_fetch_array($result)){
											$MenuTypeID=$data['MenuTypeID'];
											$Name=htmlspecialchars($data['MenuTypeName']);	
											$Cache=$data['Cache'];	
									}
									//ling change for list 13/01/2014
									$famille_list = 0;
									$sql2 = "select * from famille_list where famille_id = ".$ID." or sous_famille_id = ".$ID;
									$result2=mysql_query($sql2) OR die($sql2);
									while($data2=mysql_fetch_array($result2)){
										$famille_list = 1;
									}
							  ?> 
							  </div> 
							  <!-- end form2 -->
							  
							  <!-- form3 -->
							  <div align="left" valign="top" style="margin-left:50px;">
							  <form name="form3" class="form3" method="post" action="savefamille.php">
								  <div width="60%" border="0" align="left" cellpadding="0" cellspacing="2">
									<label><strong> &nbsp; <? print modifier_une; ?><? if ($mode=="sous_famille") { ?> <? print sous; ?><? } ?> <? print text_famille; ?> </strong></label>
									
								   <? if ($mode=="sous_famille") { ?> 
								   <div class="form_elemnt" style="width:500px; ">
									  <div align="left"><? print pour_famille;?></div>
									  <div align="left"><select name="MenuTypeID" class="input2" id="MenuTypeID">
										  <? $sql="select * from $tb_famille where `RestoID`='$RestoID' order by SortID";	
										   $result=mysql_query($sql);
											while($data=mysql_fetch_array($result)){
											echo "<option value='".$data['MenuTypeID']."'";
											if ($data['MenuTypeID']==$MenuTypeID || $data['MenuTypeID']==$exMenuTypeID) {echo " selected"; }
											echo ">".htmlspecialchars($data['MenuTypeName'])."</option>";
											} ?>
										</select>                      
									  </div>
								   </div><? } ?>
						
									<div class="form_elemnt" style="width:500px;">
									  <!-- <div align="left"><? print nom; ?></div> -->
									  <div align="left">
									  <input name="Name" type="text" class="field size1 input2" id="Name" style="width:190px;" value="<? echo $Name; ?>">
									  </div>
									</div>
									
									<div class="form_elemnt" style="">
										<div>
										<input name="Cache" type="checkbox" id="Cache" value="1"<? if ($Cache==1) {echo " checked"; }?>>
										<? print cacher_famille;?>
										
										<input name="famille_list" type="checkbox" id="famille_list" style="margin-left:20px;" value="1"<? if ($famille_list==1) {echo " checked"; }?>>
										  <? print famille_list; ?>
										</div>
									</div>
									<div class="form_elemnt">
									  <div colspan="2" align="center" style="float:left;">
										<input name="Submit2" type="submit" class="submitcss" value="<? print Modifer; ?>" onClick="return ConfirmModif();">
										<input name="action" type="hidden" id="action" value="<? print Modifer; ?>">
										<input name="ID" type="hidden" id="ID" value="<? echo $ID; ?>">
										<input name="mode" type="hidden" id="mode" value="<? echo $mode; ?>">
									  </div>
									  <div colspan="2" align="center" style="float:left;"><input src="adminfamille.php" type="submit" class="submitcss" value="<? print Retour; ?>"/></div>
									</div>
								  </div>
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
					<div class="box" style=" overflow:auto; padding-bottom:20px; width:885px;">
					<!-- Box Head -->
					<div class="box-head" id="tt_list" style="padding:10px;">
						<h2  class="left"><strong><? print listing_menus; ?> </strong></h2>
						<div align="center" class="right" style="padding-left:0px;">
						<!-- info_photo -->
						<div colspan="2" align="center"><? if ($photo=="ok") {echo "<br /><strong>La photo a bien &eacute;t&eacute; ajout&eacute; pour la famille.</strong><br />";} 
						  elseif ($photo=="del") {echo "<br /><strong>Les photos ont bien &eacute;t&eacute; supprim&eacute;e</strong><br />";}  ?></td>
						</div>		
						<!-- end  info_photo -->
						
						<!-- table bottom -->
						<table align="center" border="0" cellspacing="0" cellpadding="0" style="width:100%; margin-left:20px; margin-top:20px;">
						<tr>
						  <td width="100%" rowspan="2" align="center" valign="top">
						  <div class="listing2" style="overflow-y: auto;height: 200px;">
							  <table>
								
							  </table>
							  <table class="zoneListing" >
								<tr>
								  <td width="176" class="rubriqueListing"><? print Famille; ?></td>
								  <td width="50" class="rubriqueListing"><? print Modifier; ?></td>
								  <td width="57" class="rubriqueListing"><? print Supprimer; ?></td>
								  <td width="38" class="rubriqueListing"><? print Up; ?></td>
								  <td width="38" class="rubriqueListing"><!-- Photo--></td>
								</tr>
								<?php 
									$sql="select * from $tb_famille where `RestoID`='$RestoID'&&`Type_passe`=0 order by `Cache`,`SortID`";			  
									$result=mysql_query($sql);
									While($myrow=mysql_fetch_array($result)){
								?>
								<tr>
								  <td class="elementListing"><?php print(htmlspecialchars($myrow[MenuTypeName])); if ($myrow[Cache]==1) {echo "&nbsp;(cach&eacute;e)"; }?></td>
								  <td class="elementListing"><a href="adminfamille.php?ID=<?php print($myrow[MenuTypeID]);?>&mode=menutype550&act=modifier"><img src="images/edit.png" width="16" height="16" border="0"><?php print m_edit;?></a> </td>
								  <td class="elementListing"><a href="delfamille.php?MenuTypeID=<?php print($myrow[MenuTypeID]);?>" onClick="return ConfirmDel();"><img src="images/delete.png" width="16" height="16" border="0"><?php print m_del;?></a> </td>
								  <td class="elementListing"><? if ($myrow[Cache]!=1) { ?>
								  <a href="sortfamille.php?action=UP&MenuTypeID=<?=$myrow[MenuTypeID];?>"><img src="images/up.gif" width="13" height="13" border="0"></a>
								<? } else {?>
								&nbsp;
								<? } ?></td>
								<? $sql3="select * from  sous_famille where `RestoID`='$RestoID' && MenuTypeID='$myrow[MenuTypeID]' order by `SortID`";	
								   $result3=mysql_query($sql3);
									unset($sf);
									while($myrow3=mysql_fetch_array($result3))
									{
									$sf=1; 
									} ?>
								  <td class="elementListing"></td>
								</tr>
								<? $sql2="select * from  sous_famille where `RestoID`='".$RestoID."' && MenuTypeID='".$myrow[MenuTypeID]."' order by SortID";	
								   $result2=mysql_query($sql2);
									While($myrow2=mysql_fetch_array($result2)){ 
								?>
								  <tr>
								  <td align="right" class="elementListingSousF"><div align="right">&rArr; <em><?php print(htmlspecialchars($myrow2[Name]));?></em></div></td>
								  <td class="elementListingSousF"><a href="adminfamille.php?ID=<?php print($myrow2[SousFamilleID]);?>&mode=sous_famille&act=modifier"><img src="images/edit.png" width="16" height="16" border="0"><?php print m_edit;?></a> </td>
								  <td class="elementListingSousF"><a href="delfamille.php?SousFamilleID=<?php print($myrow2[SousFamilleID]);?>" onClick="return ConfirmDel();"><img src="images/delete.png" width="16" height="16" border="0"><?php print m_del;?></a> </td>
								  <td class="elementListingSousF">&nbsp;</td>
								  <td class="elementListingSousF">
									<!--<span class="elementListing"><a href="photo_sous_famille.php?SousFamilleID=<?php print($myrow2[SousFamilleID]);?>"><img src="images/appareil_photo.gif" width="16" height="16" border="0"></a></span>--></td>
								</tr>
								<? } 
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