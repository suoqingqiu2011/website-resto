<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
	//ajouter pour change language by liu
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	include_once("../include/config.php");
	include_once("session.php");	
	$name = $_COOKIE["systa_restoname"];

	$query="Select * from $tb_resto where `Login`='$name' and `Password` = '$oldpwd'";
	$result=mysql_query($query);
	$row=mysql_num_rows($result);
	

		
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
<div class="md-modal md-effect-1" id="modal-1" style="height:530px; overflow:auto;">
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
					<div class="small_titre" style="width:190px;"><a href="modifieripnumber.php"><? print table_ip ?></a></div>
				</div>
				<!-- end Small Nav -->
				
				<!-- Main -->
				<div id="main" style="text-a">
					<div class="cl">&nbsp;</div>
					
					<!-- Content -->
					<div id="content" style="min-height:400px;">
					<!-- box -->
						<div class="box" style="min-height:380px;" >
							<div class="box-head">
								<h2><strong><? print table_ip ?></strong> </h2>
							</div>
						   <!-- center -->
						   <center style="margin: 30">      	   
							   <h2 style="margin-left:300px; margin-top:10px; margin-bottom:10px; margin-right:400px; width: 150px;"> <a href="ajouertableip.php" target="_self" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#2868f9;"> <img src="images/add.png" width="16" height="16" border="0"> <? print ajout_table_ip ?> </a> </h2>	      
								
								<div style="height: 200px; overflow-y: scroll; float: left; padding-left: 130px; margin-top: 20px;">
								<table width="60%" border="1" cellspacing="0" cellpadding="0" style="margin-top:10px; width:600px;">
								  <tr height="30" style="text-align: center">
									<th><? print adresse_ip ?> </th>
									<th><? print table_Number ?> </th> 	
									<th><? print modif_table_ip ?> </th>
									<th><? print delete_table_ip ?> </th>
								  </tr>
									<?php
									  $str1="select * from tableip";
									  $res1=mysql_query($str1);
									  while($aff1=mysql_fetch_array($res1)) {
									 ?>
										<tr height="30" style="text-align: center">
										<?
											echo  "<td>".$aff1['ip']."</td>";
											echo  "<td>".$aff1['num']."</td>";
										?>	
										   <td> <a href="modifiertableip.php?ipadress=<?php print($aff1[ip]);?>" target="_self" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#2868f9;"> <img src="images/edit.png" width="16" height="16" border="0"> <? print modif_table_ip ?> </a> </td>
										   <td> <a href="relger_ip.php?action=delete_table_ip&ipadress=<?php print($aff1[ip]);?>" target="_self" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#2868f9;"> <img src="images/delete.png" width="16" height="16" border="0"> <? print delete_table_ip ?> </a> </td>							
										</tr>	
									<?	
									 }
									?>				  
							   </table>		
							   </div>
							</center>
							<!-- end center -->		
						</div>
						<!-- End Box -->
					</div>
					<!-- End Content -->
				<div class="cl">&nbsp;</div>			
				</div>
				<!-- end Main -->
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