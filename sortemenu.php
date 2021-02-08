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
	$str2="select * from sous_famille where RestoID='$RestoID' && MenuTypeID=$FamilleID";
		$res2=mysql_query($str2);
		while($aff2=mysql_fetch_array($res2)) {
			$sous_famille_presentes=1;
		}
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

<script language="JavaScript" type="text/JavaScript">
/*
function ConfirmDel()
{
	var alert_sort= "<? print alter_sup_fam; ?>";
	if(!confirm(alert_sort))
	{
		return (false);	
	}
	else 
		return true;
}

function check()
{
	var alert_sort1= "<? print alter_rem_fam; ?>";
  if (form1.Name.value=="") {
	alert(alert_sort1);
	form1.Name.focus();		
		return (false);
	}
	else
		return true;
}
*/
</SCRIPT>

<!-- container -->
<div id="container">
		<!-- contain menu -->
		<div class="shell_top">
				<!-- Small Nav -->
				<div class="small-nav">
					<div class="small_titre" ><a href="adminmenu.php"><? print m_menus; ?></a>
					<span>&gt;</span>
					<a href="sortemenu.php"><? print m_ranger; ?></a> </div>
				</div>
				<!-- end Small Nav -->
				
				<!-- Main -->
				<div id="main" style="text-a">
					<div class="cl">&nbsp;</div>
					
					<!-- Content -->
					<div id="content" style="height:400px;">
					<!-- box -->
						<div class="box" >
							<div class="box-head">
								<h2><strong><? print choix_menus; ?> </strong> </h2>
							</div>
									<div class="form_famil" colspan="2" align="center" bgcolor="#f9ebae" style="padding-top:150px; margin:0px auto;">
									<?
										  $str="select * from $tb_famille where `RestoID`='$RestoID'";	
										  $res=mysql_query($str);	
										  
									?>
									<form name="form1" method="post" action="sortemenu_2eme.php">
									  <table width="500" border="0" cellspacing="0" cellpadding="0">
										<tr>
										  <td width="140" style="font:bold"><strong><? print choi_famille; ?> <strong></td>
										  <td width="92">
										  <?
										   echo "<select name='FamilleID' id='FamilleID' class='input2'>";
										   while($row=mysql_fetch_array($res))
											{
												echo "<option value=\"$row[MenuTypeID]\">$row[MenuTypeName]</option>";
											}
											echo "</select>";
											

											?>              
											</td>
										  <td width="118"><input name="Submit4" type="submit" class="submitcss" value="<? print Suivant; ?>"></td>
										</tr>
									  </table>
								   </form> 
								   </div>								   
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