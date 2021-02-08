<?
//ajouter pour change language by liu
session_start();
include('../lang/'.$_SESSION['lang'].'.php');
//end
include_once("../include/config.php");
include_once("../include/config_perso.php");
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
?>
<html>
<head>
<title><? print m_sugg_menu; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript">
function writediv(texte)
     {
     document.getElementById('affichage_sous_menu').innerHTML = texte;
     }

function affichage_sous_menu() {
	if(texte = file('affichage_sous_menu.php?restoID=<? echo $RestoID; ?>&familleID='+escape(document.getElementById('deroulant_familleID').value)+'&sousfamilleID=<? echo $SousFamilleID; ?>'))
	{
	writediv(texte);
}
}
function file(fichier)
     {
     if(window.XMLHttpRequest) // FIREFOX
          xhr_object = new XMLHttpRequest();
     else if(window.ActiveXObject) // IE
          xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
     else
          return(false);
     xhr_object.open("GET", fichier, false);
     xhr_object.send(null);
     if(xhr_object.readyState == 4) return(xhr_object.responseText);
     else return(false);
     } 
</script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
<!--
.style5 {color: #00FF00}
.style1 {color: #00FF00}

.STYLE9 {color: #FF6600}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function ConfirmDel()
{
	//ajouter by liu pour changer la language
	var alert_menu= "<? print alter_adminmenu_su; ?>";
	if(!confirm(alert_menu))
	{
		return (false);	
	}
	else 
		return true;
}
function ConfirmImage()
{
//ajouter by liu pour changer la language
    var alert_image= "<? print alter_adminmenu_image; ?>";
	if(!confirm(alert_image))
	{
		return (false);	
	}
	else 
		return true;
}
function isNumber(oNum)
{
  if(!oNum) return false;
  var strP=/^\d+(\.\d+)?$/;
  if(!strP.test(oNum)) 
  	return false;
  try{
  	if(parseFloat(oNum)!=oNum) return false;
  }
  catch(ex)
  {
   	return false;
  }
  
  return true;
}

function check()
{

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
	}
	else if (form1.Code.value=="") {
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
//-->
</script>
</head>

<body onLoad="affichage_sous_menu()">
 <table border="0" align="left" width="100%" cellspacing="0" cellpadding="0">
 
<tr>
	<td colspan="2" height="20px"><?php include ("top.php"); ?></td>
</tr>
<tr>
<td valign="top" width="90%" bgcolor="#FFA54F">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#FFA54F">
      <tr>
        <td valign="top" colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="left"><table width="222" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="28" bgcolor="#FFA54F">&nbsp;</td>
              <td width="178" bgcolor="#FFA54F"><span class="header2"><? print m_sugg_menu; ?></span></td>
              <td width="16">&nbsp;</td>
            </tr>
        </table></td>
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
                  <td align="left"><div class="listing2">
                      <div class="titreListing"> <? print listing_menus; ?> </div>
                      <p>
                        <form name="form2" method="post" action="sugg_menu.php"><select name="FamilleID" id="FamilleID">
                          <? $str2="select * from $tb_famille where RestoID='$RestoID' ORDER BY SortID";
							$res2=mysql_query($str2);
						   	while($aff2=mysql_fetch_array($res2)) {
							echo "<option value='".$aff2['MenuTypeID']."'";
							if ($FamilleID==$aff2['MenuTypeID']) {echo " selected";}
							echo ">".$aff2['MenuTypeName']."</option>";
							}?>
                           </select> <input type="submit" name="Submit" value="<? print voir_la_famille; ?>">
                      </form>
                      </p>
                      
                       
                      <a href="adminmenu.php"><b onMouseOver="this.style.color='#990000'" onMouseOut="this.style.color='#333333'" style="color:#333333; font-weight:bold; font-size:14px; text-decoration:underline"><? print ajouter_article; ?></b></a>
                      <table width="600" height="73" class="zoneListing">
                        <tr>
                          <td width="26" class="rubriqueListing"><? print ref; ?></td>
                          <td width="93" class="rubriqueListing"><? print menu; ?></td>
                          <td width="100" class="rubriqueListing"><? print sous_famille; ?></td>
                          <td width="54" class="rubriqueListing"><? print prix; ?></td>
                          <td width="100" class="rubriqueListing">Image</td>
                          <td width="40" class="rubriqueListing"><? print add; ?></td>
                        </tr>
                        <?php 
									
                          $sql="select * from $tb_menu where `RestoID`='$RestoID' && MenuTypeID='".$FamilleID."'	 order by SortID";	
						   $result=mysql_query($sql);
						   	while($myrow=mysql_fetch_array($result))
							{
                        	 ?>
                        <tr>
                          <td class="elementListing"><?php print($myrow[MenuCode]);?></td>
                          <td class="elementListing"><?php print($myrow[MenuName]);?></td>
                          <td class="elementListing"><?php 
					if ($myrow[SousFamilleID]!="0") {$sql2="select * from sous_famille where SousFamilleID='".$myrow[SousFamilleID]."'order by SortID";	
					$result2=mysql_query($sql2);
						$myrow2=mysql_fetch_array($result2);
						echo $myrow2['Name'];
						} elseif ($sous_famille_presentes==1) {echo "<img src='images/attention-pt.gif'";
						$sous_famille_erreur++;}
						else {echo"-";}	
						  ?></td>
                          <td class="elementListing"><?php print($myrow[Prix]);?></td>
                          <td class="elementListing"><img src="<?php echo $url_img;?><?php print($myrow[MenuPath]);?>" width="80"/></td>
                          <td class="elementListing"><a href="add_suggest.php?MenuID=<?php print($myrow['MenuID']);?>&RestoID=<?php echo $RestoID;?>"><?php print add; ?></td>
                        </tr>
                        <?php 
                        	 }
                        ?>
                      </table>
                  </div></td>
                </tr>
            </table></td>
            <td width="48%" align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
            	<table width="600" height="73" class="zoneListing">
                        <tr>
                          <td width="26" class="rubriqueListing"><? print ref; ?></td>
                          <td width="93" class="rubriqueListing"><? print menu; ?></td>
                          <td width="54" class="rubriqueListing"><? print prix; ?></td>
                          <td width="54" class="rubriqueListing"><? print suppr; ?></td>
                        </tr>
                        <?php 
									
                          $sql="select * from $tb_menu as a left join ".$tb_suggestions_menu." as b on a.MenuID=b.MenuID where b.RestoID = ".$RestoID." order by a.SortID";	
						   $result=mysql_query($sql);
						   	while($myrow=mysql_fetch_array($result))
							{
                        	 ?>
                        <tr>
                          <td class="elementListing"><?php echo $myrow["MenuCode"];?></td>
                          <td class="elementListing"><?php echo $myrow["MenuName"];?></td>
                          <td class="elementListing"><?php echo $myrow["MenuPrixPlace"];?></td>
                          <td class="elementListing"><a href="del_sugg_menu.php?MenuID=<?php echo $myrow["MenuID"];?>"><img src="images/delete.png" width="16" height="16" border="0"></a></td>
                        </tr>
                        <?php 
                        	 }
                        ?>
                 </table>
            </table></td>
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