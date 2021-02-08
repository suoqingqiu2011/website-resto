<?
	////ajouter pour change language by liu
	session_start();
	include("../lang/fr.php");
	include_once("../include/config.php");
	$_SESSION['lang']="fr"; //premier language est fr ajouter by liu 

	if($action == "check"){
	  //if($_POST['action'] == "check")
	  $sql="Select * from $tb_resto Where `Login`='$UserName' and `Check`='1'";
	  $result=mysql_query($sql) or die(mysql_error());
	  $row=mysql_num_rows($result);
	  
	  if($row==0){
		$msg="Votre Nom d'utilisateur inexistant!";
	  }else{
		$row=mysql_fetch_array($result);	
		//if($_POST['Password'] == $row['Password']) //php5.5??
		if($Password == $row[Password]){
			setcookie("systa_restoname", $UserName);
			setcookie("systa_restopassword", $Password);
			setcookie("systa_restoid", $row[RestoID]);
			header("Location:adminmenu0.php"); //send http header 
		}else{
			$msg="Votre Mot de passe erroné!";
		}
	  }
	}
?>
<html>
<head>
	<title>Vos compte et mot de passe</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script language="javascript">
		function check(){
		  if (addnew.UserName.value=="") {
				alert("Remplissez votre nom d'utilisateur S.V.P!");
				addnew.UserName.focus();		
					return (false);
		  }else if(addnew.Password.value == ""){
			alert("Remplissez votre mot de passe!");
				addnew.Password.focus();		
					return (false);
		  }else
			return true;
		}
	</script>

</head>

<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" style=" background: url(css1/images/indexbg.jpg) no-repeat;
    background-size: 100% 100%;">
<center >
  <table width="760" border="1" cellspacing="0" cellpadding="0" style="margin-top:3cm; opacity: 0.75;">
    <tr>
      <td bgcolor="#99770F"><table width="760" border="0" cellpadding="0" cellspacing="1">
        <tr>
          <td bgcolor="#9FB7F6"><table width="760" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="760" valign="top"><table border="0" cellspacing="0" cellpadding="0" width="760" valign="top">
                    <tr>
                      <td valign="top">&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td valign="top" width="760" bgcolor="#ffffff"><table border="0" cellspacing="0" cellpadding="0" width="760" bgcolor="#9FB7F6">              
                      <tr>
                      <td align="center" bgcolor="#fff"><font size="1">&nbsp;</font><br>
                        <table border="0" cellspacing="0" cellpadding="0" width="80%" bgcolor="#B6C8F8">                     		  
						  <h2 style="color:#000;"> Vos compte et mot de passe </h2>					  
                          <tr>
                            <td height="210" align="center"><font size="1">&nbsp;</font>                              
								<form name="addnew" method="post" action="index1.php" onSubmit="return check();">
									  <table width="60%" border="0" cellspacing="5" cellpadding="0">								
										<tr>
										  <td height="30" width="44%" align="right" style="font-size:15">Nom d'utilisateur&nbsp;:</td>
										  <td width="66%"><input type="text" name="UserName" class="input2" id="UserName" size=30 action="adminmenu0.php" method="post" style="width:180px;"><? $_SESSION['UserName']=$_POST['UserName']; ?></td>
										</tr>                   
										<tr>
										  <td height="30" align="right" style="font-size:15">Mot de passe&nbsp;: </td>
										  <td><input name=Password type="password" class="input2" id="Password" size=30 style="width:180px;"></td>
										</tr>                        
										<tr>
										  <td>&nbsp;</td>
										  <td height="30">
											  <label>
												<input name="Submit" type="submit" class="submitcss" value="Valider">
												<input type=hidden name="action" value="check">
												<input name="Submit2" type="reset" class="submitcss" value="Annuler" style="margin-left: 20">
											  </label>
										  </td>
										</tr>
									  </table>
								  </form>
							  </td>
                            </tr>             
                        </table>
                        <br>                      
                        <br></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td width="760">&nbsp;</td>
              </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
</center>
</body>
</html>


