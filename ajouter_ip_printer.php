<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title><? print m_printer; ?></title>
	<link rel="stylesheet" href="css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css1/component.css" />
	<link rel="stylesheet" type="text/css" href="css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="css1/style1.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />

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
            $str3="select * from impriment where `IP_Address`='$adresse_ip' && `Nom`='$printer_name'";
			$res3=mysql_query($str3);	
			$aff3=mysql_fetch_array($res3);
            if($aff3['IP_Address'] != null){
             	echo "<script> alert('Il existe ce IP Adresse'); </script>";
			}else if($aff3['Nom'] != null){
             	echo "<script> alert('Il existe ce nom d\'imprimante'); </script>";
			}else{		
				echo "<script> alert('Ajouter IP Adresse et Nom d'Imprimante !'); </script>";		
				$sql="Insert into impriment (`Nom`,`IP_Address`,`Nu_cmd_imp`) values ('$printer_name','$adresse_ip','$num_cmd')";   	
				mysql_query($sql) or die(mysql_error());	
			}				
			
		 }elseif($action == "ModidierIP"){	
		 
			echo "<script> alert('Modifier IP Adresse et Nom d\'Imprimante!'); </script>";		 
			//$sql="update impriment set `Nom`='$_POST[printer_name]',`IP_Address`='$adresse_ip' ,`Nu_cmd_imp`='$num_cmd' where `Nom`='$printer_name'";
			$sql="update impriment set `IP_Address`='$adresse_ip' ,`Nu_cmd_imp`='$num_cmd' where `Nom`='$printer_name'";
			mysql_query($sql) or die(mysql_error());
		
		 }elseif($action == "SupprimerIP"){
			 
			echo "<script> alert('Supprimer IP Adresse et Nom d\'Imprimante!'); </script>";
			$sql="delete from impriment Where `IP_Address`='$adresse_ip' ";
			mysql_query($sql) or die(mysql_error());		
		 
		 }			
	}	

    if($_SESSION['lang']=="cn"){ 
		 
		 if($action == "确定添加IP"){	 
            $str3="select * from impriment where `IP_Address`='$adresse_ip' && `Nom`='$printer_name'";
			$res3=mysql_query($str3);		
			$aff3=mysql_fetch_array($res3);
            if($aff3['IP_Address'] != null){
             	echo "<script> alert('IP地址已经存在!'); </script>";
			}else if($aff3['Nom'] != null){
             	echo "<script> alert('这个打印机名称已存在'); </script>";
			}else{		
				echo "<script> alert('添加IP地址对应打印机!'); </script>";		
				$sql="Insert into impriment (`Nom`,`IP_Address`,`Nu_cmd_imp`) values ('$printer_name','$adresse_ip','$num_cmd')";   	
				mysql_query($sql) or die(mysql_error());	
			}				
		 }elseif($action == "确定修改IP"){		
		 
			echo "<script> alert('修改IP地址对应打印机 !'); </script>";		 
			$sql="update impriment set `IP_Address`='$adresse_ip' ,`Nu_cmd_imp`='$num_cmd' where `Nom`='$printer_name' ";
			mysql_query($sql) or die(mysql_error());
		
		 }elseif($action == "删除ip地址"){		 
			echo "<script> alert('删除IP地址对应打印机!');</script>";		  
			$sql="delete from printerip Where `IP_Address`='$adresse_ip'";
			mysql_query($sql) or die(mysql_error());				
		 }		
         
	}	
?>



	<style>
		table tr:hover td {
		background: #fff9e1;
		}
		table th{
			background: #fffdfa url(../images/th.gif) 0 0 repeat-x;
			color: #818181;
		}
	</style>
	
	<script language="JavaScript" type="text/JavaScript">
	function check_printer()
	{
	  //ajouter pour changer language by bin 02/08/2017
	  var alert1= "<? print alert_printer_name; ?>";
	  var alert2= "<? print alert_adresse_ip; ?>";
	  var alert3= "<? print alert_format_printip; ?>";
	  var alert4= "<? print alert_num_cmd1; ?>";
	  var alert5= "<? print alert_num_cmd2; ?>";
	  
	  var printip = document.getElementById('adresseip').value;
	  var re = /^([0-9]|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.([0-9]|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.([0-9]|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.([0-9]|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])$/;  
	  
	  if (formip.printer_name.value=="") { 
		alert(alert1);
		formip.printer_name.focus();		
			return (false);
		}
		else if (formip.adresse_ip.value=="") {
		alert(alert2);
		formip.adresse_ip.focus();		
			return (false);
		}
		else if(!re.test(printip)){   
		     alert(alert3);
		     return (false);  
	    } 
		else if (formip.num_cmd.value=="") {
		alert(alert4);
		formip.num_cmd.focus();		
			return (false);
		}
		else if (formip.num_cmd.value=="0") {
		alert(alert5);
		formip.num_cmd.focus();		
			return (false);
		}
		else
			return true;
	}
	</script>
</head>

<body>
<!-- form d'infos-->
<div class="md-modal md-effect-1" id="modal-1" style="height:530px; overflow:auto;">
		<div class="md-content">
			<?php include ("form_info.php"); ?>			
		</div>
</div> 
<!-- End form d'infos-->

<div id="bg"></div>
	
<?php include ("top_left_nav.php"); ?>

<!-- container -->
	<div id="container">
	<!-- contain menu -->
		<div class="shell_top">
				<!-- Small Nav -->
				<div class="small-nav">
					<div class="small_titre" style="width:190px;"><a href="ajouter_ip_printer.php"><? print m_printer; ?></a></div>
				</div>
				<!-- end Small Nav -->
				
				<!-- Main -->
				<div id="main" style="text-a">
					<div class="cl">&nbsp;</div>
					
					<!-- Content -->
					<div id="content" style="min-height:400px;">
					<!-- box -->
						<div class="box" style="min-height:380px;" >
							<div class="box-head">
								<h2><strong><? print m_printer; ?> </strong> </h2>
							</div>
							<!-- center -->
							<center style="margin: 30">      		   		      
							   <h2 style="margin-left:300px; margin-top:10px; margin-bottom:10px; margin-right:400px; width: 250px;"> 
							   <a href="ajouter_ip_printer.php" target="_self" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#2868f9;"> <img src="images/add.png" width="16" height="16" border="0"> <? print ajout_printer_ip ?> </a> </h2>
							
							   <form name="formip" method="post" action="ajouter_ip_printer.php" onSubmit="return check_printer();" >								
								   
								   <? print printer_Name; ?> : <input type="text" name="printer_name" style="width:120px;"/>
								   <? print adresse_ip; ?> : <input type="text" name="adresse_ip" id="adresseip" style="width:120px;"/>
								   <? print num_cmd_imp; ?> : <input type="text" name="num_cmd" style="width:50px;"/>
								   
								   <input type="submit" name="action" class="submitcss" id="action" value="<? echo submit_ajouter_ip; ?>"/>
								   <input type="reset" name="action" class="submitcss" id="action" value="<? echo reset_input; ?>"/>
								</form>
								<? 
									/*
									$sql1="select `Nu_cmd_imp` ,`IP_Address` ,`Nom` from impriment Where  where `Nom`='$printer_name'";
									$result1=mysql_query($sql1) OR die (mysql_error());
									$row1+=mysql_num_rows($result1);
									while($row1 = mysql_fetch_row($result1)){
										echo $row1[0]; echo "&nbsp";
										echo $row1[1]; echo "&nbsp";
										echo $row1[2]; echo "&nbsp";
										echo $row1[3]; echo "&nbsp";
										echo $row1[4]; echo "&nbsp";
										echo $row1[5]; echo "</br>";	
									} 
									*/
								?>
								<div style="height: 200px; overflow-y: scroll; float: left; margin-top: 20px; padding-left: 135px;">
								<table width="80%" border="1" cellspacing="0" cellpadding="0" style="margin-top:10px; width: 700px;">
									
								  <tr height="30" style="text-align: center">
									<th><? print printer_Name; ?></th>
									<th><? print adresse_ip; ?></th>
									<th><? print num_cmd_imp; ?></th>									
									<th><? print modif_printer_ip ?> </th>
									<th><? print delete_printer_ip ?> </th>						
								  </tr>
									<?php
									$str3="select * from impriment";
									$res3=mysql_query($str3);
									while($aff3=mysql_fetch_array($res3)) {
									 ?>
										<tr height="30" style="text-align: center">
										<?
										echo  "<td>".$aff3['Nom']."</td>";
										echo  "<td>".$aff3['IP_Address']."</td>";
										echo  "<td>".$aff3['Nu_cmd_imp']."</td>";
										?>					
										 <td> <a href="modifier_ip_printer.php?printername=<?php print($aff3['Nom']);?>&ipadress=<?php print($aff3['IP_Address']);?>&numcmd=<? print($aff3['Nu_cmd_imp'])?>" target="_self" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#2868f9;"> <img src="images/edit.png" width="16" height="16" border="0"> <? print modif_printer_ip ?> </a> </td>
										 <td> <a href="del_ip_printer.php?ipadress=<?php print($aff3[IP_Address]);?>&printername=<?php print($aff3[Nom]);?>" target="_self" onMouseOver="mouseover(this)" onMouseOut="mouseout(this)" style="color:#2868f9;"> <img src="images/delete.png" width="16" height="16" border="0"> <? print delete_printer_ip ?> </a> 
                                         </td>							
										</tr>		
									<?	
									 }
									?>				  
							   </table>	
								</div>
						   </center>			   
						  <!-- end center -->
										
						</div>
						<!-- End Box -->
					</div>
					<!-- End Content -->
				<div class="cl">&nbsp;</div>			
				</div>
				<!-- end Main -->
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