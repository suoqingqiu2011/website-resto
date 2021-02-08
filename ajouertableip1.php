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
		<title>Modifier Table IP</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script language="javascript" type="text/javascript" src="js/script.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">		
	</head>

	<body>
	  <table border="0"  align="left" width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="2" height="20px"><?php include ("top.php"); ?></td>
		</tr>	
		<tr>
			<td valign="top" width="90%" bgcolor="#FFA54F">					   
			   <center style="margin: 30">      		   		      
			       <h2> <a href="ajouertableip.php" target="_self" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#2868f9;"> <img src="images/add.png" width="16" height="16" border="0"> <? print ajout_table_ip ?> </a> </h2>
				   		      
				    <form method="post" action="modifieripnumber.php">
					   <?print adresse_ip; ?> : <input type="text" name="adresse_ip">			 
					   <?print table_Number; ?> : <input type="text" name="table_number"> 
					   <input type="submit" name="action" class="submitcss" id="action" value="<? echo submit_ajouter_ip; ?>">
					   <input type="reset" name="action" class="submitcss" id="action" value="<? echo reset_input; ?>">
					</form>
					
					<table width="80%" border="1" cellspacing="0" cellpadding="0">
					  <tr height="30" style="text-align: center">
						<th><?print adresse_ip; ?></th>
						<th><?print table_Number; ?></th> 	
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
						     <td> <a href="deltableip.php?ipadress=<?php print($aff1[ip]);?>" target="_self" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#2868f9;"> <img src="images/delete.png" width="16" height="16" border="0"> <? print delete_table_ip ?> </a> </td>							
							</tr>	
						<?	
						 }
					    ?>				  
				   </table>						   
			   </center>
		    </td>
		</tr>
		
		<tr>
			<td colspan="2"><?php include ("bottom.php"); ?></td>
		</tr>		
	</table>

	</body>
</html>
