<?
	session_start();
	include('../lang/'.$_SESSION['lang'].'.php');
?>

<script type="text/javascript">
	function writediv(texte){
		 document.getElementById('affichage_sous_menu').innerHTML = texte;
	}
	function affichage_sous_menu() {
		if(texte = file('affichage_sous_menu.php?restoID=<? echo $RestoID; ?>&familleID='+escape(document.getElementById('deroulant_familleID').value)+'&sousfamilleID=<? echo $SousFamilleID; ?>')){
		writediv(texte);
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
		 if(xhr_object.readyState == 4) return(xhr_object.responseText);
		 else return(false);
	} 
	function startList () {
		if(document.all && document.getElementById){
			navRoot = document.getElementById("nav");
				for (i=0; i < navRoot.childNodes.length; i++) {
					node = navRoot.childNodes[i];
					if (node.nodeName=="LI") {
						node.onmouseover=function() {
						this.className+=" over";
					}
					node.onmouseout=function() {
						this.className=this.className.replace(" over", "");
					}
				}
			}
		}
	}
	function myinit(){
		startList ();
		affichage_sous_menu();
	}
	window.onload = myinit;
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css" media="all">
	html {min-width: 742px;}
	img{border:0;}
	p.access {display:none;}
	div#counters{display:none;}
	a{text-decoration: none;}
</style>

<table border="0" background="images/top_bg.gif" width="100%" height="100px" style=" padding:0;background-repeat:repeat-x" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td align="left" rowspan="2">
			<a href="adminmenu.php"><img src="images/logo.gif" alt="RueResto" width="180" height="125" border="0" class="logo" /> </a> 
		</td>
		<? 
			$res = mysql_query("select * from gg_systa where `classid`=1 && `ordre`=1 && `Activer`=1") or die(mysql_error());
			$row = mysql_fetch_array($res);
		?>
			<td align="left"><? if($row[image] != NULL && !empty($row[image])) echo "<a href='http://".$row[picurl]."'><img src=\"../resto/$row[image]\" title=\"$row[title]\" alt=\"$row[title]\" width=\"800\" height=\"100\" border=\"0\" class=\"logo\"></a>"; else echo "<img src=\"images/indisponible_top1.gif\" width=\"800\" height=\"100\" border=\"0\">";?></td>
			<!--<td align="left">
			<a href="#"><img src="pub/top_public.gif" alt="public" width="800" height="100" border="0" class="logo" /></a> 
			</td>-->
		<? 
			$res = mysql_query("select * from gg_systa where `classid`=1 && `ordre`=2 && `Activer`=1") or die(mysql_error());
			$row = mysql_fetch_array($res);
		?>
		<td align="left" width="400"><? if($row[image] != NULL && !empty($row[image])) echo "<a href='http://".$row[picurl]."'><img src=\"../resto/$row[image]\" title=\"$row[title]\" alt=\"$row[title]\" width=\"200\" height=\"100\" border=\"0\" class=\"logo\"></a>"; else echo "<img src=\"images/indisponible_top2.gif\" width=\"200\" height=\"100\" border=\"0\">";?></td>
	</tr>

	<tr>
		<td valign="bottom" colspan="2">
			  <table align="left">
			  <td>
			  <ul id="nav">
				<li><a href="#"><? print m_home; ?></a>
					<ul>
						<li><a href="adminmenu.php"><? print m_acceuil; ?></a></li>
						<li><a href="logout.php"><? print m_quitter; ?></a></li>
					</ul>
				</li>
				<li><a href="#"><? print m_confi; ?></a>
					<ul>         
						<li><a href="main_page_modif.php"><? print m_page_modif; ?></a></li>
					</ul>
					</li>
					<li><a href="adminfamille.php"><? print m_famille; ?></a>    </li>
					<li><a href="#"><? print m_menus; ?></a>
						<ul>
							<li><a href="adminmenu.php"><? print m_gestion_menu; ?></a></li>
							<li><a href="sortmenu.php"><? print m_ranger; ?></a></li>
							<li><a href="sugg_menu.php"><? print m_sugg_menu; ?></a></li>
						</ul>
					</li>
					<li><a href="modifypassword.php"><? print m_passe; ?></a> </li>
					
					<li><a href="modifieripnumber.php"><? print table_ip ?> </a> </li>
					
					<li id="switch_lang"><a href="#"><? print language; ?><? if($_SESSION['lang']=="fr") { ?> <img src="images/fr.jpg"> <? } ?>  <? if($_SESSION['lang']=="cn") { ?> <img src="images/cn.jpg"> <? } ?></a>
						<ul>		
							<li id="listeLang">
								<? 
								$repertoire="../lang/";
								$dir=opendir($repertoire);
								while ($file = readdir($dir)) {
									if ($file!="." && $file!=".." && $file!="liste.php" && $file!="switchLang.php") {
									$tab_lang=explode(".",$file);
										if($tab_lang[0]!=$_SESSION['lang']){
								?>
								<a href="../lang/switchLang.php?newLang=<? echo $tab_lang[0]; ?>"><? if($tab_lang[0]=="fr"){ echo "Français";} if($tab_lang[0]=="cn"){ echo "中文";} ?>&nbsp;&nbsp;<img src="images/<? echo $tab_lang[0]; ?>.jpg"> </a>
							</li>				
								<?  }
								  }
								} 
								?>					
						</ul>
					</li>
				
				</ul>
				
			  </td>
			</table>
		</td>
	</tr>
</table>

