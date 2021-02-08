<?php

	include ('include/config_perso.php');
	include ('include/config.php');
	
	// Exempts de frais
	$resexempt = mysql_query("select * from user_exempts_frais where `RestoID` = '$restoID' && `UserID`='".$_SESSION['login_id_'.$restoID]."'") or die(mysql_error());
	$rowexempt = mysql_fetch_array($resexempt);
	
	$res = mysql_query("select * from $tb_resto where `RestoID` = '$restoID'") or die(mysql_error());
	$row = mysql_fetch_array($res);
	$EnLigne = $row[EnLigne];
	$NameResto=$row[Name];
	$tel_resto=$row[Telephone];
	$name_resto=$row[Name];
	
    if ($rowexempt['UserID']==$_SESSION['login_id_'.$restoID]) {
	   $frais=0;
    }else {
	   $frais=$row[Frais];
    }
	
	//r�cup�rer la variable a partir du chemin URL
	$mode=$_REQUEST['mode'];
	$cadeauID=$_REQUEST['cadeauID'];

	// Ajouter au panier
	if ($mode=="ajout") {
		//if ($_SESSION['panier_commande']!="ok") {
		$article=$_POST['articleID'];
		$qte=$_POST['qte'];
		$ancien_panier = $_SESSION["panier"];
		$tab_panier=explode("/",$ancien_panier);
		$nb_panier=count($tab_panier);
		$verif="0";
		
		for ($i=0;$i<$nb_panier;$i++) {
			$tab_article=explode(";",$tab_panier[$i]);
			if ($article==$tab_article['0']) {$verif++;}
		}
		
		if ($verif=="0") {
				$ajout=$article.';'.$qte.'/';
				$ancien_panier = $_SESSION['panier'];
				$nouveau_panier=$ancien_panier.$ajout;
				$_SESSION['panier']=$nouveau_panier;
				$nb_panier_new = numb_art();
				if ($nb_panier_new==0) {
					echo "Panier vide <span class='glyphicon glyphicon-shopping-cart'></span>";
				} elseif ($nb_panier_new==1) {
					echo $nb_panier_new." article dans le panier <span class='glyphicon glyphicon-shopping-cart'></span>";
				} else {
					echo $nb_panier_new." articles dans le panier <span class='glyphicon glyphicon-shopping-cart'></span>";
				}
		} else {
				// Ajouter un article d�j� ds le panier
				for ($i=0;$i<$nb_panier;$i++) {
					$tab_article=explode(";",$tab_panier[$i]);
					if ($article==$tab_article['0']) {
						$trait_article=$tab_panier[$i];
					}
				}
				$qte=$_POST['qte'];
				$qte=round($qte);
				if ($qte<1) {
					$qte=1;
				}
				$ancien_panier = $_SESSION["panier"];
				$tab_article=explode(';',$trait_article);
				$article=$tab_article['0'];
				$anc_qte=$tab_article['1'];
				$new_qte=$qte+$anc_qte;
				$new=$article.';'.$new_qte.'/';
				$trait_article.="/";
				$nouveau_panier=str_replace($trait_article,$new,$ancien_panier);
				$_SESSION['panier']=$nouveau_panier;
				$nb_panier_new = numb_art();
				if ($nb_panier_new==0) {
					echo "Panier vide <span class='glyphicon glyphicon-shopping-cart'></span>";
				} elseif ($nb_panier_new==1) {
					echo $nb_panier_new." article dans le panier <span class='glyphicon glyphicon-shopping-cart'></span>";
				} else {
					echo $nb_panier_new." articles dans le panier <span class='glyphicon glyphicon-shopping-cart'></span>";
				}
		}
		
    }elseif ($mode=="supprimer") { // Supprimer un article du panier
	
		$trait_article=$_POST['trait_article'];
		$trait_article.="/";
		$ancien_panier = $_SESSION["panier"];
		$nouveau_panier=str_replace($trait_article,"",$ancien_panier);
		$_SESSION['panier']=$nouveau_panier;	
		if (!(verif_cadeau($_SESSION['kdo']))) {
			unset($_SESSION['kdo']);
		}
		header("Location:panier.php");
		
    }elseif ($mode=="recalculer") { // Recalculer total de la commande 
		$trait_article=$_POST['trait_article'];
		$qte=$_POST['qte'];
		$qte=round($qte);
		if ($qte<1) {
			$qte=1;
		}
		$ancien_panier = $_SESSION["panier"];
		$tab_article=explode(';',$trait_article);
		$article=$tab_article['0'];
		$new=$article.';'.$qte.'/';
		$trait_article.="/";
		$nouveau_panier=str_replace($trait_article,$new,$ancien_panier);
		$_SESSION['panier']=$nouveau_panier;	
		if (!(verif_cadeau($_SESSION['kdo']))) {
			unset($_SESSION['kdo']);
		}
		header("Location:panier.php");
		
    }elseif ($mode=="vider_panier") { //vider le panier 
	
	    unset($_SESSION['id_commande_avant']); //Ajouter la fonction : conserver la CommandID pour chaque fois : CHEN Tong
		$_SESSION['nb_panier_total'] = 0;
		//unset($_SESSION['nb_panier_total']);
	   
		unset($_SESSION['panier']);
		unset($_SESSION['panier_commande']);
		unset($_SESSION['reduc_resto']);
		unset($_SESSION['kdo']);
		
		header("Location:index.php");
		
    }elseif ($mode=="valider") { //valider la commande pour le premiere fois
	   
		$user=$_SESSION['login_id_'.$restoID];
		$panier=$_SESSION['panier'];	
		if (!(verif_cadeau($_SESSION['kdo']))) {
			unset($_SESSION['kdo']);
		}
		
		// V�rifie si l'horaire est correct.
		if ($jourcmd!=0) {
			$year=substr($jourcmd,0,4);
			$month=substr($jourcmd,5,2);
			$day=substr($jourcmd,8,2);
			$jour_now=$jour_cmd." ".$hcmd.":".$mcmd.":00";
			$heure_now=$hcmd.":".$mcmd.":00";
			$timestamp=mktime($hcmd,$mcmd,'00',$month,$day,$year);
			$jourdelasemaine=date('w',$timestamp);
		
			$fermeture=$fermeture_off+$fermeture_exception+$fermeture_normal;
			if ($fermeture>0) {
				header("Location:panier_valid.php?message=7"); 
				exit;
			}
		}		
		
		$note=$_POST['note'];	
		$tab_panier=explode('/',$panier);
		$nb_panier=count($tab_panier)-1;
		for($i=0; $i<$nb_panier; $i++){
			$tab_article=explode(';',$tab_panier[$i]);
			$article=$tab_article['0'];
			$qte=$tab_article['1'];
			$trait_article=$tab_panier[$i];
			
			$sql = "SELECT * FROM $tb_menu WHERE MenuID='".$article."'"; 
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			while($data = mysql_fetch_array($req)) {
				$prix_article=$qte*$data['MenuPrixPlace'];
				$prix_total+=$prix_article;
			}
		}			
		$prix_total+=$prix_commission;	
		
		if ($panier=="") {  // Pas d'utilisateur connect�
			header("Location:panier.php?message=2");			
		} elseif ($prix_total < $montant_mini ) { // Commande d�j� valid�e		
			header("Location:panier.php?message=4");			
		} else { // prix mini non, atteint
		
			$date=date('Y-m-d');
			$yearSQL=date('Y');
			$monthSQL=date('m');
			$daySQL=date('d');
			$heure=date('H:i:s');
			$date2=$jourcmd;
			$heure2=$hcmd.":".$mcmd.":00";		
			// r�cup dernier ID
			$sql = mysql_query("SELECT CommandID FROM $tb_commande ORDER BY CommandID DESC LIMIT 0,1");
			$data = mysql_fetch_array($sql);
			$id_commande = $data['CommandID']+1;
			$mp=0;
			$moyen=" - Moyen de paiement : ";
			
			//MOYEN DE PAYMENT
			$id_peyment=0;
			if ($mp_tr=="1") {
				$moyen.="Titre Resto ";
				$mp++;
				$id_peyment="12";
			}
			if ($mp_es=="1") {
				$moyen.="Esp�ces ";
				$mp++;
				$id_peyment="11";
			}
			if ($mp_ch=="1") {
				$moyen.="Ch�que ";
				$mp++;
				$id_peyment="10";
			}
			$prix_total += $frais;			
			if ($mp!=0) {
				$txt=$moyen;
				$txt_fax_livraison=$moyen;
				$txt_mail=$moyen;
			}
			
			$txt_fax_livraison.="Cmd pass�e le : ".$date." � ".$heure." - Cmd � livrer le ".substr($date2,8,2)."/".substr($date2,5,2)."/".substr($date2,0,4)." � ".$heure2." - ".$precision;
			$txt.= "Cmd � livrer le ".substr($date2,8,2)."/".substr($date2,5,2)."/".substr($date2,0,4)." � ".$heure2." - ".$precision;
			$txt_mail.="La livraison de votre commande aura lieu le ".substr($date2,8,2)."/".substr($date2,5,2)."/".substr($date2,0,4)." � partir de ".$heure2;
					
			//recuparer le IP adresse de la machaine
			if (isset($_ENV["HOSTNAME"])) 
				$MachineName = $_ENV["HOSTNAME"]; 
			else if (isset($_ENV["COMPUTERNAME"])) 
				$MachineName = $_ENV["COMPUTERNAME"]; 
			else 
				$MachineName = ""; 
			$hostname = gethostbyname($MachineName);	
            //rechercher le number de la table pour ce IP         
			$sqlIP = " SELECT num from tableip WHERE ip = '$hostname' ";
			$resIP = mysql_query($sqlIP) or die(mysql_error());
			$tableIP = mysql_fetch_array($resIP);
			$hostip = $tableIP['num'];
						     
			//这里的价格计算只是来自与本地的传递的数据 + 数据库中的数据 : CHEN Tong 2017-07-17
			if($_SESSION['panier_commande']!="ok"){
				$sql = "INSERT INTO $tb_commande VALUES('$id_commande','','$prix_total','','','','$heure','$daySQL','$monthSQL','$yearSQL','','$hostip','sur place','0','0','3','0','$prix_total','0','0','','','','','','','0','0','','0','0','0','0','$date','')";
				mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
				$_SESSION['id_commande_avant'] = $id_commande;
			}else{		
			    $sql = "SELECT Montant FROM $tb_commande WHERE CommandID='".$_SESSION['id_commande_avant']."' "; 
				$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
				$data = mysql_fetch_array($req);
			    $prix_total += $data['Montant'];
				
				$sqlUpdate = "UPDATE $tb_commande set Montant = '$prix_total', Day='$daySQL', Month='$monthSQL', Year='$yearSQL', OrderNum='$hostip', Type='sur place', Person='3', MontantBrut='$prix_total', CmdDate='$date' WHERE CommandID='".$_SESSION['id_commande_avant']."' ";		   
				mysql_query($sqlUpdate) or die('Erreur SQL !'.$sqlUpdate.'<br>'.mysql_error());
            }
			
			$sql = "UPDATE user SET Note='$note', Note2='$url_mail' WHERE UserID='$user'";
			mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());		
			$txt_fax_detail.="<br><table cellspacing='5' align='center'>
									<tr><td align='left' width='250'>D�signation</td>
									    <td align='right' width='80'>Prix Unitaire</td>
										<td align='center' width='50'>Qte</td>
										<td align='right' width='80'>Montant</td>
										</tr>";			
				
			//在commanddetail20表中存储下一个command的ID对应的所有的菜品 : CHEN Tong 2017-07-12
			$tab_panier=explode("/",$panier);
			$nb_panier=count($tab_panier);		
			for ($i=0;$i<$nb_panier;$i++){			
				$tab_article=explode(";",$tab_panier[$i]);
				$article=$tab_article['0'];
				$qte=$tab_article['1'];
				
				$sql = "SELECT * FROM $tb_menu WHERE MenuID='".$article."' && RestoID='".$restoID."'";  
				$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
				while($data = mysql_fetch_array($req)) {
					$code=$data['MenuCode'];
					$name=$data['MenuName'];
					$prix=$data['MenuPrixPlace'];
				    $placetva=$data['PlaceTVA']; 							
				
					//循环遍历一张单子的所有菜品 根据commandeID, 在对应的Commanddetail20表中查找菜品 : CHEN Tong 2017-07-13
					/*
					$qtesql = "SELECT sum(CmdNum) AS CmdNumSomme FROM Commanddetail20 WHERE CommandID='".$_SESSION['id_commande_avant']."' && CmdCode='".$data['MenuCode']."'";
					$qtereq = mysql_query($qtesql) or die(mysql_error());
					$qtedata = mysql_fetch_array($qtereq);
					$qteavant = $qtedata['CmdNumSomme'];				
					$qte = $qte - $qteavant;
					*/
					
					if($qte>0) {						
						$montant=$prix*$qte;						
						$txt_fax_detail.="<tr><td>".$name." (".$code.")</td>
						                      <td align='right'>".format_prix($prix)."</td>
											  <td align='center'>".$qte."</td
											  <td align='right'>".format_prix($montant)."</td>
										  </tr>";			
						$montantMenu = $qte*$prix;
						$sql = "INSERT INTO $tb_detail VALUES('".$_SESSION['id_commande_avant']."','$code','$name','$qte','$montantMenu','','$prix','0','','1','0','0','0','0','0','0','0','1')";  
						mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
						
						if($placetva==1){
							$chaqueMomant=$qte*$prix;
							$sql = "INSERT INTO vins20 VALUES('','".$_SESSION['id_commande_avant']."','$qte','$code','$prix','','$chaqueMomant', '$daySQL','$monthSQL','$yearSQL','')";  
							mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
						}
						$code=""; $name=""; $prix=""; $montant="";
					}
				}						
			} 
			
			$tab_reduc=explode(';',$_SESSION['reduc_resto']);	
			$prix_reduc=$tab_reduc['0'];	
			$qte_reduc=$tab_reduc['1'];
			$total_reduc=$prix_reduc*$qte_reduc;	
			if ($qte_reduc==0 || empty($qte_reduc)) {
				$reduction_autorisee++;
			} // il n'y a pas de bon de r�duction, pas besoin d'en ajouter un !
			elseif ($total_reduc>$prix_total) {
				$reduction_autorisee++;
			} // la r�duction est sup�rieure au prix, interdit !
			elseif ($qte_reduc>$fidelite_nb_bon_reduc) {
				$reduction_autorisee++;
			} // on utlise plus de bon qu'on en a, interdit !
			elseif ($fidelite_reduc>$prix_reduc) {
				$reduction_autorisee++;
			} // le bon de r�duction est plus gros que la normal, interdit !
			elseif ($fidelite_limite==1 && $qte_reduc>1) {
				$reduction_autorisee++;
			} // droit qu'� un seul bon par cmd et on en utilise plusieurs, interdit !
			else {
				$reduction_autorisee=0;
			} // Sinon on autorise					
			if ($reduction_autorisee==0) {	// Enregistrement du bon de r�duction		
				$txt_fax_detail.="<tr><td>Bon de r�duction (FIDELITE)</td>
									  <td>".$tab_reduc[1]."</td>
									  <td>".-$prix_reduc."</td>
									  <td>".-$total_reduc."</td>
									  </tr>";
				$fax_montant-=$total_reduc;
				//$sql = "INSERT INTO detail VALUES('','$id_commande','$tab_reduc[1]','FIDELITE','Bon de r�duction','-$prix_reduc','-$total_reduc')"; 
				$sql = "INSERT INTO $tb_detail VALUES('".$_SESSION['id_commande_avant']."','$code','$name','$qte','$montant','$prix','0','','1','0','0','0','0','0','0','0','0')";  
				mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
				
				// Retrancher la somme selon le nombre de bon de r�duction
				$sql = "SELECT Somme FROM fidelite_user WHERE UserID='".$user."' && RestoID='".$restoID."'"; 
				$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
				while($data = mysql_fetch_array($req)) {
					$old_somme=$data['Somme'];	
				}
				$depense_pour_un_bon=$fidelite_coutpts*$fidelite_depense;
				$depense_totale=$depense_pour_un_bon*$tab_reduc['1'];
				$new_somme=$old_somme-$depense_totale;			
				$sql = "UPDATE fidelite_user SET Somme='$new_somme' WHERE UserID='".$user."' && RestoID='".$restoID."'";
				mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
			}
			
			//Ajouter somme fid�lit�
			$exist_user=false;
			$sql = "SELECT Somme FROM fidelite_user WHERE UserID='".$user."' && RestoID='".$restoID."'"; 
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			while($data = mysql_fetch_array($req)) {
				$old_somme=$data['Somme'];
				$exist_user=true;
			}
			
			$new_somme=$old_somme+$prix_total-$prix_reduc;		
			if ($exist_user) {
				$sql = "UPDATE fidelite_user SET Somme='$new_somme' WHERE UserID='".$user."' && RestoID='".$restoID."'";
			} else {
				$sql = "INSERT INTO fidelite_user VALUES('$user','$restoID','$prix_total')";
			} 
			mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());				
			
			//Ajout: Après valider la commande : CHEN Tong 
			//全部清空本地的缓存数据
			$_SESSION['panier_commande']="ok";
			//$_SESSION['panier']=0;			
			unset($_SESSION['panier']);
			//unset($_SESSION['panier_commande']);
			unset($_SESSION['reduc_resto']);
			unset($_SESSION['kdo']);					
			
			header("Location:panier.php");			
		 }
			
	}else { //button retour
		header("Location:panier.php");
	}
	
?>