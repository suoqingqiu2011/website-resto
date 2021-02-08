<?
	//ajouter pour change language by liu
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	include_once("../include/config.php");
	include_once("session.php");

	$RestoID = $_COOKIE["systa_restoid"];
	if ($FamilleID=="") {
		$str2="select * from $tb_famille where RestoID='$RestoID' ORDER BY SortID LIMIT 1";
		$res2=mysql_query($str2);
		while($aff2=mysql_fetch_array($res2)) {
			$FamilleID=$aff2['MenuTypeID'];
		}
	}
	$str2="select * from sous_famille where RestoID='$RestoID' && FamilleID=$FamilleID";
		$res2=mysql_query($str2);
		while($aff2=mysql_fetch_array($res2)) {
			$sous_famille_presentes=1;
		}
	$main_content = 0;
	$str4="select * from ".$tb_main_page_style." where RestoID='$RestoID' ORDER BY id LIMIT 1";
	$res4=mysql_query($str4);
	while($aff4=mysql_fetch_array($res4)) {
		$main_content = 1;
	}
	if($main_content == 1){
		if(isset($_POST["content"])){
			mysql_query("update ".$tb_main_page_style." set content = '".$_POST["content"]."' where RestoID='$RestoID'");
		}
		if(isset($_POST["style"])){
			mysql_query("update ".$tb_main_page_style." set style = '".$_POST["style"]."' where RestoID='$RestoID'");
		}
	}else{
		if(isset($_POST["content"])){
			mysql_query("insert into ".$tb_main_page_style." (RestoID, content, style) values ('$RestoID','".$_POST["content"]."','main.css')");
		}
	}
?>

<html>
<head>
<title><? print m_sugg_menu; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript">
	function writediv(texte) {
		 document.getElementById('affichage_sous_menu').innerHTML = texte;
	}
	function affichage_sous_menu() {
		if(texte = file('affichage_sous_menu.php?restoID=<? echo $RestoID; ?>&familleID='+escape(document.getElementById('deroulant_familleID').value)+'&sousfamilleID=<? echo $SousFamilleID; ?>')){
			writediv(texte);
		}
	}
	function file(fichier){
		 if(window.XMLHttpRequest) // FIREFOX
			  xhr_object = new XMLHttpRequest();
		 else if(window.ActiveXObject) // IE
			  xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
		 else
			  return(false);
		 xhr_object.open("GET", fichier, false);
		 xhr_object.send(null);
		 if(xhr_object.readyState == 4) 
			 return(xhr_object.responseText);
		 else return(false);
	} 
</script>

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
	  //ajouter pour changer language by liu 15/05/2010
	  var alert1= "<? print alert_ch_famille; ?>";
	  var alert2= "<? print alert_rem_code; ?>";
	  var alert3= "<? print alert_reserver; ?>";
	  var alert4= "<? print alert_fdelite; ?>";
	  var alert5= "<? print alert_remplisser_nom; ?>";
	  var alert6= "<? print alert_rem_prix; ?>";
	  var alert7= "<? print alert_valeur_prix; ?>";
	  
	  if (form1.FamilleID.value=="") { //change Faille a FalilleID. si non check() marche pas
			alert(alert1);
			form1.FamilleID.focus();		
			return (false);
		}else if (form1.Code.value=="") {
			alert(alert2);
			form1.Code.focus();		
			return (false);
		}else if (form1.Code.value=="0") {
			alert(alert3);
			form1.Code.focus();		
			return (false);
		}else if (form1.Code.value=="FIDELITE") {
			alert(alert4);
			form1.Code.focus();		
			return (false);
		}else if (form1.Name.value=="") {
			alert(alert5);
			form1.Name.focus();		
			return (false);
		}else if (form1.Prix.value=="") {
			alert(alert6);
			form1.Prix.focus();		
			return (false);
		}else if(!isNumber(form1.Prix.value))
		{
		alert(alert7);
		form1.Prix.focus();		
			return (false);
		}else
			return true;
	}
</script>

</head>

<body onLoad="affichage_sous_menu()">
 <table border="0" align="left" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" height="20px"><?php include ("top.php"); ?></td>
	</tr>
	<tr>
      <td valign="top" width="90%" bgcolor="#FFA54F">
       <table width="90%" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <td>
		      <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#FFA54F">
			   <tr> <td valign="top" colspan="3">&nbsp;</td> </tr>
			   <tr> <td colspan="3" align="left"><table width="222" border="0" cellspacing="0" cellpadding="0">
			   <tr>
				  <td width="28" bgcolor="#FFA54F">&nbsp;</td>
				  <td width="178" bgcolor="#FFA54F"><span class="header2"><? print m_page_modif; ?></span></td>
				  <td width="16">&nbsp;</td>
			   </tr>
              </table>
			</td>
         </tr>	 
      <tr>
        <td valign="top">&nbsp;</td>
        <td colspan="2" valign="top" bgcolor="#FFA54F">&nbsp;</td>
      </tr>  
      <tr>
        <td width="17" valign="top"><font size="1">&nbsp;</font></td>
        <td colspan="2" valign="top" bgcolor="#FFA54F"><table width="100%" height="291"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="52%" align="center" valign="top"><table width="99%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">
                  <?php
				  	$str3="select * from ".$tb_main_page_style." where RestoID='$RestoID' ORDER BY id LIMIT 1";
						$res3=mysql_query($str3);
						$content="content text";
						$style="main.css";
						while($aff3=mysql_fetch_array($res3)) {
						$content=$aff3['content'];
						$style=$aff3['style'];
					}
				  ?>
                  <form action="main_page_modif.php" method="post">
                  <?php include("fckeditor/fckeditor_php5.php");
						$oFCKeditor = new FCKeditor('content');
						$oFCKeditor->BasePath = 'fckeditor/';   
						$oFCKeditor->ToolbarSet = 'Default';
						$oFCKeditor->InstanceName = 'content';
						$oFCKeditor->Width = '100%';
						$oFCKeditor->Height = '600';
						$oFCKeditor->Value  = $content;
						$oFCKeditor->Create();
				  ?>
                  </td>
                </tr>
            </table>
			Style ：<input id="style" name="style" type="text" value="<?php echo $style;?>"/>
             <input type="submit" name="Submit" value="<? print Modifier; ?>">
            </form>
            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td colspan="2" align="center" bgcolor="#FFA54F">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top" colspan="3">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

</td></tr>
<tr>
	<td colspan="2"><?php include ("bottom.php"); ?></td>
</tr>
</table>
</body>
</html>