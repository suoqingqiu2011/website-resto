<?
session_start();
/*
$db_server="localhost";
$db_user="root";
$db_password="test";
$systa_db="systatestnew";
/*
$db_server="192.168.1.27";
$db_user="root";
$db_password="test";
$systa_db="systatestnew";
*/
$db_server="localhost";
$db_user="root";
$db_password="systatest";
$systa_db="systaliu";

$tb_main_page_style = "resto_main_page_style";
$tb_suggestions_menu = "resto_suggestions_menu";

$tb_menu = "menuinfo550";

$tb_famille = "menutype550";

$tb_menu_cadeaux = "menu_cadeaux";

$tb_user = "user";

$tb_resto = "restaurant";


$tb_template = "template";
$tb_admin = "admin";

$tb_commande = "commandinfo20";

$tb_detail = "commanddetail20";

$connect=mysql_pconnect($db_server,$db_user,$db_password) or die(mysql_error()); 
mysql_query('SET NAMES "utf8"', $connect);
$select=mysql_select_db($systa_db,$connect) or die(mysql_error()); 


 $sqlMenuDate = mysql_query("select menutemps from menudate;");
 if($sqlMenuDate){
	$dataMenu = mysql_fetch_array($sqlMenuDate);
 }else{
	echo "SQL错误：".mysql_error();
 }
 $soir_ou_midi = $dataMenu['menutemps'];
 
 
 
updateCounter();

function del_directory($dirname)
{
	if(is_dir($dirname))
	{
		if ($dh = opendir($dirname)) 
		{
			$file = readdir($dh);
			$file = readdir($dh);
	        	while (($file = readdir($dh)) !== false) 
	        	{
	            		if(is_dir($dirname."/".$file))
	            		{
	            			del_directory($dirname."/".$file);
	            		}
	            		else if(is_file($dirname."/".$file))
	            		{
	            			unlink($dirname."/".$file);
	            		}
	        	}
	        closedir($dh);
		}
		if(!rmdir($dirname))//directory is null
		{
			die("remove directory error!");	
		}
	}
	else if(is_file($dirname))
	{
		unlink($dirname);	
	}
}

function xCopy($source,$destination ,$child){ 

//÷ 

// xCopy("feiy","feiy2",1):feiyµļ feiy2,Ŀ¼ 

// xCopy("feiy","feiy2",0):feiyµļ feiy2,Ŀ¼ 

//˵ 

// $source:ԴĿ¼ 

// $destination:ĿĿ¼ 

// $child:ʱǲǰĿ¼ 

	if(!is_dir($source))
	{ 
		echo("Error:the $source is not a direction!"); 
		return 0; 
	} 
	
	if(!is_dir($destination))
	{ 
		mkdir($destination,0777); 
	} 
	
	$handle=dir($source); 
	while($entry=$handle->read())
	{ 
		if(($entry!=".")&&($entry!=".."))
		{ 
			if(is_dir($source."/".$entry))
			{ 
				if($child) 
				xCopy($source."/".$entry,$destination."/".$entry,$child); 
			} 
			else
			{
				copy($source."/".$entry,$destination."/".$entry); 
			} 
		} 
	} 
	return 1; 
} 

function getCuisine()
{
	global $tb_cuisine;
	echo "<table width=\"100%\"  border=\"0\" cellspacing=\"5\" cellpadding=\"0\">";
	$sql = "select * from $tb_cuisine";
	$res = mysql_query($sql) or die(mysql_error());
	$nCount = 0;
	while($row = mysql_fetch_array($res))
	{
		if($nCount % 4 == 0)
		{
	  	echo "<tr>";
	  }
	  
	    echo "<td><font face=Arial><input name=\"Cuisine[]\" id=\"Cuisine\" type=checkbox value=\"$row[CuisineID]\">$row[Name]</font></td>";
	  
	  if($nCount % 4 == 3)
	  {
	  	 echo "</tr>";
	  }
	  
	  $nCount++;
	}
	echo "</table>";	
}

function getTemplate($type)
{
	global $tb_template;
	echo "<table  border=\"0\" cellspacing=\"5\" cellpadding=\"0\">";
	$sql = "select * from $tb_template";
	$res = mysql_query($sql) or die(mysql_error());
	$nCount = 0;
	while($row = mysql_fetch_array($res))
	{
		if($nCount % 4 == 0)
		{
			echo "<tr>";
		}
		
		if($nCount == 0)
		{
			$check = "checked";
		}
		else
		{
			$check = "";	
		}
		if($type == 1)
		{
			$extpath = "../";	
		}
		
		echo "<td><table width=\"100\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\">
		  <tr>
		    <td align=\"center\"><img src=\"$extpath$row[Image]\" width=\"52\" height=\"52\"></td>
		  </tr>
		  <tr>
		    <td><input type=\"radio\" name=\"Template\" value=\"$row[TemplateID]\" $check >
		      $row[Name]</td>
		  </tr>
		</table></td>";
		
		if($nCount % 4 == 3)
		{
			echo "</tr>";
		}
		$nCount ++;
	}
	echo "</table>";
}

function getCuisineByRestoID($RestoID)
{
		global $tb_resto_cuisine;
		$res = mysql_query("select `CuisineID` from $tb_resto_cuisine where `RestoID`='$RestoID'") or die(mysql_error());
		while($row = mysql_fetch_array($res))
		{
			echo getCuisineName($row[CuisineID])." / ";	
		}
}

function getCuisineName($CuisineID)
{
	global $tb_cuisine;
	$res = mysql_query("select * from $tb_cuisine where `CuisineID`='$CuisineID'") or die(mysql_error());
	if($row = mysql_fetch_array($res))
	{
		return $row[Name];	
	}
}

function getRestoCuisine($RestoID)
{
	global $tb_resto_cuisine;
	echo "<table width=\"100%\"  border=\"0\" cellspacing=\"5\" cellpadding=\"0\">";
	$sql = "select * from $tb_resto_cuisine where `RestoID`='$RestoID'";
	$res = mysql_query($sql) or die(mysql_error());
	$nCount = 0;
	while($row = mysql_fetch_array($res))
	{
		if($nCount % 4 == 0)
		{
	  	echo "<tr>";
	  }
	  
	    echo "<td><font face=Arial><img src=\"images/blue.gif\" width='8' height='8'>&nbsp;&nbsp;".getCuisineName($row[CuisineID])."</font></td>";
	  
	  if($nCount % 4 == 3)
	  {
	  	 echo "</tr>";
	  }
	  
	  $nCount++;
	}
	echo "</table>";	
}

function getRestoLivrai($RestoID)
{
	global $tb_resto_livrai;
	echo "<table width=\"100%\"  border=\"0\" cellspacing=\"5\" cellpadding=\"0\">";
	$sql = "select * from $tb_resto_livrai where `RestoID`='$RestoID'";
	$res = mysql_query($sql) or die(mysql_error());
	$nCount = 0;
	while($row = mysql_fetch_array($res))
	{
		if($nCount % 4 == 0)
		{
	  	echo "<tr>";
	  }
	  
	    echo "<td><font face=Arial><img src=\"images/blue.gif\" width='8' height='8'>&nbsp;&nbsp;$row[Region]</font></td>";
	  
	  if($nCount % 4 == 3)
	  {
	  	 echo "</tr>";
	  }
	  
	  $nCount++;
	}
	echo "</table>";	
}

function getRestoTemplate($templ)
{
	global $tb_template;
	echo "<table  border=\"0\" cellspacing=\"5\" cellpadding=\"0\">";
	$sql = "select * from $tb_template where `TemplateID`='$templ'";
	$res = mysql_query($sql) or die(mysql_error());
	if($row = mysql_fetch_array($res))
	{
		
		echo "<tr><td><table width=\"100\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\">
		  <tr>
		    <td align=\"center\"><img src=\"../$row[Image]\" width=\"52\" height=\"52\"></td>
		  </tr>
		  <tr>
		    <td><input type=\"radio\" name=\"Template\" value=\"$row[TemplateID]\" checked>
		      $row[Name]</td>
		  </tr>
		</table></td></tr>";
	}
	echo "</table>";
}

function getTemplate2($templ)
{
	global $tb_template;
	echo "<table  border=\"0\" cellspacing=\"5\" cellpadding=\"0\">";
	$sql = "select * from $tb_template";
	$res = mysql_query($sql) or die(mysql_error());
	$nCount = 0;
	while($row = mysql_fetch_array($res))
	{
		if($nCount % 4 == 0)
		{
			echo "<tr>";
		}
		
		if($templ == $row[TemplateID])
		{
			$check = "checked";
		}
		else
		{
			$check = "";	
		}
		
		echo "<td><table width=\"100\" border=\"0\" cellspacing=\"5\" cellpadding=\"0\">
		  <tr>
		    <td align=\"center\"><img src=\"../$row[Image]\" width=\"52\" height=\"52\"></td>
		  </tr>
		  <tr>
		    <td><input type=\"radio\" name=\"Template\" value=\"$row[TemplateID]\" $check >
		      $row[Name]</td>
		  </tr>
		</table></td>";
		
		if($nCount % 4 == 3)
		{
			echo "</tr>";
		}
		$nCount ++;
	}
	echo "</table>";
}

function getFamilleNameByID($FamilleID)
{
	global $tb_famille;
	$res = mysql_query("select `MenuTypeName` from $tb_famille where `MenuTypeID`='$FamilleID'") or die(mysql_error());	
	if($row = mysql_fetch_array($res))
	{
		return $row[MenuTypeName];	
	}
}

function getOtherRegion($RestoID)
{
	global $tb_resto_livrai;
	$res = mysql_query("select `Region` from $tb_resto_livrai where `RestoID`='$RestoID' and `Region` not like '75%'") or die(mysql_error());
	while($row = mysql_fetch_array($res))
	{
		$Region = $Region . $row[Region].";";	
	}
	
	return $Region;
}

function checkRegion($RestoID, $Region)
{
	global $tb_resto_livrai;
  $result=mysql_query("select `RestoLivraiID` from $tb_resto_livrai where `RestoID`='$RestoID' and `Region`='$Region'") or die(mysql_error());
  $row=mysql_num_rows($result);
  if($row==0)
  {
  	return false;
  }
  else
  {
  	return true;	
  }
}

function getCuisine2($RestoID)
{
	global $tb_cuisine;
	echo "<table width=\"100%\"  border=\"0\" cellspacing=\"5\" cellpadding=\"0\">";
	$sql = "select * from $tb_cuisine";
	$res = mysql_query($sql) or die(mysql_error());
	$nCount = 0;
	while($row = mysql_fetch_array($res))
	{
		if($nCount % 4 == 0)
		{
	  	echo "<tr>";
	  }
	  
	  if(checkCuisine($RestoID, $row[CuisineID]))
	  {
	  	$chk = "checked";	
	  }
	    echo "<td><font face=Arial><input name=\"Cuisine[]\" id=\"Cuisine\" type=checkbox value=\"$row[CuisineID]\" $chk>$row[Name]</font></td>";
	  
	  if($nCount % 4 == 3)
	  {
	  	 echo "</tr>";
	  }
	  
	  $nCount++;
	}
	echo "</table>";	
}

function checkCuisine($RestoID, $CuisineID)
{
	global $tb_resto_cuisine;
  $result=mysql_query("select `RestoCuisineID` from $tb_resto_cuisine where `RestoID`='$RestoID' and `CuisineID`='$CuisineID'") or die(mysql_error());
  $row=mysql_num_rows($result);
  if($row==0)
  {
  	return false;
  }
  else
  {
  	return true;	
  }
}

function getRestoNameByID($RestoID)
{
	global $tb_resto;
	$res = mysql_query("select `Name` from $tb_resto where `RestoID`='$RestoID'") or die(mysql_error());
	if($row = mysql_fetch_array($res))
	{
		return $row[Name];	
	}	
}

function getRestoCuisine2($RestoID)
{
	global $tb_resto_cuisine;
	$sql = "select * from $tb_resto_cuisine where `RestoID`='$RestoID'";
	$res = mysql_query($sql) or die(mysql_error());
	$nCount = 0;
	while($row = mysql_fetch_array($res))
	{
	    echo " <img src=\"images/ra.gif\" width=\"7\" height=\"7\"> ".getCuisineName($row[CuisineID]);
	    $nCount++;
	    if($nCount % 3 == 0)
	    {
	    	echo "<br>";	
	    }
	}
}

function getCommentText($value)
{
	switch($value)
	{
		case 2:
		echo "Nul";
		break;
		case 4:
		echo "Bof";
		break;
		case 6:
		echo "Bien";
		break;
		case 8:
		echo "Trs Bien";
		break;
		case 10:
		echo "Excellent";
		break;	
	}	
}

function getCommentImage($value)
{
	$num = intval($value / 3);
	$star = intval($num / 2);
	$demi = $num % 2;
	for($i=0; $i<$star; $i++)
	{
		echo "<IMG src=\"images/star.gif\">";
	}
	for($i=0; $i<$demi; $i++)
	{
		echo "<IMG src=\"images/demi.gif\">";
	}
}

function getTemplateDir($TemplateID)
{
	global $tb_template;
	$res = mysql_query("select `Directory` from $tb_template where `TemplateID`='$TemplateID'") or die(mysql_error());
	if($row = mysql_fetch_array($res))
	{
		echo $row[Directory];	
	}	
}

function getTemplateIDByRestoID($RestoID)
{
	global $tb_resto;
	$res = mysql_query("select `Template` from $tb_resto where `RestoID`='$RestoID'") or die(mysql_error());
	if($row = mysql_fetch_array($res))
	{
		return $row[Template];	
	}	
}

function traiteKey($key)
{
	$str = str_replace("\\", "", $key);
	return $str; 	
}

function getCuisineList()
{
	global $tb_cuisine;
	$sql = "select * from $tb_cuisine";
	$res = mysql_query($sql) or die(mysql_error());
	$nCount = 0;
	echo "<SELECT name=\"CuisineID\" class=\"input2\">";
	while($row = mysql_fetch_array($res))
	{
			echo "<option value=\"$row[CuisineID]\">$row[Name]</option>";
	 }
	echo "</select>";
}

function getUserNameByID($UserID)
{
	global $tb_user;
	$res = mysql_query("select `Nom` from $tb_user where `UserID`='$UserID'") or die(mysql_error());
	if($row = mysql_fetch_array($res))
	{
		return $row[Nom];	
	}
}

function updateCounter()
{
	$iipp=$_SERVER["REMOTE_ADDR"];
	$currentIp = $_COOKIE["global_Ip"];
	if($currentIp == "")
	{
		setcookie("global_Ip", $iipp);
		
		$day = date("j");
		$month = date("m");
		$year = date("Y");
		$sql="select `CounterID` from counter_aritosushi75015 where `Month` = '$month' and `Year`='$year'";
		$res = mysql_query($sql);
		if($res){
			$row=mysql_num_rows($res);
			
			$column = "M".$day;
			If($row <= 0)
			{
				$sql3 = "insert into counter_aritosushi75015 (`Month`, `Year`, `Total`, `M1`, `M2`,`M3`,`M4`,`M5`,`M6`,`M7`,`M8`,`M9`,`M10`,`M11`,`M12`,`M13`,`M14`,`M15`,`M16`,`M17`,`M18`,`M19`,`M20`,`M21`,`M22`,`M23`,`M24`,`M25`,`M26`,`M27`,`M28`,`M29`,`M30`, `M31`)
				values ('$month', '$year', '0',	'0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0')";
				mysql_query($sql3);
			}
			
			$sql2 = "update counter_aritosushi75015 set `Total`=`Total`+1, `$column`=`$column`+1 where `Month` = '$month' and `Year`='$year'";
			$res2 = mysql_query($sql2);
		}
	}
}

function getTypeByID($typeid)
{
	global $tb_type;
	$res = mysql_query("select `Name` from $tb_type where `TypeID`='$typeid'");
	if($row = mysql_fetch_array($res))
	{
		return $row[Name];	
	}	
}
function format_prix($prix) {
	$prix=number_format($prix,'2','.',' ');
	$prix=str_replace('.',' &euro; ',$prix);
	return $prix;
	}
//// Verification ouverture/fermeture des commandes  //////////////////
$jour_now=date('Y-m-d H:i:s');
$heure_now=date('H:i:s');
$jourdelasemaine=date(w);

$fermeture_off=0;
$sql="SELECT * FROM horaire_livr_off WHERE RestoID='".$restoID."'";
$req = mysql_query($sql) or die(mysql_error());
while($data=mysql_fetch_array($req)){$fermeture_off=1;}

$fermeture_exception=0;
$sql="SELECT * FROM horaire_livr_exception WHERE '".$jour_now."' BETWEEN Debut AND Fin AND RestoID='".$restoID."' ORDER BY Fin";
$req = mysql_query($sql) or die(mysql_error());
while($data=mysql_fetch_array($req)){$fermeture_exception=1;
$fermeture_exception_fin=$data['Fin'];}

$fermeture_normal=1;
$sql="SELECT * FROM horaire_livr_habituel WHERE ('".$heure_now."' BETWEEN Debut AND Fin) && Jour='".$jourdelasemaine."' AND RestoID='".$restoID."'";
$req = mysql_query($sql) or die(mysql_error());
while($data=mysql_fetch_array($req)){$fermeture_normal=0;}

$fermeture=$fermeture_off+$fermeture_exception+$fermeture_normal;
////////////////////////////////////////////////////////////////////////
 // Points fidlit
	$fidelite_somme=0;
	$fidelite=false;
	$sql_fidel="SELECT * FROM fidelite_user WHERE RestoID='".$restoID."' && UserID='".$_SESSION['login_id_'.$restoID]."'";
	$req_fidel = mysql_query($sql_fidel) or die(mysql_error());
	while($data_fidel=mysql_fetch_array($req_fidel)){
	$fidelite_somme=$data_fidel['Somme'];
	}
	$sql_fidel="SELECT * FROM fidelite_resto WHERE RestoID='".$restoID."'";
	$req_fidel = mysql_query($sql_fidel) or die(mysql_error());
	while($data_fidel=mysql_fetch_array($req_fidel)){
	$fidelite=true;
	$fidelite_depense=$data_fidel['Depense']; // Quand le client dpense ... 
	$fidelite_gainpts=$data_fidel['GainPts']; // Il gagne ... pts
	$fidelite_coutpts=$data_fidel['CoutPts']; // Avec ... pts
	$fidelite_reduc=$data_fidel['Reduc']; // Il a une reduction de ... 
	$fidelite_limite=$data_fidel['Limite']; // Un seul bon de rduction par commande
	}
	if ($fidelite_depense>0) {$fidelite_nb_points=floor($fidelite_somme/$fidelite_depense)*$fidelite_gainpts;} 
	else {$fidelite_nb_points=0;} // Nombre de point de fidlit
	if ($fidelite_coutpts>0) {$fidelite_nb_bon_reduc=floor($fidelite_nb_points/$fidelite_coutpts);}
	else {$fidelite_nb_bon_reduc=0;} // Nombre de bon de rduction de ..  disponibles
	
// Fin Points fidlit
	

// Slection des templates
$sql="SELECT Template,TemplateID FROM restaurant WHERE RestoID='".$restoID."'";
$req = mysql_query($sql) or die(mysql_error());
while($data=mysql_fetch_array($req)){
	$template=$data['Template'];
	$templateID=$data['TemplateID'];
	}
if ($templateID==1) {
	$tab_template=explode("/",$template);
	$template_css=$tab_template[0];
	$temp_coul=$tab_template[0];
	$temp_font=$tab_template[1];
	$iphost=substr($HTTP_HOST,0,10);
	if ($iphost=="192.168.1.") {
		$chemin="http://192.168.1.30/restaurants/V2/templates/1_".$template."/";
		$chemin_court="http://192.168.1.30/restaurants/V2/templates/1_".$template_css."/";}
	else {
		$chemin="http://www.rueresto.fr/templates/1_".$template."/";
		$chemin_court="http://www.rueresto.fr/templates/1_".$template_css."/";}
}
elseif ($templateID==2) {
	$tab_template=explode("/",$template);
	$tab_couleur=array("","3b0100","001041","002901","eec285","41a6ee","ca64eb");
	$temp_couleur_fond=$tab_couleur[$tab_template[0]];
	$temp_couleur_header=$tab_template[0];
	$temp_couleur_bouton=$tab_template[1];
	$temp_font=$tab_template[2];
	$iphost=substr($HTTP_HOST,0,10);
	if ($iphost=="192.168.1.") {
		$chemin_bouton="http://192.168.1.30/restaurants/V3/templates/2_".$temp_couleur_bouton."/";
		$chemin_degrade="http://192.168.1.30/restaurants/V3/templates/2_".$temp_couleur_header."/";
		}
	else {
		$chemin_bouton="http://www.rueresto.fr/templates/2_".$temp_couleur_bouton."/";
		$chemin_degrade="http://www.rueresto.fr/templates/2_".$temp_couleur_header."/";
		}
		// Google ad
	$tab_border=array("","290000","000023","000B00","d0a467","2388d0","ac46cd");
	$google_color_border=$tab_border[$tab_template[0]];
	$google_color_link=$temp_couleur_fond;
}

// Fin template

// Calcul prix_panier
function prix_panier() {
global $restoID;
$panier=$_SESSION['panier'];
$tab_panier=explode('/',$panier);
	$nb_panier=count($tab_panier)-1;
	for($i=0;$i<$nb_panier;$i++)
	{
		$tab_article=explode(';',$tab_panier[$i]);
		$article=$tab_article['0'];
		$qte=$tab_article['1'];
		$trait_article=$tab_panier[$i];
		$sql = "SELECT * FROM menuinfo550 WHERE MenuID='".$article."'"; 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
		while($data = mysql_fetch_array($req)) 
			{
			$prix_article=$qte*$data['MenuPrixPlace'];
			$prix_total+=$prix_article;
			}
	}
$reduc=$_SESSION['reduc_resto'];
$tab_reduc=explode(';',$reduc);
$total_reduc=$tab_reduc['0']*$tab_reduc['1'];
return $prix_total-$total_reduc;	
}
// Fin prix_panier

// Vrifie que le cadeau peut tre ajout au panier 
function verif_cadeau($cadeauID) {
	global $restoID;
	$total_panier=prix_panier();
	$sqlKDO="SELECT * FROM menu_cadeaux where `RestoID`='".$restoID."' && CadeauID='".$cadeauID."'";	
	$resKDO=mysql_query($sqlKDO);
	while($dataKDO=mysql_fetch_array($resKDO))
		{
	$prix_mini_cadeau=$dataKDO['Prix_mini'];
		}
	if ($total_panier>=$prix_mini_cadeau) {return true;}
	else {return false;}
}
// Nombre d'article dans le panier
function numb_art(){
	$panier = $_SESSION["panier"];
	$tab_panier=explode("/",$panier);
	$nb_panier=0;
	for ($i=0;$i<count($tab_panier);$i++)
		{
		$tab_article=explode(";",$tab_panier[$i]);
		$nb_panier+=$tab_article[1];
		}
	if (!(empty($_SESSION['kdo'])))	{$nb_panier++;}
	return $nb_panier;
}
$nb_panier = numb_art();
?>