<html>
  
<? 
	include("header.php"); 	    
	$res = mysql_query("select * from $tb_resto where `RestoID` = '$restoID'") or die(mysql_error());
	$row = mysql_fetch_array($res);
	if ($rowexempt['UserID']==$_SESSION['login_id_'.$restoID]) {
		$frais=0;
	} else {
		$frais=$row[Frais];
	} 
?>

<script type="text/javascript"> 
    function a_click(){		
		//获取数据库中的所有的点单信息 弹框显示出来 背景阻塞掉 : CHEN Tong 2017-07-18
		//jQuery("#addition_click").click();
		document.getElementById("addition_click").click();		
	}
	
	function disp_prompt(){
		var name=prompt("Mot de passe :","")
		if (name=="12345"){
			//跳转到首页的主页面 并将当前的账单给清空 准备下一单的客人!!!!! CHEN Tong 2017-07-18
			//document.write("Hello " + name + "!");
			//document.getElementById("addition_vider_panier").click();
			//window.open("index.php","_self");
			window.location.href="traitement_panier.php?mode=vider_panier";
        }else{
			alert("Le mot de passe n'est pas correct !!");
		}
    }
	
	function showBg() {  //显示灰色 jQuery 遮罩层 
        
		var bh = $("body").height(); 
		var bw = $("body").width(); 
		$("#fullbg").css({ height:bh, width:bw, display:"block" }); 
		$("#dialog").show(); 
	} 
	
	//关闭灰色 jQuery 遮罩 
	function closeBg() { 
		$("#fullbg,#dialog").hide(); 
	}
	
</script>

<script language="javascript">
	   function fresh(){	   
		   if(location.href.indexOf("?reload=true")<0){
			  location.href+="?reload=true";
		   }
	   }
	   setTimeout("fresh()",0.01);
</script>

<style type="text/css">
    html { z-index:3; }
	#pageheader { z-index:3; }
	body { font-family:Arial, Helvetica, sans-serif; font-size:12px; margin:0; } 
	#main { height:10px; padding-top:0px; text-align:center; } 
	#fullbg { background-color:gray; left:0; opacity:0.5; position:absolute; top:0; z-index:3; filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity:0.5; } 
	#dialog { background-color:#fff; border:5px solid rgba(0,0,0, 0.4); height:400px; left:50%; margin:-200px 0 0 -200px; padding:1px; position:fixed !important;  position:absolute; 
         top:50%; width:450px; z-index:5; border-radius:5px; display:none; } 
	#dialog p { margin:0 0 12px; height:24px; line-height:24px; background:#CCCCCC; } 
	#dialog p.close { text-align:right; padding-right:10px; } 
    #dialog p.close a { color:#fff; text-decoration:none; }
</style>

<div id="main"><a id="addition_click" name="addition_click" href="javascript:showBg();"></a> 
	<div id="fullbg"></div> 
	 
	<div id="dialog">
	    <? 
		  // <p class="close" style="margin: 5; padding:0; background-color:rgba(255,255,255,0.15);"><a href="#" onclick="closeBg();"> <img src="adminresto/images/delete.png" width="20" height="20" border="1"> </a></p> 
        ?>		
		<h2>Votre commande</h2>
		 <table border="1" cellspacing="0" cellpadding="0" style="margin:10">
		    <tr>
			     <td align="center" width="160"><b>Article</b></td>
			     <td align="center" width="100"><b>Prix unitaire</b></td>
			     <td align="center" width="100"><b>Quantit&eacute;</b></td>
			     <td align="center" width="100"><b>Total</b></td>
		    </tr>	
		   <?	  			
			//L'addition : CHEN Tong 2017-07-18
			$totalCommande = 0;	
			$nb_panier_total = 0;				
			$qtesql = "SELECT CmdCode, CmdName, CmdPrix, SUM(CmdNum) AS CmdNum FROM Commanddetail20 WHERE CommandID='".$_SESSION['id_commande_avant']."' group by CmdCode";				
			$qtereq = mysql_query($qtesql) or die(mysql_error());
			while($qtedata = mysql_fetch_array($qtereq)){			
				$nb_panier_total += $qtedata['CmdNum'];			
				$cmdTotal = $qtedata['CmdPrix'] * $qtedata['CmdNum'];	
				$totalCommande += $cmdTotal;						
				echo '<tr><td align="center" width="160"><b>'.$qtedata['CmdName'].'</b></td>
						  <td align="center" width="100"><b>'.$qtedata['CmdPrix'].'</b></td>
						  <td align="center" width="100"><b>'.$qtedata['CmdNum'].'</b></td>
						  <td align="center" width="100"><b>'.$cmdTotal.'</b></td>';
				echo '</tr>';					
			}
		  ?>
		  </table>
		  <h3 style=" margin-top: 15; ">Total de votre commande : <? echo $totalCommande;  ?> </h3>
		 <a class="btn btn-primary" href="javascript:disp_prompt();"> &nbsp;&nbsp; NEXT &nbsp;&nbsp; </a>
	</div> 
</div> 


<div style="margin-top:50px;"> </div>
<div class="container">
	<div class="row">
    	<?php  include("left_col.php"); ?>
        <div class="col-lg-9">
        	<div>
			  <div style="float:right; margin-right: 12;">
			    <?	 								   
				   //vider le panier : a la fin de l'addition : CHEN Tong 2017-07-18
				   //在结账时控制panier清空 用户不可以自己清空点单的车			  	   					   				     				   		
				   //判断结账的条件 有无点单
				   if( $totalCommande>0 ){	
					 echo '<a class="btn btn-primary" href="javascript:a_click();" class="roll_vider" onClick="if (window.confirm(\'Vous voulez payer votre addition ?\')) { return true;} else {return false;}">L\'addition</a>';	
                   }
				?>
			   </div>
               <div style="float:left"><h2>Votre nouvelle commande </h2></div><br />	
            </div>
				 		
		    <table class="table table-hover" border="2px solid yellow" align="center" cellspacing="0" cellpadding="0">
              <?php				   
				$panier=$_SESSION['panier'];
				$prix_total="0";
				$tab_panier=explode('/',$panier);
				$nb_panier=count($tab_panier)-1;			
				if ($nb_panier>0) {
					echo '<thead><tr><td width="200" class="filet" style="text-align: center;"><strong>Article</strong></td>
									<td align="center" class="filet"><strong>Prix unitaire</strong></td>
									<td align="center" class="filet"><strong>Quantit&eacute;</strong></td>
									<td align="center" width="100" class="filet"><strong>Total</strong></td>
									<td align="center" class="filet"><strong>Refresh</strong></td>
									<td align="center" width="100" class="filet"><strong>Delete</strong></td>
								</tr>
						  </thead><tbody>';	
                for($i=0;$i<$nb_panier;$i++){
                    $tab_article=explode(';',$tab_panier[$i]);
                    $article=$tab_article['0'];
                    $qte=$tab_article['1'];
                    $trait_article=$tab_panier[$i];
                    $sql = "SELECT * FROM $tb_menu WHERE MenuID='".$article."'"; 
                    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
                    while($data = mysql_fetch_array($req)) {
                        $prix=$data['MenuPrixPlace'];		
                        echo'<tr><td valign="middle" class="filet" align="left" style="text-align: center;">'.$data['MenuName'].'</td>';
                        echo '<form id="recalculer_'.$data["MenuID"].'" name="recalculer" method="post" action="traitement_panier.php">';
                        echo '<td align="center" class="filet">'.format_prix($prix).'</td>';				
						
						echo '<td align="center" class="filet" style="width:130px; padding-left: 20;">
							<div class="qte_moins">
                                <a href="javascript:void(0)">
                                    <img src="img/qte-moins.gif" width="15" height="25" border="0" onclick="calcul_qte(\'qte_'.$data["MenuID"].'\',\'moins\');">
                                </a>
                            </div>
                            <div class="qte_input">
                                <input name="qte" type="text" class="qte" id="qte_'.$data["MenuID"].'" value="'.$qte.'" style="width:30px;height:25px;">
                            </div>
                            <div class="qte_plus">
                                <a href="javascript:void(0)">
                                    <img src="img/qte-plus.gif" width="15" height="25" border="0" onclick="calcul_qte(\'qte_'.$data["MenuID"].'\',\'plus\');">
                                </a>
                            </div></td>';			
						
                         $prix_article=$qte*$data['MenuPrixPlace']; // Prix total par article
                         $prix_total+=$prix_article;		
				
                         echo'<td align="right" class="filet"><strong>'.format_prix($prix_article).'</strong></td>';				
						 echo '<td align="center" class="filet">
							        <input name="mode" type="hidden" id="mode" value="recalculer" />
								    <input name="trait_article" type="hidden" id="trait_article" value="'.$trait_article.'" />
					                 <a href="javascript:jQuery(\'#recalculer_'.$data["MenuID"].'\').submit();" title="Recalculer">
								       <span class="glyphicon glyphicon-refresh"></span>
								     </a>
								 </td>
					     </form>
                         <form id="supprimer_'.$data["MenuID"].'" name="supprimer" method="post" action="traitement_panier.php">
						     <td align="center" class="filet"><input name="mode" type="hidden" id="mode" value="supprimer" />
						     <input name="trait_article" type="hidden" id="MenuID" value="'.$trait_article.'" />
                              <a href="javascript:jQuery(\'#supprimer_'.$data["MenuID"].'\').submit();" title="Supprimer">
			                     <span class="glyphicon glyphicon-remove"></span>
							  </a>
							 </td>
					      </form>';										
                         echo'</tr></form>';
                     }
                  }
                } else {
			    ?>
                    <div class="no-article"> <br /> <br />
					    Aucun article dans le panier  <br /> <br />
                         <center> <img src="img/panier.gif" alt="Panier vide"/> </center>
					</div>
                  <?php 
				  }
                  
				   // Affichage bon de r&eacute;duction
                   $tab_reduc=explode(';',$_SESSION['reduc_resto']);	
                   $prix_reduc=$tab_reduc['0'];	
                   $qte_reduc=$tab_reduc['1'];
                   if ($qte_reduc>0)  {
                        echo '<tr><td class="filet" align="left"><strong>Bon de r&eacute;duction</strong></td><td class="filet" align="center"><strong>- '.format_prix($prix_reduc).'</strong></td><td class="filet" align="center"><strong>'.$qte_reduc.'</strong></td><td class="filet" align="right"><strong>- '.format_prix($prix_reduc*$qte_reduc).'</strong></td>';                       	
						echo '<td align="center">
							        <a href="traitement_panier.php?mode=suppr_reduc">
							         <span class="glyphicon glyphicon-remove"></span>
								   </a></td>';
                        echo'</tr>';
                        $prix_total-=$prix_reduc*$qte_reduc;				
                   }      
				    
					// Affichage du cadeau dans le panier
					if (!(empty($_SESSION['kdo']))) 
					{ // Si la session du cadeau n'est pas vide, on affiche le kdo dans le panier
						$sqlKDO="SELECT * FROM menu_cadeaux where `RestoID`='".$restoID."' && CadeauID='".$_SESSION['kdo']."'";	
						$resKDO=mysql_query($sqlKDO);
						while($dataKDO=mysql_fetch_array($resKDO)){
							echo '<tr><td align="left" class="filet"><strong>'.$dataKDO['Name'].'</strong></td><td align="center" class="filet"><strong>Offert !</strong></td><td align="center" class="filet"><strong>1</strong></td><td colspan="2" align="right" class="filet"><strong>Offert !</strong></td>';
							if ($_SESSION['panier_commande']=="ok") {
								echo '';
							}else{
								echo'<td align="center" class="filet">
								        <a href="traitement_panier.php?mode=supprcadeau&RestoID='.$restoID.'">
								        <span class="glyphicon glyphicon-remove"></span></a>
									  </td></tr>';
							}	
						}
					}
					
					// Affichage Commission		
					if ($prix_commission>0 && $prix_total>0 && $_SESSION['panier_commande']=="ok") {
						echo'</tr><tr><td class="filet" align="left">Frais de gestion</td><td align="right" class="filet"><strong>'.format_prix($prix_commission).'</strong></td><td class="filet" align="center"><strong>TTC</strong></td>';
						}
					// Affichage frais de gestion	
					if ($frais>0 && $prix_total>0 && $_SESSION['panier_commande']=="ok") {
						$prix_total+=$frais;
						echo'</tr><tr><td class="filet" align="left">Frais de gestion</td><td align="right" class="filet"><strong>'.format_prix($frais).'</strong></td><td class="filet" align="center"><strong>TTC</strong></td></tbody>';	
					}
				 ?>
                </table>
				   			  	 
                 <?php
                    $total_panier=prix_panier();
                    // Si aucun cadeau n'est dans le panier on le propose
                    if((empty($_SESSION['kdo'])) && $_SESSION['panier_commande']!="ok")  { 
                        $cadeau_mini_prix=0;
                        $sqlKDO="select * from menu_cadeaux where `RestoID`='$restoID' order by `Prix_mini` ASC limit 1";	
                        $resKDO=mysql_query($sqlKDO);
                        while($dataKDO=mysql_fetch_array($resKDO)) {
                            $cadeau_mini_prix=$dataKDO['Prix_mini'];
                        }
                        if($cadeau_mini_prix>0){
                            if ($total_panier<$cadeau_mini_prix)  {
                                $sqlKDO2="select * from menu_cadeaux where `RestoID`='$restoID' and `Prix_mini`='$cadeau_mini_prix' order by `Prix_mini`";
                            } else {
                                $sqlKDO2="select * from menu_cadeaux where `RestoID`='$restoID' and `Prix_mini`<='$total_panier' order by `Prix_mini` DESC";
                            }
                            $resKDO2=mysql_query($sqlKDO2);
                           
                            echo '<div style="text-align:right;"><span class="warning"><strong>En cadeau</strong></span> : ';
                            while($dataKDO2=mysql_fetch_array($resKDO2)) {                       
                                if ($prix_cadeau_precedent==$dataKDO2['Prix_mini'] || $prix_cadeau_precedent=="")  { //n'afficher que des cadeaux au m�me prix_mini
                                    if ($prix_cadeau_precedent==$dataKDO2['Prix_mini'])  {
                                        echo " ou ";
                                    }
                                    echo '<strong>'.$dataKDO2['Name'].'</strong>';
                                    if ($dataKDO2['Prix_mini']<=$total_panier) {
                                        echo '&nbsp;<a href="traitement_panier.php?mode=addcadeau&cadeauID='.$dataKDO2['CadeauID'].'" class="petit">- Ajouter -</a>&nbsp;';
                                    }
                                    $prix_cadeau_precedent=$dataKDO2['Prix_mini'];
                                }            
                            }
                            echo '<strong>Offert</strong> pour '.format_prix($prix_cadeau_precedent).' de commande !';
                            echo'</div>';
                            echo'<span class="petit" style="display:none;">Offre limit&eacute;e &agrave; un cadeau par commande.</span><br>';		
                        }	
                    }              
                ?>
				
                <br />			  			
                <?php 
                  if ($prix_total>0) {
                    $prix_total+=$prix_commission;
					if ($fidelite_depense>0) {
						$prevision_pts=floor($prix_total/$fidelite_depense)*$fidelite_gainpts;
					}
					echo'<div align="right" style="padding: 30px;">';
					if ($prevision_pts>0) {echo "Cette commande va vous rapporter <strong>".$prevision_pts."</strong> point";
					if ($prevision_pts>1) {echo "s";}
					echo" de fid&eacute;lit&eacute; !<br><br>";
				   }
				   echo'<strong>Total de votre commande : '.format_prix($prix_total).'</strong>';
				   if ($prix_commission>0) {
						echo' dont '.format_prix($prix_commission).' de frais de gestion';
				   }
				   echo'</div>';} 
				?>	  		          	
					
					<table border="0" align="right" cellpadding="0" cellspacing="15">
						<tr>				  				  
						  <td align="center">
							<?php    		                    						
							 if($nb_panier>0){  echo '<a class="btn btn-primary" href="rueresto-sushi-panier-valid.html">Valider</a>'; } 							 						 
							?>
						  </td>			  
						  <td align="center" width="100">					  
						   <a class="btn btn-primary" href="rueresto-livraison-a-domicile-restaurant-japonais-menu.html">Retour</a>
	    				  </td>											 
					  </tr>
                  </table>				  
           </div>	   
	 
	      
           <div style="width: 845px; margin-right:15 ; float: right;">
            	<h2>Votre commande</h2>
				<table class="table" border="2" cellspacing="0" cellpadding="0">
				  <tr>
				      <td align="center" width="160"><b>Article</b></td>
					  <td align="center" width="100"><b>Prix unitaire</b></td>
					  <td align="center" width="100"><b>Quantit&eacute;</b></td>
					  <td align="center" width="100"><b>Total</b></td>
				  </tr>	
				  
				   <?			
					//récupérer les commandes dans la base de donnee : CHEN Tong 2017-07-17
                    $totalCommande = 0;	
					$nb_panier_total = 0;				
					$qtesql = "SELECT CmdCode, CmdName, CmdPrix, SUM(CmdNum) AS CmdNum FROM Commanddetail20 WHERE CommandID='".$_SESSION['id_commande_avant']."' group by CmdCode";				
					$qtereq = mysql_query($qtesql) or die(mysql_error());
					while($qtedata = mysql_fetch_array($qtereq)){
						
						$nb_panier_total += $qtedata['CmdNum'];
						
						$cmdTotal = $qtedata['CmdPrix'] * $qtedata['CmdNum'];	
                        $totalCommande += $cmdTotal;						
						echo '<tr><td align="center" width="160"><b>'.$qtedata['CmdName'].'</b></td>
								  <td align="center" width="100"><b>'.$qtedata['CmdPrix'].'</b></td>
								  <td align="center" width="100"><b>'.$qtedata['CmdNum'].'</b></td>
								  <td align="center" width="100"><b>'.$cmdTotal.'</b></td>';
						echo '</tr>';					
					}
					if($nb_panier_total > $_SESSION['nb_panier_total']){
						 $_SESSION['nb_panier_total'] = $nb_panier_total;
					}				
				  ?>			  
				</table>	
				<h3>Total de votre commande : <? echo $totalCommande;  ?> </h3>					
           </div>  
	   
    </div>
</div>

<?php include("footer.php"); ?>
 
<html>
