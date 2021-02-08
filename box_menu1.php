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
		print $str2;
		$res2=mysql_query($str2);
		while($aff2=mysql_fetch_array($res2)) {
			$FamilleID=$aff2['MenuTypeID'];
		}
	}	
		/*unset($_SESSION['MenuTypeID']);
		$_SESSION['MenuTypeID']=$FamilleID;*/
		
	$str2="select * from sous_famille where RestoID='$RestoID' && MenuTypeID=$FamilleID";
		$res2=mysql_query($str2);
		while($aff2=mysql_fetch_array($res2)) {
			$sous_famille_presentes=1;
		}
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	
	<title><? print t_Gestion_Menus; ?></title>
	<link rel="stylesheet" href="css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css1/component.css" />
	<link rel="stylesheet" type="text/css" href="css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="css1/style1.css" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script language="javascript">
		function writediv(texte){
			 document.getElementById('affichage_sous_menu').innerHTML = texte;
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
		function check_info()
		{
		var alert1= "<? print alert_ch_famille; ?>";
		
		if (box_info.FamilleID.value=="") { //change Faille a FalilleID. si non check() marche pas
		alert(alert1);
		form1.FamilleID.focus();		
			return (false);
		}else
			return true;
			
		
		</script>
		<script>
		/*function ajax_id(){
		   var menuid=<? echo $aff2['MenuTypeID']?>;
		   $.ajax("adminmenu.php?MenuTypeID="+menuid+"&SousFamilleID=<? echo $SousFamilleID; ?>"),null,function(data){alert(data)});
		}*/
		</script>
		
</head>

<!-- container-->
<div id="container">
<!-- contain menu -->
<div class="shell_top">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<div class="small_titre" ><a href="adminmenu.php"><? print m_menus; ?></a>
			<span>&gt;</span>
			<a href="adminmenu.php"><? print m_gestion_menu; ?></a></div>
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
					
					<div name="box_info" class="box-content" style="height:150px;">	
						
						<!-- Sort -->
						<div class="sort">
							<label ><? print text_famille; ?></label>
							<select class="field" name="FamilleID" id="deroulant_familleID" onChange="affichage_sous_menu()" method="post">
								  <? $str2="select * from $tb_famille where RestoID='$RestoID' ORDER BY SortID";
									$res2=mysql_query($str2);
									while($aff2=mysql_fetch_array($res2)) { 
								  ?>
									<option name="menuid" value="<?=$aff2[MenuTypeID];?>". <? if($aff2[MenuTypeID] == $FamilleID) { echo "selected=\"selected\""; $_SESSION[MenuTypeID]=$aff2[MenuTypeID];}?>><?=$aff2[MenuTypeName];?></option><? } ?>
							</select>
							
						</div>
						<button class="add-button" data-modal="modal-1" onclick="pupopen();check_info();" style="margin:5px;height:30px; width:180px; background:url(css1/images/add-button.png) no-repeat 0 0;"><? print more_infos; ?></button>
						
						<!-- End Sort -->
						
					</div>
				</div>
				<!-- End Box -->
			</div>
			<!-- End Sidebar -->
			
			<div class="md-overlay"></div><!-- the overlay element -->	
			</div>
			<!-- end-box-top-->
			
				<!-- Box-bottom -->
				<div class="box" style="overflow:auto; padding-bottom:20px; width:885px;">
					<!-- Box Head -->
					<div class="box-head" style="padding:10px;">
						<h2 class="left"><strong><? print listing_menus; ?> </strong></h2>
						<div class="right">
							<form name="form2" method="post" action="adminmenu.php" style="margin-top:3px">
							<select name="FamilleID" id="FamilleID" class="field small-field">
									 <? 
										$str2="select * from $tb_famille where RestoID='$RestoID' ORDER BY SortID";
										$res2=mysql_query($str2);
										while($aff2=mysql_fetch_array($res2)) {
											echo "<option value='".$aff2['MenuTypeID']."'";
											if ($FamilleID==$aff2['MenuTypeID']) {echo " selected";}
											echo ">".$aff2['MenuTypeName']."</option>";
										}
									?>
							</select> 
							<input type="submit" name="Submit" value="<? print voir_la_famille; ?>" style="float:right;">
							</form>
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="table">
						<div style="margin:10px; margin-right:50px; float:right; "><a href="adminmenu.php"><b onMouseOver="this.style.color='#990000'" onMouseOut="this.style.color='#333333'" style=" color:#333333; font-weight:bold; font-size:14px; text-decoration:underline"><? print ajouter_article; ?></b></a></div>
						<table width="95%" border="0" cellspacing="0" cellpadding="0" style="margin-left:20px; margin-top:20px;">
							<tr>
								
								<th width="26" class="rubriqueListing"><? print ref; ?></th>
								<th width="400" class="rubriqueListing"><? print menu; ?></th>
								<th width="150" class="rubriqueListing"><? print choix_sous_fam ?></th>
								<th width="60" class="rubriqueListing"><? print prix; ?></th>
								<th width="63" class="rubriqueListing"><? print modif; ?></th>
								<th width="50" class="rubriqueListing "><? print opt; ?></th>
								<th width="63" class="rubriqueListing ico del"><? print suppr; ?></th>
								
							</tr>	
								<?php 							
									$sql="select * from $tb_menu where `RestoID`='$RestoID' && MenuTypeID='".$FamilleID."'	 order by SortID";	
									$result=mysql_query($sql);
									while($myrow=mysql_fetch_array($result)){
								?>
									<tr>
										<td class="elementListing"><?php print($myrow[MenuCode]);?></td>
										<td class="elementListing"><?php print($myrow[MenuName]);?></td>
										
										<td class="elementListing">
										<?php 
										  if($myrow[SousFamilleID]!="0") {$sql2="select * from sous_famille where SousFamilleID='".$myrow[SousFamilleID]."'order by SortID";	
											$result2=mysql_query($sql2);
											$myrow2=mysql_fetch_array($result2);
											echo $myrow2['Name'];
										  }else if ($sous_famille_presentes==1) {
											  echo "<img src='images/attention-pt.gif'";
											  $sous_famille_erreur++;
										  }else {
											  echo"-";
										  }	
								        ?>
										
										</td>
									  <td class="elementListing"><?php print($myrow[MenuPrixPlace]);?></td>
									  <td class="elementListing" style="width:120px;">
									  <a class="add-button" data-modal="modal-1" id="a1" href="adminmenu.php?MenuID=<?php print($myrow[MenuID]);?>&MenuTypeID=<? echo $FamilleID;?>&SousFamilleID=<? echo $myrow[SousFamilleID]; ?>" onclick="pupopen();" ><img src="css1/images/edit.gif" width="16" height="16" border="0"/><?php print m_edit;?></a></td>
									  <td class="elementListing"><a href="adminoptions.php?MenuID=<?php print($myrow[MenuID]);?>&FamilleID=<? echo $FamilleID;?>" ><img src="images/options.gif" width="16" height="16" border="0"></a></td>
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

<script src="js1/classie.js"></script>
<script src="js1/modalEffects.js"></script>
<script src="js1/jquery.min.js"></script>