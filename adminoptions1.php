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

<html>
	<head>
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
		<title><? print t_option_gestion; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
	<table border="0"  align="left" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" height="20px"><?php include ("top.php"); ?></td>
	</tr>
	<tr>
	<td valign="top" width="90%" bgcolor="#FFA54F">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#FFA54F">
		  <tr>
			<td valign="top" colspan="3">&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan="3" align="left"><table width="222" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td width="28" bgcolor="#FFA54F">&nbsp;</td>
				  <td width="178" bgcolor="#FFA54F"><span class="header2"><? print t_option_gestion; ?> </span></td>
				  <td width="16">&nbsp;</td>
				</tr>
			</table></td>
		  </tr>
		  <tr>
			<td valign="top">&nbsp;</td>
			<td colspan="2" valign="top" bgcolor="#FFA54F">&nbsp;</td>
		  </tr>
		  <tr>
			<td width="17" valign="top"><font size="1">&nbsp;</font></td>
			<td colspan="2" valign="top" bgcolor="#FFA54F"><table width="100%" height="291"  border="0" align="center" cellpadding="0" cellspacing="0">
			  <tr>
				<td align="center" valign="top"><table width="99%"  border="0" cellspacing="0" cellpadding="0">
					<tr>
					  <td colspan="2">&nbsp;</td>
					</tr>
					<tr>
					  <td width="50%" align="center"><div class="listing2">
						  <div class="titreListing"><? print op_pour; ?><? echo $Name; ?></div><br>
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
							  <td class="elementListing"><a href="adminoptions.php?MenuID=<? echo $MenuID ?>&optionmenuid=<? echo $myrow['OptionMenuID']; ?>&mode=options&act=modifier"><img src="images/edit.png" width="16" height="16" border="0"></a> </td>
							  <td class="elementListing"><a href="deloptions.php?MenuID=<? echo $MenuID ?>&optionmenuid=<? echo $myrow['OptionMenuID']; ?>" onClick="return ConfirmDelOption();"><img src="images/delete.png" width="16" height="16" border="0"></a> </td>
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
						  <p>&nbsp;</p>
					  </div></td>
					  <td width="50%" align="center" valign="top">
					  <? if ($act!="modifier") { ?>
					    <form name="form1" method="post" action="saveoptions.php">
						<table width="50%" border="0" cellspacing="2" cellpadding="0">
						<tr>
						  <td colspan="2"><div align="center"><strong><? print option_ajouter_op; ?> </strong></div></td>
						  </tr>
						<tr>
						  <td><? print option_nom; ?></td>
						  <td>
							<input name="name" type="text" class="input2" id="name">
							<input name="MenuID" type="hidden" id="MenuID" value="<? echo $MenuID; ?>">
							<input name="action" type="hidden" id="action" value="newOption"></td>
						</tr>
						<tr>
						  <td colspan="2" align="center"><input name="Submit" type="submit" class="submitcss" value="<? print Ajouter; ?>"></td>
						</tr>
					  </table>
					  </form><br><br>
					  <form name="form1" method="post" action="saveoptions.php">
					  <table width="50%" border="0" cellspacing="2" cellpadding="0">
						<tr>
						  <td colspan="2"><div align="center"><strong><? print option_choix; ?> </strong></div></td>
						  </tr>
						<tr>
						  <td align="left"><? print option_op; ?> </td>
						  <td>
						  <select name="OptionMenuID" class="input2" id="OptionMenuID">
						  <? $sql="select * from options_menu where `RestoID`='$RestoID' && MenuID='".$MenuID."'";					  
							   $result=mysql_query($sql);
							   While($myrow=mysql_fetch_array($result)){
							     echo "<option value='".$myrow['OptionMenuID']."'>".$myrow['Name']."</option>";	
							   } 
						  ?>	
						  </select>                      
						  </td>
						</tr>
						<tr class="zoneFormulaire">
						  <td colspan="2" align="center"><input name="button"  type="button" class="submitcss" onClick="window.open('choix_element.php?MenuID=<? echo $MenuID; ?>','choix','menubar=no, status=no, scrollbars=auto, menubar=no, width=450, height=500');" value="<? print option_element_ajou; ?>"></td>
						  </tr>		
						<tr>
						  <td align="left"><? print option_choisi; ?></td>
						  <td align="left"><span id="ecrire_choix"></span></td>
						</tr>
						<tr>
						  <td align="left"><? print option_supp_prix; ?> </td>
						  <td align="left"><input name="prix" type="text" class="input2" id="prix" value="0" size="5"></td>
						</tr>
						<tr>
						  <td colspan="2" align="center"><input name="Submit" type="submit" class="submitcss" value="<? print Ajouter; ?>">
							<input name="action" type="hidden" id="action" value="newChoix">
							<input name="MenuID" type="hidden" id="MenuID" value="<? echo $MenuID; ?>">
							<input name="ChoixMenuID" type="hidden" id="ChoixMenuID"></td>
						  </tr>
					  </table>
					  </form><? } elseif ($act=="modifier" && $mode=="options") {?>
					  <form name="form1" method="post" action="saveoptions.php">
					  <table width="50%" border="0" cellspacing="2" cellpadding="0">
						<tr>
						  <td colspan="2"><div align="center"><strong><? print option_modi; ?> </strong></div></td>
						  </tr>
						<?
						$sql="select * from options_menu where `RestoID`='$RestoID' && OptionMenuID='".$optionmenuid."'";	
							$result=mysql_query($sql);
							while($myrow=mysql_fetch_array($result)){
									$name=$myrow['Name'];
							}
						?>
						<tr>
						  <td><? print option_nom_option; ?></td>
						  <td>
							<input name="name" type="text" class="input2" id="name" value="<? echo $name; ?>">
							<input name="MenuID" type="hidden" id="MenuID" value="<? echo $MenuID; ?>">
							<input name="action" type="hidden" id="action" value="modifOption">
							<input name="optionmenuid" type="hidden" id="optionmenuid" value="<? echo $optionmenuid; ?>"></td>
						</tr>
						<tr>
						  <td colspan="2" align="center"><input name="Submit" type="submit" class="submitcss" value="<? print Modifier; ?>"></td>
						  </tr>
					  </table>
					  </form>  
				   <? } elseif ($act=="modifier" && $mode=="choix" ){ ?><form name="form1" method="post" action="saveoptions.php"><table width="50%" border="0" cellspacing="2" cellpadding="0">
						<tr>
						  <td colspan="2"><div align="center"><strong><? print option_modi_choix; ?> </strong></div></td>
						  </tr>
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
						<tr>
						  <td align="left"><? print option_op; ?> </td>
						  <td>
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
						  </td>
						</tr>
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
				   <? } ?></td>		  
					</tr>
				</table>
				  </td>
				</tr>
			</table></td>
		  </tr>
		  <tr>
			<td valign="top">&nbsp;</td>
			<td colspan="2" align="center" bgcolor="#FFA54F">&nbsp;</td>
		  </tr>
		  <tr>
			<td valign="top" colspan="3">&nbsp;</td>
		  </tr>
		</table></td>
	  </tr>
	</table>
	</td></tr>
	<tr>
		<td colspan="2"><?php include ("bottom.php"); ?></td>
	</tr>
	</table>

   </body>
</html>
