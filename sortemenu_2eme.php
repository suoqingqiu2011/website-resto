<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
session_start();
include('../lang/'.$_SESSION['lang'].'.php');
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
</head>

<body>
<!-- form d'infos-->
<div class="md-modal md-effect-1" id="modal-1" style="height:530px; overflow-y:auto;">
		<div class="md-content">
			<?php include ("form_info.php"); ?>			
		</div>
</div> 
<!-- End form d'infos-->

<div id="bg"></div>
	
<?php include ("top_left_nav.php"); ?>

<!-- container -->
<div id="container">
		<!-- contain menu -->
		<div class="shell_top">
				<!-- Small Nav -->
				<div class="small-nav">
					<div class="small_titre" ><a href="adminmenu.php"><? print m_menus; ?></a>
					<span>&gt;</span>
					<a href="sortemenu.php"><? print m_ranger; ?></a></div>
				</div>
				<!-- end Small Nav -->
				
				<!-- Main -->
				<div id="main" style="text-a">
					<div class="cl">&nbsp;</div>
					
					<!-- Content -->
					<div id="content" style="min-height:400px;">
					<!-- box -->
						<div class="box" style="overflow:auto; padding-bottom:20px; margin-bottom:50px;" >
							<div class="box-head" id="t_titre">
								<h2><strong><? print choix_menus; ?> </strong> </h2>
							</div>
							<!-- liste de menus -->
							<div class="listing2" style="overflow-y:auto; margin:60px; border:2px solid #000; width:750px;">
								  <div class="titreListing" style="background-color:#000; color:#FFFFFF; padding-left: 20px; padding-top:10px; height:30px;"><? print listing_menus; ?> </div>
								  <br>
								  <div>
								  <table class="zoneListing" border="0" cellspacing="0" cellpadding="0" style="margin:30px; margin-bottom:0px; border-top:2px solid #000; width:88%;">
									<tr>
									  <td width="10%" class="rubriqueListing"><? print ref; ?></td>
									  <td width="30%" class="rubriqueListing"><? print menu; ?></td>
									  <td width="25%" class="rubriqueListing"><? print Famille; ?></td>
									  <td width="7%" class="rubriqueListing"><? print prix; ?></td>
									  <td width="10%" class="rubriqueListing"><? print Up; ?></td>
									  <td width="18%" class="rubriqueListing"><? print num_serie;?></td>
									</tr>
								  </table>
								  
								  <div style="height: 260px; width: 750px; overflow-y: auto; float: left; margin-bottom:30px;">
								  <table  class="zoneListing" border="0" cellspacing="0" cellpadding="0" style="margin-left:30px; margin-top:3px; width:90%;">
									
									<?php 							
										$sql="select * from $tb_menu where `RestoID`='$RestoID' and `MenuTypeID`='$FamilleID' order by `SortID`";	
										$result=mysql_query($sql);
									
										//echo $FamilleID;
										While($myrow=mysql_fetch_array($result))
										{
										 ?>
									<tr>
									  <td width="10%" class="elementListing"><?php print($myrow[MenuCode]);?></td>
									  <td width="30%" class="elementListing"><?php print($myrow[MenuName]);?></td>
									  <td width="25%" class="elementListing"><?php print(getFamilleNameByID($myrow[MenuTypeID]));?></td>
									  <td width="7%" class="elementListing"><?php print($myrow[MenuPrixPlace]);?></td>
									  <td width="10%" class="elementListing"><a href="sortmenu3.php?FamilleID=<?php print($myrow[MenuTypeID]);?>&MenuID=<?php print($myrow[MenuID]);?>"><img src="images/up.gif" width="13" height="13" border="0"></a></td>
									  <td width="18%" class="elementListing"><input id="sort_id" name="sort_id" value="<?php print($myrow[SortID]);?>" size="5"/></td>
									</tr>
									<?php 
										 }
									?>
								  </table>
								  </div>
								  </div>
							  </div>
							  <!-- End liste de menus -->
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