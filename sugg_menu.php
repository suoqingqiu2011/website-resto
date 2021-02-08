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
/*
$str2="select * from sous_famille where RestoID='$RestoID' && FamilleID=$FamilleID";
	$res2=mysql_query($str2);
	while($aff2=mysql_fetch_array($res2)) {
	$sous_famille_presentes=1;
	}*/
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title><? print t_Gestion_Menus; ?></title>
	<link rel="stylesheet" href="css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css1/component.css" />
	<link rel="stylesheet" type="text/css" href="css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="css1/style1.css" />
</head>

<script language="javascript">
function writediv(texte)
     {
     document.getElementById('affichage_sous_menu').innerHTML = texte;
     }

function affichage_sous_menu() {
	if(texte = file('affichage_sous_menu.php?restoID=<? echo $RestoID; ?>&familleID='+escape(document.getElementById('deroulant_familleID').value)+'&sousfamilleID=<? echo $SousFamilleID; ?>'))
	{
	   writediv(texte);
    }
}

function file(fichier)
     {
     if(window.XMLHttpRequest) // FIREFOX
          xhr_object = new XMLHttpRequest();
     else if(window.ActiveXObject) // IE
          xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
     else
          return(false);
     xhr_object.open("GET", fichier, false);
     xhr_object.send(null);
     if(xhr_object.readyState == 4) return(xhr_object.responseText);
     else return(false);
     } 
</script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
<!--
.style5 {color: #00FF00}
.style1 {color: #00FF00}

.STYLE9 {color: #FF6600}
-->
</style>
	
	
<style type="text/css">
 .aa{ width:200px; float:left;}
    .aa li{ padding:5px; background:#ff0000; cursor:pointer;}
 .bb{ width:700px; float:left; background:#00ff00;}
</style>

<body>
<!-- form d'infos-->
<div class="md-modal md-effect-1" id="modal-1" style="height:530px; overflow:auto;">
		<div class="md-content">
			<?php include ("form_info.php"); ?>			
		</div>
</div> 
<!-- End form d'infos-->

<div id="bg"></div>
	
<?php include ("top_left_nav.php"); ?>

	<div id="container">
	<!-- contain menu -->
		<div class="shell_top">
				<!-- Small Nav -->
				<div class="small-nav">
					<div class="small_titre" ><a href="adminmenu.php"><? print m_menus; ?></a>
					<span>&gt;</span>
					<a href="sugg_menu.php"><? print m_sugg_menu; ?></a></div>
				</div>
				<!-- end Small Nav -->
				
				<!-- Main -->
				<div id="main" style="text-a">
					<div class="cl">&nbsp;</div>
					
					<!-- Content -->
					<div id="content" style="min-height:400px; margin-bottom:50px;">
					<!-- box -->
						<div class="box" style="min-height:380px;" >
							<div class="box-head">
								<h2><strong><? print parcourir_menus; ?> </strong> </h2>
							</div>
							
							<div class="listing2" border="0" cellspacing="0" cellpadding="0" style="margin:60px; border:2px solid #000; width:750px; ">
									  
									  <div class="titreListing" id="titreListing" style="background-color:#000; color:#FFFFFF; padding-left: 20px; padding-top:10px; height:30px;"> <? print listing_menus; ?> </div>
									  <p>
										<form name="form2" method="post" action="sugg_menu.php#titreListing" style="margin:20px; padding-top:10px; border-top:2px solid #000;">
										<select name="FamilleID" id="FamilleID">
										  <? $str2="select * from $tb_famille where RestoID='$RestoID' ORDER BY SortID";
											$res2=mysql_query($str2);
											
											if(!empty($_POST['Submit'])) {
											   $FamilleID = $_POST['FamilleID'];
											}
											
											while($aff2=mysql_fetch_array($res2)) {
											echo "<option value='".$aff2['MenuTypeID']."'";
											if ($FamilleID==$aff2['MenuTypeID']) {echo " selected";}
											echo ">".$aff2['MenuTypeName']."</option>";
											}?>
										   </select> <input type="submit" name="Submit" value="<? print voir_la_famille; ?>" style="width:100px; background:#f5f5f5;">
									  </form>
									  </p>
									  							   
									   <!--  <a href="adminmenu.php"><b onMouseOver="this.style.color='#990000'" onMouseOut="this.style.color='#333333'" style="color:#333333; font-weight:bold; font-size:14px; text-decoration:underline"><? //print ajouter_article; ?></b></a>  -->
									 
									  <table class="zoneListing" border="0" cellspacing="0" cellpadding="0" style="margin:30px; margin-bottom:0px; border-top:2px solid #000; width:92%;">
										<tr>
										  <td width="26" class="rubriqueListing"><? print ref; ?></td>
										  <td width="93" class="rubriqueListing"><? print menu; ?></td>
										  <td width="100" class="rubriqueListing"><? print sous_famille; ?></td>
										  <td width="54" class="rubriqueListing"><? print prix; ?></td>
										  <td width="100" class="rubriqueListing"><? print image_menu; ?></td>
										  <td width="80" class="rubriqueListing"><? print suggestion_menu; ?> </td>
										</tr>
									  </table>
									  <div style="overflow-y:auto; height:350px;">
									     <table height="73" border="0" cellspacing="0" cellpadding="0" class="zoneListing" style="margin-top:10px; margin-left:30px; width:92%; ">
										
										<?php 
													
										  $sql="select * from $tb_menu where `RestoID`='$RestoID' && MenuTypeID='".$FamilleID."'	 order by SortID";	
										   $result=mysql_query($sql);
											while($myrow=mysql_fetch_array($result))
											{
											 ?>
										<tr>
										  <td width="10" class="elementListing"><?php print($myrow[MenuCode]);?></td>
										  <td width="1" class="elementListing"><?php print($myrow[MenuName]);?></td>
										  <td width="50" class="elementListing"><?php 
									   if ($myrow[SousFamilleID]!="0") {
										   $sql2="select * from sous_famille where SousFamilleID='".$myrow[SousFamilleID]."'order by SortID";	
									       $result2=mysql_query($sql2);
										   $myrow2=mysql_fetch_array($result2);
										   echo $myrow2['Name'];
									   } elseif ($sous_famille_presentes==1) {echo "<img src='images/attention-pt.gif'";
										   $sous_famille_erreur++;
									   } else {
										   echo"-";
										 }	
										  ?></td>
										  <td width="30" class="elementListing"><?php print($myrow[MenuPrixPlace]);?></td>
										  <td width="30" class="elementListing"><img src="<?php echo $url_img;?><?php print($myrow[MenuPath]);?>" width="80"/></td>								
										  <td width="10" class="elementListing"><a href="add_suggest.php?MenuID=<?php print($myrow['MenuID']);?>&RestoID=<?php echo $RestoID;?>"><?php print suggestion_menu; ?></td>  									
										</tr>
										<?php 
											 }
										?>
									  </table>
									  <div style="padding:5px;"><? if ($sous_famille_erreur>0) { ?><img src="images/attention-pt.gif" width="20" height="20"><? print text_produits_suvis_faut; ?><? } ?></div>
									</div >
								      </div>
							
							
							
							          <div class="titreListing" id="titreListing" style="background-color:#000; color:#FFFFFF; padding-left: 20px; padding-top:10px; height:30px;"> <? print m_sugg_menu; ?> </div>
									 
									  <table class="zoneListing" border="0" cellspacing="0" cellpadding="0" style="margin:30px; margin-bottom:0px; border-top:2px solid #000; width:92%;">
										<tr>
										  <td width="26" class="rubriqueListing"><? print ref; ?></td>
										  <td width="93" class="rubriqueListing"><? print menu; ?></td>
										  <td width="100" class="rubriqueListing"><? print sous_famille; ?></td>
										  <td width="54" class="rubriqueListing"><? print prix; ?></td>
										  <td width="100" class="rubriqueListing"><? print image_menu; ?></td>
										  <td width="80" class="rubriqueListing"><? print r_delete_image; ?> </td>
										</tr>
									  </table>
									  <div style="overflow-y:auto; height:350px;">
									     <table height="73" border="0" cellspacing="0" cellpadding="0" class="zoneListing" style="margin-top:10px; margin-left:30px; width:92%; ">
										
										<?php 
													
										  $sql="select * from resto_suggestions_menu where `RestoID`='$RestoID' order by MenuID";
										  $result=mysql_query($sql);
										  while($myrow=mysql_fetch_array($result))
										  {
												 $sql2=" select * from menuinfo550 where MenuID='".$myrow[MenuID]."' ";										 
												 $result2=mysql_query($sql2);
												 $myrow2=mysql_fetch_array($result2);	
												?>
												 <tr>
												   <td width="10" class="elementListing"><?php print($myrow2[MenuCode]);?></td>
												   <td width="1" class="elementListing"><?php print($myrow2[MenuName]);?></td>
												   <td width="50" class="elementListing"> <?php  echo "-";  ?> </td>
												   <td width="30" class="elementListing"><?php print($myrow2[MenuPrixPlace]);?></td>
												   <td width="30" class="elementListing"><img src="<?php echo $url_img;?><?php print($myrow2[MenuPath]);?>" width="80"/></td>								
												   
												   <td width="10" class="elementListing"><a href="del_sugg_menu.php?MenuID=<?php print($myrow['MenuID']);?>&RestoID=<?php echo $RestoID;?>"><?php print r_delete_image; ?></td>  									
												 
												 </tr>
												 
												<?php 
												}
												?>
									  </table>
									  <div style="padding:5px;"><? if ($sous_famille_erreur>0) { ?><img src="images/attention-pt.gif" width="20" height="20"><? print text_produits_suvis_faut; ?><? } ?></div>
									
									</div >
								  </div>
							
							
							</div>
							<!-- end liste menu -->
						</div>
						<!-- box -->
					</div>
					<!-- End content -->
				</div>
				<!-- end main -->
			</div>
			<!-- end contain menu -->
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