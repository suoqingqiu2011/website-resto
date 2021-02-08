<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!--ajouter by liu 18/05/2010-->
<?
//ajouter pour change language by liu
    session_start();
    include('../lang/'.$_SESSION['lang'].'.php');
	include_once("../include/config.php");
	include_once("../include/config_perso.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];
	$redirection = "adminmenu.php?MenuTypeID=".$FamilleID."&SousFamilleID=".$SousFamilleID;
	
	$sql="Select * from $tb_menu_cadeaux Where `Code` = '".$Code."' and `RestoID`='$RestoID'";
  	$result=mysql_query($sql) OR die (mysql_error());
  	$row=mysql_num_rows($result);
	
	$sql="Select * from $tb_menu Where `MenuCode` = '".$Code."' and `RestoID`='$RestoID'";
  	$result=mysql_query($sql) OR die (mysql_error());
  	$row+=mysql_num_rows($result);
	
	
	$sql1="Select * from $tb_famille Where  `MenuTypeID`='".$FamilleID."'";
  	$result1=mysql_query($sql1) OR die (mysql_error());
	while($aff_m=mysql_fetch_array($result1)){ 
		if($aff_m[MenuTypeID] == $FamilleID){
			$FamilleName=$aff_m[MenuTypeName];
		}
	}
	/*echo $FamilleID; echo "&nbsp";
	echo $FamilleName; echo "&nbsp";*/
	
  	//if($row != 0 && $action!="Modifier") delete by liu 07/05/2010	
	if($_SESSION['lang']=="fr"){// ajouter by liu 18/05/2010 changer language
		if($row != 0 && $action!="Modifier" && $action != "Supprimage"){
			echo "<script> alert('Le Code Existe!'); history.back();</script>";
		}else{
			$filename = "$Image_name";
			if($filename != ""){
				$ext_name = explode(".",$filename);
					if($ext_name[1] != "jpg" && $ext_name[1] != "JPG" && $ext_name[1] != "png" && $ext_name[1] != "PNG" && $ext_name[1] != "gif" && $ext_name[1] != "GIF")
					{
						die("<script> alert('format illegal'); history.back();</script>");	
					}	
				//-----------------------------	
				/*$path_type = "../livraison/resto/".$RestoID;
					if(!is_dir($path_type))
					{
						if(!mkdir($path_type, 0755))	
							die("can't not make directory!");
					}*/
					
				//$path_type = "../".$url_img.$RestoID;
					$path_type = "../resto/".$RestoID;
					if(!is_dir($path_type))
					{
						if(!mkdir($path_type, 0755))	
							die("can't not make directory!");
					}
			
					$finalpath= $path_type."/".$Code.".".$ext_name[1];
					$f1=$finalpath;
					if(!copy($Image,$finalpath))
						die("upload file error!");
					$finalpath = $RestoID."/".$Code.".".$ext_name[1];
			  }
			
	          /*	$tran = array("'" => "\'");
				$Name = strtr($Name, $tran);
				$Note = strtr($Note, $tran);*/
				//le 2012 05 21 lang modifier pour traiter le probleme de ' et " (guillmet et apostrophe)
				$Code=mysql_escape_string(stripslashes($Code));
				$Name=mysql_escape_string(stripslashes($Name));
				$Note=mysql_escape_string(stripslashes($Note));
				//fin
				if($action == "Valider sans option" || $action=="Valider et ajouter des options"){
					/*
					$sql="Insert into $tb_menu(`RestoID`,`MenuTypeID`,`SousFamilleID`,`MenuCode`,`MenuName`,`MenuPrixPlace`, `MenuPath`, `Recommender`, `Note`)
					values('$RestoID','$FamilleID','$SousFamilleID','$Code', '$Name','$Prix','$finalpath', '$Recommande', '$Note')";
					*/
					
					//Modifier le SQL pour ajouter les données	
              		//这里根价格来确定一号打印机的值是否唯一
                    if($Prix >0){
						$sql="Insert into $tb_menu (`RestoID`,`MenuType`,`MenuTypeID`,`MenuCode`,`MenuName`,`MenuPrixPlace`, `MenuPath`, `Recommender`, `Note`, `Printer1`, `Printer2`, `Printer3`, `Printer4`, `MenuMidi`, `PlaceTVA`, `MenuPrixEmporte`)
					               values('$RestoID','$FamilleName','$FamilleID','$Code', '$Name','$Prix','$finalpath', '$Recommande', '$Note', '1', '$printer2', '$printer3', '$printer4', '$Menumidi', '$Tva', '$Remise')";
			        }else{
						$sql="Insert into $tb_menu (`RestoID`,`MenuType`,`MenuTypeID`,`MenuCode`,`MenuName`,`MenuPrixPlace`, `MenuPath`, `Recommender`, `Note`, `Printer1`, `Printer2`, `Printer3`, `Printer4`, `MenuMidi`, `PlaceTVA`, `MenuPrixEmporte`)
					               values('$RestoID','$FamilleName','$FamilleID','$Code', '$Name','$Prix','$finalpath', '$Recommande', '$Note', '0', '$printer2', '$printer3', '$printer4', '$Menumidi', '$Tva', '$Remise')";		       
					}
					//echo $sql;
					
					//echo $FamilleName;
					//echo $sql;
					echo "<script> alert('Ajouter Menu'); </script>";   
				
					mysql_query($sql) or die(mysql_error());
					if($action=="Valider et ajouter des options") {
						$redirection="adminoptions.php";
					}
							
				}elseif($action == "Modifier"){
					
					//jack ajouter le 01 10 2012
					$sql_image="select MenuPath from $tb_menu where `MenuID`='$MenuID'";
					$rs_sql_image=mysql_query($sql_image) or die(mysql_error());
					$row_image=mysql_fetch_array($rs_sql_image);
					$image_old=$row_image['MenuPath'];
					
					if($_FILES["Image"]["name"]==""){									
					$sql="update $tb_menu set `MenuTypeID`='$FamilleID',`SousFamilleID`='$SousFamilleID',`MenuCode`='$Code',`MenuName`='$Name',`MenuPrixPlace`='$Prix',`MenuPath`='$image_old',`Recommender`='$Recommande', `Note`='$Note',`Printer1`='$printer1',`Printer2`='$printer2',`Printer3`='$printer3',`Printer4`='$printer4',`MenuMidi`='$Menumidi',`PlaceTVA`='$Tva',`MenuPrixEmporte`='$Remise'";
					}else{				
					$sql="update $tb_menu set `MenuTypeID`='$FamilleID',`SousFamilleID`='$SousFamilleID',`MenuCode`='$Code',`MenuName`='$Name',`MenuPrixPlace`='$Prix',`MenuPath`='$finalpath',`Recommender`='$Recommande', `Note`='$Note',`Printer1`='$printer1',`Printer2`='$printer2',`Printer3`='$printer3',`Printer4`='$printer4',`MenuMidi`='$Menumidi',`PlaceTVA`='$Tva',`MenuPrixEmporte`='$Remise'";
					}
					//FIN	
					if(!empty($finalpath)){
						$sql = $sql .", `MenuPath`='$finalpath'";						
					}				
					$sql = $sql." where `MenuID`='$MenuID'";
					mysql_query($sql) or die(mysql_error());
					echo "<script> alert('Modification effectuée');</script>";		
					
				}elseif($action == "Supprimage"){
					$sql="Select * from $tb_menu Where `RestoID`='$RestoID' && `MenuID`='$MenuID'";
					$result=mysql_query($sql) OR die (mysql_error());
					$row=mysql_fetch_array($result);
					$image=$row['Image'];
					$sql="update $tb_menu set `MenuPath`='' where `MenuID`='$MenuID'";
					mysql_query($sql) or die(mysql_error());
					if (strstr($image,"famille")==false) {
						unlink("../resto/".$image);
					}
					$redirection = "adminmenu.php?MenuID=".$MenuID."MenuTypeID=".$FamilleID."&SousFamilleID=".$SousFamilleID;//ajouter by liu 23/06/2010
					echo "<script> alert('Image supprimée');</script>";		  
				}
				
			}
	}
	
	if($_SESSION['lang']=="cn"){
		if($row != 0 && $action!="修改" && $action != "Supprimage"){
			echo "<script> alert('代码已存在!'); history.back();</script>";
		}else{
			$filename = "$Image_name";
			if($filename != ""){
				/*
				$ext_name = explode(".",$filename);
					if($ext_name[1] != "jpg" && $ext_name[1] != "JPG" && $ext_name[1] != "png" && $ext_name[1] != "PNG" && $ext_name[1] != "gif" && $ext_name[1] != "GIF")
					{
						die("<script> alert('格式非法');history.back();</script>");	
					}	
				//-----------------------------	
				$path_type = "../resto/".$RestoID;
					if(!is_dir($path_type))
					{
						if(!mkdir($path_type, 0755))	
							die("不能创建目录!");
					}			
					$path_type = "../resto/".$RestoID;
					if(!is_dir($path_type))
					{
						if(!mkdir($path_type, 0755))	
							die("不能创建目录!");
					}		
					$finalpath= $path_type."/".$Code.".".$ext_name[1];
					$f1=$finalpath;
					if(!copy($Image,$finalpath))
						die("文件上载错误!");
					$finalpath = $RestoID."/".$Code.".".$ext_name[1];
				}
				*/
				
				   $ext_name = explode(".",$filename);
					if($ext_name[1] != "jpg" && $ext_name[1] != "JPG" && $ext_name[1] != "png" && $ext_name[1] != "PNG" && $ext_name[1] != "gif" && $ext_name[1] != "GIF")
					{
						die("<script> alert('format illegal'); history.back();</script>");	
					}	
					//-----------------------------	
					/*$path_type = "../livraison/resto/".$RestoID;
						if(!is_dir($path_type))
						{
							if(!mkdir($path_type, 0755))	
								die("can't not make directory!");
						}*/
						
					//$path_type = "../".$url_img.$RestoID;
					$path_type = "../resto/".$RestoID;
					if(!is_dir($path_type))
					{
						if(!mkdir($path_type, 0755))	
							die("can't not make directory!");
					}		
					$finalpath= $path_type."/".$Code.".".$ext_name[1];
					$f1=$finalpath;
					echo $f1;
					if(!copy($Image,$finalpath))
						die("upload file error!");
					$finalpath = $RestoID."/".$Code.".".$ext_name[1];
					echo $finalpath;
			   }
					
			
			    /*$tran = array("'" => "\'");
				$Name = strtr($Name, $tran);
				$Note = strtr($Note, $tran);*/
				// le 2012 05 21 lang modifier pour traiter le probleme de ' et " (guillmet et apostrophe)
				$Code=mysql_escape_string(stripslashes($Code));
				$Name=mysql_escape_string(stripslashes($Name));
				$Note=mysql_escape_string(stripslashes($Note));
				//fin
				if($action == "确定并不添加选项" || $action=="确定并添加选项") //modifier by liu 18/05/2010 changer francais a chinois , sinon ne peux pas ajouter les data
				{
				    /*
					$sql="Insert into $tb_menu(`RestoID`,`FamilleID`,`SousFamilleID`,`Code`,`Name`,`Prix`, `Image`, `Recommender`, `Note`)
					values('$RestoID','$FamilleID','$SousFamilleID','$Code', '$Name','$Prix','$finalpath', '$Recommande', '$Note')";
					*/
					//更改插入数据的代码
					//$sql="Insert into $tb_menu (`RestoID`,`MenuTypeID`,`MenuCode`,`MenuName`,`MenuPrixPlace`, `MenuPath`, `Recommender`, `Note`, `Printer1`, `Printer2`, `Printer3`, `Printer4`, `MenuMidi`, `PlaceTVA`, `MenuPrixEmporte`)
					                  //values('$RestoID','$FamilleID','$Code', '$Name','$Prix','$finalpath', '$Recommande', '$Note', '$printer1', '$printer2', '$printer3', '$printer4', '$Menumidi', '$Tva', '$Remise')";
					
					if($Prix >0){
						$sql="Insert into $tb_menu (`RestoID`,`MenuType`,`MenuTypeID`,`MenuCode`,`MenuName`,`MenuPrixPlace`, `MenuPath`, `Recommender`, `Note`, `Printer1`, `Printer2`, `Printer3`, `Printer4`, `MenuMidi`, `PlaceTVA`, `MenuPrixEmporte`)
					               values('$RestoID','$FamilleName','$FamilleID','$Code', '$Name','$Prix','$finalpath', '$Recommande', '$Note', '1', '$printer2', '$printer3', '$printer4', '$Menumidi', '$Tva', '$Remise')";
			        }else{
						$sql="Insert into $tb_menu (`RestoID`,`MenuType`,`MenuTypeID`,`MenuCode`,`MenuName`,`MenuPrixPlace`, `MenuPath`, `Recommender`, `Note`, `Printer1`, `Printer2`, `Printer3`, `Printer4`, `MenuMidi`, `PlaceTVA`, `MenuPrixEmporte`)
					               values('$RestoID','$FamilleName','$FamilleID','$Code', '$Name','$Prix','$finalpath', '$Recommande', '$Note', '0', '$printer2', '$printer3', '$printer4', '$Menumidi', '$Tva', '$Remise')";		       
					}
					//echo $sql;
					
					echo "<script> alert('成功加入菜单'); </script>";   
					mysql_query($sql) or die(mysql_error());
					
					if($action=="确定并添加选项") {
						$redirection="adminoptions.php";
					} //modifier by liu 18/05/2010 changer francais a chinois , sinon ne peux pas ajouter les data
				}
				elseif($action == "修改") //modifier by liu 18/05/2010 changer francais a chinois , sinon ne peux pas ajouter les data
				{
					//$sql="update $tb_menu set `MenuTypeID`='$FamilleID',`SousFamilleID`='$SousFamilleID',`MenuCode`='$Code',`Name`='$Name',`Prix`='$Prix',`Image`='$finalpath',`Recommender`='$Recommande', `Note`='$Note'";
					/*
					if($_FILES["Image"]["name"]==""){									
					$sql="update $tb_menu set `MenuTypeID`='$FamilleID',`SousFamilleID`='$SousFamilleID',`MenuCode`='$Code',`MenuName`='$Name',`MenuPrixPlace`='$Prix',`MenuPath`='$image_old',`Recommender`='$Recommande', `Note`='$Note'";
					}else{				
					$sql="update $tb_menu set `MenuTypeID`='$FamilleID',`SousFamilleID`='$SousFamilleID',`MenuCode`='$Code',`MenuName`='$Name',`MenuPrixPlace`='$Prix',`MenuPath`='$finalpath',`Recommender`='$Recommande', `Note`='$Note'";
					}
					*/				
					$sql="update menuinfo550 set `MenuTypeID`='$FamilleID',`SousFamilleID`='$SousFamilleID',`MenuCode`='$Code',`MenuName`='$Name',`MenuPrixPlace`='$Prix',`MenuPath`='$image_old',`Recommender`='$Recommande', `Note`='$Note',`Printer1`='$printer1',`Printer2`='$printer2',`Printer3`='$printer3',`Printer4`='$printer4',`MenuMidi`='$Menumidi',`PlaceTVA`='$Tva',`MenuPrixEmporte`='$Remise'";			
						
					if(!empty($finalpath)){
						$sql = $sql .", `MenuPath`='$finalpath'";	
					}				
					$sql = $sql." where `MenuID`='$MenuID'";
					mysql_query($sql) or die(mysql_error());
					echo "<script> alert('修改完成');</script>";		  

				}
				elseif($action == "Supprimage")//modifier by liu 18/05/2010 changer francais a chinois , sinon ne peux pas ajouter les data
				{
					$sql="Select * from menu Where `RestoID`='$RestoID' && `MenuID`='$MenuID'";
					$result=mysql_query($sql) OR die (mysql_error());
					$row=mysql_fetch_array($result);
					$image=$row['Image'];
					
					$sql="update $tb_menu set `Image`='' where `MenuID`='$MenuID'";
					mysql_query($sql) or die(mysql_error());
					if (strstr($image,"famille")==false) {
						unlink("../resto/".$image);
					}
					echo "<script> alert('图片已删除');</script>";		  
				}	
				
			}
	}
	/*
	if(isset($_POST['action']))
	{	
		$query = "select `name` from printerip";
		$result = mysql_query($query);
		$row+=mysql_num_rows($result);
		$data = array();
		
		$i=0;
		while ($rows= mysql_fetch_array($result))
		{
		$data[$i] = $rows['name'];
		echo $data[$i++];
		}
		$taille=$i--;
		echo $taille;
			
		$arr=array("printer1","printer2","printer3","printer4");
		 for($i=0; $i<$taille; $i++){
			 $sqlstr="Select * from printerip Where `name`='$data[$i]'";
			 mysql_query($sqlstr) OR die (mysql_error());
			 if($_POST[$arr[$i]]==1){
				 $sqlstr="update printerip set `checkstatus`=1 where `name`='$data[$i]'";
				// echo $arr[$i]."choisi <br/>";
			 }else{
				 $sqlstr="update printerip set `checkstatus`=0 where `name`='$data[$i]'";
				 //echo $arr[$i]."non_choisi <br/>";
			 }
			 mysql_query($sqlstr) or die(mysql_error());
		 }
	}*/
?>

<html>
	<head>
		<title></title>
		<meta http-equiv="refresh" content="0; url=<? echo $redirection; ?>">
	</head>
	<body>
	</body>
</html>