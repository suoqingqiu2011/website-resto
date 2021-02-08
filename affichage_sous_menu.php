<? 
include_once("../include/config.php");
include_once("session.php");
$str="select * from sous_famille where `RestoID`='$restoID' && MenuTypeID='$familleID'";	
$res=mysql_query($str);
echo "<select name='SousFamilleID'>";
while($row=mysql_fetch_array($res)){
   $nb_sous_cat++;
?>
<option value="<?=$row[SousFamilleID];?>" <? if($row['SousFamilleID'] == $row2['SousFamilleID'] || $row['SousFamilleID']==$sousfamilleID) { echo "selected";} ?>> <?=$row[Name];?> </option>
<?
}
if ($nb_sous_cat<1) {
	echo "<option value='0'>Aucune sous famille</option>";
}
echo "</select><span class='STYLE9'>&nbsp;*</span>";
?>