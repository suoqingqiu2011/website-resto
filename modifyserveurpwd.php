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
	if($row == 0){
		$msg = "Votre Mot de Passe actuel n'est pas correct!<a href = 'javascript:history.back();'>  retour  </a> et remplir a nouveau,S.V.P!";
	}else{
		$sql="Update `serveur_admin` set `passeword` = '$s_newpwd' where `passeword` = '$s_oldpwd' ";
		mysql_query($sql) or die(mysql_error()); 
		setcookie("systa_restoserveurpwd", $s_newpwd);
		$msg = "modifier mot de passe avec success!";	
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
			  } else if (modify.s_oldpwd.value== modify.s_newpwd.value || modify.s_oldpwd.value==modify.s_cfpwd.value ) {
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
							<table width="100%" height="88%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">             
								
								<tr>
								   <td colspan="3" align="center"><font size="1">&nbsp;</font> 
								   <form name="modify" method="post" action="saveserveurpwd.php" onSubmit="return check();" style="margin-right: 50">
									   <table width="50%" border="0" cellpadding="0" cellspacing="5">
									   <tr>
										 <td  height="36" align="right"><? print mot_actuellement; ?></td>
										 <td ><input name="s_oldpwd" type="password" id="passwd1" class="input2" size=20 maxlength=15> </td>
									   </tr>
									   <tr>
										  <td height="31"> <div align="right"> <? print modi_nouveau; ?><br> </div></td>
										  <td><input name="s_newpwd" type="password" id="passwd2" class="input2" size=20 maxlength=15>  </td>
									   </tr>
									   <tr>
										  <td height="30"><div align="right"><? print modi_confir; ?></div></td>
										  <td><input name="s_cfpwd" type="password" id="passwd3" class="input2" size=20 maxlength=15> </td>
									   </tr>
									   <tr>	<td>&nbsp;</td>
											<td><input type="checkbox" value="1" id="check_show" onclick="hideShowPsw()" style="float:left;" /> <label style="float:left; margin-left:2px;"><? print show_msg;?></label></td>
									   </tr>
									  <tr>
										<td height="45" colspan="2">
										   <div align="center">
											<input name="serveID" type="hidden" value="<?=$serveID;?>"/>
											 <? if ($serveID=="") { ?>
											 <input name="Submit" type="submit" class="submitcss" value="<? print Modifer; ?>">
											 <input name="Submit2" type="reset" class="submitcss" value="<? print Vider; ?>">
											 <? } ?>
											 
										   </div>
										</td>
									  </tr>
									  </table>
									</form>
									</td>
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

	<script type="text/javascript">  
   
		var demoInput1 = document.getElementById("passwd1");  
		var demoInput2 = document.getElementById("passwd2");  
		var demoInput3 = document.getElementById("passwd3");  
		 
		function hideShowPsw(){  
			if (demoInput1.type == "password"&&demoInput2.type == "password"&&demoInput3.type == "password") {  
				demoInput1.type = "text";  
				demoInput2.type = "text";
				demoInput3.type = "text";
			}else {  
				demoInput1.type = "password";  
				demoInput2.type = "password";
				demoInput3.type = "password";					 
			}  
		}  
	</script>  

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