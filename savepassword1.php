<?
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	include_once("../include/config.php");
	include_once("session.php");
	$name = $_COOKIE["systa_restoname"];

	$query="Select * from $tb_resto where `Login`='$name' and `Password` = '$oldpwd'";
	$result=mysql_query($query);
	$row=mysql_num_rows($result);

	if ($_SESSION['lang']=="fr"){
		if($row == 0){
			$msg = "Votre Mot de Passe actuel n'est pas correct!<a href = 'javascript:history.back();'>retour</a> et remplir a nouveau,S.V.P!";
		}else{
			$sql="Update $tb_resto set `Password` = '$newpwd' WHERE `RestoID`='$RestoID'";
			mysql_query($sql) or die(mysql_error()); 
			setcookie("systa_restopassword", $newpwd);
			$msg = "Mot de passe modifié avec succès!";	
		}
	}elseif ($_SESSION['lang']=="cn"){
		if($row == 0){
			$msg = "您的当前密码不正确!<a href = 'javascript:history.back();'>返回</a> 并重新输入!";
		}else{
			$sql="Update $tb_resto set `Password` = '$newpwd' WHERE `RestoID`='$RestoID'";
			mysql_query($sql) or die(mysql_error()); 
			setcookie("systa_restopassword", $newpwd);
			$msg = "修改密码成功!";	
		}
	}
?>

<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
	<table border="0"  align="left" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" height="20px"><?php include ("top.php"); ?></td>
	</tr>
	
	<tr>
	<td valign="top" width="100%" bgcolor="#FFA54F">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td>
		  <table width="107%" height="394" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFA54F">
			  <tr>
				<td valign="top" colspan="3">&nbsp;</td>
			  </tr>
			  <tr>
				<td colspan="3" align="left">
					 <table width="222" border="0" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="28" bgcolor="#FFA54F">&nbsp;</td>
						  <td width="178" bgcolor="#FFA54F"><span class="header2"><? print modi_mot; ?></span></td>
						  <td width="16">&nbsp;</td>
						</tr>
					 </table>
				</td>
			  </tr>
			  <tr>
				<td width="17" valign="top">&nbsp;</td>
				<td colspan="2" valign="top" bgcolor="#FFA54F">&nbsp;</td>
			  </tr>
			  <tr>
				<td height="280" colspan="3" align="center"><span class="STYLE6"><?=$msg;?></span></td>
				</tr>
			  <tr>      
				<td height="64" width="50%" align="right" bgcolor="#FFA54F"><span class="header2"><a href="adminmenu.php" style="color:#24538C"><? print s_retour; ?></a></span></td>
				<td  align="left" bgcolor="#FFA54F"><span class="header2"><a href="logout.php" style="color:#24538C"><? print s_quitter; ?></a></span></td>
			  </tr>
			  <tr>
				<td height="12" colspan="3" valign="top">&nbsp;</td>
			  </tr>
			</table>
		</td>
	   </tr>
	  </table>
	 </td>
	</tr>
	
	<tr>
		<td colspan="2"><?php include ("bottom.php"); ?></td>
	</tr>
	</table>

	</body>
	
</html>