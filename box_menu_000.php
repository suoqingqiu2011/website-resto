<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?
	//ajouter pour change language by liu
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	//end
	include_once("../include/config.php");
	include_once("../include/config_perso.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];

	if ($FamilleID=="") {
		$str2="select * from $tb_famille where RestoID='$RestoID' ORDER BY SortID LIMIT 1";
		$res2=mysql_query($str2);
		while($aff2=mysql_fetch_array($res2)) {
			$FamilleID=$aff2['MenuTypeID'];		
		}
	}
	/*$str2="select * from sous_famille where RestoID='$RestoID' && MenuTypeID=$FamilleID";
		$res2=mysql_query($str2);
		while($aff2=mysql_fetch_array($res2)) {
			$sous_famille_presentes=1;
		}*/
?>


<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	
	<title><? print t_Gestion_Menus; ?></title>
	<link rel="stylesheet" href="css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css1/component.css" />
	<link rel="stylesheet" type="text/css" href="css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="css1/style1.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script language="javascript">
		function writediv(texte){
			 document.getElementById('affichage_sous_menu').innerHTML = texte;
			 /*var oDiv = document.getElementById('affichage_sous_menu');
			 oDiv.innerHTML = texte;
			 var texte="<html><style>#affichage_sous_menu{width:155px; height:15px;}</style></html>"*/
		}
		function affichage_sous_menu() {
			if(texte = file('affichage_sous_menu.php?restoID=<? echo $RestoID; ?>&MenuTypeID='+escape(document.getElementById('deroulant_familleID').value)+'&sousfamilleID=<? echo $SousFamilleID; ?>')){
			writediv(texte);
			}
		}	
		function file(fichier){
			 if(window.XMLHttpRequest) // FIREFOX
				  xhr_object = new XMLHttpRequest();
			 else if(window.ActiveXObject) // IE
				  xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
			 else
				  return(false);
			 xhr_object.open("GET", fichier, false);
			 xhr_object.send(null);
			 if(xhr_object.readyState == 4) 
				 return(xhr_object.responseText);
			 else return(false);
		} 
		</script>
		

	<script language="JavaScript" type="text/JavaScript">
	
	function ConfirmDel(){
		//ajouter by liu pour changer la language
		var alert_menu= "<? print alter_adminmenu_su; ?>";
		if(!confirm(alert_menu)){
			return (false);	
		}else 
			return true;
	}
	function ConfirmImage(){
		//ajouter by liu pour changer la language
		var alert_image= "<? print alter_adminmenu_image; ?>";
		if(!confirm(alert_image)){
			return (false);	
		}else 
			return true;
	}
	function isNumber(oNum){
	  if(!oNum) return false;
	  var strP=/^\d+(\.\d+)?$/;
	  if(!strP.test(oNum)) 
		return false;
	  try{
		if(parseFloat(oNum)!=oNum) return false;
	  }
	  catch(ex){
		return false;
	  }  
	  return true;
	}
	function check()
	{
	  //ajouter pour changer language by liu 15/05/2010
	  var alert1= "<? print alert_ch_famille; ?>";
	  var alert2= "<? print alert_rem_code; ?>";
	  var alert3= "<? print alert_reserver; ?>";
	  var alert4= "<? print alert_fdelite; ?>";
	  var alert5= "<? print alert_remplisser_nom; ?>";
	  var alert6= "<? print alert_remise; ?>";
	  var alert7= "<? print alert_rem_prix; ?>";
	  var alert8= "<? print alert_valeur_prix; ?>";
	  
	  
	  if (form1.FamilleID.value=="") { //change Faille a FalilleID. si non check() marche pas
		alert(alert1);
		form1.FamilleID.focus();		
			return (false);
		}
		else if (form1.Code.value=="") {
		alert(alert2);
		form1.Code.focus();		
			return (false);
		}
		else if (form1.Code.value=="0") {
		alert(alert3);
		form1.Code.focus();		
			return (false);
		}
		else if (form1.Code.value=="FIDELITE") {
		alert(alert4);
		form1.Code.focus();		
			return (false);
		}
		else if (form1.Name.value=="") {
		alert(alert5);
		form1.Name.focus();		
			return (false);
		}
		else if (form1.Remise.value=="") {
		alert(alert6);
		form1.Remise.focus();		
			return (false);
		}
		/*else if (form1.Prix.value=="") {
		alert(alert7);
		form1.Prix.focus();		
			return (false);
		}
		else if(!isNumber(form1.Prix.value))
		{
		alert(alert8);
		form1.Prix.focus();		
			return (false);
		}	*/
		else if (document.getElementById("Prix1").value=="") {
		alert(alert7);
		document.getElementById("Prix1").focus();		
			return (false);
		}
		else if(!isNumber(document.getElementById("Prix1").value))
		{
		alert(alert8);
		document.getElementById("Prix1").focus();		
			return (false);
		}
		else
			return true;
	}
	</script>
	
	
	<script language="javascript">
	    var checkValue=$("#Prix").val();
		if(checkValue==0){
			alert("test ook");
		else{
			alert("test kkkk");			
		}		
	</script>
	
	<script type="text/javascript">
		function aCheck1(){
		document.getElementById("span1").style.display="block";
		document.getElementById("span2").style.display="none";
		document.getElementById("Prix1").disabled=false ;
		document.getElementById("Prix2").disabled=true ;
		document.getElementById("Prix2").readOnly=false;
		
		var printItems1=document.querySelectorAll('.printer_oui');
		for(var i=0;i<printItems1.length;i++){
			printItems1[i].disabled=false;
		}
		
		var printItems2=document.querySelectorAll('.printer_non');
		for(var i=0;i<printItems2.length;i++){
			printItems2[i].disabled=true;
		}
				
		}
		
		function bCheck2(){ 
		document.getElementById("span1").style.display="none";  
		document.getElementById("span2").style.display="block";	
		document.getElementById("Prix1").disabled=true ;
		document.getElementById("Prix1").value="0" ;
		document.getElementById("Prix2").readOnly=true ;
		
		var printItems1=document.querySelectorAll('.printer_oui');
		for(var i=0;i<printItems1.length;i++){
			printItems1[i].disabled=true;
		}
		
		var printItems2=document.querySelectorAll('.printer_non');
		for(var i=0;i<printItems2.length;i++){
			printItems2[i].disabled=false;
		}
	
		}
		
		
	</script>
		
</head>

<!-- container-->
<div id="container">
<!-- contain menu -->
<div class="shell_top">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<div class="small_titre" ><a href="adminmenu.php" style="color:#fff;"><? print m_menus; ?></a>
			<span>&gt;</span>
			<a href="adminmenu.php" style="color:#fff;"><? print m_gestion_menu; ?></a></div>
		</div>
		<!-- end Small Nav -->
	
		<!-- Main -->
		<div id="main" style="text-a">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
			<!-- box-top -->
				<div class="box" >
					<div class="box-head" style="width:888px;">
						<h2><strong><? print listing_menus; ?> </strong> <span style="font-size=5px;"><? print champ_obli; ?></span></h2>
					</div>
			<!-- Sidebar -->
			<div id="sidebar" >
				
				<!-- Box -->
				<div class="box" style="padding-bottom:20px;">
					<!-- box_info -->
					<div name="box_info" class="box-content" style="overflow:auto; ">	
						
						<!-- Sort -->
						<div class="sort" >
						
						<form name="form1" action="savemenu.php" method="post" enctype="multipart/form-data" onSubmit="return check();"  >
								<!-- zoneFormulaire-->
								<div class="zoneFormulaire" style="overflow:auto; " align="center">
								<div align="center" style="padding-left:70px;">
								<div align="left" valign="top" style="float:left;  width:33%;">
											<?
											 $str2="select * from $tb_menu where `MenuID`='$MenuID'"; 
											 $res2=mysql_query($str2);
											 $row2=mysql_fetch_array($res2);
											 $ph="../".$url_img.$row2['Image'];		   
											?>
										<label ><? print text_famille; ?></label>
										<select class="field" name="FamilleID" id="deroulant_familleID" onChange="affichage_sous_menu()" style="width:162px;">
											  <? $str2="select * from $tb_famille where RestoID='$RestoID' ORDER BY SortID";
														$res2=mysql_query($str2);
														while($aff2=mysql_fetch_array($res2)) { 
											  ?>
												<option value="<?=$aff2[MenuTypeID];?>" <? if($aff2[MenuTypeID] == $row2[MenuTypeID]||$aff2[MenuTypeID] == $FamilleID) echo "selected";?>><?=$aff2[MenuTypeName];?></option><? } ?>					
										</select>
										
										  
										<label ><? print code; ?><span class="STYLE9">*</span></label>
										<input name="Code" type="text" class="field input2" id="Code" value="<?=$row2[MenuCode];?>" maxlength="8" onKeypress="if( (event.keyCode < 47) || ((event.keyCode > 57) && (event.keyCode <65))  || ((event.keyCode > 90) && (event.keyCode <97)) || (event.keyCode > 122)) event.returnValue=false"><!--modifier by liu pour firefox-->
										  															
									  
										<label><? print Designation; ?><span class="STYLE9">*</span></label>
									
									    <input name="Name" type="text" class="field input2" id="Name" value="<?=htmlspecialchars($row2[MenuName]);?>">
																    
								</div>
								<div name="middlepart" align="left" valign="top" style="float:left;  width:33%;">
								  <label><? print text_prix; ?></label>     				 
																		
											<label><input name="choix_imprimnt" type="radio" id="choix_imprimnt1" value="1" onclick="aCheck1();" <? if($row2[MenuPrixPlace]>0&&$row2[MenuPrixPlace]!="") echo "checked"; ?>/><? echo oui; ?></label>
											<label><input name="choix_imprimnt" type="radio" id="choix_imprimnt2" value="0" onclick="bCheck2();" <? if($row2[MenuPrixPlace]==0&&$row2[MenuPrixPlace]!="") echo "checked"; ?>/><? echo non; ?></label>						  
										
										<div style="border: 1px solid #8E8E8E; margin-top: 10px; border-radius: 5px; padding: 5px; width: 180px; height: 130px;">
											
											 <div id="span1" name="span1" style="<? if($row2[MenuPrixPlace]>0){ echo "display:block;"; }if($row2[MenuPrixPlace]==0||$row2[MenuPrixPlace]==""){ echo "display:none;" ;}?>">
												
												<span class="STYLE9" style="float:left; margin-right:3px;">*</span>
												<input name="Prix" type="text" class="field input2" id="Prix1" value="<?=htmlspecialchars($row2[MenuPrixPlace]);?>" />
												<? /*echo "<script>if(form1.Prix.value!='') document.write(form1.Prix.value);</script>";*/ ?>
												 <br/>
												 <p>   
													<label> <input name="printer1" type="checkbox" id="printer1" class="printer_oui" value="1" onclick="return false;" checked="checked"/>  <? print imprimant1; ?>   </label>
													<label> <input name="printer2" type="checkbox" id="printer2" class="printer_oui" value="1" <? if($row2[Printer2]==1) echo "checked"; ?>/>  <? print imprimant2; ?>   </label>
													<label> <input name="printer3" type="checkbox" id="printer3" class="printer_oui" value="1" <? if($row2[Printer3]==1) echo "checked"; ?>/>  <? print imprimant3; ?>   </label>
													<label> <input name="printer4" type="checkbox" id="printer4" class="printer_oui" value="1" <? if($row2[Printer4]==1) echo "checked"; ?>/>  <? print imprimant4; ?>   </label>
										         </p>
											 </div>
											
								 
											  <div id="span2" name="span2" style="<? if($row2[MenuPrixPlace]==0){ echo "display:block;"; }if($row2[MenuPrixPlace]>0||$row2[MenuPrixPlace]==""){ echo "display:none;"; }?>">
											  
												 <input name="Prix" type="text" class="field input2" id="Prix2" value="0" />
												 <? /*echo "<script>if(document.getElementById('Prix2').value!='') document.write(document.getElementById('Prix2').value);</script>";*/ ?>
												 <br/>
												 <p>										    
													<label> <input name="printer2" type="checkbox" id="printer21" class="printer_non" value="1"   <? if($row2[Printer2]==1) echo "checked";?>/>  <? print imprimant2; ?>    </label> 
													<label> <input name="printer3" type="checkbox" id="printer31" class="printer_non" value="1"   <? if($row2[Printer3]==1) echo "checked";?>/>  <? print imprimant3; ?>  </label>
													<label> <input name="printer4" type="checkbox" id="printer41" class="printer_non" value="1"   <? if($row2[Printer4]==1) echo "checked";?>/>  <? print imprimant4; ?>   </label>
											     </p>
												  
											  </div>
											  <? echo "<script>
										    if(document.getElementById('span1').style.display=='block'){
												var printItems3=document.querySelectorAll('.printer_non');
												document.getElementById('Prix2').disabled=true;
													for(var i=0;i<printItems3.length;i++){
														printItems3[i].disabled=true;
													}		
													
											 }
											 if(document.getElementById('span2').style.display=='block'){	
												var printItems4=document.querySelectorAll('.printer_oui');
													document.getElementById('Prix1').disabled=true;
													document.getElementById('Prix2').readOnly=true;
													document.getElementById('Prix2').value='0';
													for(var i=0;i<printItems4.length;i++){
														printItems4[i].disabled=true;									
													}	
													
											}</script>";?>
											
										</div>			
								</div>	
							
							<div align="left" valign="top" style="float:left;  width:33%;">
								   <label><? print remise ?> <span class="STYLE9">*</span>:</label>   
								   
									     <input name="Remise" type="text" class="field input2" id="Remise" value="<?=htmlspecialchars($row2[MenuPrixEmporte]);?>"/>				 										  
								  
								  <label><? print tva_alc; ?> :</label>  
								  
									     <input name="Tva" type="checkbox" class="field input2" id="Tva" style="float: left; width:30px;" value="1" <? if($row2[PlaceTVA] == 1) echo "checked";?> /> 
										 <? print tva_alc; ?>				
								  
								 <label><? print text_commande; ?> </label>  
								  
									  <label>
									   <input name="Recommande" class="field" type="checkbox" id="Recommande" style="float: left; width:30px;" value="1" <? if($row2[Recommender] == 1) echo "checked";?>/>
									   <? print recommande; ?>
									  </label>
								  
								 <label><? print menu_midi; ?> : </label> 		  			  
								  	 
									   <label> <input name="Menumidi" class="field" type="radio"  id="Menumidi" value="1" <? if($row2[MenuMidi] == 1) echo "checked";?> style="float: left; width:30px;"> <? print menu_midi; ?> </label>
                                       <label> <input name="Menumidi" class="field" type="radio"  id="Menumidi" value="0" <? if($row2[MenuMidi] == 0) echo "checked";?> style="float: left; width:30px;"> <? print menu_normale; ?>  </label>					 
							</div>	
							</div>
							<div style="border-top:solid 1px #e0e0e0;  margin-top:235px; padding-left:70px;">
								<div align="left" valign="top" style=" float:left; width:50%; margin-top:20px; ">
									
									<label><? print Composition; ?></label> 	  
								    <textarea name="Note" cols="25" rows="5" class="input2" id="Note" style=" overflow-y:scroll; width:380px; height:175px; margin-top:5px;"><?=htmlspecialchars($row2[Note]);?></textarea>
								</div>  
								<div align="left" valign="top" style="float:left; width:50%; margin-top:20px; ">
									
									<label><? print text_image_path; ?></label> 	
									<input name="Image1 finalpath" class="field" type="text" id="finalpath" value="<?=htmlspecialchars($row2[MenuPath]);?>" >
									
									<label><? print text_image; ?></label> 	   
									<input name="Image" class="field" type="file" class="input2" id="Image">
									<label><? print format_fichier; ?></label> 	
									 <table> <tr><td></td> </tr>
									  <? if ($row2['Image']!="") { ?>
									   <tr><td>
									   <? 
									   if (file_exists($ph) && $row2['Image']!="") { echo "<img src=\"$ph\" width=\"180\" height=\"140\" border=\"0\">";} else{ echo "<img src=\"images/indisponible.gif\" width=\"180\" height=\"140\" border=\"0\">";} ?> </td></tr>
									   <tr><td><a href="savemenu.php?action=Supprimage&MenuID=<? echo $row2['MenuID'] ?>" onClick="return ConfirmImage();" onMouseOver="this.style.color='#990000'" onMouseOut="this.style.color='#333333'" style="color:#333333; text-decoration:underline"><? print supp_image; ?> </a><? } ?>
									   </td></tr></table>									  
								
										<input name="MenuID" type="hidden" value="<?=$MenuID;?>"/>
											 <? if ($MenuID=="") { ?>
											  <input name="action" type="submit" class="submitcss" id="action" style="margin-top: 12; width:130px;" value="<? print Valider_sans_option; ?>"/>
											  <br><br>
											  <input name="action" type="submit" class="submitcss" id="action" value="<? print valider_ajouter_option; ?>" style="margin-top: 12; width:180px;"/>
											  <? } else { ?>
											  <input name="action" type="submit" class="submitcss" id="action" value="<? print Modifer; ?>" style="margin-top: 12; width:80px;"/><? } ?>
								</div>
							</div>
							</div>
							<!-- end zoneFormulaire-->
							</form>
							
						</div>
						<!-- End Sort -->
						
					</div>
					<!-- box_info -->
				</div>
				<!-- End Box -->
			</div>
			<!-- End Sidebar -->
			
			<div class="md-overlay"></div><!-- the overlay element -->	
			</div>
			<!-- end-box-top-->
			
				<!-- Box-bottom -->
				<div class="box" cellspacing="0" cellpadding="0" style=" padding-bottom:20px; width:885px; float:left; ">
					<!-- Box Head -->
					<div class="box-head" style="padding:10px;">
						<h2 id="title_list" class="left"><strong><? print listing_menus; ?> </strong></h2>
						<div class="right">
							<form name="form2" method="post" action="adminmenu.php#title_list" style="margin-top:3px; vertical-algin:middle; line-height:19px;">
							<select name="FamilleID" id="FamilleID" class="field small-field">
									 <? 
										$str2="select * from $tb_famille where RestoID='$RestoID' ORDER BY SortID";
										$res2=mysql_query($str2);
										
										if(!empty($_POST['Submit1'])) {
										   $FamilleID = $_POST['FamilleID'];
										}
										
										while($aff2=mysql_fetch_array($res2)) {
											echo "<option value='".$aff2['MenuTypeID']."'";
											if ($FamilleID==$aff2['MenuTypeID']) {echo " selected"; $_SESSION['MenuTypeID']=$aff2['MenuTypeID'];}
											echo ">".$aff2['MenuTypeName']."</option>";
										}
										
									?>
							</select> 
							<input type="submit" name="Submit1" value="<? print voir_la_famille; ?>" style="float:right; background:#fff; width:110px;">
							</form>
						</div>
						<form name="form2" method="post" action="adminmenu.php#title_list" class="list-wrap" style="float:right; margin-right:30px; margin-top:8px; vertical-algin:middle; line-height:19px;">
						   <label for="search-text"><? print mot_cle;?></label>
						   <input type="text" name="search_text" id="search_text" placeholder="search" class="search-box" style="width:100px;">
						   <input type="submit" name="Submit2" value="<? print chercher; ?>" style=" background:#fff; width:80px;">
						</form>
					</div>
					<!-- End Box Head -->	
					<div style="margin:10px; padding-left:650px; float:left; "><a href="adminmenu.php?MenuTypeID=<? echo $FamilleID;?>"><b onMouseOver="this.style.color='#990000'" onMouseOut="this.style.color='#333333'" style=" color:#333333; font-weight:bold; font-size:14px; text-decoration:underline"><? print ajouter_article; ?></b></a></div>
					<!-- Table -->
					<div class="table" style="overflow-y: scroll; height: 350px; margin-top: 38px; width:80%;">
						
						<table width="95%" border="0" cellspacing="0" cellpadding="0" style="margin-left:20px; margin-top:20px;">
							<tr>
								
								<th width="26" class="rubriqueListing"><? print ref; ?></th>
								<th width="400" class="rubriqueListing"><? print menu; ?></th>
								<th width="150" class="rubriqueListing"><? print image_menu; ?></th>
								<th width="60" class="rubriqueListing"><? print prix; ?></th>
								<th width="63" class="rubriqueListing"><? print modif; ?></th>
							<!--	<th width="50" class="rubriqueListing "><? print opt; ?></th>-->
								<th width="63" class="rubriqueListing ico del"><? print suppr; ?></th>
								
							</tr>	
								<?php 							
									$sql="select * from $tb_menu where `RestoID`='$RestoID' && MenuTypeID='".$FamilleID."' order by SortID";	
									$result=mysql_query($sql)OR die (mysql_error());
									
									$sql2="select * from $tb_menu where `RestoID`='$RestoID' && MenuTypeID='".$_SESSION['MenuTypeID']."' && `MenuName` like '%".$search_text."%'ORDER BY SortID";
									$result2=mysql_query($sql2) OR die (mysql_error());
									/*$row+=mysql_num_rows($result2);
									
									while($row = mysql_fetch_row($result2)){
											echo $row[0]; echo "&nbsp";
											echo $row[1]; echo "&nbsp";
											echo $row[2]; echo "&nbsp";
											echo $row[3]; echo "&nbsp";
											echo $row[4]; echo "&nbsp";
											echo $row[5]; echo "</br>";	
										}*/
										
									if(!empty($_POST['Submit1'])) {
									   $result_choix = $result;
									  // echo "click the first";
									}else if(!empty($_POST['Submit2'])) {
									   $result_choix = $result2;
									  // echo "click the second";
									}else{
									   $result_choix = $result;
									}
									
									while($myrow=mysql_fetch_array($result_choix)){
										
								?>
									<tr>
										<td class="elementListing"><?php print($myrow[MenuCode]);?></td>
										<td class="elementListing"><?php print($myrow[MenuName]);?></td>
										
										<!-- <td class="elementListing">
										<?php 
										/*  if($myrow[SousFamilleID]!="0") {$sql2="select * from sous_famille where SousFamilleID='".$myrow[SousFamilleID]."'order by SortID";	
											$result2=mysql_query($sql2);
											$myrow2=mysql_fetch_array($result2);
											echo $myrow2['Name'];
										  }else if ($sous_famille_presentes==1) {
											  echo "<img src='images/attention-pt.gif'";
											  $sous_famille_erreur++;
										  }else {
											  echo"-";
										  }	*/
								        ?>-->
										<td class="elementListing"><img src="<?php echo $url_img;?><?php print($myrow[MenuPath]);?>" width="80"/></td>
										
										</td>
									  <td class="elementListing"><?php print($myrow[MenuPrixPlace]);?></td>
									  <td class="elementListing" style="width:120px;">
									  <a class="add-button" data-modal="modal-1" id="a1" href="adminmenu.php?MenuID=<?php print($myrow[MenuID]);?>&MenuTypeID=<? echo $myrow[MenuTypeID];?>&SousFamilleID=<? echo $myrow[SousFamilleID];?>&MenuTypeName=<? echo $myrow[MenuName];?> " onclick="pupopen();" ><img src="css1/images/edit.gif" width="16" height="16" border="0"/><?php print m_edit;?></a></td>
									 <!-- <td class="elementListing"><a href="adminoptions.php?MenuID=<?php print($myrow[MenuID]);?>&FamilleID=<? echo $FamilleID;?>" ><img src="images/options.gif" width="16" height="16" border="0"></a></td>-->
									  <td class="elementListing" ¡±><a href="delmenu.php?MenuID=<?php print($myrow[MenuID]);?>" onClick="return ConfirmDel();"><img src="css1/images/delete.gif" width="16" height="16" border="0"><?php print m_del;?></a></td>
									  </tr>
									<?php 
										 }
									?>
									</table>
									
									<div style="padding:5px;"><? if ($sous_famille_erreur>0) { ?><img src="images/attention-pt.gif" width="20" height="20"><? print text_produits_suvis_faut; ?><? } ?></div>
									
									
								<!-- 
								<div class="pagging">
									<div class="left">Showing 1-12 of 44</div>
									<div class="right">
										<a href="#">Previous</a>
										<a href="#">1</a>
										<a href="#">2</a>
										<a href="#">3</a>
										<a href="#">4</a>
										<a href="#">245</a>
										<span>...</span>
										<a href="#">Next</a>
										<a href="#">View all</a>
									</div>
								</div>
								 -->
					</div>
					<!-- Table -->
					
				</div>
				<!-- End Box -->
			</div>
			<!-- End Content -->
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
<!-- End contain menu-->
	
</div>
<!-- End Container -->


<script src="js1/jquery.min.js"></script>
</html>