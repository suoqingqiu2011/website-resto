<?
include('config.php');
$sql = "SELECT * FROM commanddetail20 WHERE CommandID=$CommandID && CmdID=$CmdID";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
	$prixu=$data['CmdPrix'];
	}
$montant=$prixu*$qte;	
$sql="update commanddetail20 set `CmdNum`='$qte',`CmdMontant`='$montant'  WHERE CommandID=$CommandID && CmdID=$CmdID";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
$sql = "SELECT * FROM commanddetail20 WHERE CommandID=$CommandID";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
	$montant_cmd+=$data['CmdMontant'];
	}
$sql="update commandinfo20 set `Montant`='$montant_cmd' WHERE CommandID=$CommandID";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());	
header("Location:c_details_cmd.php?CommandID=".$CommandID."&today=".$today."&aff_month=".$aff_month."&aff_year=".$aff_year);
?>