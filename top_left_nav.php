<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
	
	$name = $_COOKIE["systa_restoname"];
	
	$query="Select * from $tb_resto where `Login`='$name' and `Password` = '$oldpwd'";
	$result=mysql_query($query);
	$row=mysql_num_rows($result);
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	
	<title><? print t_Gestion_Menus; ?></title>
	<link rel="stylesheet" href="css1/style.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css1/component.css" />
	<link rel="stylesheet" type="text/css" href="css1/zzsc.css" />
	<link rel="stylesheet" type="text/css" href="css1/style1.css" />
</head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script type=text/javascript> 
 
function menuFix(){ 
    var sfEls = document.getElementById("navigation").getElementsByTagName("li"); 
    for (var i=0; i<sfEls.length; i++){
        sfEls[i].onmouseover=function(){
        this.className+=(this.className.length>0? " ": "") + "listshow"; 
        }
        sfEls[i].onMouseDown=function(){
        this.className+=(this.className.length>0? " ": "") + "listshow"; 
        }
        sfEls[i].onMouseUp=function(){
        this.className+=(this.className.length>0? " ": "") + "listshow"; 
        }
        sfEls[i].onmouseout=function(){
        this.className=this.className.replace(new RegExp("( ?|^)listshow\\b"), "");
        }
    }
}
window.onload=menuFix; 
</script> 
<!-- Header -->
<div id="header">
	<div class="header_top1"><img src="css1/images/image_top.jpg"; /></div>
	
		<div class="shell_top" background="">
				<!-- Logo + Top Nav -->
				<div id="top">
					<div id="logo_gestion" style="width:350px; float:left;"><a href="adminmenu.php"><img src="css1/images/logo.png"; style="height:150px; width:300px;"/></a></div>	
					<div id="top-navigation" align="right" style="font-size:15px; width:500px;">
						<!-- Welcome <a href="#"><strong>Administrator</strong></a>-->
						<? print word_welcome; ?> <a href="#"><strong><?php echo $name; ?></strong></a>
						<span>|</span>
						<a href="#"><? print word_help; ?> </a>
						<!-- <span>|</span>
						<a href="#">Profile Settings</a>
						<span>|</span>
						<a href="#">Log out</a>-->
					</div>
					<div style="background:url(css1/images/header_bottom.png) no-repeat; background-size:100% 100%; height:10px; float:left; width:1350px; margin-left:-200px; margin-top:-3px; margin-bottom:-2px; opacity:0.7;"></div>
				</div>
				<!-- End Logo + Top Nav -->
				
				<!-- Main Nav -->
				<div id="navigation">	
					<ul id="navi" >
						<li><a href="#" style="color:#000;"><span><? print m_home; ?></span></a>
							<ul>
								<li><a href="adminmenu.php"><span><? print m_acceuil; ?></span></a></li>
								<li><a href="logout.php"><span><? print m_quitter; ?></span></a></li>
							</ul>
						</li>
						
						<li><a href="#" style="color:#000; "><span><? print m_passe; ?></span></a>
							<ul>
								<li><a href="modifypassword.php" style="font-size:8;"><span><? print m_admin_gestion; ?></span></a></li>
								<li><a href="modifyserveurpwd.php" style="font-size:8;"><span><? print m_serveur_gestion; ?></span></a></li>
							</ul>
						</li>

						<li id="switch_lang"><a href="#" style="color:#000; font-size:12px; width:160px;"><? print language; ?><? if($_SESSION['lang']=="fr") { ?> <img src="images/fr.jpg"> <? } ?>  <? if($_SESSION['lang']=="cn") { ?> <img src="images/cn.jpg"> <? } ?></a>
								<ul>		
									<li id="listeLang" style="height:40px; width:160px;">
										<? 
										$repertoire="../lang/";
										$dir=opendir($repertoire);
										while ($file = readdir($dir)) {
											if ($file!="." && $file!=".." && $file!="liste.php" && $file!="switchLang.php") {
											$tab_lang=explode(".",$file);
												if($tab_lang[0]!=$_SESSION['lang']){
										?>
										<a href="../lang/switchLang.php?newLang=<? echo $tab_lang[0]; ?>" style="color:#fff; font-size:12px; width:160px;"><? if($tab_lang[0]=="fr"){ echo "LANGAGE:français";} if($tab_lang[0]=="cn"){ echo "语言：中文";} ?>&nbsp;&nbsp;<img src="images/<? echo $tab_lang[0]; ?>.jpg"> </a>
									</li>				
										<?  }
										  }
										} 
										?>					
								</ul>
							</li>
					</ul>
					<div class="clear"></div>
				</div>
				
				<!-- End Main Nav -->
			</div>
</div>


<div class="left_nav" >
		<dl >
		<!-- <dt><? print catalogue;?></dt> -->    
		<br />
		<strong style="font-size:initial;"><? print catalogue;?></strong> <br /> <br /> 
		<dd><a href="javascript:" class="nav_left"><? print m_menus; ?></a>
			<div class="nav_right">
				<a href="adminmenu.php"><? print m_gestion_menu; ?></a>
				<a href="sortemenu.php"><? print m_ranger; ?></a>
				<a href="sugg_menu.php"><? print m_sugg_menu; ?></a>
			</div>
		</dd>
		<dd><a href="adminfamille.php" class="nav_left"><? print m_famille; ?></a></dd>
		<dd><a href="javascript:" class="nav_left"><? print m_confi; ?></a>
			<div class="nav_right">
			<a href="main_page_modif.php"><? print m_page_modif; ?></a>
			</div>
		</dd>
		
		<dd><a href="javascript:" class="nav_left"><? print m_peripherique; ?></a>
			<div class="nav_right">
			<a href="modifieripnumber.php"><? print m_tablette_ip ?></a>
			<a href="ajouter_ip_printer.php"><? print m_printer; ?></a>
			</div>
		</dd>
		
		<dd><a href="javascript:" class="nav_left" style="font-size:10;"><? print m_commande; ?></a>
			<div class="nav_right" style="width:290px; word-wrap:break-word;">
			<a href="./recette/c_index.php" style="width:230px; font-size:10; "><? print m_article_compte; ?></a>
			</div>
		</dd>
	
		</dl>
</div>
	
<script src="js1/classie.js"></script>
<script src="js1/modalEffects.js"></script>
<script src="js1/jquery.min.js"></script>