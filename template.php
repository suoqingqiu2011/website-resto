<?
include_once("../include/config.php");
include_once("session.php");
$RestoID = $_COOKIE["systa_restoid"];
$sql="SELECT * FROM restaurant WHERE RestoID='".$RestoID."'";
$req = mysql_query($sql) or die(mysql_error());
while($data=mysql_fetch_array($req)){$templateID=$data['TemplateID'];}
header("Location:template".$templateID.".php");
?>