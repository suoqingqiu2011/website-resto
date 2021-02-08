<?php
	include('include/config_perso.php');
	include('include/config.php');
	require_once("include/mots.php");
?>

<?php include("common.php"); ?>
	<!DOCTYPE html<
	<html class="no-js"> 
	
    <head>
      <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <?php
			include("include/meta.php");
			$ch_cmd=1;
			$sql="SELECT * FROM ".$tb_resto." WHERE RestoID = '".$restoID."'";
			$req = mysql_query($sql) or die(mysql_error());
			while($data=mysql_fetch_array($req)){
				$nom_resto=$data['Name'];
			}
			$exist_reduc=false;
			$exist_kdo=false;
			$sql="SELECT * FROM menu_cadeaux WHERE RestoID='".$restoID."' ORDER BY Prix_mini";
			$req = mysql_query($sql) or die(mysql_error());
			while($data=mysql_fetch_array($req)){
				$exist_kdo=true;
				$list_kdo.="'".$data['Name']." en cadeau<br>Pour ".format_prix($data['Prix_mini'])." de commande !',";
			}
			$list_kdo=substr($list_kdo,0,-1);
		?>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>	  
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <?php
			$str3="select * from ".$tb_main_page_style." where RestoID='$restoID' ORDER BY id LIMIT 1";
			$res3=mysql_query($str3);
			$style="main.css";
			while($aff3=mysql_fetch_array($res3)) {
				$style=$aff3['style'];
			}
		?>
        <link rel="stylesheet" href="css/<?php echo $style; ?>">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script language="javascript" src="js/fonctions.js"></script>
       
        <script>						
			function vider_panier () {
				if (window.confirm('Une commande a dj t valide. Si vous dsirez en passer une autre, vous devez auparavant vider votre panier. Voulez vous vider votre panier maintenant ?')) {
					   window.top.document.location.replace('rueresto-livraison-a-domicile-traitement-panier.html?mode=vider_panier');
					} 				
				}
		</script>
    </head>
	
    <body>
  
     <div id="pageheader" class="navbar navbar-fixed-top">
      <div class="container">
	  
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="index.php"><img class="logo" src="<?php //echo $url_logo; ?>" style="width:150px; height:79px;"/></a>-->
        </div>
        <div class="navbar-collapse collapse">
		
          <ul class="nav navbar-nav">
          	<?php $this_page = $_SERVER["REQUEST_URI"]; ?>
            <li <?php if($this_page == "" || $this_page == "/" || $this_page == "/best_new/" || strpos($this_page,"index") !== false){ echo 'class="active"';} ?> >
						<a href="index.php" title="Home" target="_top"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;&nbsp;ACCUEIL</a>
			</li>
            <li <?php if(strpos($this_page,"menu") !== false){echo 'class="active"';}?>> 
			   <a href="rueresto-livraison-a-domicile-restaurant-japonais-menu.html" title="Nos Menus" target="_top">
			      <span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;&nbsp;COMMANDE
				</a>
			</li>        
          </ul>
		  
          <ul class="nav navbar-nav navbar-right">
          	<li <?php if(strpos($this_page,"panier") !== false){echo 'class="active"';}?>> 
				 <a href="rueresto-cuisine-japonaise-panier.html" class="menu_haut" target="_top">
					<span id="panier">
						<?php			   
						    $nb_panier += $_SESSION['nb_panier_total'];
							if ($nb_panier==0) {
								echo"Panier vide&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-shopping-cart'></span>";
							} elseif ($nb_panier==1) {
								echo $nb_panier." article dans le panier&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-shopping-cart'></span>";
							} else {
								echo $nb_panier." articles dans le panier&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-shopping-cart'></span>";
							}					
						?>
					</span>
				 </a>
			 </li>
          </ul>
        </div>
		
        <ul class="nav navbar-nav menu-cartes" style="width: 140px;position: absolute;top: 0px;left: 130px;">
        	<li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cartes et menus <b class="caret"></b></a>
                <ul class="dropdown-menu">
                	<?php
						  $sql="SELECT * FROM ".$tb_famille." WHERE RestoID = '".$restoID."' and Cache = 0 ORDER BY SortID";
						  $req = mysql_query($sql) or die(mysql_error());
						  
						  while($data=mysql_fetch_array($req)){
							  
							  $sql2="SELECT * FROM sous_famille WHERE MenuTypeID = ".$data['MenuTypeID']." and RestoID = '".$restoID."' ORDER BY SortID";
							  $req2 = mysql_query($sql2) or die(mysql_error());
							  
							  echo "<li";
							  if ($data['MenuTypeID']==$familleID) {echo " class='active'";}
							  else {echo "";}
							  echo "><a href='".id_to_url_menu($data["MenuTypeID"],$data["MenuTypeName"])."'";
							  
							  if ($data['MenuTypeID']==$familleID) {echo " class='menus_select'";}
							  else {echo " class='menus'";}
							  echo "><span class='glyphicon glyphicon-hand-right'></span>&nbsp;&nbsp;&nbsp;".$data['MenuTypeName']."</a></li>";
							  
							  while($data2=mysql_fetch_array($req2)){
								  echo "<li";
								  if ($data2['SousFamilleID']==$sousFamilleID) {echo " class='active'";}
								  else {echo "";}
								  echo "><a href='".id_to_url_s_menu($data2["MenuTypeID"],$data2["SousFamilleID"],$data2["Name"])."'";
								  if ($data2['SousFamilleID']==$sousFamilleID) {echo " class='menus_select'";}
								  else {echo " class='menus'";}
								  echo "><span class='glyphicon glyphicon-hand-right'></span>&nbsp;&nbsp;&nbsp;".$data2['Name']."</a></li>";
							  }
						  }
					  ?>
                </ul>
            </li>
         </ul>
		 
      </div>
    </div>
	
    <?php if($this_page == "" || $this_page == "/" || $this_page == "/best_new/" || strpos($this_page,"index") !== false){ ?>
	<?php }else{ ?>
		  <div class="jumbotron" style="padding:30px;margin-bottom: -35px;">
            <div class="container">
            </div>
          </div>
	<?php } ?>