<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?
	//ajouter pour change language by liu
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	//end
	include_once("../include/config.php");
	include_once("../include/config_perso.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];


?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title><? print t_Gestion_Menus; ?></title>
	<link rel="stylesheet" href="css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css1/component.css" />
	<link rel="stylesheet" type="text/css" href="css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="css1/style1.css" />
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script language="JavaScript" type="text/JavaScript">
	
	function ConfirmDel(){
		//ajouter by liu pour changer la language
		var alert_menu= "<? print alter_adminmenu_su; ?>";
		if(!confirm(alert_menu)){
			return (false);	
		}else 
			return true;
	}
	function ConfirmImage(){
		//ajouter by liu pour changer la language
		var alert_image= "<? print alter_adminmenu_image; ?>";
		if(!confirm(alert_image)){
			return (false);	
		}else 
			return true;
	}
	function isNumber(oNum){
	  if(!oNum) return false;
	  var strP=/^\d+(\.\d+)?$/;
	  if(!strP.test(oNum)) 
		return false;
	  try{
		if(parseFloat(oNum)!=oNum) return false;
	  }
	  catch(ex){
		return false;
	  }  
	  return true;
	}
	function check()
	{
	  //ajouter pour changer language by liu 15/05/2010
	  
	  var alert2= "<? print alert_rem_code; ?>";
	  var alert3= "<? print alert_reserver; ?>";
	  var alert4= "<? print alert_fdelite; ?>";
	  var alert5= "<? print alert_remplisser_nom; ?>";
	  var alert6= "<? print alert_rem_prix; ?>";
	  var alert7= "<? print alert_valeur_prix; ?>";
	  
	   if (form1.Code.value=="") {
		alert(alert2);
		form1.Code.focus();		
			return (false);
		}
		else if (form1.Code.value=="0") {
		alert(alert3);
		form1.Code.focus();		
			return (false);
		}
		else if (form1.Code.value=="FIDELITE") {
		alert(alert4);
		form1.Code.focus();		
			return (false);
		}
		else if (form1.Name.value=="") {
		alert(alert5);
		form1.Name.focus();		
			return (false);
		}
		else if (form1.Prix.value=="") {
		alert(alert6);
		form1.Prix.focus();		
			return (false);
		}
		else if(!isNumber(form1.Prix.value))
		{
		alert(alert7);
		form1.Prix.focus();		
			return (false);
		}
		else
			return true;
	}
	</script>
</head>



<form name="form1" action="savemenu0.php" method="post" enctype="multipart/form-data" onSubmit="return check();" style="padding-bottom:20px;">

			<div class="form">
					<h3 style="font-size:20px;"><strong><? print listing_menus; ?></strong> <span style="font-weight:normal; color:#999"><? print champ_obli; ?><span></h3>
					<p>
						<span class="req"><? print max_symbols; ?></span>
						
						<label><? print code; ?><span><? print champ_obli; ?></span></label>
						<input name="Code" type="text" class="field size1 input2" id="Code" value="<?=$row2[Code];?>" maxlength="8" onKeypress="if( (event.keyCode < 47) || ((event.keyCode > 57) && (event.keyCode <65))  || ((event.keyCode > 90) && (event.keyCode <97)) || (event.keyCode > 122)) event.returnValue=false"><!--modifier by liu pour firefox-->
						<label><? print Designation; ?><span><? print champ_obli; ?></span></label>
						<input name="Name" type="text" class="field size1 input2" id="Name" value="<?=htmlspecialchars($row2[MenuName]);?>">
						<label><? print text_prix; ?><span><? print champ_obli; ?></span></label>			
						<input name="Prix" type="text" class="field size1 input2" id="Prix" value="<?=$row2[MenuPrixPlace];?>">
						<label><? print remise ?> :<span><? print champ_obli; ?></span></label>
						<input name="Remise" type="text" class="field size1 input2" id="remise" value="500">	
						
						<label><? print tva_alc ?> :</label>
						<input name="Tva" type="checkbox" class="field_size2" id="tva" value="1" style="vertical-align:middle; float:left; margin-left:20px;"/>
						<label for="tva1" style="vertical-align:middle; margin-left:40px;"><? print tva_alc ?> </label> 
						<label><? print text_recommande; ?></label>
						<input name="Recommande" type="checkbox" class="field_size2 Recommande" id="Recommande" value="1" <? if($row2[Recommender] == 1) echo "checked";?> style="vertical-align:middle; float:left; margin-left:20px;"/>
						<label for="Rec" style="vertical-align:middle; margin-left:40px;"><? print recommande; ?></label>
						
						<label><? print menu_midi; ?> :</label>
						<input name="Menumidi" type="radio" class="field_size3" id="Menu" value="0" style="vertical-align:middle; float:left; margin-left:20px;"/>
						<label for="Menu" style="vertical-align:middle; margin-left:40px;"><? print menu_midi; ?></label>
						<input name="Menumidi" type="radio" class="field_size3" id="Menu1" value="1" checked="check" style="vertical-align:middle; float:left; margin-left:20px;"/>
						<label for="Menu1" style="vertical-align:middle; margin-left:40px;"><? print menu_normale; ?> </label>
					</p>	
					
					<p>
						<span class="req"><? print max_symbols; ?></span>
						<label><? print Composition; ?></label>
						<textarea class="field size1 input2" rows="10" cols="30" name="Note" id="Note"><?=htmlspecialchars($row2[Note]);?></textarea>
					</p>	
					
					<label><? print text_image; ?> </label>
					<input name="Image1" class="field size1" type="text" value="<?=$row2['Image'];?>" >
					<label><? print text_image; ?> </label>
					<table class="img_insert"> 
					<tr>
					<td>
					<input name="Image" type="file" class="field size1 input2" id="imag" style="float:left;color:#000000"/>
					</td>
					</tr>
					<p>
					<? if ($row2['Image']!="") { ?>
					<? if (file_exists($ph) && $row2['Image']!="") { echo "<img src=\"$ph\" width=\"180\" height=\"140\" border=\"0\">";} else{ echo "<img src=\"images/indisponible.gif\" width=\"180\" height=\"140\" border=\"0\">";} ?> 
					<span><a href="savemenu.php?action=Supprimage&MenuID=<? echo $row2['MenuID'] ?>" onClick="return ConfirmImage();" onMouseOver="this.style.color='#990000'" onMouseOut="this.style.color='#333333'" style="color:#333333; text-decoration:underline"><? print supp_image; ?> </a><? } ?>
					</span></p>
					</td></tr></table>
					<label for="imag" style="vertical-align:middle; margin-left:40px;"><? print format_fichier; ?> </label>

					<label style="margin-top:10px;"><? print imprimants; ?> :</label>
					<input name="printer1" type="checkbox" checked="checked" class="field_size3" id="printer1" value="2" <? if($row2[Printer1] == 1) echo "checked";?> style="vertical-align:middle; float:left; margin-left:20px;"/>
					<label for="printer1" style="vertical-align:middle; margin-left:40px;"><? print imprimant1; ?>	</label>
					<input name="printer2" type="checkbox" class="field_size3" id="printer2" value="3"  style="vertical-align:middle; float:left; margin-left:20px;"/>
					<label for="printer2" style="vertical-align:middle; margin-left:40px;"><? print imprimant2; ?>	</label>
					<input name="printer3" type="checkbox" class="field_size3" id="printer3" value="4" style="vertical-align:middle; float:left; margin-left:20px;"/>
					<label for="printer3" style="vertical-align:middle; margin-left:40px;"><? print imprimant3; ?>	</label>
					<input name="printer4" type="checkbox" class="field_size3" id="printer4" value="5" style="vertical-align:middle; float:left; margin-left:20px;"/>
					<label for="printer4" style="vertical-align:middle; margin-left:40px;">i<? print imprimant4; ?>	</label>
					
					
					<input name="MenuID" type="hidden" value="<?=$MenuID;?>" >
					 <? if ($MenuID=="") { ?>
					  <input name="action" type="submit" class="submitcss" id="action" onclick="check()" style="margin-top:20px; width:180px; height:25px;" value="<? print Valider_sans_option; ?>">
					  
					  <input name="action" type="submit" class="submitcss" id="action" onclick="check()" style="margin-top:20px; width:220px; height:25px;" value="<? print valider_ajouter_option; ?>">
					  <? } else { ?>
					  <input name="action" type="submit" class="submitcss" id="action" onclick="check()" style="margin-top:20px; width:80px; height:25px;" value="<? print Modifer; ?>"><? } ?>
						
			</div>
			
			<button class="md-close"  onclick="pupclose()" style="margin-top:10px; text-align:center; width:60px; background:#000; color:#fff;"><? print close_me; ?></button>
</form>
				
<script src="js1/classie.js"></script>
<script src="js1/modalEffects.js"></script>
<script src="js1/jquery.min.js"></script>
</html>