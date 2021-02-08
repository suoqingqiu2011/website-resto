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
	
	if($_SESSION['lang']=="fr"){ 
		 if($action == "AjouterIP"){	 
            $str1="select * from tableip where `ip`='$adresse_ip'";
			$res1=mysql_query($str1);	
			$aff1=mysql_fetch_array($res1);
            if($aff1['ip'] != null){
             	echo "<script> alert('Il existe ce IP Adresse'); </script>";
			}else{		
				echo "<script> alert('Ajouter IP Adresse et Table Number!'); </script>";		
				$sql="Insert into tableip (`ip`,`num`) values ('$adresse_ip','$table_number')";   	
				mysql_query($sql) or die(mysql_error());	
			}				
			
		 }elseif($action == "ModidierIP"){	
		 
			echo "<script> alert('Modifier IP Adresse et Table Number!'); </script>";		 
			$sql="update tableip set `num`='$table_number' where `ip`='$adresse_ip' ";
			mysql_query($sql) or die(mysql_error());
		
		 }elseif($action == "SupprimerIP"){
			 
			echo "<script> alert('Supprimer IP Adresse et Table Number!'); </script>";
			$sql="delete from tableip Where `ip`='$adresse_ip'";
			mysql_query($sql) or die(mysql_error());		
			
		 }			
	}	

    if($_SESSION['lang']=="cn"){ 
		 
		 if($action == "确定添加IP"){	 
            $str1="select * from tableip where `ip`='$adresse_ip'";
			$res1=mysql_query($str1);		
			$aff1=mysql_fetch_array($res1);
            if($aff1['ip'] != null){
             	//echo "<script> alert('IP地址已经存在!'); </script>";
				echo "<script> alert('test ok!'); </script>";
			}else{		
				echo "<script> alert('添加IP地址对应桌号!'); </script>";		
				$sql="Insert into tableip (`ip`,`num`) values ('$adresse_ip','$table_number')";   	
				mysql_query($sql) or die(mysql_error());	
			}				
		 }elseif($action == "确定修改IP"){		
		 
			echo "<script> alert('修改IP地址对应桌号!'); </script>";		 
			$sql="update tableip set `num`='$table_number' where `ip`='$adresse_ip' ";
			mysql_query($sql) or die(mysql_error());
		
		 }elseif($action == "确定删除IP"){
			 
			echo "<script> alert('删除对应的IP地址!'); </script>";
			$sql="delete from tableip Where `ip`='$adresse_ip'";
			mysql_query($sql) or die(mysql_error());				
		 }		
         
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
					
					<table width="60%" border="1" cellspacing="0" cellpadding="0">
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
