<?
include_once("../include/config.php");
include_once("session.php");

$RestoID = $_COOKIE["systa_restoid"];
$res = mysql_query("select * from $tb_resto where `RestoID` = '$RestoID'") or die (mysql_error());
$row = mysql_fetch_array($res);
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
body {
	background-image: url(../images/mainbg.gif);
}
.STYLE6 {
	color: #FF9900;
	font-weight: bold;
}
.STYLE7 {
	color: #F68E11;
	font-weight: bold;
}
-->
</style>

</head>

<body>
<table width="777" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="73">&nbsp;</td>
    <td width="663"><table border="0" cellspacing="0" cellpadding="0" width="100%" bgcolor="#9B2323">
      <tr>
        <td valign="top" colspan="3"><img src="../images/maintop.gif" width="450" border="0" /></td>
      </tr>
      <tr>
        <td colspan="3" align="left"><table width="222" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="28" bgcolor="#510000">&nbsp;</td>
              <td width="178" bgcolor="#510000"><span class="header2">Information du  restaurant </span></td>
              <td width="16"><img src="../images/round.gif" width="14" height="21" /></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="18" valign="top"><font size="1">&nbsp;</font></td>
        <td width="626" colspan="2" valign="top" bgcolor="#9B2323"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="10" colspan="4" align="center">&nbsp;</td>
          </tr>
          <tr>
            <td height="10" colspan="4" align="center"><table width="256" height="148" border="1" cellpadding="0" cellspacing="3" bordercolor="#FFFFFF">
                <tr>
                  <td><? if($row[Image] != NULL && !empty($row[Image])) echo "<img src=\"../$row[Image]\" width=\"254\" height=\"146\" border=\"0\">"; else echo "<img src=\"../images/indisponible.gif\" width=\"254\" height=\"146\" border=\"0\">";?></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td width="22%" height="30" align="right"><span class="STYLE6">Nom du restaurant: </span></td>
            <td height="30" colspan="3">&nbsp;
                <?=$row[Name];?></td>
          </tr>
          <tr>
            <td height="30" align="right"><span class="STYLE6">Adresse:</span></td>
            <td height="30" colspan="3">&nbsp;
                <?=$row[Adresse];?></td>
          </tr>
          <tr>
            <td height="30" align="right"><span class="STYLE6">Ville:</span></td>
            <td width="27%" height="30">&nbsp;
                <?=$row[Ville];?></td>
            <td width="15%" height="30" align="right"><span class="STYLE6">Code Postal:</span></td>
            <td width="36%" height="30">&nbsp;
                <?=$row[Post];?></td>
          </tr>
          <tr>
            <td height="30" align="right"><span class="STYLE6">Telephone:</span></td>
            <td height="30">&nbsp;
                <?=$row[Telephone];?></td>
            <td height="30" align="right"><span class="STYLE6">Fax:</span></td>
            <td height="30">&nbsp;
                <?=$row[Fax];?></td>
          </tr>
          <tr>
            <td height="30" align="right"><span class="STYLE6">Siret:</span></td>
            <td height="30">&nbsp;
                <?=$row[Siret];?></td>
            <td height="30" align="right"><span class="STYLE6">Email:</span></td>
            <td height="30">&nbsp;
                <?=$row[Email];?></td>
          </tr>
          <tr>
            <td height="30" align="right"><span class="STYLE6">Sous Domaine:</span></td>
            <td height="30" colspan="3">&nbsp;
                <?=$row[Domaine];?></td>
          </tr>
          <tr>
            <td height="30" align="right"><span class="STYLE6">Nombre de table:</span></td>
            <td height="30">&nbsp;
                <?=$row[Table];?></td>
            <td height="30" align="right"><span class="STYLE6">Sp&eacute;lialit&eacute;:</span></td>
            <td height="30">&nbsp;
                <?=$row[Special];?></td>
          </tr>
          <tr>
            <td height="30" align="right"><span class="STYLE6"><font 
                              face="Arial">M&eacute;tro le plus proche:&nbsp;</font></span></td>
            <td height="30" colspan="3">&nbsp;
                <?=$row[Metro];?></td>
          </tr>
          <tr>
            <td height="30" colspan="4"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="2%">&nbsp;</td>
                  <td width="98%" align="left"><table width="90%"  border="0" align="left" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><span class="STYLE6">Type de cuisine:</span></td>
                      </tr>
                      <tr>
                        <td height="19"><hr size="1" color="#B7AA0F" /></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><? getRestoCuisine($row[RestoID]);?></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="30" colspan="4"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="2%">&nbsp;</td>
                  <td width="98%" align="left"><table width="90%"  border="0" align="left" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><span class="STYLE6">Paiements: </span></td>
                      </tr>
                      <tr>
                        <td height="19"><hr size="1" color="#B7AA0F" /></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><table width="80%"  border="0" cellspacing="5" cellpadding="0">
                      <tr>
                        <?
						  	if($row[Cheque] == 1)
							{
						  ?>
                        <td><font 
                              face="Arial"><img src="images/blue.gif">&nbsp;&nbsp;
                          Ch&egrave;ques</font></td>
                        <?
							  }
							  if($row[Carte] == 1)
							{
							  ?>
                        <td><font 
                              face="Arial"><img src="images/blue.gif">&nbsp;&nbsp;Carte Bancaire</font></td>
                        <?
							  }
							  if($row[Ticket] == 1)
							{
							  ?>
                        <td><font 
                              face="Arial"><img src="images/blue.gif">&nbsp;&nbsp;Titres Restaurant </font></td>
                        <?
							  }
							  ?>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="55" colspan="4"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="2%">&nbsp;</td>
                  <td width="98%" align="left"><table width="90%"  border="0" align="left" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><span class="STYLE7">Service et prestations </span></td>
                      </tr>
                      <tr>
                        <td height="19"><hr size="1" color="#B7AA0F" /></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><table width="94%"  border="0" cellpadding="0" cellspacing="8">
                      <?
					  	$i=0;
					  	if($row[Internet] == 1)
						{
							if($i % 3 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Internet support</td>";
							$i++;
							if($i % 3 == 0)
								echo "</tr>";
						}
						if($row[Fumer] == 1)
						{
							if($i % 3 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Vrai Espace Non fumeur</td>";
							$i++;
							if($i % 3 == 0)
								echo "</tr>";
						}
						if($row[Animal] == 1)
						{
							if($i % 3 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Animaux accept&eacute;s</td>";
							$i++;
							if($i % 3 == 0)
								echo "</tr>";
						}
						if($row[ServiceAp] == 1)
						{
							if($i % 3 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Service AP 22 heures</td>";
							$i++;
							if($i % 3 == 0)
								echo "</tr>";
						}
						if($row[Open365] == 1)
						{
							if($i % 3 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Ouvert 365 jours/an</td>";
							$i++;
							if($i % 3 == 0)
								echo "</tr>";
						}
						if($row[OpenSunday] == 1)
						{
							if($i % 3 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Ouvert le dimanche</td>";
							$i++;
							if($i % 3 == 0)
								echo "</tr>";
						}
						if($row[Handicape] == 1)
						{
							if($i % 3 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Acc&egrave;s handicap&eacute;s</td>";
							$i++;
							if($i % 3 == 0)
								echo "</tr>";
						}
						if($row[Parking] == 1)
						{
							if($i % 3 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Parking</td>";
							$i++;
							if($i % 3 == 0)
								echo "</tr>";
						}
						if($row[AirCondition] == 1)
						{
							if($i % 3 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Air conditionn&eacute;</td>";
							$i++;
							if($i % 3 == 0)
								echo "</tr>";
						}
						if($row[SalonPrive] == 1)
						{
							if($i % 3 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Salon priv&eacute;</td>";
							$i++;
							if($i % 3 == 0)
								echo "</tr>";
						}
						if($row[PlatVegetarien] == 1)
						{
							if($i % 3 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Plat v&eacute;g&eacute;tarien</td>";
							$i++;
							if($i % 3 == 0)
								echo "</tr>";
						}
						if($row[MenuEnfant] == 1)
						{
							if($i % 3 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Menu enfant</td>";
							$i++;
							if($i % 3 == 0)
								echo "</tr>";
						}
					  ?>
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="40" colspan="4"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="2%">&nbsp;</td>
                  <td width="98%" align="left"><table width="90%"  border="0" align="left" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><span class="STYLE7">Type du restaurant: </span></td>
                      </tr>
                      <tr>
                        <td height="19"><hr size="1"  color="#B7AA0F" /></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><table width="80%"  border="0" cellspacing="3" cellpadding="0">
                      <?
					  	$i=0;
					  	if($row[Traditional] == 1)
						{
							if($i % 2 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Un Restaurant Traditionnel</td>";
							$i++;
							if($i % 2 == 0)
								echo "</tr>";
						}
						if($row[Rapide] == 1)
						{
							if($i % 2 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Un Restaurant Rapide</td>";
							$i++;
							if($i % 2 == 0)
								echo "</tr>";
						}
						if($row[Emporter] == 1)
						{
							if($i % 2 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Des Plats &agrave; Emporter</td>";
							$i++;
							if($i % 2 == 0)
								echo "</tr>";
						}
						if($row[Livraison] == 1)
						{
							if($i % 2 == 0)
								echo "<tr>";
							echo "<td><img src=\"images/blue.gif\">&nbsp;&nbsp;Une livraison &agrave; domicile</td>";
							$i++;
							if($i % 2 == 0)
								echo "</tr>";
						}
					  ?>
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="1" colspan="4"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="2%">&nbsp;</td>
                  <td width="98%" align="left"><table width="90%"  border="0" align="left" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><span class="STYLE7">Region pour livraison :</span></td>
                      </tr>
                      <tr>
                        <td height="19"><hr size="1" color="#B7AA0F" /></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><? getRestoLivrai($row[RestoID]);?></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="2%">&nbsp;</td>
                  <td width="5%"><span class="STYLE7">Note:</span></td>
                  <td width="93%">&nbsp;
                      <?=$row[Note];?></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="4" align="center"><input name="Submit" type="button"  onClick="window.location.href='modifyresto.php?RestoID=<?=$row[RestoID];?>'" class="submitcss" value="Modifier" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td valign="top" colspan="3"><img src="../images/mainbot.gif" width="450" border="0" /></td>
      </tr>
    </table></td>
    <td width="41">&nbsp;</td>
  </tr>
</table>
</body>
</html>
