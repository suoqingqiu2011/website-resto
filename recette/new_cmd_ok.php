<?

include('config.php');
// Nombre aléatoire
function aleat() {
	$nbr_chiffres=9;
	$i = 0;
	while($i < $nbr_chiffres) {
			$chiffre = mt_rand(0, 9); // On génère le nombre aléatoire
			$chiffres[$i] = $chiffre;
			$i++;
	}
	$nombre = null;
	// On explore le tableau $chiffres afin d'y afficher toutes les entrées qu'y s'y trouvent
	foreach ($chiffres as $caractere) {
			$nombre .= $caractere;
	}
	//Vérifie que ce n'est pas déj?dans la table
$deja=0;
$sql = "SELECT * FROM commandinfo20 WHERE CommandID=$nombre"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
	$deja=1;
	}
	if ($deja==1) {aleat();}
	else {return $nombre;}	
}
$CommandID=aleat();
$sql = "SELECT * FROM menuinfo550 WHERE MenuID=$MenuID"; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
while($data = mysql_fetch_array($req)) 
	{
$code=$data['MenuCode'];
$name=$data['MenuName'];
$prix=$data['MenuPrixPlace'];
$printer1=$data['Printer1'];
$printer2=$data['Printer2'];
$printer3=$data['Printer3'];
$printer4=$data['Printer4'];
	}
$montant=$prix*$qte;
if ($type=="P") {
	if ($table=="") {$ordernum="P";}
	else {$ordernum=$table;}
	$type="PLACE";
}
if ($type=="L") {$type="LIVRAISON"; $ordernum="L";}
if ($type=="E") {$type="EMPORTER"; $ordernum="E";}
	$sql="INSERT INTO commanddetail20 (CommandID,CmdCode,CmdName,CmdNum,CmdMontant,CmdType,CmdPrix,Printer1,Printer2,Printer3,Printer4) VALUES ('$CommandID','$code','$name','$qte','$montant','$type','$prix','$printer1','$printer2','$printer3','$printer4')";
mysql_query($sql) or die("Erreur SQL !<br>".$sql."<br>".mysql_error());
$time=$hh.$mm."00";
$sql="INSERT INTO commandinfo20 (CommandID,Montant,Time,Day,Month,Year,OrderNum,Type) VALUES
('$CommandID','$montant','$time','$day','$month','$year','$ordernum','$type')";
mysql_query($sql) or die("Erreur SQL !<br>".$sql."<br>".mysql_error());
header("Location:c_details_cmd.php?CommandID=".$CommandID."&today=".$today."&aff_month=".$aff_month."&aff_year=".$aff_year."&new_cmd=1");
?>