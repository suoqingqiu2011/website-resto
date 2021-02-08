<?
	session_start();
	setcookie("systa_restoid","",time()-200);
	setcookie("systa_restoname","",time()-200);
	setcookie("systa_restopassword","",time()-200);
	header("Location:index_2eme.php?newLang=".$_SESSION['lang']);
?>