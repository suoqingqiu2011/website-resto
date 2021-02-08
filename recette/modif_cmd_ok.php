<?
include('config.php');
if ($type=="L") {$type="LIVRAISON"; $ordernum="L";}
if ($type=="E") {$type="EMPORTER"; $ordernum="O";}
if ($type=="P") {$type="PLACE"; if ($table=="") {$ordernum="P";} else {$ordernum=$table;}}

//insert les donnees dans la base de donnee 

$sql="update commandinfo20 set `Cash`='$cash',`Cheque`='$cheque',`Ticket`='$ticket',`Carte`='$carte',Type='$type',OrderNum='$ordernum' WHERE `CommandID`='$CommandID'";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
header("Location:c_index.php?today=".$today."&aff_month=".$aff_month."&aff_year=".$aff_year);
?>