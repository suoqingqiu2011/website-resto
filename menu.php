<?php include("header.php"); ?>
 
<?php
	if ($_GET['familleID']=="") {
		// R&eacute;cup&eacute;ration de la premi&egrave;re cat&eacute;gorie
		$sql="SELECT * FROM ".$tb_famille." WHERE RestoID = '".$restoID."' ORDER BY SortID LIMIT 0,1";
		$req = mysql_query($sql) or die(mysql_error());
		while($data=mysql_fetch_array($req)){
			$MenuTypeID=$data['MenuTypeID'];
		}				  
	}else {
		$MenuTypeID=$_GET['familleID'];
	}
	//Recherche des sous familles
	$sql="SELECT * FROM sous_famille WHERE MenuTypeID = '".$MenuTypeID."' && RestoID='".$restoID."' ORDER BY SortID LIMIT 1";
	$req = mysql_query($sql) or die(mysql_error());
	while($data=mysql_fetch_array($req)){
		$sous_famille_ok=1;
		$prem_sous_famille=$data['SousFamilleID'];
	}
	if ($_GET['sousFamilleID']=="") {$sousFamilleID=$prem_sous_famille;}
	else {$sousFamilleID=$_GET['sousFamilleID'];}
?>
  <div style="margin-top:50px;">
  </div>
  <div class="container">
	<div class="row">
    	<?php include("left_col.php"); ?>
        <div class="col-lg-9">
        	<div id="container_shifty" class="row">
            <?php
            	if ($sous_famille_ok==1) {
					$sql="SELECT * FROM ".$tb_menu." WHERE MenuTypeID = '".$MenuTypeID."' && RestoID='".$restoID."' && SousFamilleID='".$sousFamilleID."' ORDER BY SortID"; 
				}else {
					$sql="SELECT * FROM ".$tb_menu." WHERE MenuTypeID = '".$MenuTypeID."' && RestoID='".$restoID."' ORDER BY SortID";
				}
				$req = mysql_query($sql) or die(mysql_error());
				$list_load_img=array();
				while($data=mysql_fetch_array($req)) {
			?>
                <div class="col-lg-4 shifty-item">
                	<div class="thumbnail">
                    	<div class="div_img">
                        <div class="tip alert alert-info"><?php echo $data['Note'];?></div>
                    	<?php if ($data['MenuPath']!=''){?>
                        	<img alt="<?php echo $data['Note'];?>" class="img-thumbnail img_<?php echo $data['MenuID'];?>" src="<?php echo $url_img.''.$data['MenuPath'];?>"/>
                        <?php }else{?>
                        	<img alt="<?php echo $data['Note'];?>" class="img-thumbnail img_<?php echo $data['MenuID'];?>" src="images/indispo.gif"/>
                        <?php }?>
                        </div>
                        <p title="<?php echo $data['MenuName'];?>"><?php if(strlen($data['MenuName']) > 22){ echo substr($data['MenuName'],0,22).'...';}else{echo $data['MenuName'];}?> <strong><?php echo $data['MenuPrixPlace'];?>&euro;</strong></p>
                        <div class="btn_group">
                            <div class="qte_moins">
                                <a href="javascript:void(0)">
                                
							<? 
							    $time=date("H");	
                                if($time > $soir_ou_midi){		                      							
									if($data['MenuMidi'] == 1){
									?>
									        <img src="img/qte-moins.gif" width="30" height="30" border="0">
											</a>
											</div>
											<div class="qte_input">
												<input name="qte" type="text" disabled="disabled" class="qte" id="qte_<?php echo $data['MenuID'];?>" value="1" style="width:30px;height:30px;">
											</div>
											<div class="qte_plus">
												<a href="javascript:void(0)">
													<img src="img/qte-plus.gif" width="30" height="30" border="0">
												</a>
											</div> 
										    <a id="ajouter_cart_<?php echo $data['MenuID'];?>" class="btn btn-primary btn-lg" name="ajouter" style="height:30px; width:120px; margin-left:5px; line-height: 0.2; background-color: slategray; margin-top: 5;">ajouter</a>
									<? }else{ ?>		
                                             <img src="img/qte-moins.gif" width="30" height="30" border="0" onclick="calcul_qte('qte_<?php echo $data['MenuID'];?>','moins');">
												</a>
											</div>
											<div class="qte_input">
												<input name="qte" type="text" class="qte" id="qte_<?php echo $data['MenuID'];?>" value="1" style="width:30px;height:30px;">
											</div>
											<div class="qte_plus">
												<a href="javascript:void(0)">
													<img src="img/qte-plus.gif" width="30" height="30" border="0" onclick="calcul_qte('qte_<?php echo $data['MenuID'];?>','plus');">
												</a>
											</div>									
										    <a id="ajouter_cart_<?php echo $data['MenuID'];?>" class="btn btn-primary btn-lg" name="ajouter" style="height:30px; width:120px; margin-left:5px; line-height: 0.2;  margin-top: 5; " onclick="submit_cart(<?php echo $data['MenuID'];?>)">ajouter</a>
									<?
							        }								
							    }else{                            							
							   ?>
							          <img src="img/qte-moins.gif" width="30" height="30" border="0" onclick="calcul_qte('qte_<?php echo $data['MenuID'];?>','moins');">
									  </a>
									  </div>
									  <div class="qte_input">
											<input name="qte" type="text" class="qte" id="qte_<?php echo $data['MenuID'];?>" value="1" style="width:30px;height:30px;">
									  </div>
									  <div class="qte_plus">
										<a href="javascript:void(0)">
												<img src="img/qte-plus.gif" width="30" height="30" border="0" onclick="calcul_qte('qte_<?php echo $data['MenuID'];?>','plus');">
										</a>
									</div>
								    <a id="ajouter_cart_<?php echo $data['MenuID'];?>" class="btn btn-primary btn-lg" name="ajouter" style="height:30px; width:120px; margin-left:5px; line-height: 0.2;  margin-top: 5;" onclick="submit_cart(<?php echo $data['MenuID'];?>)">ajouter</a>
                               <?
								}							    
							 ?>	
							 
						</div>
                    </div>
                </div>
            <?php
				}
			?>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>