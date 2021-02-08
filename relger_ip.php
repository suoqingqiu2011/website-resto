<?php
	//include_once("../include/config.php");
	//include_once("session.php");
	
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	include_once("../include/config.php");
	include_once("session.php");	
	$name = $_COOKIE["systa_restoname"];

	/*$sql="delete from tableip Where `ip`='$ipadress'";
	print $sql;
	mysql_query($sql) or die(mysql_error());*/
	if($_SESSION['lang']=="fr"){ 
		 if($action == "confirm_ajout"){	 
            $str1="select * from tableip where `ip`='$adresse_ip'";
			$res1=mysql_query($str1);	
			$aff1=mysql_fetch_array($res1);
            if($aff1['ip'] != null){
             	echo "<script> alert('Il existe ce IP Adresse'); </script>";
			}else{		
				echo "<script> alert('Ajouter IP Adresse et Table Number!'); </script>";		
				$sql="Insert into tableip (`ip`,`num`) values ('$adresse_ip','$table_number')";   
					print $sql;
				mysql_query($sql) or die(mysql_error());	
			}				
			
		 }elseif($action == "confirm_modif"){	
		 
			echo "<script> alert('Modifier IP Adresse et Table Number!'); </script>";		 
			$sql="update tableip set `num`='$table_number' where `ip`='$ipadress' ";
			
			print $sql;
			mysql_query($sql) or die(mysql_error());
		
		 }elseif($action == "delete_table_ip"){
			 
			echo "<script> alert('Supprimer IP Adresse et Table Number!'); </script>";
			$sql="delete from tableip Where `ip`='$ipadress'";
			print $sql;
			mysql_query($sql) or die(mysql_error());		
			
		 }			
	}	

    if($_SESSION['lang']=="cn"){ 
		 
		 if($action =="确认增加ip地址"||$action == "confirm_ajout_table_ip"){	 
            $str1="select * from tableip where `ip`='$adresse_ip'";
			$res1=mysql_query($str1);		
			$aff1=mysql_fetch_array($res1);
            if($aff1['ip'] != null){
             	/*echo "<script> alert('IP地址已经存在!'); </script>";*/
				echo "<script> alert('test ok!'); </script>";
			}else{		
				echo "<script> alert('添加IP地址对应桌号!'); </script>";		
				$sql="Insert into tableip (`ip`,`num`) values ('$adresse_ip','$table_number')";   	
				print $sql;
				mysql_query($sql) or die(mysql_error());	
			}				
		 }elseif($action == "确认修改ip地址"||$action == "confirm_modif_table_ip"){		
		 
			echo "<script> alert('修改IP地址对应桌号!'); </script>";		 
			$sql="update tableip set `num`='$table_number' where `ip`='$ipadress' ";
				
			print $sql;
			mysql_query($sql) or die(mysql_error());
		
		 }elseif($action =="删除ip地址" ||$action == "delete_table_ip"){
			 
			echo "<script> alert('删除对应的IP地址!'); </script>";
			$sql="delete from tableip Where `ip`='$ipadress'";
			print $sql;
			mysql_query($sql) or die(mysql_error());				
		 }		
         
	}		
	
?>

<html>
	<head>
	<title></title>
		<meta http-equiv="refresh" content="0; url=modifieripnumber.php">
	</head>
	<body>
	<p><?echo $action;?></p>
	</body>
</html>