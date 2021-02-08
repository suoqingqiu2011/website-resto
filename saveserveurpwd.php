<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
	//ajouter pour change language by liu
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	include_once("../include/config.php");
	//include_once("session.php");
	$name = $_COOKIE["systa_restoname"];

	$query="Select * from `serveur_admin` where `passeword` = '$s_oldpwd'";
	$result=mysql_query($query);
	$row=mysql_num_rows($result);
	
	if($_SESSION['lang']=="fr"){
		if($row == 0){
			$msg = "Votre Mot de Passe actuel n'est pas correct!<a href = 'modifyserveurpwd.php'>  retour  </a> et remplir a nouveau,S.V.P!";
		}else{
			$sql="Update `serveur_admin` set `passeword` = '$s_newpwd' where `passeword` = '$s_oldpwd' ";
			mysql_query($sql) or die(mysql_error()); 
			setcookie("systa_restoserveurpwd", $s_newpwd);
			$msg = "modifier mot de passe avec success!";	
		}
	}else if($_SESSION['lang']=="cn"){
		if($row == 0){
			$msg = "您当前的密码不正确!<a href = 'modifyserveurpwd.php'>  请返回  </a> 重新填写!";
		}else{
			$sql="Update `serveur_admin` set `passeword` = '$s_newpwd' where `passeword` = '$s_oldpwd' ";
			mysql_query($sql) or die(mysql_error()); 
			setcookie("systa_restoserveurpwd", $s_newpwd);
			$msg = "密码修改成功!";	
		}
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title><? print t_modi_password; ?></title>
	<link rel="stylesheet" href="css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css1/component.css" />
	<link rel="stylesheet" type="text/css" href="css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="css1/style1.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<SCRIPT language=JavaScript>
			function check(){
			  //ajouter pour changer la language
			  var text1= "<? print text_modify1; ?>";
			  var text2= "<? print text_modify2; ?>";
			  var text3= "<? print text_modify3; ?>";
			  var text4= "<? print text_modify4; ?>";
			  
			  if (modify.s_oldpwd.value=="") {
					alert(text1);
					modify.s_oldpwd.focus();		
						return (false);
			  } else if (modify.s_newpwd.value=="") {
					alert(text2);
					modify.s_newpwd.focus();		
						return (false);
			  } else if (modify.s_cfpwd.value != modify.s_newpwd.value) {
					alert(text3);
					modify.s_newpwd.focus();		
						return (false);
			  }  else if (modify.s_oldpwd.value== modify.s_newpwd.value||modify.s_oldpwd.value==modify.s_cfpwd.value ) {
					alert(text4);
					modify.s_newpwd.focus();		
						return (false);
			  } else
				return true;
			 }
		</SCRIPT>
</head>

<body>


<div id="bg"></div>
	
<?php include ("top_left_nav.php"); ?>

<!-- container -->
<div id="container">
		<!-- contain menu -->
		<div class="shell_top">
				<!-- Small Nav -->
				<div class="small-nav">
					<div class="small_titre" ><a href="#"><? print m_passe; ?></a>
					<span>&gt;</span>
					<a href="modifyserveurpwd.php"><? print m_serveur_gestion; ?></a></div>
					
				</div>
				<!-- end Small Nav -->
				
				<!-- Main -->
				<div id="main" style="text-a">
					<div class="cl">&nbsp;</div>
					
					<!-- Content -->
					<div id="content" style="min-height:400px;">
					<!-- box -->
						<div class="box" style="height:390px;">
							<div class="box-head">
								<h2><strong><? print modif_passe_serve; ?></strong> </h2>
							</div>
							<!-- table -->
							<table width="100%" height="88%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFF">
			  <tr>
				<td valign="top" colspan="3">&nbsp;</td>
			  </tr>
			  <tr>
				<td colspan="3" align="left">
					 <table width="222" border="0" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="28" bgcolor="#FFF">&nbsp;</td>
						  <td width="178" bgcolor="#FFF"><span class="header2"><? print modi_mot; ?></span></td>
						  <td width="16">&nbsp;</td>
						</tr>
					 </table>
				</td>
			  </tr>
			  <tr>
				<td width="17" valign="top">&nbsp;</td>
				<td colspan="2" valign="top" bgcolor="#FFF">&nbsp;</td>
			  </tr>
			  <tr>
				<td height="280" colspan="3" align="center"><span class="STYLE6"><?=$msg;?></span></td>
				</tr>
			  <tr>      
				<td height="64" width="50%" align="right" bgcolor="#FFF"><span class="header2"><a href="modifyserveurpwd.php" style="color:#24538C"><? print s_retour; ?></a></span></td>
				<td  align="left" bgcolor="#FFF"><span class="header2"><a href="logout.php" style="color:#24538C"><? print s_quitter; ?></a></span></td>
			  </tr>
			  <tr>
				<td height="12" colspan="3" valign="top">&nbsp;</td>
			  </tr>
			</table>
            
						<!-- end table -->
					</div>
					<!-- end box -->
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