<?
include('config.php');
$sql = "SELECT * FROM commandinfo20 WHERE CommandID=$CommandID"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
$montant=$data['Montant'];	
	}
$sql = "SELECT * FROM menuinfo550 WHERE MenuID=$MenuID"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
$code=$data['MenuCode'];
$type=$data['menutype'];
$name=$data['MenuName'];
$prix=$data['MenuPrixPlace'];
$printer1=$data['Printer1'];
$printer2=$data['Printer2'];
$printer3=$data['Printer3'];
$printer4=$data['Printer4'];
	}
$montant_art=$prix*$qte;	
$nouveau_montant=$montant+$prix*$qte;
$sql="INSERT INTO commanddetail20 (CommandID,CmdCode,CmdName,CmdNum,CmdMontant,CmdType,CmdPrix,Printer1,Printer2,Printer3,Printer4) VALUES ('$CommandID','$code','$name','$qte','$montant_art','$type','$prix','$printer1','$printer2','$printer3','$printer4')";
mysql_query($sql) or die("Erreur SQL !<br>".$sql."<br>".mysql_error());
$sql="update commandinfo20 set `Montant` = '$nouveau_montant' WHERE CommandID=$CommandID";
mysql_query($sql) or die("Erreur SQL !<br>".$sql."<br>".mysql_error());
header("Location:c_details_cmd.php?CommandID=".$CommandID."&today=".$today."&aff_month=".$aff_month."&aff_year=".$aff_year."&new_cmd=".$new_cmd);
?>