<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
	//ajouter pour change language by liu
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	include_once("../include/config.php");
	include_once("session.php");
	$name = $_COOKIE["systa_restoname"];
    
	//对于存入的密码进行限制的处理 !!!!!!
	$query="Select * from $tb_resto where `Login`='$name' and `Password` = '$oldpwd'";
	$result=mysql_query($query);
	$row=mysql_num_rows($result);
	
	if($_SESSION['lang']=="fr"){
		if($row == 0){
			$msg = "Votre Mot de Passe actuel n'est pas correct!<a href = 'modifypassword.php'>  retour  </a> et remplir a nouveau,S.V.P!";
		}else{
			if(strlen($newpwd) < 6 || strlen($newpwd) > 20){
				$msg = "Votre mot de passe est très court ! ";
			}else{
				if (preg_match("/^\d*$/",$newpwd)) {
					$msg = "Mot de passe doit contenir un Lettre !";
				} else if (preg_match("/^[a-z]*$/i",$newpwd)) {
					$msg = "Mot de passe doit contenir un Chiffre !";
				} else if (!preg_match("/^[a-z\d]*$/i",$newpwd)) {
				   $msg = "Mot de passe ne doit pas contenir les autres caractères !"; 	
				} else if ($newpwd != $cfpwd) {
				   $msg =" Coffirmation du mot de passe : erreur ! ";
				} else {				
					$sql="Update $tb_resto set `Password` = '$newpwd' WHERE `RestoID`='$RestoID'";
					mysql_query($sql) or die(mysql_error()); 
					setcookie("systa_restopassword", $newpwd);
					$msg = "modifier mot de passe avec success!";	
				}
			}
		}
	}else if($_SESSION['lang']=="cn"){
		if($row == 0){
			$msg = "您当前的密码不正确!<a href = 'modifypassword.php'>  请返回  </a> 重新填写!";
		}else{
			if(strlen($newpwd) < 6 || strlen($newpwd) > 20){
				$msg = " 密码必须为6-20位的字符串! ";
			}else{
				if (preg_match("/^\d*$/",$newpwd)) {
					$msg = "密码必须包含字母 !";
				} else if (preg_match("/^[a-z]*$/i",$newpwd)) {
					$msg = "密码必须包含数字 !";
				} else if (!preg_match("/^[a-z\d]*$/i",$newpwd)) {
				   $msg = "密码只能包含数字和字母,强度:强 !"; 	
				} else if ($newpwd != $cfpwd) {
				   $msg =" 验证: 确认新密码出错 ! ";
				} else {				
					$sql="Update $tb_resto set `Password` = '$newpwd' WHERE `RestoID`='$RestoID'";
					mysql_query($sql) or die(mysql_error()); 
					setcookie("systa_restopassword", $newpwd);
					$msg = "密码修改成功!";	
				}
			}
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
			  if (modify.oldpwd.value=="") {
					alert(text1);
					modify.oldpwd.focus();		
					return (false);
			  } else if ( modify.newpwd.value == null || modify.cfpwd.value == null ) {
					alert(text2);
					modify.newpwd.focus();
					return (false);
			  } else if (length(modify.newpwd) <1 || length(modify.cfpwd)<1) {
					alert(text2);
					modify.newpwd.focus();		
					return (false);
			  } else if (modify.cfpwd.value != modify.newpwd.value) {
					alert(text3);
					modify.newpwd.focus();	
					return (false);
			  } else if (modify.oldpwd.value == modify.newpwd.value || modify.oldpwd.value == modify.cfpwd.value ) {
					alert(text4);
					modify.newpwd.focus();		
					return (false);
			  }
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
					<a href="modifypassword.php"><? print m_admin_gestion; ?></a></div>
					
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
								<h2><strong><? print modif_passe_sys; ?></strong> </h2>
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
				<td height="64" width="50%" align="right" bgcolor="#FFF"><span class="header2"><a href="modifypassword.php" style="color:#24538C"><? print s_retour; ?></a></span></td>
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