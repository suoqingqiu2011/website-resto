<?php 
	session_start();
	include("header.php");

	if (($_SESSION['panier']=="" && $_SESSION['option_qte']=="")) {
		echo '<script language="javascript">document.location.replace("rueresto-resto-japonais-commande-en-ligne-panier-login.html")</script>';
		exit;
	}
	// Exempts de frais
	$resexempt = mysql_query("select * from user_exempts_frais where `RestoID` = '$restoID' && `UserID`='".$_SESSION['login_id_'.$restoID]."'") or die(mysql_error());
	$rowexempt = mysql_fetch_array($resexempt);
	$res = mysql_query("select * from $tb_resto where `RestoID` = '$restoID'") or die(mysql_error());
	$row = mysql_fetch_array($res);
	if ($rowexempt['UserID']==$_SESSION['login_id_'.$restoID]) {
		$frais=0;
	}else {
		$frais=$row[Frais];
	}
	$sql="SELECT * FROM ".$tb_resto." WHERE RestoID='".$restoID."'";
	$req = mysql_query($sql) or die(mysql_error());
	while($data=mysql_fetch_array($req)){
		$montant_mini=$data['Mini'];
	}
?>

<script src="js/vendor/jquery-1.10.1.min.js"></script>
<script language="javascript">
	jQuery(document).ready(function(){
		affiche_heure();
		<?php 
			if ($_GET['message']==1) {
				echo "<script>alert('Vous devez être connect?pour passer commande.');</script>";
			}elseif ($_GET['message']==2) {
				echo "<script>alert('Votre panier est vide.');</script>";
			}elseif ($_GET['message']==3) {
				echo "<script>alert('Cette commande a déj?ét?validée.');</script>";
			}elseif ($_GET['message']==7) {
				echo "<script>alert('Vous avez choisi un horaire incorrect.');</script>";
			}
		?>
	});

	function affiche_heure() {
		if (document.getElementById('jourcmd').value!="0") {
			document.getElementById('heurecmd').style.display='block';
		}else {
			document.getElementById('heurecmd').style.display='none';
		}
		verifFermeture();
	}

	function writediv(texte){
		 document.getElementById('affiche_ouverture').innerHTML = texte;
	}

	function verifFermeture() {
		if(texte = file('resto_verif_ouverture.php?restoID=<?php echo $restoID; ?>&jour='+escape(document.getElementById('jourcmd').value)+'&heure='+escape(document.getElementById('hcmd').value)+'&minute='+escape(document.getElementById('mcmd').value))){		
			if (document.getElementById('jourcmd').value=="0") {
				writediv('');
				document.getElementById('valider').style.display='block';
				//alert('1.');
			}else if(texte=="0") {
				writediv('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Les commandes seront ouvertes, vous pouvez passer votre commande.</div>');
				document.getElementById('valider').style.display='block';
				//alert('2.');
			}else if(texte=="a") {
				writediv('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> La date que vous avez s&eacute;l&eacute;ctionn&eacute;e est pass&eacute;e.</div>');
				document.getElementById('valider').style.display='none';
				//alert('3.');
			}else {
				writediv('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Les commandes ne seront pas ouvertes &agrave; cette heure.<br><a href="rueresto-resto-japonais-horaires.html">Voir les horaires</a></div>');
				document.getElementById('valider').style.display='none';
				//alert('4.');
			}			
		}
	}
	
	function file(fichier){
		 if(window.XMLHttpRequest) // FIREFOX
			  xhr_object = new XMLHttpRequest();
		 else if(window.ActiveXObject) // IE
			  xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
		 else
			  return(false);
		 xhr_object.open("GET", fichier, false);
		 xhr_object.send(null);
		 if(xhr_object.readyState == 4)
			 return(xhr_object.responseText);
		 else 
			 return(false);
	} 
	
	function form_submit(){	
		if(jQuery("#mp_es").is(':checked') == false || jQuery("#mp_tr").is(':checked') == false || jQuery("#mp_ch").is(':checked') == false){
			jQuery("#form1").submit();
		}else{
			jQuery("#validcmd").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>choisir un paiement SVP !</div><a href="javascript:form_submit();" style="margin-top:20px;width:200px;" class="btn btn-primary" id="valider" name="imageField">Envoyer la commande</a>');
		}
		//jQuery("#form1").submit();
	}
	
</script>

<div style="margin-top:50px;"> </div>

<div class="container">
	<div class="row">
    	<?php include("left_col.php"); ?>
        <div class="col-lg-9">
        	<div class="page-header">
            	<h2>Confirmation de votre Commande</h2>
            </div>
            <div class="panel panel-default panel-panier" style="font-size:12px;">
               <div class="panel-body">

		         <form id="form1" name="form1" method="post" action="traitement_panier.php?mode=valider">			 		   		
					 <?php						
						$panier=$_SESSION['panier'];
						$prix_total="0";					
						$tab_panier=explode('/',$panier);
						$nb_panier=count($tab_panier)-1;
						
						if ($nb_panier>0) {
							for($i=0;$i<$nb_panier;$i++){
								$tab_article=explode(';',$tab_panier[$i]);
								$article=$tab_article['0'];
								$qte=$tab_article['1'];
								$trait_article=$tab_panier[$i];								
								$sql = "SELECT * FROM ".$tb_menu." WHERE MenuID='".$article."'";
								$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
								while($data = mysql_fetch_array($req)) {
									$prix_article = $qte*$data['MenuPrixPlace']; // Prix total par article
									$prix_total += $prix_article;
								}
							}
							$prix_total+=$prix_commission;
					   } 
					 ?>
					 
				     <div class="panier_valid" style="margin-top:20px;">
					  <div>
						<table class="table" border="0" cellspacing="0" cellpadding="0">
							<?php								   
								$panier=$_SESSION['panier'];
								$prix_total="0";
								$tab_panier=explode('/',$panier);
								$nb_panier=count($tab_panier)-1;
								if ($nb_panier>0) {
									echo '<tr><td width="160"><h3>Article</h3></td>
											  <td align="center" width="100"><h3>Prix unitaire</h3></td>
											  <td align="center" width="100"><h3>Quantit&eacute;</h3></td>
											  <td align="right" width="100"><h3>Total</h3></td>';
									echo '</tr>';															
									for($i=0;$i<$nb_panier;$i++){
										$tab_article=explode(';',$tab_panier[$i]);
										$article=$tab_article['0'];
										$qte=$tab_article['1'];
										$trait_article=$tab_panier[$i];													
										
										$sql = "SELECT * FROM ".$tb_menu." WHERE MenuID='".$article."'"; 
										$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
										while($data = mysql_fetch_array($req)) {									
											
											//Ajouter la fonction qui permet de ajouter une nouvelle commande : CHEN Tong, 2017-07-12										
											if($qte > 0){
												$prix=$data['MenuPrixPlace'];		
												echo '<tr><td valign="middle" height="30" align="left" style="text-align: center;">'.$data['MenuName'].'</td>';
												echo '<td align="center">'.format_prix($prix).'</td>';																					
												echo '<td align="center">'.$qte.'</td>';
												$prix_article=$qte*$data['MenuPrixPlace']; // Prix total par article
												$prix_total+=$prix_article;
												echo'<td align="center" ><strong>'.format_prix($prix_article).'</strong></td>';
												echo'</tr>';
											}else{
												echo "";
											}					
										}									
									}						
							   } else { ?>
								  <div class="no-article"> Aucun article dans le panier <br /> <br />
									   <img src="img/panier.gif" alt="Panier vide"/>
								  </div>
								<?php 
								}
							   ?>
					   </table>					   
					    <h2>Total de votre commande : <?php echo format_prix($prix_total); ?></h2>				 
					 </div>
				  </div>

				  <div id="validcmd">
					  <?php		
					   if($prix_total > 0){
					     echo '<a href="javascript:form_submit();" style="margin-top:0px;width:200px;" class="btn btn-primary" id="valider" name="imageField" onClick="if (window.confirm(\' Votre commande est bien enregistrÃ© !\')) {return true;} else {return false;}"> Envoyer la commande </a>';	
					   }			
					  ?>
				  </div>	
					<td align="center" width="100">					  
				       <a class="btn btn-primary" href="rueresto-cuisine-japonaise-panier.html">Retour</a>
	    	        </td>		  
		        </form>
             		 
	          </div>		  
           </div>
        </div>
    </div>
</div>

<?php include ('footer.php'); ?>
