<?php
/*	$sql = "SELECT L.LivraisonID,L.Mini AS Mini,V.CP,V.Ville FROM resto_livraison AS L, ville AS V WHERE V.VilleID=L.VilleID && RestoID='".$restoID."' ORDER BY Mini,Ville";
	$res = mysql_query($sql) or die(mysql_error());
	$meta_clef=array(" ");
	while($row = mysql_fetch_array($res))
	{
	if (substr($row['Ville'],0,5) !== 'Paris') {
		$meta_clef[] = $row['CP'];
		$meta_clef[] = $row['Ville'];
		}
	else { $meta_clef[] = $row['Ville']; }
	}
		$meta_clef[]="resto japonais commande en ligne ";
		$meta_clef[]="commande en ligne sushi ";
		$meta_clef[]="livraison a domicile plat japonais ";
		$meta_clef[]="sushi livraison a domicile ";
		$meta_clef[]="resto japonais livraison a domicile ";
		
		
		$compteur = count($meta_clef);
$i = 1;
while ($i < $compteur) {
$KEYWORD_META = $KEYWORD_META." ".$meta_clef[$i];
$i++;
}
	
	
		$nom_annuaire = "".$_SERVER["SERVER_NAME"];
		$msg_bienvenue = "Restaurant-Japonais-Commande-en-ligne-Livraison-a-domicile gratuite-Paris-France";
		$msg_type_annu = "sushi fondants et ultra frais livrés ?domicile,sushi, plateaux de sushi, restauration japonaise,livraison ?domicile,livraison ?domicile ou au bureau, plateaux repas, plats ?emporter,traiteur japonais, commandez en ligne vos spécialités japonaises livrées sur Paris,Restaurant ?paris, le restaurant qui vous livre a domicile !profitez de la livraison de nos plateaux-repas d'entreprise. Livraison en 30 ?45 mn. livraison cuisine chinoise ?paris,livraison cuisine japonaise ?paris, plateau, traiteur, commande par téléphone, commande en ligne ! Paiement ?la livraison";
		
			$title = "$nom_annuaire : $msg_bienvenue";
			$description = "$msg_type_annu";
			$keywords = $KEYWORD_META;
			$outline = $KEYWORD_META;
			$abstract = "$nom_annuaire : ".$KEYWORD_META;
				
		// Le tag <TITLE> ne peut comporter plus de 66 caractères
		$title = htmlspecialchars(substr($title,0,100));
		// Le meta Description ne peut comporter plus de 255 caractères
		$description = htmlspecialchars(substr(preg_replace("/\r|\n/",'',$description),0,255));
		
		// Affichage du title et du meta Description
		echo "<title>$title</title>\n";
		echo "<META NAME=\"description\" CONTENT=\"$description\">\n";
		echo "<META NAME=\"Keywords\" LANG=\"fr\" CONTENT=\"$keywords\">\n";
		echo "<META NAME=\"OUTLINE\" LANG=\"fr\" CONTENT=\"$outline\">\n";
		echo "<META NAME=\"Abstract\" LANG=\"fr\" CONTENT=\"$abstract\">\n";
$url=$_SERVER['HTTP_HOST'];
$url=str_replace('www.','',$url);		*/
?>
<META NAME="audience" CONTENT="All">
<META NAME="Identifier-URL" CONTENT="http://www.<? echo $url; ?>/">
<meta name="robots" content="follow,index,all">
<META NAME="revisit-after" CONTENT="1 week">
<META NAME="Generator" CONTENT="html,php,mysql,javascript">

