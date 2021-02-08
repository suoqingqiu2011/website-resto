<?php
	session_start();
	include ('include/config_perso.php');
	include ('include/config.php');
	$mdp="12345";
	$pseudo="XXXXXXXXXXX";
	if(isset($_POST['pseudo'])){
		$pseudo=$_POST['pseudo'];
	}
	if(isset($_POST['mdp'])){
		$mdp=$_POST['mdp'];
	}
	$panier_valid=$_POST['panier_valid'];
	$i=0;
	
	//verifier le login email et le mot de passe
	$sql="SELECT * FROM ".$tb_user." WHERE Email = '".$pseudo."' and Password= '".$mdp."'";
	$req = mysql_query($sql) or die(mysql_error());
	while($data=mysql_fetch_array($req)){
		$i++;
		$email_log=$data['Email'];
		$id_log=$data['UserID'];
		$valid=$data['Valid'];
	}
    //valider ce login et mot de passe
	if ($i==1 && $valid!="" && $valid!="0") {
		header("Location:menu_site_valid.php?message=1&email=".$pseudo);
	}elseif ($i==1) {
		$_SESSION['login_pseudo']=$email_log;
		$_SESSION['login_id_'.$restoID]=$id_log;	
		header("Location:rueresto-cuisine-japonaise-panier.html");
	}else {
		header("Location:rueresto-resto-japonais-commande-en-ligne-panier-login.html?erreur=1");
	}
?>