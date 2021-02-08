						<tr>
						<!-- form1 -->
						<td width="50%" align="left" valign="top"><? if ($act!='modifier') { ?>
						  <form name="form1" method="post" action="savefamille.php">
							<table width="50%" border="0" align="left" cellpadding="0" cellspacing="2">
							  <tr>
								<td colspan="2" align="center"><strong><? print ajou_famille; ?> </strong></td>
							  </tr>
							  <tr>
								<td align="center"><? print nom; ?></td>
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
						  </form>
						  </td>
						  </tr>
						  <!-- end form1 -->
						  
						  <!-- form2 -->
						<tr>
						  <td align="left" valign="top">
						  <form name="form2" method="post" action="savefamille.php">
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
								</select>                      
								</td>
							</tr><? } ?>
							
							
							<tr>
							  <td align="center"><? print nom; ?></td>
							  <td align="center"><input name="Name" type="text" class="input" id="Name" value="<? echo $Name; ?>">
								<input name="Cache" type="checkbox" id="Cache" value="1"<? if ($Cache==1) {echo " checked"; }?>>
								<? print cacher_famille;?>
								
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
						  </table>
						  </form>
						  <? } ?></td>
						</tr>