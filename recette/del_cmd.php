<?
include('config.php');
$efface=$_REQUEST['efface'];
for($i=0; $i<sizeof($efface);$i++){
$requete="DELETE FROM commandinfo20 WHERE CommandID='$efface[$i]'";
$req=mysql_query($requete);
$requete="DELETE FROM commanddetail20 WHERE CommandID='$efface[$i]'";
$req=mysql_query($requete);
}
header("Location:index.php?today=".$today."&aff_month=".$aff_month."&aff_year=".$aff_year);
?>