<?
//ajouter pour changer la language by liu 
session_start();
include('../lang/'.$_SESSION['lang'].'.php');
include_once("../include/config.php");
include_once("session.php");

$RestoID = $_COOKIE["systa_restoid"];
?>
<html>
<head>
<title><? print t_ranger_menus; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript" type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
<!--
.style5 {color: #00FF00}
.style1 {color: #00FF00}
body {
	background-image: url(../images/mainbg.gif);
}
.STYLE9 {color: #FF6600}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function ConfirmDel()
{
	var alert_sort= "<? print alter_sup_fam; ?>";
	if(!confirm(alert_sort))
	{
		return (false);	
	}
	else 
		return true;
}

function check()
{
	var alert_sort1= "<? print alter_rem_fam; ?>";
  if (form1.Name.value=="") {
	alert(alert_sort1);
	form1.Name.focus();		
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
<td valign="top" width="90%" bgcolor="#FFA54F">
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
              <td width="178" bgcolor="#FFA54F"><span class="header2"><? print t_ranger_menus; ?> </span></td>
              <td width="16">&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="24" valign="top">&nbsp;</td>
        <td width="719" colspan="2" valign="top" bgcolor="#FFA54F">&nbsp;</td>
      </tr>
      <tr>
        <td width="24" height="305" valign="top"><font size="1">&nbsp;</font></td>
        <td colspan="2" align="center" bgcolor="#FFA54F"><form name="form1" method="post" action="sortmenu2.php">
          <table width="500" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="140" style="font:bold"><? print choi_famille; ?> </td>
              <td width="92">
			  <?
			  $str="select * from $tb_famille where `RestoID`='$RestoID'";	
		      $res=mysql_query($str);
			  
			  if(!empty($_POST['Submit'])) {
			   $FamilleID = $_POST['FamilleID'];
			 }
			   echo "<select name='Famille' id='Famille' class='input2'>";
			   while($row=mysql_fetch_array($res))
				{
					echo "<option value=\"$row[MenuTypeID]\">$row[MenuTypeName]</option>";
				}
				echo "</select>";
				?>              </td>
              <td width="118"><input name="Submit" type="submit" class="submitcss" value="<? print Suivant; ?>"></td>
            </tr>
          </table>
                </form>        </td>
      </tr>
      <tr>
        <td width="24" valign="top">&nbsp;</td>
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
