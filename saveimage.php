<?
include_once("../include/config.php");
include_once("session.php");

$RestoID = $_COOKIE["systa_restoid"];

$filename = "$Image_name";
if($filename != "")
{	
	$ext_name = explode(".",$filename);
	if($ext_name[1] != "jpg" && $ext_name[1] != "png" && $ext_name[1] != "gif")
	{
		echo "<script> alert('format illegal');history.back();</script>";	
	}
	else
	{
		$res = mysql_query("select `Image` from $tb_resto where `RestoID`='$RestoID'") or die(mysql_error());
		$row = mysql_fetch_array($res);
		
		if($row[Image] != NULL && !empty($row[Image]))
		{
			$path = "../".$row[Image];
			if(is_file($path))
			{
				unlink($path);	
			}
		}
		
		$path_dir = "../".$RestoID;
		if(!is_dir($path_dir))
		{
			//if(!mkdir($path_dir, 0700))	
			if(!mkdir($path_dir, 0755))	
				die("can't not make directory!");
		}
		
		$finalpath= $path_dir."/Resto.".$ext_name[1];
		if(!copy($Image,$finalpath))
			die("upload resto image failed!");
		$finalpath = $RestoID."/Resto.".$ext_name[1];
		
		mysql_query("update $tb_resto set `Image`='$finalpath' where `RestoID`='$RestoID'")or die(mysql_error());
	}
}
?>
<html>
<head>
<title></title>
<meta http-equiv="refresh" content="0; url=adminimage.php">
</head>
<body>
</body>
</html>