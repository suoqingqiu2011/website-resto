<?
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
        <td valign="top">&nbsp;</td>
        <td colspan="2" valign="top" bgcolor="#FFA54F">&nbsp;</td>
      </tr>
      <tr>
        <td width="17" valign="top"><font size="1">&nbsp;</font></td>
        <td colspan="2" valign="top" bgcolor="#FFA54F"><table width="100%" height="291"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="52%" align="center" valign="top"><table width="74%"  border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="center"><div class="listing2">
                      <div class="titreListing" ><? print listing_menus; ?> </div>
                      <br>
                      <table width="386" class="zoneListing">
                        <tr>
                          <td width="33" class="rubriqueListing"><? print ref; ?></td>
                          <td width="128" class="rubriqueListing"><? print menu; ?></td>
                          <td width="115" class="rubriqueListing"><? print Famille; ?></td>
                          <td width="51" class="rubriqueListing"><? print prix; ?></td>
                          <td width="29" class="rubriqueListing"><? print Up; ?></td>
                        </tr>
                        <?php 							
                        	$sql="select * from $tb_menu where `RestoID`='$RestoID' and `MenuTypeID`='$Famille' order by `SortID`";	
							$result=mysql_query($sql);
						   	While($myrow=mysql_fetch_array($result))
							{
                        	 ?>
                        <tr>
                          <td class="elementListing"><?php print($myrow[MenuCode]);?></td>
                          <td class="elementListing"><?php print($myrow[MenuName]);?></td>
                          <td class="elementListing"><?php print(getFamilleNameByID($myrow[MenuTypeID]));?></td>
                          <td class="elementListing"><?php print($myrow[MenuPrixPlace]);?></td>
                          <td class="elementListing"><a href="sortmenu3.php?FamilleID=<?php print($myrow[MenuTypeID]);?>&MenuID=<?php print($myrow[MenuID]);?>"><img src="images/up.gif" width="13" height="13" border="0"></a></td>
						  <td class="elementListing"><input id="sort_id" name="sort_id" value="<?php print($myrow[SortID]);?>" size="5"/></td>
                        </tr>
                        <?php 
                        	 }
                        ?>
                      </table>
                  </div></td>
                </tr>
                
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
