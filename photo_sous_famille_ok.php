<?
session_start();
	include_once("../include/config.php");
	include_once("session.php");
	$RestoID = $_COOKIE["systa_restoid"];
	$filename = "$Image_name";
	  	if($filename != "")
	  	{
	  		$ext_name = explode(".",$filename);
				if($ext_name[1] != "jpg" && $ext_name[1] != "png" && $ext_name[1] != "gif")
				{
					die("<script> alert('format illegal');history.back();</script>");	
				}	
			//-----------------------------	
	  		$path_type = "../".$RestoID;
				if(!is_dir($path_type))
				{
					if(!mkdir($path_type, 0755))	
						die("can't not make directory!");
				}
				
				$path_type = "../".$RestoID;
				if(!is_dir($path_type))
				{
					if(!mkdir($path_type, 0755))	
						die("can't not make directory!");
				}
			$sql="update $tb_menu set `Image`='' where `RestoID`='$RestoID' && `SousFamilleID`='$SousFamilleID'";
			mysql_query($sql) or die(mysql_error());
			$sql="select * from $tb_menu where `RestoID`='$RestoID' && SousFamilleID='".$SousFamilleID."'";	
		    $result=mysql_query($sql);
			while($myrow=mysql_fetch_array($result))
			{
			 unlink("../".$myrow['Image']);
			}
			$finalpath= $path_type."/sousfamille".$SousFamilleID.".".$ext_name[1];
			if(!move_uploaded_file($Image,$finalpath))
			die("upload file error!");
			$chemin_bdd=$RestoID."/sousfamille".$SousFamilleID.".".$ext_name[1];

			$sql="update $tb_menu set `Image`='$chemin_bdd' where `RestoID`='$RestoID' && `SousFamilleID`='$SousFamilleID'";
			mysql_query($sql) or die(mysql_error());
			header("location:adminfamille.php?photo=ok");		
			}
			else {header("location:photo_sous_famille.php?SousFamilleID=".$SousFamilleID."&erreur=1");}
?>