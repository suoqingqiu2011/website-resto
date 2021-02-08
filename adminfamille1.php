<?
	//ajouter by liu pour changer language begin
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	//end
	include_once("../include/config.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];
?>

<html>
<head>
	<title><? print t_Gestion_Familles; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script language="javascript" type="text/javascript" src="js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
	</style>
	<script language="JavaScript" type="text/JavaScript">
		function ConfirmDel(){  
		//ajouter by liu pour changer la language 17/05/2010
		var alert1= "<? print alter_adminfamille_su; ?>";
		if(!confirm(alert1)){
			return (false);	
		}else 
			return true;
		}
	</SCRIPT>
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
    <td>
	  <table border="0" cellspacing="0" cellpadding="0" width="107%" bgcolor="#FFA54F">
      <tr>
        <td valign="top" colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="left">
		 <table width="222" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="28" >&nbsp;</td>
              <td width="178" ><span class="header2"><? print t_Gestion_Familles; ?></span></td>
              <td width="16">&nbsp;</td>
            </tr>
          </table>
	    </td>
      </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td colspan="2" valign="top" bgcolor="#FFA54F">&nbsp;</td>
      </tr>
      <tr>
        <td width="17" valign="top"><font size="1">&nbsp;</font></td>
        <td colspan="2" valign="top" bgcolor="#FFA54F">
		<table width="100%" height="291"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
		  	            
            <td width="100%" align="center" valign="top">
			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" align="center"><? if ($photo=="ok") {echo "<br /><strong>La photo a bien &eacute;t&eacute; ajout&eacute; pour la famille.</strong><br />";} 
				  elseif ($photo=="del") {echo "<br /><strong>Les photos ont bien &eacute;t&eacute; supprim&eacute;e</strong><br />";}  ?></td>
                </tr>
                <tr>
                  <td width="50%" rowspan="2" align="center" valign="top"><div class="listing2">
                      <div class="titreListing"> <? print listing_familles; ?></div>
                    <br>
                      <table class="zoneListing">
                        <tr>
                          <td width="176" class="rubriqueListing"><? print Famille; ?></td>
                          <td width="50" class="rubriqueListing"><? print Modifier; ?></td>
                          <td width="57" class="rubriqueListing"><? print Supprimer; ?></td>
                          <td width="38" class="rubriqueListing"><? print Up; ?></td>
                          <td width="38" class="rubriqueListing"><!-- Photo--></td>
                        </tr>
                        <?php 
                        	$sql="select * from $tb_famille where `RestoID`='$RestoID' order by `Cache`,`SortID`";			  
						    $result=mysql_query($sql);
						   	While($myrow=mysql_fetch_array($result)){
                        ?>
                        <tr>
                          <td class="elementListing"><?php print(htmlspecialchars($myrow[MenuTypeName])); if ($myrow[Cache]==1) {echo "&nbsp;(cach&eacute;e)"; }?></td>
                          <td class="elementListing"><a href="adminfamille.php?ID=<?php print($myrow[MenuTypeID]);?>&mode=menutype550&act=modifier"><img src="images/edit.png" width="16" height="16" border="0"></a> </td>
                          <td class="elementListing"><a href="delfamille.php?MenuTypeID=<?php print($myrow[MenuTypeID]);?>" onClick="return ConfirmDel();"><img src="images/delete.png" width="16" height="16" border="0"></a> </td>
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
                          <td class="elementListingSousF"><a href="adminfamille.php?ID=<?php print($myrow2[SousFamilleID]);?>&mode=sous_famille&act=modifier"><img src="images/edit.png" width="16" height="16" border="0"></a> </td>
                          <td class="elementListingSousF"><a href="delfamille.php?SousFamilleID=<?php print($myrow2[SousFamilleID]);?>" onClick="return ConfirmDel();"><img src="images/delete.png" width="16" height="16" border="0"></a> </td>
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
                  <td width="50%" align="left" valign="top"><? if ($act!='modifier') { ?>
				  <form name="form1" method="post" action="savefamille.php">
                    <table width="50%" border="0" align="left" cellpadding="0" cellspacing="2">
                      <tr>
                        <td colspan="2" align="center"><strong><? print ajou_famille; ?> </strong></td>
                      </tr>
                      <tr>
                        <td align="center"><? print nom; ?>                          </td>
                        <td align="center"><input name="Name" type="text" class="input" id="Name"> <input name="Cache" type="checkbox" id="Cache" value="1">
                          <? print cacher_famille; ?>
                          <!-- ling change for list 13/01/2014  -->
                          <input name="famille_list" type="checkbox" id="famille_list" value="1">
                          <? print famille_list; ?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center"><input name="Submit" type="submit" class="submitcss" value="<? print Ajouter; ?>">
                          <input name="action" type="hidden" id="action" value="<? print Ajouter; ?>">
                          <input name="mode" type="hidden" id="mode" value="menutype550"></td>
                      </tr>
                    </table>
                  </form></td>
                </tr>
                <tr>
                  <td align="left" valign="top"><form name="form2" method="post" action="savefamille.php">
                    <table width="50%" border="0" align="left" cellpadding="0" cellspacing="2">
                      <tr>
                        <td colspan="2" align="center"><strong><? print ajouter_sous_famille; ?> </strong></td>
                      </tr>
                      <tr>
                        <td align="center"><? print pour_famille;?></td>
                        <td align="center">
							<select name="MenuTypeID" class="input2" id="MenuTypeID">
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
                         </td>
                      </tr>
                      <tr>
                        <td align="center"><? print nom;?>                           </td>
                        <td align="center"><input name="Name" type="text" class="input" id="Name"></td>
                        <!-- ling change for list 13/01/2014  -->
                        <td align="center"><input name="famille_list" type="checkbox" id="famille_list" value="1">
                          <? print famille_list; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center"><input name="Submit" type="submit" class="submitcss" value="<? print Ajouter; ?>">
                          <input name="action" type="hidden" id="action" value="<? print Ajouter; ?>"></td>
                      </tr>
                    </table>
                  </form>
				  <? } else {
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
                  <form name="form3" method="post" action="savefamille.php">
				  <table width="60%" border="0" align="left" cellpadding="0" cellspacing="2">
                    <tr>
                      <td colspan="2" align="center"><strong><? print modifier_une; ?><? if ($mode=="sous_famille") { ?> <? print sous; ?><? } ?> <? print text_famille; ?> </strong></td>
                    </tr>
                   <? if ($mode=="sous_famille") { ?> <tr>
                      <td align="center"><? print pour_famille;?></td>
                      <td align="center"><select name="MenuTypeID" class="input2" id="MenuTypeID">
                          <? $sql="select * from $tb_famille where `RestoID`='$RestoID' order by SortID";	
						   $result=mysql_query($sql);
						   	while($data=mysql_fetch_array($result)){
							echo "<option value='".$data['MenuTypeID']."'";
							if ($data['MenuTypeID']==$MenuTypeID || $data['MenuTypeID']==$exMenuTypeID) {echo " selected"; }
							echo ">".htmlspecialchars($data['MenuTypeName'])."</option>";
							} ?>
                        </select>                      </td>
                    </tr><? } ?>
                    <tr>
                      <td align="center"><? print nom; ?></td>
                      <td align="center"><input name="Name" type="text" class="input" id="Name" value="<? echo $Name; ?>">
                        <input name="Cache" type="checkbox" id="Cache" value="1"<? if ($Cache==1) {echo " checked"; }?>>
                        <? print cacher_famille;?>
						<!-- ling change for list 13/01/2014  -->
						<input name="famille_list" type="checkbox" id="famille_list" value="1"<? if ($famille_list==1) {echo " checked"; }?>>
                          <? print famille_list; ?>
					  </td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center"><input name="Submit2" type="submit" class="submitcss" value="<? print Modifer; ?>">
                        <input name="action" type="hidden" id="action" value="<? print Modifer; ?>">
                        <input name="ID" type="hidden" id="ID" value="<? echo $ID; ?>">
                        <input name="mode" type="hidden" id="mode" value="<? echo $mode; ?>"></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center"><a href="adminfamille.php"><? print Annuler; ?></a></td>
                    </tr>
                  </table></form>
                  <? } ?></td>
                </tr>
            </table></td>
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
