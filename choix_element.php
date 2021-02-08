<?
	//ajouter by liu 19/05/2010 pour changer la language
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	//end
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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><? print t_choix; ?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
	<!--
	.style5 {color: #00FF00}
	.style1 {color: #00FF00}
	body {
		background-image: url(../images/mainbg.gif);
		background-color: #FFA54F;
	}
	.STYLE9 {color: #FF6600}
	-->
	</style>
	<script language="javascript">
		function choix(MenuID,Name) {
			window.opener.document.getElementById('ChoixMenuID').value=MenuID;
			window.opener.document.getElementById('ecrire_choix').innerHTML=Name;
			window.close();
		}
	</script>
</head>

<body>
<table width="99%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#FFA54F">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><div class="listing2">
      <div class="titreListing"><? print choix_ele_ajou; ?></div>
      <form action="choix_element.php" method="post" name="form2" id="form2">
        <select name="FamilleID" id="FamilleID">
          <? 
		        $str2="select * from $tb_famille where RestoID='$RestoID' ORDER BY SortID";
				$res2=mysql_query($str2);
				while($aff2=mysql_fetch_array($res2)) {
					echo "<option value='".$aff2['MenuTypeID']."'";
					if ($FamilleID==$aff2['MenuTypeID']) {echo " selected";}
					echo ">".$aff2['Name']."</option>";
				}
		  ?>
        </select>
        <input type="submit" name="Submit" value="<? print choix_la_famille; ?>" />
      </form>
	  
      <table width="310" height="73" class="zoneListing">
        <tr>
          <td width="26" class="rubriqueListing"><? print choix_ref; ?></td>
          <td width="93" class="rubriqueListing"><? print choix_menu; ?></td>
          <td width="100" class="rubriqueListing"><? print choix_sous_fam; ?></td>
          <td width="63"  class="rubriqueListing" align="center"><? print choix_select; ?></td>
        </tr>
        <?php 
			$sql="select * from $tb_menu where `RestoID`='$RestoID' && FamilleID='".$FamilleID."' && Options!='1' && MenuID!='".$MenuID."' order by SortID";	
			$result=mysql_query($sql);
			while($myrow=mysql_fetch_array($result)){
        ?>
         <tr>
          <td class="elementListing"><?php print($myrow[Code]);?></td>
          <td class="elementListing"><?php print($myrow[Name]);?></td>
          <td class="elementListing">
		   <?php 
			  if ($myrow[SousFamilleID]!="0") {
				$sql2="select * from sous_famille where SousFamilleID='".$myrow[SousFamilleID]."'order by SortID";	
				$result2=mysql_query($sql2);
				$myrow2=mysql_fetch_array($result2);
				echo $myrow2['Name'];
				} elseif ($sous_famille_presentes==1) {
					echo "<img src='images/attention-pt.gif'";
					$sous_famille_erreur++;
				}
				else {echo"-";}	
			?>
		  </td>
          <td class="elementListing">
		     <a href="javascript:void(0)" onclick="choix('<?php print($myrow[MenuID]);?>','<?php print($myrow[Name]);?>')">
		     <img src="images/choix.gif" width="16" height="16" border="0" />
			 </a>
		  </td>
         </tr>
        <?php } ?>
		
      </table>
    </div>
	</td>
  </tr>
 </table>
</body>
</html>
