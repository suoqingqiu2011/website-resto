
      <hr>
		<?php
			$sql9="SELECT * FROM ".$tb_resto." WHERE RestoID = '".$restoID."'";
			$req9 = mysql_query($sql9) or die(mysql_error());
			while($data9=mysql_fetch_array($req9)){
				$name9=$data9[Name];
				$adresse9=$data9[Adresse];
				$cp9=$data9[Post];
				$ville9=$data9[Ville];
			}	
        ?>
        <script type="text/javascript">
			var browser={
			versions:function(){
				var u = navigator.userAgent, app = navigator.appVersion;
				return {
						trident: u.indexOf('Trident') > -1,
						presto: u.indexOf('Presto') > -1,
						webKit: u.indexOf('AppleWebKit') > -1,
						gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1,
						mobile: !!u.match(/AppleWebKit.*Mobile.*/)||!!u.match(/AppleWebKit/),
						ios: !!u.match(/(i[^;]+\;(U;)? CPU.+Mac OS X)/),
						android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1,
						iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1,
						iPad: u.indexOf('iPad') > -1,
						webApp: u.indexOf('Safari') == -1
					};
				}(),
				language:(navigator.browserLanguage || navigator.language).toLowerCase()
			}
			if(browser.versions.android){
				<?php $this_page = $_SERVER["REQUEST_URI"]; ?>
				document.writeln("<footer <?php if($this_page == "" || $this_page == "/" || $this_page == "/best_new/" || strpos($this_page,"index") !== false){echo "style='font-size:8px;'";}?>>");
				document.writeln("<p>Notre adresse : <?php echo $name9." - ".$adresse9.", ".$cp9 ?>&nbsp;&nbsp;&nbsp;&nbsp;</p>");
				document.writeln("</footer>");
			}else{
				document.writeln("<footer>");
				document.writeln("<p>Notre adresse : <?php echo $name9." - ".$adresse9.", ".$cp9 ?>&nbsp;&nbsp;&nbsp;&nbsp;</p>");
				document.writeln("</footer>");
			}
		</script>
		
       </div> <!-- /container -->       
    
    	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
        <script src="js/vendor/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/jquery.isotope.min.js"></script>
        <script src="js/main.js"></script>
	 
    </body>
	
</html>