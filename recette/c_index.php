<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
	//ajouter by liu pour changer language begin
	session_start();
	include('../../lang/'.$_SESSION['lang'].'.php');

	$RestoID = $_COOKIE["systa_restoid"];
	include('config.php');
	if ($_REQUEST['today']=="") {
		$today=date('Y-m-d');
	}else {
		$today=$_REQUEST['today'];
	}
	$sel_year=substr($today,0,4);
	$sel_month=substr($today,5,2);
	$sel_day=substr($today,8,2);
	if ($aff_month=="") {
		$aff_month=$sel_month;
	}
	if ($aff_year=="") {
		$aff_year=$sel_year;
	}
	$thisyear=date('Y');
	$nom_mois=array('',JAN,FEV,MAR,AVR,MAI,JUI,JUY,AOU,SEP,OCT,NOV,DEC);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Systa Resto &reg;</title>
	<link rel="stylesheet" href="../css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="../css1/component.css" />
	<link rel="stylesheet" type="text/css" href="../css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="../css1/style1.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script language="javascript">
		<?
		$cb_cheque_id=array();
		$sql = "SELECT * FROM commandinfo20 WHERE Year=$sel_year && Month=$sel_month && Day=$sel_day"; 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
		while($data = mysql_fetch_array($req)) 
			{
			if ($data['Cheque']>0 || $data['Carte']>0) {$cb_cheque_id[]=$data['CommandID'];}
			$cb_cheque+=$data['Cheque']+$data['Carte'];
			} 
		if ($cb_cheque>0) {echo "cb_cheque_present=true;";}
		?>

		function cb_cheque(box) {
			if (document.getElementById(box).checked==true) {
			alert('ATTENTION !\nVous 阾es sur le point de supprimer une commande ayant 閠?pay閑 par ch鑡ue et/ou carte bleue !');
			}
		}
		function check_all(state){	  
		  var i;
		  var tabInput=document.getElementsByTagName("input");
		  var n=tabInput.length;	  
		  for(i=0;i<n;i++){
			if(tabInput[i].type=='checkbox'){
				tabInput[i].checked=state;
			}
		  }
		  <? 
		  foreach($cb_cheque_id as $i) {
		     echo "document.getElementById('".$i."').checked=false;";
		  } ?>
		 }
			
</script>

<script type="text/javascript">
    // 使用js来控制表格的显示
	function openShutManager(oSourceObj,oTargetObj,shutAble,oOpenTip,oShutTip){
		var sourceObj = typeof oSourceObj == "string" ? document.getElementById(oSourceObj) : oSourceObj;
		var targetObj = typeof oTargetObj == "string" ? document.getElementById(oTargetObj) : oTargetObj;
		var openTip = oOpenTip || "";
		var shutTip = oShutTip || "";
		if(targetObj.style.display!="none"){
		   if(shutAble) return;
		   targetObj.style.display="none";
		   if(openTip && shutTip){
				sourceObj.innerHTML = shutTip; 
		   }
		} else {
		   targetObj.style.display="block";
		   if(openTip && shutTip){
			   sourceObj.innerHTML = openTip; 
		   }
		}
	}
</script>

<style>
.td_bg{
	background:#fff;
}

.td_bg:hover{
	background:url(./img/date_choix.png) no-repeat center ; 
	background-size: 100% 100%;
}

.td_down{
	background:url(./img/date_choix_comfirm.png) no-repeat center ; 
	background-size: 100% 100%;
}

.elementListing{
		min-width:80px;
		border:1px  solid #f8f8f8;
}

#tb_c{
	height:30px;
}
input[type="submit"]:enabled{
background:#000;
}
input[type="submit"]:disabled{
background:#888888;
}

</style>	
</head>

<body>

<div id="bg"></div>
	
<?php include ("top_left_nav.php"); ?>

<!-- container-->
<div id="container">
<!-- contain menu -->
<div class="shell_top">
		
		<!-- Small Nav -->
		<div class="small-nav" style="margin-top: 15px;">
			<div class="small_titre" ><a href="#"><? print m_commande; ?></a>
			<span>&gt;</span>
			<a href="c_index.php"><? print m_article_compte; ?></a></div>
		</div>
		<!-- end Small Nav -->
	
		<!-- Main -->
		<div id="main" style="text-a">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
			<!-- box-top -->
				<div class="box" style="background: transparent; overflow:auto;">
					<div style="width:40%; float:left; background:url(./img/date.png) no-repeat center ; background-size: 100% 100%;">
					<div align="center" style="padding-top:35px;">
					  <strong>
						<?
						 $premierjour=date("w", mktime (0,0,0,"$aff_month",1,"$aff_year")); // 1er jour du mois
						 $nombrejour=date("t", mktime (0,0,0,"$aff_month",1,"$aff_year")); // nombre de jour dans le mois
						 if ($premierjour==0) {
							 $premierjour=7;
						 }
						 if ($aff_month<10) {
							 $aff_sel_month=substr($aff_month,1,1);
						 }else {
							 $aff_sel_month=$aff_month;
						 }
						 echo $nom_mois[$aff_sel_month]." ".$aff_year;
						 ?>
					  </strong>          
					 </div>
					  <TABLE id="tb" border=0 align="center" style=" padding-top:10px;  padding-bottom:20px; margin-left:60px; margin-right:50px; margin-bottom:60px;" cellPadding=0 cellSpacing=1 borderColorLight=#ffffff borderColorDark=#ffffff>
						<TBODY>
						  <TR valign="middle">			
							<TD width="35" height=35 align="center" valign="middle"><strong><? echo Lun;?></strong></TD>
							<TD width="35" height=35 align="center"><strong><? echo Mar;?></strong></TD>
							<TD width="35" height=35 align="center"><strong><? echo Mer;?></strong></TD>
							<TD width="35" height=35 align="center"><strong><? echo Jeu;?></strong></TD>
							<TD width="35" height=35 align="center"><strong><? echo Ven;?></strong></TD>
							<TD width="35" height=35 align="center"><strong><? echo Sam;?></strong></TD>
							<TD width="35" height=35 align="center"><strong><? echo Dim;?></strong></TD>
						  </TR>
						  <TR>
						  <?
						$case=0;			
						for ($i=1;$i<$premierjour;$i++) {
						   echo '<TD width="35"  height=35 align="center" >&nbsp;</TD>';
						   $case++;
						}
						for ($i=1;$i<=$nombrejour;$i++) {
						   $case++;
						   if ($i>9) {
							   $jour_cal=$i;
						   }else {
							   $jour_cal="0".$i;
						   }
						   echo '<TD id="date_choix'.$aff_year.''.$aff_month.''.$jour_cal.'" name="date_cho" class="td_bg" width="35"  height=35 align="center">
						         <strong><a href="c_index.php?today='.$aff_year.'-'.$aff_month.'-'.$jour_cal.'&aff_month='.$aff_month.'&aff_year='.$aff_year.'" onclick="choi_date();">'.$i.'</a></strong></TD>';					
						if ($case>=7) {
							$case=0;
							echo'</tr><tr>';
							}
						}
						for ($i=$case;$i<7;$i++) {
							echo '<TD width="35" height=35 align="center">&nbsp;</TD>';
							$case++;
						}
						?>
						
						<? 
						echo "<script>	
								//document.write('date_choix".$sel_year."".$sel_month."".$sel_day."');						
								var classval= document.getElementById('date_choix".$sel_year."".$sel_month."".$sel_day."').getAttribute('class');
								classval = classval.replace('td_bg','td_down');
								document.getElementById('date_choix".$sel_year."".$sel_month."".$sel_day."').setAttribute('class',classval);									  
							  </script>";
						?> 															
						</TBODY>
					</TABLE>
					
					</div>		  
					<div style="width:60%; float:right; ">
					<form action="c_index.php" method="get" name="form2" id="form2">
					  <div align="center" style="margin:5px; margin-top:30px;">
						<input type="submit" id="Submit" value="<? echo m_today;?>" style=" background: #fff;width: 110px; height:25px;"/>
					  </div>
					</form>
					
					<form action="c_index.php" method="post" name="form1" id="form1" style="margin:5px;">
					  <div align="center">
					  
						<select class="field" name="aff_month" id="aff_month">
						  <option value="01"<? if($aff_month=="01") {echo " selected";} ?>><? print JAN; ?></option>
						  <option value="02"<? if($aff_month=="02") {echo " selected";} ?>><? print FEV; ?></option>
						  <option value="03"<? if($aff_month=="03") {echo " selected";} ?>><? print MAR; ?></option>
						  <option value="04"<? if($aff_month=="04") {echo " selected";} ?>><? print AVR; ?></option>
						  <option value="05"<? if($aff_month=="05") {echo " selected";} ?>><? print MAI; ?></option>
						  <option value="06"<? if($aff_month=="06") {echo " selected";} ?>><? print JUI; ?></option>
						  <option value="07"<? if($aff_month=="07") {echo " selected";} ?>><? print JUY; ?></option>
						  <option value="08"<? if($aff_month=="08") {echo " selected";} ?>><? print AOU; ?></option>
						  <option value="09"<? if($aff_month=="09") {echo " selected";} ?>><? print SEP; ?></option>
						  <option value="10"<? if($aff_month=="10") {echo " selected";} ?>><? print OCT; ?></option>
						  <option value="11"<? if($aff_month=="11") {echo " selected";} ?>><? print NOV; ?></option>
						  <option value="12"<? if($aff_month=="12") {echo " selected";} ?>><? print DEC; ?></option>
						</select>
						
						<select  class="field" name="aff_year" id="aff_year">
						  <? for ($i="2007";$i<=$thisyear;$i++) {
								   echo '<option value="'.$i.'"';
								   if ($i==$aff_year) {echo ' selected';} 
								   echo'>'.$i.'</option>';
								   }
								   ?>
						</select>
						
						<input name="today" type="hidden" id="today" value="<? echo $today?>" />
						<input type="submit" name="Submit2" value="GO" style=" background: #fff;width: 40px; height:30px;"/>
					  </div>
					</form>
					<p align="center"><strong><? print day_info;?></strong></p> 
				</div>
				
			    <div style="width:50%; float:left; margin-left:50px; margin-top:30px; padding-top:8px; padding-bottom:5px; background:#000; height:20px; border-radius:5px;">
				   <a href="###" style=" color:#fff;" onclick="openShutManager(this,'box1',false,'<? print statiq_j;?>&nbsp;<? echo $sel_day."/".$sel_month."/".$sel_year; ?>(close)&nbsp;&nbsp;∧','<? print statiq_j;?>&nbsp;<? echo $sel_day."/".$sel_month."/".$sel_year; ?>(open)&nbsp;&nbsp;∨')"><? print statiq_j;?>&nbsp;<? echo $sel_day."/".$sel_month."/".$sel_year; ?>(open)&nbsp;&nbsp;∨</a>
			    </div>
				<div id="box1" style="display:none; width:48.5%; float:left; margin-left:50px; padding:5px; border:1px solid #888888;">
						<table align="center">
						  <tr id="tb_c">	
						    <td width="20%"  align="center"><strong><? print datecmd; ?></strong></td>
							<td width="10%"  align="center"><strong><? print montant; ?></strong></td>
							<td width="10%"  align="center"><strong><? print cash; ?></strong></td>
							<td width="10%"  align="center"><strong><? print cheque; ?></strong></td>
							<td width="10%"  align="center"><strong><? print tresto; ?></strong></td>
							<td width="10%"  align="center"><strong><? print cb; ?></strong></td>
						  </tr>
						  <tr id="tb_c" >
							<?
							    //统计出当天的账单 总和计数
								$sql = "SELECT * FROM commandinfo20 WHERE Year=$sel_year && Month=$sel_month && Day=$sel_day ORDER BY  Time DESC"; 
								$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
								while($data = mysql_fetch_array($req)) {
									$Total_Montant1+=$data['Montant']; 
									$Total_Cash1+=$data['Cash']; 
									$Total_Cheque1+=$data['Cheque']; 
									$Total_Ticket1+=$data['Ticket']; 
									$Total_Carte1+=$data['Carte']; 
							    }
							?>
							<td class="elementListing" style="min-width:65px;" align="center"><strong><? print total;?></strong></td>
							<td class="elementListing" style="min-width:65px;" align="right"><strong><? echo format_prix($Total_Montant1); ?></strong></td>
							<td class="elementListing" style="min-width:65px;" align="right"><strong><? echo format_prix($Total_Cash1); ?></strong></td>
							<td class="elementListing" style="min-width:65px;" align="right"><strong><? echo format_prix($Total_Cheque1); ?></strong></td>
							<td class="elementListing" style="min-width:65px;" align="right"><strong><? echo format_prix($Total_Ticket1); ?></strong></td>
							<td class="elementListing" style="min-width:65px;" align="right"><strong><? echo format_prix($Total_Carte1); ?></strong></td>							
						  </tr>
						</table>
				</div>
				
				<div style="width:50%; float:left; margin-left:50px; margin-top:10px; padding-top:8px; padding-bottom:5px; background:#000; height:20px; border-radius:5px;">
					<a href="###" style=" color:#fff;" onclick="openShutManager(this,'box2',false,'<? print statiq_m;?>&nbsp;<? echo $sel_month."/".$sel_year; ?>(close)&nbsp;&nbsp;∧','<? print statiq_m;?>&nbsp;<? echo $sel_month."/".$sel_year; ?>(open)&nbsp;&nbsp;∨')"><? print statiq_m;?>&nbsp;<? echo $sel_month."/".$sel_year; ?>(open)&nbsp;&nbsp;∨</a>
				</div>
				<div id="box2" style="display:none; width:48.5%; float:left; margin-left:50px; margin-bottom:20px; padding:5px; border:1px solid #888888;">
						<table align="center">
						  <tr id="tb_c">	
						    <td width="20%"  align="center"><strong><? print datecmd; ?></strong></td>
							<td width="10%"  align="center"><strong><? print montant; ?></strong></td>
							<td width="10%"  align="center"><strong><? print cash; ?></strong></td>
							<td width="10%"  align="center"><strong><? print cheque; ?></strong></td>
							<td width="10%"  align="center"><strong><? print tresto; ?></strong></td>
							<td width="10%"  align="center"><strong><? print cb; ?></strong></td>
						 </tr>
  						  <tr id="tb_c">
							<?
							 //统计出当月的所有的账单
							 $sql = "SELECT * FROM commandinfo20 WHERE Year=$sel_year && Month=$sel_month ORDER BY  Time DESC"; 
							 $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
							 while($data = mysql_fetch_array($req)) {
								$Total_Montant2+=$data['Montant']; 
								$Total_Cash2+=$data['Cash']; 
								$Total_Cheque2+=$data['Cheque']; 
								$Total_Ticket2+=$data['Ticket']; 
								$Total_Carte2+=$data['Carte']; 
							 }
							?>
							<td class="elementListing" style="min-width:65px;" align="center"><strong><? print total;?></strong></td>
							<td class="elementListing" style="min-width:65px;" align="right"><strong><? echo format_prix($Total_Montant2); ?></strong></td>
							<td class="elementListing" style="min-width:65px;" align="right"><strong><? echo format_prix($Total_Cash2); ?></strong></td>
							<td class="elementListing" style="min-width:65px;" align="right"><strong><? echo format_prix($Total_Cheque2); ?></strong></td>
							<td class="elementListing" style="min-width:65px;" align="right"><strong><? echo format_prix($Total_Ticket2); ?></strong></td>
							<td class="elementListing" style="min-width:65px;" align="right"><strong><? echo format_prix($Total_Carte2); ?></strong></td>						
						  </tr>
						</table>
				</div>
				</div>
				
				<!-- end-box-top-->
				
				<!-- Box-bottom -->
				<div class="box" style=" overflow:auto; padding-bottom:20px; width:900px;">
				<!-- Box Head -->
				<div class="box-head" id="tt_list" style="padding:10px;">
					<div align="left" style="padding-left:20px; float:left; width:40%;">
					<h2><strong><? echo commd;?>&nbsp; <? echo $sel_day."/".$sel_month."/".$sel_year; ?> </strong></h2>
					<input id="Button1" type="button" value="<? print out_excel;?>" onclick="javascript:method1('menu_text')" style="margin-left:20px; margin-top:5px; background:#fff; padding-left:5px; padding-right:5px; min-width:100px;"/>
					</div>
                    
					<div align="center" class="right" style="margin-top:20px; padding-left:0px; overflow-y: scroll;  height: 300px; ">
					
					<table id="menu_text" class="zoneListing" border="1" align="center" cellpadding="2" cellspacing="0" style="margin-top:0px; margin-left:25px; margin-bottom:30px;  ">
					  </tr>
					  <form id="form2" name="form2" method="post" action="del_cmd.php">
					  <tr id="tb_c" style="height:35px;">
						<td width="20%" style="min-width: 130px;" class="elementListing rubriqueListing" align="center"><strong><? print datecmd; ?></strong></td>
						<td width="10%" class="elementListing rubriqueListing" align="center"><strong><? print montant; ?></strong></td>
						<td width="10%" class="elementListing rubriqueListing" align="center"><strong><? print cash; ?></strong></td>
						<td width="10%" class="elementListing rubriqueListing" align="center"><strong><? print cheque; ?></strong></td>
						<td width="10%" style="min-width: 105px;" class="elementListing rubriqueListing" align="center"><strong><? print tresto; ?></strong></td>
						<td width="10%" style="min-width: 105px;" class="elementListing rubriqueListing" align="center"><strong><? print cb; ?></strong></td>
						<td width="10%" class="elementListing rubriqueListing" align="center"><strong><? print type; ?></strong></td>
						<td width="10%" class="elementListing rubriqueListing" align="center"><strong><? print details; ?></strong></td>
						<!-- <td width="10%" class="elementListing rubriqueListing" align="center"><strong><? print modifier; ?></strong></td>  -->
					  </tr>
					<?
					//选择指定天数的详细的信息 
					$sql = "SELECT * FROM commandinfo20 WHERE Year=$sel_year && Month=$sel_month && Day=$sel_day ORDER BY Time DESC"; 
					$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
					while($data = mysql_fetch_array($req)) 
						{
					  ?>
					  <tr id="tb_c">					
					  <? 
						$sql2 = "SELECT * FROM repas WHERE Date='".$data['Year']."-".$data['Month']."-".$data['Day']."' && Montant='".$data['Montant']."'"; 
						$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
						while($data2 = mysql_fetch_array($req2)) {
						   $facture=$data2['FactureNum'];
						}
						if ($facture=="") {
						?>
						 <!-- <input name="efface[]" type="checkbox" id="<? echo $data['CommandID']; ?>" value="<? echo $data['CommandID']; ?>" <? if($data['Carte']>0 || $data['Cheque']>0) { echo 'onclick="cb_cheque('.$data['CommandID'].')"'; }?> /> -->
					    <? 
					    } else {
							 echo "<input type='checkbox' disabled >";
						} 
						unset($facture);
						?>
					   </td>
						<td class="elementListing" align="center"><? echo $data['Day']."/".$data['Month']."/".$data['Year']." - ".$data['Time']; ?></td>
						<td class="elementListing" align="right"><? echo format_prix($data['Montant']); $Total_Montant+=$data['Montant']; ?></td>
						<td class="elementListing" align="right"><? echo format_prix($data['Cash']); $Total_Cash+=$data['Cash']; ?></td>
						<td class="elementListing" align="right" style="color:red; font-weight:bold"><? echo format_prix($data['Cheque']); $Total_Cheque+=$data['Cheque']; ?></td>
						<td class="elementListing" align="right" style="min-width: 105px;"><? echo format_prix($data['Ticket']); $Total_Ticket+=$data['Ticket']; ?></td>
						<td class="elementListing" align="right" style="min-width: 105px; color:red; font-weight:bold"><? echo format_prix($data['Carte']); $Total_Carte+=$data['Carte']; ?></td>
						<td class="elementListing" align="center"><? echo $data['OrderNum']; ?></td>
						<td class="elementListing" align="center"><a href="c_details_cmd.php?CommandID=<? echo $data['CommandID']; ?>&amp;today=<? echo $data['Year']; ?>-<? echo $data['Month']; ?>-<? echo $data['Day']; ?>&aff_month=<? echo $aff_month; ?>&aff_year=<? echo $aff_year; ?>"><img src="img/loupe.gif" width="25" height="16" border="0" /></a></td>
						
					  </tr>
					<? } ?> 
                     <tr id="tb_c"> </tr>
					 <tr id="tb_c">
                     
					  <? if($Total_Montant != 0) { ?>
							<td class="elementListing" align="center"><strong><? print total;?></strong></td>
							<td class="elementListing" align="right"><strong><? echo format_prix($Total_Montant); ?></strong></td>
							<td class="elementListing" align="right"><strong><? echo format_prix($Total_Cash); ?></strong></td>
							<td class="elementListing" align="right"><strong><? echo format_prix($Total_Cheque); ?></strong></td>
							<td class="elementListing" align="right"><strong><? echo format_prix($Total_Ticket); ?></strong></td>
							<td class="elementListing" align="right"><strong><? echo format_prix($Total_Carte); ?></strong></td>
							<td class="elementListing" colspan="3" align="center">&nbsp;</td>
					  <? } ?> 
					 </tr>
					  
					 </form>
					</table>
					
				   </div>					
				  </div>	
				 </div>
			
			</div>
			<!-- End Content -->
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
<!-- End contain menu-->	
</div>
<!-- End Container -->

<script src="./js/out_excel.js"></script>
<script src="../js1/classie.js"></script>
<script src="../js1/modalEffects.js"></script>
<script src="../js1/jquery.min.js"></script>

<!-- Footer -->
<div id="con_footer ">
	<div class="shell">
		<?php include ("bottom.php"); ?>
	</div>
</div>
<!-- End Footer -->

</body>
</html>