<?
	////ajouter pour change language by liu
	session_start();
	//include("../lang/fr.php");
	include_once("../include/config.php");
	$_SESSION['lang']="fr"; //premier language est fr ajouter by liu 
	
	include('../lang/'.$_SESSION['lang'].'.php');
	
	$al_text1="Votre Nom d'utilisateur inexistant!";
	$al_text2="Votre Mot de passe erroné!";
	if($action == "check"){
	  //if($_POST['action'] == "check")
	  $sql="Select * from $tb_resto Where `Login`= '$UserName'";
	  $result=mysql_query($sql) or die(mysql_error());
	  $row=mysql_num_rows($result);
	  
	  if($row==0){
		echo '<script> alert("'.$al_text1.$sql.$UserName.$Password.'");</script>';
	  }else{
		$row=mysql_fetch_array($result);	
		//if($_POST['Password'] == $row['Password']) //php5.5??
		if($Password == $row[Password]){
			setcookie("systa_restoname", $UserName);
			setcookie("systa_restopassword", $Password);
			setcookie("systa_restoid", $row[RestoID]);
			header("Location:adminmenu.php"); //send http header 
		}else{
			echo '<script> alert("'.$al_text2.'");</script>';
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

<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" style=" background: url(css1/images/indexbg.jpg) no-repeat; background-size: 1365px 665px; min-height:545px;">
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
						  <h2 style="color:#000;"> <? echo compte_passe; ?></h2>					  
                          <tr>
                            <td height="210" align="center"><font size="1">&nbsp;</font>                              
								<form name="addnew" method="post" action="index.php" onSubmit="return check();">
									  <table width="88%" border="0" cellspacing="5" cellpadding="0">								
										<tr>
										  <td height="30" width="44%" align="right" style="font-size:15"><? echo user_nom; ?>&nbsp;: </td>
										  <td width="66%"><input name="UserName" type="text" class="input2" id="UserName" size=30 style="width:180px;"></td>
										</tr>                   
										<tr>
										  <td height="30" align="right" style="font-size:15"><? echo mot_pass; ?>&nbsp;: </td>
										  <td><input name="Password" type="password" class="input2" id="Password" size=30 style="width:180px;"></td>
										</tr>  
										
										<tr><td>&nbsp;</td>
												<? 
												$repertoire="../lang/";
												$dir=opendir($repertoire);
												while ($file = readdir($dir)) {
													if ($file!="." && $file!=".." && $file!="liste.php" && $file!="switchLang.php") {
													$tab_lang=explode(".",$file);
														if($tab_lang[0]!=$_SESSION['lang']){
														
												?>
												<td align="left"><a href="index_2eme.php?newLang=<? echo $tab_lang[0]; ?>"  style="width:200px;" >
												
												<? if($tab_lang[0]=="fr"){?><span>Choisir un autre langue: français &nbsp;</span><img src="images/fr.jpg" style="vertical-align: middle;"/><? } ?> 
												<? if($tab_lang[0]=="cn"){?><span>选择其他语言：中文 &nbsp;</span><img src="images/cn.jpg" style="vertical-align: middle;"/><? } ?>
												</a></td>								
												<?  }
												  }
												} 
												?>	
										</tr>
										
										<tr>
										  <td>&nbsp;</td>
										  <td height="30">
											  <label>
												<input name="Submit" type="submit" class="submitcss" value="<? echo Valider; ?>">
												<input type=hidden name="action" value="check">
												<input name="Submit2" type="reset" class="submitcss" value="<? echo Annuler; ?>" style="margin-left: 20">
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


