<?php
	
	echo $_SERVER["SERVER_NAME"];
		$nom_annuaire = "www..com";
		$msg_bienvenue = "Restaurant-Japonais-Commande-en-ligne-Livraison-?domicile gratuite-Paris-France";
		$msg_type_annu = "sushi fondants et ultra frais livrés ?domicile,sushi, plateaux de sushi, restauration japonaise,livraison ?domicile,livraison ?domicile ou au bureau, plateaux repas, plats ?emporter,traiteur japonais, commandez en ligne vos spécialités japonaises livrées sur Paris,Restaurant ?paris, le restaurant qui vous livre a domicile !profitez de la livraison de nos plateaux-repas d'entreprise. Livraison en 30 ?45 mn. livraison cuisine chinoise ?paris,livraison cuisine japonaise ?paris, plateau, traiteur, commande par téléphone, commande en ligne ! Paiement ?la livraison";
		
			$title = "$nom_annuaire : $msg_bienvenue";
			$description = "$msg_type_annu";
			$keywords = "restauration ?domicile, livraison, commande en ligne !livraison plateaux-repas, restauration ?domicile, livreur sushi, livraison a domicile,plateaux-repas entreprise, commander, traiteur asiatique, plateaux-repas bureau,commander plateaux-repas,paris restaurant, guide restaurant, restaurants paris";
			$outline = "Restaurant ?paris, le restaurant qui vous livre a domicile!, arc de triomphe, restauration rapide, sushi, restaurant japonais, lounge, frites, Réservation, guide, resto, menu, cyril lignac, restaurant romantique, restaurant groupe, anniversaire";
			$abstract = "$nom_annuaire : resto paris, paris restaurants, restaurants parisiens, cuisine, gastronomie, restaurant parisien, restaurant ?paris, traditionnelle, resto a paris, restaurants ?paris, dejeuner, diner, repas, restaus, manger, bon plan, culinaire, sortie, pizza, choucroute, couscous, resto pas cher,restaurant italien, restaurant chinois, gourmet, traiteur, mariage, affaires, karaoke, vin, bordeaux, soir";
				
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
	
?>
<META NAME="audience" CONTENT="All">
<META NAME="Identifier-URL" CONTENT="http://www..com/">
<meta name="robots" content="follow,index,all">
<META NAME="revisit-after" CONTENT="1 week">
<META NAME="Generator" CONTENT="html,php,mysql,javascript">

