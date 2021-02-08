<?
include('config.php');
$sql = "SELECT * FROM commanddetail20 WHERE CommandID=$CommandID && CmdID=$CmdID"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
	$montant_article=$data['CmdMontant'];	
	}
$sql = "SELECT * FROM commandinfo20 WHERE CommandID=$CommandID"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
	$montant=$data['Montant'];
	}	
$paye=$cash+$cheque+$ticket+$carte;		
$montant_futur=$montant-$montant_article;
if ($paye<=$montant_futur) {
	$sql="delete from commanddetail20 WHERE CommandID=$CommandID && CmdID=$CmdID";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	
	$sql="update commandinfo20 set `Montant` = '$montant_futur',`Cash`='$cash',`Cheque`='$cheque',`Ticket`='$ticket',`Carte`='$carte' WHERE `CommandID`='$CommandID'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	
	header("Location:c_details_cmd.php?CommandID=".$CommandID."&today=".$today."&aff_month=".$aff_month."&aff_year=".$aff_year."&message=supprok");
}
else {
	header("Location:del_article.php?CommandID=".$CommandID."&today=".$today."&aff_month=".$aff_month."&aff_year=".$aff_year);
}
?>