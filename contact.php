<?php include("header.php"); ?>

<div style="margin-top:50px;"> </div>

<?php
	function getRestoLivraison($RestoID){
		global $tb_resto_livrai;
		$sql = "SELECT L.LivraisonID,L.Mini AS Mini,V.CP,V.Ville FROM resto_livraison AS L, ville AS V WHERE V.VilleID=L.VilleID && RestoID='".$RestoID."' ORDER BY Mini,Ville";
		$res = mysql_query($sql) or die(mysql_error());
		$nCount = 0;
		echo "<table style='margin-left:auto;margin-right:auto;'>";
		echo "<tr><td> <strong>Ville</strong> </td> <td> <strong>Prix minimum de commande</strong> </td> </tr>";
		while($row = mysql_fetch_array($res)){
			echo "<tr><td style='padding-right:10px;'>$row[Ville]</td><td>".format_prix($row[Mini])."</td></tr>";	
		}
		echo "</table>";
	}
	
	$url=str_replace("www.","",$_SERVER['HTTP_HOST']);
	$sql = "SELECT * FROM googlemap WHERE RestoID='".$restoID."' && URL='".$url."'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	
	while($data = mysql_fetch_array($req)){
		$key=$data['Key'];
		$zoom=$data['Zoom'];
		$lat=$data['Lat'];
		$lon=$data['Lon'];
	} if (!(empty($key))) { 
  ?>
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;hl=fr&amp;key=<?php echo $key; ?>"
      type="text/javascript">
	</script>
    <script type="text/javascript">
		function load() {
		  if (GBrowserIsCompatible()) {
			var map = new GMap2(document.getElementById("map"));
			var point = new GLatLng(<?php echo $lat; ?>,<?php echo $lon; ?>);
			map.setCenter(point, <?php echo $zoom; ?>);
			var mark = new GMarker(point);
			map.addOverlay(mark);
		  }
		}
    </script>
	<?php 
	   } 
	?>
	
  <div class="container">
	<div class="row">
    	<?php include("left_col.php"); ?>
        <div class="col-lg-9">
        	<div class="page-header"> <h2>Contact</h2> </div>
            <div class="row">
                <div class="col-lg-12" style="text-align:center;">
                	<div class="panel panel-default col-lg-6">
                    <div class="panel-heading">Une question, une remarque ? Contactez-nous.</div>
                    <div class="panel-body">
                    <?php
                        $sql="SELECT * FROM ".$tb_resto." WHERE RestoID = '".$restoID."'";
                        $req = mysql_query($sql) or die(mysql_error());
                        while($data=mysql_fetch_array($req)){
                            $name=$data[Name];
                            $adresse=$data[Adresse];
                            $cp=$data[Post];
                            $ville=$data[Ville];
                            $tel=$data[Telephone];
                            $affichetel=$data[AfficheTel];
                        }	
                    ?>
                    <p>
                        <strong>
							<?php echo "<span class='glyphicon glyphicon-cutlery'></span>&nbsp;&nbsp;".$name." - ".$adresse.", ".$cp." ".$ville;
						   // if ($affichetel==0) {echo "<br><br><span class='glyphicon glyphicon-earphone'></span>&nbsp;&nbsp;&nbsp;&nbsp;".$tel;}
							?>
                        </strong>
                    </p>
                    <p>
					   <a href="rueresto-resto-japonais-horaires.html">
						<span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Horaires de livraisons 
					   </a>
					</p>
                    <?php if (!(empty($key))) { ?>
                         <div id="map" style="width: 450px; height: 400px; margin-top:33px;margin-left:33px;"></div>
                	<?php } ?>
                    </div>
                    </div>
                    <div class="panel panel-default col-lg-6">
                    <div class="panel-heading">Livraison GRATUITE dans les villes suivantes</div>
                    <div class="panel-body">
                  	<?php
                  		getRestoLivraison($restoID);
                	?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
