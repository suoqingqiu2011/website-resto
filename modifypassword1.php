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
	if($row == 0){
		$msg = "Votre Mot de Passe actuel n'est pas correct!<a href = 'javascript:history.back();'>  retour  </a> et remplir a nouveau,S.V.P!";
	}else{
		$sql="Update $tb_resto set `Password` = '$newpwd' WHERE `RestoID`='$RestoID'";
		mysql_query($sql) or die(mysql_error()); 
		setcookie("systa_restopassword", $newpwd);
		$msg = "modifier mot de passe avec success!";	
	}
?>

<html>
	<head>
		<title><? print t_modi_password; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script language="javascript" type="text/javascript" src="js/script.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
		<SCRIPT language=JavaScript>
			function check(){
			  //ajouter pour changer la language
			  var text1= "<? print text_modify1; ?>";
			  var text2= "<? print text_modify2; ?>";
			  var text3= "<? print text_modify3; ?>";
			  if (modify.oldpwd.value=="") {
					alert(text1);
					modify.oldpwd.focus();		
						return (false);
			  } else if (modify.newpwd.value=="") {
					alert(text2);
					modify.newpwd.focus();		
						return (false);
			  } else if (modify.cfpwd.value != modify.newpwd.value) {
					alert(text3);
					modify.newpwd.focus();		
						return (false);
			  }else
				return true;
			 }
		</SCRIPT>
		
	</head>

	<body>
	  <table border="0"  align="left" width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="2" height="20px"><?php include ("top.php"); ?></td>
		</tr>
		<tr>
			<td valign="top" width="90%" bgcolor="#FFA54F">
			<table width="100%" height="450" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td>
					<table width="107%" height="200" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFA54F">             
					<h2 style="margin-top: 40; text-align: center;"> <? print modi_mot; ?> </h2>
					<tr>
					   <td colspan="3" align="center"><font size="1">&nbsp;</font> 
					   <form name="modify" method="post" action="savepassword.php" onSubmit="return check();" style="margin-right: 70">
						   <table width="50%" border="0" cellpadding="0" cellspacing="5">
						   <tr>
							 <td  height="36" align="right"><? print mot_actuellement; ?></td>
							 <td ><input name="oldpwd" type="password" class="input2" size=20 maxlength=15> </td>
						   </tr>
						   <tr>
							  <td height="31"> <div align="right"> <? print modi_nouveau; ?><br> </div></td>
							  <td><input name="newpwd" type="password" class="input2" size=20 maxlength=15>  </td>
						   </tr>
						   <tr>
							  <td height="30"><div align="right"><? print modi_confir; ?></div></td>
							  <td><input name="cfpwd" type="password" class="input2" size=20 maxlength=15> </td>
						   </tr>
						  <tr>
							<td height="45" colspan="2">
							   <div align="center">
								 <input name="Submit" type="submit" class="submitcss" value="<? print Modifer; ?>">
								  <input name="Submit2" type="reset" class="submitcss" value="<? print Vider; ?>">
							   </div>
							</td>
						  </tr>
				  </table>
			   </form>
			   </td>
			</tr>
		  <tr>
			<td height="64" valign="top">&nbsp;</td>
			<td colspan="2" align="center" bgcolor="#FFA54F">&nbsp;</td>
		  </tr>
		 
		 </table></td>
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
