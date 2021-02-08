<?
include_once("../include/config.php");
include_once("session.php");

$RestoID = $_COOKIE["systa_restoid"];
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript" type="text/javascript" src="js/script.js"></script>
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
	if(!confirm("ATTENTION\rVoulez vous vraiment supprimer toutes les photos cette famille ?"))
	{
		return (false);	
	}
	else 
		return true;
}
//-->
</SCRIPT>
</head>

<body>
<table border="0"  align="left" width="100%" cellspacing="0" cellpadding="0">
<tr>
	<td colspan="2" height="20px"><?php include ("top.php"); ?></td>
</tr>
<tr>
<td valign="top" width="100%" bgcolor="#FFA54F">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table border="0" cellspacing="0" cellpadding="0" width="107%" bgcolor="#FFA54F">
      <tr>
        <td valign="top" colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="left"><table width="222" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="28" bgcolor="#FFA54F">&nbsp;</td>
              <td width="178" bgcolor="#FFA54F"><span class="header2">Photo pour toute la sous famille </span></td>
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
		  	            
            <td width="100%" align="center" valign="top"><p><strong>Attention ! Si des photos existent pour certains articles de la sous famille, elles seront supprim&eacute;es et remplac&eacute;es par celle que vous t&eacute;l&eacute;chargerez.</strong></p>
              <? if ($erreur==1) { ?><p>Veuillez choisir un fichier !</p><? } ?>
			  <form name="form1" method="post" action="photo_sous_famille_ok.php" enctype="multipart/form-data"><table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>S&eacute;lectionnez votre image </td>
                  <td><input name="Image" type="file" class="input2"></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="center">
                    <input name="SousFamilleID" type="hidden" id="SousFamilleID" value="<? echo $SousFamilleID; ?>">
                    <input type="submit" name="Submit" value="Envoyer">
                  </div></td>
                  </tr>
              </table>
			  </form>			    
			  <p>Supprimer toutes les photos de la sous famille ?</p>
			  <form name="form2" method="post" action="photo_sous_famille_del.php">
			    <input type="submit" name="Submit2" value="Supprimer tout" onClick="return ConfirmDel();">
			    <input name="SousFamilleID" type="hidden" id="SousFamilleID" value="<? echo $SousFamilleID; ?>">
			  </form>			  <p>&nbsp; </p></td>
          </tr>
          <tr>
            <td align="center" valign="top">&nbsp;</td>
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